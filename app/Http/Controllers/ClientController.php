<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ClientController extends Controller
{
    public function index(){
        return view('client.home');
    }

    public function shop(){
        
        $all_products = DB::table('tbl_products')
                           ->where('status' , 1)
                           ->get();
        $manage_products = view('client.shop')
                           ->with('all_products',$all_products);
        return view('layouts.app')
               ->with('client.shop',$manage_products);
    }

   
    /*public function checkout(){
        return view('client.checkout');
    }*/
}
