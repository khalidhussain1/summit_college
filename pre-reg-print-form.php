<?php include 'connection.php';
error_reporting(0);
$id=$_GET['id'];
$query="SELECT * FROM `pre_registration_form_data` where id='$id'";
$response=mysqli_query($connection,$query);

$row=mysqli_fetch_assoc($response);


 ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="new-style.css"/>
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

</head>
<body id="body">




<div class="container" id="printable">
  <div class="table-wraper" >
  <div class="row">

  <div class="col-md-6">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['firstName']; ?>">
 
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row['lastName']; ?>">
  </div>
  <div class="col-md-6">
    <label for="exampleInputEmail1" class="form-label">Father Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['fatherName']; ?>">
  
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">Area</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row['address']; ?>">
  </div>
  <div class="col-md-3">
    <label for="exampleInputEmail1" class="form-label">Mobile</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['mobileNo']; ?>">
  
  </div>
  <div class="col-md-3">
    <label for="exampleInputEmail1" class="form-label">Inquiry ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['id']; ?>">
  
  </div>
  <div class="col-md-6">
    <label for="exampleInputPassword1" class="form-label">City</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $row['city']; ?>">
  </div>
  </div>
  </div>
  <div>
  <img src="preForm.jpg" class="image" alt="">
  

  </div>
  <div>

  </div>
  <script type="text/javascript">
  function printpage()
  {
  var bodydata = document.getElementById("body").innerHTML;
  var printdata = document.getElementById("printable").innerHTML;
  document.getElementById("body").innerHTML=printdata;
 window.print();
  }
</script>
</div>
<button type="button" class="btn btn-primary" onclick="printpage()" id="print-form">Print</button>

</body>
</html>