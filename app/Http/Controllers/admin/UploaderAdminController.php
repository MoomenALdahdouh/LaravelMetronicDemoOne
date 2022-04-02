<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploaderAdminController extends Controller
{

    public function image(Request $request)
    {
        if ($request->ajax()) {

            $data = $request->file('file');
            $extension = $data->getClientOriginalExtension();
            $filename = time() . '.' . $extension; // renameing image
            $path = public_path('uploads/categories');
            $usersImage = public_path("uploads/categories/{$filename}"); // get previous image from folder
            $upload_success = $data->move($path, $filename);

            return response()->json([
                'success' => 'success',
                'image' => $filename
            ]);
        }
    }

    public function index()
    {

    }

    public function reply()
    {

    }


    public function compose()
    {

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
