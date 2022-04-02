<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CKEditorController extends Controller
{

    public function uploadImage(Request $request)
    {
        $data = $request->file('file');
        $extension = $data->getClientOriginalExtension();
        $filename = time() . '.' . $extension; // renameing image
        $path = public_path('uploads/ckeditor');
        $usersImage = public_path("uploads/ckeditor/{$filename}"); // get previous image from folder
        $upload_success = $data->move($path, $filename);
        return response()->json(['url' => $upload_success]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $request->file('upload')->move(public_path('uploads/ckeditor'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ckeditor/' . $fileName);
            $msg = 'Image successfully uploaded';
            //$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            //echo $response;
            return response()->json(['url' => $url]);
        }
    }
}
