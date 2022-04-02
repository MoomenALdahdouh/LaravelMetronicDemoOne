<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {
        if (auth()->guard("admin")->user()){
            if (auth()->guard("admin")->user()->can("dashboard"))
                return view("admin.index");
            else
                return redirect("admin");
        }
        return redirect("admin");
        //return view("admin.index");
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
