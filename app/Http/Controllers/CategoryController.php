<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function save_category(Request $request){

            $category_name = $request->input('category_name');
            $data=array('category_name'=>$category_name);
            DB::table('tbl_category')->insert($data);
            
            Session::put('message' , 'The Category is inserted !!');
        

            return redirect::to('/add-category');
    }

    public function delete_category($id)
    {
            DB::table('tbl_category')
               ->where('id', $id)
               ->delete();

            Session::put('message' , 'The Category is Deleted !!');
       

            return redirect::to('/categories');
    }

    public function edit_category($id){
       
            $select_category = DB::table('tbl_category')
                             ->where('id',$id)
                             ->first();

            $manage_category = view('admin.edit_category')
                                ->with('select_category',$select_category);
            
            return view('layouts.appadmin')
                    ->with('admin.edit_category',$manage_category);
    }
    
    public function update_category(Request $request)
    {       
           $data = array();
           $data['category_name'] = $request->category_name;

           DB::table('tbl_category')
              ->where('id',$request->category_id)
              ->update($data);
           Session::put('message' , 'The Category is Updated Successfully !!');
       

           return redirect::to('/categories');

    }

}
