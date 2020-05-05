<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="backend/css/themify-icons.css">
  <link rel="stylesheet" href="backend/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="backend/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="backend/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="backend/images/logo_2H_tech.png" />
</head>
<body>

    <div class="container-scroller">
   
    
        @include('partials.nav1')
    
    
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
       @include('partials.nav2')
          @yield('content')
        </div>
    </div>


    
  <!-- plugins:js -->
  <script src="backend/js/vendor.bundle.base.js"></script>
  <script src="backend/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="backend/js/off-canvas.js"></script>
  <script src="backend/js/hoverable-collapse.js"></script>
  <script src="backend/js/template.js"></script>
  <script src="backend/js/settings.js"></script>
  <script src="backend/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="backend/js/dashboard.js"></script>
  <script src="backend/js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

