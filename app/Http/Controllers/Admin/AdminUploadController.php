<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUploadController extends Controller
{
    //
    function postImages(Request $request)
    {
        if ($request->ajax()) {
            try {
                if ($request->hasFile('file')) {
                    $imageFiles = $request->file('file');
                    // set destination path
                    $destinationPath = base_path() . '/uploads/products/';
                    // this form uploads multiple files
                    foreach ($request->file('file') as $fileKey => $fileObject ) {

                        // make sure each file is valid
                        if ($fileObject->isValid()) {

                            // make destination file name
                            $destinationFileName = time().$fileObject->getClientOriginalName();
                           // $destinationFileName = $imageName . $fileObject->getClientOriginalExtension();

                            // move the file from tmp to the destination path
                            $fileObject->move($destinationPath, $destinationFileName);

                            // save the the destination filename
                            $dbFilenames[$fileKey] = $destinationPath . '/' . $destinationFileName;

                        }
                    }
                    $this->_die($dbFilenames);
                    //$extension = $imageFile->getClientOriginalExtension();
                    //$originalNameWithoutExt = substr($imageName, 0, strlen($imageName) - strlen($extension) - 1);

                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        }
        echo 'eo vao';die();
    }
    function _die($array) {
        echo "<pre>";
        var_dump($array);
        echo "<pre>";
        die();
    }
}
