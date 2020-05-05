@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Slider</h4>
                  <form class="cmxform" id="commentForm" method="get" action="#">
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
                        <input  type="file" id="slider_images" class="form-control" name="slider_images" minlength="2" required>
                      </div>
                      <div class="form-group">
                        <label for="product_status">Status</label>
                        <input  type="checkbox" id="product_status"  name="product_status" minlength="2" required>
                      </div>
                      <input class="btn btn-success form-control" type="submit" value="Add Slider">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection