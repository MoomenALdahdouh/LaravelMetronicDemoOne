<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\RolesPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PermissionAdminController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::query()->get();
        //dd($permissions[0]->role_permissions[0]->role);
        if ($request->ajax()) {
            return DataTables::of($permissions)
                ->addColumn('name', function ($permissions) {
                    $path_edit = url("/admin/users/edit/" . $permissions->id);
                    return '<div><a href="#" class="text-gray-600 text-hover-primary mb-1 text-center">' . $permissions->name . $permissions->last_name . '</a>
                                <div class="text-gray-600 text-hover-primary mb-1"><div>' . $permissions->email . '</div></div></div>';
                })
                ->addColumn('assigned_to', function ($permissions) {
                    $permission_roles = "";
                    if (count($permissions->role_permissions) > 0)
                        foreach ($permissions->role_permissions as $l => $permission_role) {
                            $permission_roles = $permission_roles . '<a href="#" class="badge badge-light-primary fs-7 m-1">' . $permission_role->role->name . '</a>';
                        }
                    else
                        $permission_roles = '<div class="text-gray-600"><div>not assigned</div></div>';

                    return $permission_roles;
                })
                ->addColumn('created_at', function ($permissions) {
                    return '<div class="text-center"><div>' . $permissions->created_at . '</div></div>';
                })
                /*->addColumn('action', function ($permissions) {
                    return '<!--begin::Action=-->
								<div class="text-center">
									<!--begin::Update-->
									<button id="edit" data-id="' . $permissions->id . '" data-name="' . $permissions->name . '" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
										<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
										<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
																	<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
																</svg>
															</span>
										<!--end::Svg Icon-->
									</button>
									<!--end::Update-->
									<!--begin::Delete-->
									<button id="delete" data-id="' . $permissions->id . '" data-name="' . $permissions->name . '" class="btn btn-icon btn-active-light-primary w-30px h-30px">
										<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
										<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																	<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																	<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																</svg>
															</span>
										<!--end::Svg Icon-->
									</button>
									<!--end::Delete-->
								</div>
								<!--end::Action=-->';
                })*/
                ->rawColumns(['id'], ['name'], ['assigned_to'], ['created_at'])
                ->escapeColumns(['id' => 'id'], ['name' => 'name'], ['assigned_to' => 'assigned_to'], ['created_at' => 'created_at'])
                ->make(true);
        }
        return view("admin.users.permissions", compact("permissions"));
    }

    public function edit($id)
    {

    }

    public function roles()
    {
        return view("admin.users.roles.list");
    }

    public function roles_view()
    {
        return view("admin.users.roles.view");
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:permissions',
            ], [
                'name.required' => trans("str.Name is required"),
            ]);
            if ($validator->passes()) {
                $data = new Permission();
                $data->name = $request->name;
                $data->guard_name = "admin";
                $data->created_at = Carbon::now();
                $data->save();
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function show($id)
    {
    }


    public function update(Request $request, $id)
    {
        $data = Permission::query()->find($id);
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:permissions',
            ], [
                'name.required' => trans("str.Name is required"),
            ]);
            if ($validator->passes()) {
                $data->name = $request->name;
                $data->guard_name = "admin";
                $data->created_at = Carbon::now();
                $data->save();
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Permission::query()->find($id)->delete();
            $role = RolesPermission::query()->where("permission_id", $id)->delete();
            return response()->json(['success' => "success"]);
        }
        return response()->json(['error' => "error"]);
    }
}
