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
                                    <h2>{{__("str.Form Num Part Num")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="row card-body pt-0">
                                <!--begin::Input group RequiredInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="input_data"
                                           class="required form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="input_data" type="text" name="input_data"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group DefaultInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="input_data"
                                           class="form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="input_data" type="text" name="input_data"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group NumberInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="input_data"
                                           class="required form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="input_data" type="number" name="input_data"
                                           class="text-start form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group CalenderInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <label for="from_date" class="required form-label">{{__("str.Title Input")}}</label>
                                    <div class="input-group">
                                        <input type="text" name="from_date" id="from_date"
                                               class="from_date form-control form-control-solid flatpickr-input mb-3 mb-lg-0"
                                               placeholder="{{__("str.Enter Here")}}"
                                               data-provide="datepicker" data-date-format="yyyy-mm-dd" value=""
                                               autocomplete="off">
                                        <span class="input-group-text border-0"><i class="text-dark la la-calendar"></i></span>

                                    </div>
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--end::Input group-->
                                <!--begin::Input group SelectorOneChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="selector"
                                           class="required form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select id="selector" class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="{{__("str.Select an option")}}" data-hide-search="true">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group SelectorMultiChoiceInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                    <!--begin::Label-->
                                    <label for="selector"
                                           class="required form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Select2-->
                                    <select id="selector" class="form-select form-select-solid"
                                            data-control="select2"
                                            data-placeholder="{{__("str.Select an option")}}" data-allow-clear="true"
                                            multiple="multiple">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                    <!--end::Select2-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group CheckBoxInput-->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                                    <!--begin::Label-->
                                    <label for="input_data"
                                           class="required form-label">{{__("str.Title Input")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="input_data" type="text" name="input_data"
                                           class="form-control form-control-solid mb-3 mb-lg-0"
                                           placeholder="{{__("str.Enter Here")}}"
                                           value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="input_data_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="row card-body pt-0">
                                <!--begin::Input group RadioInput-->
                                <div class="row col-sm-12 col-md-12 col-lg-12">
                                    <!--begin::Input group RadioInput-->
                                    <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                        <!--begin::Label-->
                                        <label for="form-check-input"
                                               class="required form-label ">{{__("str.Title Input")}}</label>
                                        <!--end::Label-->
                                        <div class="form-control form-control-solid">
                                            <!--begin::Input row-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="radio_input" type="radio"
                                                           value="1" id="kt_docs_formvalidation_radio_option_1"/>
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                           for="kt_docs_formvalidation_radio_option_1">
                                                        Radio option 1
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="radio_input" type="radio"
                                                           value="2" id="kt_docs_formvalidation_radio_option_2"/>
                                                    <!--end::Input-->

                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                           for="kt_docs_formvalidation_radio_option_2">
                                                        Radio option 2
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group RadioInput-->
                                    <div class="col-sm-12 col-md-6 col-lg-4 mb-10">
                                        <!--begin::Label-->
                                        <label for="form-check-input"
                                               class="required form-label ">{{__("str.Title Input")}}</label>
                                        <!--end::Label-->
                                        <div class="form-control form-control-solid">

                                            <!--begin::Input row-->
                                            <div class="d-flex flex-column fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid mb-5">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="radio_input" type="radio"
                                                           value="1" id="kt_docs_formvalidation_radio_option_1"/>
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                           for="kt_docs_formvalidation_radio_option_1">
                                                        Radio option 1
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->

                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="radio_input" type="radio"
                                                           value="2" id="kt_docs_formvalidation_radio_option_2"/>
                                                    <!--end::Input-->

                                                    <!--begin::Label-->
                                                    <label class="form-check-label"
                                                           for="kt_docs_formvalidation_radio_option_2">
                                                        Radio option 2
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group TextAreaInput-->
                                <div class="row col-sm-12 col-md-12 col-lg-12">
                                    <!--begin::Input group TextAreaInput-->
                                    <div class="col-sm-12 col-md-6 col-lg-6 mb-10">
                                        <!--begin::Label-->
                                        <label for="map_location"
                                               class="required form-label">{{__("str.Title Input")}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea rows="5" id="map_location" type="text"
                                                  name="map_location"
                                                  class="form-control form-control-solid mb-3 mb-lg-0"
                                                  placeholder="{{__("str.Enter Here")}}"></textarea>
                                        <!--end::Input-->
                                        <!--begin::Error-->
                                        <strong id="map_location_error"
                                                class="errors text-danger fs-7"></strong>
                                        <!--end::Error-->

                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group TextAreaInput-->
                                    <div class="col-sm-12 col-md-6 col-lg-6 mb-10">
                                        <!--begin::Label-->
                                        <label for="map_location"
                                               class="required form-label">{{__("str.Title Input")}}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea rows="5" id="map_location" type="text"
                                                  name="map_location"
                                                  class="form-control form-control-solid mb-3 mb-lg-0"
                                                  placeholder="{{__("str.Enter Here")}}"></textarea>
                                        <!--end::Input-->
                                        <!--begin::Error-->
                                        <strong id="map_location_error"
                                                class="errors text-danger fs-7"></strong>
                                        <!--end::Error-->

                                    </div>
                                    <!--end::Input group-->
                                </div>
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
    <script src="{{ asset('assets/js/forms/blank.js') }}" defer></script>
@endsection
