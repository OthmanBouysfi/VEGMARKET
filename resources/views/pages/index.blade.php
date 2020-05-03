@extends('layouts.app')

@section('title')
     Home
@endsection
<?php 

 //$all_products= DB::table('tbl_products')
                 //  ->get();
?>
@section('content')
 <div class="row">
      @foreach ($all_products as $product)
      <div class="col-sm-4 col-md-4">
           <div class="thumbnail">
                <img src="images/{{$product -> product_image}}" alt="product_image" class="img-responsive">
                <div class="caption">
                     <h3>{{$product -> product_name}}</h3>
                     <div class="clearfix">
                          <div class="pull-left price">
                              {{$product -> price}}

                          </div>
                          <a href="" class="btn btn-success pull-right" role="button">Add to </a>
                     </div>
                </div>
           </div>

      </div>

     @endforeach
 </div>


@endsection
  
