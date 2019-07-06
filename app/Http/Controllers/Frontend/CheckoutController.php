<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Model\Product;   
use App\Model\Customer;
use DB;
use Cart;
use Session;
class CheckoutController extends Controller
{
    
	//Login Page

    public function login_index()
    {
    	if (Session::get('customer_id') == true) {
    		return redirect('home');
    	}else{
    		return view('front.pages.login-register');
    	}
    }

	//Customer Register Process

    public function customer_registration_process(Request $request)
    {
    	 $check_validatoin = $request->validate([
            'name'    		=> 'required',
            'phone'  		=> 'required|unique:customers',
            'email'   		=> 'required|unique:customers',
            'city'    		=> 'required', 
            'password'		=> 'required',
            'confirm_password'   => 'required'
        ]);  

    	$data             = array();
        $data['name']     = $request->name;
        $data['phone']    = $request->phone;
        $data['email']    = $request->email; 
        $data['city']     = $request->city; 
        $data['password'] = md5($request->password);
        $customer_id      = DB::table('customers')->insertGetId($data);
        if ($customer_id) {
            // Session::put('customer_id', $customer_id);
            // Session::put('name', $request->name);
             notify()->success('Customer Registrstion successfully!');
            return redirect()->back();
        } else {
             notify()->error('An error has occurred please try again later.');
            return redirect()->back();
        } 
    }

	//Customer Login Process

    public function customer_login_process(Request $request)
    {
    	 $check_validatoin = $request->validate([ 
            'customer_phone'     => 'required', 
            'login_password'  => 'required',  
        ]);  
    	$found_customer = DB::table('customers')
    					->where('phone',$request->customer_phone)
    					->where('password',md5($request->login_password))
    					->first();
    	if($found_customer){
    		Session::put('customer_id', $found_customer->customer_id);
            Session::put('name', $found_customer->name);
            Session::put('email', $found_customer->email);
            Session::put('phone', $found_customer->phone);
            Session::put('city', $found_customer->city);
    		 notify()->success('Customer Logging successfully!');
            return redirect('customer-shipping');
    		}else{
    			 notify()->error('Customer Logging Error!');
            return redirect()->back();
    		}
    }

    //Customer Profile logout

      public function logout()
    {
        $customer_id = Session::get('customer_id');
        session()->flush();
        return redirect('customer-login');
        
    }

    //Customer Shiping Page
    public function shipping_page()
    {
 		$customer_id      = Session::get('customer_id');
 		$customer_data    = Customer::where('customer_id',$customer_id)->first(); 
        $contents = Cart::content(); 
    	if (Session::get('customer_id') == true) {
    		return view('front.pages.shipping-address',compact('customer_data','contents'));
    	}else{ 
    		return view('front.pages.login-register');
    	}
    }

    //Shipping Address Store Methode


    public function customer_shipping_address(Request $request)
    { 
         
        $data = array(
            'shipping_email'        => $request->shipping_email,
            'shipping_phone'        => $request->shipping_phone,
            'shipping_first_name'   => $request->shipping_first_name,
            'shipping_last_name'    => $request->shipping_last_name,
            'shipping_country'      => $request->shipping_country,
            'shipping_city'         => $request->shipping_city,
            'shipping_thana'        => $request->shipping_thana,
            'shipping_village'      => $request->shipping_village,
            'shipping_street_no'    => $request->shipping_street_no,
            'shipping_street_no'    => $request->shipping_street_no,
            'shipping_house_no'     => $request->shipping_house_no,
        );
        $shipping_id = DB::table('tbl_shipping') 
                            ->insertGetId($data);
                            Session::put('shipping_id',$shipping_id);
        if ($shipping_id) {
             return redirect('payment')->with(notify()->success('Shipping Address Saved Successfully !!'));

            // return  Session::get('shipping_id',$shipping_id);;
         }else{
            notify()->error('Sorry Something Wrong There Try Again !!');
             return redirect()->back();
         }
            
    }
}
