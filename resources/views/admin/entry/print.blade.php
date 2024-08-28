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
    <link rel="stylesheet" href="{{asset('admin/css/print-style.css')}}">
    <link rel="stylesheet" href="print.css">
    <title>KSA</title>
</head>
<body>
<section>
    <div class="container">
        <div class="card" style="margin-bottom: 30px;">
            <div class="card-body d-flex justify-content-between">
                    <a href="{{route('admin.entries.index')}}" class="btn btn-danger">Cancel</a>

                    <button class="btn btn-success" onclick="window.print()">Print</button>
            </div>
        </div>
        <div class="card" style="margin-bottom: 70px;" id="contentToPrint">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg_for_page">
                            <div class="header d-flex justify-content-between align-items-center">
                                <div><img class="logo_image" src="{{asset('storage/settings/logo-sm.png')}}" alt=""></div>
                                <div><h1>ORDER</h1></div>
                            </div>
                            <div class="information">
                                <div class="row">
                                    <div class="bill_to col-4">
                                        <ul>
                                            <li class="bill_ul_child_1">BILL TO</li>
                                            <li class="bill_ul_child_2">iCert Inc.</li>
                                            <li>Elliott Frank!</li>
                                            <li>26 Ripley Ave</li>
                                            <li>Toronto, Ontario M6S 3N9</li>
                                            <li>Canada</li>
                                            <li class="some_num">416-436-3293</li>
                                            <li>inf@icertworld.com </li>
                                        </ul>
                                    </div>
                                    <div class="ship_to col-3">
                                        <ul>
                                            <li class="ship_ul_child_1"> SHIP TO </li>
                                            <li class="ship_ul_child_2">iCert Inc.</li>
                                            <li>26 Ripley Ave</li>
                                            <li> Ontario M6S 3N9</li>
                                            <li>Canada</li>
                                            <li class="some_num">607-677-0032 </li>
                                        </ul>
                                    </div>
                                    <div class="order col-5">
                                        <div class="row">
                                            <div class="col-6 number">Order Number :</div>
                                            <div class="col-6 input_num">23102</div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col-6 order_date">Order Date :</div>
                                            <div class="col-6 input_date">june 30, 2023</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 shipping">Shipping Method :</div>
                                            <div class="col-6 input_shipping">xxx</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-5" style="margin-right: 15px;margin-left: 15px;">
                            <div class="row border text-center table_row first_table_row">
                                <div class="col-sm-1 border-right py-2 px-0">No. </div>
                                <div class="col-sm-1 border-right py-2 px-0">Quantity</div>
                                <div class="col-sm-2 border-right py-2 px-0">Item Type</div>
                                <div class="col-sm-1 border-right py-2 px-0">Sub Type</div>
                                <div class="col-sm-3 border-right py-2 px-0">Description</div>
                                <div class="col-sm-2 border-right py-2 px-0">Autographed</div>
                                <div class="col-sm-2 py-2 px-0">Estimated Value $</div>
                            </div>
                            <div class="row border border-top-0 table_row text-center">
                                <div class="col-sm-1 border-right py-2 px-0">1</div>
                                <div class="col-sm-1 border-right py-2 px-0">1</div>
                                <div class="col-sm-2 border-right py-2 px-0">Card</div>
                                <div class="col-sm-1 border-right py-2 px-0">N/A</div>
                                <div class="col-sm-3 border-right py-2 px-0">1979-80 O-Pee-Chee #18 Wayne Gretzky Rookie Card</div>
                                <div class="col-sm-2 border-right py-2 px-0">No</div>
                                <div class="col-sm-2 py-2 px-0">2000</div>
                            </div>
                            <div class="row border table_row text-center">
                                <div class="col-sm-1 border-right py-2 px-0">2</div>
                                <div class="col-sm-1 border-right py-2 px-0">1</div>
                                <div class="col-sm-2 border-right py-2 px-0">Card</div>
                                <div class="col-sm-1 border-right py-2 px-0">N/A</div>
                                <div class="col-sm-3 border-right py-2 px-0">1979-80 O-Pee-Chee #18 Wayne Gretzky Rookie Card</div>
                                <div class="col-sm-2 border-right py-2 px-0">No</div>
                                <div class="col-sm-2 py-2 px-0">2000</div>
                            </div>
                            <div class="row border border-top-0 table_row text-center">
                                <div class="col-sm-1 border-right py-2 px-0">3</div>
                                <div class="col-sm-1 border-right py-2 px-0">1</div>
                                <div class="col-sm-2 border-right py-2 px-0">Card</div>
                                <div class="col-sm-1 border-right py-2 px-0">N/A</div>
                                <div class="col-sm-3 border-right py-2 px-0">1979-80 O-Pee-Chee #18 Wayne Gretzky Rookie Card</div>
                                <div class="col-sm-2 border-right py-2 px-0">No</div>
                                <div class="col-sm-2 py-2 px-0">2000</div>
                            </div>
                            <div class="row border table_row text-center">
                                <div class="col-sm-1 border-right py-2 px-0">4</div>
                                <div class="col-sm-1 border-right py-2 px-0">1</div>
                                <div class="col-sm-2 border-right py-2 px-0">Card</div>
                                <div class="col-sm-1 border-right py-2 px-0">N/A</div>
                                <div class="col-sm-3 border-right py-2 px-0">1979-80 O-Pee-Chee #18 Wayne Gretzky Rookie Card</div>
                                <div class="col-sm-2 border-right py-2 px-0">No</div>
                                <div class="col-sm-2 py-2 px-0">2000</div>
                            </div>
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
