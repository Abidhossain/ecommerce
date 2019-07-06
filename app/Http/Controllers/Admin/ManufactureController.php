<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use DB;
use Session;
class ManufactureController extends Controller
{
      // ------------------------- Manufacture  Method Here ---------------------- //

    public function manufacture_list()
    {
    	return view('admin.maufacture.manufacture_list');
    }
      // ------------------------- Category Read Method Here ---------------------- //

    public function manufacture_read()
    {
    	$manufacture_infos = DB::table('manufactures')->select('manufacture_id','manufacture_name','manufacture_description','publication_status')->orderBy('manufacture_name')->get();
    	return view('admin.maufacture.manufacture_read',compact('manufacture_infos'));
    }

    // ------------------------- Category Insert Method Here ---------------------- //

    public function manufacture_add(Request $request)
    {
    	 $check_validatoin = $request->validate([
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            'publication_status' => 'required', 
        ]); 

         $data = array(
            'manufacture_name' => $request->manufacture_name,
            'manufacture_description' => $request->manufacture_description,
            'publication_status' => $request->publication_status,
         );
        $insert_category = DB::table('manufactures')->insert($data);
        return response()->json();
    }

    // ---------------------- Manufacture Edit Method Here ---------------------- //

    public function manufacture_edit($id)
    {
        $category_data = DB::table('manufactures')->where('manufacture_id',$id)->first();
        return response()->json($category_data);
    }

    // // ------------------ Manufacture Update Method Here ----------------- //

    public function manufacture_update(Request $request)
    {

      
    	 $check_validatoin = $request->validate([
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            'publication_status' => 'required', 
        ]); 

         $data = array(
            'manufacture_name' => $request->manufacture_name,
            'manufacture_description' => $request->manufacture_description,
            'publication_status' => $request->publication_status,
         );
        $insert_category = DB::table('manufactures')
                           ->where('manufacture_id',$request->manufacture_id)
                           ->update($data);
        return response()->json();
    }

    // ------------------ Category Active/Inactive Method Here ----------------- //

    public function manufacture_active($manufacture_id)
    {
       $data = DB::table('manufactures')
                ->where('manufacture_id',$manufacture_id)
                ->update([
                    'publication_status' => 1
                ]); 
        return redirect()->back(); 
    } 
    public function manufacture_inactive($manufacture_id)
    {
       $data = DB::table('manufactures')
                ->where('manufacture_id',$manufacture_id)
                ->update([
                    'publication_status' => 0
                ]);
        return redirect()->back();  
    }

     // ------------------ Manufacture Delete Method Here ----------------- //

    public function manufacture_delete($manufacture_id)
    {
       $manufacture_delete = DB::table('manufactures')->where('manufacture_id',$manufacture_id)->delete();
        return response()->json($manufacture_delete);
    }
}
