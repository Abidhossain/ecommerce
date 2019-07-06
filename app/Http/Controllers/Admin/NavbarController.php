<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Model\Navbar;
use DB;
use Session;

class NavbarController extends Controller
{
      // ------------------------- Navbar Index Method Here ---------------------- //

    public function navbar_index()
    { 
    	return view('admin.navbar.navbar_list');
    }
      // ------------------------- Navbar Read Method Here ---------------------- //

    public function navbar_read()
    {
    	$navbar_infos = DB::table('navbars')
    				    ->orderBy('main_nav_id','DESC')
    				    ->get();
    	return view('admin.navbar.navbar-read',compact('navbar_infos'));
    }
      // ------------------------- Navbar Store Method Here ---------------------- //

    public function navbar_store(Request $request)
    {
    	$check_validation = $request->validate([
    		'main_nav_name' => 'required',
    		'main_nav_url' => 'required',
    		'main_nav_status' => 'required'
    	]);
    	   $data = array(
            'main_nav_name' => $request->main_nav_name,
            'main_nav_url' => $request->main_nav_url,
            'main_nav_status' => $request->main_nav_status
         );
        $insert_navbar = DB::table('navbars')->insert($data);
        return response()->json();
    }

    // ------------------------- Navbar Index Method Here ---------------------- //

    public function sub_nav_index()
    { 
    	$sub_navbar = DB::table('sub_menus')
    				->join('navbars','sub_menus.main_nav_id','=','navbars.main_nav_id')
    				->select('navbars.main_nav_id','navbars.main_nav_name')
    				->get();
    	return view('admin.navbar.subnav',compact('sub_navbar'));
    }
    
     // ------------------------- Navbar Read Method Here ---------------------- //

    public function sub_nav_read()
    {
    	$sub_nav_infos =  DB::table('sub_menus')
    				->join('navbars','sub_menus.main_nav_id','=','navbars.main_nav_id')
    				->select('sub_menus.*','navbars.main_nav_id','navbars.main_nav_name')
    				->get();
    	return view('admin.navbar.subnav-read',compact('sub_nav_infos'));
    }

    public function sub_nav_store(Request $request)
    {
    	$check_validation = $request->validate([
    		'main_nav_id' => 'required',
    		'sub_nav_name' => 'required',
    		'sub_nav_url' => 'required',
    		'sub_nav_status' => 'required'
    	]);
    	   $data = array(
            'main_nav_id' => $request->main_nav_id,
            'sub_nav_name' => $request->sub_nav_name,
            'sub_nav_url' => $request->sub_nav_url,
            'sub_nav_status' => $request->sub_nav_status
         );
        $insert_navbar = DB::table('sub_menus')->insert($data);
        return response()->json();
    }
}
