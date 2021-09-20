<?php
include 'connection.php';
error_reporting(0);
$id=$_GET['id'];
$query="SELECT * FROM `registration_form_data` where id='$id'";
$response=mysqli_query($connection,$query);

$quer1="SELECT * FROM `student_fee_record` where inquiry_id='$id'";
$response1=mysqli_query($connection,$quer1);
$result=mysqli_fetch_assoc($response1);
$new_paid=$_POST['paid'];

if(isset($_POST["fee-plan-submit"]))
{

  $january=$_POST['january'];
  $feburary=$_POST['feburary'];
  $march=$_POST['march'];
  $april=$_POST['april'];
  $may=$_POST['may'];
  $june=$_POST['june'];
  $july=$_POST['july'];
  $august=$_POST['august'];
  $september=$_POST['september'];
  $october=$_POST['october'];
  $november=$_POST['november'];
  $december=$_POST['december'];
 
  $total_fees=$january+$feburary+$march+$april+$may+$june+$july+$august+$september+$october+$november+$december;
  $pending=$total_fees-$paid;
  $recived=0+$paid;
  $que="INSERT INTO `student_fee_record` (`inquiry_id`, `january`, `feburary`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `paid`, `totalFee`, `recived`, `pending`)
   VALUES ( '".$id."', '".$january."', '".$feburary."', '".$march."', '".$april."', '".$may."', '".$june."', '".$july."', '".$august."', '".$september."', '".$october."', '".$november."', '".$december."', '".$paid."', '".$total_fees."', '".$recived."', '".$pending."');";
  $res=mysqli_query($connection,$que);

}

if(isset($new_paid))
{

  //Total fees of the student 
  $tf=$result['totalFee'];
//Tota fee paid of the student 
  $total_paid=$result['paid']+$new_paid;
//Pending Dues of the student 
 $pending_fees=$tf-$total_paid;


  $query4="UPDATE `student_fee_record` SET `paid`='".$total_paid."',`recived`='".$total_paid."',`pending`='".$pending_fees."' 
  WHERE `inquiry_id`='$id'";
  $response4=mysqli_query($connection,$query4);



}
?>


<!DOCTYPE htmjl>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fee Panel</title>

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
  <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

<?php
include 'navbar.php';
 ?>
<?php
include 'sidebar.php';
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.col -->

    <!-- <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Scope</th>
          <th scope="col">Admission Fee</th>
          <th scope="col">Tution Fee</th>
          <th scope="col">B. Reg</th>
          <th scope="col">B. Exam</th>
          <th scope="col">T. Session</th>
          <th scope="col">Lab Charges</th>
          <th scope="col">AC/Electricity Charges</th>
          <th scope="col">Misc</th>
          <th scope="col">Total Fee</th>


        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1000+</th>
          <td>NILL</td>
            <td>6000</td>
              <td>2000</td>
                <td>2000</td>
                  <td>2000</td>
                    <td>NILL</td>
                      <td>NILL</td>
                        <td>1500</td>
                            </tr>
                                <tr>
  <th scope="row">900-999</th>

  <td>NILL</td>
    <td>6000</td>
      <td>2000</td>
        <td>2000</td>
          <td>2000</td>
            <td>NILL</td>
              <td>NILL</td>
                <td>1500</td>

        </tr>


      </tbody>
    </table> -->
    <div class="fee-plan">
    <div class="container">

  
    <div class="row">

 
<div class="form-group col-md-2">
<label for="exampleInputPassword1">Inquiry ID</label>
<!-- <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december"> -->

<p>
<?php
$row=mysqli_fetch_array($response);
echo $row['id'];?>

</p>
</div>
<div class="form-group col-md-2">
<label for="exampleInputPassword1">Student Name</label>
<!-- <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december"> -->
<p>
<?php echo $row['firstName']; 

echo $row['lastName'];
?>

</p>
</div>

</div>

<div id="voucher-list" style="">




    <form method="POST" action="">
      <div class="row">
      <div class="form-group col-md-2">
    <label for="exampleInputEmail1">January</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="january">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Feburary</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="feburary">
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">March</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="march">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">April</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="april">
  </div>
      </div>
     
      <div class="row">
      <div class="form-group col-md-2">
    <label for="exampleInputEmail1">May</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="may">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">June</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="june">
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">July</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="july">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">August</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="august">
  </div>
      </div>
     
      <div class="row">
      <div class="form-group col-md-2">
    <label for="exampleInputEmail1">September</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="september">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">October</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="october">
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputEmail1">November</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="november">
  
  </div>
  <div class="form-group col-md-2">
    <label for="exampleInputPassword1">December</label>
    <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december">
  </div>
      </div>
      <!-- <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Paid</label>
    <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="paid">
  </div> -->

  <button type="submit" name="fee-plan-submit" class="btn btn-primary">Submit</button>
  <div class="row">

 
      <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Total Fee</label>
    <!-- <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december"> -->
    <p>
      <?php
        echo $result['totalFee'];

      ?>
    </p>
  </div>
      <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Recived</label><br>
    <!-- <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december"> -->
    <?php
        echo $result['paid'];

      ?>
    <p>
      -
    </p>
  </div>
      <div class="form-group col-md-2">
    <label for="exampleInputPassword1">Pending</label>
    <!-- <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="december"> -->
    <p>
    <?php
        echo $result['pending'];

      ?>
    </p>
  </div>
  </div>    
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

</form>
</div>

<!-- <div class="form-group col-md-2">
 <button type="submit" class="btn btn-success" onclick="showList()">Shoe Voucher List</button>
 </div> -->

//fee plan end div 



<!--          Paid module form             -->
<form method="POST" action="">
<div class="form-group col-md-2">
    <label for="exampleInputPassword1">Paid</label>
    <input type="" class="form-control" id="exampleInputPassword1" placeholder="" name="paid">
    <button type="submit" class="btn btn-success">Ok!</button>
  </div>

</form>
<div class="form-group col-md-2">
 <button type="submit" class="btn btn-success" onclick="showList()">Shoe Voucher List</button>
 </div>



<div class="container">
  <div id="voucher-list" style="display:none">
<table class="table">
  <thead>
    <tr>
    
      <th scope="col">Voucher Month</th>
      <th>Fees</th>
      <th scope="col">Action</th>
     


    </tr>
  </thead>
  <tbody>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

     
      <td>January</td>
       <td><?php 
       echo $result['january'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
     
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

    <td>Feburary</td>
     <td><?php 
       echo $result['feburary'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
    
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>March</td>
      <td><?php 
       echo $result['march'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
    
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

    <td>April</td>
      <td><?php 
       echo $result['april'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
      
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>May</td>
      <td><?php 
       echo $result['may'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
      
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>June</td>
      <td><?php 
       echo $result['june'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
   
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

     <td>July</td>
      <td><?php 
       echo $result['july'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
      
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>August</td>
      <td><?php 
       echo $result['august'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
      
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>September</td>
      <td><?php 
       echo $result['september'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
    
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>October</td>
      <td><?php 
       echo $result['october'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
     
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    
<td>November</td>
      <td><?php 
       echo $result['november'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
    
    </tr>
    <tr>
      <!-- <button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="reservation.php">Add New Record</a></button> -->
    

      <td>December</td>
      <td><?php 
       echo $result['december'];
       ?></td>
      <td><button type="button" class="btn btn-primary"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $item['id']; ?>">Get Voucher</a></button></td>
    
    </tr>
 
  </tbody>
</table>
</div>
</div>

<script>
  var x;
  function show()
  {
     x.style.display='';
  }

  function showList()
  {
    x=document.getElementById('voucher-list');
    if(x.style.display==='none')
    {
      show();
    }
    
  }
</script>


</div>
</div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>





  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
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