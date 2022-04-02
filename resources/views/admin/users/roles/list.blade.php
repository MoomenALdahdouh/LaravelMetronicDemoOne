@extends('admin.layout.main')
@section('title',__("str.Roles"))
@section('description',__("str.Roles"))
@section('author',__("str.Roles"))
@section('keywords',__("str.Roles"))
@section('copyright',__("str.Roles"))
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("str.Roles List")}}</h1>
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
                        <li class="breadcrumb-item text-muted">{{__("str.Roles")}}</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-dark">{{__("str.Roles List")}}</li>
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
                <!--begin::Row-->
                <div id="roles_content" class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                @foreach($roles as $role)
                    <!--begin::Col-->
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{$role->name}}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-1">
                                    <!--begin::Users-->
                                    <div class="fw-bolder text-gray-600 mb-5">{{__("str.Total users with this")}}
                                        role: {{count($role->admin_roles)}}</div>
                                    <!--end::Users-->
                                    <!--begin::Permissions-->
                                    <div class="d-flex flex-column text-gray-600">
                                        @foreach($role->role_permissions as $c=>$role_permission)
                                            @if(!str_contains($role_permission->permission->name,"_"))
                                                <div class="d-flex align-items-center py-2">

                                                    <span class="bullet bg-primary me-3"></span>{{$role_permission->permission->name}}
                                                </div>
                                            @endif
                                            @if($c == 3)
                                                <div class='d-flex align-items-center py-2'>
                                                    <span class='bullet bg-primary me-3'></span>
                                                    <em>{{__("str.and")}} {{count($role->role_permissions) - 3}} {{__("str.more...")}}</em>
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <!--end::Permissions-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer flex-wrap pt-0">
                                    @can("role_view")
                                    <a href="{{url("admin/users-roles/show/".$role->id)}}"
                                       class="btn btn-light btn-active-primary my-1 me-2">{{__("str.View Role")}}</a>
                                    @endcan
                                    @can("role_delete")
                                        <button type="button" data-id="{{$role->id}}"
                                                class="btn delete_role btn btn-light btn-active-light-danger my-1">
                                            {{__("str.Delete")}}
                                        </button>
                                    @endcan
                                    @can("role_edit")
                                        <button data-id="{{$role->id}}" type="button"
                                                class="d-none kt_modal_edit_role btn btn-light btn-active-light-primary my-1"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">{{__("str.Edit Role")}}
                                        </button>
                                    @endcan
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                @endforeach
                <!--begin::Add new card-->
                    @can("role_create")
                    <div class="col-md-4">
                        <!--begin::Card-->
                        <div class="card h-md-100">
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-center">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                    <!--begin::Illustration-->
                                    <img src="{{asset("assets/images/4.png")}}" alt=""
                                         class="mw-100 mh-150px mb-7"/>
                                    <!--end::Illustration-->
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">{{__("str.Add New Role")}}</div>
                                    <!--end::Label-->
                                </button>
                                <!--begin::Button-->
                            </div>
                            <!--begin::Card body-->
                        </div>
                        <!--begin::Card-->
                    </div>
                    <!--begin::Add new card-->
                </div>
                @endcan
                <!--end::Row-->
                <!--begin::Modals-->
                <!--begin::Modal - Add role-->
                <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">{{__("str.Add a Role")}}</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                     data-kt-roles-modal-action="close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                                  rx="1" transform="rotate(-45 6 17.3137)"
                                                                  fill="black"/>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                  transform="rotate(45 7.41422 6)" fill="black"/>
														</svg>
													</span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-lg-5 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_role_form" class="form" action="#">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                         data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                         data-kt-scroll-max-height="auto"
                                         data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                         data-kt-scroll-wrappers="#kt_modal_add_role_scroll"
                                         data-kt-scroll-offset="300px">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bolder form-label mb-2">
                                                <span class="required">{{__("str.Role name")}}</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input id="permission_name_create" class="form-control form-control-solid"
                                                   placeholder="Enter a role name" name="role_name"/>
                                            <!--end::Input-->
                                            <strong id="name_error" class="errors text-danger"
                                                    role="alert"></strong>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Permissions-->
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bolder form-label mb-2">{{__("str.Role Permissions")}}</label>
                                            <strong id="permissions_error" class="errors text-danger"
                                                    role="alert"></strong>
                                            <!--end::Label-->
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                    <!--begin::Table body-->
                                                    <tbody class="text-gray-600 fw-bold">
                                                    <!--begin::Table rows-->
                                                    <tr>
                                                        <td class="text-gray-800">{{__("str.Administrator Access")}}
                                                            <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                               data-bs-toggle="tooltip" title=""
                                                               data-bs-original-title="Allows a full access to the system"
                                                               aria-label="Allows a full access to the system"></i></td>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-custom form-check-solid me-9">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                       id="kt_roles_select_all">
                                                                <span class="form-check-label"
                                                                      for="kt_roles_select_all">{{__("str.Select all")}}</span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                    </tr>
                                                    <!--end::Table row-->
                                                    <!--begin::Table rows-->
                                                    @foreach($permissions as $permission)
                                                        @if(!str_contains($permission->name,"_"))
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">{{$permission->name}}</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input data-id="{{$permission->id}}"
                                                                                   class="action_permission_selected form-check-input"
                                                                                   type="checkbox"
                                                                                   value="@foreach ($permissions as $sub_permission)
                                                                                   @if(str_contains($sub_permission->name,$permission->name) && str_contains($sub_permission->name,"view"))
                                                                                   {{$sub_permission->id}} @break
                                                                                   @endif
                                                                                   @endforeach"
                                                                                   name="user_management_view">
                                                                            <span class="form-check-label">{{__("str.View")}}</span>
                                                                        </label>
                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input data-id="{{$permission->id}}"
                                                                                   class="action_permission_selected form-check-input"
                                                                                   type="checkbox"
                                                                                   value="@foreach ($permissions as $sub_permission)
                                                                                   @if(str_contains($sub_permission->name,$permission->name) && str_contains($sub_permission->name,"create"))
                                                                                   {{$sub_permission->id}} @break
                                                                                   @endif
                                                                                   @endforeach"
                                                                                   name="user_management_create">
                                                                            <span class="form-check-label">{{__("str.Create")}}</span>
                                                                        </label>
                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input data-id="{{$permission->id}}"
                                                                                   class="action_permission_selected form-check-input"
                                                                                   type="checkbox"
                                                                                   value="@foreach ($permissions as $sub_permission)
                                                                                   @if(str_contains($sub_permission->name,$permission->name) && str_contains($sub_permission->name,"edit"))
                                                                                   {{$sub_permission->id}} @break
                                                                                   @endif
                                                                                   @endforeach"
                                                                                   name="user_management_edit">
                                                                            <span class="form-check-label">{{__("str.Edit")}}</span>
                                                                        </label>
                                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input data-id="{{$permission->id}}"
                                                                                   class="action_permission_selected form-check-input"
                                                                                   type="checkbox"
                                                                                   value="@foreach ($permissions as $sub_permission)
                                                                                   @if(str_contains($sub_permission->name,$permission->name) && str_contains($sub_permission->name,"delete"))
                                                                                   {{$sub_permission->id}} @break
                                                                                   @endif
                                                                                   @endforeach"
                                                                                   name="user_management_delete">
                                                                            <span class="form-check-label">{{__("str.Delete")}}</span>
                                                                        </label>
                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                        @endif
                                                        <!--begin::Table row-->
                                                    @endforeach
                                                    <!--begin::Table rows-->
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table wrapper-->
                                        </div>
                                        <!--end::Permissions-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                                data-kt-roles-modal-action="cancel">{{__("str.Discard")}}
                                        </button>
                                        <button type="submit" class="btn btn-primary"
                                                data-kt-roles-modal-action="submit">
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
                <!--end::Modal - Add role-->
                <!--begin::Modal - Update role-->

                <!--end::Modal - Update role-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <!--end::Content-->
@endsection
@section('js')
    <script src="{{ asset('assets/js/roles/list/add.js') }}" defer></script>
    <!--    <script src="{{ asset('assets/js/roles/list/update_role.js') }}" defer></script>-->
@endsection
