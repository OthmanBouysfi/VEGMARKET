@extends('layouts.appadmin')
 
@section('content')
    <!-- partial -->
<div class="main-panel">
   <div class="content-wrapper">
     <div class="card">
       <div class="card-body">
        <?php
            $message = Session::get('message');
            $message1 = Session::get('message1');
          $increment = 1;
          $all_sliders = DB::table('tbl_sliders')
              ->get(); 
        ?>
         {{---------------------- message pour unactivate ---------------------}}
         @if($message)
           <p class="alert alert-success">
             <?php
                echo $message;
                Session::put('message' , null);
              ?>
           </p>
        @endif
        {{---------------------- message de activate ---------------------}}
        @if($message1)
         <p class="alert alert-success">
          <?php
              echo $message1;
              Session::put('message1' , null);
            ?>
        </p>
        @endif
         <h4 class="card-title">Sliders</h4>
         <div class="row">
           <div class="col-12">
             <div class="table-responsive">
               <table id="order-listing" class="table">
                 <thead>
                   <tr>
                       <th>Order </th>
                       <th>Slider Images</th>
                       <th>Description One</th>
                       <th>Description Two</th>
                       <th>Status</th>
                       <th>Actions</th>
                   </tr>
                 </thead>
                 <tbody>
                  @foreach($all_sliders as $slider)
                   <tr>
                       <td>{{ $increment }}</td>
                       <td><img src="/storage/cover_images/{{$slider->slider_image}}" alt=""></td>
                       <td>{{$slider->description1}}</td>
                       <td>{{$slider->description2}}</td>
                        <td>
                           @if($slider->status == 1)
                           <label class="badge badge-success">Activated</label>
                         @else
                           <label class="badge badge-danger">Unactived</label>
                         </td>
                         @endif
                          <td>
                            <button class="btn btn-outline-warning"><a href="{{URL::to('/edit_slider/'.$slider->id)}}">Update</a></button>
                            <button class="btn btn-outline-danger"><a href="{{URL::to('/delete_slider/'.$slider->id)}}">Delete</a></button>
                            @if($slider->status == 1)
                              <button class="btn btn-outline-secondary "><a href="{{URL::to('/unactivate_slider/'.$slider->id)}}">Unactivad</a></button>
                            @else
                               <button class="btn btn-outline-success "><a href="{{URL::to('/activate_slider/'.$slider->id)}}">Activad</a></button>
                            @endif     
                          </td>
                   </tr>
                   <?php
                   $increment = $increment + 1; 
                   ?>      
                  @endforeach
                 </tbody>
               </table>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- content-wrapper ends -->
@endsection