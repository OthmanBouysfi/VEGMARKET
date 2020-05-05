<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function save_product(Request $request){
        print('the product name is  '.$request->product_name.'   The Product Price Is '.$request->product_price);

        echo('<pre></pre>');

        if($request->hasFile('product_images')){
            print('You Have selected images');
        }
        else{
            print('you have did not selected');
        }
       
    }
}
