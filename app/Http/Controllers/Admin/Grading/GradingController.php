<?php

namespace App\Http\Controllers\Admin\Grading;

use App\Http\Controllers\Controller;
use App\Models\Authenticator;
use App\Models\Customer;
use App\Models\Entry;
use App\Models\EntryItems;
use App\Models\Product;
use App\Models\Promo;
use App\Models\ThirdParty;
use App\Services\EntryService;
use App\Services\ReceivingService;
use App\Utils\GlobalConstant;
use Illuminate\Http\Request;

class GradingController extends Controller
{
    protected $receivingService;
    protected $entryService;

    public function __construct(ReceivingService $receivingService,EntryService $entryService)
    {
        $this->receivingService = $receivingService;
        $this->entryService = $entryService;
    }
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        set_page_meta('Grading');
        return view('admin.grading.index');
    }

    public function getOrderInfo(Request $request)
    {
        $entrySKU = $request->id;
        $order = Entry::where('entrySKU','=',$entrySKU)->with('customer')->first();

        if ($order){
            if ($order->status == GlobalConstant::STATUS_RECEIVED){
                return response()->json(['status'=>200,'message' => 'Ready for grading', 'data' => $order]);
            }else{
                if($order->status == GlobalConstant::STATUS_GRADING_IN_PROGRESS){
                    return response()->json(['status'=>200,'message' => 'Ready for grading', 'data' => $order]);
                }
                if ($order->status == GlobalConstant::STATUS_GRADED){
                    return response()->json(['status'=>201,'message' => 'Grading completed', 'data' => []]);
                }
                if ($order->status == GlobalConstant::STATUS_NOT_RECEIVED){
                    return response()->json(['status'=>202,'message' => 'Not ready for grading', 'data' => []]);
                }
                if ($order->status == GlobalConstant::STATUS_RECEIVING_IN_PROGRESS){
                    return response()->json(['status'=>202,'message' => 'Not ready for grading', 'data' => []]);
                }
            }
        }else{
            return response()->json(['status'=>301,'message' => 'Something went wrong', 'data' => []]);
        }
    }

    public function getOrderInfoByID($id)
    {
        set_page_meta('Create Grading');
//        $entryItems = EntryItems::where('entry_id',$id)->get();
        $allAuthenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();

        $entry = Entry::find($id);

        return view('admin.grading.create',compact('allAuthenticators','entry'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        set_page_meta('Order Grading');
        try {
            $entry = $this->entryService->get($id);
            $products = Product::orderBy('id','ASC')->get();
            $allCustomers = Customer::orderBy('id','DESC')->select('id','name')->get();
            $allPromos = Promo::orderBy('id','DESC')->select('id','name')->get();
            $allThirdParties = ThirdParty::orderBy('id','DESC')->select('id','name')->get();
            $allAuthenticators = Authenticator::orderBy('id','DESC')->select('id','name')->get();
            $entryItems = EntryItems::where('entry_id',$id)->orderBy('created_at', 'desc')->get();
            $allGrades=[
                [
                    'id'=>1,
                    'name'=>'0'
                ],

                [
                    'id'=>2,
                    'name'=>'1'
                ],
                [
                    'id'=>3,
                    'name'=>'1.5'
                ],
                [
                    'id'=>4,
                    'name'=>'2'
                ],
                [
                    'id'=>5,
                    'name'=>'2.5'
                ],
                [
                    'id'=>6,
                    'name'=>'3'
                ],
                [
                    'id'=>7,
                    'name'=>'3.5'
                ],
                [
                    'id'=>8,
                    'name'=>'4'
                ],
                [
                    'id'=>9,
                    'name'=>'4.5'
                ],
                [
                    'id'=>10,
                    'name'=>'5'
                ],
                [
                    'id'=>11,
                    'name'=>'5.5'
                ],
                [
                    'id'=>12,
                    'name'=>'6'
                ],
                [
                    'id'=>13,
                    'name'=>'6.5'
                ],
                [
                    'id'=>14,
                    'name'=>'7'
                ],
                [
                    'id'=>15,
                    'name'=>'7.5'
                ],
                [
                    'id'=>16,
                    'name'=>'8'
                ],
                [
                    'id'=>17,
                    'name'=>'8.5'
                ],
                [
                    'id'=>18,
                    'name'=>'9'
                ],
                [
                    'id'=>19,
                    'name'=>'9.5'
                ],
                [
                    'id'=>20,
                    'name'=>'10'
                ],
                [
                    'id'=>21,
                    'name'=>'10 (p)'
                ],
            ];

//        return $allThirdParties;
            return view('admin.grading.create',compact('products','allCustomers','allPromos','allThirdParties','allAuthenticators','entry','entryItems','allGrades'));
        } catch (\Exception $e) {
            log_error($e);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        try {
            $entries = $request->entries;
            $data = [
                "customer_id"=>$request->customerId,
                'customer_name'=>$request->name,
                'item_qty'=>$request->item_qty,
                'billing_address_line_one'=>$request->billing_address_line_one,
                'billing_address_line_two'=>$request->billing_address_line_two,
                'billing_country'=>$request->billing_country,
                'billing_province'=>$request->billing_province,
                'billing_city'=>$request->billing_city,
                'billing_postal'=>$request->billing_postal,
                'billing_phone'=>$request->billing_phone,
                'same_as_billing'=>$request->same_as_billing,
                'autographed'=>$request->autographed,
                'shipping_name'=>$request->shipping_name,
                'shipping_company_name'=>$request->shipping_company_name,
                'shipping_address_line_one'=>$request->shipping_address_line_one,
                'shipping_address_line_two'=>$request->shipping_address_line_two,
                'shipping_country'=>$request->shipping_country,
                'shipping_province'=>$request->shipping_province,
                'shipping_city'=>$request->shipping_city,
                'shipping_postal'=>$request->shipping_postal,
                'shipping_phone'=>$request->shipping_postal,
                'submission_date'=>$request->submission_date,
                'grading_location'=>$request->grading_location,
                'promo_code'=>$request->promo_code,
                'payment_method'=>$request->payment_method,
                'shopify_order_number'=>$request->shopify_order_number,
                'shipping_method'=>$request->shipping_method,
                'pickup_location'=>$request->pickup_location,
                'show_pickup_location'=>$request->show_pickup_location,
                'third_party_drop_center'=>$request->third_party_drop_center,
                'use_customer_account'=>$request->use_customer_account,
                'customer_account_number'=>$request->customer_account_number,
                'status'=>GlobalConstant::STATUS_GRADING_IN_PROGRESS,
            ];

            $en = $this->entryService->storeOrUpdate($data, $id);


            if ($en){

                $receivingData = [
                    "customer_id"=>$request->customerId,
                    "entry_id"=>$id,
//                    'item_qty'=>1,
                ];

                $receiving = $this->receivingService->storeOrUpdate($receivingData, null);
                foreach ($entries as $entry){
                    $item = EntryItems::find($entry['entryItemId']);
                    $item->entry_id = $entry['entryID'];
                    $item->itemType = $entry['itemType'];
                    //item type card
                    $item->card_description_one = $entry['card_description_one'];
                    $item->card_description_two = $entry['card_description_two'];
                    $item->card_description_three = $entry['card_description_three'];
                    $item->card_serial_number = $entry['card_serial_number'];
                    $item->card_autographed = $entry['card_autographed'];
                    $item->card_authenticator_name = $entry['card_authenticator_name'];
                    $item->card_authenticator_cert_no = $entry['card_authenticator_cert_no'];
                    $item->card_estimated_value = $entry['card_estimated_value'];
                    $item->card_auto_grade = $entry['card_auto_grade'];
                    $item->card_item_grade = $entry['card_item_grade'];

                    //item type auto authentication
                    $item->auto_authentication_description_one = $entry['auto_authentication_description_one'];
                    $item->auto_authentication_description_two = $entry['auto_authentication_description_two'];
                    $item->auto_authentication_description_three = $entry['auto_authentication_description_three'];
                    $item->auto_authentication_serial_number = $entry['auto_authentication_serial_number'];
                    $item->auto_authentication_autographed = $entry['auto_authentication_autographed'];
                    $item->auto_authentication_authenticator_name = $entry['auto_authentication_authenticator_name'];
                    $item->auto_authentication_authenticator_cert_no = $entry['auto_authentication_authenticator_cert_no'];
                    $item->auto_authentication_estimated_value = $entry['auto_authentication_estimated_value'];
                    $item->auto_authentication_grade = $entry['auto_authentication_grade'];
                    $item->auto_authentication_auto_grade = $entry['auto_authentication_auto_grade'];
                    //item type combined service
                    $item->combined_service_description_one = $entry['combined_service_description_one'];
                    $item->combined_service_description_two = $entry['combined_service_description_two'];
                    $item->combined_service_description_three = $entry['combined_service_description_three'];
                    $item->combined_service_serial_number = $entry['combined_service_serial_number'];
                    $item->combined_service_autographed = $entry['combined_service_autographed'];
                    $item->combined_service_authenticator_name = $entry['combined_service_authenticator_name'];
                    $item->combined_service_authenticator_cert_no = $entry['combined_service_authenticator_cert_no'];
                    $item->combined_service_estimated_value = $entry['combined_service_estimated_value'];
                    $item->combined_service_item_grade = $entry['combined_service_item_grade'];
                    $item->combined_service_auto_grade = $entry['combined_service_auto_grade'];

                    //item type combined service
                    $item->reholder_certification_number = $entry['reholder_certification_number'];
                    $item->reholder_estimated_value = $entry['reholder_estimated_value'];
                    $item->reholder_item_grade = $entry['reholder_item_grade'];
                    $item->reholder_auto_grade = $entry['reholder_auto_grade'];

                    //item type crossover
                    $item->crossover_description_one = $entry['crossover_description_one'];
                    $item->crossover_description_two = $entry['crossover_description_two'];
                    $item->crossover_description_three = $entry['crossover_description_three'];
                    $item->crossover_serial_number = $entry['crossover_serial_number'];
                    $item->crossover_autographed = $entry['crossover_autographed'];
                    $item->crossover_authenticator_name = $entry['crossover_authenticator_name'];
                    $item->crossover_authenticator_cert_no = $entry['crossover_authenticator_cert_no'];
                    $item->crossover_estimated_value = $entry['crossover_estimated_value'];
                    $item->crossover_item_type = $entry['crossover_item_type'];
                    $item->crossover_minimum_grade = $entry['crossover_minimum_grade'];
                    $item->crossover_item_grade = $entry['crossover_item_grade'];
                    $item->crossover_auto_grade = $entry['crossover_auto_grade'];
                    $item->status = GlobalConstant::STATUS_GRADED;
                    $item->pieces = 0;
                    $item->save();
                }
            }

            $response = ['status'=>200,'message'=>'Success','id'=>$id];

            return response()->json($response);
//            $entryData = $request->all();


//            record_updated_flash();
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateEntryToGraded($id)
    {

        $entry = Entry::find($id);
        $entry->status = GlobalConstant::STATUS_GRADED;
        $entry->save();

        $data = ['status'=>200,'message'=>'Successfully update','data'=>$id];
        return response()->json($data);
    }
}
