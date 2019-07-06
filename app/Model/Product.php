<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $fillable = [
    	'product_id','product_name','product_code','category_id','manufacture_id','product_size','long_desc','short_desc','price','product_image'
    ];
}
