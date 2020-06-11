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
                  ?>
                  @if($message)
                    <p class="alert alert-success">
                      <?php
                          echo $message;
                          Session::put('message' , null);
                      ?>
                    </p>
                  @endif
                  <h4 class="card-title">{{ $select_category->category_name }}</h4>
                  {!! Form::open(['action' => 'CategoryController@update_category' , 'methode' => 'POST',
                  'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ]) !!}
                    <fieldset>
                      <div class="form-group">
                        <label for="cname">Category Name</label>
                        <input id="cname" value="{{ $select_category->category_name }}" class="form-control" name="category_name" minlength="2" type="text" required>
                        <input type="hidden" id="cname" value="{{ $select_category->id }}" class="form-control" name="category_id" minlength="2"  required>

                      </div>
                      {!! Form::submit('Update Category', ['class' => 'btn btn-warning form-control']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection