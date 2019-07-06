<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Size;
use Session; 
use DB;
class SizeController extends Controller
{
     // ------------------------- Size Method Here ---------------------- //
 
    public function size_list()
    {
    	return view('admin.size.size_list');
    }

    // ------------------------- Size Read Method Here ---------------------- //

    public function size_read()
    {
    	$size_infos = DB::table('sizes')
                        ->select('size_id','product_size','publication_status')
                        ->orderBy('product_size')
                        ->get();
    	return view('admin.size.size_read',compact('size_infos'));
    }

    // ------------------------- Size Insert Method Here ---------------------- //

    public function size_add(Request $request)
    {
    	 $check_validatoin = $request->validate([
            'product_size' => 'required', 
            'publication_status' => 'required', 
        ]); 

         $data = array(
            'product_size' => $request->product_size, 
            'publication_status' => $request->publication_status,
         );
        $insert_category = DB::table('sizes')->insert($data);
        return response()->json();
    }

    // ---------------------- Size Edit Method Here ---------------------- //

    public function size_edit($id)
    {
        $size_data = DB::table('sizes')->where('size_id',$id)->first();
        return response()->json($size_data);
    }

    // ------------------ Size Update Method Here ----------------- //

    public function size_update(Request $request)
    {

        $check_validatoin = $request->validate([
            'product_size' => 'required', 
            'publication_status' => 'required', 
        ]); 
         $data = array(
            'product_size' => $request->product_size, 
            'publication_status' => $request->publication_status,
         );
        $insert_size = DB::table('sizes')
                           ->where('size_id',$request->size_id)
                           ->update($data);
        return response()->json();
    }

    // ------------------ Size Method Here ----------------- //

    public function size_active($size_id)
    {
       $data = DB::table('sizes')
                ->where('size_id',$size_id)
                ->update([
                    'publication_status' => 1
                ]); 
        return redirect()->back(); 
    } 
    public function size_inactive($size_id)
    {
       $data = DB::table('sizes')
                ->where('size_id',$size_id)
                ->update([
                    'publication_status' => 0
                ]);
        return redirect()->back();  
    }

    // ------------------ Size Delete Method Here ----------------- //

    public function size_delete($size_id)
    {
       $size_delete = DB::table('sizes')->where('size_id',$size_id)->delete();
        return response()->json($size_delete);
    }
}
