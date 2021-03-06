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
                  <h4 class="card-title">Add Slider</h4>
                  {!! Form::open(['action' => 'SliderController@save_slider' , 'methode' => 'POST',
                  'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ]) !!}
                    <fieldset>
                      <div class="form-group">
                        <label for="description1">Description One</label>
                        <input id="description1" class="form-control" name="description1" minlength="2" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="description2">Description Two</label>
                        <input id="description2" class="form-control" name="description2" minlength="2" type="text" required>
                      </div>
                      <div class="form-group">
                        <label for="slider_images">Slider Images</label>
                        {{ Form::file('slider_image', ['class' => 'form-control'])}}
                      </div>
                      <div class="form-group">
                        <label for="slider_status">Status</label>
                        <input  type="checkbox" id="slider_status"  name="status" minlength="2" value="1" required>
                      </div>
                      {!! Form::submit('Add Slider', ['class' => 'btn btn-warning form-control']) !!}
                    </fieldset>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection