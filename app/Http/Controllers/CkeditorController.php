<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class CkeditorController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ckeditor');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function imgupload(Request $request)
    {
        if($request->hasFile('upload')) {
            $origin_Name = $request->file('upload')->getClientOriginalName();
            $File_Name = pathinfo($origin_Name, PATHINFO_FILENAME);
            $extension_Name = $request->file('upload')->getClientOriginalExtension();
            $File_Name = $File_Name.'_'.time().'.'.$extension_Name;
            $request->file('upload')->move(public_path('uploads/attach'), $File_Name);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/attach/'.$File_Name); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}