<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class SearchController extends BaseController
{
    /**
     * @param $group, $file
     * @return out requested file contents
     */
    public function index($group, $file)
    {

        //dd(asset("storage/$group/$file"));
        ob_clean();
        $ary = explode(".",$file);
        $ext = $ary[count($ary)-1];
        $size = Storage::size("$group/$file");
        header ('Content-Type: image/'.$ext); 
        header("Content-length: $size"); 
        $contents = Storage::get("$group/$file");
        print($contents);
        return;
        // return Storage::download('file.jpg', $name, $headers);
        return Storage::download("$group/$file");
        // App::setLocale($locale);
        // session()->put('locale', $locale);
        // return redirect()->back();
    }
}

