<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function save_product(Request $request){
       
       if($request->product_category == 'Select Category'){
          Session::put('error' , 'Please Select the category !');
          return redirect::to('/add-product');

       } else{
           // code de upload images           #####php artisan storage:link#####
           $this->validate($request, [
               'product_image' => 'image|nullable|max:1999'
           ]);
           if($request->hasFile('product_image')){

               // 1 : file name with extension
               $filenameWithExt = $request->file('product_image')->getClientOriginalName();

               // 2 : Get just file name
               $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
               // 3 : Get just The extension
               $extension = $request->file('product_image')->getClientOriginalExtension();
               // 4 : file name to store
               $fileNameToStore = $filename.'_'.time().'.'.$extension;

               $path = $request->file('product_image')->storeAs('public/cover_images', 
               $fileNameToStore);
           }else{
               $fileNameToStore = 'noimage.jpg';
           }



           //insert in DataBase
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_category = $request->input('product_category');
        $product_image = $request->input('product_image');
        $status = $request->input('status');

        $data = array('product_name'=>$product_name,
                      'product_price'=>$product_price,
                      'product_category'=>$product_category,
                      'product_image'=>$fileNameToStore,
                      'status'=>$status);
        
         DB::table('tbl_products')->insert($data);


         Session::put('message' , 'The Product is added Successfully !!');
         return redirect::to('/add-product');


       }
       
    }

    public function select_product_by_category($category_name){
        //print('The selected cate is '.$category_name);
        $all_products = DB::table('tbl_products')
                           ->where('product_category' , $category_name)
                           ->where('status' , 1)
                           ->get();
        $manage_products = view('client.shop')
                           ->with('all_products',$all_products);
         return view('layouts.app')
                ->with('client.shop',$manage_products);
    }

    public function activate_product($id){
          $data = array();
          $data['status'] = 1;

          DB::table('tbl_products')
              ->where('id',$id)
              ->update($data);
              Session::put('message1', 'Product activate successfully !');
           
           return redirect::to('/products');
            }
    
    public function unactivate_product($id){
          //print('the selected id   '.$id);

          $data = array();
          $data['status'] = 0;

          DB::table('tbl_products')
              ->where('id',$id)
              ->update($data);
              Session::put('message', 'Product unactived successfully !');
           
           return redirect::to('/products');
     }

     public function delete_product($id)
     {
             $select_image =    DB::table('tbl_products')
                    ->where('id', $id)
                    ->first();
            if($select_image->product_image != 'noimage'){
                Storage::delete('public/cover_images/'.$select_image->product_image);
            }
                    DB::table('tbl_products')
                    ->where('id', $id)
                    ->delete();
                 Session::put('message' , 'The Product is Deleted !!');
            
     
                 return redirect::to('/products');
    }

    public function edit_product($id)
    {
       
            $select_product = DB::table('tbl_products')
                            ->where('id',$id)
                            ->first();

            $manage_product = view('admin.edit_product')
                                ->with('select_product',$select_product);
            
            return view('layouts.appadmin')
                    ->with('admin.edit_product',$manage_product);
    }

    public function update_product(Request $request)
    {       
            
             $this->validate($request, [
                 'product_image' => 'image|nullable|max:1999'
             ]);
             if($request->hasFile('product_image')){
               
  
                 // 1 : file name with extension
                 $filenameWithExt = $request->file('product_image')->getClientOriginalName();
  
                 // 2 : Get just file name
                 $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
                 // 3 : Get just The extension
                 $extension = $request->file('product_image')->getClientOriginalExtension();
                 // 4 : file name to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;
  
                 $path = $request->file('product_image')->storeAs('public/cover_images', 
                 $fileNameToStore);
             }else{
                 $fileNameToStore = 'noimage.jpg';
             }
  
        
            
         //insert in DataBase
          $product_name = $request->input('product_name');
          $product_price = $request->input('product_price');
          $product_category = $request->input('product_category');
          $status = $request->input('status');

          $data = array('product_name'=>$product_name,
                        'product_price' => $product_price,
                        'product_category'=> $product_category,
                        'status'=> $status);

            
           

            if($request->hasFile('product_image')){
                $select_image_name = DB::table('tbl_products')
                                  ->where('id',$request->product_id)
                                  ->first();
                $data['product_image'] = $fileNameToStore;
                if($select_image_name->product_image != 'noimage'){
                    Storage::delete('public/cover_images/' .$select_image_name->product_image);
                }
               
            }
            DB::table('tbl_products')
                    ->where('id',$request->product_id)
                    ->update($data);
  
  
           Session::put('message' , 'The Product is Updated Successfully !!');
           return redirect::to('/products');
  
  
         }

        public function addToCart($id)
        {
            $product = DB::table('tbl_products')
                         ->where('id', $id)
                         ->first();
            
            $oldCart = Session::has('cart')? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product , $id);
            Session::put('cart',$cart);

           // dd(Session::get('cart'));
           return redirect::to('/');
        }
         
        public function cart(){
            if(!Session::has('cart')){
            return view('client.cart');
            }
            $oldCart = Session::has('cart')? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            return view('client.cart' , ['products' => $cart->items]);

        }

        public function updateQty(Request $request)
        {
            //print('the product id is' .$request->id.' And the product qty is '.$request->quantity);
            $oldCart = Session::has('cart')? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->updateQty($request->id , $request->quantity);
                Session::put('cart',$cart);         
           // dd(Session::get('cart'));
           return redirect::to('/cart');
        }

        public function removeItem($product_id)
        {
            $oldCart = Session::has('cart')? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->removeItem($product_id);
            if(count($cart->items) > 0){
                Session::put('cart',$cart);
            }
            else{
                Session::forget('cart');
            }
            

           // dd(Session::get('cart'));
           return redirect::to('/cart');
        }

        public function checkout()
        {
            if(!Session::has('cart')){
                return view('client.cart');
                }
            $oldCart = Session::has('cart')? Session::get('cart'):null;
            $cart = new Cart($oldCart);
            return view('client.checkout' , ['totalPrice' => $cart->totalPrice]);
        }


        public function postCheckout(Request $request)
        {
            if(!Session::has('cart')){
                return redirect::to('/cart'); 
                // , ['Products' => null]           
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
    
            Stripe::setApiKey('sk_test_tKjeBmiWmygVY8k3ebt8sKCU00pdndTeCh');
            try{
               $charge =  Charge::create(array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => "usd",
                    "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                    "description" => "Test Charge"
                ));


            $data = array();
            $data['name'] = $request->name;
            $data['address'] = $request->address;
            $data['cart'] = serialize($cart);
            $data['payment_id'] = $charge->id;

            DB::table('tbl_orders')
               ->insert($data);


            } catch(\Exception $e){
                Session::put('error', $e->getMessage());
                return redirect::to('/checkout');
            }
    
            Session::forget('cart');
            Session::put('success', 'Purchase accomplished successfully !');
            return redirect::to('/');
        }
        

        // Orders 
        public function orders()
        {
            return view('admin.display_orders');
        }
    }
