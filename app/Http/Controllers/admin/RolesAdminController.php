<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Actions;
use App\Models\AdminPermissions;
use App\Models\AdminRoles;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermissionsActions;
use App\Models\RolesPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RolesAdminController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::query()->get();
        $permissions = Permission::query()->get();
        return view("admin.users.roles.list", compact("roles", "permissions"));
    }

    public function edit(Request $request, $id)
    {
        return view("admin.users.users.view");
    }

    public function roles()
    {
        return view("admin.users.roles.list");
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles',
                'permissions' => 'required',
            ], [
                'name.required' => trans("str.Name is required"),
                'permissions.required' => trans("str.permissions is required"),
            ]);
            //dd($request);
            if ($validator->passes()) {
                $data = new Role();
                $data->name = $request->name;
                $data->guard_name = "admin";
                $data->created_at = Carbon::now();
                $data->save();
                foreach ($request->permissions as $permission) {
                    if ($permission["id"]) {
                        $role_permission = new RolesPermission();
                        $role_permission->permission_id = $permission["id"];
                        $role_permission->role_id = $data->id;
                        foreach ($permission["actions"] as $action) {
                            $role_permission_action = new RolesPermission();
                            $role_permission_action->permission_id = $action;
                            $role_permission_action->role_id = $data->id;
                            $role_permission_action->save();
                            /* switch ($action) {
                                 case 0:
                                     $role_permission->pr_view = 1;
                                     break;
                                 case 1:
                                     $role_permission->pr_create = 1;
                                     break;
                                 case 2:
                                     $role_permission->pr_edit = 1;
                                     break;
                                 case 3:
                                     $role_permission->pr_delete = 1;
                                     break;
                             }*/
                        }
                        $role_permission->save();
                    }
                }
                $roles = Role::query()->get();
                return view("admin.users.roles.roles_content", compact("roles"))->render();
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function show(Request $request, $id)
    {
        $role = Role::query()->find($id);
        $user_roles = $role->admin_roles;
        $permissions = Permission::query()->get();
        //dd($user_roles[0]->users->name);
        if ($request->ajax()) {
            return DataTables::of($user_roles)
                ->addColumn('id', function ($user_roles) {
                    return '<a href="' . url("/admin/users/edit/" . $user_roles->user->id) . '" class="text-gray-600 text-hover-primary mb-1 "><div>ID-' . $user_roles->user->id . '</div></div>';
                })
                ->addColumn('name', function ($user_roles) {
                    return '<div class="d-flex align-items-center">
											<!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<a href="' . url("/admin/users/edit/" . $user_roles->user->id) . '">
													<div class="symbol-label">
														<img src="' . env("assets") . '/uploads/users/' . $user_roles->user->image . '" alt="' . $user_roles->user->name . '" class="w-100">
													</div>
												</a>
											</div>
											<!--end::Avatar-->
											<!--begin::User details-->
											<div class="d-flex flex-column">
												<a href="' . url("/admin/users/edit/" . $user_roles->user->id) . '" class="text-gray-800 text-hover-primary mb-1">' . $user_roles->user->name . $user_roles->user->last_name . '</a>
												<span>' . $user_roles->user->email . '</span>
											</div>
											<!--begin::User details-->
										</div>';
                })
                ->addColumn('created_at', function ($user_roles) {
                    return '<div class="text-center"><div>' . $user_roles->user->created_at . '</div></div>';
                })
                ->addColumn('action', function ($user_roles) {
                    return '<div class="text-center">
                            <div class="btn-group dropstart text-center">
                                  <button type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="svg-icon svg-icon-5 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                      height="24" viewBox="0 0 24 24" fill="none">
									<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                      fill="black"/>
									</svg>
									</span>' . trans("str.Actions") . '
                                  </button>
                                  <div class="dropdown-menu">
                                   <div class="menu-item px-3">
                                            <a href="' . url("/admin/users/edit/" . $user_roles->user->id) . '"
                                               class="menu-link px-3">' . trans("str.Edit") . '</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a id="delete" href="#" data-id="' . $user_roles->user->id . '" data-name="' . $user_roles->user->name . '" class="menu-link px-3">' . trans("str.Delete") . '</a>
                                        </div>
                                  </div>
                            </div>
                        </div>';
                })
                ->rawColumns(['id'], ['name'], ['created_at'], ['action'])
                ->escapeColumns(['id' => 'id'], ['name' => 'name'], ['created_at' => 'created_at'], ['action' => 'action'])
                ->make(true);
        }
        return view("admin.users.roles.view", compact("role", "user_roles", "permissions"));
    }

    public function update(Request $request, $id)
    {
        $data = Role::query()->find($id);
        $user_roles = $data->admin_roles;
        //dd($user_roles[0]->user->admin_permission);
        $old_name = $data->name;
        $validator = "";
        $old_role_permission = RolesPermission::query()->where("role_id", $id)->delete();
        //dd($request);
        if ($request->ajax()) {
            if ($old_name == $request->name) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required:roles',
                    'permissions' => 'required',
                ], [
                    'name.required' => trans("str.Name is required"),
                    'permissions.required' => trans("str.permissions is required"),
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:roles',
                    'permissions' => 'required',
                ], [
                    'name.required' => trans("str.Name is required"),
                    'permissions.required' => trans("str.permissions is required"),
                ]);
            }
            if ($validator->passes()) {
                $data->name = $request->name;
                $data->guard_name = "admin";
                $data->updated_at = Carbon::now();
                $data->save();

                foreach ($request->permissions as $permission) {
                    if ($permission["id"]) {
                        $role_permission = new RolesPermission();
                        $role_permission->permission_id = $permission["id"];
                        $role_permission->role_id = $data->id;
                        foreach ($permission["actions"] as $action) {
                            $role_permission_action = new RolesPermission();
                            $role_permission_action->permission_id = $action;
                            $role_permission_action->role_id = $data->id;
                            $role_permission_action->save();
                            /* switch ($action) {
                                 case 0:
                                     $role_permission->pr_view = 1;
                                     break;
                                 case 1:
                                     $role_permission->pr_create = 1;
                                     break;
                                 case 2:
                                     $role_permission->pr_edit = 1;
                                     break;
                                 case 3:
                                     $role_permission->pr_delete = 1;
                                     break;
                             }*/
                        }
                        $role_permission->save();
                    }
                }

                foreach ($user_roles as $user_role) {
                    $old_permission = AdminPermissions::query()->where("model_id", $user_role->model_id)->delete();
                    foreach ($request->permissions as $permission) {
                        if ($permission["id"]) {
                            $admin_permission = new AdminPermissions();
                            $admin_permission->permission_id = $permission["id"];
                            $admin_permission->model_type = "App\Models\Admin";
                            $admin_permission->model_id = $user_role->model_id;
                            foreach ($permission["actions"] as $action) {
                                $admin_permission_action = new AdminPermissions();
                                $admin_permission_action->permission_id = $action;
                                $admin_permission_action->model_id = $user_role->model_id;
                                $admin_permission_action->model_type = "App\Models\Admin";
                                $admin_permission_action->save();
                            }
                            $admin_permission->save();
                        }
                    }
                }
                $role = Role::query()->find($id);
                return view("admin.users.roles.roles_permissions_item", compact("role"))->render();
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function destroy($id)
    {
        $data = Role::query()->find($id);
        $user_roles = $data->admin_roles;
        foreach ($user_roles as $user_role) {
            $user_permissions = $user_role->user->admin_permission;
            $old_permission = AdminPermissions::query()->where("model_id", $user_role->model_id)->delete();
        }
        $role_per = RolesPermission::query()->where("role_id", $id)->delete();
        $data->delete();
        if ($data) {
            $roles = Role::query()->get();
            return view("admin.users.roles.roles_content", compact("roles"))->render();
        } else
            return response()->json(['error' => 'error']);
    }

    public function destroy_user($role, $user)
    {
        $data = AdminRoles::query()->where("model_id", $user)->where("role_id", $role)->delete();
        if ($data)
            return response()->json(['success' => 'success']);
        else
            return response()->json(['error' => 'error']);
    }
}
