<?php include 'connection.php';
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
$admission=$_POST['admission'];
if($firstName==null)
{
$msg="First name field is empty";
header("Location:registration_form.php?msg=".$msg);
}
else if($lastName==null)
{
  $msg="Last name field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($bForm==null)
{
  $msg="B Form/CNiC field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($matricMarks==null)
{
  $msg="Matric Marks field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($obtainedMarks==null)
{
  $msg="Obtained Marks field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($matricRollNo==null)
{
  $msg="Matric Roll No field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($fatherName==null)
{
  $msg="Father name field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($fatherCnic==null)
{
  $msg="Fther CNIC field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($mobileNo==null)
{
  $msg="Mobile Number field is empty";
  header("Location:registration_form.php?msg=".$msg);
}
else if($whatsapNo==null)
{
  $msg="Whatsap Number field is empty";
  header("Location:registration_form.php?msg=".$msg);
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
          $query="INSERT INTO `registration_form_data` (`firstName`, `lastName`, `bForm`, `matricMarks`, `obtainedMarks`, `matricRoolNo`, `fatherName`, `fatherCnic`, `admission`,`gender`, `descipline`, `session`, `subjects`, `phoneNo`, `whatsapNo`, `bloodGroup`, `address`, `image`) VALUES ('".$firstName."', '".$lastName."', '$bForm', '$matricMarks', '$obtainedMarks', '$matricRollNo', '".$fatherName."', '$fatherCnic', '".$admission."','".$gender."', '".$descipline."', '$session', '".$subjects."', '$mobileNo', '$whatsapNo', '".$bloodGroup."', '".$address."', '".$new_img_name."')";
          $response=mysqli_query($connection,$query);
          if($response)
          {


            $msg="Submitted successfully";
            header("Location:registration_form.php?msg=".$msg);
          }
            else {
              $msg="Not Submitted";
              header("Location:registration_form.php?msg=".$msg);

            }

   			}

        else {

               $msg="You cnt upload this type of file ";
               header("Location:registration_form.php?msg=".$msg);
   		      	}


   	}

    else {

       $msg="Unknown Error Occured  ";
       header("Location:registration_form.php?msg=".$msg);
   	}

}




}
 ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Registration Form </title>
  </head>
  <body>

    <!--  Include the above in your HEAD tag -->

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
                              <input id="Full Name" name="firstName" placeholder="First Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-6">
                              <input type="text" class="form-control" id="inputEmail4" placeholder="Last  Name" name="lastName">
                            </div>
                            <div class="form-group col-md-3">
                              <input id="B form/CNIC" name="bForm" placeholder="B Form/CNIC" class="form-control" type="text">
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
                              <input id="Full Name" name="fatherName" placeholder="Father Name" class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-3">
                              <input id="Full Name" name="fatherCnic" placeholder="Father CNIC" class="form-control" type="text" >
                            </div>
                            <div class="form-group col-md-3">

<select id="inputState" class="form-control" name="admission">

  <option label="Admission"></option>
  <option value="Regular">Regular</option>
  <option value="Private">Private</option>
  <option value="Frenchise">Frenchise</option>
</select>
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
                                <input id="Mobile No." name="mobileNo" placeholder="Mobile No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <input id="Mobile No." name="whatsapNo" placeholder="Whatsap No." class="form-control" required="required" type="text">
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
                        <div class="form-row">
                            <button type="submit" class="btn btn-success"><a style="color:white;margin: top 10px;" href="registerd_student_details.php">Student Details</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
