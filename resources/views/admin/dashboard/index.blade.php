@extends('layouts.master')


@section('content')
    <div class="ksa-dashboard">

        {{-- =========================================================
             1. KPI CARDS
        ========================================================= --}}
        <div class="row g-3 mb-1">

            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card kpi-card mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-primary text-primary"><i class="mdi mdi-clipboard-text-outline"></i></div>
                        <div class="kpi-label">Total Orders</div>
                        <div class="kpi-value">{{ number_format($kpi['total_orders']) }}</div>
                        <div class="kpi-sub"><span class="text-success">+{{ $kpi['orders_today'] }}</span> today · {{ $kpi['orders_this_month'] }} this month</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card kpi-card mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-info text-info"><i class="mdi mdi-package-variant"></i></div>
                        <div class="kpi-label">Total Items</div>
                        <div class="kpi-value">{{ number_format($kpi['total_items']) }}</div>
                        <div class="kpi-sub"><span class="text-success">+{{ $kpi['items_today'] }}</span> today</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="{{ route('admin.receiving.index') }}" class="card kpi-card kpi-link mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-danger text-danger"><i class="mdi mdi-inbox-arrow-down"></i></div>
                        <div class="kpi-label">Awaiting Receiving</div>
                        <div class="kpi-value">{{ number_format($kpi['awaiting_receiving']) }}</div>
                        <div class="kpi-sub">items not received</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="{{ route('admin.grading.index') }}" class="card kpi-card kpi-link mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-warning text-warning"><i class="mdi mdi-star-check-outline"></i></div>
                        <div class="kpi-label">Awaiting Grading</div>
                        <div class="kpi-value">{{ number_format($kpi['awaiting_grading']) }}</div>
                        <div class="kpi-sub">received, not graded</div>
                    </div>
                </a>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card kpi-card mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-success text-success"><i class="mdi mdi-check-decagram"></i></div>
                        <div class="kpi-label">Graded Today</div>
                        <div class="kpi-value">{{ number_format($kpi['graded_today']) }}</div>
                        <div class="kpi-sub">{{ number_format($kpi['graded_this_month']) }} this month</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-sm-6">
                <a href="{{ route('admin.label.index') }}" class="card kpi-card kpi-link mb-0">
                    <div class="card-body">
                        <div class="kpi-icon bg-soft-dark text-dark"><i class="mdi mdi-printer"></i></div>
                        <div class="kpi-label">Labels to Print</div>
                        <div class="kpi-value">{{ number_format($kpi['labels_to_print']) }}</div>
                        <div class="kpi-sub"><i class="mdi mdi-account-group"></i> {{ $kpi['active_customers'] }} active customers (30d)</div>
                    </div>
                </a>
            </div>

        </div>

        {{-- =========================================================
             2. WORKFLOW PIPELINE
        ========================================================= --}}
        <div class="card mt-3">
            <div class="card-body">
                <div class="section-head">
                    <h4 class="card-title mb-0">Workflow Pipeline</h4>
                    <span class="section-hint">Where orders are waiting right now</span>
                </div>

                <div class="pipeline">
                    @foreach($pipeline as $stage)
                        <a href="{{ $stage['url'] }}" class="pipeline-stage stage-{{ $stage['color'] }}">
                            <div class="stage-top">
                                <span class="stage-icon"><i class="{{ $stage['icon'] }}"></i></span>
                                <span class="stage-title">{{ $stage['title'] }}</span>
                            </div>
                            <div class="stage-count">{{ number_format($stage['orders']) }} <small>orders</small></div>
                            <div class="stage-note">
                                @if(!is_null($stage['items']))
                                    <strong>{{ number_format($stage['items']) }}</strong>
                                    {{ $stage['title'] === 'Label' ? 'labels' : 'items' }} ·
                                @endif
                                {{ $stage['note'] }}
                            </div>
                        </a>
                        @if(!$loop->last)
                            <div class="pipeline-arrow"><i class="mdi mdi-chevron-right"></i></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- =========================================================
             3. CHARTS
        ========================================================= --}}
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Orders & Items</h4>
                            <span class="section-hint">Last 30 days</span>
                        </div>
                        <div class="chart-box chart-lg"><canvas id="dailyChart"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Item Types</h4>
                        </div>
                        <div class="chart-box chart-lg"><canvas id="itemTypeChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Grade Distribution</h4>
                            <span class="section-hint">Graded items</span>
                        </div>
                        <div class="chart-box"><canvas id="gradeChart"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Autographed</h4>
                            <span class="section-hint">Reholder excluded</span>
                        </div>
                        <div class="chart-box"><canvas id="autographedChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Items by Authenticator</h4>
                        </div>
                        <div class="chart-box"><canvas id="authenticatorChart"></canvas></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0">Payment Method</h4>
                            <span class="section-hint">Orders</span>
                        </div>
                        <div class="chart-box"><canvas id="paymentChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- =========================================================
             4. ACTION LISTS
        ========================================================= --}}
        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0"><i class="mdi mdi-clock-alert-outline text-danger"></i> Oldest Pending Orders</h4>
                            <span class="section-hint">Top 10</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table dash-table mb-0">
                                <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th class="text-center">Items</th>
                                    <th>Status</th>
                                    <th class="text-center">Days</th>
                                    <th class="text-end"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($oldestPending as $order)
                                    <tr>
                                        <td class="fw-semibold">{{ $order->entrySKU }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td class="text-center">{{ $order->items_count }}</td>
                                        <td><span class="status-pill status-{{ \Illuminate\Support\Str::slug($order->status) }}">{{ $order->status }}</span></td>
                                        <td class="text-center">
                                            <span class="days-pill {{ $order->days_pending >= 7 ? 'days-late' : ($order->days_pending >= 3 ? 'days-warn' : '') }}">
                                                {{ $order->days_pending }}d
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ $order->url }}" class="btn btn-sm btn-soft-primary">{{ $order->stage }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="empty-row">No pending order</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0"><i class="mdi mdi-check-decagram text-success"></i> Recently Graded</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table dash-table mb-0">
                                <thead>
                                <tr>
                                    <th>Cert #</th>
                                    <th>Item</th>
                                    <th class="text-center">Grade</th>
                                    <th>Customer</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recentlyGraded as $graded)
                                    <tr>
                                        <td class="fw-semibold">{{ $graded->grading_cert_number ?? '—' }}</td>
                                        <td>
                                            {{ $graded->itemType }}
                                            <div class="cell-sub">{{ $graded->entrySKU }}</div>
                                        </td>
                                        <td class="text-center">
                                            @if($graded->grade)
                                                <span class="grade-pill">{{ $graded->grade }}</span>
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $graded->customer_name }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="empty-row">No graded item yet</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0"><i class="mdi mdi-trophy-outline text-warning"></i> Top Customers</h4>
                            <span class="section-hint">By items</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table dash-table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th class="text-center">Orders</th>
                                    <th class="text-center">Items</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($topCustomers as $customer)
                                    <tr>
                                        <td><span class="rank-pill">{{ $loop->iteration }}</span></td>
                                        <td class="fw-semibold">{{ $customer->customer_name }}</td>
                                        <td class="text-center">{{ $customer->orders_count }}</td>
                                        <td class="text-center">{{ $customer->items_count }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="empty-row">No customer data</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="section-head">
                            <h4 class="card-title mb-0"><i class="mdi mdi-tag-outline text-info"></i> Active Promos</h4>
                            <a href="{{ route('admin.promos.index') }}" class="section-hint">View all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table dash-table mb-0">
                                <thead>
                                <tr>
                                    <th>Promo</th>
                                    <th>Value</th>
                                    <th>Ends</th>
                                    <th class="text-center">Used</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($activePromos as $promo)
                                    <tr>
                                        <td class="fw-semibold">{{ $promo->name }}</td>
                                        <td>{{ $promo->value }}</td>
                                        <td>
                                            @if($promo->end_date)
                                                {{ \Carbon\Carbon::parse($promo->end_date)->format('d M Y') }}
                                            @else
                                                <span class="text-muted">No end date</span>
                                            @endif
                                        </td>
                                        <td class="text-center"><span class="used-pill">{{ $promo->used_count }}</span></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="empty-row">No active promo</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('style')
    @include('includes.styles.datatable')

    <style>
        .ksa-dashboard {
            --ksa-primary: #556ee6;
            --ksa-info: #50a5f1;
            --ksa-warning: #f1b44c;
            --ksa-success: #34c38f;
            --ksa-danger: #f46a6a;
            --ksa-dark: #343a40;
            --ksa-muted: #74788d;
        }

        /* ---------- KPI ---------- */
        .ksa-dashboard .kpi-card {
            height: 100%;
            border: 0;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .ksa-dashboard .kpi-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .ksa-dashboard .kpi-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.08);
        }

        .ksa-dashboard .kpi-icon {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .ksa-dashboard .bg-soft-primary { background: rgba(85, 110, 230, 0.12); }
        .ksa-dashboard .bg-soft-info    { background: rgba(80, 165, 241, 0.12); }
        .ksa-dashboard .bg-soft-warning { background: rgba(241, 180, 76, 0.15); }
        .ksa-dashboard .bg-soft-success { background: rgba(52, 195, 143, 0.12); }
        .ksa-dashboard .bg-soft-danger  { background: rgba(244, 106, 106, 0.12); }
        .ksa-dashboard .bg-soft-dark    { background: rgba(52, 58, 64, 0.08); }

        .ksa-dashboard .kpi-label {
            font-size: 13px;
            color: var(--ksa-muted);
            margin-bottom: 2px;
        }

        .ksa-dashboard .kpi-value {
            font-size: 24px;
            font-weight: 600;
            color: #495057;
            line-height: 1.3;
        }

        .ksa-dashboard .kpi-sub {
            font-size: 12px;
            color: var(--ksa-muted);
            margin-top: 4px;
        }

        /* ---------- Section head ---------- */
        .ksa-dashboard .section-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
        }

        .ksa-dashboard .section-hint {
            font-size: 12px;
            color: var(--ksa-muted);
        }

        /* ---------- Pipeline ---------- */
        .ksa-dashboard .pipeline {
            display: flex;
            align-items: stretch;
            gap: 8px;
        }

        .ksa-dashboard .pipeline-stage {
            flex: 1 1 0;
            min-width: 0;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #eff2f7;
            border-top: 4px solid var(--stage-color);
            background: #fff;
            color: inherit;
            text-decoration: none;
            transition: background 0.15s ease, transform 0.15s ease;
        }

        .ksa-dashboard .pipeline-stage:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
        }

        .ksa-dashboard .stage-primary { --stage-color: var(--ksa-primary); }
        .ksa-dashboard .stage-info    { --stage-color: var(--ksa-info); }
        .ksa-dashboard .stage-warning { --stage-color: var(--ksa-warning); }
        .ksa-dashboard .stage-success { --stage-color: var(--ksa-success); }

        .ksa-dashboard .stage-top {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .ksa-dashboard .stage-icon {
            color: var(--stage-color);
            font-size: 20px;
            line-height: 1;
        }

        .ksa-dashboard .stage-title {
            font-weight: 600;
            color: #495057;
        }

        .ksa-dashboard .stage-count {
            font-size: 26px;
            font-weight: 600;
            color: #343a40;
            line-height: 1.2;
        }

        .ksa-dashboard .stage-count small {
            font-size: 13px;
            font-weight: 400;
            color: var(--ksa-muted);
        }

        .ksa-dashboard .stage-note {
            font-size: 12px;
            color: var(--ksa-muted);
            margin-top: 6px;
        }

        .ksa-dashboard .pipeline-arrow {
            display: flex;
            align-items: center;
            color: #ced4da;
            font-size: 26px;
        }

        /* ---------- Charts ---------- */
        .ksa-dashboard .chart-box {
            position: relative;
            height: 280px;
        }

        .ksa-dashboard .chart-lg {
            height: 320px;
        }

        .ksa-dashboard .chart-empty {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--ksa-muted);
            font-size: 13px;
        }

        /* ---------- Tables ---------- */
        .ksa-dashboard .dash-table {
            min-width: 480px;
        }

        .ksa-dashboard .dash-table thead th {
            background: #f8f9fa;
            color: #495057;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            border-bottom: 0;
            white-space: nowrap;
            padding: 10px 12px;
        }

        .ksa-dashboard .dash-table tbody td {
            font-size: 13px;
            vertical-align: middle;
            padding: 10px 12px;
            border-color: #eff2f7;
        }

        .ksa-dashboard .dash-table tbody tr:hover {
            background: #f8f9fa;
        }

        .ksa-dashboard .cell-sub {
            font-size: 11px;
            color: var(--ksa-muted);
        }

        .ksa-dashboard .empty-row {
            text-align: center;
            color: var(--ksa-muted);
            padding: 24px !important;
        }

        .ksa-dashboard .status-pill,
        .ksa-dashboard .days-pill,
        .ksa-dashboard .grade-pill,
        .ksa-dashboard .rank-pill,
        .ksa-dashboard .used-pill {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .ksa-dashboard .status-not-received            { background: rgba(244, 106, 106, 0.12); color: #d14b4b; }
        .ksa-dashboard .status-receiving-in-progress   { background: rgba(80, 165, 241, 0.14); color: #2a7fcf; }
        .ksa-dashboard .status-received                { background: rgba(241, 180, 76, 0.18); color: #b57f1c; }
        .ksa-dashboard .status-grading-in-progress     { background: rgba(85, 110, 230, 0.12); color: #3d56cf; }

        .ksa-dashboard .days-pill  { background: #f1f3f5; color: #495057; }
        .ksa-dashboard .days-warn  { background: rgba(241, 180, 76, 0.18); color: #b57f1c; }
        .ksa-dashboard .days-late  { background: rgba(244, 106, 106, 0.14); color: #d14b4b; }

        .ksa-dashboard .grade-pill { background: rgba(52, 195, 143, 0.14); color: #1f9a6c; font-size: 12px; }
        .ksa-dashboard .rank-pill  { background: rgba(85, 110, 230, 0.12); color: var(--ksa-primary); }
        .ksa-dashboard .used-pill  { background: rgba(80, 165, 241, 0.14); color: #2a7fcf; }

        .ksa-dashboard .btn-soft-primary {
            background: rgba(85, 110, 230, 0.12);
            color: var(--ksa-primary);
            border: 0;
        }

        .ksa-dashboard .btn-soft-primary:hover {
            background: var(--ksa-primary);
            color: #fff;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 991px) {
            .ksa-dashboard .pipeline {
                flex-wrap: wrap;
            }

            .ksa-dashboard .pipeline-stage {
                flex: 1 1 calc(50% - 8px);
            }

            .ksa-dashboard .pipeline-arrow {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .ksa-dashboard .pipeline-stage {
                flex: 1 1 100%;
            }

            .ksa-dashboard .chart-box,
            .ksa-dashboard .chart-lg {
                height: 240px;
            }
        }
    </style>
@endpush

@push('script')
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    {{-- <script src="{{ asset('/admin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/js/chartjs.init.js') }}"></script> --}}

    <script>
        (function () {
            'use strict';

            const COLORS = ['#556ee6', '#34c38f', '#f1b44c', '#50a5f1', '#f46a6a', '#343a40', '#9b7be8', '#2ec8c8', '#ff9f6b', '#74788d'];

            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            Chart.defaults.color = '#74788d';
            Chart.defaults.plugins.legend.labels.boxWidth = 12;

            const data = {
                daily:         @json($dailyChart),
                itemType:      @json($itemTypeChart),
                grade:         @json($gradeChart),
                autographed:   @json($autographedChart),
                authenticator: @json($authenticatorChart),
                payment:       @json($paymentChart),
            };

            function isEmpty(values) {
                return !values.length || values.every(v => Number(v) === 0);
            }

            function showEmpty(canvasId) {
                const canvas = document.getElementById(canvasId);
                if (!canvas) return;
                const empty = document.createElement('div');
                empty.className = 'chart-empty';
                empty.textContent = 'No data yet';
                canvas.parentNode.appendChild(empty);
                canvas.style.display = 'none';
            }

            function doughnut(canvasId, obj) {
                const labels = Object.keys(obj || {});
                const values = Object.values(obj || {});

                if (isEmpty(values)) return showEmpty(canvasId);

                new Chart(document.getElementById(canvasId), {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: COLORS,
                            borderWidth: 2,
                            borderColor: '#fff',
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '62%',
                        plugins: { legend: { position: 'bottom' } },
                    },
                });
            }

            function bar(canvasId, labels, values, color, horizontal) {

                if (isEmpty(values)) return showEmpty(canvasId);

                new Chart(document.getElementById(canvasId), {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Items',
                            data: values,
                            backgroundColor: color,
                            borderRadius: 4,
                            maxBarThickness: 34,
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        indexAxis: horizontal ? 'y' : 'x',
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { grid: { display: horizontal }, ticks: { precision: 0 } },
                            y: { grid: { display: !horizontal }, ticks: { precision: 0 }, beginAtZero: true },
                        },
                    },
                });
            }

            // Orders & Items per day
            if (isEmpty(data.daily.orders) && isEmpty(data.daily.items)) {
                showEmpty('dailyChart');
            } else {
                new Chart(document.getElementById('dailyChart'), {
                    type: 'line',
                    data: {
                        labels: data.daily.labels,
                        datasets: [
                            {
                                label: 'Orders',
                                data: data.daily.orders,
                                borderColor: '#556ee6',
                                backgroundColor: 'rgba(85, 110, 230, 0.10)',
                                fill: true,
                                tension: 0.35,
                                pointRadius: 2,
                            },
                            {
                                label: 'Items',
                                data: data.daily.items,
                                borderColor: '#34c38f',
                                backgroundColor: 'rgba(52, 195, 143, 0.08)',
                                fill: true,
                                tension: 0.35,
                                pointRadius: 2,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { mode: 'index', intersect: false },
                        plugins: { legend: { position: 'top', align: 'end' } },
                        scales: {
                            x: { grid: { display: false }, ticks: { maxTicksLimit: 10 } },
                            y: { beginAtZero: true, ticks: { precision: 0 } },
                        },
                    },
                });
            }

            doughnut('itemTypeChart', data.itemType);
            bar('gradeChart', data.grade.labels, data.grade.values, '#556ee6', false);
            doughnut('autographedChart', data.autographed);
            bar('authenticatorChart', Object.keys(data.authenticator || {}), Object.values(data.authenticator || {}), '#50a5f1', true);
            doughnut('paymentChart', data.payment);
        })();
    </script>
@endpush
