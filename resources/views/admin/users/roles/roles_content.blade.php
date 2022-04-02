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
                <a href="{{asset("/admin/users-roles/show/".$role->id)}}"
                   class="btn btn-light btn-active-primary my-1 me-2">{{__("str.View Role")}}</a>
                @can("role_delete")
                    <button type="button" data-id="{{$role->id}}"
                            class="btn delete_role btn btn-light btn-active-light-danger my-1"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_delete_role">{{__("str.Delete")}}
                    </button>
                @endcan
                @can("role_edit")
                    <button type="button" class="d-none btn btn-light btn-active-light-primary my-1"
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
