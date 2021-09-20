<?php include 'connection.php';
if(count($_POST)>0)
{
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$bForm=$_POST['bForm'];
$fatherName=$_POST['fatherName'];
$gender=$_POST['gender'];
$mobileNo=$_POST['mobileNo'];
$whatsapNo=$_POST['whatsapNo'];
$city=$_POST['city'];
$address=$_POST['address'];



if($firstName==null)
{
$msg="First name field is empty";
header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($lastName==null)
{
  $msg="Last name field is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($bForm==null)
{
  $msg="B Form/CNiC field is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($fatherName==null)
{
  $msg="Father name field is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}

else if($mobileNo==null)
{
  $msg="Mobile Number field is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($whatsapNo==null)
{
  $msg="Whatsap Number field is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($city==null)
{
  $msg="City Filed is empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else if($address==null)
{
  $msg="Address Field is Empty";
  header("Location:pre_registration_form_data.php?msg=".$msg);
}
else{

        // $query="INSERT INTO `pre_registration_form_data` (`firstName`, `lastName`, `bForm`, `fatherName`, `mobileNo`, `city`,`whatsapNo`, `gender`,`address`) VALUES ('".$firstName."', '".$lastName."', '$bForm', '".$fatherName."', '$mobileNo','".$city."', '$whatsapNo', '".$gender.",'".$address."')";
        $query="INSERT INTO `pre_registration_form_data`( `firstName`, `lastName`, `bForm`, `fatherName`, `mobileNo`, `city`, `whatsapNo`, `gender`, `address`) VALUES ('".$firstName."','".$lastName."','".$bForm."','".$fatherName."','$mobileNo','".$city."','$whatsapNo','".$gender."','".$address."')";
          $response=mysqli_query($connection,$query);
          if($response)
          {


            $msg="Submitted successfully";
            header("Location:pre_registration_form_data.php?msg=".$msg);
          }
            else {
              $msg="Not Submitted";
              header("Location:pre_registration_form_data.php?msg=".$msg);

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
                            <h2 class="py-3">Pre-Registration</h2>
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
                            <div class="form-group col-md-6">
                              <input id="B form/CNIC" name="bForm" placeholder="B Form/CNIC" class="form-control" type="text">
                            </div>



                            <div class="form-group col-md-6">
                              <input id="Full Name" name="fatherName" placeholder="Father Name" class="form-control" type="text">
                            </div>

                                <div class="form-group col-md-3">
                                    <input id="Mobile No." name="mobileNo" placeholder="Mobile No." class="form-control" required="required" type="text">
                                </div>
                                <div class="form-group col-md-3">
                                    <input id="Mobile No." name="city" placeholder="City" class="form-control" required="required" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <input id="Mobile No." name="whatsapNo" placeholder="Whatsap No." class="form-control" required="required" type="text">
                                </div>

                            <div class="form-group col-md-2" >

                                      <select id="inputState" class="form-control" name="gender">
                                       <option selected>Gender</option>
                                        <option value="male"> Male</option>
                                        <option value="female"> Female</option>

                                      </select>
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





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
