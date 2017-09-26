<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductImage;
use App\Product;
use Illuminate\Support\Facades\DB;

class AdminUploadController extends Controller
{
    //
    function postImages(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                // set destination path
                $folderDir = 'uploads/products';
                $destinationPath = base_path() . '/' . $folderDir;
                // this form uploads multiple files
                foreach ($request->file('file') as $fileKey => $fileObject ) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        //DB::beginTransaction();
                        try {
                            $imageName = $fileObject->getClientOriginalName();
                            $extension = $fileObject->getClientOriginalExtension();
                            $originalNameWithoutExt = substr($imageName, 0, strlen($imageName) - strlen($extension) - 1);
                            // make destination file name
                            $destinationFileName = time() . $fileObject->getClientOriginalName();
                            // move the file from tmp to the destination path
                            $fileObject->move($destinationPath, $destinationFileName);

                            // save the the destination filename

                            $dbFilenames[$fileKey] = $folderDir .'/'. $destinationFileName;
                            // save table images
                            $prodcuctImage = new ProductImage;
                            $prodcuctImage->product_id = '0';
                            $prodcuctImage->image_path = $folderDir .'/'. $destinationFileName;
                            //$ProdcuctImage->alias = convertTitleToAlias($request->input('txtName'));
                            $prodcuctImage->title = $imageName;
                            $prodcuctImage->alt = $imageName;
                            $flag = $prodcuctImage->save();
                            //DB::commit();
                            $success = true;

                        } catch (\Exception $e) {
                            $msg = $e->getMessage();
                            //DB::rollback();
                            $success = false;

                        }
                        echo 'ra rồi';


                    }
                }

            }
        }
    }
    function _die($array) {
        echo "<pre>";
        var_dump($array);
        echo "<pre>";
        die();
    }
    public function delImages(Request $request)
	{
		$this->_die('123');
	   /* if($request->ajax()) {
	    	//Get image by id or desired parameters
	        $photo = Photo::find($request->photoId);
	        //Check if file exists
	        if(File::exists($destinationPath.$photo->file_name));
	        //Delete file from storage 
	        File::delete($destinationPath.$photo->file_name) ;
	        //Delete file record from DB
	        $photo->delete();  

	        return response('Photo deleted', 200); //return success
	    }
	    */
	}
	function test() {
        try {
            $prodcuctImage = new ProductImage;
            //$prodcuctImage->product_id ='1';
            $prodcuctImage->image_path ='1';
            //$ProdcuctImage->alias = convertTitleToAlias($request->input('txtName'));
            $prodcuctImage->title = '2';
            $prodcuctImage->alt = '3';
            $prodcuctImage->save();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        var_dump($prodcuctImage->save()); die('123');
         $product = new Product;
            $product->name = '1';
            $product->alias = '2';
            $product->desc = '1';
            $product->content = '1';
            $product->price = '2';
            $product->cate_id = '1';
            $product->meta_title = '';
            $product->meta_key = '';
            $product->meta_desc = '';
            $product->save();
        die('ok');
	}
}
