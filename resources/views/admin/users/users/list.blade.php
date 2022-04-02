@extends('admin.layout.main')
@section('title',__("str.Users"))
@section('description',__("str.Users"))
@section('author',__("str.Users"))
@section('keywords',__("str.Users"))
@section('copyright',__("str.Users"))
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.Users List")}}</h1>
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
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">{{__("str.User Management")}}</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">{{__("str.")}}</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">{{__("str.")}}Users List</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!--				<div class="d-flex align-items-center gap-2 gap-lg-3">
                                    &lt;!&ndash;begin::Filter menu&ndash;&gt;
                                    <div class="m-0">
                                        &lt;!&ndash;begin::Menu toggle&ndash;&gt;
                                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            &lt;!&ndash;begin::Svg Icon | path: icons/duotune/general/gen031.svg&ndash;&gt;
                                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                                            </svg>
                                                        </span>
                                            &lt;!&ndash;end::Svg Icon&ndash;&gt;Filter</a>
                                        &lt;!&ndash;end::Menu toggle&ndash;&gt;
                                        &lt;!&ndash;begin::Menu 1&ndash;&gt;
                                        &lt;!&ndash;end::Menu 1&ndash;&gt;
                                    </div>
                                    &lt;!&ndash;end::Filter menu&ndash;&gt;
                                    &lt;!&ndash;begin::Secondary button&ndash;&gt;
                                    &lt;!&ndash;end::Secondary button&ndash;&gt;
                                    &lt;!&ndash;begin::Primary button&ndash;&gt;

                                    &lt;!&ndash;end::Primary button&ndash;&gt;
                                </div>-->
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="black"/>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                              fill="black"/>
													</svg>
												</span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-user-table-filter="search"
                                       class="form-control form-control-solid w-250px ps-14" placeholder="{{__("str.Search user")}}"/>
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <!--								<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    &lt;!&ndash;begin::Svg Icon | path: icons/duotune/general/gen031.svg&ndash;&gt;
                                                                    <span class="svg-icon svg-icon-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                                                                    </svg>
                                                                                </span>
                                                                    &lt;!&ndash;end::Svg Icon&ndash;&gt;Filter</button>
                                                                &lt;!&ndash;begin::Menu 1&ndash;&gt;
                                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                                                    &lt;!&ndash;begin::Header&ndash;&gt;
                                                                    <div class="px-7 py-5">
                                                                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                                                    </div>
                                                                    &lt;!&ndash;end::Header&ndash;&gt;
                                                                    &lt;!&ndash;begin::Separator&ndash;&gt;
                                                                    <div class="separator border-gray-200"></div>
                                                                    &lt;!&ndash;end::Separator&ndash;&gt;
                                                                    &lt;!&ndash;begin::Content&ndash;&gt;
                                                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                                        &lt;!&ndash;begin::Input group&ndash;&gt;
                                                                        <div class="mb-10">
                                                                            <label class="form-label fs-6 fw-bold">Role:</label>
                                                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                                                <option></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                                <option value="Analyst">Analyst</option>
                                                                                <option value="Developer">Developer</option>
                                                                                <option value="Support">Support</option>
                                                                                <option value="Trial">Trial</option>
                                                                            </select>
                                                                        </div>
                                                                        &lt;!&ndash;end::Input group&ndash;&gt;
                                                                        &lt;!&ndash;begin::Input group&ndash;&gt;
                                                                        <div class="mb-10">
                                                                            <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                                                            <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                                                                <option></option>
                                                                                <option value="Enabled">Enabled</option>
                                                                            </select>
                                                                        </div>
                                                                        &lt;!&ndash;end::Input group&ndash;&gt;
                                                                        &lt;!&ndash;begin::Actions&ndash;&gt;
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                                            <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                                                        </div>
                                                                        &lt;!&ndash;end::Actions&ndash;&gt;
                                                                    </div>
                                                                    &lt;!&ndash;end::Content&ndash;&gt;
                                                                </div>
                                                                &lt;!&ndash;end::Menu 1&ndash;&gt;
                                                                &lt;!&ndash;end::Filter&ndash;&gt;
                                                                &lt;!&ndash;begin::Export&ndash;&gt;
                                                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                                                    &lt;!&ndash;begin::Svg Icon | path: icons/duotune/arrows/arr078.svg&ndash;&gt;
                                                                    <span class="svg-icon svg-icon-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                                                                                        <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                                                                                        <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                                                                                    </svg>
                                                                                </span>
                                                                    &lt;!&ndash;end::Svg Icon&ndash;&gt;Export</button>-->
                                <!--end::Export-->
                                <!--begin::Add user-->
                                @can("user_create")
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_user">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                              rx="1" transform="rotate(-90 11.364 20.364)"
                                                              fill="black"/>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                              fill="black"/>
													</svg>
												</span>
                                        <!--end::Svg Icon-->{{__("str.Add User")}}
                                    </button>
                            @endcan
                            <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                 data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>{{__("str.Selected")}}
                                </div>
                                <button type="button" class="btn btn-danger"
                                        data-kt-user-table-select="delete_selected">{{__("str.Delete Selected")}}
                                </button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">{{__("str.Export Users")}}</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                 data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                              height="2" rx="1"
                                                                              transform="rotate(-45 6 17.3137)"
                                                                              fill="black"/>
																		<rect x="7.41422" y="6" width="16" height="2"
                                                                              rx="1" transform="rotate(45 7.41422 6)"
                                                                              fill="black"/>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">{{__("str.Select Roles:")}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="role" data-control="select2"
                                                            data-placeholder="{{__("str.Select a role")}}" data-hide-search="true"
                                                            class="form-select form-select-solid fw-bolder">
                                                        <option></option>
                                                        <option value="Administrator">{{__("str.Administrator")}}</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-5 fw-bold form-label mb-5">{{__("str.Select Export Format:")}}</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select id="type_export_selector" data-control="select2"
                                                            data-placeholder="{{__("str.Select a format")}}"
                                                            data-hide-search="true" name="type"
                                                            class="form-select form-select-solid">
                                                        <option value="0">{{__("str.PDF")}}</option>
                                                        <option value="1">{{__("str.Excel")}}</option>
                                                        <option value="2">{{__("str.CVS")}}</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3"
                                                            data-kt-users-modal-action="cancel">{{__("str.Discard")}}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary"
                                                            data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">{{__("str.Submit")}}</span>
                                                        <span class="indicator-progress">{{__("str.")}}Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add user-->
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">{{__("str.Add User")}}</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                 data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                              height="2" rx="1"
                                                                              transform="rotate(-45 6 17.3137)"
                                                                              fill="black"/>
																		<rect x="7.41422" y="6" width="16" height="2"
                                                                              rx="1" transform="rotate(45 7.41422 6)"
                                                                              fill="black"/>
																	</svg>
																</span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_add_user_form" class="form" action="#">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                     id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                     data-kt-scroll-activate="{default: false, lg: true}"
                                                     data-kt-scroll-max-height="auto"
                                                     data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                     data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                     data-kt-scroll-offset="300px">
                                                    <!--begin::Input group-->
                                                    <div class="fv-row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="d-block fw-bold fs-6 mb-5">{{__("str.Avatar")}}</label>
                                                        <!--end::Label-->
                                                        <!--begin::Image input-->
                                                        <div class="image-input image-input-outline"
                                                             data-kt-image-input="true"
                                                             style="background-image: url({{asset("assets/images/blank.svg")}})">
                                                            <!--begin::Preview existing avatar-->
                                                            <div id="uploaded_image"
                                                                 class="image-input-wrapper w-125px h-125px"
                                                                 style="background-image: url({{asset("assets/images/blank.svg")}});"></div>
                                                            <!--end::Preview existing avatar-->
                                                            <!--begin::Label-->
                                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                   data-kt-image-input-action="change"
                                                                   data-bs-toggle="tooltip" title="{{__("str.Change avatar")}}">
                                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                                <!--begin::Inputs-->
                                                                <input type="file" name="avatar"
                                                                       accept=".png, .jpg, .jpeg"/>
                                                                <input type="hidden" name="avatar_remove"/>
                                                                <!--end::Inputs-->
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Cancel-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                  data-kt-image-input-action="cancel"
                                                                  data-bs-toggle="tooltip" title="{{__("str.Cancel avatar")}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                                            <!--end::Cancel-->
                                                            <!--begin::Remove-->
                                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                  data-kt-image-input-action="remove"
                                                                  data-bs-toggle="tooltip" title="{{__("str.Remove avatar")}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                                            <!--end::Remove-->
                                                        </div>
                                                        <!--end::Image input-->
                                                        <!--begin::Hint-->
                                                        <div class="form-text">{{__("str.Allowed file types: png, jpg, jpeg.")}}</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="row">
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="col-md-6 mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">{{__("str.Full Name")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input id="name" type="text" name="name"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="{{__("str.Full name")}}" value=""/>
                                                            <strong id="name_error" class="errors text-danger"
                                                                    role="alert">
                                                            </strong>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="col-md-6 mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">{{__("str.Email")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input id="email" type="email" name="email"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="example@domain.com" value=""/>
                                                            <strong id="email_error" class="errors text-danger"
                                                                    role="alert">
                                                            </strong>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="col-md-6 mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">{{__("str.Mobile")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input id="mobile" type="tel" name="mobile"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="97846123"
                                                                   value=""/>
                                                            <strong id="mobile_error" class="errors text-danger"
                                                                    role="alert">
                                                            </strong>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="col-md-6 mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">{{__("str.Password")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input id="password" type="password" name="password"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="********" value=""/>
                                                            <strong id="password_error" class="errors text-danger"
                                                                    role="alert">
                                                            </strong>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="col-md-6 mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-2">{{__("str.Confirm Password")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input id="password_confirmation" type="password"
                                                                   name="password_confirmation"
                                                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                                                   placeholder="********" value=""/>
                                                            <strong id="password_confirm_error"
                                                                    class="errors text-danger"
                                                                    role="alert">
                                                            </strong>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-7">
                                                            <!--begin::Label-->
                                                            <label class="required fw-bold fs-6 mb-5">{{__("str.Role")}}</label>
                                                            <!--end::Label-->
                                                            <!--begin::Roles-->
                                                        @foreach($roles as $k=>$role)
                                                            <!--begin::Input row-->
                                                                <div class="d-flex fv-row">
                                                                    <!--begin::Radio-->
                                                                    <div class="form-check form-check-custom form-check-solid">
                                                                        <!--begin::Input-->
                                                                        <input class="radio_roles form-check-input me-3"
                                                                               name="user_role" type="radio"
                                                                               value="{{$role->id}}"
                                                                               data-name="{{$role->name}}"
                                                                               data-id="{{$role->id}}"
                                                                               id="kt_modal_update_role_option_{{$role->id}}"
                                                                                {{$k == 0 ? "checked":""}}/>
                                                                        @if($k == 0)
                                                                            <input id="first_role"
                                                                                   data-id="{{$role->id}}"
                                                                                   data-name="{{$role->name}}"
                                                                                   type="hidden" value="{{$role->id}}">
                                                                    @endif
                                                                    <!--end::Input-->
                                                                        <!--begin::Label-->
                                                                        <label class="form-check-label"
                                                                               for="kt_modal_update_role_option_0">
                                                                            <div class="fw-bolder text-gray-800">
                                                                                {{$role->name}}
                                                                            </div>
                                                                        </label>
                                                                        <!--end::Label-->
                                                                    </div>
                                                                    <!--end::Radio-->
                                                                </div>
                                                                <!--end::Input row-->
                                                                <div class='separator separator-dashed my-5'></div>
                                                                <!--begin::Input row-->
                                                        @endforeach
                                                        <!--end::Roles-->
                                                        </div>
                                                        <strong id="roles_id_error"
                                                                class="errors text-danger"
                                                                role="alert">
                                                        </strong>
                                                        <!--end::Input group-->
                                                    </div>
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                            data-kt-users-modal-action="cancel">{{__("str.Discard")}}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary"
                                                            data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">{{__("str.Submit")}}</span>
                                                        <span class="indicator-progress">{{__("str.Please wait...")}}
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add user-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="">ID</th>
                                <th class="">User</th>
                                <th class="text-center">Joined Date</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/users/users.js') }}" defer></script>
    <script src="{{ asset('assets/js/users/create_user.js') }}" defer></script>
@endsection
