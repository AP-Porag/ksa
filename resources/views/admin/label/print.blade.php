<!-- index.html -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/print-label-style.css') }}">
    <link rel="stylesheet" href="print.css">
    <title>KSA</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="card button-div" style="margin-bottom: 30px;">
                <div class="card-body d-flex justify-content-between">
                    <a href="{{ route('admin.label.index') }}" class="btn btn-danger">Cancel</a>

                    <button class="btn btn-success" onclick="window.print()">Print</button>
                </div>
            </div>
            <div class="card outer-card" style="margin-bottom: 70px;" id="contentToPrint">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg_for_page">
                                <div class="header row">

                                    <div class="col-6 col-md-5 ksa_certification">
                                        <h2> KSA Certification</h2>
                                    </div>

                                    <div class="col-6 col-md-7 summary_report">
                                        <h4>Order Summary Report</h4>
                                    </div>

                                </div>



                                <div class="information">
                                    <div class="row information_row">
                                        <div class="bill_to col-4">

                                            <p> Customer Name: John Doe</p>

                                           <!-- <ul>
                                                <li class="bill_ul_child_1">BILL TO</li>
                                                <li class="bill_ul_child_2">
                                                    {{ $order->customer_name }}
                                                </li>
                                                <li>{{ $order->billing_address_line_one }}</li>
                                                @if ($order->billing_address_line_two)
                                                    <li>{{ $order->billing_address_line_two }}</li>
                                                @endif
                                                <li> {{ $order->billing_province }} {{ $order->billing_city }}
                                                    {{ $order->billing_postal }}
                                                </li>
                                                <li>{{ $order->billing_country }}</li>
                                                <li class="some_num">{{ $order->billing_phone }}</li>
                                                <li>{{ $order->customer->email }}</li>
                                            </ul>-->
                                        </div>



                                        <div class="ship_to col-3">

                                        <p> Online Order #1234 </p>

                                      <!--    <ul>
                                                <li class="ship_ul_child_1"> SHIP TO </li>
                                                <li class="ship_ul_child_2">
                                                    {{ $order->shipping_company_name ? $order->shipping_company_name : $order->customer_name }}
                                                </li>
                                                <li>{{ $order->shipping_address_line_one }}</li>
                                                @if ($order->shipping_address_line_two)
                                                    <li>{{ $order->shipping_address_line_two }}</li>
                                                @endif
                                                <li> {{ $order->shipping_province }} {{ $order->shipping_city }}
                                                    {{ $order->shipping_postal }}
                                                </li>
                                                <li>{{ $order->shipping_country }}</li>
                                                <li class="some_num">{{ $order->shipping_phone }}</li>
                                            </ul>   -->
                                        </div>



                                        <div class="order col-2">

                                        <p> Total Items: 12</p>

                                <!--        <div class="row">
                                                <div class="col-6 number">Order Number :</div>
                                                <div class="col-6 input_num">{{ $order->entrySKU }}</div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-6 order_date">Order Date :</div>
                                                <div class="col-6 input_date">{{ $order->created_at->format('m-d-Y') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 shipping">Shipping Method :</div>
                                                <div class="col-6 input_shipping">{{ $order->shipping_method }}</div>
                                            </div>  -->
                                        </div>

                                        <div class="order_2nd col-3">
                                           <p>Order #KSA12234</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">


                          <div class="mt-5" style="margin-right: 15px;margin-left: 15px;">

                                <div class="row text-center table_row first_table_row">
                                    <div class="col-sm-1 border-right py-2 px-0">No. </div>
                                    <div class="col-sm-1 border-right py-2 px-0">Cert.#</div>
                                    <div class="col-sm-2 border-right py-2 px-0">Item Type</div>
                                    <div class="col-sm-3 border-right py-2 px-0">Description</div>
                                    <div class="col-sm-1 border-right py-2 px-0">Auto Certifier</div>
                                    <div class="col-sm-1 border-right py-2 px-0 ">Cert.# / On Card</div>
                                    <div class="col-sm-1 border-right py-2 px-0">Grade</div>
                                    <div class="col-sm-2 py-2 px-0">Auto Grade</div>
                                </div>


                                @if ($items->count() > 0)
                                    @foreach ($items as $item)
                                        <div class="row border border-top-0 table_row text-center">
                                            <div class="col-sm-1 border-right py-2 px-0">{{ $loop->index + 1 }}</div>
                                            <div class="col-sm-1 border-right py-2 px-0">1</div>
                                            <div class="col-sm-2 border-right py-2 px-0">{{ $item->itemType }}</div>
                                           
                                           

                                            @if ($item->itemType == 'Card')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->card_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-1 border-right">JSA</div>
                                                <div class="col-sm-1 border-right py-2 px-0">
                                                    {{ $item->card_autographed == 1 ? 'Yes' : 'No' }}</div>
                                                    <div class="col-sm-1 border-right">10</div>
                                                    <div class="col-sm-2 border-right">10</div>
                                            @endif

                                            @if ($item->itemType == 'Autograph Authentication')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->auto_authentication_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-1 border-right">hello</div>
                                                <div class="col-sm-1 border-right py-2 px-0">
                                                    {{ $item->auto_authentication_autographed == 1 ? 'Yes' : 'No' }}
                                                </div>
                                                <div class="col-sm-1 border-right">10</div>
                                                    <div class="col-sm-2 border-right">10</div>
                                            @endif


                                            @if ($item->itemType == 'Combined Service')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->combined_service_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-1 border-right">hello</div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->combined_service_autographed == 1 ? 'Yes' : 'No' }}
                                                </div>
                                                <div class="col-sm-1 border-right">10</div>
                                                    <div class="col-sm-2 border-right">10</div>
                                            @endif

                                            @if ($item->itemType == 'Reholder')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                </div>
                                                <div class=" col-sm-1 border-right">hello</div>
                                                <div class="col-sm-2 border-right py-2 px-0">N/A</div>
                                                <div class="col-sm-1 border-right">10</div>
                                                    <div class="col-sm-2 border-right">10</div>
                                            @endif

                                            @if ($item->itemType == 'Crossover')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->crossover_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-1 border-right">hello</div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->crossover_autographed == 1 ? 'Yes' : 'No' }}
                                                </div>
                                                <div class="col-sm-1 border-right">10</div>
                                                    <div class="col-sm-2 border-right">10</div>
                                            @endif



                                        </div>
                                    @endforeach
                                @endif
                            </div>






                      <!--  <div class="mt-5" style="margin-right: 15px;margin-left: 15px;">

                                <div class="row border text-center table_row first_table_row">
                                    <div class="col-sm-1 border-right py-2 px-0">No. </div>
                                    <div class="col-sm-1 border-right py-2 px-0">Quantity</div>
                                    <div class="col-sm-2 border-right py-2 px-0">Item Type</div>
                                    <div class="col-sm-1 border-right py-2 px-0">Sub Type</div>
                                    <div class="col-sm-3 border-right py-2 px-0">Description</div>
                                    <div class="col-sm-2 border-right py-2 px-0">Autographed</div>
                                    <div class="col-sm-2 py-2 px-0">Estimated Value $</div>
                                </div>
                                @if ($items->count() > 0)
                                    @foreach ($items as $item)
                                        <div class="row border border-top-0 table_row text-center">
                                            <div class="col-sm-1 border-right py-2 px-0">{{ $loop->index + 1 }}</div>
                                            <div class="col-sm-1 border-right py-2 px-0">1</div>
                                            <div class="col-sm-2 border-right py-2 px-0">{{ $item->itemType }}</div>
                                            <div class="col-sm-1 border-right py-2 px-0">
                                                {{ $item->itemType == 'Crossover' ? $item->crossover_item_type : 'N/A' }}
                                            </div>

                                            @if ($item->itemType == 'Card')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->card_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_three }}</span>
                                                </div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->card_autographed == 1 ? 'Yes' : 'No' }}</div>
                                            @endif

                                            @if ($item->itemType == 'Autograph Authentication')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->auto_authentication_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_three }}</span>
                                                </div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->auto_authentication_autographed == 1 ? 'Yes' : 'No' }}
                                                </div>
                                            @endif


                                            @if ($item->itemType == 'Combined Service')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->combined_service_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_three }}</span>
                                                </div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->combined_service_autographed == 1 ? 'Yes' : 'No' }}</div>
                                            @endif

                                            @if ($item->itemType == 'Reholder')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                </div>
                                                <div class="col-sm-2 border-right py-2 px-0">N/A</div>
                                            @endif

                                            @if ($item->itemType == 'Crossover')
                                                <div class="col-sm-3 border-right py-2 px-0">
                                                    <span>{{ $item->crossover_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_three }}</span>
                                                </div>
                                                <div class="col-sm-2 border-right py-2 px-0">
                                                    {{ $item->crossover_autographed == 1 ? 'Yes' : 'No' }}</div>
                                            @endif




                                            {{-- <div class="col-sm-3 border-right py-2 px-0">1979-80 O-Pee-Chee #18 Wayne
                                                Gretzky
                                                Rookie Card</div>
                                            <div class="col-sm-2 border-right py-2 px-0">No</div> --}}


                                            @if ($item->itemType == 'Card')
                                                <div class="col-sm-2 py-2 px-0">{{ $item->card_estimated_value }}
                                                </div>
                                            @endif

                                            @if ($item->itemType == 'Autograph Authentication')
                                                <div class="col-sm-2 py-2 px-0">
                                                    {{ $item->auto_authentication_estimated_value }}
                                                </div>
                                            @endif


                                            @if ($item->itemType == 'Combined Service')
                                                <div class="col-sm-2 py-2 px-0">
                                                    {{ $item->combined_service_estimated_value }}
                                                </div>
                                            @endif

                                            @if ($item->itemType == 'Reholder')
                                                <div class="col-sm-2 py-2 px-0">{{ $item->reholder_estimated_value }}
                                                </div>
                                            @endif

                                            @if ($item->itemType == 'Crossover')
                                                <div class="col-sm-2 py-2 px-0">{{ $item->crossover_estimated_value }}
                                                </div>
                                            @endif




                                        </div>
                                    @endforeach
                                @endif
                            </div> -->





                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>
