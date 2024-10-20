<?php
 session_start();
//Database Configuration File
include 'config.php';
//error_reporting(0);
if(isset($_POST['register']))
  {
 
    // Getting reporter details
     $first_name=mysqli_real_escape_string($conn, trim($_POST["first_name"]));
     $last_name=mysqli_real_escape_string($conn, trim($_POST["last_name"]));
     $gender=mysqli_real_escape_string($conn, trim($_POST["gender"]));
     $phone_no=mysqli_real_escape_string($conn, trim($_POST["phone_no"]));
     $email_add=mysqli_real_escape_string($conn, trim($_POST["email_add"]));
    $rep_pass=mysqli_real_escape_string($conn, trim($_POST["password"]));
    $con_pass=mysqli_real_escape_string($conn, trim($_POST["con_password"]));
    // saving data into database
    if( $rep_pass==$con_pass){
    $rep_pass=md5($con_pass);
    $rep_status='0';
    $sql="INSERT INTO tblreporter (first_name,last_name,gender,phone_no,email_add,rep_pass,rep_status) VALUES ('$first_name','$last_name','$gender','$phone_no','$email_add','$rep_pass','$rep_status')";
        if(mysqli_query($conn,$sql)){
                 $_SESSION['status']="Data inserted successfully";
                 $_SESSION['status_code']="success";
                 $_SESSION['text']="wait for admin verification";
        }
        else{
            $_SESSION['status']="Data Not inserted !!";
            $_SESSION['status_code']="error";
            $_SESSION['text']="Try again";
          
        }

    } 
    else{
        $_SESSION['status']="Failed!! Password Not Matched";
        $_SESSION['status_code']="error";
        $_SESSION['text']="Try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">


        <!-- App title -->
        <title>News Portal | Reporter Registration</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <style>
        .passwordInput{
            margin-top: 1%; 
            text-align :center;
        }

        .displayBadge{
            margin-top: 1%; 
            display: none; 
            text-align :center;
            font-family:'Times New Roman', Times, serif;
            width:50%;
        }
    </style>

    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-b-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="index.php" class="text-success">
                                            <span><img src="assets/images/logo2.png" alt="" height="65"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" id="reg_form" method="post">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                            <label for="first_name"><b>First Name :</b></label>
                                                <input class="form-control" type="text" required="" name="first_name" placeholder="First name" autocomplete="off">
                                            </div>
                                        </div>
<hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="last_name"><b>Last Name :</b></label>
                                                <input class="form-control" type="text" name="last_name" required="" placeholder="Last name with Middle (if any)" autocomplete="off">
                                            </div>
                                        </div>

<hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="gender"><b>Gender :</b></label>
                                            <select class="form-control" required name="gender" >
                                            <option value="">-- Select a Gender --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                            </select>                                            </div>
                                        </div>
                                        
<hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="phone_no"><b>Phone No :</b></label>
                                                <input class="form-control" type="text" name="phone_no" required="" placeholder="Phone no" autocomplete="off">
                                            </div>
                                        </div>
                                        
<hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="email_add"><b>E-mail  :</b></label>
                                                <input class="form-control" type="email" name="email_add" required="" placeholder="E-mail" autocomplete="off">
                                            </div>
                                        </div>
                                        
<hr>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="rep_pass"><b>Password  : (minimum 1 Uppercase, 1 lowercase, 1 number, 1 special symbol and 8 character)</b></label>
                                                <input class="form-control" type="password" id="PassEntry" name="password" required="" placeholder="Password" autocomplete="off">
                                            <br><span id="StrengthDisp" class="badge displayBadge"></span>
                                            </div>
                                        </div>
<hr>                           
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            <label for="rep_pass"><b>Confirm Password  :</b></label>
                                                <input class="form-control" type="password" id="PassEntry" name="con_password" required="" placeholder="Confirm Password" autocomplete="off">
                                            <br><span id="StrengthDisp" class="badge displayBadge"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a> <a href="index.php"><div style="float:right";><span class="mdi mdi-login"></span> Login</div></a>
                                                </div>
                                        </div>
                                        <div class="form-group" style="float:left;">
                                            <div class="col-xs-12" style="margin-top:12px;">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" style="border-radius: 5px;" type="button" onclick="clearFunction()" name="login">Clear</button>
                                            </div>
                                        </div>

                                        <div class="form-group" style="float:right;">
                                            <div class="col-xs-12" style="margin-top:12px;">
                                                <button class="btn w-md btn-bordered btn-success waves-effect waves-light" style="border-radius: 5px;" type="submit" name="register">Register</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>
         <!-- javascript to clear form -->
        <script>
         function clearFunction() {
            document.getElementById("reg_form").reset();
         }
      </script>

      <!-- javascript to check password strength -->
<script>     
// timeout before a callback is called

let timeout;

// traversing the DOM and getting the input and span using their IDs

let password = document.getElementById('PassEntry')
let strengthBadge = document.getElementById('StrengthDisp')

// The strong and weak password Regex pattern checker

let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

function StrengthChecker(PasswordParameter){
    // We then change the badge's color and text based on the password strength

    if(strongPassword.test(PasswordParameter)) {
        strengthBadge.style.backgroundColor = "green"
        strengthBadge.textContent = 'Strong'
    } else if(mediumPassword.test(PasswordParameter)){
        strengthBadge.style.backgroundColor = 'blue'
        strengthBadge.textContent = 'Medium Password'
    } else{
        strengthBadge.style.backgroundColor = 'red'
        strengthBadge.textContent = 'Weak Password'
    }
}

// Adding an input event listener when a user types to the  password input 

password.addEventListener("input", () => {

    //The badge is hidden by default, so we show it

    strengthBadge.style.display= 'block'
    clearTimeout(timeout);

    //We then call the StrengChecker function as a callback then pass the typed password to it

    timeout = setTimeout(() => StrengthChecker(password.value), 500);

    //Incase a user clears the text, the badge is hidden again

    if(password.value.length !== 0){
        strengthBadge.style.display != 'block'
    } else{
        strengthBadge.style.display = 'none'
    }
});
</script>


<!-- code for sweet alert -->
<script src="assets/js/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && ($_SESSION['status'] !='')){
    ?>
<script>
    swal({
    title: "<?php echo $_SESSION['status']; ?>",
    text: "<?php echo $_SESSION['text']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "Done",
    //}).then(function() {
    // window.location = "index.php";
});
</script>
   <?php 
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
    unset($_SESSION['text']);
}
?>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>