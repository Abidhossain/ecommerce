<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;   
use Model\Product;
use DB;
class StaticFunctionController extends Controller
{
     public static function getName($id){
        $result = DB::table('categories')->select('category_name')->where('category_id', $id)->first();
       return $result->category_name;
       // return "must change !!!!!!";
    }
     public static function getManufacture($id){
        $result = DB::table('manufactures')->select('manufacture_name')->where('manufacture_id', $id)->first();
       return $result->manufacture_name;
       // return "must change !!!!!!";
    }
}
