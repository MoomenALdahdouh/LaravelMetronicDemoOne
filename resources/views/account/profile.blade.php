@extends('admin.layout.main')
@section('title',__("Profile"))
@section('description',__("Profile"))
@section('author',__("Profile"))
@section('keywords',__("Profile"))
@section('copyright',__("Profile"))
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.View User Details")}}</h1>
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
                        <li class="breadcrumb-item text-muted">{{__("str.Users")}}</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">{{__("str.View User")}}</li>
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
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card card-flush py-4 mb-10">
                            <!--begin::Card body-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__("str.Avatar")}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <div class="card-body text-center pt-0">
                                <!--begin::Summary-->
                                <!--begin::User Info-->
                                <div class="d-flex flex-center flex-column py-5">
                                    <!--begin::Avatar-->
                                    <div class="">
                                        <!--begin::Label-->
                                        <!--end::Label-->
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-empty image-input-outline mb-3"
                                             data-kt-image-input="true"
                                             style="background-image: url({{asset("uploads/users/".$user->image)}})">
                                            <!--begin::Preview existing avatar-->
                                            <div id="uploaded_image"
                                                 class="image-input-wrapper w-125px h-125px"
                                                 style="background-image: url({{asset("uploads/users/".$user->image)}});"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                   data-kt-image-input-action="change"
                                                   data-bs-toggle="tooltip" title="Change avatar">
                                                <i class="bi bi-pencil-fill fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input id="image_file_input" type="file" name="avatar"
                                                       accept=".png, .jpg, .jpeg"/>
                                                <input type="hidden" name="avatar_remove"/>
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="cancel"
                                                  data-bs-toggle="tooltip" title="Cancel avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                  data-kt-image-input-action="remove"
                                                  data-bs-toggle="tooltip" title="Remove avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="text-muted fs-7">{{__("str.Allowed file types: png, jpg, jpeg.")}}</div>
                                        <!--end::Hint-->
                                    </div>
                                </div>
                                <!--end::User Info-->
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="text-start">
                                    <div class="d-flex flex-stack fs-4 py-3">
                                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                             href="#kt_user_view_details" role="button" aria-expanded="false"
                                             aria-controls="kt_user_view_details">{{__("str.Details")}}
                                            <span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                      fill="black"/>
															</svg>
														</span>
                                                <!--end::Svg Icon-->
													</span></div>
                                        <!--                                        <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                                                      title="Edit customer details">
                                                                                                <a href="#" class="btn btn-sm btn-light-primary"
                                                                                                   data-bs-toggle="modal"
                                                                                                   data-bs-target="#kt_modal_update_details">Edit</a>
                                                                                            </span>-->
                                    </div>
                                    <!--end::Details toggle-->
                                    <div class="separator"></div>
                                    <!--begin::Details content-->
                                    <div id="kt_user_view_details" class="collapse show">
                                        <div class="pb-5 fs-6">
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">{{__("str.Account ID")}}</div>
                                            <div class="text-gray-600">ID-{{$user->id}}</div>
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">{{__("str.Email")}}</div>
                                            <div class="text-gray-600">
                                                <a href="#"
                                                   class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                            </div>
                                            <div class="fw-bolder mt-5">{{__("str.Mobile")}}</div>
                                            <div class="text-gray-600">
                                                <a href="#"
                                                   class="text-gray-600 text-hover-primary">{{$user->mobile}}</a>
                                            </div>
                                            <!--begin::Details item-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tab content-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{__("str.Profile")}}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div id="kt_modal_edit_user" class="card-body pt-0 pb-5">
                                <div id="kt_modal_edit_user_form" data-kt-redirect="">
                                    <!--begin::Scroll-->
                                    <div id="kt_modal_edit_user_scroll">
                                        <!--begin::Input group-->
                                        <input id="user_id" type="hidden" value="{{$user->id}}">
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
                                                       placeholder="{{__("str.Full name")}}" value="{{$user->name}}"/>
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
                                                       placeholder="example@domain.com" value="{{$user->email}}"/>
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
                                                       value="{{$user->mobile}}"/>
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
                                        </div>
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <a href="{{ url("admin/users") }}"
                       id="kt_ecommerce_edit_user_cancel" class="btn btn-light me-5">{{__("str.Cancel")}}</a>
                    <button id="kt_modal_update_user_submit" class="btn btn-primary">
                        <span class="indicator-label">{{__("str.Save Changes")}}</span>
                        <span class="indicator-progress">{{__("str.Please wait...")}}
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
                <!--end::Layout-->
                <!--begin::Modals-->
                <!--begin::Modal - Update user details-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/auth/edit_profile.js') }}" defer></script>
@endsection
