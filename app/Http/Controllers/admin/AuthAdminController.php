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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthAdminController extends Controller
{

    public function index()
    {
        if (Auth::guard("admin")->user())
            return redirect("/dashboard");
        return view("admin.auth.sign-in");
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->back();
    }

    public function account()
    {
        $user = auth()->guard("admin")->user();
        return view("admin.account.profile", compact("user"));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|exists:admins,email|max:255',
            'password' => 'required|string:admins,password|min:8',
        ], [
            'email.required' => trans('email required'),
            'password.required' => trans('password required'),
        ]);
        if ($validator->passes()) {
            $validator_auth = Auth::guard("admin")->attempt(['email' => $request->email, 'password' => $request->password]);
            if ($validator_auth) {
                return response()->json(['success' => "success sign"]);
            } else {
                // Go back on error (or do what you want)
                return response()->json(['error_sing_in' => "The password is not correct!"]);
            }
        } else {
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function check()
    {
        //dd(Auth::guard()->user());
        if (Auth::guard("admin")->user())
            return response()->json(['success' => "success"]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => time(),
            'name' => 'required|string:admins,name|max:255',
            'last_name' => 'required|string:admins,last_name|max:255',
            'email' => 'required|string|unique:admins,email|max:255',
            'mobile' => 'required|string|unique:admins,mobile|max:8',
            'password' => 'required|string|min:8|confirmed',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]/*, [
            'name.required' => trans('Req name'),
            'last_name.required' => trans('Req last_name'),
            'email.required' => trans('Req email'),
            'mobile.required' => trans('Req mobile'),
            'password.required' => trans('Req password'),
        ]*/);
        if ($validator->passes()) {
            $user = Admin::query()->create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);
            if ($user) {
                $validator_auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if ($validator_auth)
                    return response()->json(['success' => "success register"]);
            } else {
                return response()->json(['error' => "failed register"]);
            }
        } else {
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::query()->find(auth()->guard("admin")->user()->id);
            $old_email = $data->email;
            $old_mobile = $data->mobile;
            $old_image = env("asset_url") . "/uploads/users/" . $data->image;
            $validator = [];
            if ($request->password) {
                if (($old_email != $request->email) && $request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'password' => 'string|min:8|confirmed',
                    ]);
                } else if (($old_mobile != $request->mobile) && $request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                    ]);
                } else if (!$request->mobile && !$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                        'password' => 'string|min:8|confirmed',
                    ]);
                } else if (!$request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                    ]);
                }
            } else {
                if (($old_email != $request->email) && $request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else if (($old_mobile != $request->mobile) && $request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8',
                    ]);
                } else if (!$request->mobile && !$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->mobile) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'mobile' => 'required|int|unique:admins,mobile|digits:8'
                    ]);
                } else if (!$request->email) {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
                        'email' => 'required|string|unique:admins,email|max:255',
                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|string:admins,name|max:255',
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
                return response()->json(['success' => $data]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
