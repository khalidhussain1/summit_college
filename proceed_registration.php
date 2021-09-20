<?php include 'connection.php';
error_reporting(0);
$id=$_GET['id'];
$que="SELECT * FROM `pre_registration_form_data` WHERE id='$id'";
$res=mysqli_query($connection,$que);
$row=mysqli_fetch_assoc($res);
if(count($_POST)>0)
{
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$bForm=$_POST['bForm'];
$matricMarks=$_POST['matricMarks'];
$obtainedMarks=$_POST['obtainedMarks'];
$matricRollNo=$_POST['matricRoolNo'];
$fatherName=$_POST['fatherName'];
$fatherCnic=$_POST['fatherCnic'];
$gender=$_POST['gender'];
$descipline=$_POST['descipline'];
$session=$_POST['session'];
$subjects=$_POST['subjects'];
$mobileNo=$_POST['mobileNo'];
$whatsapNo=$_POST['whatsapNo'];
$bloodGroup=$_POST['bloodGroup'];
$studentImage=$_POST['image'];
$address=$_POST['address'];

if($firstName==null)
{
$msg="First name field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else if($lastName==null)
{
  $msg="Last name field is empty";
    header("Location:proceed_registration.php?msg=".$msg);
}
else if($bForm==null)
{
  $msg="B Form/CNiC field is empty";
    header("Location:proceed_registration.php?msg=".$msg);
}
else if($matricMarks==null)
{
  $msg="Matric Marks field is empty";
    header("Location:proceed_registration.php?msg=".$msg);
}
else if($obtainedMarks==null)
{
  $msg="Obtained Marks field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else if($matricRollNo==null)
{
  $msg="Matric Roll No field is empty";
    header("Location:proceed_registration.php?msg=".$msg);
}
else if($fatherName==null)
{
  $msg="Father name field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else if($fatherCnic==null)
{
  $msg="Fther CNIC field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else if($mobileNo==null)
{
  $msg="Mobile Number field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else if($whatsapNo==null)
{
  $msg="Whatsap Number field is empty";
  header("Location:proceed_registration.php?msg=".$msg);
}
else{
  $img_name = $_FILES['image']['name'];
 	$img_size = $_FILES['image']['size'];
 	$tmp_name = $_FILES['image']['tmp_name'];
 	$error = $_FILES['image']['error'];
    if ($error === 0) {


   			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
   			$img_ex_lc = strtolower($img_ex);

   			$allowed_exs = array("jpg", "jpeg", "png","jfif");

   			if (in_array($img_ex_lc, $allowed_exs)) {
          $randomno=rand(1,100);
   				// $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
          $new_img_name='IMG'.rand(1,1000).'.'.$img_ex_lc;
   				$img_upload_path = 'uploads/'.$new_img_name;
   				move_uploaded_file($tmp_name, $img_upload_path);
          $query="INSERT INTO `registration_form_data` (`firstName`, `lastName`, `bForm`, `matricMarks`, `obtainedMarks`, `matricRoolNo`, `fatherName`, `fatherCnic`, `gender`, `descipline`, `session`, `subjects`, `phoneNo`, `whatsapNo`, `bloodGroup`, `address`, `image`) VALUES ('".$firstName."', '".$lastName."', '$bForm', '$matricMarks', '$obtainedMarks', '$matricRollNo', '".$fatherName."', '$fatherCnic', '".$gender."', '".$descipline."', '$session', '".$subjects."', '$mobileNo', '$whatsapNo', '".$bloodGroup."', '".$address."', '".$new_img_name."')";
          $response=mysqli_query($connection,$query);
          if($response)
          {


            $msg="Submitted successfully";
            header("Location:proceed_registration.php?msg=".$msg);
          }
            else {
              $msg="Not Submitted";
            header("Location:proceed_registration.php?msg=".$msg);
            }

   			}

        else {

               $msg="You cnt upload this type of file ";
              header("Location:proceed_registration.php?msg=".$msg);
   		      	}


   	}

    else {

       $msg="Unknown Error Occured  ";
        header("Location:proceed_registration.php?msg=".$msg);
   	}

}




}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="testimonial py-5" id="testimonial">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 py-5 bg-primary text-white text-center">
                    <div class=" " >
                        <div class="card-body" >
                            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                            <h2 class="py-3">Registration</h2>
                            <p>
                           </p>
                      </div>
                  </div>
              </div>
                <div class="col-md-8 py-5 border">
                    <h4 class="pb-4">Please fill with your details</h4>
                    <form action="" method="post" enctype="multipart/form-data">

                    <?php if(isset($_GET['msg'])){ ?>
                      <div class="alert alert-danger" style=""role="alert">
                           <?php echo $_GET['msg']; ?>
                        </div>
                      <?php } ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <input id="Full Name" value="<?php echo $row['firstName']; ?>"name="firstName" placeholder="First Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" value="<?php echo $row['lastName']; ?>"class="form-control" id="inputEmail4" placeholder="Last  Name" name="lastName">
                            </div>
                            <div class="form-group col-md-3">
                              <input id="B form/CNIC" value="<?php echo $row['bForm']; ?>"name="bForm" placeholder="B Form/CNIC" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-3">
                              <input type="text" class="form-control" id="inputEmail4" placeholder="Matric Marks" name="matricMarks">
                            </div>
                            <div class="form-group col-md-3">
                              <input id="Full Name"  placeholder="Obtained Marks" class="form-control" type="text" name="obtainedMarks">
                            </div>
                            <div class="form-group col-md-3">
                              <input type="text" class="form-control" id="inputEmail4" placeholder="Matric Roll No." name="matricRoolNo">
                            </div>
                            <div class="form-group col-md-6">
                              <input id="Full Name" value="<?php echo $row['fatherName']; ?>"name="fatherName" placeholder="Father Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                              <input id="Full Name" name="fatherCnic" placeholder="Father CNIC" class="form-control" type="text" >
                            </div>
                            <div class="form-group col-md-3" >

                                      <select id="inputState" class="form-control" name="gender">
                                       <option selected>Select Gender</option>
                                        <option value="male"> Male</option>
                                        <option value="female"> Female</option>

                                      </select>
                            </div>
                            <div class="form-group col-md-3">

                                      <select id="inputState" class="form-control" name="descipline">
                                        <option selected>Descipline</option>
                                        <option value="Fsc medical"> F.Sc (Medical)</option>
                                        <option value="Fsc Non medical"> F.Sc Non Med/Pre Eng</option>
                                        <option value="ICS"> ICS</option>
                                        <option value="FA"> FA</option>
                                      </select>
                            </div>
                            <div class="form-group col-md-3">

                                      <select id="inputState" class="form-control" name="session">
                                        <option selected>Session</option>
                                        <option value="2021-2023">2021-2023</option>
                                        <option value="2023-2025">2023-2025</option>

                                      </select>
                            </div>
                            <div class="form-group col-md-3">

                                      <select id="inputState" class="form-control" name="subjects">
                                        <option selected>Subjects</option>
                                        <option value="subject1">Subject2 </option>
                                        <option value="subject2">Subject1 </option>

                                      </select>
                            </div>


                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input id="Mobile No." value="<?php echo $row['mobileNo']; ?>"name="mobileNo" placeholder="Mobile No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <input id="Mobile No." value="<?php echo $row['whatsapNo']; ?>" name="whatsapNo" placeholder="Whatsap No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-3">

                                      <select id="inputState" class="form-control" name="bloodGroup">

                                        <option label="Blood Group">Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                      </select>
                            </div>
                            <div class="custom-file col-md-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                           <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="form-group col-md-12">
                                      <textarea id="comment" name="address" cols="40" rows="5" class="form-control" placeholder="Address Here!"></textarea>
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

                        <div class="form-row">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>




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
