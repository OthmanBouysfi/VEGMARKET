<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    
    protected $guarded = [];

    protected $table = "tbl_products";
    protected $fillable=['product_name','product_price','product_category','product_image','status','created_at','updated_at'];
    protected $hidden=['created_at' , 'updated_at'];
}
