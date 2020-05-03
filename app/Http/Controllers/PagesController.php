<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PagesController extends Controller
{
    public function home_page(){
        $all_products= DB::table('products')
                   ->get();
        $manage_products = view('pages.index')
                        ->with('all_products' , $all_products);
        return view('layouts.app')
                  ->with('pages.index' , $manage_products);
        ///return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        return view('pages.services');
    }
}
