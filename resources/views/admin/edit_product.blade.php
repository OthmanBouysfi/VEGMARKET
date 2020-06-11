@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <?php
                     $message = Session::get('message');
                     $error = Session::get('error');
                  ?>

                  {{---------------------- message pour insert ---------------------}}
                  @if($message)
                    <p class="alert alert-success">
                      <?php
                        echo $message;
                        Session::put('message' , null);
                      ?>
                    </p>
                  @endif
                  {{---------------------- message de erreur ---------------------}}
                  @if($error)
                  <p class="alert alert-danger">
                    <?php
                      echo $error;
                      Session::put('error' , null);
                    ?>
                  </p>
                  @endif
                  <h4 class="card-title">Edit Product</h4>
                  {!! Form::open(['action' => 'ProductController@update_product' , 'methode' => 'POST',
                       'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ]) !!}
                      
                    <fieldset>
                      <div class="form-group">
                        <label for="product_name">Product Name</label>
                      <input value="{{ $select_product->product_name }}" class="form-control" name="product_name" minlength="2" type="text" required>
                      <input type="hidden" id="cname" value="{{ $select_product->id }}" class="form-control" name="product_id" minlength="2"  required>
  
                    </div>
                      <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input value="{{ $select_product->product_price}}" class="form-control" name="product_price" minlength="2" type="number" required>
                        <input type="hidden" id="cname" value="{{ $select_product->id }}" class="form-control" name="product_id" minlength="2"  required>

                      </div>
                      <div class="form-group">
                        <label for="product_category">Category</label>
                        <select class="form-control" id="sortingField" name="product_category">
                          <?php
                             $categories = DB::table('tbl_category')
                                            ->where('category_name' ,'!=' ,$select_product->product_category )
                                            ->get(); 
                          ?>
                            <option>{{$select_product->product_category}}</option>  
                            @foreach($categories as $category)
                              <option value="{{ $category ->category_name }}">{{ $category ->category_name }}</option> 
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="product_image">Product Image</label>
                        {{ Form::file('product_image', ['class' => 'form-control'])}}
                      </div>
                
                      <div class="form-group">
                        <label for="product_status">Status</label>
                        <input  type="checkbox" id="product_status"  name="status" minlength="2" value="1" required>
                        <input type="hidden" id="cname" value="{{ $select_product->id }}" class="form-control" name="product_id" minlength="2"  required>

                      </div>
                      
                      {{--<input class="btn btn-success form-control" type="submit" value="Add Product">--}}
                      {!! Form::submit('Update Product', ['class' => 'btn btn-success form-control']) !!}
                    </fieldset>
                   {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection