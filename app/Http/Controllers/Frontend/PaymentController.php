<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart;
use Session;
class PaymentController extends Controller
{ 

    public function payment_index()
    {
    	$contents = Cart::content();
        return view('front.pages.payment',compact('contents'));
    }
    public function payment_method_process(Request $request)
    { 

    	//Insert into payment table

    	$payment_data = array(
    		'payment_method' => $request->payment_method,
    		'payment_status' => 0,
    		'payment_date' => date('d/m/Y')
    	);
    	$payment_id = DB::table('tbl_payment')->insertGetId($payment_data); 

    	//Insert into order table

    	$order_data = array(
    		'payment_id' => $payment_id,
    		'customer_id' => Session::get('customer_id'),
    		'shipping_id' =>  Session::get('shipping_id'),
    		'order_total' => Cart::total(),
    		'order_status' => 0
    	);
    	$order_id = DB::table('tbl_order')->insertGetId($order_data);
        Session::put($order_id);

    	//Insert into order details table

    	$contents = Cart::content();
    	foreach ($contents as $c_content) {
    		$order_details = array(
    		'order_id' => $order_id,
    		'payment_id' => $payment_id,
    		'product_id' => $c_content->id,
    		'product_price' =>$c_content->price,
    		'product_sales_quantity' =>$c_content->qty, 
    	);
    		$order_details_data = DB::table('tbl_order_details')->insert($order_details);
    	}
    	if ($order_details_data) {
    		Cart::destroy();
    		Session::flash('success','Order Compeleted !! ');
    		return view('front.pages.thanking-page');
    	}else{
    		Session::flash('error','Order Not Compeleted !! ');
    		return view('front.pages.thanking-page');
    	}
    	
    }

}
