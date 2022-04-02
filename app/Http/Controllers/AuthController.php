<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::guard('web')->user())
            return redirect("/");
        return view("admin.auth.sign-in");
    }

    public function edit_profile(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = User::query()->find($id);
            $old_mobile = $data->mobile;
            $validator = [];
            if ($request->mobile && ($old_mobile != $request->mobile)) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string:users,name|max:255',
                    'last_name' => 'required|string:users,last_name|max:255',
                    'mobile' => 'required|int|unique:users,mobile|digits:8',
                ]);
            } else if (!$request->mobile) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string:users,name|max:255',
                    'last_name' => 'required|string:users,last_name|max:255',
                    'mobile' => 'required|int|unique:users,mobile|digits:8'
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string:users,name|max:255',
                    'last_name' => 'required|string:users,last_name|max:255',
                ]);
            }
            if ($validator->passes()) {
                $data->name = $request->name;
                $data->last_name = $request->last_name;
                $data->mobile = $request->mobile;
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

    public function edit_password(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = User::query()->find($id);
            $old_password = Hash::check($request->old_password, $data->password);
            $validator = [];
            if ($old_password) {
                $validator = Validator::make($request->all(), [
                    'old_password' => 'required',
                    'password' => 'required|string|min:8|confirmed',
                ]);
                if ($validator->passes()) {
                    $data->updated_at = Carbon::now();
                    $data->password = Hash::make($request->password);
                    $data->save();
                    return response()->json(['success' => $data]);
                }
                return response()->json(['error' => $validator->errors()->toArray()]);
            }
            return response()->json(['error' => ["old_password" => "The old password does not match"]]);
        }
    }

    public function reset_password(Request $request)
    {
        if ($request->ajax()) {
            //dd($request);
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ], [
                'email.required' => trans("str.Email is required")
            ]);
            if ($validator->passes()) {
                $user = User::query()->where("email", $request->email)->get()->first();
                if ($user)
                    return response()->json(['success' => "success"]);
                else
                    return response()->json(['error' => ["email" => "the email not assigned!"]]);
            }
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function confirm($id)
    {
        $user = User::query()->where("reset_password", $id)->get()->first();
        if ($user)
            return view("auth_site.reset-password", compact("user"));
        else
            return view("errors.404");
    }

    public function reset(Request $request, $id)
    {
        $user = User::query()->find($id);
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->passes()) {
            $user->password = Hash::make($request->password);
            $user->reset_password = "";
            $user->save();
            return response()->json(['success' => "success register"]);
        } else {
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect("/");
        //return redirect("/", compact("our_message", "our_story", "galleries", "products", "categories"));
    }

    public function account()
    {
        $user = auth()->guard("web")->user();
        return view('auth_site.my-account');
    }

    public function login(Request $request)
    {
        $validator = null;
        if (is_numeric($request->email)) {
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|int|exists:users,mobile|digits:8',
                'password' => 'required|string:users,password|min:8',
            ], [
                'mobile.required' => trans('Mobile required'),
                'password.required' => trans('Password required'),
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|exists:users,email|max:255',
                'password' => 'required|string:users,password|min:8',
            ], [
                'email.required' => trans('Email required'),
                'password.required' => trans('Password required'),
            ]);
        }
        if ($validator->passes()) {
            $validator_auth = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);
            if ($validator_auth) {
                return response()->json(['success' => "success sign"]);
            } else {
                $validator_auth = Auth::guard('web')->attempt(['mobile' => $request->mobile, 'password' => $request->password]);
                if ($validator_auth)
                    return response()->json(['success' => "success sign"]);
                else
                    return response()->json(['error_sing_in' => "The password is not correct!"]);
            }
        } else {
            return response()->json(['error' => $validator->errors()->toArray()]);
        }
    }

    public function check()
    {
        //dd(Auth::guard()->user());
        if (Auth::guard('web')->user())
            return response()->json(['success' => "success"]);
    }


    public function redirect()
    {
        $previous_url = URL::previous();
        return redirect($previous_url);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string:users,name|max:255',
            'last_name' => 'required|string:users,last_name|max:255',
            'email' => 'required|string|unique:users,email|max:255',
            'mobile' => 'required|int|unique:users,mobile|digits:8',
            'password' => 'required|string|min:8|confirmed',
            'accept_conditions' => 'required',
        ]);
        if ($validator->passes()) {
            $user = User::query()->create([
                'id' => time(),
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'condition_status' => 1,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            if ($user) {
                $validator_auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                if ($validator_auth)
                    return response()->json(['success' => "success register"]);
            } else {
                $validator_auth = Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password]);
                if ($validator_auth)
                    return response()->json(['success' => "success register"]);
                else
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


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
