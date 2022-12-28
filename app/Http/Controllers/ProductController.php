<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * show form
     *
     */
    public function index()
    {
        return view('products.home');
    }


    /**
     * upload image from ckeditor
     *
     * @param Request $request
     */
    public function uploadImage(Request $request)
    {
        //check if an image file is uploaded
        if($request->hasFile('upload'))
        {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
            
        }
    }



    /**
     * Store data in database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        Product::create($datas);
        return redirect(route('product.index'))->with('flash_message','New Product Added !');
    }


    public function all()
    {
        $products = Product::latest()->get();

        return view('products.all',compact('products'));
    }
}
