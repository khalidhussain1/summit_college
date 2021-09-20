<?php include 'connection.php';
error_reporting(0);
$id=$_GET['id'];
$search=$_POST['search'];
$query="SELECT * FROM `registration_form_data` where id='$id'";
$response=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($response);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <link rel="stylesheet" type="text/css" href="new-style.css"/>
</head>
<body id="body">
  <div class="wraper" id="printable">
<div class="form-head">
  <p>Student Registration</p>
  <div class="student-image">
  <img src="uploads/<?=$row['image']?>">
  </div>
</div>
 
<form class="main-form" action="" method="post" enctype="multipart/form-data" >

<?php if(isset($_GET['msg'])){ ?>
  <div class="alert alert-danger" style=""role="alert">
       <?php echo $_GET['msg']; ?>
    </div>
  <?php } ?>
    <div class="form-row">
        <div class="form-group col-md-6">
          <input id="Full Name" name="firstName" placeholder="First Name" class="form-control" type="text" value="<?php echo $row['firstName']; ?>">
        </div>
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="inputEmail4" placeholder="Last  Name" name="lastName" value="<?php echo $row['lastName']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input id="B form/CNIC" name="bForm" placeholder="B Form/CNIC" class="form-control" type="text" value="<?php echo $row['bForm']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" id="inputEmail4" placeholder="Matric Marks" name="matricMarks" value="<?php echo $row['matricMarks']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input id="Full Name"  placeholder="Obtained Marks" class="form-control" type="text" name="obtainedMarks" value="<?php echo $row['obtainedMarks']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" id="inputEmail4" placeholder="Matric Roll No." name="matricRoolNo" value="<?php echo $row['matricRoolNo']; ?>">
        </div>
        <div class="form-group col-md-6">
          <input id="Full Name" name="fatherName" placeholder="Father Name" class="form-control" type="text" value="<?php echo $row['fatherName']; ?>">
        </div>
        <div class="form-group col-md-6">
          <input id="Full Name" name="fatherCnic" placeholder="Father CNIC" class="form-control" type="text"value="<?php echo $row['fatherCnic']; ?>" >
        </div>
        <div class="form-group col-md-3">
          <input id="gender" name="gender" placeholder="Gender" class="form-control" type="text" value="<?php echo $row['gender']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input id="Full Name" name="fatherCnic" placeholder="Descipline" class="form-control" type="text" value="<?php echo $row['descipline']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input id="Full Name" name="fatherCnic" placeholder="Session" class="form-control" type="text" value="<?php echo $row['session']; ?>">
        </div>
        <div class="form-group col-md-3">
            <input id="Mobile No." name="mobileNo" placeholder="Mobile No." class="form-control" required="required" type="text" value="<?php echo $row['phoneNo']; ?>">
        </div>
      </div>
    <div class="form-row">
       
        <div class="form-group col-md-3">
            <input id="Mobile No." name="whatsapNo" placeholder="Whatsap No." class="form-control" required="required" type="text" value="<?php echo $row['whatsapNo']; ?>">
        </div>
        <div class="form-group col-md-3">
          <input id="Full Name" name="fatherCnic" placeholder="Blood Group" class="form-control" type="text" value="<?php echo $row['bloodGroup']; ?>" >
        </div>
        <div class="form-group col-md-6 ">
 <select id="inputState" class="form-control" name="subjects">
  <option selected>Subjects</option>
  <option value="subject1">Subject2 </option>
  <option value="subject2">Subject1 </option>

</select> 

<!-- <ul>
  <li>
    Subject 1 
  </li>
  <li>
subject 2 
  </li>
  <li>
subject 3
  </li>
  <li>
subject 4 
  </li>
</ul> -->
</div>
        <!-- <div class="form-group col-md-9">
                  <textarea id="comment" name="address" cols="40" rows="2" class="form-control address-area" value="<?php echo $row['address']; ?>" placeholder="Address Here!"></textarea>
                  <input type="text">
        </div> -->

        <div class="form-group col-md-9">
            <input id="Mobile No." name="whatsapNo" placeholder="Whatsap No." class="form-control" required="required" type="text" value="<?php echo $row['address']; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label" for="invalidCheck2">
                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                  </label>
                </div>
              </div>

          </div>
    </div>

   
</form>

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
<div class="form-row">
        <button type="submit" onclick="window.printpage()"class="btn btn-success">Submit</button>
    </div>
</body>
</html>