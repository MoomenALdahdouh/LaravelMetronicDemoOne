@extends('admin.layout.main')
@section('title',__("str.Haji Karak"). __("str.Add Category"))
@section('description', __("str.Haji Karak"). __("str.Add Category"))
@section('author', __("str.Haji Karak"). __("str.Add Category"))
@section('keywords', __("str.Haji Karak"). __("str.Add Category"))
@section('copyright', __("str.Haji Karak"). __("str.Add Category"))
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.Add Category")}}</h1>
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
                        <li class="breadcrumb-item text-dark">{{__("str.Add Category")}}</li>
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
                <div id="kt_ecommerce_add_blank_form" class="form d-flex flex-column flex-lg-row"
                     data-kt-redirect="">
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__("str.Thumbnail")}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline mb-3"
                                     data-kt-image-input="true"
                                     style="background-image: url(/assets/media/svg/files/blank-image.svg)">
                                    <!--begin::Preview existing avatar-->
                                    <div id="uploaded_image" class="image-input-wrapper w-150px h-150px"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                           data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                           title="Change avatar">
                                        <!--begin::Icon-->
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--end::Icon-->
                                        <!--begin::Inputs-->
                                        <input id="image_file_input" type="file" name="avatar"
                                               accept=".png, .jpg, .jpeg"/>

                                        <input type="hidden" name="avatar_remove"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                          title="Cancel avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                          data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                          title="Remove avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <strong id="blank_image_error" class="errors text-danger fs-7"></strong>
                                <div class="required text-muted fs-7">{{__("str.Set the blank thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted and size 1M")}}
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__("str.Status")}}</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px"
                                         id="kt_ecommerce_add_blank_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                        data-placeholder="{{__("str.Select an option")}}"
                                        id="kt_ecommerce_add_blank_status_select">
                                    <option></option>
                                    <option value="published" selected="selected">{{__("str.Published")}}</option>
                                    <!--                                    <option value="scheduled">Scheduled</option>-->
                                    <option value="unpublished">{{__("str.Unpublished")}}</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__("str.Set the blank status.")}}</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_blank_status_datepicker"
                                           class="form-label">{{__("str.Select publishing date and time")}}</label>
                                    <input class="form-control" id="kt_ecommerce_add_blank_status_datepicker"
                                           placeholder="Pick date &amp; time"/>
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.General")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{__("str.Category Name (Arabic)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="blank_name" type="text" name="blank_name" class="form-control mb-2"
                                           placeholder="{{__("str.Category name")}}" value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="blank_name_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.A blank name is required and recommended to be  unique.")}}</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{__("str.Category Name (English)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="blank_name_en" type="text" name="blank_name_en"
                                           class="form-control mb-2"
                                           placeholder="{{__("str.Category name")}}" value=""/>
                                    <!--end::Input-->
                                    <!--begin::Error-->
                                    <strong id="blank_name_en_error" class="errors text-danger fs-7"></strong>
                                    <!--end::Error-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.A blank name is required and recommended to be unique.")}}</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <!--begin::Meta options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{__("str.Meta Options")}}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__("str.Meta Tag Title (Arabic)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="meta_title" type="text" class="form-control mb-2" name="meta_title"
                                           placeholder="{{__("str.Meta tag name")}}"/>
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.Set a meta tag title. Recommended to be simple and precise keywords.")}}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__("str.Meta Tag Title (English)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="meta_title_en" type="text" class="form-control mb-2" name="meta_title"
                                           placeholder="{{__("str.Meta tag name")}}"/>
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.Set a meta tag title. Recommended to be simple and precise keywords.")}}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__("str.Meta Tag Description (Arabic)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input id="meta_description" type="text" class="form-control mb-2" name="meta_title"
                                           placeholder="{{__("str.Meta tag Description")}}"/>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.Set a meta tag description to the blank for increased SEO ranking.")}}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">{{__("str.Meta Tag Description (English)")}}</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <input id="meta_description_en" type="text" class="form-control mb-2"
                                           name="meta_title"
                                           placeholder="{{__("str.Meta tag Description")}}"/>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{__("str.Set a meta tag description to the blank for  increased SEO ranking.")}}
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Meta options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ url()->previous() }}"
                               id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{__("str.Cancel")}}</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button id="kt_ecommerce_add_blank_submit" class="btn btn-primary">
                                <span class="indicator-label">{{__("str.Create")}}</span>
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
    <script src="{{ asset('assets/js/blank/create_blank.js') }}" defer></script>
@endsection

