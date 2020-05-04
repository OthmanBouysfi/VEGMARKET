<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('client.home');
    }

    public function shop(){
        return view('client.shop');
    }

    public function cart(){
        return view('client.cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
