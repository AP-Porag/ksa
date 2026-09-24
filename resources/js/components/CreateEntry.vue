<template>
    <div class="">
<!--        <form>-->
            <!--            :title="`Create Third party with ${step_count} steps`"-->
            <!--        :subtitle="form_wizard_subtitle"-->
            <!--        @on-change="handleTabChange"-->
            <form-wizard
                @on-complete="submit"
                color="#3476ae"
                title=""
                subtitle=""
                next-button-text="Continue"
                finish-button-text="Save"
            >

                <template v-slot:footer="props">
                    <div class="wizard-footer-left">
                        <wizard-button  v-if="props.activeTabIndex > 0" @click.native="props.prevTab()" :style="props.fillButtonStyle">Back</wizard-button>
                    </div>
                    <div class="wizard-footer-right">
                        <wizard-button @click.native="cancel" class="wizard-footer-right finish-button" style="background: orange;margin-left: 15px;color: white;">Cancel</wizard-button>
                        <wizard-button v-if="!props.isLastStep"@click.native="props.nextTab()" class="wizard-footer-right" :style="props.fillButtonStyle">Continue</wizard-button>
                        <wizard-button v-else @click.native="submit" class="wizard-footer-right" :style="props.fillButtonStyle">Save</wizard-button>
                    </div>
                </template>
                <tab-content
                    title="Customer Info"
                    icon="ti-user"
                    :before-change="checkFirstStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Customer Name
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.customer"
                                                        @change="customerNameChangeEvent"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(customer,index) in customers" :value="customer" :key="customer.id"><span>{{customer.name}}</span>  <span>📩{{customer.email}}</span></option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.name" :options="customers" placeholder="Select customer..." @change="customerNameChangeEvent($event)" />-->
                                                <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">
                                                    Customer name is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 bg-black">
                                            <a href="/admin/customers/create" class="btn btn-light bg-white" style="margin-top: 28px; float: right;">Add New Customer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Grading Location"
                    icon="ti-map-alt"
                    :before-change="checkSecondStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <!--                        <div class="card shipping_address_card">-->
                            <!--                            <div class="card-body">-->
                            <!--                                <div class="row">-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Drop Off Center-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
                            <!--                                                Name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100">-->
                            <!--                                                Contact Name-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
                            <!--                                                contact name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Email Address-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="email"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.email.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
                            <!--                                                email is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Select the grading location for this order
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.grading_location.$model"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(location,index) in gradingLocations" :value="location.id" :key="location.id">{{location.name}}</option>
                                                </select>

                                                <!--                                            <Select2 v-model="form_data.grading_location" :options="gradingLocations" />-->
                                                <div class="error" v-if="v$.form_data.grading_location.required.$invalid && show_error_two">
                                                    Grading location is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Billing Address"
                    icon="ti-infinite"
                    :before-change="checkThirdStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <!--                        <div class="card shipping_address_card">-->
                            <!--                            <div class="card-body">-->
                            <!--                                <div class="row">-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Drop Off Center-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
                            <!--                                                Name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100">-->
                            <!--                                                Contact Name-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
                            <!--                                                contact name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Email Address-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="email"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.email.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
                            <!--                                                email is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Address Line one
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    autofocus
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.billing_address_line_one.$model"
                                                    ref="billing_address_line_one"
                                                />
                                                <div class="error" v-if="v$.form_data.billing_address_line_one.required.$invalid && show_error_three">
                                                    One Address Line is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Address Line two
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="form_data.billing_address_line_two"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.billing_address_line_two.required.$invalid && show_error">-->
                                                <!--                                                Second address Line two is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    City
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.billing_city.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_three">
                                                    City is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Province/State
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.billing_province.$model"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.billing_province.required.$invalid && show_error_three">
                                                    Province is required
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    postal/Zip code
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.billing_postal.$model"
                                                    @input="event => v$.form_data.billing_postal.$model = event.target.value.toUpperCase()"
                                                />
                                                <div class="error" v-if="v$.form_data.billing_postal.required.$invalid && show_error_three">
                                                    Postal is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label w-100 text-capitalize">
                                                        Country
                                                        <span class="error">*</span>
                                                    </label>
                                                    <select class="form-select mb-text-only" aria-label="Default select example"
                                                            v-model.trim="v$.form_data.billing_country.$model"
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                    </select>
                                                    <div class="error" v-if="v$.form_data.billing_country.required.$invalid && show_error_three">
                                                        Country is required
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label w-100 text-capitalize">
                                                        Telephone#
<!--                                                        <span class="error">*</span>-->
                                                    </label>
                                                    <VuePhoneNumberInput
                                                        id="phoneNumber1"
                                                        class="mb-text-only"
                                                        v-model.trim="form_data.billing_phone"
                                                        default-country-code="CA"
                                                        :only-countries="countries_phone"
                                                        style="background-color: #e8f0fe !important;"
                                                    />
<!--                                                    <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error_three">-->
<!--                                                        Phone is required-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Shipping Address"
                    icon="ti-infinite"
                    :before-change="checkFourthStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <!--                        <div class="card shipping_address_card">-->
                            <!--                            <div class="card-body">-->
                            <!--                                <div class="row">-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Drop Off Center-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
                            <!--                                                Name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100">-->
                            <!--                                                Contact Name-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="text"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.contact_name.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
                            <!--                                                contact name is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="col-md-4">-->
                            <!--                                        <div class="mb-3">-->
                            <!--                                            <label class="form-label w-100 text-capitalize">-->
                            <!--                                                Email Address-->
                            <!--                                            </label>-->
                            <!--                                            <input-->
                            <!--                                                type="email"-->
                            <!--                                                class="form-control md-readonly"-->
                            <!--                                                placeholder=""-->
                            <!--                                                v-model.trim="v$.form_data.email.$model"-->
                            <!--                                                readonly-->
                            <!--                                            />-->
                            <!--                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">-->
                            <!--                                                email is required-->
                            <!--                                            </div>-->
                            <!--                                        </div>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                        </div>

                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3 d-flex justify-content-start">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    Same as billing address
                                                </label>
                                                <input
                                                    type="checkbox"
                                                    class="form-check"
                                                    placeholder=""
                                                    v-model.trim="form_data.same_as_billing"
                                                    @change="sameAsBillingChanged($event)"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                <!--                                                Same as Billing is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Customer Name (if different)
                                                </label>
                                                <input
                                                    autofocus
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="form_data.shipping_name"
                                                    ref="shipping_name"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.shipping_name.required.$invalid && show_error">-->
                                                <!--                                                Name for shipping is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Contact Name (if different)
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.shipping_company_name.$model"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.shipping_company_name.required.$invalid && show_error">-->
                                                <!--                                                Company name is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Address Line one
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.shipping_address_line_one.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_address_line_one.required.$invalid && show_error_four">
                                                    One Address is required for shipping
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Address Line two
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="form_data.shipping_address_line_two"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.shipping_address_line_two.required.$invalid && show_error">-->
                                                <!--                                                Second shipping address required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    City
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.shipping_city.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_city.required.$invalid && show_error_four">
                                                    city is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Province/State
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.shipping_province.$model"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.shipping_province.required.$invalid && show_error_four">
                                                    Province is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    postal/Zip code
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.shipping_postal.$model"
                                                    @input="event => v$.form_data.shipping_postal.$model = event.target.value.toUpperCase()"
                                                />
                                                <div class="error" v-if="v$.form_data.shipping_postal.required.$invalid && show_error_four">
                                                    Postal is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label class="form-label w-100 text-capitalize">
                                                        Country
                                                        <span class="error">*</span>
                                                    </label>
                                                    <select class="form-select mb-text-only" aria-label="Default select example"
                                                            v-model.trim="v$.form_data.shipping_country.$model"
                                                    >
                                                        <option selected disabled>Open this select menu</option>
                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>
                                                    </select>
                                                    <div class="error" v-if="v$.form_data.shipping_country.required.$invalid && show_error_four">
                                                        Country is required
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label w-100 text-capitalize">
                                                        Telephone#
<!--                                                        <span class="error">*</span>-->
                                                    </label>
                                                    <VuePhoneNumberInput
                                                        id="phoneNumber1"
                                                        class="mb-text-only"
                                                        v-model.trim="form_data.shipping_phone"
                                                        default-country-code="CA"
                                                        :only-countries="countries_phone"
                                                    />
<!--                                                    <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error_four">-->
<!--                                                        Phone is required-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </tab-content>
                <tab-content
                    title="Extra Fields"
                    icon="ti-server"
                    :before-change="checkFifthStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Submission date
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    autofocus
                                                    type="date"
                                                    class="form-control mb-text-only"
                                                    placeholder=""
                                                    :max="maxDate"
                                                    v-model.trim="v$.form_data.submission_date.$model"
                                                    ref="billing_address_line_one"
                                                />
                                                <div class="error" v-if="v$.form_data.submission_date.required.$invalid && show_error_five">
                                                    Submission date is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Promo code
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.promo_code"
                                                >
                                                    <option selected disabled v-if="promos.length > 0">Open this select menu</option>
                                                    <option selected disabled v-else>There is no promo code</option>
                                                    <option v-for="(promo,index) in promos" :value="promo.id" :key="promo.id">{{promo.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.promo_code" :options="promoCodes" />-->
                                            </div>
                                        </div>

                                        <div class="col-md-2 text-left">
                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    Payment Made
                                                </label>
                                                <input
                                                    type="radio"
                                                    class="form-check"
                                                    name="payment_method"
                                                    placeholder=""
                                                    value="pym"
                                                    v-model.trim="form_data.payment_method"
                                                />
                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                <!--                                                Same as Billing is required-->
                                                <!--                                            </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-2 text-left">
                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    Pay on pickup
                                                </label>
                                                <input
                                                    type="radio"
                                                    class="form-check"
                                                    name="payment_method"
                                                    placeholder=""
                                                    value="pop"
                                                    v-model.trim="form_data.payment_method"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-1 text-left">
                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    COD
                                                </label>
                                                <input
                                                    type="radio"
                                                    class="form-check"
                                                    name="payment_method"
                                                    placeholder=""
                                                    value="cod"
                                                    v-model.trim="form_data.payment_method"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-md-1 text-left">
                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">
                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                    N/A
                                                </label>
                                                <input
                                                    type="radio"
                                                    class="form-check"
                                                    name="payment_method"
                                                    placeholder=""
                                                    value="n/a"
                                                    v-model.trim="form_data.payment_method"
                                                />
                                            </div>
                                        </div>

<!--                                        <div class="col-md-3">-->
<!--                                            <div class="mb-3">-->
<!--                                                <label class="form-label w-100 text-capitalize">-->
<!--                                                    Shopify order number-->
<!--                                                </label>-->
<!--                                                <input-->
<!--                                                    type="number"-->
<!--                                                    class="form-control mb-text-only"-->
<!--                                                    placeholder=""-->
<!--                                                    v-model.trim="form_data.shopify_order_number"-->
<!--                                                />-->
<!--&lt;!&ndash;                                                <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_two">&ndash;&gt;-->
<!--&lt;!&ndash;                                                    City is required&ndash;&gt;-->
<!--&lt;!&ndash;                                                </div>&ndash;&gt;-->
<!--                                            </div>-->
<!--                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Shipping Method"
                    icon="ti-credit-card"
                    :before-change="checkSixthStep"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Shipping Method
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.shipping_method"
                                                        @change="shippingMethodsChangeEvent"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(shipping,index) in shippingMethods" :value="shipping.name" :key="shipping.id">{{shipping.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.shipping_method" :options="shippingMethods" @change="shippingMethodsChangeEvent($event)" />-->
                                                <div class="error" v-if="v$.form_data.shipping_method.required.$invalid && show_error_six">
                                                    Shipping method is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showPickupLocationBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Pickup location
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.pickup_location"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(pickup,index) in pickUpLocations" :value="pickup.name" :key="pickup.id">{{pickup.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.pickup_location" :options="pickUpLocations" />-->
                                                <div class="error" v-if="v$.form_data.pickup_location.required.$invalid && show_error_seven">
                                                    Pickup location is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showShowPickupLocationBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Pickup Location
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.show_pickup_location"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(showPickup,index) in pickUpLocations" :value="showPickup.name" :key="showPickup.id">{{showPickup.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.show_pickup_location" :options="pickUpLocations" />-->
                                                <div class="error" v-if="v$.form_data.show_pickup_location.required.$invalid && show_error_eight">
                                                    Pickup location is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showThirdPartyBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Third party drop off center
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.third_party_drop_center"
                                                >
                                                    <option selected disabled v-if="parties.length > 0">Open this select menu</option>
                                                    <option selected disabled v-else>There is no third party</option>
                                                    <option v-for="(third,index) in parties" :value="third.id" :key="third.id">{{third.name}}</option>
                                                </select>
                                                <div class="error" v-if="v$.form_data.third_party_drop_center.required.$invalid && show_error_nine">
                                                    Third party drop off center is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showUPSBox">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                        <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                            Use Customer Account
                                                        </label>
                                                        <input
                                                            type="checkbox"
                                                            class="form-check"
                                                            placeholder=""
                                                            v-model.trim="form_data.use_customer_account"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100 text-capitalize">
                                                            Customer Account number
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="number"
                                                            class="form-control mb-text-only"
                                                            placeholder=""
                                                            v-model.trim="form_data.customer_account_number"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.customer_account_number.required.$invalid && show_error_ten">-->
<!--                                                            Customer account number is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Quantity"
                    icon="ti-package"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-capitalize">
                                                    Number of items in this order
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder="Number of items (Number only)"
                                                    v-model.trim="form_data.item_qty"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </tab-content>
                <tab-content
                    title="Item Type"
                    icon="ti-gift"
                >
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Select the item type to be entered
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="form_data.itemType"
                                                        @change="itemTypeChangeEvent"
                                                >
                                                    <option v-for="(type,index) in itemTypes" :value="type.name" :key="type.id">{{type.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.itemType" :options="itemTypes" @change="itemTypeChangeEvent($event)" />-->
                                                <div class="error" v-if="v$.form_data.itemType.required.$invalid && show_error_eleven">
                                                    Item type is required
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="showItemTypeCrossoverBox">
                                            <div class="mb-3">
                                                <label class="form-label w-100 text-capitalize">
                                                    Crossover Item Type
                                                    <span class="error">*</span>
                                                </label>
                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                        v-model.trim="v$.form_data.crossover_item_type.$model"
                                                >
                                                    <option selected disabled>Open this select menu</option>
                                                    <option v-for="(coType,index) in crossoverItemTypes" :value="coType.name" :key="coType.id">{{coType.name}}</option>
                                                </select>
                                                <!--                                            <Select2 v-model="form_data.crossover_item_type" :options="crossoverItemTypes" />-->
                                                <div class="error" v-if="v$.form_data.crossover_item_type.required.$invalid && show_error_sixteen">
                                                    Crossover item type is required
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--item type card-->
                        <div class="col-md-12" v-if="showItemTypeCardBox">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Qty
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="form_data.item_qty"
                                                    readonly
                                                />
<!--                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                    contact name is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.card_description_one.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.card_description_one.required.$invalid && show_error_twelve">
                                                            Description one is required
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #2
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.card_description_two"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.card_description_two.required.$invalid && show_error_twelve">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #3
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.card_description_three"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.card_description_three.required.$invalid && show_error_twelve">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Serial Number   (Only if printed directly on item)
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.card_serial_number"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.card_serial_number.required.$invalid && show_error_twelve">-->
<!--                                                            Serial number is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                    Autographed
                                                                </label>
                                                                <input
                                                                    type="checkbox"
                                                                    class="form-check"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.card_autographed"
                                                                />
                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                                <!--                                                Same as Billing is required-->
                                                                <!--                                            </div>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100 text-capitalize">
                                                                    Authenticator Name
                                                                    <span class="error" v-if="form_data.card_autographed">*</span>
                                                                </label>
                                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                                        v-model.trim="v$.form_data.card_authenticator_name.$model"
                                                                >
                                                                    <option selected disabled>Open this select menu</option>
                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                </select>
                                                                <!--                                                            <Select2 v-model="form_data.authenticator_name" :options="authenticators" />-->
                                                                <div class="error" v-if="v$.form_data.card_authenticator_name.required.$invalid && show_error_twelve">
                                                                    Authenticator name is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                    Certified on card
<!--                                                                    <span class="error" v-if="form_data.card_autographed">*</span>-->
                                                                </label>
                                                                <input
                                                                    type="checkbox"
                                                                    class="form-check"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.card_certified_on_card"
                                                                />
<!--                                                                <div class="error" v-if="v$.form_data.card_certified_on_card.required.$invalid && show_error_seventeen">-->
<!--                                                                    Certified on card is required-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100">
                                                                    Authenticator Cert. No.
<!--                                                                    <span class="error" v-if="form_data.card_autographed">*</span>-->
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.card_authenticator_cert_no"
                                                                />
<!--                                                                <div class="error" v-if="v$.form_data.card_authenticator_cert_no.required.$invalid && show_error_seventeen">-->
<!--                                                                    Authenticator cert no. is required-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="visibility: hidden;">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Estimated Value
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.card_estimated_value.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.card_estimated_value.required.$invalid && show_error_twelve">
                                                    Estimated value is required
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--item type auto authentication-->
                        <div class="col-md-12" v-if="showItemTypeAutoAthenticationBox">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Qty
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="form_data.item_qty"
                                                    readonly
                                                />
<!--                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                    contact name is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.auto_authentication_description_one.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_one.required.$invalid && show_error_thirteen">
                                                            Description one is required
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #2
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.auto_authentication_description_two"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_two.required.$invalid && show_error_thirteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #3
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.auto_authentication_description_three"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.auto_authentication_description_three.required.$invalid && show_error_thirteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Serial Number   (Only if printed directly on item)
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.auto_authentication_serial_number"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                            contact name is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                    Autographed
                                                                </label>
                                                                <input
                                                                    type="checkbox"
                                                                    class="form-check"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.auto_authentication_autographed"
                                                                />
                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                                <!--                                                Same as Billing is required-->
                                                                <!--                                            </div>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100 text-capitalize">
                                                                    Authenticator Name
                                                                    <span class="error" v-if="form_data.auto_authentication_autographed">*</span>
                                                                </label>
                                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                                        v-model.trim="v$.form_data.auto_authentication_authenticator_name.$model"
                                                                >
                                                                    <option selected disabled>Open this select menu</option>
                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                </select>
                                                                <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
                                                                <div class="error" v-if="v$.form_data.auto_authentication_authenticator_name.required.$invalid && show_error_thirteen">
                                                                    Authenticator name is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100">
                                                                    Authenticator Cert. No.
                                                                    <span class="error" v-if="form_data.auto_authentication_authenticator_cert_no">*</span>
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder=""
                                                                    v-model.trim="v$.form_data.auto_authentication_authenticator_cert_no.$model"
                                                                />
                                                                <div class="error" v-if="v$.form_data.auto_authentication_authenticator_cert_no.required.$invalid && show_error_thirteen">
                                                                    Authenticator cert. no. is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="visibility: hidden;">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Estimated Value
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.auto_authentication_estimated_value.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.auto_authentication_estimated_value.required.$invalid && show_error_thirteen">
                                                    Estimated value is required
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--item type combined service-->
                        <div class="col-md-12" v-if="showItemTypeCombinedServiceBox">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Qty
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="form_data.item_qty"
                                                    readonly
                                                />
<!--                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                    contact name is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.combined_service_description_one.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.combined_service_description_one.required.$invalid && show_error_fourteen">
                                                            Description one is required
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #2
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.combined_service_description_two"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_two.required.$invalid && show_error_fourteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #3
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.combined_service_description_three"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.combined_service_description_three.required.$invalid && show_error_fourteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Serial Number   (Only if printed directly on item)
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.combined_service_serial_number"
                                                        />
                                                        <!--                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
                                                        <!--                                                            contact name is required-->
                                                        <!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                    Autographed
                                                                </label>
                                                                <input
                                                                    type="checkbox"
                                                                    class="form-check"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.combined_service_autographed"
                                                                />
                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                                <!--                                                Same as Billing is required-->
                                                                <!--                                            </div>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100 text-capitalize">
                                                                    Authenticator Name
                                                                    <span class="error" v-if="form_data.combined_service_autographed">*</span>
                                                                </label>
                                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                                        v-model.trim="v$.form_data.combined_service_authenticator_name.$model"
                                                                >
                                                                    <option selected disabled>Open this select menu</option>
                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                </select>
                                                                <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
                                                                <div class="error" v-if="v$.form_data.combined_service_authenticator_name.required.$invalid && show_error_fourteen">
                                                                    Authenticator Name is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100">
                                                                    Authenticator Cert. No.
                                                                    <span class="error" v-if="form_data.combined_service_autographed">*</span>
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder=""
                                                                    v-model.trim="v$.form_data.combined_service_authenticator_cert_no.$model"
                                                                />
                                                                <div class="error" v-if="v$.form_data.combined_service_authenticator_cert_no.required.$invalid && show_error_fourteen">
                                                                    Authenticator cert. no. is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="visibility: hidden;">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Estimated Value
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.combined_service_estimated_value.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.combined_service_estimated_value.required.$invalid && show_error_fourteen">
                                                    Estimated value is required
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--item type reholder-->
                        <div class="col-md-12" v-if="showItemTypeReholderBox">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Qty
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="form_data.item_qty"
                                                    readonly
                                                />
<!--                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                    contact name is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Certification Number
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.reholder_certification_number.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.reholder_certification_number.required.$invalid && show_error_fifteen">
                                                            Certification number is required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="visibility: hidden;">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Estimated Value
                                                    <span class="error">*</span>
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="v$.form_data.reholder_estimated_value.$model"
                                                />
                                                <div class="error" v-if="v$.form_data.reholder_estimated_value.required.$invalid && show_error_fifteen">
                                                    Estimated value is required
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--item type crossover-->
                        <div class="col-md-12" v-if="showItemTypeCrossoverBox">
                            <div class="card shipping_address_card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label w-100">
                                                    Qty
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    v-model.trim="form_data.item_qty"
                                                    readonly
                                                />
<!--                                                <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
<!--                                                    contact name is required-->
<!--                                                </div>-->
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #1   (Year,Manufacturer,Set,Other)
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.crossover_description_one.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.crossover_description_one.required.$invalid && show_error_sixteen">
                                                            Description one is required
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #2
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.crossover_description_two"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.crossover_description_two.required.$invalid && show_error_sixteen">-->
<!--                                                            Description two is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Description #3
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.crossover_description_three"
                                                        />
<!--                                                        <div class="error" v-if="v$.form_data.crossover_description_three.required.$invalid && show_error_sixteen">-->
<!--                                                            Description three is required-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Serial Number   (Only if printed directly on item)
<!--                                                            <span class="error">*</span>-->
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="form_data.crossover_serial_number"
                                                        />
                                                        <!--                                                        <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">-->
                                                        <!--                                                            contact name is required-->
                                                        <!--                                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">
                                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">
                                                                    Autographed
                                                                </label>
                                                                <input
                                                                    type="checkbox"
                                                                    class="form-check"
                                                                    placeholder=""
                                                                    v-model.trim="form_data.crossover_autographed"
                                                                />
                                                                <!--                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">-->
                                                                <!--                                                Same as Billing is required-->
                                                                <!--                                            </div>-->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100 text-capitalize">
                                                                    Authenticator Name
                                                                    <span class="error" v-if="form_data.crossover_autographed">*</span>
                                                                </label>
                                                                <select class="form-select mb-text-only" aria-label="Default select example"
                                                                        v-model.trim="v$.form_data.crossover_authenticator_name.$model"
                                                                >
                                                                    <option selected disabled>Open this select menu</option>
                                                                    <option v-for="(authenticator,index) in authenticators" :value="authenticator.id" :key="authenticator.id">{{authenticator.name}}</option>
                                                                </select>
                                                                <!--                                                            <Select2 v-model="form_data.authenticator_name_two" :options="authenticators" />-->
                                                                <div class="error" v-if="v$.form_data.crossover_authenticator_name.required.$invalid && show_error_sixteen">
                                                                    Authenticator Name is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label w-100">
                                                                    Authenticator Cert. No.
                                                                    <span class="error" v-if="form_data.crossover_autographed">*</span>
                                                                </label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder=""
                                                                    v-model.trim="v$.form_data.crossover_authenticator_cert_no.$model"
                                                                />
                                                                <div class="error" v-if="v$.form_data.crossover_authenticator_cert_no.required.$invalid && show_error_sixteen">
                                                                    Authenticator cert. no. is required
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2" style="visibility: hidden;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100">
                                                            Estimated Value
                                                            <span class="error">*</span>
                                                        </label>
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            placeholder=""
                                                            v-model.trim="v$.form_data.crossover_estimated_value.$model"
                                                        />
                                                        <div class="error" v-if="v$.form_data.crossover_estimated_value.required.$invalid && show_error_sixteen">
                                                            Estimated value is required
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label w-100 text-capitalize">
                                                            Minimum Grade
                                                            <span class="error">*</span>
                                                        </label>
                                                        <select class="form-select mb-text-only" aria-label="Default select example"
                                                                v-model.trim="v$.form_data.crossover_minimum_grade.$model"
                                                        >
                                                            <option selected disabled>Open this select menu</option>
                                                            <option v-for="(grade,index) in minimumGrades" :value="grade.id" :key="grade.id">{{grade.name}}</option>
                                                        </select>
                                                        <!--                                                    <Select2 v-model="form_data.minimum_grade" :options="minimumGrades" />-->
                                                        <div class="error" v-if="v$.form_data.crossover_minimum_grade.required.$invalid && show_error_sixteen">
                                                            Minimum grade is required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--item type cardNew-->
                        <div class="col-md-12" v-if="showCardNew">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Number
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionTwoNumber"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionTwoPlayerName"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial Number -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.card_serial_number"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--item type cardNoNumber-->
                        <div class="col-md-12" v-if="showCardNoNumber">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 FULL WIDTH -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_two"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial Number -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.card_serial_number"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--item type cardAuto-->
                        <div class="col-md-12" v-if="showCardAuto">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionTwoNumber"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionTwoPlayerName"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.card_serial_number"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Authenticator Section -->
                                                    <div class="row autograph-row">

                                                        <!-- Autographed -->
                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="autographed-wrapper">

                                                                <label>
                                                                    Autographed
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.card_autographed"
                                                                >

                                                            </div>

                                                        </div>


                                                        <!-- Authenticator Name -->
                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Name
                                                            </label>

                                                            <select
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_name"
                                                            >
                                                                <option
                                                                    v-for="(authenticator,index) in authenticators"
                                                                    :value="authenticator.id"
                                                                    :key="authenticator.id"
                                                                >
                                                                    {{authenticator.name}}
                                                                </option>
                                                            </select>

                                                        </div>


                                                        <!-- Certified On Card -->
                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="certified-wrapper">

                                                                <label>
                                                                    Certified On Card
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.card_certified_on_card"
                                                                >

                                                            </div>

                                                        </div>


                                                        <!-- Certificate Number -->
                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Cert. No.
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_cert_no"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--item type cardAutoNoNumber-->
                        <div class="col-md-12" v-if="showCardAutoNoNumber">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="cardDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_two"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.card_serial_number"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Authenticator -->
                                                    <div class="row autograph-row">

                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="autographed-wrapper">

                                                                <label>
                                                                    Autographed
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.card_autographed"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Name
                                                            </label>

                                                            <select
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_name"
                                                            >
                                                                <option
                                                                    v-for="(authenticator,index) in authenticators"
                                                                    :value="authenticator.id"
                                                                    :key="authenticator.id"
                                                                >
                                                                    {{authenticator.name}}
                                                                </option>
                                                            </select>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="certified-wrapper">

                                                                <label>
                                                                    Certified On Card
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.card_certified_on_card"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Cert. No.
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_cert_no"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--item type indexCard-->
                        <div class="col-md-12" v-if="showIndexCard">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box index-card-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_one"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_two"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.card_serial_number"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Authenticator -->
                                                    <div class="row autograph-row">

                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="autographed-wrapper">

                                                                <label>
                                                                    Autographed
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.card_autographed"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-4 col-md-4 col-12">

                                                            <label class="field-label">
                                                                Authenticator Name
                                                            </label>

                                                            <select
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_name"
                                                            >
                                                                <option
                                                                    v-for="(authenticator,index) in authenticators"
                                                                    :value="authenticator.id"
                                                                    :key="authenticator.id"
                                                                >
                                                                    {{authenticator.name}}
                                                                </option>
                                                            </select>

                                                        </div>


                                                        <div class="col-lg-5 col-md-5 col-12">

                                                            <label class="field-label">
                                                                Authenticator Cert. No.
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.card_authenticator_cert_no"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--item type newCombinedService-->
                        <div class="col-md-12" v-if="showNewCombinedService">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box combined-service-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionTwoNumber"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionTwoPlayerName">
                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.combined_service_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.combined_service_serial_number"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Authenticator -->
                                                    <div class="row autograph-row">

                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="autographed-wrapper">

                                                                <label>
                                                                    Autographed
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.combined_service_autographed"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Name
                                                            </label>

                                                            <select
                                                                class="form-control"
                                                                v-model="form_data.combined_service_authenticator_name"
                                                            >
                                                                <option
                                                                    v-for="(authenticator,index) in authenticators"
                                                                    :value="authenticator.id"
                                                                    :key="authenticator.id"
                                                                >
                                                                    {{authenticator.name}}
                                                                </option>
                                                            </select>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="certified-wrapper">

                                                                <label>
                                                                    Certified On Card
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <label class="field-label">
                                                                Authenticator Cert. No.
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.combined_service_authenticator_cert_no"
                                                            >

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--item type newCombinedServiceNoNumber-->
                        <div class="col-md-12" v-if="showNewCombinedServiceNoNumber">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box combined-service-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Fields -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <!-- Description #1 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #1
                                                            </label>

                                                        </div>


                                                        <div class="col-md-2 col-12">

                                                            <label class="field-label-sub">
                                                                Year
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionOneYear"
                                                            >

                                                        </div>


                                                        <div class="col-md-10 col-12">

                                                            <label class="field-label-sub">
                                                                Manufacturer
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="combinedServiceDescriptionOneManufacturer"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #2 FULL WIDTH -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #2
                                                            </label>

                                                        </div>


                                                        <div class="col-12">

                                                            <label class="field-label-sub">
                                                                Player Name
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.combined_service_description_two"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Description #3 -->
                                                    <div class="row description-row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Description #3
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                v-model="form_data.combined_service_description_three"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Serial -->
                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Serial Number (Only if printed directly on item)
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control serial-input"
                                                                v-model="form_data.combined_service_serial_number"
                                                            >

                                                        </div>

                                                    </div>


                                                    <!-- Authenticator -->
                                                    <div class="row autograph-row">

                                                        <div class="col-lg-3 col-md-3 col-12">

                                                            <div class="autographed-wrapper">

                                                                <label>
                                                                    Autographed
                                                                </label>

                                                                <input
                                                                    type="checkbox"
                                                                    class="custom-checkbox"
                                                                    v-model="form_data.combined_service_autographed"
                                                                >

                                                            </div>

                                                        </div>


                                                        <div class="col-lg-4 col-md-4 col-12">

                                                            <label class="field-label">
                                                                Authenticator Name
                                                            </label>

                                                            <select
                                                                class="form-control"
                                                                v-model="form_data.combined_service_authenticator_name"
                                                            >
                                                                <option
                                                                    v-for="(authenticator,index) in authenticators"
                                                                    :value="authenticator.id"
                                                                    :key="authenticator.id"
                                                                >
                                                                    {{authenticator.name}}
                                                                </option>
                                                            </select>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--item type newReholder-->
                        <div class="col-md-12" v-if="showNewReholder">
                            <div class="ksa-entry-ui">
                                <!-- Item Details -->
                                <div class="row">
                                    <div class="col-12">

                                        <div class="item-details-box reholder-box">

                                            <div class="row">

                                                <!-- Quantity -->
                                                <div class="col-lg-2 col-md-3 col-12">

                                                    <div class="quantity-box">

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-title">
                                                                    Quantity
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12">

                                                                <div class="quantity-number">
                                                                    1
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <!-- Certification Number -->
                                                <div class="col-lg-10 col-md-9 col-12 px-2">

                                                    <div class="row">

                                                        <div class="col-12">

                                                            <label class="field-label">
                                                                Certification Number
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder=""
                                                                v-model.trim="v$.form_data.reholder_certification_number.$model"
                                                            />
                                                            <div class="error" v-if="v$.form_data.reholder_certification_number.required.$invalid && show_error_fifteen">
                                                                Certification number is required
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </tab-content>
            </form-wizard>
<!--        </form>-->
    </div>
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import {required, email, requiredIf, numeric} from '@vuelidate/validators'
// import {isReadonly} from "vue";


export default {
    name: "CreateEntry",
    props: ["customers","promos","parties","authenticators"],
    components: {
        VuePhoneNumberInput,
    },
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            maxDate: "",
            show_error_one: false,
            show_error_two: false,
            show_error_three: false,
            show_error_four: false,
            show_error_five: false,
            show_error_six: false,
            show_error_seven: false,
            show_error_eight: false,
            show_error_nine: false,
            show_error_ten: false,
            show_error_eleven: false,
            show_error_twelve: false,
            show_error_thirteen: false,
            show_error_fourteen: false,
            show_error_fifteen: false,
            show_error_sixteen: false,
            show_error_seventeen:false,
            isReadonly:false,
            step_count:4,
            completed_step_count:'',
            form_wizard_subtitle:'Start here',
            countries:[
                {
                    "id": 1,
                    "name": "Canada"
                },
                {
                    "id": 2,
                    "name": "United States"
                },
                {
                    "id": 3,
                    "name": "Australia"
                },
                {
                    "id": 4,
                    "name": "New Zealand"
                },
                {
                    "id": 5,
                    "name": "United Kingdom"
                }
            ],
            countries_phone:['CA','US','AU','NZ','GB'],
            provinces:[
                {
                    "id": 1,
                    "name": "AB"
                },
                {
                    "id": 2,
                    "name": "BC"
                },
                {
                    "id": 3,
                    "name": "MB"
                },
                {
                    "id": 4,
                    "name": "NB"
                },
                {
                    "id": 5,
                    "name": "NL"
                },
                {
                    "id": 6,
                    "name": "NS"
                },
                {
                    "id": 7,
                    "name": "NT"
                },
                {
                    "id": 8,
                    "name": "NU"
                },
                {
                    "id": 9,
                    "name": "ON"
                },
                {
                    "id": 10,
                    "name": "PE"
                },
                {
                    "id": 11,
                    "name": "QC"
                },
                {
                    "id": 12,
                    "name": "SK"
                },
                {
                    "id": 13,
                    "name": "YT"
                },
                {
                    "id": 14,
                    "name": "AK"
                },
                {
                    "id": 15,
                    "name": "AL"
                },
                {
                    "id": 16,
                    "name": "AR"
                },
                {
                    "id": 17,
                    "name": "AZ"
                },
                {
                    "id": 18,
                    "name": "CA"
                },
                {
                    "id": 19,
                    "name": "CO"
                },
                {
                    "id": 20,
                    "name": "CT"
                },
                {
                    "id": 21,
                    "name": "DC"
                },
                {
                    "id": 22,
                    "name": "DE"
                },
                {
                    "id": 23,
                    "name": "FL"
                },
                {
                    "id": 24,
                    "name": "GA"
                },
                {
                    "id": 25,
                    "name": "HI"
                },
                {
                    "id": 26,
                    "name": "IA"
                },
                {
                    "id": 27,
                    "name": "ID"
                },
                {
                    "id": 28,
                    "name": "IL"
                },
                {
                    "id": 29,
                    "name": "IN"
                },
                {
                    "id": 30,
                    "name": "KS"
                },
                {
                    "id": 31,
                    "name": "KY"
                },
                {
                    "id": 32,
                    "name": "LA"
                },
                {
                    "id": 33,
                    "name": "MA"
                },
                {
                    "id": 34,
                    "name": "MD"
                },
                {
                    "id": 35,
                    "name": "ME"
                },
                {
                    "id": 36,
                    "name": "MI"
                },
                {
                    "id": 37,
                    "name": "MN"
                },
                {
                    "id": 38,
                    "name": "MO"
                },
                {
                    "id": 39,
                    "name": "MS"
                },
                {
                    "id": 40,
                    "name": "MT"
                },
                {
                    "id": 41,
                    "name": "NC"
                },
                {
                    "id": 42,
                    "name": "ND"
                },
                {
                    "id": 43,
                    "name": "NE"
                },
                {
                    "id": 44,
                    "name": "NH"
                },
                {
                    "id": 45,
                    "name": "NJ"
                },
                {
                    "id": 46,
                    "name": "NM"
                },
                {
                    "id": 47,
                    "name": "NV"
                },
                {
                    "id": 48,
                    "name": "NY"
                },
                {
                    "id": 49,
                    "name": "OH"
                },
                {
                    "id": 50,
                    "name": "OK"
                },
                {
                    "id": 51,
                    "name": "OR"
                },
                {
                    "id": 52,
                    "name": "PA"
                },
                {
                    "id": 53,
                    "name": "RI"
                },
                {
                    "id": 54,
                    "name": "SC"
                },
                {
                    "id": 55,
                    "name": "SD"
                },
                {
                    "id": 56,
                    "name": "TN"
                },
                {
                    "id": 57,
                    "name": "TX"
                },
                {
                    "id": 58,
                    "name": "UT"
                },
                {
                    "id": 59,
                    "name": "VA"
                },
                {
                    "id": 60,
                    "name": "VT"
                },
                {
                    "id": 61,
                    "name": "WA"
                },
                {
                    "id": 62,
                    "name": "WI"
                },
                {
                    "id": 63,
                    "name": "WV"
                },
                {
                    "id": 64,
                    "name": "WY"
                },
                {
                    "id": 65,
                    "name": "ACT"
                },
                {
                    "id": 66,
                    "name": "NSW"
                },
                {
                    "id": 67,
                    "name": "NT"
                },
                {
                    "id": 68,
                    "name": "SA"
                },
                {
                    "id": 69,
                    "name": "TAS"
                },
                {
                    "id": 70,
                    "name": "VIC"
                },
                {
                    "id": 71,
                    "name": "WA"
                }
            ],
            isAllSelected: false,
            // customers: [
            //     {
            //         "id":1,
            //         "name":"Customer 1"
            //     },
            //     {
            //         "id":2,
            //         "name":"Customer 2"
            //     },
            //     {
            //         "id":3,
            //         "name":"Customer 3"
            //     },
            //     {
            //         "id":4,
            //         "name":"Customer 4"
            //     },
            //     {
            //         "id":5,
            //         "name":"Customer 5"
            //     },
            // ],
            // promoCodes: [
            //     {
            //         'id':1,
            //         'name':'promo - 1',
            //     },
            //     {
            //         'id':2,
            //         'name':'promo - 2',
            //     },
            //     {
            //         'id':3,
            //         'name':'promo - 3',
            //     },
            //     {
            //         'id':4,
            //         'name':'promo - 1',
            //     },
            //     {
            //         'id':5,
            //         'name':'promo - 1',
            //     },
            // ],
            shippingMethods: [
                {
                    'id':1,
                    'name':'Delivery',
                },
                {
                    'id':2,
                    'name':'Pickup',
                },
                {
                    'id':3,
                    'name':'Show Pickup',
                },
                {
                    'id':4,
                    'name':'Return to Third Party',
                },
                {
                    'id':5,
                    'name':'Canada Post',
                },
                {
                    'id':6,
                    'name':'DHL',
                },
                {
                    'id':7,
                    'name':'FedEx',
                },
                {
                    'id':8,
                    'name':'Purolator',
                },
                {
                    'id':9,
                    'name':'UPS',
                },
            ],
            pickUpLocations: [
                {
                    'id':1,
                    'name':'KSA',
                },
                {
                    'id':2,
                    'name':'KSA Booth',
                },
                {
                    'id':3,
                    'name':'KSA West',
                },
                {
                    'id':4,
                    'name':'iCert',
                },
                {
                    'id':5,
                    'name':'iCert Booth',
                },
            ],
            // thirdParties: [
            //     {
            //         'id':1,
            //         'name':'Third party - 1',
            //     },
            //     {
            //         'id':2,
            //         'name':'Third party - 2',
            //     },
            //     {
            //         'id':3,
            //         'name':'Third party - 3',
            //     },
            //     {
            //         'id':4,
            //         'name':'Third party - 4',
            //     },
            // ],
            gradingLocations: [
                {
                    'id':1,
                    'name':'KSA',
                },
                {
                    'id':2,
                    'name':'KSA Show',
                },
                {
                    'id':3,
                    'name':'KSA West',
                },
                {
                    'id':4,
                    'name':'iCert',
                },
                {
                    'id':5,
                    'name':'iCert Show',
                },
            ],
            showPickupLocationBox:false,
            showShowPickupLocationBox:false,
            showThirdPartyBox:false,
            showUPSBox:false,

            showItemTypeCardBox:false,
            showItemTypeAutoAthenticationBox:false,
            showItemTypeCombinedServiceBox:false,
            showItemTypeReholderBox:false,
            showItemTypeCrossoverBox:false,


            showCardNew:false,
            showCardNoNumber:false,
            showCardAuto:false,
            showCardAutoNoNumber:false,
            showIndexCard:false,
            showNewCombinedService:false,
            showNewCombinedServiceNoNumber:false,
            showNewReholder:false,

            itemTypes:[
                {
                    'id':1,
                    'name':'Card',
                },
                {
                    'id':2,
                    'name':'Card (No number)',
                },
                {
                    'id':3,
                    'name':'Card Auto',
                },
                {
                    'id':4,
                    'name':'Card Auto (No Number)',
                },
                {
                    'id':5,
                    'name':'Index Card',
                },
                // {
                //     'id':6,
                //     'name':'Autograph Authentication',
                // },
                {
                    'id':7,
                    'name':'Combined Service',
                },
                {
                    'id':8,
                    'name':'Combined Service (No Number)',
                },
                {
                    'id':9,
                    'name':'Reholder',
                },
                // {
                //     'id':10,
                //     'name':'Crossover',
                // },

            ],
            crossoverItemTypes:[
                {
                    'id':1,
                    'name':'Card'
                }
            ],
            // authenticators:[
            //     {
            //         'id':1,
            //         'name':'Auth 1'
            //     },
            //     {
            //         'id':2,
            //         'name':'Auth 2'
            //     },
            //     {
            //         'id':3,
            //         'name':'Auth 3'
            //     },
            //     {
            //         'id':4,
            //         'name':'Auth 4'
            //     },
            //     {
            //         'id':5,
            //         'name':'Auth 5'
            //     },
            // ],
            minimumGrades:[
                {
                    'id':1,
                    'name':'0'
                },
                {
                    'id':2,
                    'name':'1'
                },
                {
                    'id':3,
                    'name':'1.5'
                },
                {
                    'id':4,
                    'name':'2'
                },
                {
                    'id':5,
                    'name':'2.5'
                },
                {
                    'id':6,
                    'name':'3'
                },
                {
                    'id':7,
                    'name':'3.5'
                },
                {
                    'id':8,
                    'name':'4'
                },
                {
                    'id':9,
                    'name':'4.5'
                },
                {
                    'id':10,
                    'name':'5'
                },
                {
                    'id':11,
                    'name':'5.5'
                },
                {
                    'id':12,
                    'name':'6'
                },
                {
                    'id':13,
                    'name':'6.5'
                },
                {
                    'id':14,
                    'name':'7'
                },
                {
                    'id':15,
                    'name':'7.5'
                },
                {
                    'id':16,
                    'name':'8'
                },
                {
                    'id':17,
                    'name':'8.5'
                },
                {
                    'id':18,
                    'name':'9'
                },
                {
                    'id':19,
                    'name':'9.5'
                },
                {
                    'id':20,
                    'name':'10'
                },
                {
                    'id':21,
                    'name':'10 (P)'
                },
            ],
            form_data:{
                customer: '',
                name: '',
                customerId: '',
                // email:'',
                contact_name:'',
                item_qty:1,
                billing_address_line_one:'',
                billing_address_line_two:'',
                billing_country:'',
                billing_province:'',
                billing_city:'',
                billing_postal:'',
                billing_phone:'',
                same_as_billing:false,
                autographed:false,
                shipping_name:'',
                shipping_company_name:'',
                shipping_address_line_one:'',
                shipping_address_line_two:'',
                shipping_country:'',
                shipping_province:'',
                shipping_city:'',
                shipping_postal:'',
                shipping_phone:'',
                status:'active',
                submission_date:this.getTodayDate(),
                products:[],
                itemType:'',

                //next
                grading_location:'1',
                promo_code:'',
                // payment_made:'',
                // pay_on_pickup:'',
                // cod:'',
                payment_method:'',
                shopify_order_number:'',
                shipping_method:'',
                pickup_location:'',
                show_pickup_location:'',
                third_party_drop_center:'',
                use_customer_account:'',
                customer_account_number:'',
                crossover_item_type:'',
                authenticator_name:'',
                authenticator_name_two:'',
                authenticator_name_three:'',
                authenticator_name_four:'',
                crossover_minimum_grade:'',

                //item type card
                card_description_one:'',
                card_description_two:'',
                card_description_three:'',
                card_serial_number:'',
                card_autographed:'',
                card_certified_on_card:'',
                card_authenticator_name:'',
                card_authenticator_cert_no:'',
                card_estimated_value:'0',

                //item type auto authentication
                auto_authentication_description_one:'',
                auto_authentication_description_two:'',
                auto_authentication_description_three:'',
                auto_authentication_serial_number:'',
                auto_authentication_autographed:true,
                auto_authentication_authenticator_name:'',
                auto_authentication_authenticator_cert_no:'',
                auto_authentication_estimated_value:'0',

                //item type combined service
                combined_service_description_one:'',
                combined_service_description_two:'',
                combined_service_description_three:'',
                combined_service_serial_number:'',
                combined_service_autographed:true,
                combined_service_authenticator_name:'',
                combined_service_authenticator_cert_no:'',
                combined_service_estimated_value:'0',

                //item type combined service
                reholder_certification_number:'',
                reholder_estimated_value:'0',

                //item type crossover
                crossover_description_one:'',
                crossover_description_two:'',
                crossover_description_three:'',
                crossover_serial_number:'',
                crossover_autographed:'',
                crossover_authenticator_name:'',
                crossover_authenticator_cert_no:'',
                crossover_estimated_value:'0',
            },

        }
    },
    methods:{
        async submit(){
            if (this.checkSeventhStep()){
                console.log('submitted working')
                Swal.fire({
                    // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                    title: `Do you want to save this order: <br> ${this.form_data.name}`,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                    icon: "question",
                }).then((result) => {
                    console.log(result)
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // Swal.fire("Saved!", "", "success");
                        // window.location.href = `/admin/entries/10`;
                        // Submit form

                        axios
                            .post("/admin/entries", this.form_data)
                            .then(function (response) {
                                console.log(response)
                                Swal.fire("Saved!", "", "success").then((result)=>{
                                    if (result.isConfirmed){
                                        if (response.status == 200){
                                            window.location.href = `/admin/entries/${response.data.data.id}`;
                                        }
                                    }
                                });

                                // window.location.reload()
                                // window.location.href = "/admin/thirds";
                            })
                            .catch(function (err) {
                                try {
                                    self.showValidationError(err);
                                } catch (e) {
                                    self.showSomethingWrong();
                                }
                            });
                        // Swal.fire("Saved!", "", "success");
                    }else if (result.isDismissed){
                        window.location.href = "/admin/entries";
                    }else if (result.isDenied) {
                        console.log(result.isDenied)
                        // Swal.fire("Changes are not saved", "", "info");
                    }
                });

            }else {
                return;
            }
        },
        async checkFirstStep(){
            this.v$.$touch()
            if (this.v$.form_data.name.$invalid) {
                this.show_error_one = true;
                return false;
            }
            this.completed_step_count = 1;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;

        },
        checkSecondStep(){
            this.v$.$touch()
            if (this.v$.form_data.grading_location.$invalid) {
                this.show_error_two = true;
                return false;
            }
            this.completed_step_count = 2;
            this.form_wizard_subtitle = 'Please Continue to next'
            return true;
        },
        checkThirdStep(){
            this.v$.$touch()
            if (this.v$.form_data.billing_address_line_one.$invalid ||
                this.v$.form_data.billing_country.$invalid ||
                this.v$.form_data.billing_province.$invalid ||
                this.v$.form_data.billing_city.$invalid ||
                this.v$.form_data.billing_postal.$invalid
                // this.v$.form_data.billing_phone.$invalid
            ) {
                this.show_error_three = true;
                return false;
            }
            this.completed_step_count = 3;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        checkFourthStep(){
            this.v$.$touch()
            if (this.v$.form_data.shipping_address_line_one.$invalid ||
                this.v$.form_data.shipping_country.$invalid ||
                this.v$.form_data.shipping_province.$invalid ||
                this.v$.form_data.shipping_city.$invalid ||
                this.v$.form_data.shipping_postal.$invalid
                // this.v$.form_data.shipping_phone.$invalid
            ) {
                this.show_error_four = true;
                return false;
            }
            this.completed_step_count = 4;
            this.form_wizard_subtitle = 'Almost Done'
            return true;
        },
        checkFifthStep(){
            this.v$.$touch()
            if (this.v$.form_data.submission_date.$invalid) {
                this.show_error_five = true;
                return false;
            }else {
                return true;
            }
        },
        checkSixthStep(){
            this.v$.$touch()
            if (this.v$.form_data.shipping_method.$invalid) {
                this.show_error_six = true;
                return false;
            }else if (this.v$.form_data.pickup_location.$invalid) {
                this.show_error_seven = true;
                return false;
            }else if (this.v$.form_data.show_pickup_location.$invalid) {
                this.show_error_eight = true;
                return false;
            }else if (this.v$.form_data.third_party_drop_center.$invalid) {
                this.show_error_nine = true;
                return false;
            }
            // else if (this.v$.form_data.customer_account_number.$invalid) {
            //     this.show_error_ten = true;
            //     return false;
            // }
            else {
                return true;
            }
        },
        checkSeventhStep(){
            this.v$.$touch()
            if (this.v$.form_data.itemType.$invalid) {
                this.show_error_eleven = true;
                return false;
            }else if (this.v$.form_data.card_description_one.$invalid) {
                this.show_error_twelve = true;
                return false;
            }
            // else if (this.v$.form_data.card_authenticator_name.$invalid) {
            //     this.show_error_twelve = true;
            //     return false;
            // }
            // else if (this.v$.form_data.card_authenticator_cert_no.$invalid) {
            //     this.show_error_twelve = true;
            //     return false;
            // }
            else if (this.v$.form_data.card_estimated_value.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_one.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_authenticator_name.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_authenticator_cert_no.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_estimated_value.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_description_one.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_authenticator_name.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_authenticator_cert_no.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_estimated_value.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.reholder_certification_number.$invalid) {
                this.show_error_fifteen = true;
                return false;
            }else if (this.v$.form_data.reholder_estimated_value.$invalid) {
                this.show_error_fifteen = true;
                return false;
            }else if (this.v$.form_data.crossover_description_one.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_authenticator_name.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_authenticator_cert_no.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_estimated_value.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_minimum_grade.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_item_type.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }
            // else if (this.v$.form_data.card_certified_on_card.$invalid || this.v$.form_data.card_authenticator_cert_no.$invalid) {
            //     this.show_error_seventeen = true;
            //     return false;
            // }
            else {
                return true;
            }
        },
        sameAsBillingChanged(event){
            if (this.form_data.same_as_billing){
                this.form_data.shipping_address_line_one = this.form_data.billing_address_line_one;
                this.form_data.shipping_address_line_two = this.form_data.billing_address_line_two;
                this.form_data.shipping_country = this.form_data.billing_country;
                this.form_data.shipping_province = this.form_data.billing_province;
                this.form_data.shipping_city = this.form_data.billing_city;
                this.form_data.shipping_postal = this.form_data.billing_postal;
                this.form_data.shipping_phone = this.form_data.billing_phone;
            }else {
                this.form_data.shipping_address_line_one = '';
                this.form_data.shipping_address_line_two = '';
                this.form_data.shipping_country = '';
                this.form_data.shipping_province = '';
                this.form_data.shipping_city = ''
                this.form_data.shipping_postal = '';
                this.form_data.shipping_phone = '';
            }
        },
        handleTabChange(prevIndex, nextIndex){
            console.log('tab change called')
            console.log(prevIndex)
            console.log(nextIndex)
            let focusField = this.$refs.name;
            focusField.focus();
            switch (nextIndex) {
                case 0:
                    focusField.focus()
                    console.log('index 0')
                    console.log(focusField.value)
                    break;
                case 1:
                    focusField = this.$refs.billing_address_line_one;
                    focusField.focus();
                    console.log(focusField.value)
                    console.log('index 1')
                    break;
                case 2:
                    focusField = this.$refs.shipping_name;
                    focusField.focus();
                    console.log(focusField.value)
                    console.log('index 2')
                    break;
            }
        },
        cancel(){
            window.location.assign("/admin/entries");
        },
        selectAllCats () {
            if (this.isAllSelected) {
                this.form_data.products = []
                this.isAllSelected = false
            } else {
                this.form_data.products = []
                for (let product in this.products) {
                    this.form_data.products.push(this.products[product].id)
                }
                this.isAllSelected = true
            }
        },
        select () {
            if (this.form_data.products.length !== this.products.length) {
                this.isAllSelected = false
            } else {
                this.isAllSelected = true
            }
        },
        async customerNameChangeEvent(){
            let self = this;
            console.log(this.form_data.customer)
            this.form_data.name = this.form_data.customer.name
            this.form_data.customerId = this.form_data.customer.id

            console.log(this.form_data.customerId)
            await axios
                .get(`/admin/entries/get-customer/info/${self.form_data.customerId}`)
                .then(function (res) {
                    // console.log(res)
                    self.form_data.billing_address_line_one = res.data.data.billing_address_line_one
                    self.form_data.billing_address_line_two = res.data.data.billing_address_line_two
                    self.form_data.billing_country = res.data.data.billing_country
                    self.form_data.billing_province = res.data.data.billing_province
                    self.form_data.billing_city = res.data.data.billing_city
                    self.form_data.billing_postal = res.data.data.billing_postal
                    self.form_data.billing_phone = res.data.data.billing_phone
                    // self.form_data.same_as_billing = res.data.data.same_as_billing == 0 ? false: true
                    self.form_data.shipping_name = res.data.data.shipping_name
                    self.form_data.shipping_company_name = res.data.data.shipping_company_name
                    self.form_data.shipping_address_line_one = res.data.data.shipping_address_line_one
                    self.form_data.shipping_address_line_two = res.data.data.shipping_address_line_two
                    self.form_data.shipping_country = res.data.data.shipping_country
                    self.form_data.shipping_province = res.data.data.shipping_province
                    self.form_data.shipping_city = res.data.data.shipping_city
                    self.form_data.shipping_postal = res.data.data.shipping_postal
                    self.form_data.shipping_phone = res.data.data.shipping_phone
                })
                .catch(function (err) {
                    try {
                        self.showValidationError(err);
                    } catch (e) {
                        self.showSomethingWrong();
                    }
                });

        },
        customerNameSelectEvent({id, text}){
            console.log({id, text})
        },
        itemTypeChangeEvent(){
            if (this.form_data.itemType == 'Card'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=true;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Card (No number)'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=true;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Card Auto'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=true;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Card Auto (No Number)'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=true;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Index Card'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=true;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Autograph Authentication'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Combined Service'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=true;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Combined Service (No Number)'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=true;
                this.showNewReholder=false;
            }
            if (this.form_data.itemType == 'Reholder'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=true;
            }
            if (this.form_data.itemType == 'Crossover'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
                this.showCardNew=false;
                this.showCardNoNumber=false;
                this.showCardAuto=false;
                this.showCardAutoNoNumber=false;
                this.showIndexCard=false;
                this.showNewCombinedService=false;
                this.showNewCombinedServiceNoNumber=false;
                this.showNewReholder=false;
            }
        },
        shippingMethodsChangeEvent(){
            if (this.form_data.shipping_method == 'Pickup'){
                this.showPickupLocationBox=true;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Show Pickup'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=true;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Return to Third Party'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=true;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'UPS'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'Delivery'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.showUPSBox=false;
            }
            if (this.form_data.shipping_method == 'Canada Post'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'DHL'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'FedEx'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
            if (this.form_data.shipping_method == 'Purolator'){
                this.showPickupLocationBox=false;
                this.showShowPickupLocationBox=false;
                this.showThirdPartyBox=false;
                this.form_data.customer_account_number = '';
                this.showUPSBox=true;
            }
        },
        dummyStep(){
            return true;
        },
        getTodayDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    },
    mounted() {
        // Set maxDate to today's date when the component is mounted
        this.maxDate = new Date().toISOString().split("T")[0];

        //set default item type
        this.form_data.itemType = 'Card';
        if (this.form_data.itemType == 'Card'){
            this.showItemTypeCardBox=false;
            this.showItemTypeAutoAthenticationBox=false;
            this.showItemTypeCombinedServiceBox=false;
            this.showItemTypeReholderBox=false;
            this.showItemTypeCrossoverBox=false;
            this.showCardNew=true;
        }

        //set default shipping method
        this.form_data.shipping_method = 'Pickup';
        if (this.form_data.shipping_method == 'Pickup'){
            this.showPickupLocationBox=true;
            this.showShowPickupLocationBox=false;
            this.showThirdPartyBox=false;
            this.showUPSBox=false;
        }
        this.form_data.pickup_location = 'KSA';
    },

    computed: {
        cardDescriptionOneYear: {
            get() {
                const value = this.form_data.card_description_one || '';
                return value.split(' - ')[0] || '';
            },
            set(value) {
                const current = this.form_data.card_description_one || '';
                const parts = current.split(' - ');
                const manufacturer = parts.slice(1).join(' - ');

                this.form_data.card_description_one = manufacturer
                    ? `${value} - ${manufacturer}`
                    : value;
            }
        },

        cardDescriptionOneManufacturer: {
            get() {
                const value = this.form_data.card_description_one || '';
                const parts = value.split(' - ');

                return parts.length > 1
                    ? parts.slice(1).join(' - ')
                    : '';
            },
            set(value) {
                const current = this.form_data.card_description_one || '';
                const year = current.split(' - ')[0] || '';

                this.form_data.card_description_one = year
                    ? `${year} - ${value}`
                    : value;
            }
        },

        cardDescriptionTwoNumber: {
            get() {
                const value = this.form_data.card_description_two || '';
                return value.split(' - ')[0] || '';
            },
            set(value) {
                const current = this.form_data.card_description_two || '';
                const parts = current.split(' - ');
                const playerName = parts.slice(1).join(' - ');

                this.form_data.card_description_two = playerName
                    ? `${value} - ${playerName}`
                    : value;
            }
        },

        cardDescriptionTwoPlayerName: {
            get() {
                const value = this.form_data.card_description_two || '';
                const parts = value.split(' - ');

                return parts.length > 1
                    ? parts.slice(1).join(' - ')
                    : '';
            },
            set(value) {
                const current = this.form_data.card_description_two || '';
                const number = current.split(' - ')[0] || '';

                this.form_data.card_description_two = number
                    ? `${number} - ${value}`
                    : value;
            }
        },
        combinedServiceDescriptionOneYear: {
            get() {
                const value = this.form_data.combined_service_description_one || '';
                return value.split(' - ')[0] || '';
            },
            set(value) {
                const current = this.form_data.combined_service_description_one || '';
                const parts = current.split(' - ');
                const manufacturer = parts.slice(1).join(' - ');

                this.form_data.combined_service_description_one = manufacturer
                    ? `${value} - ${manufacturer}`
                    : value;
            }
        },

        combinedServiceDescriptionOneManufacturer: {
            get() {
                const value = this.form_data.combined_service_description_one || '';
                const parts = value.split(' - ');

                return parts.length > 1
                    ? parts.slice(1).join(' - ')
                    : '';
            },
            set(value) {
                const current = this.form_data.combined_service_description_one || '';
                const year = current.split(' - ')[0] || '';

                this.form_data.combined_service_description_one = year
                    ? `${year} - ${value}`
                    : value;
            }
        },

        combinedServiceDescriptionTwoPlayerName: {
            get() {
                const value = this.form_data.combined_service_description_two || '';
                return value;
            },
            set(value) {
                this.form_data.combined_service_description_two = value;
            }
        },
        combinedServiceDescriptionTwoNumber: {
            get() {
                const value = this.form_data.combined_service_description_two || '';
                return value.split(' - ')[0] || '';
            },
            set(value) {
                const current = this.form_data.combined_service_description_two || '';
                const parts = current.split(' - ');
                const playerName = parts.slice(1).join(' - ');

                this.form_data.combined_service_description_two = playerName
                    ? `${value} - ${playerName}`
                    : value;
            }
        },
    },

    validations: {
        form_data: {
            name: {
                required,
            },
            grading_location: {
                required,
            },
            contact_name: {
                required,
            },
            email: {
                required,
                email
            },
            billing_address_line_one:{
                required,
            },
            // billing_address_line_two:{},
            billing_country:{
                required,
            },
            billing_province:{
                required,
            },
            billing_city:{
                required,
            },
            billing_postal:{
                required,
            },
            // billing_phone:{
            //     required,
            // },
            // same_as_billing:{},
            // shipping_name:{},
            shipping_company_name:{
                required,
            },
            shipping_address_line_one:{
                required,
            },
            // shipping_address_line_two:{},
            shipping_country:{
                required,
            },
            shipping_province:{
                required,
            },
            shipping_city:{
                required,
            },
            shipping_postal:{
                required,
            },
            // shipping_phone:{
            //     required,
            // },
            status:{
                required,
            },
            products:{
                required,
            },
            submission_date:{
                required,
            },
            shipping_method:{
                required,
            },
            pickup_location:{
                required: requiredIf(function () {
                    return this.showPickupLocationBox // return true if this field is required
                })
            },
            show_pickup_location:{
                required: requiredIf(function () {
                    return this.showShowPickupLocationBox // return true if this field is required
                })
            },
            third_party_drop_center:{
                required: requiredIf(function () {
                    return this.showThirdPartyBox // return true if this field is required
                })
            },
            // customer_account_number:{
            //     required: requiredIf(function () {
            //         return this.showUPSBox // return true if this field is required
            //     }),
            // },
            itemType:{
                required,
            },
            //item type card
            card_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            // card_description_two:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCardBox // return true if this field is required
            //     }),
            // },
            // card_description_three:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCardBox // return true if this field is required
            //     }),
            // },
            card_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.card_autographed;// return true if this field is required
                }),
            },
            // card_authenticator_cert_no:{
            //     required: requiredIf(function () {
            //         return this.form_data.card_autographed; // return true if this field is required
            //     }),
            // },
            card_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            // card_certified_on_card: {
            //     required: requiredIf(function () {
            //         // if type is card, at least one of the two fields must be filled
            //         return (
            //             this.showItemTypeCardBox &&
            //             !this.form_data.card_authenticator_cert_no // only require this if the other is empty
            //         )
            //     }),
            // },
            // card_certified_on_card:{
            //     required: requiredIf(function () {
            //         return this.form_data.card_autographed; // return true if this field is required
            //     }),
            // },
            // card_authenticator_cert_no: {
            //     required: requiredIf(function () {
            //         return (
            //             this.showItemTypeCardBox &&
            //             !this.form_data.card_certified_on_card // only require this if the other is empty
            //         )
            //     }),
            // },
            //item type auto athentication
            auto_authentication_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            // auto_authentication_description_two:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
            //     }),
            // },
            // auto_authentication_description_three:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeAutoAthenticationBox // return true if this field is required
            //     }),
            // },
            auto_authentication_authenticator_name:{
                required: requiredIf(function () {
                    return(
                        this.showItemTypeAutoAthenticationBox &&
                        this.form_data.auto_authentication_autographed
                    )  // return true if this field is required
                }),
            },
            auto_authentication_authenticator_cert_no:{
                required: requiredIf(function () {
                    return (
                        this.showItemTypeAutoAthenticationBox &&
                        this.form_data.auto_authentication_autographed
                    )// return true if this field is required
                }),
            },
            auto_authentication_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            //item type combined service
            combined_service_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            // combined_service_description_two:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCombinedServiceBox // return true if this field is required
            //     }),
            // },
            // combined_service_description_three:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCombinedServiceBox // return true if this field is required
            //     }),
            // },
            combined_service_authenticator_name:{
                required: requiredIf(function () {
                    return (
                        this.showItemTypeCombinedServiceBox &&
                        this.form_data.combined_service_autographed
                    )  // return true if this field is required
                }),
            },
            combined_service_authenticator_cert_no:{
                required: requiredIf(function () {
                    return (
                        this.showItemTypeCombinedServiceBox &&
                        this.form_data.combined_service_autographed
                    ) // return true if this field is required
                }),
            },
            combined_service_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            //item type reholder
            reholder_certification_number:{
                required: requiredIf(function () {
                    return this.showItemTypeReholderBox // return true if this field is required
                }),
            },
            reholder_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeReholderBox // return true if this field is required
                }),
            },

            //item type crossover
            crossover_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            // crossover_description_two:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCrossoverBox // return true if this field is required
            //     }),
            // },
            // crossover_description_three:{
            //     required: requiredIf(function () {
            //         return this.showItemTypeCrossoverBox // return true if this field is required
            //     }),
            // },
            crossover_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.crossover_autographed; // return true if this field is required
                }),
            },
            crossover_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.crossover_autographed; // return true if this field is required
                }),
            },
            crossover_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_minimum_grade:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_item_type:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
        }
    }

}
</script>

<style scoped>

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


/* ============================================================
   KSA ENTRY / GRADING - CUSTOM CSS
   Bootstrap 5
   ============================================================ */

.ksa-entry-ui {
    font-family: Arial, Helvetica, sans-serif;
    color: #40536a;
    background: #ffffff;
}

.ksa-entry-ui *,
.ksa-entry-ui *::before,
.ksa-entry-ui *::after {
    box-sizing: border-box;
}


/* ============================================================
   ITEM TYPE TOP BOX
   ============================================================ */

.ksa-entry-ui .item-type-box {
    background: #eeeeee;
    border-radius: 3px;
    padding: 20px 22px 28px;
    margin-bottom: 24px;
}

.ksa-entry-ui .item-type-label {
    display: block;
    font-size: 14px;
    line-height: 1.2;
    font-weight: 600;
    color: #40536a;
    margin-bottom: 9px;
}

.ksa-entry-ui .required {
    color: #e53935;
}

.ksa-entry-ui .item-type-select {
    width: 48%;
    max-width: 590px;
    height: 38px;

    border: 1px solid #aeb7c3;
    border-radius: 4px;

    background-color: #ffffff;
    color: #4b5563;

    font-size: 15px;
    font-weight: 600;

    padding: 5px 14px;

    box-shadow: 0 0 0 1px rgba(93, 105, 255, 0.05);
}

.ksa-entry-ui .item-type-select:focus {
    border-color: #8e9cff;
    box-shadow: 0 0 0 2px rgba(93, 105, 255, 0.14);
}


/* ============================================================
   ITEM DETAILS BOX
   ============================================================ */

.ksa-entry-ui .item-details-box {
    background: #eeeeee;
    border-radius: 3px;
    padding: 15px 12px 28px;
    min-height: 560px;
}

.ksa-entry-ui .quantity-column {
    padding-left: 0;
    padding-right: 10px;
}

.ksa-entry-ui .fields-column {
    padding-left: 10px;
    padding-right: 0;
}


/* ============================================================
   QUANTITY
   ============================================================ */

.ksa-entry-ui .quantity-box {
    background: #f8f8f8;
    min-height: 89px;
    text-align: center;
    padding-top: 8px;
}

.ksa-entry-ui .quantity-title {
    font-size: 16px;
    font-weight: 600;
    color: #40536a;
    margin-bottom: 27px;
}

.ksa-entry-ui .quantity-number {
    font-size: 20px;
    line-height: 1;
    color: #40536a;
}


/* ============================================================
   FORM FIELDS
   ============================================================ */

.ksa-entry-ui .field-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #40536a;
    margin-bottom: 4px;
    line-height: 1.1;
}

.ksa-entry-ui .field-label-sub {
    display: block;
    font-size: 15px;
    font-weight: 500;
    color: #40536a;
    margin-bottom: 4px;
    line-height: 1.1;
}

.ksa-entry-ui .form-control {
    height: 36px;

    border: 1px solid #d0d5db;
    border-radius: 4px;

    background: #ffffff;
    color: #40536a;

    font-size: 14px;

    box-shadow: none;
}

.ksa-entry-ui .form-control:focus {
    border-color: #8d9cf7;
    box-shadow: 0 0 0 1px rgba(91, 105, 255, 0.18);
}

.ksa-entry-ui .description-row {
    margin-bottom: 17px;
}

.ksa-entry-ui .serial-input {
    max-width: 480px;
}


/* ============================================================
   AUTOGRAPH / AUTHENTICATOR
   ============================================================ */

.ksa-entry-ui .autograph-row {
    margin-top: 8px;
    align-items: end;
}

.ksa-entry-ui .autographed-wrapper {
    display: flex;
    align-items: center;
    padding-top: 19px;
    min-height: 55px;
}

.ksa-entry-ui .autographed-wrapper label {
    margin: 0 15px 0 0;
    font-size: 14px;
    font-weight: 500;
    color: #40536a;
}

.ksa-entry-ui .custom-checkbox {
    width: 15px;
    height: 15px;
    margin: 0;
}

.ksa-entry-ui .certified-wrapper {
    display: flex;
    align-items: center;
    padding-top: 19px;
    min-height: 55px;
}

.ksa-entry-ui .certified-wrapper label {
    margin: 0 12px 0 0;
    font-size: 14px;
    font-weight: 500;
    color: #40536a;
}


/* ============================================================
   REHOLDER
   ============================================================ */

.ksa-entry-ui .reholder-box {
    min-height: 530px;
}

.ksa-entry-ui .reholder-cert-input {
    max-width: 560px;
}


/* ============================================================
   INDEX CARD
   ============================================================ */

.ksa-entry-ui .index-card-box {
    min-height: 545px;
}


/* ============================================================
   COMBINED SERVICE
   ============================================================ */

.ksa-entry-ui .combined-service-box {
    min-height: 560px;
}


/* ============================================================
   ORDER GRADING
   ============================================================ */

.ksa-grading-ui {
    font-family: Arial, Helvetica, sans-serif;
    color: #40536a;
    background: #ffffff;
    padding: 8px 14px 25px;
}

.ksa-grading-ui .grading-title {
    font-size: 13px;
    font-weight: 500;
    margin: 0 0 30px 8px;
    color: #40536a;
}


/* ============================================================
   GRADING PROGRESS
   ============================================================ */

.ksa-grading-ui .grading-progress {
    position: relative;
    height: 70px;
    margin: 0 7px 4px;
}

.ksa-grading-ui .grading-progress-line {
    position: absolute;
    left: 0;
    right: 0;
    top: 27px;
    height: 3px;
    background: #337ab7;
}

.ksa-grading-ui .grading-progress-step {
    position: absolute;
    right: 63%;
    top: 6px;

    transform: translateX(50%);

    text-align: center;
    z-index: 2;
}

.ksa-grading-ui .grading-progress-circle {
    width: 42px;
    height: 42px;

    border-radius: 50%;
    border: 3px solid #337ab7;

    background: #337ab7;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 4px;

    color: #ffffff;
    font-size: 16px;
}

.ksa-grading-ui .grading-progress-label {
    font-size: 13px;
    color: #40536a;
    white-space: nowrap;
}


/* ============================================================
   GRADING TABLE
   ============================================================ */

.ksa-grading-ui .grading-table-container {
    background: #eeeeee;
    padding: 14px 15px 17px;
    border-radius: 2px;

    overflow-x: auto;
}

.ksa-grading-ui .grading-table {
    width: 100%;
    min-width: 1100px;

    border-collapse: collapse;
    table-layout: fixed;

    margin: 0;
    background: #ffffff;
}

.ksa-grading-ui .grading-table thead th {
    background: #5d8fe6;
    color: #ffffff;

    font-size: 12px;
    font-weight: 600;

    text-align: center;
    vertical-align: middle;

    height: 30px;

    padding: 4px 5px;

    border-right: 1px solid #ffffff;
    border-bottom: 1px solid #ffffff;

    white-space: nowrap;
}

.ksa-grading-ui .grading-table tbody td {
    background: #ffffff;
    color: #40536a;

    font-size: 12px;

    text-align: center;
    vertical-align: middle;

    height: 34px;

    padding: 3px 5px;

    border-right: 1px solid #eeeeee;
}


/* Column widths */

.ksa-grading-ui .grading-table th:nth-child(1),
.ksa-grading-ui .grading-table td:nth-child(1) {
    width: 9%;
}

.ksa-grading-ui .grading-table th:nth-child(2),
.ksa-grading-ui .grading-table td:nth-child(2) {
    width: 8%;
}

.ksa-grading-ui .grading-table th:nth-child(3),
.ksa-grading-ui .grading-table td:nth-child(3) {
    width: 10%;
}

.ksa-grading-ui .grading-table th:nth-child(4),
.ksa-grading-ui .grading-table td:nth-child(4) {
    width: 10%;
}

.ksa-grading-ui .grading-table th:nth-child(5),
.ksa-grading-ui .grading-table td:nth-child(5) {
    width: 9%;
}

.ksa-grading-ui .grading-table th:nth-child(6),
.ksa-grading-ui .grading-table td:nth-child(6) {
    width: 10%;
}

.ksa-grading-ui .grading-table th:nth-child(7),
.ksa-grading-ui .grading-table td:nth-child(7) {
    width: 12%;
}

.ksa-grading-ui .grading-table th:nth-child(8),
.ksa-grading-ui .grading-table td:nth-child(8) {
    width: 8%;
}

.ksa-grading-ui .grading-table th:nth-child(9),
.ksa-grading-ui .grading-table td:nth-child(9) {
    width: 8%;
}

.ksa-grading-ui .grading-table th:nth-child(10),
.ksa-grading-ui .grading-table td:nth-child(10) {
    width: 6%;
}

.ksa-grading-ui .grading-table th:nth-child(11),
.ksa-grading-ui .grading-table td:nth-child(11) {
    width: 6%;
}

.ksa-grading-ui .grading-table th:nth-child(12),
.ksa-grading-ui .grading-table td:nth-child(12) {
    width: 8%;
}

.ksa-grading-ui .grading-table th:nth-child(13),
.ksa-grading-ui .grading-table td:nth-child(13) {
    width: 8%;
}


/* ============================================================
   GRADING CONTROLS
   ============================================================ */

.ksa-grading-ui .grading-select {
    width: 58px;
    height: 28px;

    border: 1px solid #d5d9df;
    border-radius: 2px;

    background: #ffffff;

    font-size: 12px;
    color: #40536a;

    padding: 2px;
}

.ksa-grading-ui .grading-checkbox {
    width: 13px;
    height: 13px;
    margin: 0;
}

.ksa-grading-ui .grading-edit-icon,
.ksa-grading-ui .grading-remove-icon {
    font-size: 25px;
    line-height: 1;
    color: #333333;
    font-weight: bold;
}

.ksa-grading-ui .grading-remove-icon {
    font-size: 27px;
}


/* ============================================================
   CONFIRM ALL
   IMPORTANT:
   BUTTON IS ON RIGHT SIDE
   ============================================================ */

.ksa-grading-ui .confirm-all-row {
    display: flex;
    justify-content: flex-end;
    align-items: center;

    margin-top: 8px;
}

.ksa-grading-ui .confirm-all {
    background: #5b9bea;

    border: 1px solid #4c8bd9;
    border-radius: 2px;

    color: #ffffff;

    font-size: 13px;
    font-weight: 600;

    padding: 5px 10px;

    box-shadow: 0 0 0 2px rgba(91, 155, 234, 0.15);
}


/* ============================================================
   BOTTOM BUTTONS
   IMPORTANT:
   ALL BUTTONS ARE ON RIGHT SIDE
   ============================================================ */

.ksa-grading-ui .grading-bottom-row {
    display: flex;

    justify-content: flex-end;
    align-items: center;

    gap: 14px;

    margin-top: 5px;
}

.ksa-grading-ui .grading-btn {
    min-width: 130px;
    height: 30px;

    border: 0;
    border-radius: 2px;

    color: #ffffff;

    font-size: 12px;
    font-weight: 600;

    padding: 4px 15px;
}

.ksa-grading-ui .btn-grading-complete,
.ksa-grading-ui .btn-continue-later {
    background: #337ab7;
}

.ksa-grading-ui .btn-cancel {
    background: #ff9800;
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 991.98px) {

    .ksa-entry-ui .item-type-select {
        width: 65%;
    }

    .ksa-entry-ui .quantity-column {
        padding-right: 0;
        margin-bottom: 15px;
    }

    .ksa-entry-ui .fields-column {
        padding-left: 0;
    }

    .ksa-entry-ui .item-details-box {
        min-height: auto;
    }
}


@media (max-width: 767.98px) {

    .ksa-entry-ui .item-type-box {
        padding: 16px;
    }

    .ksa-entry-ui .item-type-select {
        width: 100%;
        max-width: none;
    }

    .ksa-entry-ui .item-details-box {
        padding: 15px;
    }

    .ksa-entry-ui .description-row > div {
        margin-bottom: 10px;
    }

    .ksa-entry-ui .serial-input,
    .ksa-entry-ui .reholder-cert-input {
        max-width: none;
        width: 100%;
    }

    .ksa-entry-ui .autographed-wrapper,
    .ksa-entry-ui .certified-wrapper {
        padding-top: 0;
    }

    .ksa-grading-ui {
        padding-left: 5px;
        padding-right: 5px;
    }

    .ksa-grading-ui .grading-bottom-row {
        justify-content: flex-end;
        flex-wrap: wrap;
    }

    .ksa-grading-ui .confirm-all-row {
        justify-content: flex-end;
    }
}
</style>
