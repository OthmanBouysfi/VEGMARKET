 @extends('layouts.appadmin')
 
 @section('content')
     <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <?php
           $message = Session::get('message');
            $increment = 1;
            $all_categories = DB::table('tbl_category')
                                ->get();
          ?>
        
        {{---------------------- message pour insert ---------------------}}
        @if($message)
          <p class="alert alert-danger">
            <?php
              echo $message;
              Session::put('message' , null);
            ?>
          </p>
        @endif
          <h4 class="card-title">Category</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order</th>
                        <th>Product Category</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($all_categories as $category)
                    <tr>
                        <td>{{ $increment }}</td>
                        <td>{{ $category->category_name}}</td>
                        <td>
                          <button class="btn btn-outline-warning"><a href="{{URL::to('/edit_category/'.$category->id)}}">Update</a></button>
                          <button class="btn btn-outline-danger"><a href="{{URL::to('/delete_category/'.$category->id)}}">Delete</a></button>
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