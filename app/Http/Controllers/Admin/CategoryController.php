<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Category;
use Session;
class CategoryController extends Controller
{
    // ------------------------- Category Method Here ---------------------- //

    public function category_list()
    {
    	return view('admin.category.category_list');
    }

    // ------------------------- Category Read Method Here ---------------------- //

    public function category_read()
    {
    	$category_infos = DB::table('categories')
                        ->select('category_id','category_name','category_description','publication_status')
                        ->orderBy('category_name')
                        ->get();
    	return view('admin.category.category_read',compact('category_infos'));
    }

    // ------------------------- Category Insert Method Here ---------------------- //

    public function category_add(Request $request)
    {
    	 $check_validatoin = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required', 
        ]); 

         $data = array(
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'publication_status' => $request->publication_status,
         );
        $insert_category = DB::table('categories')->insert($data);
        return response()->json();
    }

    // ---------------------- Category Edit Method Here ---------------------- //

    public function category_edit($id)
    {
        $category_data = DB::table('categories')->where('category_id',$id)->first();
        return response()->json($category_data);
    }

    // ------------------ Category Update Method Here ----------------- //

    public function category_update(Request $request)
    {

        $check_validatoin = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required', 
        ]); 
         $data = array(
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'publication_status' => $request->publication_status,
         );
        $insert_category = DB::table('categories')
                           ->where('category_id',$request->category_id)
                           ->update($data);
        return response()->json();
    }

    // ------------------ Category Active/Inactive Method Here ----------------- //

    public function category_active($category_id)
    {
       $data = DB::table('categories')
                ->where('category_id',$category_id)
                ->update([
                    'publication_status' => 1
                ]); 
        return redirect()->back(); 
    } 
    public function category_inactive($category_id)
    {
       $data = DB::table('categories')
                ->where('category_id',$category_id)
                ->update([
                    'publication_status' => 0
                ]);
        return redirect()->back();  
    }
    public function category_delete($category_id)
    {
       $cat_delete = DB::table('categories')->where('category_id',$category_id)->delete();
        return response()->json($cat_delete);
    }
}
