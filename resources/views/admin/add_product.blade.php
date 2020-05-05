@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                  {!! Form::open(['action' => 'ProductController@save_product' , 'methode' => 'POST',
                       'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ]) !!}
                    <fieldset>
                      <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input id="product_name" class="form-control" name="product_name" minlength="2" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input id="product_price" class="form-control" name="product_price" minlength="2" type="number" required>
                      </div>
                      <div class="form-group">
                        <label for="product_category">Category</label>
                        <select class="form-control" id="sortingField" name="product_category">
                            <option value="">Select Category</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="product_images">Product Images</label>
                        {{ Form::file('product_images',['class' => 'form-control'])}}
                      </div>
                
                      <div class="form-group">
                        <label for="product_status">Status</label>
                        <input  type="checkbox" id="product_status"  name="product_status" minlength="2" required>
                      </div>
                      
                      {{--<input class="btn btn-success form-control" type="submit" value="Add Product">--}}
                      {!! Form::submit('Add Product', ['class' => 'btn btn-success form-control']) !!}
                    </fieldset>
                   {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection