@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3 text-capitalize">Order Details</h4>
                        <div class="">
                            <button type="button" class="btn btn-sm btn-primary text-capitalize" style="padding-top: 8px;" data-bs-toggle="modal" data-bs-target="#addNewItemModal">
                                Add new item
                            </button>
{{--                            <div class="modal fade" id="addNewItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-lg">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="staticBackdropLabel">Add New Item--}}
{{--                                            </h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="mb-4">--}}
{{--                                            <form action="{{route('admin.entries.add.new.item')}}" method="POST">--}}
{{--                                                @method('post')--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group mb-3">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-md-12">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-6">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                    Select the item type to be entered--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <select class="form-select mb-text-only" id="itemSelect" aria-label="Default select example" name="itemType">--}}
{{--                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                    <option value="Card">Card</option>--}}
{{--                                                                                    <option value="Autograph Authentication">Autograph Authentication</option>--}}
{{--                                                                                    <option value="Combined Service">Combined Service</option>--}}
{{--                                                                                    <option value="Reholder">Reholder</option>--}}
{{--                                                                                    <option value="Crossover">Crossover</option>--}}
{{--                                                                                </select>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-6 hidden-box" id="showItemTypeCrossoverBoxOne">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                    Crossover Item Type--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_item_type" id="crossover_item_type">--}}
{{--                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                    <option value="Card">Card</option>--}}
{{--                                                                                </select>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="col-md-12" id="warning_text_box">--}}
{{--                                                            <div class="alert alert-danger">--}}
{{--                                                                <strong>(*)</strong> Sign indicates required.--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!--item type card-->--}}
{{--                                                        <div class="col-md-12 hidden-box" id="showItemTypeCardBox">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-1">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Qty--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="1"--}}
{{--                                                                                    readonly--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="card_description_one"--}}
{{--                                                                                            id="card_description_one"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #2--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="card_description_two"--}}
{{--                                                                                            id="card_description_two"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #3--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="card_description_three"--}}
{{--                                                                                            id="card_description_three"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-6">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Serial Number   (Only if printed directly on item)--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="card_serial_number"--}}
{{--                                                                                            id="card_serial_number"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="row">--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                    Autographed--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="checkbox"--}}
{{--                                                                                                    class="form-check"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="card_autographed"--}}
{{--                                                                                                    id="card_autographed"--}}
{{--                                                                                                />--}}
{{--                                                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->--}}
{{--                                                                                                <!--                                                Same as Billing is required-->--}}
{{--                                                                                                <!--                                            </div>-->--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100 text-capitalize" for="card_authenticator_name">--}}
{{--                                                                                                    Authenticator Name--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="card_authenticator_name" id="card_authenticator_name">--}}
{{--                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                    @foreach($authenticators as $authenticator)--}}
{{--                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>--}}
{{--                                                                                                    @endforeach--}}
{{--                                                                                                </select>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100" for="card_authenticator_cert_no">--}}
{{--                                                                                                    Authenticator Cert. No.--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="text"--}}
{{--                                                                                                    class="form-control"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="card_authenticator_cert_no"--}}
{{--                                                                                                    id="card_authenticator_cert_no"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-2">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Estimated Value--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="0"--}}
{{--                                                                                    id="card_estimated_value"--}}
{{--                                                                                    name="card_estimated_value"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}


{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <!--item type auto authentication-->--}}
{{--                                                        <div class="col-md-12 hidden-box" id="showItemTypeAutoAthenticationBox">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-1">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Qty--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="1"--}}
{{--                                                                                    readonly--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="auto_authentication_description_one"--}}
{{--                                                                                            id="auto_authentication_description_one"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #2--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="auto_authentication_description_two"--}}
{{--                                                                                            id="auto_authentication_description_two"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #3--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="auto_authentication_description_three"--}}
{{--                                                                                            id="auto_authentication_description_three"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-6">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Serial Number   (Only if printed directly on item)--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="auto_authentication_serial_number"--}}
{{--                                                                                            id="auto_authentication_serial_number"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="row">--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                    Autographed--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="checkbox"--}}
{{--                                                                                                    class="form-check"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    checked--}}
{{--                                                                                                    name="auto_authentication_autographed"--}}
{{--                                                                                                    id="auto_authentication_autographed"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                    Authenticator Name--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="auto_authentication_authenticator_name" id="auto_authentication_authenticator_name">--}}
{{--                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                    @foreach($authenticators as $authenticator)--}}
{{--                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>--}}
{{--                                                                                                    @endforeach--}}
{{--                                                                                                </select>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100">--}}
{{--                                                                                                    Authenticator Cert. No.--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="number"--}}
{{--                                                                                                    class="form-control"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="auto_authentication_authenticator_cert_no"--}}
{{--                                                                                                    id="auto_authentication_authenticator_cert_no"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-2">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Estimated Value--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="number"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="0"--}}
{{--                                                                                    name="auto_authentication_estimated_value"--}}
{{--                                                                                    id="auto_authentication_estimated_value"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}


{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <!--item type combined service-->--}}
{{--                                                        <div class="col-md-12 hidden-box" id="showItemTypeCombinedServiceBox">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-1">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Qty--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="1"--}}
{{--                                                                                    readonly--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="combined_service_description_one"--}}
{{--                                                                                            id="combined_service_description_one"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #2--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="combined_service_description_two"--}}
{{--                                                                                            id="combined_service_description_two"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #3--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="combined_service_description_three"--}}
{{--                                                                                            id="combined_service_description_three"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-6">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Serial Number   (Only if printed directly on item)--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="row">--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                    Autographed--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="checkbox"--}}
{{--                                                                                                    class="form-check"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="combined_service_autographed"--}}
{{--                                                                                                    id="combined_service_autographed"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100 text-capitalize" for="combined_service_authenticator_name">--}}
{{--                                                                                                    Authenticator Name--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="combined_service_authenticator_name" id="combined_service_authenticator_name">--}}
{{--                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                    @foreach($authenticators as $authenticator)--}}
{{--                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>--}}
{{--                                                                                                    @endforeach--}}
{{--                                                                                                </select>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100" for="combined_service_authenticator_cert_no">--}}
{{--                                                                                                    Authenticator Cert. No.--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="text"--}}
{{--                                                                                                    class="form-control"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="combined_service_authenticator_cert_no"--}}
{{--                                                                                                    id="combined_service_authenticator_cert_no"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-2">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Estimated Value--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="0"--}}
{{--                                                                                    name="combined_service_estimated_value"--}}
{{--                                                                                    id="combined_service_estimated_value"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}


{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <!--item type reholder-->--}}
{{--                                                        <div class="col-md-12 hidden-box" id="showItemTypeReholderBox">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-1">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Qty--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    readonly--}}
{{--                                                                                    value="1"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Certification Number--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="reholder_certification_number"--}}
{{--                                                                                            id="reholder_certification_number"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-2">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Estimated Value--}}
{{--                                                                                    <span class="error">*</span>--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    value="0"--}}
{{--                                                                                    name="reholder_estimated_value"--}}
{{--                                                                                    id="reholder_estimated_value"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}


{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        <!--item type crossover-->--}}
{{--                                                        <div class="col-md-12 hidden-box" id="showItemTypeCrossoverBoxTwo">--}}
{{--                                                            <div class="card shipping_address_card">--}}
{{--                                                                <div class="card-body">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-md-1">--}}
{{--                                                                            <div class="mb-3">--}}
{{--                                                                                <label class="form-label w-100">--}}
{{--                                                                                    Qty--}}
{{--                                                                                </label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                    placeholder=""--}}
{{--                                                                                    readonly--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-9">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="crossover_description_one"--}}
{{--                                                                                            id="crossover_description_one"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #2--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="crossover_description_two"--}}
{{--                                                                                            id="crossover_description_two"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Description #3--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="crossover_description_three"--}}
{{--                                                                                            id="crossover_description_three"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-6">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Serial Number   (Only if printed directly on item)--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            name="crossover_serial_number"--}}
{{--                                                                                            id="crossover_serial_number"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}

{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="row">--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                    Autographed--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="checkbox"--}}
{{--                                                                                                    class="form-check"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="crossover_autographed"--}}
{{--                                                                                                    id="crossover_autographed"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100 text-capitalize" for="crossover_authenticator_name">--}}
{{--                                                                                                    Authenticator Name--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_authenticator_name" id="crossover_authenticator_name">--}}
{{--                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                    @foreach($authenticators as $authenticator)--}}
{{--                                                                                                        <option value="{{$authenticator->id}}" >{{$authenticator->name}}</option>--}}
{{--                                                                                                    @endforeach--}}
{{--                                                                                                </select>--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                        <div class="col-md-4">--}}
{{--                                                                                            <div class="mb-3">--}}
{{--                                                                                                <label class="form-label w-100" for="crossover_authenticator_cert_no">--}}
{{--                                                                                                    Authenticator Cert. No.--}}
{{--                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                </label>--}}
{{--                                                                                                <input--}}
{{--                                                                                                    type="text"--}}
{{--                                                                                                    class="form-control"--}}
{{--                                                                                                    placeholder=""--}}
{{--                                                                                                    name="crossover_authenticator_cert_no"--}}
{{--                                                                                                    id="crossover_authenticator_cert_no"--}}
{{--                                                                                                />--}}
{{--                                                                                            </div>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                        <div class="col-md-2">--}}
{{--                                                                            <div class="row">--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100">--}}
{{--                                                                                            Estimated Value--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <input--}}
{{--                                                                                            type="text"--}}
{{--                                                                                            class="form-control"--}}
{{--                                                                                            placeholder=""--}}
{{--                                                                                            value="0"--}}
{{--                                                                                            name="crossover_estimated_value"--}}
{{--                                                                                            id="crossover_estimated_value"--}}
{{--                                                                                        />--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="col-md-12">--}}
{{--                                                                                    <div class="mb-3">--}}
{{--                                                                                        <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                            Minimum Grade--}}
{{--                                                                                            <span class="error">*</span>--}}
{{--                                                                                        </label>--}}
{{--                                                                                        <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_minimum_grade" id="crossover_minimum_grade">--}}
{{--                                                                                            <option selected disabled>Open this select menu</option>--}}
{{--                                                                                            @foreach($grades as $grade)--}}
{{--                                                                                                <option value="{{$grade['name']}}">{{$grade['name']}}</option>--}}
{{--                                                                                            @endforeach--}}
{{--                                                                                        </select>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <p class="quantity-warning-text text-danger" id="quantity-warning-text">Quantity is required</p>--}}
{{--                                                    <input type="number" hidden="" class="form-control" name="entry_id" value="{{$entry->id}}" style="width: 33%;margin: 0 auto;">--}}
{{--                                                    <input type="number" hidden="" class="form-control" name="item_name" value="Card" style="width: 33%;margin: 0 auto;">--}}
{{--                                                </div>--}}
{{--                                                <div class="w-100 d-flex justify-content-end">--}}
{{--                                                    <button type="submit" id="add_item_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>--}}
{{--                                                    <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.modal-content -->--}}
{{--                                </div>--}}
{{--                                <!-- /.modal-dialog -->--}}
{{--                            </div>--}}
                            <!-- =========================================================
     ADD NEW ITEM MODAL
========================================================= -->
                            <div class="modal fade item-modal"
                                 id="addNewItemModal"
                                 tabindex="-1"
                                 aria-labelledby="item-modalLabel"
                                 aria-hidden="true">

                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">

                                        <!-- Header -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="item-modalLabel">
                                                Add New Item
                                            </h5>

                                            <button type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>

                                        <!-- Form -->
                                        <form action="{{ route('admin.entries.add.new.item') }}"
                                              method="POST"
                                              id="addNewItemForm">

                                            @csrf

                                            <input type="hidden"
                                                   name="entry_id"
                                                   value="{{ $entry->id }}">

                                            <div class="modal-body">

                                                <!-- Item Type Selector -->
                                                <div class="item-type-panel">
                                                    <label for="itemSelect" class="form-label">
                                                        Select The Item Type To Be Entered
                                                        <span class="text-danger">*</span>
                                                    </label>

                                                    <select name="itemType"
                                                            id="itemSelect"
                                                            class="form-select"
                                                            required>

                                                        <option value="">Select Item Type</option>
                                                        <option value="Card">Card</option>
                                                        <option value="Card (No number)">Card (No number)</option>
                                                        <option value="Card Auto">Card (Autographed)</option>
                                                        <option value="Card Auto (No Number)">Card (Autographed) No Number</option>
                                                        <option value="Index Card">Index Card</option>
                                                        <option value="Combined Service">Combined Service</option>
                                                        <option value="Combined Service (No Number)">Combined Service (No Number)</option>
                                                        <option value="Reholder">Reholder</option>

                                                    </select>
                                                </div>


                                                <div class="item-detail-panel">
                                                    <!-- =================================================
                                                     CARD SECTION
                                                ================================================== -->
                                                    <div class="item-section"
                                                         id="showItemTypeCardBox"
                                                         data-section="card">

                                                        <div class="item-form-card">

                                                            <div class="item-layout">

                                                                <!-- Quantity -->
                                                                <div class="quantity-column">
                                                                    <div class="quantity-box">
                                                                        <div class="quantity-title">Quantity</div>
                                                                        <div class="quantity-value">1</div>
                                                                    </div>
                                                                </div>

                                                                <!-- Card Fields -->
                                                                <div class="details-column">

                                                                    <!-- Description #1 -->
                                                                    <div class="description-block">
                                                                        <div class="description-heading">
                                                                            Description #1
                                                                        </div>

                                                                        <div class="row g-2">
                                                                            <div class="col-md-2">
                                                                                <label for="card_year" class="field-label">
                                                                                    Year
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="card_year"
                                                                                       class="form-control">
                                                                            </div>

                                                                            <div class="col-md-10">
                                                                                <label for="card_manufacturer"
                                                                                       class="field-label">
                                                                                    Manufacturer
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="card_manufacturer"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden"
                                                                               name="card_description_one"
                                                                               id="card_description_one">
                                                                    </div>


                                                                    <!-- Description #2 -->
                                                                    <div class="description-block">
                                                                        <div class="description-heading">
                                                                            Description #2
                                                                        </div>

                                                                        <div class="row g-2">

                                                                            <div class="col-md-2"
                                                                                 data-number-field>
                                                                                <label for="card_number"
                                                                                       class="field-label">
                                                                                    Number
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="card_number"
                                                                                       class="form-control">
                                                                            </div>

                                                                            <div class="col-md-10"
                                                                                 data-player-field>
                                                                                <label for="card_player_name"
                                                                                       class="field-label">
                                                                                    Player Name
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="card_player_name"
                                                                                       class="form-control">
                                                                            </div>

                                                                        </div>

                                                                        <input type="hidden"
                                                                               name="card_description_two"
                                                                               id="card_description_two">
                                                                    </div>


                                                                    <!-- Description #3 -->
                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Description #3
                                                                        </label>

                                                                        <input type="text"
                                                                               name="card_description_three"
                                                                               class="form-control">
                                                                    </div>


                                                                    <!-- Serial Number -->
                                                                    <div class="serial-block">
                                                                        <label class="field-label">
                                                                            Serial Number (Only if printed directly on item)
                                                                        </label>

                                                                        <input type="text"
                                                                               name="card_serial_number"
                                                                               class="form-control">
                                                                    </div>


                                                                    <!-- Autograph Fields -->
                                                                    <div class="autograph-row"
                                                                         data-autograph-fields>

                                                                        <div class="autograph-checkbox">
                                                                            <label class="field-label"
                                                                                   for="card_autographed">
                                                                                Autographed
                                                                            </label>

                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   id="card_autographed"
                                                                                   name="card_autographed"
                                                                                   value="1">
                                                                        </div>

                                                                        <div class="autograph-authenticator">
                                                                            <label class="field-label"
                                                                                   for="card_authenticator_name">
                                                                                Authenticator Name
                                                                            </label>

                                                                            <select class="form-select"
                                                                                    id="card_authenticator_name"
                                                                                    name="card_authenticator_name">
                                                                                <option value="">Select</option>

                                                                                @foreach($authenticators as $authenticator)
                                                                                    <option value="{{ $authenticator->id }}">
                                                                                        {{ $authenticator->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="certified-checkbox">
                                                                            <label class="field-label"
                                                                                   for="card_certified_on_card">
                                                                                Certified On Card
                                                                            </label>

                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   id="card_certified_on_card"
                                                                                   name="card_certified_on_card"
                                                                                   value="1">
                                                                        </div>

                                                                        <div class="auth-cert-number">
                                                                            <label class="field-label"
                                                                                   for="card_authenticator_cert_no">
                                                                                Authenticator Cert. No.
                                                                            </label>

                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   id="card_authenticator_cert_no"
                                                                                   name="card_authenticator_cert_no">
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- =================================================
                                                         INDEX CARD SECTION
                                                    ================================================== -->
                                                    <div class="item-section"
                                                         id="showItemTypeIndexCardBox"
                                                         data-section="index-card">

                                                        <div class="item-form-card">

                                                            <div class="item-layout">

                                                                <div class="quantity-column">
                                                                    <div class="quantity-box">
                                                                        <div class="quantity-title">Quantity</div>
                                                                        <div class="quantity-value">1</div>
                                                                    </div>
                                                                </div>

                                                                <div class="details-column">

                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Description #1
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="card_description_one"
                                                                               id="index_card_description_one">
                                                                    </div>

                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Description #2
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="card_description_two"
                                                                               id="index_card_description_two">
                                                                    </div>

                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Description #3
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="card_description_three"
                                                                               id="index_card_description_three">
                                                                    </div>

                                                                    <div class="serial-block">
                                                                        <label class="field-label">
                                                                            Serial Number (Only if printed directly on item)
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="card_serial_number"
                                                                               id="index_card_serial_number">
                                                                    </div>

                                                                    <div class="autograph-row"
                                                                         data-autograph-fields>

                                                                        <div class="autograph-checkbox">
                                                                            <label class="field-label"
                                                                                   for="index_card_autographed">
                                                                                Autographed
                                                                            </label>

                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   id="index_card_autographed"
                                                                                   name="card_autographed"
                                                                                   value="1">
                                                                        </div>

                                                                        <div class="autograph-authenticator">
                                                                            <label class="field-label">
                                                                                Authenticator Name
                                                                            </label>

                                                                            <select class="form-select"
                                                                                    name="card_authenticator_name">
                                                                                <option value="">Select</option>

                                                                                @foreach($authenticators as $authenticator)
                                                                                    <option value="{{ $authenticator->id }}">
                                                                                        {{ $authenticator->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="auth-cert-number">
                                                                            <label class="field-label">
                                                                                Authenticator Cert. No.
                                                                            </label>

                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   name="card_authenticator_cert_no">
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- =================================================
                                                         COMBINED SERVICE SECTION
                                                    ================================================== -->
                                                    <div class="item-section"
                                                         id="showItemTypeCombinedServiceBox"
                                                         data-section="combined">

                                                        <div class="item-form-card">

                                                            <div class="item-layout">

                                                                <div class="quantity-column">
                                                                    <div class="quantity-box">
                                                                        <div class="quantity-title">Quantity</div>
                                                                        <div class="quantity-value">1</div>
                                                                    </div>
                                                                </div>

                                                                <div class="details-column">

                                                                    <!-- Description #1 -->
                                                                    <div class="description-block">
                                                                        <div class="description-heading">
                                                                            Description #1
                                                                        </div>

                                                                        <div class="row g-2">
                                                                            <div class="col-md-2">
                                                                                <label for="combined_service_year"
                                                                                       class="field-label">
                                                                                    Year
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="combined_service_year"
                                                                                       class="form-control">
                                                                            </div>

                                                                            <div class="col-md-10">
                                                                                <label for="combined_service_manufacturer"
                                                                                       class="field-label">
                                                                                    Manufacturer
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="combined_service_manufacturer"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden"
                                                                               name="combined_service_description_one"
                                                                               id="combined_service_description_one">
                                                                    </div>


                                                                    <!-- Description #2 -->
                                                                    <div class="description-block">
                                                                        <div class="description-heading">
                                                                            Description #2
                                                                        </div>

                                                                        <div class="row g-2">

                                                                            <div class="col-md-2"
                                                                                 data-number-field>
                                                                                <label for="combined_service_number"
                                                                                       class="field-label">
                                                                                    Player Name
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="combined_service_number"
                                                                                       class="form-control">
                                                                            </div>

                                                                            <div class="col-md-10"
                                                                                 data-player-field>
                                                                                <label for="combined_service_player_name"
                                                                                       class="field-label">
                                                                                    Player Name
                                                                                </label>

                                                                                <input type="text"
                                                                                       id="combined_service_player_name"
                                                                                       class="form-control">
                                                                            </div>

                                                                        </div>

                                                                        <input type="hidden"
                                                                               name="combined_service_description_two"
                                                                               id="combined_service_description_two">
                                                                    </div>


                                                                    <!-- Description #3 -->
                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Description #3
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="combined_service_description_three">
                                                                    </div>


                                                                    <!-- Serial Number -->
                                                                    <div class="serial-block">
                                                                        <label class="field-label">
                                                                            Serial Number (Only if printed directly on item)
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="combined_service_serial_number">
                                                                    </div>


                                                                    <!-- Combined Service Autograph -->
                                                                    <div class="autograph-row">

                                                                        <div class="autograph-checkbox">
                                                                            <label class="field-label"
                                                                                   for="combined_service_autographed">
                                                                                Autographed
                                                                            </label>

                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   id="combined_service_autographed"
                                                                                   name="combined_service_autographed"
                                                                                   value="1">
                                                                        </div>

                                                                        <div class="autograph-authenticator">
                                                                            <label class="field-label"
                                                                                   for="combined_service_authenticator_name">
                                                                                Authenticator Name
                                                                            </label>

                                                                            <select class="form-select"
                                                                                    id="combined_service_authenticator_name"
                                                                                    name="combined_service_authenticator_name">
                                                                                <option value="">Select</option>

                                                                                @foreach($authenticators as $authenticator)
                                                                                    <option value="{{ $authenticator->id }}">
                                                                                        {{ $authenticator->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="certified-checkbox">
                                                                            <label class="field-label"
                                                                                   for="combined_service_certified_on_card">
                                                                                Certified On Card
                                                                            </label>

                                                                            <input type="checkbox"
                                                                                   class="form-check-input"
                                                                                   id="combined_service_certified_on_card"
                                                                                   name="combined_service_certified_on_card"
                                                                                   value="1">
                                                                        </div>

                                                                        <div class="auth-cert-number">
                                                                            <label class="field-label"
                                                                                   for="combined_service_authenticator_cert_no">
                                                                                Authenticator Cert. No.
                                                                            </label>

                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   id="combined_service_authenticator_cert_no"
                                                                                   name="combined_service_authenticator_cert_no">
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- =================================================
                                                         REHOLDER SECTION
                                                    ================================================== -->
                                                    <div class="item-section"
                                                         id="showItemTypeReholderBox"
                                                         data-section="reholder">

                                                        <div class="item-form-card">

                                                            <div class="item-layout">

                                                                <div class="quantity-column">
                                                                    <div class="quantity-box">
                                                                        <div class="quantity-title">Quantity</div>
                                                                        <div class="quantity-value">1</div>
                                                                    </div>
                                                                </div>

                                                                <div class="details-column">

                                                                    <div class="description-block">
                                                                        <label class="field-label">
                                                                            Certification Number
                                                                        </label>

                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="reholder_certification_number"
                                                                               id="reholder_certification_number">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <!-- Footer -->
                                            <div class="modal-footer">

                                                <button type="submit"
                                                        id="add_item_submit_btn"
                                                        class="btn btn-primary">
                                                    Confirm
                                                </button>

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal"
                                                        id="cancel_btn">
                                                    Cancel
                                                </button>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <a href="{{route('admin.entries.index')}}" class="btn btn-sm btn-secondary text-capitalize" style="padding-top: 8px;">Back to the list</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="card-title text-capitalize">{{$entry->customer_name}}</h5>
                                    <h5 class="card-title text-capitalize">Order # {{$entry->entrySKU}}</h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">

                                                <thead class="text-center">
                                                <tr>
                                                    <th>Item Type</th>
                                                    <th>Sub Type</th>
                                                    <th>Description</th>
                                                    <th>Autographed</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @if($items->count() > 0)
                                                    @foreach($items as $item)
                                                        <tr>
                                                            <td class="text-capitalize">{{$item->itemType}}</td>
                                                            <td>{{$item->itemType == 'Crossover' ? $item->crossover_item_type: 'N/A'}}</td>

                                                            @if($item->itemType == 'Card')
                                                                <td>
                                                                    <span>{{$item->card_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->card_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->card_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->card_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif


                                                            @if($item->itemType == 'Autograph Authentication')
                                                                <td>
                                                                    <span>{{$item->auto_authentication_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->auto_authentication_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->auto_authentication_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->auto_authentication_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif


                                                            @if($item->itemType == 'Combined Service')
                                                                <td>
                                                                    <span>{{$item->combined_service_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->combined_service_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->combined_service_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->combined_service_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif

                                                            @if($item->itemType == 'Reholder')
                                                                <td>
                                                                    <span>N/A</span>
                                                                    <br>
                                                                    <span>N/A</span>
                                                                    <br>
                                                                    <span>N/A</span>
                                                                </td>
                                                                <td class="text-center">N/A</td>
                                                            @endif

                                                            @if($item->itemType == 'Crossover')
                                                                <td>
                                                                    <span>{{$item->crossover_description_one}}</span>
                                                                    <br>
                                                                    <span>{{$item->crossover_description_two}}</span>
                                                                    <br>
                                                                    <span>{{$item->crossover_description_three}}</span>
                                                                </td>
                                                                <td class="text-center">{{$item->crossover_autographed == 1 ? 'Yes' : 'No'}}</td>
                                                            @endif
                                                            <td class="">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="" style="margin-right: 15px;">
                                                                        <button type="button" class="btn text-primary btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$item->id}}">
                                                                            <i class="fa fa-angle-double-up"></i>
                                                                        </button>
                                                                        <div class="modal fade" id="staticBackdrop-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    {{--                                                                    <div class="modal-header">--}}
                                                                                    {{--                                                                        <h5 class="modal-title" id="staticBackdropLabel">Multiple Qty--}}
                                                                                    {{--                                                                        </h5>--}}
                                                                                    {{--                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                                                                    {{--                                                                    </div>--}}
                                                                                    <div class="modal-body mt-3 text-center">
                                                                                        <div class="question-icon-box">
                                                                                            <i class="fa fa-question" style="color: #3d7cb1;font-size: 32px;"></i>
                                                                                        </div>
                                                                                        <span class="question-text" style="font-size: 24px;">
                                                                            How much additional pieces of <br>
                                                                            this item do you want to add?
                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mb-4 text-center">
                                                                                        <form action="{{route('admin.entries.addAdditional.pieces')}}" method="POST">
                                                                                            @method('POST')
                                                                                            @csrf
                                                                                            <div class="form-group mb-3">
                                                                                                <input type="number" id="quantity-input-box" class="form-control" name="pieces" style="width: 33%;margin: 0 auto;">
                                                                                                <p class="quantity-warning-text text-danger" id="quantity-warning-text">Quantity is required</p>
                                                                                                <input type="number" hidden=""  class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
{{--                                                                                                <input type="number" hidden="" class="form-control" name="item_name" value="Card" style="width: 33%;margin: 0 auto;">--}}
                                                                                            </div>
                                                                                            <button type="submit" id="extra_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                                            <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="" style="margin-right: 15px;">
                                                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editItemModal-{{$item->id}}">
                                                                            <i class="fa fa-edit" style="padding-top: 6px;padding-bottom: 6px;"></i>
                                                                        </button>
{{--                                                                        <div class="modal fade" id="staticBackdropEdit-{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">--}}
{{--                                                                            <div class="modal-dialog modal-lg">--}}
{{--                                                                                <div class="modal-content">--}}
{{--                                                                                    <div class="modal-header">--}}
{{--                                                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>--}}
{{--                                                                                    </div>--}}
{{--                                                                                    <div class="modal-body">--}}
{{--                                                                                        <div class="mb-4">--}}
{{--                                                                                            <form action="{{route('admin.entries.edit.new.item')}}" method="POST">--}}
{{--                                                                                                @method('post')--}}
{{--                                                                                                @csrf--}}
{{--                                                                                                <div class="form-group mb-3" style="text-align: left;">--}}
{{--                                                                                                    <div class="row">--}}
{{--                                                                                                        <div class="col-md-12">--}}
{{--                                                                                                            <div class="card shipping_address_card">--}}
{{--                                                                                                                <div class="card-body">--}}
{{--                                                                                                                    <div class="row">--}}
{{--                                                                                                                        <div class="col-md-6">--}}
{{--                                                                                                                            <div class="mb-3">--}}
{{--                                                                                                                                <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                    Select the item type to be entered--}}
{{--                                                                                                                                    <span class="error">*</span>--}}
{{--                                                                                                                                </label>--}}
{{--                                                                                                                                <input--}}
{{--                                                                                                                                    type="text"--}}
{{--                                                                                                                                    class="form-control"--}}
{{--                                                                                                                                    placeholder=""--}}
{{--                                                                                                                                    name="itemType"--}}
{{--                                                                                                                                    id="itemType"--}}
{{--                                                                                                                                    value="{{$item->itemType}}"--}}
{{--                                                                                                                                    readonly--}}
{{--                                                                                                                                />--}}
{{--                                                                                                                                <select class="form-select mb-text-only" id="itemSelect" aria-label="Default select example" name="itemType">--}}
{{--                                                                                                                                    <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                    <option value="Card" @if($item->itemType == "Card") selected @endif>Card</option>--}}
{{--                                                                                                                                    <option value="Auto Authentication" @if($item->itemType == "Auto Authentication") selected @endif>Auto Authentication</option>--}}
{{--                                                                                                                                    <option value="Combined Service" @if($item->itemType == "Combined Service") selected @endif>Combined Service</option>--}}
{{--                                                                                                                                    <option value="Reholder" @if($item->itemType == "Reholder") selected @endif>Reholder</option>--}}
{{--                                                                                                                                    <option value="Crossover" @if($item->itemType == "Crossover") selected @endif>Crossover</option>--}}
{{--                                                                                                                                </select>--}}
{{--                                                                                                                            </div>--}}
{{--                                                                                                                        </div>--}}
{{--                                                                                                                            <div class="col-md-6 {{$item->itemType == "Crossover" ? '' : 'hidden-box'}}" id="showEditItemTypeCrossoverBoxOne">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                        Crossover Item Type--}}
{{--                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_item_type" id="crossover_item_type">--}}
{{--                                                                                                                                        <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                        <option value="Card">Card</option>--}}
{{--                                                                                                                                    </select>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                        </div>--}}

{{--                                                                                                        <div class="col-md-12" id="edit_warning_text_box hidden-box">--}}
{{--                                                                                                            <div class="alert alert-danger">--}}
{{--                                                                                                                <strong>(*)</strong> Sign indicates required.--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                        </div>--}}

{{--                                                                                                            <!--item type card-->--}}
{{--                                                                                                            <div class="col-md-12 {{$item->itemType == "Card" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCardBox">--}}
{{--                                                                                                                <div class="card shipping_address_card">--}}
{{--                                                                                                                    <div class="card-body">--}}
{{--                                                                                                                        <div class="row">--}}
{{--                                                                                                                            <div class="col-md-1">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Qty--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        value="1"--}}
{{--                                                                                                                                        readonly--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-9">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="card_description_one"--}}
{{--                                                                                                                                                id="card_description_one"--}}
{{--                                                                                                                                                value="{{$item->card_description_one}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #2--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="card_description_two"--}}
{{--                                                                                                                                                id="card_description_two"--}}
{{--                                                                                                                                                value="{{$item->card_description_two}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #3--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="card_description_three"--}}
{{--                                                                                                                                                id="card_description_three"--}}
{{--                                                                                                                                                value="{{$item->card_description_three}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-6">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Serial Number   (Only if printed directly on item)--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="card_serial_number"--}}
{{--                                                                                                                                                id="card_serial_number"--}}
{{--                                                                                                                                                value="{{$item->card_serial_number}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="row">--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                                                                        Autographed--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="checkbox"--}}
{{--                                                                                                                                                        class="form-check"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="card_autographed"--}}
{{--                                                                                                                                                        id="card_autographed"--}}
{{--                                                                                                                                                        value="{{$item->card_autographed}}"--}}
{{--                                                                                                                                                        {{ $item->card_autographed == 1 ? 'checked' : '' }}--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                    <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->--}}
{{--                                                                                                                                                    <!--                                                Same as Billing is required-->--}}
{{--                                                                                                                                                    <!--                                            </div>-->--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                                        Authenticator Name--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="card_authenticator_name" id="card_authenticator_name">--}}
{{--                                                                                                                                                        <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                                        @foreach($authenticators as $authenticator)--}}
{{--                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->card_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>--}}
{{--                                                                                                                                                        @endforeach--}}

{{--                                                                                                                                                    </select>--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                                        Authenticator Cert. No.--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="text"--}}
{{--                                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="card_authenticator_cert_no"--}}
{{--                                                                                                                                                        id="card_authenticator_cert_no"--}}
{{--                                                                                                                                                        value="{{$item->card_authenticator_cert_no}}"--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-2">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Estimated Value--}}
{{--                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        id="card_estimated_value"--}}
{{--                                                                                                                                        name="card_estimated_value"--}}
{{--                                                                                                                                        value="{{$item->card_estimated_value}}"--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}


{{--                                                                                                                        </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}

{{--                                                                                                            <!--item type auto authentication-->--}}
{{--                                                                                                            <div class="col-md-12 {{$item->itemType == "Autograph Authentication" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeAutoAthenticationBox">--}}
{{--                                                                                                                <div class="card shipping_address_card">--}}
{{--                                                                                                                    <div class="card-body">--}}
{{--                                                                                                                        <div class="row">--}}
{{--                                                                                                                            <div class="col-md-1">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Qty--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        value="1"--}}
{{--                                                                                                                                        readonly--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-9">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="auto_authentication_description_one"--}}
{{--                                                                                                                                                id="auto_authentication_description_one"--}}
{{--                                                                                                                                                value="{{$item->auto_authentication_description_one}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #2--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="auto_authentication_description_two"--}}
{{--                                                                                                                                                id="auto_authentication_description_two"--}}
{{--                                                                                                                                                value="{{$item->auto_authentication_description_two}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #3--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="auto_authentication_description_three"--}}
{{--                                                                                                                                                id="auto_authentication_description_three"--}}
{{--                                                                                                                                                value="{{$item->auto_authentication_description_three}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-6">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Serial Number   (Only if printed directly on item)--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="auto_authentication_serial_number"--}}
{{--                                                                                                                                                id="auto_authentication_serial_number"--}}
{{--                                                                                                                                                value="{{$item->auto_authentication_serial_number}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="row">--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                                                                        Autographed--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="checkbox"--}}
{{--                                                                                                                                                        class="form-check"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="auto_authentication_autographed"--}}
{{--                                                                                                                                                        id="auto_authentication_autographed"--}}
{{--                                                                                                                                                        value="{{$item->auto_authentication_autographed}}"--}}
{{--                                                                                                                                                        {{ $item->auto_authentication_autographed == 1 ? 'checked' : '' }}--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                                        Authenticator Name--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="auto_authentication_authenticator_name" id="auto_authentication_authenticator_name">--}}
{{--                                                                                                                                                        <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                                        @foreach($authenticators as $authenticator)--}}
{{--                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->auto_authentication_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>--}}
{{--                                                                                                                                                        @endforeach--}}
{{--                                                                                                                                                    </select>--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                                        Authenticator Cert. No.--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="number"--}}
{{--                                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="auto_authentication_authenticator_cert_no"--}}
{{--                                                                                                                                                        id="auto_authentication_authenticator_cert_no"--}}
{{--                                                                                                                                                        value="{{$item->auto_authentication_authenticator_cert_no}}"--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-2">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Estimated Value--}}
{{--                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="number"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        name="auto_authentication_estimated_value"--}}
{{--                                                                                                                                        id="auto_authentication_estimated_value"--}}
{{--                                                                                                                                        value="{{$item->auto_authentication_estimated_value}}"--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}


{{--                                                                                                                        </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}

{{--                                                                                                            <!--item type combined service-->--}}
{{--                                                                                                            <div class="col-md-12 {{$item->itemType == "Combined Service" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCombinedServiceBox">--}}
{{--                                                                                                                <div class="card shipping_address_card">--}}
{{--                                                                                                                    <div class="card-body">--}}
{{--                                                                                                                        <div class="row">--}}
{{--                                                                                                                            <div class="col-md-1">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Qty--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        value="1"--}}
{{--                                                                                                                                        readonly--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-9">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="combined_service_description_one"--}}
{{--                                                                                                                                                id="combined_service_description_one"--}}
{{--                                                                                                                                                value="{{$item->combined_service_description_one}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #2--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="combined_service_description_two"--}}
{{--                                                                                                                                                id="combined_service_description_two"--}}
{{--                                                                                                                                                value="{{$item->combined_service_description_two}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #3--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="combined_service_description_three"--}}
{{--                                                                                                                                                id="combined_service_description_three"--}}
{{--                                                                                                                                                value="{{$item->combined_service_description_three}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-6">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Serial Number   (Only if printed directly on item)--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="combined_service_serial_number"--}}
{{--                                                                                                                                                id="combined_service_serial_number"--}}
{{--                                                                                                                                                value="{{$item->combined_service_serial_number}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="row">--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                                                                        Autographed--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="checkbox"--}}
{{--                                                                                                                                                        class="form-check"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="combined_service_autographed"--}}
{{--                                                                                                                                                        id="combined_service_autographed"--}}
{{--                                                                                                                                                        value="{{$item->combined_service_autographed}}"--}}
{{--                                                                                                                                                        {{ $item->combined_service_autographed == 1 ? 'checked' : '' }}--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                                        Authenticator Name--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="combined_service_authenticator_name" id="combined_service_authenticator_name">--}}
{{--                                                                                                                                                        <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                                        @foreach($authenticators as $authenticator)--}}
{{--                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->combined_service_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>--}}
{{--                                                                                                                                                        @endforeach--}}
{{--                                                                                                                                                    </select>--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                                        Authenticator Cert. No.--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="text"--}}
{{--                                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="combined_service_authenticator_cert_no"--}}
{{--                                                                                                                                                        id="combined_service_authenticator_cert_no"--}}
{{--                                                                                                                                                        value="{{$item->combined_service_authenticator_cert_no}}"--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-2">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Estimated Value--}}
{{--                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        name="combined_service_estimated_value"--}}
{{--                                                                                                                                        id="combined_service_estimated_value"--}}
{{--                                                                                                                                        value="{{$item->combined_service_estimated_value}}"--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}


{{--                                                                                                                        </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                            <!--item type reholder-->--}}
{{--                                                                                                            <div class="col-md-12 {{$item->itemType == "Reholder" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeReholderBox">--}}
{{--                                                                                                                <div class="card shipping_address_card">--}}
{{--                                                                                                                    <div class="card-body">--}}
{{--                                                                                                                        <div class="row">--}}
{{--                                                                                                                            <div class="col-md-1">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Qty--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        readonly--}}
{{--                                                                                                                                        value="1"--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-9">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Certification Number--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="reholder_certification_number"--}}
{{--                                                                                                                                                id="reholder_certification_number"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-2">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Estimated Value--}}
{{--                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        value="0"--}}
{{--                                                                                                                                        name="reholder_estimated_value"--}}
{{--                                                                                                                                        id="reholder_estimated_value"--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}


{{--                                                                                                                        </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                         <!--item type crossover-->--}}
{{--                                                                                                        <div class="col-md-12 {{$item->itemType == "Crossover" ? 'show-box' : 'hidden-box'}}" id="showEditItemTypeCrossoverBoxTwo">--}}
{{--                                                                                                                <div class="card shipping_address_card">--}}
{{--                                                                                                                    <div class="card-body">--}}
{{--                                                                                                                        <div class="row">--}}
{{--                                                                                                                            <div class="col-md-1">--}}
{{--                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                        Qty--}}
{{--                                                                                                                                    </label>--}}
{{--                                                                                                                                    <input--}}
{{--                                                                                                                                        type="text"--}}
{{--                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                        readonly--}}
{{--                                                                                                                                    />--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-9">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #1   (Year,Manufacturer,Set,Other)--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="crossover_description_one"--}}
{{--                                                                                                                                                id="crossover_description_one"--}}
{{--                                                                                                                                                value="{{$item->crossover_description_one}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #2--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="crossover_description_two"--}}
{{--                                                                                                                                                id="crossover_description_two"--}}
{{--                                                                                                                                                value="{{$item->crossover_description_two}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Description #3--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="crossover_description_three"--}}
{{--                                                                                                                                                id="crossover_description_three"--}}
{{--                                                                                                                                                value="{{$item->crossover_description_three}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-6">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Serial Number   (Only if printed directly on item)--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="crossover_serial_number"--}}
{{--                                                                                                                                                id="crossover_serial_number"--}}
{{--                                                                                                                                                value="{{$item->crossover_serial_number}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}

{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="row">--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">--}}
{{--                                                                                                                                                    <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">--}}
{{--                                                                                                                                                        Autographed--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="checkbox"--}}
{{--                                                                                                                                                        class="form-check"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="crossover_autographed"--}}
{{--                                                                                                                                                        id="crossover_autographed"--}}
{{--                                                                                                                                                        value="{{$item->crossover_autographed}}"--}}
{{--                                                                                                                                                        {{ $item->crossover_autographed == 1 ? 'checked' : '' }}--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                                        Authenticator Name--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_authenticator_name"id="crossover_authenticator_name">--}}
{{--                                                                                                                                                        <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                                        @foreach($authenticators as $authenticator)--}}
{{--                                                                                                                                                            <option value="{{$authenticator->id}}" @if($item->crossover_authenticator_name == $authenticator->id) selected @endif >{{$authenticator->name}}</option>--}}
{{--                                                                                                                                                        @endforeach--}}
{{--                                                                                                                                                    </select>--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                            <div class="col-md-4">--}}
{{--                                                                                                                                                <div class="mb-3">--}}
{{--                                                                                                                                                    <label class="form-label w-100">--}}
{{--                                                                                                                                                        Authenticator Cert. No.--}}
{{--                                                                                                                                                        <span class="error">*</span>--}}
{{--                                                                                                                                                    </label>--}}
{{--                                                                                                                                                    <input--}}
{{--                                                                                                                                                        type="text"--}}
{{--                                                                                                                                                        class="form-control"--}}
{{--                                                                                                                                                        placeholder=""--}}
{{--                                                                                                                                                        name="crossover_authenticator_cert_no"--}}
{{--                                                                                                                                                        id="crossover_authenticator_cert_no"--}}
{{--                                                                                                                                                        value="{{$item->crossover_authenticator_cert_no}}"--}}
{{--                                                                                                                                                    />--}}
{{--                                                                                                                                                </div>--}}
{{--                                                                                                                                            </div>--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}

{{--                                                                                                                            <div class="col-md-2">--}}
{{--                                                                                                                                <div class="row">--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100">--}}
{{--                                                                                                                                                Estimated Value--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <input--}}
{{--                                                                                                                                                type="text"--}}
{{--                                                                                                                                                class="form-control"--}}
{{--                                                                                                                                                placeholder=""--}}
{{--                                                                                                                                                name="crossover_estimated_value"--}}
{{--                                                                                                                                                id="crossover_estimated_value"--}}
{{--                                                                                                                                                value="{{$item->crossover_estimated_value}}"--}}
{{--                                                                                                                                            />--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                    <div class="col-md-12">--}}
{{--                                                                                                                                        <div class="mb-3">--}}
{{--                                                                                                                                            <label class="form-label w-100 text-capitalize">--}}
{{--                                                                                                                                                Minimum Grade--}}
{{--                                                                                                                                                <span class="error">*</span>--}}
{{--                                                                                                                                            </label>--}}
{{--                                                                                                                                            <select class="form-select mb-text-only" aria-label="Default select example" name="crossover_minimum_grade" id="crossover_minimum_grade">--}}
{{--                                                                                                                                                <option selected disabled>Open this select menu</option>--}}
{{--                                                                                                                                                @foreach($grades as $grade)--}}
{{--                                                                                                                                                    <option value="{{$grade['name']}}" @if($item->crossover_minimum_grade == $grade['name']) selected @endif >{{$grade['name']}}</option>--}}
{{--                                                                                                                                                @endforeach--}}
{{--                                                                                                                                            </select>--}}
{{--                                                                                                                                        </div>--}}
{{--                                                                                                                                    </div>--}}
{{--                                                                                                                                </div>--}}
{{--                                                                                                                            </div>--}}
{{--                                                                                                                        </div>--}}
{{--                                                                                                                    </div>--}}
{{--                                                                                                                </div>--}}
{{--                                                                                                            </div>--}}
{{--                                                                                                    </div>--}}
{{--                                                                                                    <input type="number" hidden="" class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">--}}
{{--                                                                                                </div>--}}
{{--                                                                                                <div class="w-100 d-flex justify-content-end">--}}
{{--                                                                                                    <button type="submit" id="edit_item_submit_btn" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>--}}
{{--                                                                                                    <button type="button" id="cancel_btn" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>--}}
{{--                                                                                                </div>--}}
{{--                                                                                            </form>--}}
{{--                                                                                        </div>--}}
{{--                                                                                    </div>--}}
{{--                                                                                </div>--}}
{{--                                                                                <!-- /.modal-content -->--}}
{{--                                                                            </div>--}}
{{--                                                                            <!-- /.modal-dialog -->--}}
{{--                                                                        </div>--}}

                                                                        <!-- EDIT ITEM DESCRIPTION SECTION -->

                                                                        <!-- EDIT ITEM MODAL -->
                                                                        <div id="editItemModal-{{$item->id}}" class="modal fade item-modal" tabindex="-1">
                                                                            <div class="modal-dialog modal-xl">
                                                                                <div class="modal-content">

                                                                                    <!-- Modal Header -->
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">Edit Item</h5>
                                                                                        <button type="button" class="btn-close"
                                                                                                data-bs-dismiss="modal"></button>
                                                                                    </div>

                                                                                    <form id="editItemForm" method="POST"
                                                                                          action="{{ route('admin.entries.edit.new.item', $item->id) }}">
                                                                                        @csrf
                                                                                        @method('PUT')

                                                                                        <div class="modal-body">

                                                                                            <!-- ITEM TYPE -->
                                                                                            <div class="item-type-panel">
                                                                                                <label class="form-label">Item Type</label>

                                                                                                <input type="text" class="form-control"
                                                                                                       value="{{ $item->itemType }}" readonly>

                                                                                                <input type="hidden" id="edit_item_type"
                                                                                                       name="itemType"
                                                                                                       value="{{ $item->itemType }}">
                                                                                            </div>

                                                                                            <div class="item-detail-panel">
                                                                                                <!-- CARD SECTION -->
                                                                                                <div id="editCardSection" class="item-section">
                                                                                                    <div class="item-form-card">
                                                                                                        <div class="item-layout">

                                                                                                            <!-- Quantity -->
                                                                                                            <div class="quantity-column">
                                                                                                                <div class="quantity-box">
                                                                                                                    <div class="quantity-title">Quantity</div>
                                                                                                                    <div class="quantity-value">1</div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <!-- Details -->
                                                                                                            <div class="details-column">

                                                                                                                <!-- Description #1 -->
                                                                                                                <div class="description-block">
                                                                                                                    <div class="description-heading">
                                                                                                                        Description #1
                                                                                                                    </div>

                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-2">
                                                                                                                            <label class="field-label">Year</label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_card_year"
                                                                                                                                   class="form-control">
                                                                                                                        </div>

                                                                                                                        <div class="col-md-10">
                                                                                                                            <label class="field-label">
                                                                                                                                Manufacturer
                                                                                                                            </label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_card_manufacturer"
                                                                                                                                   class="form-control">
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <input type="hidden"
                                                                                                                           id="edit_card_description_one"
                                                                                                                           name="card_description_one"
                                                                                                                           value="{{ $item->card_description_one }}">
                                                                                                                </div>

                                                                                                                <!-- Description #2 -->
                                                                                                                <div class="description-block">
                                                                                                                    <div class="description-heading">
                                                                                                                        Description #2
                                                                                                                    </div>

                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-2"
                                                                                                                             id="editCardNumberField">
                                                                                                                            <label class="field-label">Number</label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_card_number"
                                                                                                                                   class="form-control">
                                                                                                                        </div>

                                                                                                                        <div class="col-md-10">
                                                                                                                            <label class="field-label">
                                                                                                                                Player Name
                                                                                                                            </label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_card_player_name"
                                                                                                                                   class="form-control">
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <input type="hidden"
                                                                                                                           id="edit_card_description_two"
                                                                                                                           name="card_description_two"
                                                                                                                           value="{{ $item->card_description_two }}">
                                                                                                                </div>

                                                                                                                <!-- Description #3 -->
                                                                                                                <div class="description-block">
                                                                                                                    <label class="field-label">
                                                                                                                        Description #3
                                                                                                                    </label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           name="card_description_three"
                                                                                                                           value="{{ $item->card_description_three }}">
                                                                                                                </div>

                                                                                                                <!-- Serial Number -->
                                                                                                                <div class="serial-block">
                                                                                                                    <label class="field-label">
                                                                                                                        Serial Number
                                                                                                                    </label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           name="card_serial_number"
                                                                                                                           value="{{ $item->card_serial_number }}">
                                                                                                                </div>

                                                                                                                <!-- Autograph Options -->
                                                                                                                <div class="autograph-row">

                                                                                                                    <div class="autograph-checkbox">
                                                                                                                        <input type="checkbox"
                                                                                                                               class="form-check-input"
                                                                                                                               name="card_autographed"
                                                                                                                               value="1"
                                                                                                                            {{ $item->card_autographed ? 'checked' : '' }}>
                                                                                                                        <label class="field-label">
                                                                                                                            Autographed
                                                                                                                        </label>
                                                                                                                    </div>

                                                                                                                    <div class="certified-checkbox">
                                                                                                                        <input type="checkbox"
                                                                                                                               class="form-check-input"
                                                                                                                               name="card_certified_on_card"
                                                                                                                               value="1"
                                                                                                                            {{ $item->card_certified_on_card ? 'checked' : '' }}>
                                                                                                                        <label class="field-label">
                                                                                                                            Certified on Card
                                                                                                                        </label>
                                                                                                                    </div>

                                                                                                                    <div>
                                                                                                                        <label class="field-label">
                                                                                                                            Authenticator
                                                                                                                        </label>
                                                                                                                        <input type="text"
                                                                                                                               class="form-control"
                                                                                                                               name="card_authenticator_name"
                                                                                                                               value="{{ $item->card_authenticator_name }}">
                                                                                                                    </div>

                                                                                                                    <div>
                                                                                                                        <label class="field-label">
                                                                                                                            Certification Number
                                                                                                                        </label>
                                                                                                                        <input type="text"
                                                                                                                               class="form-control"
                                                                                                                               name="card_authenticator_cert_no"
                                                                                                                               value="{{ $item->card_authenticator_cert_no }}">
                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <!-- COMBINED SERVICE SECTION -->
                                                                                                <div id="editCombinedServiceSection" class="item-section">
                                                                                                    <div class="item-form-card">
                                                                                                        <div class="item-layout">

                                                                                                            <!-- Quantity -->
                                                                                                            <div class="quantity-column">
                                                                                                                <div class="quantity-box">
                                                                                                                    <div class="quantity-title">Quantity</div>
                                                                                                                    <div class="quantity-value">1</div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <!-- Details -->
                                                                                                            <div class="details-column">

                                                                                                                <!-- Description #1 -->
                                                                                                                <div class="description-block">
                                                                                                                    <div class="description-heading">
                                                                                                                        Description #1
                                                                                                                    </div>

                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-2">
                                                                                                                            <label class="field-label">Year</label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_combined_year"
                                                                                                                                   class="form-control">
                                                                                                                        </div>

                                                                                                                        <div class="col-md-10">
                                                                                                                            <label class="field-label">
                                                                                                                                Manufacturer
                                                                                                                            </label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_combined_manufacturer"
                                                                                                                                   class="form-control">
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <input type="hidden"
                                                                                                                           id="edit_combined_description_one"
                                                                                                                           name="combined_service_description_one"
                                                                                                                           value="{{ $item->combined_service_description_one }}">
                                                                                                                </div>

                                                                                                                <!-- Description #2 -->
                                                                                                                <div class="description-block">
                                                                                                                    <div class="description-heading">
                                                                                                                        Description #2
                                                                                                                    </div>

                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-2"
                                                                                                                             id="editCombinedNumberField">
                                                                                                                            <label class="field-label">Number</label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_combined_number"
                                                                                                                                   class="form-control">
                                                                                                                        </div>

                                                                                                                        <div class="col-md-10">
                                                                                                                            <label class="field-label">
                                                                                                                                Player Name
                                                                                                                            </label>
                                                                                                                            <input type="text"
                                                                                                                                   id="edit_combined_player_name"
                                                                                                                                   class="form-control">
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <input type="hidden"
                                                                                                                           id="edit_combined_description_two"
                                                                                                                           name="combined_service_description_two"
                                                                                                                           value="{{ $item->combined_service_description_two }}">
                                                                                                                </div>

                                                                                                                <!-- Description #3 -->
                                                                                                                <div class="description-block">
                                                                                                                    <label class="field-label">
                                                                                                                        Description #3
                                                                                                                    </label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           name="combined_service_description_three"
                                                                                                                           value="{{ $item->combined_service_description_three }}">
                                                                                                                </div>

                                                                                                                <!-- Serial Number -->
                                                                                                                <div class="serial-block">
                                                                                                                    <label class="field-label">
                                                                                                                        Serial Number
                                                                                                                    </label>
                                                                                                                    <input type="text"
                                                                                                                           class="form-control"
                                                                                                                           name="combined_service_serial_number"
                                                                                                                           value="{{ $item->combined_service_serial_number }}">
                                                                                                                </div>

                                                                                                                <!-- Autograph Options -->
                                                                                                                <div class="autograph-row">

                                                                                                                    <div class="autograph-checkbox">
                                                                                                                        <input type="checkbox"
                                                                                                                               class="form-check-input"
                                                                                                                               name="combined_service_autographed"
                                                                                                                               value="1"
                                                                                                                            {{ $item->combined_service_autographed ? 'checked' : '' }}>
                                                                                                                        <label class="field-label">
                                                                                                                            Autographed
                                                                                                                        </label>
                                                                                                                    </div>

                                                                                                                    <div></div>

                                                                                                                    <div>
                                                                                                                        <label class="field-label">
                                                                                                                            Authenticator
                                                                                                                        </label>
                                                                                                                        <input type="text"
                                                                                                                               class="form-control"
                                                                                                                               name="combined_service_authenticator_name"
                                                                                                                               value="{{ $item->combined_service_authenticator_name }}">
                                                                                                                    </div>

                                                                                                                    <div>
                                                                                                                        <label class="field-label">
                                                                                                                            Certification Number
                                                                                                                        </label>
                                                                                                                        <input type="text"
                                                                                                                               class="form-control"
                                                                                                                               name="combined_service_authenticator_cert_no"
                                                                                                                               value="{{ $item->combined_service_authenticator_cert_no }}">
                                                                                                                    </div>

                                                                                                                </div>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <!-- Modal Footer -->
                                                                                        <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary">
                                                                                                Save Changes
                                                                                            </button>

                                                                                            <button type="button" class="btn btn-secondary"
                                                                                                    data-bs-dismiss="modal">
                                                                                                Cancel
                                                                                            </button>
                                                                                        </div>

                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

{{--                                                                    delete modal--}}
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">
                                                                            <i class="fa fa-archive" style="padding-top: 6px;padding-bottom: 6px;"></i>
                                                                        </button>
                                                                        <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body mt-3 text-center">
                                                                                        <div class="question-icon-box">
                                                                                            <i class="fa fa-exclamation" style="color: darkorange;font-size: 32px;"></i>
                                                                                        </div>
                                                                                        <span class="question-text" style="font-size: 24px;">
                                                                            Are you sure ? <br>
                                                                            <span style="font-size: 14px;">You won't be able to revert this!</span>
                                                                        </span>
                                                                                    </div>
                                                                                    <div class="mb-4 text-center">
                                                                                        <form action="{{route('admin.entries.entry.item.destroy')}}" method="POST">
                                                                                            @method('post')
                                                                                            @csrf
                                                                                            <div class="form-group mb-3">
                                                                                                <input type="number" hidden="" class="form-control" name="item_id" value="{{$item->id}}" style="width: 33%;margin: 0 auto;">
                                                                                            </div>
                                                                                            <button type="submit" id="" class="btn btn-primary" style="margin-right: 15px;">Confirm</button>
                                                                                            <button type="button" id="" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
{{--                                                @else--}}
{{--                                                    <tr width="100">--}}
{{--                                                        <td class="text-capitalize text-center text-warning">No item found with this entry</td>--}}
{{--                                                    </tr>--}}
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class=""></div>
                                <div class="text-end mt-4">
                                    <a class="btn btn-primary" style="margin-right: 15px;" href="{{route('admin.entries.index')}}">Entry Complete</a>
                                    <a class="btn btn-secondary" href="{{route('admin.entries.index')}}">Continue Later</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
<style>
    .hidden-box{
        display: none;
    }
    .question-icon-box {
        border: 1px solid darkorange;
        width: 54px;
        /* height: 50px; */
        margin: 0 auto;
        border-radius: 50%;
        padding: 10px;
        margin-bottom: 18px;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    #quantity-warning-text{
        display: none;
    }
    #warning_text_box{
        display: none;
    }
    .waring-text{
        display: none;
    }


    /*responsive table css start*/
    .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: 1rem;
        border-radius: 4px;
    }

    table.table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px; /* Adjust based on content */
    }

    thead {
        background: cornflowerblue;
        color: white;
    }

    thead th,
    tbody td {
        padding: 8px 12px;
        text-align: center;
        white-space: nowrap; /* Prevent wrapping */
    }

    thead th {
        height: 40px;
        font-weight: bold;
    }

    /* Optional: Zebra striping */
    tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    /*responsive table css end*/

    /* =========================================================
   ADD NEW ITEM MODAL
========================================================= */

    .item-modal .modal-dialog {
        max-width: 1100px;
        width: calc(100% - 30px);
    }

    .item-modal .modal-content {
        border: 0;
        border-radius: 4px;
        background: #fff;
    }

    .item-modal .modal-header {
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
        padding: 16px 24px;
    }

    .item-modal .modal-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
    }


    /* =========================================================
       ITEM TYPE SELECTOR PANEL
    ========================================================= */

    .item-modal .item-type-panel {
        background: #eeeeee;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        padding: 22px 20px 32px;
        margin-bottom: 22px;
    }

    .item-modal .item-type-panel .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #4b5563;
        margin-bottom: 8px;
    }

    .item-modal #itemSelect {
        width: 50%;
        min-height: 38px;
        background-color: #fff;
        border: 1px solid #cfd5df;
        border-radius: 5px;
        font-size: 14px;
        color: #374151;
    }


    /* =========================================================
       ITEM SECTION
    ========================================================= */

    .item-modal .item-section {
        display: none;
    }

    .item-modal .item-form-card {
        background: #eeeeee;
        border: 1px solid #e8e8e8;
        border-radius: 5px;
        padding: 14px 12px;
        margin-top: 0;
    }


    /* =========================================================
       MAIN ITEM LAYOUT
    ========================================================= */

    .item-modal .item-layout {
        display: grid;
        grid-template-columns: 16% 84%;
        align-items: start;
        width: 100%;
    }

    .item-modal .quantity-column {
        padding-right: 8px;
    }

    .item-modal .details-column {
        min-width: 0;
        padding: 0 0 0 10px;
    }


    /* =========================================================
       QUANTITY BOX
    ========================================================= */

    .item-modal .quantity-box {
        background: #f5f5f5;
        min-height: 88px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        color: #64748b;
        border-bottom: 1px solid #dedede;
    }

    .item-modal .quantity-title {
        font-size: 16px;
        font-weight: 400;
        padding: 8px 5px;
    }

    .item-modal .quantity-value {
        font-size: 18px;
        font-weight: 400;
        padding: 8px 5px;
    }


    /* =========================================================
       DESCRIPTION BLOCKS
    ========================================================= */

    .item-modal .description-block {
        margin-bottom: 14px;
    }

    .item-modal .description-heading {
        font-size: 13px;
        font-weight: 500;
        color: #475569;
        margin-bottom: 4px;
    }

    .item-modal .field-label {
        display: block;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.4;
        color: #4b5563;
        margin-bottom: 5px;
    }


    /* =========================================================
       INPUTS AND SELECTS
    ========================================================= */

    .item-modal .form-control,
    .item-modal .form-select {
        width: 100%;
        min-height: 36px;
        height: 36px;
        background-color: #fff;
        border: 1px solid #d5dce3;
        border-radius: 4px;
        padding: 6px 10px;
        font-size: 14px;
        color: #374151;
        box-shadow: none;
    }

    .item-modal .form-control:focus,
    .item-modal .form-select:focus {
        border-color: #a5b4fc;
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.12);
    }


    /* =========================================================
       SERIAL NUMBER
    ========================================================= */

    .item-modal .serial-block {
        width: 50%;
        margin-top: 16px;
        margin-bottom: 16px;
    }


    /* =========================================================
       AUTOGRAPH ROW
    ========================================================= */

    .item-modal .autograph-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 20px;
        align-items: end;
        margin-top: 16px;
    }

    .item-modal .autograph-checkbox,
    .item-modal .certified-checkbox {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 40px;
    }

    .item-modal .autograph-checkbox .field-label,
    .item-modal .certified-checkbox .field-label {
        margin-bottom: 0;
    }

    .item-modal .form-check-input {
        width: 14px;
        height: 14px;
        margin: 0;
        flex-shrink: 0;
        cursor: pointer;
    }

    .item-modal .autograph-authenticator,
    .item-modal .auth-cert-number {
        min-width: 0;
    }


    /* =========================================================
       MODAL FOOTER
    ========================================================= */

    .item-modal .modal-footer {
        border-top: 1px solid #e5e7eb;
        padding: 16px 24px;
        background: #fff;
    }


    /* =========================================================
       RESPONSIVE DESIGN
    ========================================================= */

    @media (max-width: 767px) {

        .item-modal .modal-dialog {
            width: calc(100% - 16px);
            margin: 8px auto;
        }

        .item-modal .item-type-panel {
            padding: 16px;
        }

        .item-modal #itemSelect {
            width: 100%;
        }

        .item-modal .item-form-card {
            padding: 12px;
            min-height: auto;
        }

        .item-modal .item-layout {
            grid-template-columns: 1fr;
        }

        .item-modal .quantity-column {
            padding-right: 0;
            margin-bottom: 15px;
        }

        .item-modal .quantity-box {
            min-height: 60px;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0 12px;
        }

        .item-modal .details-column {
            padding: 0;
        }

        .item-modal .serial-block {
            width: 100%;
        }

        .item-modal .autograph-row {
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .item-modal .modal-footer {
            padding: 12px 15px;
        }
    }

    /* =========================================================
   FIX: MODAL BOTTOM PADDING & SCROLL
========================================================= */

    /* Keep modal within viewport */
    .item-modal .modal-dialog {
        max-height: calc(100vh - 64px);
        margin-top: 32px;
        margin-bottom: 32px;
    }

    /* Modal content layout */
    .item-modal .modal-content {
        max-height: calc(100vh - 64px);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    /* Scrollable modal body with bottom spacing */
    .item-modal .modal-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
        padding: 20px 20px !important;
    }

    /* Add space below the item card */
    .item-modal .item-section {
    }

    /* Ensure the card doesn't touch the bottom */
    .item-modal .item-form-card {
    }

    /* Keep footer visible */
    .item-modal .modal-footer {
        flex-shrink: 0;
        padding: 16px 24px;
        background: #fff;
    }

    /* Mobile adjustments */
    @media (max-width: 767px) {
        .item-modal .modal-dialog {
            margin: 8px auto;
            max-height: calc(100vh - 16px);
        }

        .item-modal .modal-content {
            max-height: calc(100vh - 16px);
        }

        .item-modal .modal-body {
            padding: 14px 12px 30px !important;
        }

        .item-modal .item-section {
            padding-bottom: 20px;
        }
    }

    /* Simple Fix: Scrollable Item Panel + Visible Footer */

    .item-modal .modal-content {
        max-height: calc(100vh - 40px);
        display: flex;
        flex-direction: column;
    }

    .item-modal .modal-body {
        min-height: 0;
        overflow-y: auto;
        flex: 1 1 auto;
    }

    .item-modal .item-detail-panel {
        max-height: 325px;
        overflow-y: auto;
        text-align: left;
    }

    .item-modal .modal-footer {
        display: flex;
        flex-shrink: 0;
        background: #fff;
    }
</style>
@endpush

@push('script')
{{--    <script>--}}

{{--        let notSelected = true;--}}
{{--        let showItemTypeCardBox = false;--}}
{{--        let showItemTypeAutoAthenticationBox= false;--}}
{{--        let showItemTypeCombinedServiceBox= false;--}}
{{--        let showItemTypeReholderBox= false;--}}
{{--        let showItemTypeCrossoverBoxTwo= false;--}}
{{--        let showItemTypeCrossoverBoxOne= false;--}}
{{--        $('#extra_submit_btn').on('click', function () {--}}
{{--            console.log('clicked')--}}
{{--            if(!$('#quantity-input-box').val()){--}}
{{--                $(this).attr("type","button");--}}
{{--                $('#quantity-warning-text').show();--}}
{{--            }else {--}}
{{--                $('#quantity-warning-text').hide();--}}
{{--                $(this).attr("type","submit");--}}
{{--            }--}}
{{--        });--}}

{{--        $('#add_item_submit_btn').on('click', function (e) {--}}
{{--            // e.preventDefault();--}}
{{--            console.log('clicked add item')--}}

{{--            if(notSelected){--}}
{{--                if (showItemTypeCardBox){--}}
{{--                    console.log('showItemTypeCardBox  '+showItemTypeCardBox)--}}

{{--                    if(!$('#card_description_one').val() || !$('#card_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}

{{--                }--}}
{{--                if(showItemTypeAutoAthenticationBox){--}}
{{--                    console.log('showItemTypeAutoAthenticationBox  '+showItemTypeAutoAthenticationBox)--}}

{{--                    if(!$('#auto_authentication_description_one').val() || !$('#auto_authentication_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeCombinedServiceBox){--}}
{{--                    console.log('showItemTypeCombinedServiceBox  '+showItemTypeCombinedServiceBox)--}}

{{--                    if(!$('#combined_service_description_one').val() || !$('#combined_service_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeReholderBox){--}}
{{--                    console.log('showItemTypeReholderBox  '+showItemTypeReholderBox)--}}

{{--                    if(!$('#reholder_certification_number').val() || !$('#reholder_estimated_value').val() ){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeCrossoverBoxOne || showItemTypeCrossoverBoxTwo){--}}
{{--                    console.log('showItemTypeCrossoverBoxOne  '+showItemTypeCrossoverBoxOne)--}}

{{--                    if(!$('#crossover_description_one').val() || !$('#crossover_item_type').val() || !$('#crossover_minimum_grade').val()|| !$('#crossover_estimated_value').val() ){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--            } else {--}}
{{--                $(this).attr("type","button");--}}
{{--            }--}}
{{--            // if(!$('#quantity-input-box').val()){--}}
{{--            //     $(this).attr("type","button");--}}
{{--            //     $('#quantity-warning-text').show();--}}
{{--            // }else {--}}
{{--            //     $('#quantity-warning-text').hide();--}}
{{--            //     $(this).attr("type","submit");--}}
{{--            // }--}}
{{--        });--}}

{{--        $('#cancel_btn').on('click', function () {--}}
{{--            $('#itemSelect').val('');--}}
{{--            $('#quantity-warning-text').hide();--}}
{{--            $('#warning_text_box').hide();--}}
{{--            $('#submit_btn').attr("type","submit");--}}

{{--            //card--}}
{{--            $('#card_description_one').val('');--}}
{{--            $('#card_description_two').val('');--}}
{{--            $('#card_description_three').val('');--}}
{{--            $('#card_authenticator_name').val('');--}}
{{--            $('#card_authenticator_cert_no').val('');--}}
{{--            $('#card_estimated_value').val('');--}}
{{--            $('#card_serial_number').val('');--}}
{{--            $('#card_autographed').prop('checked', false);--}}

{{--            //auto authenticator--}}
{{--            $('#auto_authentication_description_one').val('');--}}
{{--            $('#auto_authentication_description_two').val('');--}}
{{--            $('#auto_authentication_description_three').val('');--}}
{{--            $('#auto_authentication_authenticator_name').val('');--}}
{{--            $('#auto_authentication_authenticator_cert_no').val('');--}}
{{--            $('#auto_authentication_estimated_value').val('');--}}
{{--            $('#auto_authentication_autographed').prop('checked', false);--}}
{{--            $('#auto_authentication_serial_number').val('');--}}

{{--            //combined service--}}
{{--            $('#combined_service_description_one').val('');--}}
{{--            $('#combined_service_description_two').val('');--}}
{{--            $('#combined_service_description_three').val('');--}}
{{--            $('#combined_service_authenticator_name').val('');--}}
{{--            $('#combined_service_authenticator_cert_no').val('');--}}
{{--            $('#combined_service_estimated_value').val('');--}}
{{--            $('#combined_service_autographed').prop('checked', false);--}}
{{--            $('#combined_service_serial_number').val('');--}}

{{--            //reholder--}}
{{--            $('#reholder_certification_number').val('');--}}
{{--            $('#reholder_estimated_value').val('');--}}

{{--            //crossover--}}
{{--            $('#crossover_description_one').val('');--}}
{{--            $('#crossover_description_two').val('');--}}
{{--            $('#crossover_description_three').val('');--}}
{{--            $('#crossover_item_type').val('');--}}
{{--            $('#crossover_minimum_grade').val('');--}}
{{--            $('#crossover_autographed').prop('checked', false);--}}
{{--            $('#crossover_authenticator_name').val('');--}}
{{--            $('#crossover_estimated_value').val('');--}}
{{--            $('#crossover_authenticator_cert_no').val('');--}}
{{--            $('#crossover_serial_number').val('');--}}


{{--            //card box--}}
{{--            $('#showItemTypeCardBox').hide();--}}
{{--            $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--            $('#showItemTypeCombinedServiceBox').hide();--}}
{{--            $('#showItemTypeReholderBox').hide();--}}
{{--            $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--            $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--            // if(!$('#quantity-input-box').val()){--}}
{{--            //     $(this).attr("type","button");--}}
{{--            //     $('#quantity-warning-text').show();--}}
{{--            // }else {--}}
{{--            //     $('#quantity-warning-text').hide();--}}
{{--            //     $(this).attr("type","submit");--}}
{{--            // }--}}
{{--        });--}}

{{--        $('#itemSelect').on('change', function() {--}}
{{--            let value = this.value;--}}
{{--            if(value == 'Card'){--}}
{{--                $('#showItemTypeCardBox').show();--}}
{{--                showItemTypeCardBox = true;--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Autograph Authentication'){--}}
{{--                console.log('selected')--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').show();--}}
{{--                showItemTypeAutoAthenticationBox = true;--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Combined Service'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').show();--}}
{{--                showItemTypeCombinedServiceBox = true;--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Reholder'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').show();--}}
{{--                showItemTypeReholderBox = true;--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}
{{--            if(value == 'Crossover'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').show();--}}
{{--                $('#showItemTypeCrossoverBoxOne').show();--}}
{{--                showItemTypeCrossoverBoxOne =true;--}}
{{--                showItemTypeCrossoverBoxTwo =true;--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--            }--}}
{{--        });--}}

{{--        $('.form-check').on('change', function(){--}}
{{--            this.value = this.checked ? 1 : 0;--}}
{{--            // alert(this.value);--}}
{{--        }).change();--}}


{{--        //edit--}}
{{--        $('#add_item_submit_btn').on('click', function (e) {--}}
{{--            // e.preventDefault();--}}
{{--            console.log('clicked add item')--}}

{{--            if(notSelected){--}}
{{--                if (showItemTypeCardBox){--}}
{{--                    console.log('showItemTypeCardBox  '+showItemTypeCardBox)--}}
{{--                    console.log($('#card_description_one').val())--}}

{{--                    if(!$('#card_description_one').val() || !$('#card_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}

{{--                }--}}
{{--                if(showItemTypeAutoAthenticationBox){--}}
{{--                    console.log('showItemTypeAutoAthenticationBox  '+showItemTypeAutoAthenticationBox)--}}

{{--                    if(!$('#auto_authentication_description_one').val() || !$('#auto_authentication_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeCombinedServiceBox){--}}
{{--                    console.log('showItemTypeCombinedServiceBox  '+showItemTypeCombinedServiceBox)--}}

{{--                    if(!$('#combined_service_description_one').val() || !$('#combined_service_estimated_value').val()){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeReholderBox){--}}
{{--                    console.log('showItemTypeReholderBox  '+showItemTypeReholderBox)--}}

{{--                    if(!$('#reholder_certification_number').val() || !$('#reholder_estimated_value').val() ){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--                if(showItemTypeCrossoverBoxOne || showItemTypeCrossoverBoxTwo){--}}
{{--                    console.log('showItemTypeCrossoverBoxOne  '+showItemTypeCrossoverBoxOne)--}}

{{--                    if(!$('#crossover_description_one').val() || !$('#crossover_item_type').val() || !$('#crossover_minimum_grade').val() || !$('#crossover_estimated_value').val() ){--}}
{{--                        $(this).attr("type","button");--}}
{{--                        $('#warning_text_box').show();--}}
{{--                    }else {--}}
{{--                        $('#warning_text_box').hide();--}}
{{--                        $(this).attr("type","submit");--}}
{{--                    }--}}
{{--                }--}}
{{--            } else {--}}
{{--                $(this).attr("type","button");--}}
{{--            }--}}
{{--            // if(!$('#quantity-input-box').val()){--}}
{{--            //     $(this).attr("type","button");--}}
{{--            //     $('#quantity-warning-text').show();--}}
{{--            // }else {--}}
{{--            //     $('#quantity-warning-text').hide();--}}
{{--            //     $(this).attr("type","submit");--}}
{{--            // }--}}
{{--        });--}}
{{--        $('#editItemSelect').on('change', function() {--}}
{{--            let value = this.value;--}}
{{--            if(value == 'Card'){--}}
{{--                $('#showItemTypeCardBox').show();--}}
{{--                showItemTypeCardBox = true;--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Autograph Authentication'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').show();--}}
{{--                showItemTypeAutoAthenticationBox = true;--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Combined Service'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').show();--}}
{{--                showItemTypeCombinedServiceBox = true;--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}

{{--            if(value == 'Reholder'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').show();--}}
{{--                showItemTypeReholderBox = true;--}}
{{--                $('#showItemTypeCrossoverBoxTwo').hide();--}}
{{--                $('#showItemTypeCrossoverBoxOne').hide();--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeCrossoverBoxTwo= false;--}}
{{--                showItemTypeCrossoverBoxOne= false;--}}
{{--            }--}}
{{--            if(value == 'Crossover'){--}}
{{--                $('#showItemTypeCardBox').hide();--}}
{{--                $('#showItemTypeAutoAthenticationBox').hide();--}}
{{--                $('#showItemTypeCombinedServiceBox').hide();--}}
{{--                $('#showItemTypeReholderBox').hide();--}}
{{--                $('#showItemTypeCrossoverBoxTwo').show();--}}
{{--                $('#showItemTypeCrossoverBoxOne').show();--}}
{{--                showItemTypeCrossoverBoxOne =true;--}}
{{--                showItemTypeCrossoverBoxTwo =true;--}}
{{--                showItemTypeCardBox = false;--}}
{{--                showItemTypeAutoAthenticationBox= false;--}}
{{--                showItemTypeCombinedServiceBox= false;--}}
{{--                showItemTypeReholderBox= false;--}}
{{--            }--}}
{{--        });--}}

{{--        $(document).ready(function () {--}}

{{--            const $modal = $('.item-modal');--}}
{{--            const $itemSelect = $('#itemSelect');--}}
{{--            const $sections = $modal.find('.item-section');--}}

{{--            function resetSection($section) {--}}
{{--                $section.find(':input').each(function () {--}}
{{--                    const $field = $(this);--}}

{{--                    if ($field.is(':checkbox')) {--}}
{{--                        $field.prop('checked', false);--}}
{{--                    } else if ($field.is('select')) {--}}
{{--                        $field.val('');--}}
{{--                    } else if ($field.is('input, textarea')) {--}}
{{--                        $field.val('');--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}

{{--            function showItemSection(itemType) {--}}
{{--                $sections.hide();--}}
{{--                $sections.find(':input').prop('disabled', true);--}}

{{--                let section = '';--}}

{{--                switch (itemType) {--}}
{{--                    case 'Card':--}}
{{--                    case 'Card (No Number)':--}}
{{--                    case 'Card (Autographed)':--}}
{{--                    case 'Card (Autographed) No Number':--}}
{{--                    case 'Index Card':--}}
{{--                        section = 'card';--}}
{{--                        break;--}}

{{--                    case 'Autograph Authentication':--}}
{{--                        section = 'auto';--}}
{{--                        break;--}}

{{--                    case 'Combined Service':--}}
{{--                    case 'Combined Service (No Number)':--}}
{{--                        section = 'combined';--}}
{{--                        break;--}}

{{--                    case 'Reholder':--}}
{{--                        section = 'reholder';--}}
{{--                        break;--}}

{{--                    case 'Crossover':--}}
{{--                        section = 'crossover';--}}
{{--                        break;--}}
{{--                }--}}

{{--                if (!section) {--}}
{{--                    return;--}}
{{--                }--}}

{{--                const $activeSection = $sections.filter(--}}
{{--                    '[data-section="' + section + '"]'--}}
{{--                );--}}

{{--                $activeSection.show();--}}
{{--                $activeSection.find(':input').prop('disabled', false);--}}

{{--                // Hide Number field for No Number item types.--}}
{{--                const noNumberTypes = [--}}
{{--                    'Card (No Number)',--}}
{{--                    'Card (Autographed) No Number',--}}
{{--                    'Combined Service (No Number)'--}}
{{--                ];--}}

{{--                $activeSection.find('[data-number-field]').toggle(--}}
{{--                    !noNumberTypes.includes(itemType)--}}
{{--                );--}}

{{--                // Show autograph fields only for the appropriate Card variants.--}}
{{--                const autographCardTypes = [--}}
{{--                    'Card (Autographed)',--}}
{{--                    'Card (Autographed) No Number',--}}
{{--                    'Index Card'--}}
{{--                ];--}}

{{--                $activeSection.find('[data-autograph-fields]').toggle(--}}
{{--                    autographCardTypes.includes(itemType)--}}
{{--                );--}}

{{--                // Reset hidden Number field when No Number is selected.--}}
{{--                if (noNumberTypes.includes(itemType)) {--}}
{{--                    $activeSection.find('[data-number-field] input').val('');--}}
{{--                }--}}
{{--            }--}}

{{--            $itemSelect.on('change', function () {--}}
{{--                showItemSection($(this).val());--}}
{{--            });--}}

{{--            // Initial state--}}
{{--            showItemSection($itemSelect.val());--}}

{{--            // Reset modal when closed--}}
{{--            $modal.on('hidden.bs.modal', function () {--}}
{{--                const form = $('#addNewItemForm')[0];--}}
{{--                form.reset();--}}

{{--                $itemSelect.val('');--}}
{{--                $sections.hide();--}}
{{--                $sections.find(':input').prop('disabled', true);--}}
{{--            });--}}

{{--        });--}}


{{--        //check card autographed is checked or not--}}
{{--        $('#card_autographed').change(function () {--}}
{{--            if ($(this).is(':checked')) {--}}
{{--                $('#card_authenticator_name, #card_authenticator_cert_no').prop('required', true);--}}
{{--                $('label[for="card_authenticator_name"], label[for="card_authenticator_cert_no"]').append('<span class="required-asterisk text-danger"> *</span>');--}}
{{--            } else {--}}
{{--                $('#card_authenticator_name, #card_authenticator_cert_no').prop('required', false);--}}
{{--                $('.required-asterisk').remove();--}}
{{--            }--}}
{{--        });--}}

{{--        //check combined service autographed is checked or not--}}
{{--        $('#combined_service_autographed').change(function () {--}}
{{--            if ($(this).is(':checked')) {--}}
{{--                $('#combined_service_authenticator_name, #combined_service_authenticator_cert_no').prop('required', true);--}}
{{--                $('label[for="combined_service_authenticator_name"], label[for="combined_service_authenticator_cert_no"]').append('<span class="required-asterisk text-danger"> *</span>');--}}
{{--            } else {--}}
{{--                $('#combined_service_authenticator_name, #combined_service_authenticator_cert_no').prop('required', false);--}}
{{--                $('.required-asterisk').remove();--}}
{{--            }--}}
{{--        });--}}

{{--        //check crossover autographed is checked or not--}}
{{--        $('#crossover_autographed').change(function () {--}}
{{--            if ($(this).is(':checked')) {--}}
{{--                $('#crossover_authenticator_name, #crossover_authenticator_cert_no').prop('required', true);--}}
{{--                $('label[for="crossover_authenticator_name"], label[for="crossover_authenticator_cert_no"]').append('<span class="required-asterisk text-danger"> *</span>');--}}
{{--            } else {--}}
{{--                $('#crossover_authenticator_name, #crossover_authenticator_cert_no').prop('required', false);--}}
{{--                $('.required-asterisk').remove();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
<script>
    $(document).ready(function () {
        'use strict';

        /* =========================================================
         * CONFIGURATION
         * ========================================================= */

        const $modal = $('.item-modal');
        const $form = $('#addNewItemForm');
        const $itemSelect = $('#itemSelect');
        const $editItemSelect = $('#editItemSelect');

        const ITEM_TYPES = {
            CARD: 'Card',
            CARD_NO_NUMBER: 'Card (No number)',
            CARD_AUTO: 'Card Auto',
            CARD_AUTO_NO_NUMBER: 'Card Auto (No Number)',
            INDEX_CARD: 'Index Card',
            COMBINED: 'Combined Service',
            COMBINED_NO_NUMBER: 'Combined Service (No Number)',
            REHOLDER: 'Reholder'
        };

        const SECTION_IDS = [
            '#showItemTypeCardBox',
            '#showItemTypeAutoAthenticationBox',
            '#showItemTypeCombinedServiceBox',
            '#showItemTypeReholderBox',
            '#showItemTypeCrossoverBoxOne',
            '#showItemTypeCrossoverBoxTwo'
        ];

        const NO_NUMBER_TYPES = [
            ITEM_TYPES.CARD_NO_NUMBER,
            ITEM_TYPES.CARD_AUTO_NO_NUMBER,
            ITEM_TYPES.COMBINED_NO_NUMBER
        ];

        const AUTOGRAPH_CARD_TYPES = [
            ITEM_TYPES.CARD_AUTO,
            ITEM_TYPES.CARD_AUTO_NO_NUMBER,
            ITEM_TYPES.INDEX_CARD
        ];


        /* =========================================================
         * COMMON HELPERS
         * ========================================================= */

        function getValue(selector) {
            return $.trim($(selector).val() || '');
        }

        function joinDescription(values) {
            return values
                .map(function (value) {
                    return $.trim(value || '');
                })
                .filter(Boolean)
                .join(', ');
        }

        function setValue(selector, value) {
            $(selector).val(value);
        }

        function setRequired(selector, required) {
            $(selector).prop('required', required);
        }

        function showWarning(show) {
            $('#warning_text_box').toggle(!!show);
        }

        function resetWarnings() {
            $('#warning_text_box').hide();
            $('#quantity-warning-text').hide();
        }

        function disableSectionInputs($section) {
            $section.find(':input').prop('disabled', true);
        }

        function enableSectionInputs($section) {
            $section.find(':input').prop('disabled', false);
        }


        /* =========================================================
         * ITEM TYPE -> SECTION MAPPING
         * ========================================================= */

        function getSectionForItemType(itemType) {
            switch (itemType) {
                case ITEM_TYPES.CARD:
                case ITEM_TYPES.CARD_NO_NUMBER:
                case ITEM_TYPES.CARD_AUTO:
                case ITEM_TYPES.CARD_AUTO_NO_NUMBER:
                case ITEM_TYPES.INDEX_CARD:
                    return 'card';

                case ITEM_TYPES.COMBINED:
                case ITEM_TYPES.COMBINED_NO_NUMBER:
                    return 'combined';

                case ITEM_TYPES.REHOLDER:
                    return 'reholder';

                default:
                    return '';
            }
        }


        /* =========================================================
         * ITEM TYPE SECTION SWITCHING
         * ========================================================= */

        function showItemSection(itemType, $container) {
            const $scope = $container && $container.length
                ? $container
                : $modal;

            const sectionName = getSectionForItemType(itemType);

            // Hide all sections and disable their inputs.
            SECTION_IDS.forEach(function (selector) {
                const $section = $scope.find(selector);

                $section.hide();
                disableSectionInputs($section);
            });

            if (!sectionName) {
                return;
            }

            let $activeSection;

            switch (sectionName) {
                case 'card':
                    $activeSection = $scope.find('#showItemTypeCardBox');
                    break;

                case 'combined':
                    $activeSection = $scope.find(
                        '#showItemTypeCombinedServiceBox'
                    );
                    break;

                case 'reholder':
                    $activeSection = $scope.find(
                        '#showItemTypeReholderBox'
                    );
                    break;

                default:
                    return;
            }

            // Show the selected section without changing its design.
            $activeSection.show();
            enableSectionInputs($activeSection);

            // Hide Number field for No Number item types.
            const hideNumber = NO_NUMBER_TYPES.includes(itemType);

            $activeSection
                .find('[data-number-field]')
                .toggle(!hideNumber);

            if (hideNumber) {
                $activeSection
                    .find('[data-number-field]')
                    .find('input')
                    .val('');
            }

            // Show autograph-specific fields for applicable Card types.
            const showAutograph = AUTOGRAPH_CARD_TYPES.includes(itemType);

            $activeSection
                .find('[data-autograph-fields]')
                .toggle(showAutograph);

            // Set the Card Autographed checkbox based on the selected type.
            if (
                itemType === ITEM_TYPES.CARD_AUTO ||
                itemType === ITEM_TYPES.CARD_AUTO_NO_NUMBER
            ) {
                $activeSection
                    .find('#card_autographed')
                    .prop('checked', true);
            } else if (sectionName === 'card') {
                $activeSection
                    .find('#card_autographed')
                    .prop('checked', false);
            }

            // Clear autograph fields when the selected type is not autographed.
            if (!showAutograph) {
                $activeSection
                    .find('[data-autograph-fields]')
                    .find('input')
                    .val('');
            }
        }


        /* =========================================================
         * CARD DESCRIPTION CONCATENATION
         *
         * Year + Manufacturer -> card_description_one
         * Number + Player Name -> card_description_two
         *
         * Index Card descriptions remain unchanged.
         * ========================================================= */

        function prepareCardDescriptions() {
            const itemType = $itemSelect.val();

            if (itemType === ITEM_TYPES.INDEX_CARD) {
                return;
            }

            const year = getValue('#card_year');
            const manufacturer = getValue('#card_manufacturer');

            const number = NO_NUMBER_TYPES.includes(itemType)
                ? ''
                : getValue('#card_number');

            const playerName = getValue('#card_player_name');

            const descriptionOne = joinDescription([
                year,
                manufacturer
            ]);

            const descriptionTwo = joinDescription([
                number,
                playerName
            ]);

            setValue('#card_description_one', descriptionOne);
            setValue('#card_description_two', descriptionTwo);
        }


        /* =========================================================
         * COMBINED SERVICE DESCRIPTION CONCATENATION
         *
         * Year + Manufacturer -> combined_service_description_one
         * Number + Player Name -> combined_service_description_two
         * ========================================================= */

        function prepareCombinedServiceDescriptions() {
            const itemType = $itemSelect.val();

            const year = getValue('#combined_service_year');
            const manufacturer = getValue(
                '#combined_service_manufacturer'
            );

            const number = itemType === ITEM_TYPES.COMBINED_NO_NUMBER
                ? ''
                : getValue('#combined_service_number');

            const playerName = getValue(
                '#combined_service_player_name'
            );

            const descriptionOne = joinDescription([
                year,
                manufacturer
            ]);

            const descriptionTwo = joinDescription([
                number,
                playerName
            ]);

            setValue(
                '#combined_service_description_one',
                descriptionOne
            );

            setValue(
                '#combined_service_description_two',
                descriptionTwo
            );
        }


        /* =========================================================
         * PREPARE DESCRIPTIONS BEFORE SUBMISSION
         * ========================================================= */

        function prepareDescriptions() {
            const itemType = $itemSelect.val();

            switch (itemType) {
                case ITEM_TYPES.CARD:
                case ITEM_TYPES.CARD_NO_NUMBER:
                case ITEM_TYPES.CARD_AUTO:
                case ITEM_TYPES.CARD_AUTO_NO_NUMBER:
                    prepareCardDescriptions();
                    break;

                case ITEM_TYPES.INDEX_CARD:
                    // Keep Index Card descriptions unchanged.
                    break;

                case ITEM_TYPES.COMBINED:
                case ITEM_TYPES.COMBINED_NO_NUMBER:
                    prepareCombinedServiceDescriptions();
                    break;
            }
        }


        /* =========================================================
         * VALIDATION
         * ========================================================= */

        function validateCurrentItem() {
            const itemType = $itemSelect.val();

            if (!itemType) {
                return false;
            }

            switch (itemType) {

                case ITEM_TYPES.CARD:
                case ITEM_TYPES.CARD_NO_NUMBER:
                case ITEM_TYPES.CARD_AUTO:
                case ITEM_TYPES.CARD_AUTO_NO_NUMBER:

                    prepareCardDescriptions();

                    if (
                        !getValue('#card_description_one') ||
                        !getValue('#card_estimated_value')
                    ) {
                        return false;
                    }

                    if (
                        AUTOGRAPH_CARD_TYPES.includes(itemType) &&
                        $('#card_autographed').is(':checked')
                    ) {
                        if (
                            !getValue('#card_authenticator_name') ||
                            !getValue('#card_authenticator_cert_no')
                        ) {
                            return false;
                        }
                    }

                    return true;


                case ITEM_TYPES.INDEX_CARD:

                    if (
                        !getValue('#card_description_one') ||
                        !getValue('#card_estimated_value')
                    ) {
                        return false;
                    }

                    return true;


                case ITEM_TYPES.COMBINED:
                case ITEM_TYPES.COMBINED_NO_NUMBER:

                    prepareCombinedServiceDescriptions();

                    if (
                        !getValue('#combined_service_description_one') ||
                        !getValue('#combined_service_estimated_value')
                    ) {
                        return false;
                    }

                    return true;


                case ITEM_TYPES.REHOLDER:

                    if (
                        !getValue('#reholder_certification_number') ||
                        !getValue('#reholder_estimated_value')
                    ) {
                        return false;
                    }

                    return true;


                default:
                    return false;
            }
        }


        /* =========================================================
         * ADD ITEM FORM SUBMISSION
         * ========================================================= */

        if ($form.length) {
            $form
                .off('submit.entryItem')
                .on('submit.entryItem', function (e) {

                    // Prepare concatenated descriptions first.
                    prepareDescriptions();

                    // Validate the selected item.
                    if (!validateCurrentItem()) {
                        e.preventDefault();
                        showWarning(true);
                        return false;
                    }

                    showWarning(false);

                    // Allow normal Laravel form submission.
                    return true;
                });
        }


        /* =========================================================
         * ADD ITEM BUTTON
         * ========================================================= */

        $('#add_item_submit_btn')
            .off('click.entryItem')
            .on('click.entryItem', function () {
                // Validation is handled by the form submit event.
                prepareDescriptions();
            });


        /* =========================================================
         * ITEM SELECT CHANGE
         * ========================================================= */

        $itemSelect
            .off('change.entryItem')
            .on('change.entryItem', function () {
                showItemSection($(this).val(), $modal);
                resetWarnings();
            });


        // =========================================================
// EDIT ITEM: ITEM TYPE CHANGE
// =========================================================

        const $editModal = $editItemSelect.closest('.modal');

        $editItemSelect
            .off('change.entryItem')
            .on('change.entryItem', function () {
                const itemType = $(this).val();

                // Show the selected item section inside Edit Item modal only
                showItemSection(itemType, $editModal);
            });

// Initialize the correct section when the modal opens
        $editModal
            .off('shown.bs.modal.entryItem')
            .on('shown.bs.modal.entryItem', function () {
                const itemType = $editItemSelect.val();

                if (itemType) {
                    showItemSection(itemType, $editModal);
                }
            });


        /* =========================================================
         * AUTOGRAPH CHECKBOX REQUIRED FIELDS
         * ========================================================= */

        function updateAuthenticatorRequired(
            checkboxSelector,
            nameSelector,
            certSelector
        ) {
            const checked = $(checkboxSelector).is(':checked');

            setRequired(nameSelector, checked);
            setRequired(certSelector, checked);
        }

        $('#card_autographed')
            .off('change.entryItem')
            .on('change.entryItem', function () {
                updateAuthenticatorRequired(
                    '#card_autographed',
                    '#card_authenticator_name',
                    '#card_authenticator_cert_no'
                );
            });

        $('#combined_service_autographed')
            .off('change.entryItem')
            .on('change.entryItem', function () {
                updateAuthenticatorRequired(
                    '#combined_service_autographed',
                    '#combined_service_authenticator_name',
                    '#combined_service_authenticator_cert_no'
                );
            });


        /* =========================================================
         * CHECKBOX VALUE HANDLING
         * ========================================================= */

        $('.form-check')
            .off('change.entryItem')
            .on('change.entryItem', function () {
                this.value = this.checked ? 1 : 0;
            });


        /* =========================================================
         * QUANTITY VALIDATION
         * ========================================================= */

        $('#extra_submit_btn')
            .off('click.entryItem')
            .on('click.entryItem', function (e) {
                const quantity = getValue('#quantity-input-box');

                if (!quantity || Number(quantity) <= 0) {
                    e.preventDefault();

                    $(this).attr('type', 'button');
                    $('#quantity-warning-text').show();

                    return false;
                }

                $('#quantity-warning-text').hide();
                $(this).attr('type', 'submit');
            });


        /* =========================================================
         * CANCEL BUTTON
         * ========================================================= */

        $('#cancel_btn')
            .off('click.entryItem')
            .on('click.entryItem', function () {

                if ($form.length) {
                    $form[0].reset();
                }

                $itemSelect.val('');

                // Hide and disable all sections.
                SECTION_IDS.forEach(function (selector) {
                    const $section = $modal.find(selector);

                    $section.hide();
                    disableSectionInputs($section);
                });

                resetWarnings();

                // Clear split Card fields.
                $(
                    '#card_year, ' +
                    '#card_manufacturer, ' +
                    '#card_number, ' +
                    '#card_player_name'
                ).val('');

                // Clear split Combined Service fields.
                $(
                    '#combined_service_year, ' +
                    '#combined_service_manufacturer, ' +
                    '#combined_service_number, ' +
                    '#combined_service_player_name'
                ).val('');

                // Clear concatenated description fields.
                $(
                    '#card_description_one, ' +
                    '#card_description_two, ' +
                    '#card_description_three, ' +
                    '#combined_service_description_one, ' +
                    '#combined_service_description_two, ' +
                    '#combined_service_description_three'
                ).val('');

                // Reset autograph requirements.
                $('#card_autographed').trigger('change');
                $('#combined_service_autographed').trigger('change');
            });


        /* =========================================================
         * MODAL RESET
         * ========================================================= */

        $modal
            .off('hidden.bs.modal.entryItem')
            .on('hidden.bs.modal.entryItem', function () {

                if ($form.length) {
                    $form[0].reset();
                }

                $itemSelect.val('');

                SECTION_IDS.forEach(function (selector) {
                    const $section = $modal.find(selector);

                    $section.hide();
                    disableSectionInputs($section);
                });

                resetWarnings();

                $('#card_autographed').trigger('change');
                $('#combined_service_autographed').trigger('change');
            });


        /* =========================================================
         * INITIAL STATE
         * ========================================================= */

        SECTION_IDS.forEach(function (selector) {
            const $section = $modal.find(selector);

            $section.hide();
            disableSectionInputs($section);
        });

        resetWarnings();

        if ($itemSelect.val()) {
            showItemSection($itemSelect.val(), $modal);
        }

    });

</script>

<script>
    $(document).ready(function () {
        'use strict';

        // Handle each Edit Item modal separately.
        $('[id^="editItemModal-"]').each(function () {

            const $editModal = $(this);
            const $editForm = $editModal.find('#editItemForm');
            const $editItemType = $editModal.find('#edit_item_type');

            function getValue(selector) {
                return $.trim($editModal.find(selector).val() || '');
            }

            // Split: "1979-80, O-Pee-Chee"
            // Result: ["1979-80", "O-Pee-Chee"]
            function splitDescription(value) {
                value = $.trim(value || '');

                if (!value) {
                    return ['', ''];
                }

                const index = value.indexOf(', ');

                if (index === -1) {
                    return [value, ''];
                }

                return [
                    value.substring(0, index).trim(),
                    value.substring(index + 2).trim()
                ];
            }

            // Join separate fields into the existing DB format.
            function joinDescription(values) {
                return values
                    .map(function (value) {
                        return $.trim(value || '');
                    })
                    .filter(Boolean)
                    .join(', ');
            }

            // Populate Card fields.
            function populateCardFields() {
                const descOne = splitDescription(
                    getValue('#edit_card_description_one')
                );

                const descTwo = splitDescription(
                    getValue('#edit_card_description_two')
                );

                $editModal.find('#edit_card_year').val(descOne[0]);
                $editModal.find('#edit_card_manufacturer').val(descOne[1]);

                $editModal.find('#edit_card_number').val(descTwo[0]);
                $editModal.find('#edit_card_player_name').val(descTwo[1]);
            }

            // Populate Combined Service fields.
            function populateCombinedFields() {
                const descOne = splitDescription(
                    getValue('#edit_combined_description_one')
                );

                const descTwo = splitDescription(
                    getValue('#edit_combined_description_two')
                );

                $editModal.find('#edit_combined_year').val(descOne[0]);
                $editModal.find('#edit_combined_manufacturer').val(descOne[1]);

                $editModal.find('#edit_combined_number').val(descTwo[0]);
                $editModal.find('#edit_combined_player_name').val(descTwo[1]);
            }

            // Prepare Card descriptions before saving.
            function prepareCardDescriptions() {
                const itemType = $editItemType.val();

                const noNumber = [
                    'Card (No Number)',
                    'Card (Autographed) No Number'
                ].includes(itemType);

                const number = noNumber
                    ? ''
                    : getValue('#edit_card_number');

                $editModal.find('#edit_card_description_one').val(
                    joinDescription([
                        getValue('#edit_card_year'),
                        getValue('#edit_card_manufacturer')
                    ])
                );

                $editModal.find('#edit_card_description_two').val(
                    joinDescription([
                        number,
                        getValue('#edit_card_player_name')
                    ])
                );
            }

            // Prepare Combined Service descriptions before saving.
            function prepareCombinedDescriptions() {
                const noNumber =
                    $editItemType.val() === 'Combined Service (No Number)';

                const number = noNumber
                    ? ''
                    : getValue('#edit_combined_number');

                $editModal.find('#edit_combined_description_one').val(
                    joinDescription([
                        getValue('#edit_combined_year'),
                        getValue('#edit_combined_manufacturer')
                    ])
                );

                $editModal.find('#edit_combined_description_two').val(
                    joinDescription([
                        number,
                        getValue('#edit_combined_player_name')
                    ])
                );
            }

            // Show the correct section without changing Item Type.
            function showEditSection() {
                const itemType = $editItemType.val();

                $editModal.find(
                    '#editCardSection, #editCombinedServiceSection'
                ).hide();

                if ([
                    'Card',
                    'Card (No Number)',
                    'Card (Autographed)',
                    'Card (Autographed) No Number',
                    'Index Card'
                ].includes(itemType)) {

                    $editModal.find('#editCardSection').show();

                    const noNumber = [
                        'Card (No Number)',
                        'Card (Autographed) No Number',
                        'Index Card'
                    ].includes(itemType);

                    $editModal.find('#editCardNumberField').toggle(!noNumber);
                }

                if ([
                    'Combined Service',
                    'Combined Service (No Number)'
                ].includes(itemType)) {

                    $editModal.find('#editCombinedServiceSection').show();

                    const noNumber =
                        itemType === 'Combined Service (No Number)';

                    $editModal.find('#editCombinedNumberField').toggle(!noNumber);
                }
            }

            // Populate fields when the modal opens.
            $editModal
                .off('shown.bs.modal.editDescriptions')
                .on('shown.bs.modal.editDescriptions', function () {

                    showEditSection();

                    populateCardFields();
                    populateCombinedFields();
                });

            // Prepare concatenated values before saving.
            $editForm
                .off('submit.editDescriptions')
                .on('submit.editDescriptions', function () {

                    const itemType = $editItemType.val();

                    if ([
                        'Card',
                        'Card (No Number)',
                        'Card (Autographed)',
                        'Card (Autographed) No Number'
                    ].includes(itemType)) {

                        prepareCardDescriptions();
                    }

                    if ([
                        'Combined Service',
                        'Combined Service (No Number)'
                    ].includes(itemType)) {

                        prepareCombinedDescriptions();
                    }
                });

            // Initial state.
            showEditSection();

        });
    });
</script>
@endpush
