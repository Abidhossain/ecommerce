<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Model\Manufacture;
use App\Model\Product; 
use App\Model\Category;  
use DB;
class CartController extends Controller
{
  
  //Cart Show Method
  
    public function show_cart()
    { 
      $contents = Cart::content(); 
      return view('front.pages.show-cart',compact('contents'));
    }

  //Cart Storage Method

  	public function product_add(Request $request)
  	{ 
    		$cart_item = Cart::add([
    			'id'        => $request->id,
    			'name'      => $request->name,
    			'qty'       => $request->quantity,
    			'price'     => $request->price, 
    			 'weight'   => 'Null',  
           'options'  => [
              'image' => $request->image,
              'code'  => $request->code,
              'size'  => $request->size,
           ],   
    			]);
        if ($cart_item) {
           notify()->success('Product Successfully Added To The Shopping Cart!!');
          return Redirect::to('/show-cart');
           // return $cart_item;
        }else{
          return redirect()->back();
        }
  	}

    //Cart Update Method

    public function update_cart_process(Request $request)
    { 
      $qty = $request->qty;
      $rowId = $request->rowId;
      $update = Cart::update($rowId , $qty);
          return redirect()->back();
    }

    //Cart Remove Method

    public function cart_destroy($rowId)
    {
     Cart::update($rowId,0);
        return redirect()->back();
    }
}

