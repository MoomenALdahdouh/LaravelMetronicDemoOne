@extends('admin.layout.main')
@section('title','Welcome Page')
@section('description','main')
@section('author','main')
@section('keywords','main')
@section('copyright','main')
@section('css')
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.Form One")}}</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{url("/admin")}}"
                               class="text-muted text-hover-primary">{{__("str.Dashboard")}}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">{{__("str.Form One")}}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div id="kt_ecommerce_edit_form" class="form d-flex flex-column flex-lg-row"
                     data-kt-redirect="">
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form One Part One")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="full_name"
                                           class="required form-label">{{__("str.Full Name")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="full_name" type="text" name="full_name"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="full_name_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="id_number"
                                           class="required form-label">{{__("str.ID number")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="id_number" type="number" name="id_number"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="id_number_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <label for="date_of_birth" class="required form-label">{{__("str.Date of birth")}}</label>
                                    <div class="input-group">
                                        <input type="text" name="date_of_birth" id="date_of_birth"
                                               class="from_date form-control form-control-solid flatpickr-input mb-3 mb-lg-0"
                                               placeholder="{{__("str.Enter Here")}}"
                                               data-provide="datepicker" data-date-format="yyyy-mm-dd" value=""
                                               autocomplete="off">
                                        <span class="input-group-text border-0"><i class="text-dark la la-calendar"></i></span>

                                    </div>
                                    <!--begin::Error-->
                                    <strong id="date_of_birth_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="age"
                                           class="required form-label">{{__("str.Age")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="age" type="number" name="input_data"
                                           class="required text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="age_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="place_of_birth"
                                           class="required form-label">{{__("str.Place of Birth")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="place_of_birth" type="text" name="place_of_birth"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="place_of_birth_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                                <!--begin::Input group-->

                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->

                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form One Part One")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group-->

                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->

                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form One Part One")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group-->

                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->

                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Form One Part One")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group-->

                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->

                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->

                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ url("/admin")}}"
                               id="kt_ecommerce_edit_product_cancel"
                               class="btn btn-light me-5">{{__("str.Cancel")}}</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button id="kt_ecommerce_edit_submit" class="btn btn-primary">
                                <span class="indicator-label">{{__("str.Save Changes")}}</span>
                                <span class="indicator-progress">{{__("str.Please wait...")}}
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/forms/form_one.js') }}" defer></script>
@endsection
