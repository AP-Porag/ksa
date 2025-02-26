@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="" style="padding-left: 30px;padding-right: 30px;">
                        <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                        <div class="d-flex justify-content-between">
                            <h5 class="card-title" style="font-size: 15px; margin-top: 15px;">{{$entry->customer_name}}</h5>
                            <h5 class="card-title" style="font-size: 15px; margin-top: 15px;">Order # {{$entry->entrySKU}}</h5>
                        </div>
                    </div>

                    <edit-entry
                        :products="{{json_encode($products)}}"
                        :customers="{{json_encode($allCustomers)}}"
                        :promos="{{json_encode($allPromos)}}"
                        :parties="{{json_encode($allThirdParties)}}"
                        :authenticators="{{json_encode($allAuthenticators)}}"
                        :item="{{json_encode($entry)}}"
                        :entries="{{json_encode($entryItems)}}"
                    />
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

@endpush
