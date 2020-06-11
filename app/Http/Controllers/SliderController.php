<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
   public function save_slider(Request $request){
    
         // code de upload images
         $this->validate($request, [
             'slider_image' => 'image|nullable|max:1999'
         ]);
         if($request->hasFile('slider_image')){

             // 1 : file name with extension
             $filenameWithExt = $request->file('slider_image')->getClientOriginalName();

             // 2 : Get just file name
             $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
             // 3 : Get just The extension
             $extension = $request->file('slider_image')->getClientOriginalExtension();
             // 4 : file name to store
             $fileNameToStore = $filename.'_'.time().'.'.$extension;

             $path = $request->file('slider_image')->storeAs('public/cover_images', 
             $fileNameToStore);
         }else{
             $fileNameToStore = 'noimage.jpg';
         }



         //insert in DataBase
      $description1 = $request->input('description1');
      $description2 = $request->input('description2');
      $slider_image = $request->input('slider_image');
      $status = $request->input('status');

      $data = array('description1'=>$description1,
                    'description2'=>$description2,
                    'slider_image'=>$fileNameToStore,
                    'status'=>$status);
      
       DB::table('tbl_sliders')->insert($data);


       Session::put('message' , 'The Slider is added Successfully !!');
       return redirect::to('/add-product');


     
     
  }
  public function activate_slider($id){
    $data = array();
    $data['status'] = 1;

    DB::table('tbl_sliders')
        ->where('id',$id)
        ->update($data);
        Session::put('message1', 'Slider activate successfully !');
     
     return redirect::to('/sliders');
      }

public function unactivate_slider($id){
    //print('the selected id   '.$id);

    $data = array();
    $data['status'] = 0;

    DB::table('tbl_sliders')
        ->where('id',$id)
        ->update($data);
        Session::put('message', 'Slider unactived successfully !');
     
     return redirect::to('/sliders');
      }


   public function delete_slider($id){
    $select_image =    DB::table('tbl_sliders')
        ->where('id', $id)
        ->first();
   if($select_image->slider_image != 'noimage'){
       Storage::delete('public/cover_images/'.$select_image->slider_image);
   }
       DB::table('tbl_sliders')
          ->where('id', $id)
          ->delete();
         Session::put('message' , 'The Slider is Deleted !!');
   
   
           return redirect::to('/sliders');
 }

 public function edit_slider($id){
            $select_slider = DB::table('tbl_sliders')
                             ->where('id',$id)
                             ->first();

            $manage_slider = view('admin.edit_slider')
                                ->with('select_slider',$select_slider);
            
            return view('layouts.appadmin')
                    ->with('admin.edit_slider',$manage_slider);
 }

 public function update_slider(Request $request)
 { 
         $this->validate($request, [
             'slider_image' => 'image|nullable|max:1999'
         ]);
         if($request->hasFile('slider_image')){

             // 1 : file name with extension
             $filenameWithExt = $request->file('slider_image')->getClientOriginalName();

             // 2 : Get just file name
             $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
             // 3 : Get just The extension
             $extension = $request->file('slider_image')->getClientOriginalExtension();
             // 4 : file name to store
             $fileNameToStore = $filename.'_'.time().'.'.$extension;

             $path = $request->file('slider_image')->storeAs('public/cover_images', 
             $fileNameToStore);
         }else{
             $fileNameToStore = 'noimage.jpg';
         }

       

         //insert in DataBase
        $description1 = $request->input('description1');
        $description2 = $request->input('description2');
        $slider_image = $request->input('slider_image');
        $status = $request->input('status');

        $data = array('description1'=>$description1,
                        'description2'=>$description2,
                        'slider_image' =>$slider_image,
                        'status'=>$status);

        if($request->hasFile('slider_image')){
            $select_image_name = DB::table('tbl_sliders')
                              ->where('id',$request->slider_id)
                              ->first();
            $data['slider_image'] = $fileNameToStore;
            if($select_image_name->slider_image != 'noimage'){
                Storage::delete('public/cover_images/'.$select_image_name->slider_image);
            }
           
        }
        DB::table('tbl_sliders')
                ->where('id',$request->slider_id)
                ->update($data);


       Session::put('message' , 'The Slider is Updated Successfully !!');
       return redirect::to('/sliders');


     }
     
}

 


