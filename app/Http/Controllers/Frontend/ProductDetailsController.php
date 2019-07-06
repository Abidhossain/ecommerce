<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Model\Product; 
use App\Model\Category;  
use App\Model\size;  
use DB;
class ProductDetailsController extends Controller
{
   public function product_details(Request $request)

   {	
	   	$single_product = Product::where('product_id',$request->product_id)->first();  
	   	
	   	$categories = Category::where('category_id',$single_product->category_id)->where('publication_status',1)->get(); 
	   	$sizes = Size::get();
   		return view('front.pages.product_details',compact('single_product','categories','sizes'));
   }

}
