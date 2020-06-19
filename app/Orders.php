<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    
    protected $guarded = [];

    protected $table = "tbl_orders";
    protected $fillable=['name','address','cart','payment_id','created_at','updated_at'];
    protected $hidden=['created_at' , 'updated_at'];
}
