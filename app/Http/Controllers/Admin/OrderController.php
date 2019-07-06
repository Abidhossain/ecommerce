<?php

namespace App\Http\Controllers\Admin; 
use Notification;
use App\Notifications\OrderPlaced;  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Model\Manufacture;
use App\Model\Category;
use App\Model\Product;
use DB;
use Session;
class OrderController extends Controller
{
    public function order_index()
    {
    	$order_info = DB::table('tbl_order')
    				->join('customers','tbl_order.customer_id','=','customers.customer_id')
    				->select('tbl_order.*','customers.name','customers.email')
    				->orderBy('order_id','DESC')
    				->paginate(15);
    	;
    	return view('admin.order_management.order_management',compact('order_info'));
    }
    public function order_confirmation($order_id)
    {
         $get_mail = DB::table('tbl_order')
                     ->where('order_id',$order_id) 
                     ->join('tbl_shipping','tbl_order.order_id','=','tbl_shipping.shipping_id')
                     ->select('tbl_shipping.shipping_email')
                     ->first();
        $order_place = DB::table('tbl_order')
                       ->where('order_id',$order_id)
                       ->update(['order_status' => 1]);
        if($order_place == true){
            $mail_send = Notification::route('mail',$get_mail->shipping_email) 
                    ->notify(new OrderPlaced());
            Session::flash('success',"Order Placed Successfully !!!");
            return redirect()->back();
        }else{
                Session::flash('error','Order Did not Placed Successfully!!!');
                return redirect()->back();
            }
    }
    public function order_view($order_id)
    {
        
    $order_info = DB::table('tbl_order') 
                ->join('customers','tbl_order.customer_id','=','customers.customer_id')
                ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                ->select('tbl_order.*','customers.name','tbl_shipping.*','tbl_order_details.*')
                ->get();
    ;
        // return view('admin.order_management.order_management',compact('order_info'));
    echo "<pre>";
    print_r($order_info);
    echo "</pre>";
    }
}
