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
                  <h4 class="card-title">Add Category</h4>
                  {!! Form::open(['action' => 'CategoryController@save_category' , 'methode' => 'POST',
                  'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ]) !!}
                    <fieldset>
                      <div class="form-group">
                        <label for="cname">Category Name</label>
                        <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required>
                      </div>
                      {!! Form::submit('Add Category', ['class' => 'btn btn-success form-control']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection