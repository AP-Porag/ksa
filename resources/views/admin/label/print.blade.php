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
                                            <p> Customer Name: {{$order->customer_name}}</p>
                                        </div>



                                        <div class="ship_to col-3">
                                            <p> Online Order #{{$order->shopify_order_number? $order->shopify_order_number : 'N/A'}} </p>
                                        </div>



                                        <div class="order col-2">
                                            <p> Total Items: {{$items->count()}}</p>
                                        </div>

                                        <div class="order_2nd col-3">
                                           <p>Order #{{$order->entrySKU}}</p>
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
                                    <div class="col-sm-2 border-right py-2 px-0">Auto Certifier</div>
                                    <div class="col-sm-1 border-right py-2 px-0 ">Cert.# / On Card</div>
                                    <div class="col-sm-1 border-right py-2 px-0">Grade</div>
                                    <div class="col-sm-1 py-2 px-0">Auto Grade</div>
                                </div>


                                @if ($items->count() > 0)
                                    @foreach ($items as $item)
                                        <div class="row border border-top-0 table_row text-center">
                                            <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">{{ $loop->index + 1 }}</div>
                                            <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">{{$item->grading_cert_number}}</div>
                                            <div class="col-sm-2 border-right py-2 px-0 text-left pl-2">{{ $item->itemType }}</div>



                                            @if ($item->itemType == 'Card')
                                                <div class="col-sm-3 border-right py-2 px-0 text-left pl-2">
                                                    <span>{{ $item->card_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->card_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-2 border-right text-left pl-2">{{$item->cardAuthenticator?->name ?? 'N/A'}}</div>
                                                <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">
                                                    {{ $item->card_authenticator_cert_no ? $item->card_authenticator_cert_no: '' }}
                                                </div>
                                                <div class="col-sm-1 border-right">{{$item->card_item_grade}}</div>
                                                <div class="col-sm-1 border-right">{{$item->card_auto_grade}}</div>
                                            @endif

                                            @if ($item->itemType == 'Autograph Authentication')
                                                <div class="col-sm-3 border-right py-2 px-0 text-left pl-2">
                                                    <span>{{ $item->auto_authentication_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->auto_authentication_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-2 border-right text-left pl-2">{{$item->autoAuthenticator?->name ?? 'N/A'}}</div>
                                                <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">
                                                    {{ $item->auto_authentication_authenticator_cert_no ? $item->auto_authentication_authenticator_cert_no: '' }}
                                                </div>
                                                <div class="col-sm-1 border-right">{{$item->auto_authentication_grade}}</div>
                                                <div class="col-sm-1 border-right">{{$item->auto_authentication_auto_grade}}</div>
                                            @endif


                                            @if ($item->itemType == 'Combined Service')
                                                <div class="col-sm-3 border-right py-2 px-0 text-left pl-2">
                                                    <span>{{ $item->combined_service_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->combined_service_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-2 border-right text-left pl-2">{{$item->combinedServiceAuthenticator?->name ?? 'N/A'}}</div>
                                                <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">
                                                    {{ $item->combined_service_authenticator_cert_no ? $item->combined_service_authenticator_cert_no: '' }}
                                                </div>
                                                <div class="col-sm-1 border-right">{{$item->combined_service_item_grade}}</div>
                                                <div class="col-sm-1 border-right">{{$item->combined_service_auto_grade}}</div>
                                            @endif

                                            @if ($item->itemType == 'Reholder')
                                                <div class="col-sm-3 border-right py-2 px-0 text-left pl-2">
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                    <br>
                                                    <span>N/A</span>
                                                </div>
                                                <div class=" col-sm-2 border-right text-left pl-2">N/A</div>
                                                <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">
                                                    N/A
                                                </div>
                                                <div class="col-sm-1 border-right">{{$item->reholder_item_grade}}</div>
                                                <div class="col-sm-1 border-right">{{$item->reholder_auto_grade}}</div>
                                            @endif

                                            @if ($item->itemType == 'Crossover')
                                                <div class="col-sm-3 border-right py-2 px-0 text-left pl-2">
                                                    <span>{{ $item->crossover_description_one }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_two }}</span>
                                                    <br>
                                                    <span>{{ $item->crossover_description_three }}</span>
                                                </div>
                                                <div class=" col-sm-2 border-right text-left pl-2">{{$item->crossoverAuthenticator?->name ?? 'N/A'}}</div>
                                                <div class="col-sm-1 border-right py-2 px-0 text-left pl-2">
                                                    {{ $item->crossover_authenticator_cert_no ? $item->crossover_authenticator_cert_no: '' }}
                                                </div>
                                                <div class="col-sm-1 border-right">{{$item->crossover_item_grade}}</div>
                                                <div class="col-sm-1 border-right">{{$item->crossover_auto_grade}}</div>
                                            @endif

                                        </div>
                                    @endforeach
                                @endif
                            </div>
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
