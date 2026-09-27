<?php

namespace App\Http\Controllers;

use App\Models\Authenticator;
use App\Models\Entry;
use App\Models\EntryItems;
use App\Models\Label;
use App\Models\Promo;
use App\Utils\GlobalConstant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        set_page_meta('Dashboard');

        //changing promo code status

        $promos = Promo::whereDate('end_date', '<', now())->where('status','=',Promo::STATUS_ACTIVE)->get();
//        $promos = Promo::where(function ($query) use ($today){
//            $query->where('end_date', '<=', $today);
//        })->get();
        if ($promos->count() > 0) {
            foreach ($promos as $promo){
                $promo->status = Promo::STATUS_EXPIRED;
                $promo->save();
            }
        }

//        return $promos;
        //temporary for fixing;
//        $altPromos = Promo::whereDate('end_date', '>', now())->where('status','=',Promo::STATUS_EXPIRED)->get();
//        if ($altPromos->count() > 0) {
//            foreach ($altPromos as $promo){
//                $promo->status = Promo::STATUS_ACTIVE;
//                $promo->save();
//            }
//        }

        $today      = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();

        /* =========================================================
         * 1. KPI CARDS
         * ========================================================= */

        $kpi = [
            'total_orders'       => Entry::count(),
            'orders_today'       => Entry::whereDate('created_at', $today)->count(),
            'orders_this_month'  => Entry::where('created_at', '>=', $monthStart)->count(),

            'total_items'        => EntryItems::count(),
            'items_today'        => EntryItems::whereDate('created_at', $today)->count(),

            'awaiting_receiving' => EntryItems::where('status', GlobalConstant::STATUS_NOT_RECEIVED)->count(),
            'awaiting_grading'   => EntryItems::where('status', GlobalConstant::STATUS_RECEIVED)->count(),

            // No graded_at column, so updated_at is used as graded time
            'graded_today'       => EntryItems::where('status', GlobalConstant::STATUS_GRADED)
                ->whereDate('updated_at', $today)->count(),
            'graded_this_month'  => EntryItems::where('status', GlobalConstant::STATUS_GRADED)
                ->where('updated_at', '>=', $monthStart)->count(),

            'labels_to_print'    => Label::where(function ($query) {
                $query->whereNull('status')
                    ->orWhere('status', '!=', GlobalConstant::STATUS_PRINTED);
            })->count(),

            'active_customers'   => Entry::where('created_at', '>=', Carbon::now()->subDays(30))
                ->whereNotNull('customer_id')
                ->distinct()
                ->count('customer_id'),
        ];

        /* =========================================================
         * 2. WORKFLOW PIPELINE
         * ========================================================= */

        $orderStatusCounts = Entry::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $pipeline = [
            [
                'title'  => 'Entry',
                'icon'   => 'mdi mdi-clipboard-text-outline',
                'color'  => 'primary',
                'orders' => (int) ($orderStatusCounts[GlobalConstant::STATUS_NOT_RECEIVED] ?? 0),
                'items'  => $kpi['awaiting_receiving'],
                'note'   => 'Waiting to be received',
                'url'    => route('admin.entries.index'),
            ],
            [
                'title'  => 'Receiving',
                'icon'   => 'mdi mdi-inbox-arrow-down',
                'color'  => 'info',
                'orders' => (int) ($orderStatusCounts[GlobalConstant::STATUS_RECEIVING_IN_PROGRESS] ?? 0),
                'items'  => null,
                'note'   => 'Receiving in progress',
                'url'    => route('admin.receiving.index'),
            ],
            [
                'title'  => 'Grading',
                'icon'   => 'mdi mdi-star-check-outline',
                'color'  => 'warning',
                'orders' => (int) ($orderStatusCounts[GlobalConstant::STATUS_RECEIVED] ?? 0)
                    + (int) ($orderStatusCounts[GlobalConstant::STATUS_GRADING_IN_PROGRESS] ?? 0),
                'items'  => $kpi['awaiting_grading'],
                'note'   => 'Received & grading in progress',
                'url'    => route('admin.grading.index'),
            ],
            [
                'title'  => 'Label',
                'icon'   => 'mdi mdi-printer',
                'color'  => 'success',
                'orders' => (int) ($orderStatusCounts[GlobalConstant::STATUS_GRADED] ?? 0),
                'items'  => $kpi['labels_to_print'],
                'note'   => 'Graded orders / labels to print',
                'url'    => route('admin.label.index'),
            ],
        ];

        /* =========================================================
         * 3. CHARTS
         * ========================================================= */

        // --- Orders / Items per day (last 30 days) ---
        $start = Carbon::today()->subDays(29);

        $ordersPerDay = $this->countBy(
            Entry::where('created_at', '>=', $start)->selectRaw('DATE(created_at) as day'),
            'day'
        );

        $itemsPerDay = $this->countBy(
            EntryItems::where('created_at', '>=', $start)->selectRaw('DATE(created_at) as day'),
            'day'
        );

        $dailyChart = ['labels' => [], 'orders' => [], 'items' => []];

        for ($date = $start->copy(); $date->lte(Carbon::today()); $date->addDay()) {
            $key = $date->format('Y-m-d');
            $dailyChart['labels'][] = $date->format('d M');
            $dailyChart['orders'][] = (int) ($ordersPerDay[$key] ?? 0);
            $dailyChart['items'][]  = (int) ($itemsPerDay[$key] ?? 0);
        }

        // --- Item type breakdown ---
        $itemTypeChart = $this->countBy(
            EntryItems::selectRaw("COALESCE(NULLIF(itemType, ''), 'Unknown') as type"),
            'type'
        );
        $itemTypeChart = collect($itemTypeChart)->sortDesc();

        // --- Grade distribution (graded items only) ---
        $gradeSql = $this->gradeCase('entry_items');

        $gradeCounts = $this->countBy(
            EntryItems::where('entry_items.status', GlobalConstant::STATUS_GRADED)
                ->selectRaw("{$gradeSql} as grade"),
            'grade'
        );

        $gradeOrder = [
            '10', '9.5', '9', '8.5', '8', '7.5', '7', '6.5', '6', '5.5', '5',
            '4.5', '4', '3.5', '3', '2.5', '2', '1.5', '1',
            'A', 'AA', 'AC', 'AT', 'N1', 'N2', 'N3', 'N4', 'N5', 'N6', 'N7', 'N8',
        ];

        // labels/values arrays keep the grade order in JS ("10", "9.5" ... not re-sorted)
        $gradeChart = ['labels' => [], 'values' => []];
        foreach ($gradeOrder as $grade) {
            if (isset($gradeCounts[$grade])) {
                $gradeChart['labels'][] = $grade;
                $gradeChart['values'][] = (int) $gradeCounts[$grade];
            }
        }
        // Any other grade values (old data)
        foreach ($gradeCounts as $grade => $total) {
            if (!in_array((string) $grade, $gradeOrder, true)) {
                $gradeChart['labels'][] = (string) $grade;
                $gradeChart['values'][] = (int) $total;
            }
        }

        // --- Autographed vs Non-autographed (Reholder excluded) ---
        $autoSql = $this->typeCase('autographed', 'entry_items');

        $autographed = EntryItems::whereNotNull('itemType')
            ->where('itemType', '!=', 'Reholder')
            ->selectRaw("
                SUM(CASE WHEN ({$autoSql}) IN ('1', 'true') THEN 1 ELSE 0 END) as yes_total,
                SUM(CASE WHEN ({$autoSql}) IN ('1', 'true') THEN 0 ELSE 1 END) as no_total
            ")
            ->first();

        $autographedChart = [
            'Autographed'     => (int) ($autographed->yes_total ?? 0),
            'Non-autographed' => (int) ($autographed->no_total ?? 0),
        ];

        // --- Authenticator (items with an authenticator selected) ---
        $authSql = $this->typeCase('authenticator_name', 'entry_items');

        $authenticatorCounts = $this->countBy(
            EntryItems::selectRaw("{$authSql} as authenticator_id"),
            'authenticator_id'
        );

        $authenticatorNames = Authenticator::pluck('name', 'id');

        $authenticatorChart = [];
        foreach ($authenticatorCounts as $authenticatorId => $total) {
            $name = $authenticatorNames[$authenticatorId] ?? 'Unknown';
            $authenticatorChart[$name] = ($authenticatorChart[$name] ?? 0) + (int) $total;
        }
        arsort($authenticatorChart);

        // --- Payment method ---
        $paymentLabels = [
            'pym' => 'Payment Made',
            'pop' => 'Pay on Pickup',
            'cod' => 'COD',
            'n/a' => 'N/A',
        ];

        $paymentCounts = $this->countBy(
            Entry::selectRaw("COALESCE(NULLIF(payment_method, ''), 'not-set') as method"),
            'method'
        );

        $paymentChart = [];
        foreach ($paymentCounts as $method => $total) {
            $label = $paymentLabels[$method] ?? ($method === 'not-set' ? 'Not Set' : ucfirst($method));
            $paymentChart[$label] = (int) $total;
        }

        /* =========================================================
         * 4. ACTION LISTS
         * ========================================================= */

        // --- Oldest pending orders ---
        $pendingStatuses = [
            GlobalConstant::STATUS_NOT_RECEIVED,
            GlobalConstant::STATUS_RECEIVING_IN_PROGRESS,
            GlobalConstant::STATUS_RECEIVED,
            GlobalConstant::STATUS_GRADING_IN_PROGRESS,
        ];

        $oldestPending = Entry::select(['id', 'entrySKU', 'customer_name', 'status', 'created_at'])
            ->whereIn('status', $pendingStatuses)
            ->withCount('items')
            ->orderBy('created_at', 'ASC')
            ->limit(10)
            ->get()
            ->map(function ($entry) {
                $isReceiving = in_array($entry->status, [
                    GlobalConstant::STATUS_NOT_RECEIVED,
                    GlobalConstant::STATUS_RECEIVING_IN_PROGRESS,
                ]);

                $entry->days_pending = $entry->created_at
                    ? $entry->created_at->copy()->startOfDay()->diffInDays(Carbon::today())
                    : 0;
                $entry->stage = $isReceiving ? 'Receiving' : 'Grading';
                $entry->url   = $isReceiving
                    ? route('admin.receiving.edit', $entry->id)
                    : route('admin.grading.edit', $entry->id);

                return $entry;
            });

        // --- Recently graded items ---
        $recentlyGraded = EntryItems::join('entries', 'entries.id', '=', 'entry_items.entry_id')
            ->where('entry_items.status', GlobalConstant::STATUS_GRADED)
            ->selectRaw("
                entry_items.id,
                entry_items.itemType,
                entry_items.grading_cert_number,
                entry_items.updated_at,
                {$gradeSql} as grade,
                entries.customer_name,
                entries.entrySKU
            ")
            ->orderByDesc('entry_items.updated_at')
            ->limit(8)
            ->get();

        // --- Top customers (by item count) ---
        $topCustomers = DB::table('entries')
            ->leftJoin('entry_items', 'entry_items.entry_id', '=', 'entries.id')
            ->whereNotNull('entries.customer_id')
            ->selectRaw('
                entries.customer_id,
                MAX(entries.customer_name) as customer_name,
                COUNT(DISTINCT entries.id) as orders_count,
                COUNT(entry_items.id) as items_count
            ')
            ->groupBy('entries.customer_id')
            ->orderByDesc('items_count')
            ->limit(6)
            ->get();

        // --- Active promos + usage ---
        $promoUsage = Entry::whereNotNull('promo_code')
            ->where('promo_code', '!=', '')
            ->selectRaw('promo_code, COUNT(*) as total')
            ->groupBy('promo_code')
            ->pluck('total', 'promo_code');

        $activePromos = Promo::where('status', Promo::STATUS_ACTIVE)
            ->orderBy('end_date', 'ASC')
            ->get()
            ->map(function ($promo) use ($promoUsage) {
                $promo->used_count = (int) ($promoUsage[(string) $promo->id] ?? 0);
                return $promo;
            });

        return view('admin.dashboard.index', compact(
            'kpi',
            'pipeline',
            'dailyChart',
            'itemTypeChart',
            'gradeChart',
            'autographedChart',
            'authenticatorChart',
            'paymentChart',
            'oldestPending',
            'recentlyGraded',
            'topCustomers',
            'activePromos'
        ));
    }

    /**
     * Count rows of a sub query by one column.
     * Uses a derived table so it works with ONLY_FULL_GROUP_BY (MySQL / MariaDB).
     */
    private function countBy($subQuery, string $column)
    {
        return DB::query()
            ->fromSub($subQuery, 'sub')
            // CAST to CHAR so DATE columns are not compared with '' (MySQL 8 strict error)
            ->whereRaw("NULLIF(CAST(`{$column}` AS CHAR), '') IS NOT NULL")
            ->selectRaw("`{$column}`, COUNT(*) as total")
            ->groupBy($column)
            ->pluck('total', $column);
    }

    /**
     * Pick the column for the item's own type.
     * Example: typeCase('autographed') -> card_autographed / combined_service_autographed ...
     */
    private function typeCase(string $suffix, string $table = 'entry_items'): string
    {
        return "(CASE
            WHEN {$table}.itemType LIKE 'Card%' OR {$table}.itemType = 'Index Card' THEN {$table}.card_{$suffix}
            WHEN {$table}.itemType LIKE 'Combined Service%' THEN {$table}.combined_service_{$suffix}
            WHEN {$table}.itemType = 'Autograph Authentication' THEN {$table}.auto_authentication_{$suffix}
            WHEN {$table}.itemType = 'Crossover' THEN {$table}.crossover_{$suffix}
            ELSE NULL
        END)";
    }

    /**
     * Item grade column for each item type.
     */
    private function gradeCase(string $table = 'entry_items'): string
    {
        return "(CASE
            WHEN {$table}.itemType LIKE 'Card%' OR {$table}.itemType = 'Index Card' THEN {$table}.card_item_grade
            WHEN {$table}.itemType LIKE 'Combined Service%' THEN {$table}.combined_service_item_grade
            WHEN {$table}.itemType = 'Autograph Authentication' THEN {$table}.auto_authentication_grade
            WHEN {$table}.itemType = 'Crossover' THEN {$table}.crossover_item_grade
            WHEN {$table}.itemType = 'Reholder' THEN {$table}.reholder_item_grade
            ELSE NULL
        END)";
    }
}
