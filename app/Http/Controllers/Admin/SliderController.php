<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Slider;
use App\Model\Brand;
use DB;
class SliderController extends Controller
{

  //Slider Index Method

    public function index()
    {	
    	$slider_info = DB::table('sliders')->get();
    	return view('admin.slider.slider',compact('slider_info'));
    }


  //Slider Store Method

    public function slider_add_process(Request $request)
    {
    	  if ($request->hasFile('filename')) {
          $files = $request->file('filename');

          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'public/Ecom/Slider/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);  

    	 $data=array();
         $data['filename']    =  $image_url;
         $data['slider_title']    =  $request->slider_title;
            $add_slider = DB::table('sliders')->insert($data);
            if ($add_slider){
                Session::flash('success',"Slider Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Slider Added Faield !!!');
                return redirect()->back();
            }
    	  }
	}

  //Slider Delete Method

     public function slider_delete($slider_id)
    {  
         $pro = DB::table('sliders')
                ->where('slider_id',$slider_id)
                ->first();
         $image_path = $pro->filename;
         if($pro !=''){
            unlink($image_path);
         }
         $delete = DB::table('sliders')
                    ->where('slider_id',$slider_id)
                    ->delete();
         return response()->json();
        
    }

    //Brand Index Method

     public function brand_index()
    {   
        $brand_info = DB::table('brands')->get();
        return view('admin.brand.brand',compact('brand_info'));
    }

    //Brand Store Process Method

     public function brand_add_process(Request $request)
    {
          if ($request->hasFile('filename')) {
          $files = $request->file('filename');

          $extension = $files->getClientOriginalExtension();
          $fileName = str_random(5).".".$extension;
          $folderpath = 'public/Ecom/Brands/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);  

         $data=array();
         $data['filename']    =  $image_url;
         $data['brand_title']    =  $request->brand_title;
            $add_brand = DB::table('brands')->insert($data);
            if ($add_brand){
                Session::flash('success',"Brand Added Completed !!!");
                return redirect()->back();
            }else{
                Session::flash('error','Brand Added Faield !!!');
                return redirect()->back();
            }
          }
    }
    

    //Brand Delete Method

     public function brand_delete($brand_id)
    {  
         $pro = DB::table('brands')
                ->where('brand_id',$brand_id)
                ->first();
         $image_path = $pro->filename;
         if($pro !=''){
            unlink($image_path);
         }
         $delete = DB::table('brands')
                    ->where('brand_id',$brand_id)
                    ->delete();
         return response()->json();
        
    }

}
