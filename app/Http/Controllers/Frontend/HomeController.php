<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  
use App\Model\Product; 
use App\Model\Category; 
use App\Model\Slider;
use App\Model\Customer;
use DB;
use Session;
use Cart;
class HomeController extends Controller
{

	//Home Page

    public function index()
    {   
    	return view('front.pages.home'); 
    }
     
    //Customer Profile

       public function customer_profile()
    {
        $customer_id = Session::get('customer_id');  
        if ($customer_id == true):
            return view('front.pages.customer-profile');
        else: 
            return view('front.pages.login-register');
        endif;
    }

    //Customer Profile Update

    public function update_customer_info(Request $request)
    {
        $data = array( 
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone
        );
        $update_infos = DB::table('customers')
                        ->where('customer_id',$request->customer_id)
                        ->update($data);
        if($update_infos == true):
             notify()->success('Customer Information Updated !!');
            return redirect()->back();
        else:
             notify()->error('Informatin Update Failed !!');
            return redirect()->back();
        endif;

    }
    
    //copyright

    public function copyright_index()
    {   $copyright = DB::table('copyrights')->first();
        return view('admin.copyright.copyright',compact('copyright'));
    }
    public function copyright_update(Request $request)
    {  
        $data = array(
            'copyright_text' => $request->copyright_text,
            'hyper_link' => $request->hyper_link
        );
        $update_copyright = DB::table('copyrights')->update($data);

        $copyright = DB::table('copyrights')->first();
        return view('admin.copyright.copyright',compact('copyright'));
    }

}
