<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUploadController extends Controller
{
    //
    function postImages(Request $request)
    {
        echo '123';die();
        $image = $request->file('file');
        var_dump($image);
    }
}
