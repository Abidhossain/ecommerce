<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Model\Manufacture;
use App\Model\Category;
use App\Model\Product;
use DB;
use Session;
class ProductController extends Controller
{
   
      // ------------------ Product List Method Here ----------------- //

    public function product_list()
    {
        $manufacture_name = DB::table('manufactures')
                           ->select('manufacture_id','manufacture_name')
                           ->get();
        $category_name = DB::table('categories')
                        ->select('category_id','category_name')
                        ->get();

        $size_name = DB::table('sizes')
                        ->select('size_id','product_size')
                           ->where('publication_status',1)
                        ->get();
        $product_list = DB::table('products')
                        ->orderBy('category_id') 
                        ->paginate(8);
        return view('admin.product.product_list',compact('product_list','manufacture_name','category_name','size_name'));
    }

      // ------------------ Product Add Method Here ----------------- //


    public function product_add()
    {
        $category_name = DB::table('categories')
                        ->select('category_id','category_name')
                        ->where('publication_status',1)
                        ->get();
        $size_name = DB::table('sizes')
                        ->select('size_id','product_size')
                           ->where('publication_status',1)
                        ->get();
        $manufacture_name = DB::table('manufactures')
                           ->select('manufacture_id','manufacture_name')
                           ->where('publication_status',1)
                           ->get(); 
        return view('admin.product.product_add',compact('manufacture_name','category_name','size_name'));
    }

    public function product_add_process(Request $request)
    {
    	 $check_validatoin = $request->validate([
            'product_name'    => 'required',
            'product_code'     => 'required',
            'category_id'     => 'required',
            'manufacture_id'  => 'required',
            'product_size'    => 'required', 
            'long_desc'       => 'required', 
            'short_desc'      => 'required',
            'product_image'   => 'image|mimes:jpeg,png,jpg'
        ]);  

        /*---Photo Upload----*/

         if ($request->hasFile('product_image')) {
          $files = $request->file('product_image');

          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'public/Ecom/Product/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName); 
         $data=array();
         $data['product_name']     = $request->product_name;
         $data['product_code']     = $request->product_code;
         $data['category_id']      = $request->category_id;
         $data['manufacture_id']   = $request->manufacture_id;
         $data['product_size']     = implode(',',$request->product_size);
         $data['long_desc']        = $request->long_desc;
         $data['short_desc']       = $request->short_desc;
         $data['price']            = $request->price;
         $data['product_image']    =  $image_url;
            $add_product = DB::table('products')->insert($data);
            if ($add_product){
                Session::flash('success',"Product Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Product Added Faield !!!');
                return redirect()->back();
            }
         }

    }

      // ------------------ Product Edit Method Here ----------------- //

    public function product_edit($product_id)
    {
        $product_info = DB::table('products')->where('product_id',$product_id)->first();
        return response()->json($product_info);
    }


      // ------------------ Product Update Method Here ----------------- //

    public function product_update(Request $request)
    {
         $check_validatoin = $request->validate([
            'product_name'    => 'required',
            'product_code'    => 'required',
            'category_id'     => 'required',
            'manufacture_id'  => 'required',
            'product_size'    => 'required', 
            'long_desc'       => 'required', 
            'short_desc'      => 'required', 
        ]);   
         if ($request->product_image !=''){
              $img_url = DB::table('products')
                        ->where('product_id',$request->product_id)
                        ->first();
             $image_path = $img_url->product_image;
             if($img_url !=''){
                unlink($image_path);
            }
                     $files = $request->file('product_image'); 
          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'public/Ecom/Product/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName); 
 
         $data=array();
         $data['product_name']     = $request->product_name;
         $data['product_code']     = $request->product_code;
         $data['category_id']      = $request->category_id;
         $data['manufacture_id']   = $request->manufacture_id;
         $data['product_size']     = $request->product_size;
         $data['long_desc']        = $request->long_desc;
         $data['short_desc']       = $request->short_desc;
         $data['price']            = $request->price;
         $data['product_image']    =  $image_url;
             $add_product = DB::table('products')
                            ->where('product_id',$request->product_id)
                            ->update($data);
        if ($add_product){
            Session::flash('success',"Product Updated Completed !!!");
            return redirect()->back();
        }else{
            Session::flash('error','Product Update Failed !!!');
            return redirect()->back();
        } 

         }else{

         $data=array();
         $data['product_name']     = $request->product_name;
         $data['product_code']     = $request->product_code;
         $data['category_id']      = $request->category_id;
         $data['manufacture_id']   = $request->manufacture_id;
         $data['product_size']     = $request->product_size;
         $data['long_desc']        = $request->long_desc;
         $data['short_desc']       = $request->short_desc;
         $data['price']            = $request->price; 
            $add_product = DB::table('products')
                        ->where('product_id',$request->product_id)
                        ->update($data);
            if ($add_product){
                Session::flash('success',"Product Updated Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Product Update Failed !!!');
                return redirect()->back();
            }
         } 
       
    }
      // ------------------ Product Delete Method Here ----------------- //

    public function product_delete($product_id)
    {  
         $pro = DB::table('products')
                ->where('product_id',$product_id)
                ->first();
         $image_path = $pro->product_image;
         if($pro !=''){
            unlink($image_path);
         }
         $delete = DB::table('products')
                    ->where('product_id',$product_id)
                    ->delete();
         return response()->json();
        
    }
}



     