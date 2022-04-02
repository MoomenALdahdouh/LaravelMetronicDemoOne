<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AddressTypes;
use App\Models\Admin;
use App\Models\AdminPermissions;
use App\Models\AdminRoles;
use App\Models\Location;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('xc')->only("create");
    }

    public function index(Request $request)
    {
        $users = Admin::query()->latest();
        $roles = Role::query()->get();
        if ($request->ajax()) {
            return DataTables::of($users)
                ->addColumn('id', function ($users) {
                    $path_edit = "#";
                    if (auth()->guard("admin")->user()->can('user_edit'))
                        $path_edit = url("/admin/users/edit/" . $users->id);
                    return '<a href="' . $path_edit . '" class="text-gray-600 text-hover-primary mb-1 "><div>ID-' . $users->id . '</div></div>';
                })
                ->addColumn('name', function ($users) {
                    $path_edit = "#";
                    if (auth()->guard("admin")->user()->can('user_edit'))
                        $path_edit = url("/admin/users/edit/" . $users->id);
                    return '<div class="d-flex align-items-center">
											<!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<a href="' . $path_edit . '">
													<div class="symbol-label">
														<img src="' . asset("uploads/users/" . $users->image) . '" alt="' . $users->name . '" class="w-100">
													</div>
												</a>
											</div>
											<!--end::Avatar-->
											<!--begin::User details-->
											<div class="d-flex flex-column">
												<a href="' . $path_edit . '" class="text-gray-800 text-hover-primary mb-1">' . $users->name . $users->last_name . '</a>
												<span>' . $users->email . '</span>
											</div>
											<!--begin::User details-->
										</div>';
                })
                ->addColumn('created_at', function ($users) {
                    return '<div class="text-center"><div>' . $users->created_at . '</div></div>';
                })
                ->addColumn('roles', function ($users) {
                    if (count($users->role) > 0)
                        foreach ($users->role as $role) {
                            return '<div class="badge badge-light-primary">' . $role->role->name . '</div>';
                        }
                    else
                        return '<div class="text-center text-gray-600"><div>no roles</div></div>';
                })
                ->addColumn('status', function ($users) {
                    switch ($users->status) {
                        case 0:
                            return '<!--begin::Status=-->
                                <div class="text-center"><div class="text-end pe-0" data-order="Inactive">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-danger">Inactive</div>
                                    <!--end::Badges-->
                                </div></div>
                                <!--end::Status=-->';
                        case 1:
                            return '<div class="text-center"><div class="text-end pe-0" data-order="Published">
                                    <!--begin::Badges-->
                                    <div class="badge badge-light-success">Published</div>
                                    <!--end::Badges-->
                                </div></div>';
                    }
                })
                ->addColumn('action', function ($users) {
                    $action = '<div class="text-center">
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
                                  <div class="dropdown-menu">';
                    if (auth()->guard("admin")->user()->can('user_edit'))
                        $action = $action . '<div class="menu-item px-3">
                                            <a href="' . url("/admin/users/edit/" . $users->id) . '" id="edit" data-id="' . $users->id . '"
                                             data-name="' . $users->name . '" class="menu-link px-3">' . trans("str.Edit") . '</a>
                                        </div>';
                    if (auth()->guard("admin")->user()->can('user_delete') && $users->type == 1)
                        $action = $action . '<div class="menu-item px-3">
                                            <a id="delete" href="#" data-id="' . $users->id . '" data-name="' . $users->name . '" class="menu-link px-3">' . trans("str.Delete") . '</a>
                                        </div>';
                    $action = $action . '</div></div></div>';
                    return $action;
                })
                ->rawColumns(['id'], ['name'], ['created_at'], ['roles'], ['status'], ['action'])
                ->escapeColumns(['id' => 'id'], ['name' => 'name'], ['created_at' => 'created_at'], ['roles' => 'roles'], ['status' => 'status'], ['action' => 'action'])
                ->make(true);
        }
        return view("admin.users.users.list", compact("users", "roles"));
    }

    public function edit($id)
    {
        $user = Admin::query()->find($id);
        $roles = Role::query()->get();
        //dd($user);
        //return view("admin.users.users.user_item", compact("user", "roles"))->render();
        return view("admin.users.users.view", compact("user", "roles"));
    }

    public function roles()
    {
        return view("admin.users.roles.list");
    }

    public function roles_view()
    {
        return view("admin.users.roles.view");
    }

    public function permissions()
    {
        return view("admin.users.permissions");
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string:admins,name|max:255',
                'email' => 'required|string|unique:admins,email|max:255',
                'mobile' => 'required|int|unique:admins,mobile|digits:8',
                'roles_id' => 'required',
                'password' => 'string|min:8|confirmed',
            ]);
            if ($validator->passes()) {
                $data = new Admin();
                $image = uniqid() . '.jpg';
                $image_path = env("asset_url") . "/uploads/users/" . $image;
                file_put_contents($image_path, base64_decode($request->customer_image));
                $data->image = $image;
                $data->id = time();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->mobile = $request->mobile;
                $data->password = Hash::make($request->password);
                $data->status = 1;
                $data->roles_id = $request->roles_id;
                $data->roles_name = $request->roles_name;
                $data->created_at = Carbon::now();
                $data->updated_at = Carbon::now();
                $data->save();
                $data->assignRole($request->roles_id);
                $role = Role::query()->find($request->roles_id);
                foreach ($role->role_permissions as $permission) {
                    $user_permi = new AdminPermissions();
                    $user_permi->permission_id = $permission->permission_id;
                    $user_permi->model_type = "App\Models\Admin";
                    $user_permi->model_id = $data->id;
                    $user_permi->save();
                }
                /*$admin_role = new AdminRoles();
                $admin_role->role_id = $request->roles_id;
                $admin_role->model_id = $data->id;
                $admin_role->model_type = "App\Models\Admin";
                $admin_role->save();*/
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function show($id)
    {
        $customer = Admin::query()->find($id);
        return $customer;
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Admin::query()->find($id);
            $old_email = $data->email;
            $old_mobile = $data->mobile;
            $old_image = env("asset_url") . "/uploads/users/" . $data->image;
            $validator = [];
            if ($request->password) {
                if (($old_email != $request->email) && $request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'roles_id' => 'required',
                        'password' => 'string|min:8|confirmed',
                    ]);
                } else if (($old_mobile != $request->mobile) && $request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                        'roles_id' => 'required',
                    ]);
                } else if (!$request->mobile && !$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                        'password' => 'string|min:8|confirmed',
                    ]);
                } else if (!$request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                    ]);
                }
            } else {
                if (($old_email != $request->email) && $request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else if (($old_mobile != $request->mobile) && $request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                    ]);
                } else if (!$request->mobile && !$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'roles_id' => 'required',
                    ]);
                }
            }
            if ($validator->passes()) {
                if (!str_contains($request->user_image, env("APP_URL"))) {
                    unlink($old_image);
                    $image = uniqid() . '.jpg';
                    $image_path = env("asset_url") . "/uploads/users/" . $image;
                    file_put_contents($image_path, base64_decode($request->user_image));
                    $data->image = $image;
                }
                /*$image = uniqid() . '.jpg';
                $image_path = env("asset_url") . "/uploads/users/" . $image;
                file_put_contents($image_path, base64_decode($request->user_image));
                $data->image = $image;*/
                $data->name = $request->name;
                $data->last_name = $request->last_name;
                $data->email = $request->email;
                $data->mobile = $request->mobile;
                $data->status = 1;
                $data->updated_at = Carbon::now();
                if ($request->password) {
                    $data->password = Hash::make($request->password);
                }
                $data->save();
                $old_roles = AdminRoles::query()->where("model_id", $id)->delete();
                $old_permissions = AdminPermissions::query()->where("model_id", $id)->delete();
                $role = Role::query()->find($request->roles_id);
                $data->assignRole($request->roles_id);
                foreach ($role->role_permissions as $permission) {
                    $user_permi = new AdminPermissions();
                    $user_permi->permission_id = $permission->permission_id;
                    $user_permi->model_type = "App\Models\Admin";
                    $user_permi->model_id = $id;
                    $user_permi->save();
                }
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function destroy($id)
    {
        $data = Admin::query()->find($id)->delete();
        if ($data)
            return response()->json(['success' => 'success']);
        else
            return response()->json(['error' => 'error']);
    }
}
