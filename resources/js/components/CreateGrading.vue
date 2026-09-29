<template>
    <div class="">
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
            :start-index="startIndex"
        >

            <template v-slot:footer="props" v-slot:default="none">
                <div class="wizard-footer-left">
                    <wizard-button  v-if="props.activeTabIndex > 0" @click.native="props.prevTab()" :style="props.fillButtonStyle">Back</wizard-button>
                </div>
                <div class="wizard-footer-right">
                    <wizard-button @click.native="cancel" class="wizard-footer-right finish-button" style="background: orange;margin-left: 15px;color: white;">Cancel</wizard-button>
                    <wizard-button @click.native="cancel" class="wizard-footer-right" style="margin-left: 15px;" :style="props.fillButtonStyle">Continue Later</wizard-button>
                    <wizard-button v-if="!props.isLastStep"@click.native="props.nextTab()" class="wizard-footer-right" :style="props.fillButtonStyle">Continue</wizard-button>
                    <wizard-button v-else @click.native="received(item.id)" class="wizard-footer-right" :style="props.fillButtonStyle">Grading Complete</wizard-button>
                </div>
            </template>
            <!--                <tab-content-->
            <!--                    title="Customer Info"-->
            <!--                    icon="ti-user"-->
            <!--                    :before-change="checkFirstStep"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Customer Name-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.customer"-->
            <!--                                                        @change="customerNameChangeEvent"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(customer,index) in customers" :value="customer" :key="customer.id">{{customer.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.name" :options="customers" placeholder="Select customer..." @change="customerNameChangeEvent($event)" />&ndash;&gt;-->
            <!--                                                <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">-->
            <!--                                                    Customer name is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </tab-content>-->
            <!--                <tab-content-->
            <!--                    title="Grading Location"-->
            <!--                    icon="ti-map-alt"-->
            <!--                    :before-change="checkSecondStep"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            &lt;!&ndash;                        <div class="card shipping_address_card">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            <div class="card-body">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Drop Off Center&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Contact Name&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.contact_name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                contact name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Email Address&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="email"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.email.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                email is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                        </div>&ndash;&gt;-->
            <!--                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>-->
            <!--                        </div>-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Select the grading location for this order-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="v$.form_data.grading_location.$model"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(location,index) in gradingLocations" :value="location.id" :key="location.id">{{location.name}}</option>-->
            <!--                                                </select>-->

            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.grading_location" :options="gradingLocations" />&ndash;&gt;-->
            <!--                                                <div class="error" v-if="v$.form_data.grading_location.required.$invalid && show_error_two">-->
            <!--                                                    Grading location is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </tab-content>-->
            <!--                <tab-content-->
            <!--                    title="Billing Address"-->
            <!--                    icon="ti-infinite"-->
            <!--                    :before-change="checkThirdStep"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            &lt;!&ndash;                        <div class="card shipping_address_card">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            <div class="card-body">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Drop Off Center&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Contact Name&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.contact_name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                contact name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Email Address&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="email"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.email.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                email is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                        </div>&ndash;&gt;-->
            <!--                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>-->
            <!--                        </div>-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Address Line one-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    autofocus-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.billing_address_line_one.$model"-->
            <!--                                                    ref="billing_address_line_one"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.billing_address_line_one.required.$invalid && show_error_three">-->
            <!--                                                    One Address Line is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Address Line two-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="form_data.billing_address_line_two"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.billing_address_line_two.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Second address Line two is required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    City-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.billing_city.$model"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.billing_city.required.$invalid && show_error_three">-->
            <!--                                                    City is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Province/State-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="v$.form_data.billing_province.$model"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                <div class="error" v-if="v$.form_data.billing_province.required.$invalid && show_error_three">-->
            <!--                                                    Province is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->


            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    postal/Zip code-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.billing_postal.$model"-->
            <!--                                                    @input="event => v$.form_data.billing_postal.$model = event.target.value.toUpperCase()"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.billing_postal.required.$invalid && show_error_three">-->
            <!--                                                    Postal is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                        <div class="row">-->
            <!--                                            <div class="col-md-3">-->
            <!--                                                <div class="mb-3">-->
            <!--                                                    <label class="form-label w-100 text-capitalize">-->
            <!--                                                        Country-->
            <!--                                                        <span class="error">*</span>-->
            <!--                                                    </label>-->
            <!--                                                    <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                            v-model.trim="v$.form_data.billing_country.$model"-->
            <!--                                                    >-->
            <!--                                                        <option selected disabled>Open this select menu</option>-->
            <!--                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>-->
            <!--                                                    </select>-->
            <!--                                                    <div class="error" v-if="v$.form_data.billing_country.required.$invalid && show_error_three">-->
            <!--                                                        Country is required-->
            <!--                                                    </div>-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                            <div class="col-md-4">-->
            <!--                                                <div class="mb-3">-->
            <!--                                                    <label class="form-label w-100 text-capitalize">-->
            <!--                                                        Telephone#-->
            <!--&lt;!&ndash;                                                        <span class="error">*</span>&ndash;&gt;-->
            <!--                                                    </label>-->
            <!--                                                    <VuePhoneNumberInput-->
            <!--                                                        id="phoneNumber1"-->
            <!--                                                        class="mb-text-only"-->
            <!--                                                        v-model.trim="form_data.billing_phone"-->
            <!--                                                        default-country-code="CA"-->
            <!--                                                        :only-countries="countries_phone"-->
            <!--                                                        style="background-color: #e8f0fe !important;"-->
            <!--                                                    />-->
            <!--&lt;!&ndash;                                                    <div class="error" v-if="v$.form_data.billing_phone.required.$invalid && show_error_three">&ndash;&gt;-->
            <!--&lt;!&ndash;                                                        Phone is required&ndash;&gt;-->
            <!--&lt;!&ndash;                                                    </div>&ndash;&gt;-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </tab-content>-->
            <!--                <tab-content-->
            <!--                    title="Shipping Address"-->
            <!--                    icon="ti-infinite"-->
            <!--                    :before-change="checkFourthStep"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            &lt;!&ndash;                        <div class="card shipping_address_card">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            <div class="card-body">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Drop Off Center&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Contact Name&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.contact_name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                contact name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Email Address&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="email"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.email.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                email is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                        </div>&ndash;&gt;-->
            <!--                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>-->
            <!--                        </div>-->

            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-12">-->
            <!--                                            <div class="mb-3 d-flex justify-content-start">-->
            <!--                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
            <!--                                                    Same as billing address-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="checkbox"-->
            <!--                                                    class="form-check"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="form_data.same_as_billing"-->
            <!--                                                    @change="sameAsBillingChanged($event)"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Customer Name (if different)-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    autofocus-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="form_data.shipping_name"-->
            <!--                                                    ref="shipping_name"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_name.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Name for shipping is required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Contact Name (if different)-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.shipping_company_name.$model"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_company_name.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Company name is required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Address Line one-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.shipping_address_line_one.$model"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.shipping_address_line_one.required.$invalid && show_error_four">-->
            <!--                                                    One Address is required for shipping-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Address Line two-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="form_data.shipping_address_line_two"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.shipping_address_line_two.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Second shipping address required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    City-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.shipping_city.$model"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.shipping_city.required.$invalid && show_error_four">-->
            <!--                                                    city is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Province/State-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="v$.form_data.shipping_province.$model"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(province,index) in provinces" :value="province.name.toLowerCase()" :key="province.id">{{province.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                <div class="error" v-if="v$.form_data.shipping_province.required.$invalid && show_error_four">-->
            <!--                                                    Province is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    postal/Zip code-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="text"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.shipping_postal.$model"-->
            <!--                                                    @input="event => v$.form_data.shipping_postal.$model = event.target.value.toUpperCase()"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.shipping_postal.required.$invalid && show_error_four">-->
            <!--                                                    Postal is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="row">-->
            <!--                                            <div class="col-md-3">-->
            <!--                                                <div class="mb-3">-->
            <!--                                                    <label class="form-label w-100 text-capitalize">-->
            <!--                                                        Country-->
            <!--                                                        <span class="error">*</span>-->
            <!--                                                    </label>-->
            <!--                                                    <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                            v-model.trim="v$.form_data.shipping_country.$model"-->
            <!--                                                    >-->
            <!--                                                        <option selected disabled>Open this select menu</option>-->
            <!--                                                        <option v-for="(country,index) in countries" :value="country.name.toLowerCase()" :key="country.id">{{country.name}}</option>-->
            <!--                                                    </select>-->
            <!--                                                    <div class="error" v-if="v$.form_data.shipping_country.required.$invalid && show_error_four">-->
            <!--                                                        Country is required-->
            <!--                                                    </div>-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                            <div class="col-md-4">-->
            <!--                                                <div class="mb-3">-->
            <!--                                                    <label class="form-label w-100 text-capitalize">-->
            <!--                                                        Telephone#-->
            <!--&lt;!&ndash;                                                        <span class="error">*</span>&ndash;&gt;-->
            <!--                                                    </label>-->
            <!--                                                    <VuePhoneNumberInput-->
            <!--                                                        id="phoneNumber1"-->
            <!--                                                        class="mb-text-only"-->
            <!--                                                        v-model.trim="form_data.shipping_phone"-->
            <!--                                                        default-country-code="CA"-->
            <!--                                                        :only-countries="countries_phone"-->
            <!--                                                    />-->
            <!--&lt;!&ndash;                                                    <div class="error" v-if="v$.form_data.shipping_phone.required.$invalid && show_error_four">&ndash;&gt;-->
            <!--&lt;!&ndash;                                                        Phone is required&ndash;&gt;-->
            <!--&lt;!&ndash;                                                    </div>&ndash;&gt;-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->

            <!--                    </div>-->
            <!--                </tab-content>-->
            <!--                <tab-content-->
            <!--                    title="Extra Fields"-->
            <!--                    icon="ti-server"-->
            <!--                    :before-change="checkFifthStep"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            &lt;!&ndash;                        <div class="card shipping_address_card">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            <div class="card-body">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                <div class="row">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Drop Off Center&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Contact Name&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="text"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.contact_name.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.contact_name.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                contact name is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    <div class="col-md-4">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        <div class="mb-3">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <label class="form-label w-100 text-capitalize">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                Email Address&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </label>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <input&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                type="email"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                class="form-control md-readonly"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                placeholder=""&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                v-model.trim="v$.form_data.email.$model"&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                readonly&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            />&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.email.required.$invalid && show_error_one">&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                                email is required&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                        </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                    </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                                </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                            </div>&ndash;&gt;-->
            <!--                            &lt;!&ndash;                        </div>&ndash;&gt;-->
            <!--                            <h3 class="mb-only-name">{{v$.form_data.name.$model}}</h3>-->
            <!--                        </div>-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Submission date-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    autofocus-->
            <!--                                                    type="date"-->
            <!--                                                    class="form-control mb-text-only"-->
            <!--                                                    placeholder=""-->
            <!--                                                    v-model.trim="v$.form_data.submission_date.$model"-->
            <!--                                                    ref="billing_address_line_one"-->
            <!--                                                />-->
            <!--                                                <div class="error" v-if="v$.form_data.submission_date.required.$invalid && show_error_five">-->
            <!--                                                    Submission date is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-3">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Promo code-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.promo_code"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled v-if="promos.length > 0">Open this select menu</option>-->
            <!--                                                    <option selected disabled v-else>There is no promo code</option>-->
            <!--                                                    <option v-for="(promo,index) in promos" :value="promo.id" :key="promo.id">{{promo.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.promo_code" :options="promoCodes" />&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-2">-->
            <!--                                            <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
            <!--                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
            <!--                                                    Payment Made-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="radio"-->
            <!--                                                    class="form-check"-->
            <!--                                                    name="payment_method"-->
            <!--                                                    placeholder=""-->
            <!--                                                    value="pym"-->
            <!--                                                    v-model.trim="form_data.payment_method"-->
            <!--                                                />-->
            <!--                                                &lt;!&ndash;                                            <div class="error" v-if="v$.form_data.same_as_billing.required.$invalid && show_error">&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                                Same as Billing is required&ndash;&gt;-->
            <!--                                                &lt;!&ndash;                                            </div>&ndash;&gt;-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-2">-->
            <!--                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">-->
            <!--                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
            <!--                                                    Pay on pickup-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="radio"-->
            <!--                                                    class="form-check"-->
            <!--                                                    name="payment_method"-->
            <!--                                                    placeholder=""-->
            <!--                                                    value="pop"-->
            <!--                                                    v-model.trim="form_data.payment_method"-->
            <!--                                                />-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-2">-->
            <!--                                            <div class="mb-3 d-flex justify-content-end" style="margin-top: 25px;">-->
            <!--                                                <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
            <!--                                                    COD-->
            <!--                                                </label>-->
            <!--                                                <input-->
            <!--                                                    type="radio"-->
            <!--                                                    class="form-check"-->
            <!--                                                    name="payment_method"-->
            <!--                                                    placeholder=""-->
            <!--                                                    value="cod"-->
            <!--                                                    v-model.trim="form_data.payment_method"-->
            <!--                                                />-->
            <!--                                            </div>-->
            <!--                                        </div>-->

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
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </tab-content>-->
            <!--                :before-change="checkSixthStep"-->
            <!--                <tab-content-->
            <!--                    title="Shipping Method"-->
            <!--                    icon="ti-credit-card"-->
            <!--                >-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="card shipping_address_card">-->
            <!--                                <div class="card-body">-->
            <!--                                    <div class="row">-->
            <!--                                        <div class="col-md-6">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Shipping Method-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.shipping_method"-->
            <!--                                                        @change="shippingMethodsChangeEvent"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(shipping,index) in shippingMethods" :value="shipping.name" :key="shipping.id">{{shipping.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.shipping_method" :options="shippingMethods" @change="shippingMethodsChangeEvent($event)" />&ndash;&gt;-->
            <!--                                                <div class="error" v-if="v$.form_data.shipping_method.required.$invalid && show_error_six">-->
            <!--                                                    Shipping method is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6" v-if="showPickupLocationBox">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Pickup location-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.pickup_location"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(pickup,index) in pickUpLocations" :value="pickup.name" :key="pickup.id">{{pickup.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.pickup_location" :options="pickUpLocations" />&ndash;&gt;-->
            <!--                                                <div class="error" v-if="v$.form_data.pickup_location.required.$invalid && show_error_seven">-->
            <!--                                                    Pickup location is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6" v-if="showShowPickupLocationBox">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Pickup Location-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.show_pickup_location"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled>Open this select menu</option>-->
            <!--                                                    <option v-for="(showPickup,index) in pickUpLocations" :value="showPickup.name" :key="showPickup.id">{{showPickup.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                &lt;!&ndash;                                            <Select2 v-model="form_data.show_pickup_location" :options="pickUpLocations" />&ndash;&gt;-->
            <!--                                                <div class="error" v-if="v$.form_data.show_pickup_location.required.$invalid && show_error_eight">-->
            <!--                                                    Pickup location is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6" v-if="showThirdPartyBox">-->
            <!--                                            <div class="mb-3">-->
            <!--                                                <label class="form-label w-100 text-capitalize">-->
            <!--                                                    Third party drop off center-->
            <!--                                                    <span class="error">*</span>-->
            <!--                                                </label>-->
            <!--                                                <select class="form-select mb-text-only" aria-label="Default select example"-->
            <!--                                                        v-model.trim="form_data.third_party_drop_center"-->
            <!--                                                >-->
            <!--                                                    <option selected disabled v-if="parties.length > 0">Open this select menu</option>-->
            <!--                                                    <option selected disabled v-else>There is no third party</option>-->
            <!--                                                    <option v-for="(third,index) in parties" :value="third.id" :key="third.id">{{third.name}}</option>-->
            <!--                                                </select>-->
            <!--                                                <div class="error" v-if="v$.form_data.third_party_drop_center.required.$invalid && show_error_nine">-->
            <!--                                                    Third party drop off center is required-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->

            <!--                                        <div class="col-md-6" v-if="showUPSBox">-->
            <!--                                            <div class="row">-->
            <!--                                                <div class="col-md-6">-->
            <!--                                                    <div class="mb-3 d-flex justify-content-start" style="margin-top: 25px;">-->
            <!--                                                        <label class="form-label text-capitalize" style="margin-top: 6px;margin-right: 15px;">-->
            <!--                                                            Use Customer Account-->
            <!--                                                        </label>-->
            <!--                                                        <input-->
            <!--                                                            type="checkbox"-->
            <!--                                                            class="form-check"-->
            <!--                                                            placeholder=""-->
            <!--                                                            v-model.trim="form_data.use_customer_account"-->
            <!--                                                        />-->
            <!--                                                    </div>-->
            <!--                                                </div>-->

            <!--                                                <div class="col-md-6">-->
            <!--                                                    <div class="mb-3">-->
            <!--                                                        <label class="form-label w-100 text-capitalize">-->
            <!--                                                            Customer Account number-->
            <!--                                                            <span class="error">*</span>-->
            <!--                                                        </label>-->
            <!--                                                        <input-->
            <!--                                                            type="number"-->
            <!--                                                            class="form-control mb-text-only"-->
            <!--                                                            placeholder=""-->
            <!--                                                            v-model.trim="v$.form_data.customer_account_number.$model"-->
            <!--                                                        />-->
            <!--                                                        <div class="error" v-if="v$.form_data.customer_account_number.required.$invalid && show_error_ten">-->
            <!--                                                            Customer account number is required-->
            <!--                                                        </div>-->
            <!--                                                    </div>-->
            <!--                                                </div>-->
            <!--                                            </div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </tab-content>-->
            <tab-content
                title="Item Type"
                icon="ti-gift"
            >
                <!-- Customer / Order -->
                <div class="grading-order-header">
                    <h5 class="card-title text-capitalize mb-0">{{ item.customer_name }}</h5>
                    <h5 class="card-title mb-0">Order # {{ item.entrySKU }}</h5>
                </div>

                <div class="grading-table-container">
                    <div class="table-responsive grading-table-scroll">
                        <table class="table mb-0 grading-table">
                            <thead>
                            <tr>
                                <th>Item Type</th>
                                <th>Sub Type</th>
                                <th>Description 1</th>
                                <th>Description 2</th>
                                <th>Description 3</th>
                                <th>Autographed</th>
                                <th>Serial Number</th>
                                <th>Item Grade</th>
                                <th>Auto Grade</th>
                                <th>Actions</th>
                                <th class="select-col">
                                    <label class="select-all-label">
                                        <input type="checkbox" v-model="selectAll" @change="toggleSelectAll" :disabled="selectableEntries.length === 0">
                                        Select All
                                    </label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-if="form_data.entries.length === 0">
                                <td colspan="11" class="text-muted-na">No item found</td>
                            </tr>

                            <tr v-for="entry in form_data.entries" :key="entry.entryItemId" :class="{ 'row-graded': isGraded(entry) }">
                                <td class="type-cell">{{ entry.itemType }}</td>
                                <td>{{ entry.itemType == 'Crossover' ? entry.crossover_item_type : 'N/A' }}</td>

                                <!-- Descriptions -->
                                <td class="desc-cell">{{ descriptionOf(entry, 'one') }}</td>
                                <td class="desc-cell">{{ descriptionOf(entry, 'two') }}</td>
                                <td class="desc-cell">{{ descriptionOf(entry, 'three') }}</td>

                                <!-- Autographed -->
                                <td>
                                    <span v-if="!entry.prefix" class="status-badge status-na">N/A</span>
                                    <span v-else-if="entry[entry.prefix + '_autographed']" class="status-badge status-yes">Yes</span>
                                    <span v-else class="status-badge status-no">No</span>
                                </td>

                                <!-- Serial / Grading Cert -->
                                <td>{{ entry.grading_cert_number }}</td>

                                <!-- Item Grade -->
                                <td>
                                    <select class="form-select grade-select" :class="{ 'grade-invalid': entry.grade_error && !entry.item_grade }" v-model="entry.item_grade" :disabled="isGraded(entry)">
                                        <option value=""></option>
                                        <option v-for="grade in grades" :value="grade.name" :key="grade.id">
                                            {{ grade.name }}{{ grade.mean ? ' - ' + grade.mean : '' }}
                                        </option>
                                    </select>
                                </td>

                                <!-- Auto Grade -->
                                <td>
                                    <select class="form-select grade-select" :class="{ 'grade-invalid': entry.grade_error && !entry.auto_grade && needsAutoGrade(entry) }" v-model="entry.auto_grade" :disabled="isGraded(entry)">
                                        <option value=""></option>
                                        <option v-for="grade in autoGrades" :value="grade.name" :key="grade.id">{{ grade.name }}</option>
                                    </select>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="action-group" v-if="!isGraded(entry)">
                                        <button type="button" class="action-btn action-edit" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#gradingEditModal"
                                                @click="openEdit(entry)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="action-btn action-remove" title="Remove"
                                                @click="removeItem(entry.entryItemId)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button type="button" class="action-btn action-yes" title="Confirm Grading"
                                                @click="confirmOne(entry)">
                                            Yes
                                        </button>
                                    </div>
                                    <span v-else class="status-badge status-yes">Graded</span>
                                </td>

                                <!-- Select -->
                                <td class="select-col">
                                    <input type="checkbox" :value="entry.entryItemId" v-model="selectedIds" :disabled="isGraded(entry)">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="confirm-all-wrap">
                    <button type="button" class="btn btn-primary confirm-all-btn" @click="confirmAll" :disabled="selectedIds.length === 0">
                        Confirm All
                    </button>
                </div>

                <!-- =========================================================
                     EDIT ITEM MODAL (one modal, item type based card)
                ========================================================= -->
                <div class="modal fade grading-item-modal" id="gradingEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Item</h5>
                            </div>

                            <div class="modal-body">
                                <div class="ksa-entry-ui" v-if="editDraft">

                                    <!-- CARD / COMBINED / INDEX / OLD TYPES -->
                                    <div class="item-details-box" v-if="editDraft.prefix">
                                        <div class="row">

                                            <div class="col-lg-2 col-md-3 col-12">
                                                <div class="quantity-box">
                                                    <div class="quantity-title">Quantity</div>
                                                    <div class="quantity-number">1</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-10 col-md-9 col-12 px-2">

                                                <!-- Split: Card / Combined Service -->
                                                <template v-if="isSplit(editDraft)">
                                                    <div class="row description-row">
                                                        <div class="col-12">
                                                            <label class="field-label">Description #1</label>
                                                        </div>
                                                        <div class="col-md-2 col-12">
                                                            <label class="field-label-sub">Year</label>
                                                            <input type="text" class="form-control" v-model="editDraft.desc_year">
                                                        </div>
                                                        <div class="col-md-10 col-12">
                                                            <label class="field-label-sub">Manufacturer</label>
                                                            <input type="text" class="form-control" v-model="editDraft.desc_manufacturer">
                                                        </div>
                                                    </div>

                                                    <div class="row description-row">
                                                        <div class="col-12">
                                                            <label class="field-label">Description #2</label>
                                                        </div>
                                                        <div class="col-md-2 col-12" v-if="hasNumber(editDraft)">
                                                            <label class="field-label-sub">Number</label>
                                                            <input type="text" class="form-control" v-model="editDraft.desc_number">
                                                        </div>
                                                        <div :class="hasNumber(editDraft) ? 'col-md-10 col-12' : 'col-12'">
                                                            <label class="field-label-sub">Player Name</label>
                                                            <input type="text" class="form-control" v-model="editDraft.desc_player">
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- Plain: Index Card / old types -->
                                                <template v-else>
                                                    <div class="row description-row">
                                                        <div class="col-12">
                                                            <label class="field-label">Description #1</label>
                                                            <input type="text" class="form-control" v-model="editDraft[editDraft.prefix + '_description_one']">
                                                        </div>
                                                    </div>
                                                    <div class="row description-row">
                                                        <div class="col-12">
                                                            <label class="field-label">Description #2</label>
                                                            <input type="text" class="form-control" v-model="editDraft[editDraft.prefix + '_description_two']">
                                                        </div>
                                                    </div>
                                                </template>

                                                <div class="row description-row">
                                                    <div class="col-12">
                                                        <label class="field-label">Description #3</label>
                                                        <input type="text" class="form-control" v-model="editDraft[editDraft.prefix + '_description_three']">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="field-label">Serial Number (Only if printed directly on item)</label>
                                                        <input type="text" class="form-control serial-input" v-model="editDraft[editDraft.prefix + '_serial_number']">
                                                    </div>
                                                </div>

                                                <div class="row autograph-row" v-if="showAutograph(editDraft)">
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="autographed-wrapper">
                                                            <label>Autographed</label>
                                                            <input type="checkbox" class="custom-checkbox" v-model="editDraft[editDraft.prefix + '_autographed']">
                                                        </div>
                                                    </div>

                                                    <div :class="showCertified(editDraft) ? 'col-lg-3 col-md-3 col-12' : 'col-lg-4 col-md-4 col-12'">
                                                        <label class="field-label">Authenticator Name</label>
                                                        <select class="form-control" v-model="editDraft[editDraft.prefix + '_authenticator_name']">
                                                            <option value="">Select</option>
                                                            <option v-for="authenticator in authenticators" :value="authenticator.id" :key="authenticator.id">{{ authenticator.name }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-12" v-if="showCertified(editDraft)">
                                                        <div class="certified-wrapper">
                                                            <label>Certified On Card</label>
                                                            <input type="checkbox" class="custom-checkbox" v-model="editDraft[editDraft.prefix + '_certified_on_card']">
                                                        </div>
                                                    </div>

                                                    <div :class="showCertified(editDraft) ? 'col-lg-3 col-md-3 col-12' : 'col-lg-5 col-md-5 col-12'" v-if="showCertNo(editDraft)">
                                                        <label class="field-label">Authenticator Cert. No.</label>
                                                        <input type="text" class="form-control" v-model="editDraft[editDraft.prefix + '_authenticator_cert_no']">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- REHOLDER -->
                                    <div class="item-details-box reholder-box" v-else-if="editDraft.itemType == 'Reholder'">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-12">
                                                <div class="quantity-box">
                                                    <div class="quantity-title">Quantity</div>
                                                    <div class="quantity-number">1</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-9 col-12 px-2">
                                                <label class="field-label">Certification Number</label>
                                                <input type="text" class="form-control reholder-cert-input" v-model.trim="editDraft.reholder_certification_number">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="saveEdit">Save</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="gradingEditCancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
        </form-wizard>
    </div>
</template>

<script>
import VuePhoneNumberInput from 'vue-phone-number-input';
import { useVuelidate } from '@vuelidate/core'
import {required, email, requiredIf, numeric} from '@vuelidate/validators'
import {isDisabled} from "bootstrap/js/src/util";
// import {isReadonly} from "vue";


export default {
    name: "CreateGrading",
    props: ["customers","promos","parties","authenticators","item","entries"],
    components: {
        VuePhoneNumberInput,
    },
    setup: () => ({ v$: useVuelidate() }),
    data(){
        return{
            isDisabled: true,
            startIndex:0,
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
            itemTypes:[
                {
                    'id':1,
                    'name':'Card',
                },
                {
                    'id':2,
                    'name':'Auto Authentication',
                },
                {
                    'id':3,
                    'name':'Combined Service',
                },
                {
                    'id':4,
                    'name':'Reholder',
                },
                {
                    'id':5,
                    'name':'Crossover',
                },
            ],
            crossoverItemTypes:[
                {
                    'id':1,
                    'name':'Card'
                }
            ],
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

            grades:[
                // {
                //     "id": 1,
                //     "name": "10 (P)",
                //     "mean": "GEM"
                // },
                {
                    "id": 2,
                    "name": "10",
                    "mean": "MINT"
                },
                {
                    "id": 3,
                    "name": "9.5",
                    "mean": "NGM"
                },
                {
                    "id": 4,
                    "name": "9",
                    "mean": "MINT"
                },
                {
                    "id": 5,
                    "name": "8.5",
                    "mean": "NMM+"
                },
                {
                    "id": 6,
                    "name": "8",
                    "mean": "NMM"
                },
                {
                    "id": 7,
                    "name": "7.5",
                    "mean": "NM+"
                },
                {
                    "id": 8,
                    "name": "7",
                    "mean": "NM"
                },
                {
                    "id": 9,
                    "name": "6.5",
                    "mean": "ENM+"
                },
                {
                    "id": 10,
                    "name": "6",
                    "mean": "ENM"
                },
                {
                    "id": 11,
                    "name": "5.5",
                    "mean": "EX+"
                },
                {
                    "id": 12,
                    "name": "5",
                    "mean": "EX"
                },
                {
                    "id": 13,
                    "name": "4.5",
                    "mean": "VGE+"
                },
                {
                    "id": 14,
                    "name": "4",
                    "mean": "VGE"
                },
                {
                    "id": 15,
                    "name": "3.5",
                    "mean": "VG+"
                },
                {
                    "id": 16,
                    "name": "3",
                    "mean": "VG"
                },
                {
                    "id": 17,
                    "name": "2.5",
                    "mean": "GD+"
                },
                {
                    "id": 18,
                    "name": "2",
                    "mean": "GD"
                },
                {
                    "id": 19,
                    "name": "1.5",
                    "mean": "FR"
                },
                {
                    "id": 20,
                    "name": "1",
                    "mean": "PR"
                },
                {
                    "id": 21,
                    "name": "A",
                    "mean": "AUTH"
                },
                {
                    "id": 22,
                    "name": "AA",
                    "mean": "ALTERED"
                },
                {
                    "id": 23,
                    "name": "AC",
                    "mean": "COL"
                },
                {
                    "id": 24,
                    "name": "AT",
                    "mean": "TRIM"
                },
                {
                    "id": 25,
                    "name": "N1",
                    "mean": ""
                },
                {
                    "id": 26,
                    "name": "N2",
                    "mean": ""
                },
                {
                    "id": 27,
                    "name": "N3",
                    "mean": ""
                },
                {
                    "id": 28,
                    "name": "N4",
                    "mean": ""
                },
                {
                    "id": 29,
                    "name": "N5",
                    "mean": ""
                },
                {
                    "id": 30,
                    "name": "N6",
                    "mean": ""
                },
                {
                    "id": 31,
                    "name": "N7",
                    "mean": ""
                },
                {
                    "id": 32,
                    "name": "N8",
                    "mean": ""
                },
            ],
            autoGrades:[
                {
                    'id':1,
                    'name':'10'
                },
                {
                    'id':2,
                    'name':'9'
                },
                {
                    'id':3,
                    'name':'8'
                },
                {
                    'id':4,
                    'name':'7'
                },
                {
                    'id':5,
                    'name':'6'
                },
                {
                    'id':6,
                    'name':'5'
                },
            ],

            // Grading table / edit modal state
            selectAll: false,
            selectedIds: [],
            editDraft: null,

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
                submission_date:'',
                products:[],
                itemType:'',

                //next
                grading_location:'',
                promo_code:'',
                payment_method:'',
                shopify_order_number:'',
                shipping_method:'',
                pickup_location:'',
                show_pickup_location:'',
                third_party_drop_center:'',
                use_customer_account:'',
                customer_account_number:'',
                authenticator_name:'',
                authenticator_name_two:'',
                authenticator_name_three:'',
                authenticator_name_four:'',
                entries:[],
            },

        }
    },
    mounted() {
        let self = this;

        self.form_data.customer= {
            id:self.item.customer_id,
            name:self.item.customer_name,
        },
            self.form_data.name= self.item.customer_name,
            self.form_data.customerId= self.item.customer_id,
            // email:'',
            self.form_data.contact_name= self.item.contact_name,
            self.form_data.item_qty= self.item.item_qty,
            self.form_data.billing_address_line_one= self.item.billing_address_line_one,
            self.form_data.billing_address_line_two= self.item.billing_address_line_two,
            self.form_data.billing_country= self.item.billing_country,
            self.form_data.billing_province= self.item.billing_province,
            self.form_data.billing_city= self.item.billing_city,
            self.form_data.billing_postal= self.item.billing_postal,
            self.form_data.billing_phone= self.item.billing_phone,
            self.form_data.same_as_billing= self.item.same_as_billing,
            self.form_data.autographed= self.item.autographed,
            self.form_data.shipping_name= self.item.shipping_name,
            self.form_data.shipping_company_name= self.item.shipping_company_name,
            self.form_data.shipping_address_line_one= self.item.shipping_address_line_one;
        self.form_data.shipping_address_line_two= self.item.shipping_address_line_two,
            self.form_data.shipping_country= self.item.shipping_country,
            self.form_data.shipping_province= self.item.shipping_province,
            self.form_data.shipping_city= self.item.shipping_city,
            self.form_data.shipping_postal= self.item.shipping_postal,
            self.form_data.shipping_phone= self.item.shipping_phone,
            self.form_data.status= self.item.status,
            self.form_data.submission_date= self.item.submission_date,
            self.form_data.products= self.item.products,
            self.form_data.itemType= self.item.itemType,

            //next
            self.form_data.grading_location= self.item.grading_location,
            self.form_data.promo_code= self.item.promo_code,
            self.form_data.payment_method= self.item.payment_method,
            self.form_data.shopify_order_number= self.item.shopify_order_number,
            self.form_data.shipping_method= self.item.shipping_method,
            self.form_data.pickup_location= self.item.pickup_location,
            self.form_data.show_pickup_location= self.item.show_pickup_location,
            self.form_data.third_party_drop_center= self.item.third_party_drop_center,
            self.form_data.use_customer_account= self.item.use_customer_account,
            self.form_data.customer_account_number= self.item.customer_account_number,


            self.form_data.entries = self.entries.map(entry => self.mapEntry(entry));

        if (self.form_data.shipping_method == "Pickup"){
            self.showPickupLocationBox=true;
        }else if(self.form_data.shipping_method == "Show Pickup") {
            self.showShowPickupLocationBox = true;
        }else if(self.form_data.shipping_method == "Return to Third Party"){
            self.showThirdPartyBox=true;
        }else if(self.form_data.shipping_method == "Delivery"){
            self.showPickupLocationBox=false;
            self.showShowPickupLocationBox = false;
            self.showThirdPartyBox=false;
            self.showUPSBox=false;
        } else {
            self.showUPSBox=true;
        }
    },
    methods:{
        // =========================================================
        // ITEM TYPE HELPERS
        // =========================================================

        // Item type -> description column prefix
        prefixOf(type){
            if (!type) return null;
            if (type.indexOf('Card') === 0 || type === 'Index Card') return 'card';
            if (type.indexOf('Combined Service') === 0) return 'combined_service';
            if (type === 'Autograph Authentication') return 'auto_authentication';
            if (type === 'Crossover') return 'crossover';
            return null;
        },

        // Item type -> grade columns
        gradeKeysOf(type){
            const prefix = this.prefixOf(type);

            if (prefix === 'auto_authentication') {
                return { item: 'auto_authentication_grade', mean: null, auto: 'auto_authentication_auto_grade' };
            }
            if (prefix) {
                return { item: prefix + '_item_grade', mean: prefix + '_item_grade_mean', auto: prefix + '_auto_grade' };
            }
            if (type === 'Reholder') {
                return { item: 'reholder_item_grade', mean: 'reholder_item_grade_mean', auto: 'reholder_auto_grade' };
            }
            return null;
        },

        isGraded(entry){
            return entry.status === 'graded';
        },

        isSplit(entry){
            return entry.itemType !== 'Index Card'
                && (entry.prefix === 'card' || entry.prefix === 'combined_service');
        },

        hasNumber(entry){
            return [
                'Card (No Number)',
                'Card (Autographed) No Number',
                'Combined Service (No Number)',
            ].indexOf(entry.itemType) === -1;
        },

        showAutograph(entry){
            return [
                'Card (Autographed)',
                'Card (Autographed) No Number',
                'Index Card',
                'Combined Service',
                'Combined Service (No Number)',
                'Autograph Authentication',
                'Crossover',
            ].indexOf(entry.itemType) !== -1;
        },

        showCertified(entry){
            return [
                'Card (Autographed)',
                'Card (Autographed) No Number',
                'Combined Service',
            ].indexOf(entry.itemType) !== -1;
        },

        showCertNo(entry){
            return this.showAutograph(entry) && entry.itemType !== 'Combined Service (No Number)';
        },

        toBool(value){
            return value === true || value === 1 || value === '1' || value === 'true';
        },

        joinParts(a, b){
            return [a, b]
                .map(value => (value || '').toString().trim())
                .filter(Boolean)
                .join(', ');
        },

        // "1979-80, O-Pee-Chee" -> ["1979-80", "O-Pee-Chee"]
        splitParts(value){
            value = (value || '').toString().trim();
            const i = value.indexOf(',');

            return i < 0
                ? ['', value]
                : [value.slice(0, i).trim(), value.slice(i + 1).trim()];
        },

        descriptionOf(entry, n){
            if (entry.prefix) {
                return entry[entry.prefix + '_description_' + n] || '';
            }
            if (entry.itemType === 'Reholder' && n === 'one') {
                return entry.reholder_certification_number || '';
            }
            return n === 'one' ? 'N/A' : '';
        },

        // DB description -> split fields
        fillEntryFields(entry){
            if (!this.isSplit(entry)) return;

            const one = this.splitParts(entry[entry.prefix + '_description_one']);
            const two = this.splitParts(entry[entry.prefix + '_description_two']);

            entry.desc_year = one[0];
            entry.desc_manufacturer = one[1];
            entry.desc_number = this.hasNumber(entry) ? two[0] : '';
            entry.desc_player = this.hasNumber(entry) ? two[1] : this.joinParts(two[0], two[1]);
        },

        // Split fields -> DB description
        combineEntryFields(entry){
            if (!this.isSplit(entry)) return;

            entry[entry.prefix + '_description_one'] = this.joinParts(entry.desc_year, entry.desc_manufacturer);
            entry[entry.prefix + '_description_two'] = this.joinParts(
                this.hasNumber(entry) ? entry.desc_number : '',
                entry.desc_player
            );
        },

        // Table grade selects -> item type grade columns
        applyGrades(entry){
            const keys = this.gradeKeysOf(entry.itemType);
            if (!keys) return;

            const grade = this.grades.find(g => g.name === entry.item_grade);

            entry[keys.item] = entry.item_grade || null;
            entry[keys.auto] = entry.auto_grade || null;

            if (keys.mean) {
                entry[keys.mean] = grade ? grade.mean : null;
            }
        },

        // API row -> table entry
        mapEntry(entry){
            const en = {
                entryItemId : entry.id,
                entryID : entry.entry_id,
                itemType : entry.itemType,
                status : entry.status,
                grading_cert_number : entry.grading_cert_number,
                pieces : entry.pieces,

                //item type card
                card_description_one: entry.card_description_one,
                card_description_two : entry.card_description_two,
                card_description_three : entry.card_description_three,
                card_serial_number : entry.card_serial_number,
                card_autographed : this.toBool(entry.card_autographed),
                card_certified_on_card : this.toBool(entry.card_certified_on_card),
                card_authenticator_name : entry.card_authenticator_name || '',
                card_authenticator_cert_no : entry.card_authenticator_cert_no,
                card_estimated_value : entry.card_estimated_value,

                //item type auto authentication
                auto_authentication_description_one : entry.auto_authentication_description_one,
                auto_authentication_description_two : entry.auto_authentication_description_two,
                auto_authentication_description_three : entry.auto_authentication_description_three,
                auto_authentication_serial_number : entry.auto_authentication_serial_number,
                auto_authentication_autographed : this.toBool(entry.auto_authentication_autographed),
                auto_authentication_authenticator_name : entry.auto_authentication_authenticator_name || '',
                auto_authentication_authenticator_cert_no : entry.auto_authentication_authenticator_cert_no,
                auto_authentication_estimated_value : entry.auto_authentication_estimated_value,

                //item type combined service
                combined_service_description_one : entry.combined_service_description_one,
                combined_service_description_two : entry.combined_service_description_two,
                combined_service_description_three : entry.combined_service_description_three,
                combined_service_serial_number : entry.combined_service_serial_number,
                combined_service_autographed : this.toBool(entry.combined_service_autographed),
                combined_service_certified_on_card : this.toBool(entry.combined_service_certified_on_card),
                combined_service_authenticator_name : entry.combined_service_authenticator_name || '',
                combined_service_authenticator_cert_no : entry.combined_service_authenticator_cert_no,
                combined_service_estimated_value : entry.combined_service_estimated_value,

                //item type reholder
                reholder_certification_number : entry.reholder_certification_number,
                reholder_estimated_value : entry.reholder_estimated_value,

                //item type crossover
                crossover_description_one : entry.crossover_description_one,
                crossover_description_two : entry.crossover_description_two,
                crossover_description_three : entry.crossover_description_three,
                crossover_serial_number : entry.crossover_serial_number,
                crossover_autographed : this.toBool(entry.crossover_autographed),
                crossover_authenticator_name : entry.crossover_authenticator_name || '',
                crossover_authenticator_cert_no : entry.crossover_authenticator_cert_no,
                crossover_estimated_value : entry.crossover_estimated_value,
                crossover_minimum_grade : entry.crossover_minimum_grade,
                crossover_item_type : entry.crossover_item_type,

                //grades
                card_item_grade: entry.card_item_grade,
                card_item_grade_mean: entry.card_item_grade_mean,
                card_auto_grade: entry.card_auto_grade,
                auto_authentication_grade: entry.auto_authentication_grade,
                auto_authentication_auto_grade: entry.auto_authentication_auto_grade,
                combined_service_item_grade: entry.combined_service_item_grade,
                combined_service_item_grade_mean: entry.combined_service_item_grade_mean,
                combined_service_auto_grade: entry.combined_service_auto_grade,
                reholder_item_grade: entry.reholder_item_grade,
                reholder_item_grade_mean: entry.reholder_item_grade_mean,
                reholder_auto_grade: entry.reholder_auto_grade,
                crossover_item_grade: entry.crossover_item_grade,
                crossover_item_grade_mean: entry.crossover_item_grade_mean,
                crossover_auto_grade: entry.crossover_auto_grade,

                // UI only (not saved)
                prefix : this.prefixOf(entry.itemType),
                item_grade : '',
                auto_grade : '',
                grade_error : false,
                desc_year : '',
                desc_manufacturer : '',
                desc_number : '',
                desc_player : '',
            };

            const keys = this.gradeKeysOf(en.itemType);
            if (keys) {
                en.item_grade = en[keys.item] || '';
                en.auto_grade = en[keys.auto] || '';
            }

            this.fillEntryFields(en);

            return en;
        },

        // =========================================================
        // EDIT MODAL
        // =========================================================

        openEdit(entry){
            const draft = JSON.parse(JSON.stringify(entry));
            this.fillEntryFields(draft);
            this.editDraft = draft;
        },

        // Save item info only (grades/status are not touched)
        saveEdit(){
            let self = this;
            const draft = this.editDraft;
            if (!draft) return;

            this.combineEntryFields(draft);

            const payload = Object.assign({}, draft, {
                item_id: draft.entryItemId,
                pieces: draft.pieces || 0,
            });

            axios
                .post('/admin/entries/edit/new/item', payload)
                .then(function () {
                    const entry = self.form_data.entries.find(e => e.entryItemId === draft.entryItemId);

                    if (entry) {
                        // Keep grades selected in the table (not saved yet)
                        draft.item_grade = entry.item_grade;
                        draft.auto_grade = entry.auto_grade;
                        draft.grade_error = entry.grade_error;
                        Object.assign(entry, draft);
                    }

                    const cancelBtn = document.getElementById('gradingEditCancel');
                    if (cancelBtn) cancelBtn.click();

                    Swal.fire("Item Updated!", "", "success");
                })
                .catch(err => self.handleError(err));
        },

        // =========================================================
        // GRADING
        // =========================================================

        // One request per item (backend gives one cert number per request)
        async gradeEntries(entries){
            for (const entry of entries) {
                this.combineEntryFields(entry);
                this.applyGrades(entry);

                const payload = Object.assign({}, this.form_data, { entries: [entry] });

                await axios.post(`/admin/grading/upgrade/to/grade/${this.item.id}`, payload);
            }
        },

        // Auto Grade is required only for autographed items
        needsAutoGrade(entry){
            return !!(entry.prefix && entry[entry.prefix + '_autographed']);
        },

        // Item Grade is always required, Auto Grade only for autographed items
        validateGrades(entries){
            let valid = true;

            entries.forEach(entry => {
                entry.grade_error = !entry.item_grade
                    || (this.needsAutoGrade(entry) && !entry.auto_grade);
                if (entry.grade_error) valid = false;
            });

            if (!valid) {
                Swal.fire({
                    title: "Grade required",
                    html: "Please select <b>Item Grade</b>.<br>Autographed items also need an <b>Auto Grade</b>.",
                    icon: "warning",
                });
            }

            return valid;
        },

        confirmOne(entry){
            let self = this;

            if (!this.validateGrades([entry])) return;

            Swal.fire({
                title: `Confirm grading for this item?<br><span style="font-size: 16px;">${entry.itemType}</span>`,
                showCancelButton: true,
                confirmButtonText: "Yes, confirm",
                icon: "question",
            }).then((result) => {
                if (!result.isConfirmed) return;

                self.gradeEntries([entry])
                    .then(() => {
                        Swal.fire("Graded!", "", "success");
                        self.getEntryItemsList(self.item.id);
                    })
                    .catch(err => self.handleError(err));
            });
        },

        confirmAll(){
            let self = this;

            const entries = this.form_data.entries.filter(entry =>
                this.selectedIds.includes(entry.entryItemId) && !this.isGraded(entry)
            );

            if (entries.length === 0) {
                Swal.fire("Please select at least one item.", "", "info");
                return;
            }

            if (!this.validateGrades(entries)) return;

            Swal.fire({
                title: `Confirm grading for ${entries.length} selected item(s)?`,
                showCancelButton: true,
                confirmButtonText: "Yes, confirm all",
                icon: "question",
            }).then((result) => {
                if (!result.isConfirmed) return;

                self.gradeEntries(entries)
                    .then(() => {
                        Swal.fire("Graded!", "", "success");
                        self.selectedIds = [];
                        self.getEntryItemsList(self.item.id);
                    })
                    .catch(err => {
                        self.getEntryItemsList(self.item.id);
                        self.handleError(err);
                    });
            });
        },

        handleError(err){
            try {
                this.showValidationError(err);
            } catch (e) {
                this.showSomethingWrong();
            }
        },

        toggleSelectAll(){
            this.selectedIds = this.selectAll
                ? this.selectableEntries.map(entry => entry.entryItemId)
                : [];
        },

        // Old single submit (kept for compatibility)
        async submit(ind){
            const entry = this.form_data.entries[ind];
            if (entry) this.confirmOne(entry);
        },
        async received(id){
            if (this.checkSixthStep()){
                Swal.fire({
                    // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                    title: `Do you want to update this order to graded: <br> ${this.form_data.name}`,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    denyButtonText: `No`,
                    icon: "question",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // Swal.fire("Saved!", "", "success");
                        // window.location.href = `/admin/entries/10`;
                        // Submit form

                        axios
                            .get(`/admin/grading/entry/graded/${id}`)
                            .then(function (response) {
                                Swal.fire("Update!", "", "success").then((result)=>{
                                    if (result.isConfirmed){
                                        if (response.status == 200){
                                            window.location.href = `/admin/grading`;
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
                        window.location.href = "/admin/grading";
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
            }else if (this.v$.form_data.card_description_two.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_description_three.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_authenticator_name.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_authenticator_cert_no.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.card_estimated_value.$invalid) {
                this.show_error_twelve = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_one.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_two.$invalid) {
                this.show_error_thirteen = true;
                return false;
            }else if (this.v$.form_data.auto_authentication_description_three.$invalid) {
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
            }else if (this.v$.form_data.combined_service_description_two.$invalid) {
                this.show_error_fourteen = true;
                return false;
            }else if (this.v$.form_data.combined_service_description_three.$invalid) {
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
            }else if (this.v$.form_data.crossover_description_two.$invalid) {
                this.show_error_sixteen = true;
                return false;
            }else if (this.v$.form_data.crossover_description_three.$invalid) {
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
            }else {
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
            window.location.assign("/admin/grading");
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
                this.showItemTypeCardBox=true;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Auto Authentication'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=true;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Combined Service'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=true;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Reholder'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=true;
                this.showItemTypeCrossoverBox=false;
            }
            if (this.form_data.itemType == 'Crossover'){
                this.showItemTypeCardBox=false;
                this.showItemTypeAutoAthenticationBox=false;
                this.showItemTypeCombinedServiceBox=false;
                this.showItemTypeReholderBox=false;
                this.showItemTypeCrossoverBox=true;
            }
        },
        shippingMethodsChangeEvent(){
            console.log(this.form_data.shipping_method)
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

        async getEntryItemsList(id){

            let self = this;
            await axios
                .get(`/admin/grading/entry/grade-list/${id}`)
                .then(function (res) {
                    self.form_data.entries = res.data.data.map(entry => self.mapEntry(entry));

                    // Drop selections that are no longer selectable
                    const ids = self.selectableEntries.map(entry => entry.entryItemId);
                    self.selectedIds = self.selectedIds.filter(id => ids.includes(id));
                })
                .catch(function (err) {
                    self.handleError(err);
                });

        },

        async removeItem(id){

            let self = this;
            if (id){
                Swal.fire({
                    // title: "Are the selected product offerings applicable for drop off center: <br> West's Card Edmonton",
                    title: `Are you sure?<br><span style="font-size: 18px;">You won\'t be able to revert this!</span>`,
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: "Yes, remove it!",
                    denyButtonText: `No`,
                    icon: "warning",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    let data = {id:id}
                    if (result.isConfirmed) {
                        axios
                            .post(`/admin/receiving/entry/item/destroy`,data)
                            .then(function (response) {
                                if (response.status == 200){
                                    self.getEntryItemsList(self.item.id);
                                }

                            })
                            .catch(function (err) {
                                try {
                                    self.showValidationError(err);
                                } catch (e) {
                                    self.showSomethingWrong();
                                }
                            });
                    }else if (result.isDismissed){
                        console.log(result.isDismissed)
                        // window.location.href = "/admin/entries";
                    }
                    // else if (result.isDenied) {
                    //     console.log(result.isDenied)
                    //     // Swal.fire("Changes are not saved", "", "info");
                    // }
                });

            }else {
                return;
            }
        }
    },

    computed: {
        selectableEntries(){
            return this.form_data.entries.filter(entry => !this.isGraded(entry));
        },
    },
    watch: {
        selectedIds(newVal){
            this.selectAll = this.selectableEntries.length > 0
                && newVal.length === this.selectableEntries.length;
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
            card_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            card_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            card_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.card_autographed;// return true if this field is required
                }),
            },
            card_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.card_autographed; // return true if this field is required
                }),
            },
            card_estimated_value:{
                required: requiredIf(function () {
                    return this.showItemTypeCardBox // return true if this field is required
                }),
            },
            //item type auto athentication
            auto_authentication_description_one:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeAutoAthenticationBox // return true if this field is required
                }),
            },
            auto_authentication_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.auto_authentication_autographed; // return true if this field is required
                }),
            },
            auto_authentication_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.auto_authentication_autographed; // return true if this field is required
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
            combined_service_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            combined_service_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCombinedServiceBox // return true if this field is required
                }),
            },
            combined_service_authenticator_name:{
                required: requiredIf(function () {
                    return this.form_data.combined_service_autographed; // return true if this field is required
                }),
            },
            combined_service_authenticator_cert_no:{
                required: requiredIf(function () {
                    return this.form_data.combined_service_autographed; // return true if this field is required
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
            crossover_description_two:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
            crossover_description_three:{
                required: requiredIf(function () {
                    return this.showItemTypeCrossoverBox // return true if this field is required
                }),
            },
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


/* ============================================================
   ORDER GRADING - HEADER
   ============================================================ */

.grading-order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 16px;
    padding: 0 4px;
}

/* ============================================================
   ORDER GRADING - TABLE
   ============================================================ */

.grading-table-container {
    background: #eeeeee;
    padding: 14px 15px 17px;
    border-radius: 4px;
}

.grading-table-scroll {
    margin-bottom: 0;
    border-radius: 3px;
    background: #ffffff;
}

.grading-table {
    width: 100%;
    min-width: 1150px;
    border-collapse: collapse;
    background: #ffffff;
}

.grading-table thead {
    background: #5d8fe6;
    color: #ffffff;
}

.grading-table thead th {
    height: 42px;
    padding: 8px 8px;
    font-size: 13px;
    font-weight: 600;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border-right: 1px solid rgba(255, 255, 255, 0.35);
    border-bottom: 0;
}

.grading-table thead th:last-child {
    border-right: 0;
}

.grading-table tbody td {
    padding: 10px 8px;
    font-size: 13px;
    color: #40536a;
    text-align: center;
    vertical-align: middle;
    white-space: normal;
    border-right: 1px solid #eeeeee;
    border-bottom: 1px solid #eeeeee;
}

.grading-table tbody td:last-child {
    border-right: 0;
}

.grading-table tbody tr:nth-child(odd) {
    background-color: #fafafa;
}

.grading-table tbody tr:hover {
    background-color: #f1f5ff;
}

.grading-table .row-graded {
    background-color: #f6fbf7 !important;
}

.grading-table .type-cell {
    font-weight: 600;
    white-space: nowrap;
}

.grading-table .desc-cell {
    min-width: 120px;
    max-width: 200px;
    word-break: break-word;
}

.grading-table .grade-select {
    min-width: 110px;
    height: 34px;
    padding: 4px 28px 4px 8px;
    font-size: 13px;
    border: 1px solid #d0d5db;
    border-radius: 4px;
    color: #40536a;
    background-color: #ffffff;
}

.grading-table .grade-select:focus {
    border-color: #8d9cf7;
    box-shadow: 0 0 0 1px rgba(91, 105, 255, 0.18);
}

.grading-table .select-col {
    width: 95px;
    white-space: nowrap;
}

.grading-table .select-all-label {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin: 0;
    cursor: pointer;
}

.grading-table input[type="checkbox"] {
    width: 15px;
    height: 15px;
    cursor: pointer;
    vertical-align: middle;
}

.grading-table input[type="checkbox"]:disabled {
    cursor: not-allowed;
}

.grading-table .grade-select.grade-invalid {
    border-color: #e5484d;
    box-shadow: 0 0 0 1px rgba(229, 72, 77, 0.2);
}

/* Action buttons */
.action-group {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.action-btn {
    min-width: 34px;
    height: 32px;
    padding: 0 10px;
    border: 0;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: opacity 0.15s ease, transform 0.15s ease;
}

.action-btn:hover {
    opacity: 0.88;
    transform: translateY(-1px);
}

.action-edit {
    background: #5d8fe6;
}

.action-remove {
    background: #e5484d;
}

.action-yes {
    background: #28a745;
    min-width: 46px;
}

/* Badges */
.status-badge {
    display: inline-block;
    min-width: 44px;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status-yes {
    background: #e7f6ec;
    color: #1e8e3e;
}

.status-no {
    background: #f1f3f5;
    color: #6b7280;
}

.status-na,
.text-muted-na {
    color: #9ca3af;
}

/* Confirm All */
.confirm-all-wrap {
    display: flex;
    justify-content: flex-end;
    margin: 16px 0 6px;
}

.confirm-all-btn {
    min-width: 140px;
}

/* ============================================================
   EDIT MODAL - ITEM CARD (same design as Create Entry)
   ============================================================ */

.grading-item-modal .modal-dialog {
    max-width: 1100px;
    width: calc(100% - 30px);
}

.grading-item-modal .modal-content {
    border: 0;
    border-radius: 4px;
    text-align: left;
}

.grading-item-modal .modal-body {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}

.grading-item-modal .modal-footer {
    border-top: 1px solid #e5e7eb;
}

.ksa-entry-ui {
    font-family: Arial, Helvetica, sans-serif;
    color: #40536a;
    background: #ffffff;
    text-align: left;
    white-space: normal;
}

.ksa-entry-ui *,
.ksa-entry-ui *::before,
.ksa-entry-ui *::after {
    box-sizing: border-box;
}

.ksa-entry-ui .item-details-box {
    background: #eeeeee;
    border-radius: 3px;
    padding: 15px 12px 28px;
    min-height: 420px;
}

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

.ksa-entry-ui .autograph-row {
    margin-top: 8px;
    align-items: end;
}

.ksa-entry-ui .autographed-wrapper,
.ksa-entry-ui .certified-wrapper {
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

.ksa-entry-ui .certified-wrapper label {
    margin: 0 12px 0 0;
    font-size: 14px;
    font-weight: 500;
    color: #40536a;
}

.ksa-entry-ui .custom-checkbox {
    width: 15px;
    height: 15px;
    margin: 0;
}

.ksa-entry-ui .reholder-box {
    min-height: 400px;
}

.ksa-entry-ui .reholder-cert-input {
    max-width: 560px;
}

/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 767px) {
    .grading-table-container {
        padding: 10px;
    }

    .grading-order-header h5 {
        font-size: 15px;
    }

    .confirm-all-wrap {
        justify-content: stretch;
    }

    .confirm-all-btn {
        width: 100%;
    }

    .ksa-entry-ui .item-details-box {
        min-height: auto;
    }

    .ksa-entry-ui .quantity-box {
        min-height: 60px;
        margin-bottom: 12px;
    }

    .ksa-entry-ui .quantity-title {
        margin-bottom: 8px;
    }
}

</style>
