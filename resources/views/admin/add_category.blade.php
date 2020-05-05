@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4>
                  <form class="cmxform" id="commentForm" method="get" action="#">
                    <fieldset>
                      <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input id="category_name" class="form-control" name="category_name" minlength="2" type="text" required>
                      </div>
                      <input class="btn btn-primary" type="submit" value="Submit">
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection