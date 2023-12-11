<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSU Library</title>
  <link rel="icon" type="image/x-icon" href="assets/CSU.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" />
   <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
 <link href="css/styles.css" rel="stylesheet" />
  
</head>
<body>
  <div class="wrapper">
 
  <section class="content">
  <div class="container-fluid">
  <img class="bg-image" src="assets/img/CSU lib2.jpg" alt="background image">
    <div style="z-index:2;position:relative">
  
    <div class="row">

    
    <div class="col-12 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        
            <!-- Your content goes here -->
            <div class="card card-success "  style="width: 500px;">
              <div class="card-header">
                <h5 class="text-center">REGISTER</h5>
              </div>
          
            <form method="POST" class="shadow" action="{{ route('register.save') }}" id="quickForm">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="idNumber">ID Number</label>
                    <input type="text" name="idnumber" class="form-control  @error('idnumber')is-invalid @enderror" id="idNumber" placeholder="Enter ID Number">
                  @error('idnumber')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="fullname">FullName</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="fullname" placeholder="Enter FullName">
                  @error('name')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Enter Email">
                    @error('email')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror  
                </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>

                  <div class="form-group mb-0">
                    
                      <span >Already have account <a href="{{ route('login') }}">Login</a>.</span>
                   
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">REGISTER</button>
                </div>
              </form>
            </div>
          </div>
    </div>
        </div>
      </div>
    </section>
</div>

   


<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
