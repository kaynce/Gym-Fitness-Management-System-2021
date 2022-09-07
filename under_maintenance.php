<!-- .htaccess redirect to https -->
<!-- # redirect from http to https
Options -Indexes +FollowSymLinks
RewriteEngine On

# redirect "www" domain to https://example.com
RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
RewriteRule ^(.*)$ https://%1/$1 [R=301,L]

# redirect http to https (at this point, domain is without "www")
RewriteCond %{HTTPS} =off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [R=301,L] -->
<!-- End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance - HMG Fitness Center</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/hmg-malolos-gym-logo.png" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="dist/css/error-pages/bootstrap.css">
    <link rel="stylesheet" href="dist/css/error-pages/app.css">
    <link rel="stylesheet" href="dist/css/error-pages/error.css">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
               
                <div class="text-center">
                    <h1 class="error-title">UNDER MAINTENANCE</h1>
                    <a href="index" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>

<style type="text/css">
    @media screen and (max-width: 496px){
        h1{
            font-size: 45px!important;
        }

        .container{
            align-items: center;
        }
    }
</style>

<!-- Login -->
<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>
<?php 

?>

<!DOCTYPE html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <title>Be part of our journey - HMG Fitness Center</title>
        <meta name="description" content="Start your journey and build a habit for a healthy life.">
        <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">
        <?php require('assets/credentials_head_plugins.php'); ?>


        <!-- Customized Bootstrap Stylesheet for spinner-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet for spinner-->
        <link href="assets/css/style.css?" rel="stylesheet">



    </head>

    <body class="page-body login-page login-form-fall">
        
         <?php 
    if(isset($_SESSION['client_logout'])){
        unset($_SESSION['client_logout']);
        ?>
            <script>
                Swal.fire({
                        icon: 'warning',
                        title: "<h5 style='color:black!important'>Login first!</h5>",
                        text: 'Login first to continue your journey :D'
                })
            </script>
        <?php
    }
  ?>




<style type="text/css">

    .login{
        font-size: 15px;;
    }

    input{
        font-size: 17px!important;
    }

    .sign-up a{
        color: #f13a11!important;
    }

     #login-form{
            background-color: #171819!important;
        }

        label{
            font-size: 13px;
        }

        p{
            font-size: 15px;
        }

</style>
    
      <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <!--   <div class="spinner"></div>-->
        <div class="container-ring align-items-center justify-content-center">
            <div class="ring"></div>
            <div class="ring"></div>
             <div class="ring"></div>
        </div>
    </div>
    <!-- Spinner End -->

    <div id="login-form" class="login-container-form">
        <section class="body-sign">
            <div class="center-sign">
                <a href="index" class="logo pull-left">
                    <img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="HMG FITNESS CENTER LOGO" />
                </a>

                <div class="panel panel-sign">

                    <div class="panel-title-sign mt-xl text-right">
                        <a href="index"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-home mr-xs"></i> Home</h2></a>
                        <a href="login"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2></a>
                    </div>
                    <div class="panel-body">
                        <form   method="post">
                            <div class="form-group mb-lg">
                                <label class="text-uppercase text-semibold text-dark">Email</label>
                                <div class="input-group input-group-icon">
                                    <?php 
                                            if(isset($_COOKIE['client'])) {
                                                ?>
                                                    <!-- <input type="text" class="form-control input-lg"  maxlength="50" id="login_email" name="login_email"  value="<?php echo $_COOKIE['client']?>" placeholder="Enter Email Here" >
 -->
                                                    <input type="text" tabindex="1" class="form-control input-lg"  maxlength="50" id="email" name="email"  value="<?php echo isset($email) ? $email:'' ?>" placeholder="Input Email Here" required>

                                                <?php
                                            }else{
                                                ?>
                                                <!--    <input type="text" class="form-control input-lg"  maxlength="50" id="login_email" name="login_email" value="<?php echo isset($login_email) ? $login_email: '' ?>" placeholder="Enter Email Here" > -->

                                                    <input type="text" tabindex="1" class="form-control input-lg"  maxlength="50" id="email" name="email"  value="<?php echo isset($email) ? $email:'' ?>" placeholder="Input Email Here" required >
                                                <?php
                                            }
                                    ?>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left text-uppercase text-semibold text-dark">Password</label>
                                    <a href="recover-password" class="pull-right" style="color: blue!important">Forgot Password?</a>
                                <!--    <a href="#" class="pull-right">Lost Password?</a> -->
                                </div>
                                <div class="input-group input-group-icon">

                                      <input type="password" tabindex="2" class="form-control input-lg"  maxlength="50" id="password" name="password"  placeholder="Input Password Here" required>

                                     <span class="input-group-btn">
                                          <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password" style="font-size:25px!important; color: black;"></span></button>
                                     </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <?php 
                                            if(isset($_COOKIE['client'])) {
                                                ?>
                                                    <!-- <input id="RememberMe" name="rememberme" checked value="rememberme" type="checkbox"/>
                                                    <label for="RememberMe">Remember Me</label> -->
                                                <?php
                                            }else{
                                                ?>
                                                    <!-- <input id="RememberMe" name="rememberme" value="rememberme" type="checkbox"/>
                                                    <label for="RememberMe">Remember Me</label> -->
                                                <?php
                                            }
                                         ?>
                                        
                                    </div>
                                </div>

                                <div class="col-sm-4 text-right">
                                    <!-- <button type="submit" name="submit" class="btn btn-primary hidden-xs login">Login</button> -->
                                    <button type="button" tabindex="3" name="submit" class="btn btn-primary login" >Login</button>
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>or</span>
                            </span>

                    <!--        <div class="mb-xs text-center">
                                <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                                <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
                            </div> -->

                            <p class="text-center sign-up">Don't have an account yet? <a  href="signup">Sign Up!</a>

                        </form>
                    </div>
                </div>
            </div>

        </section>
            </div>
        <!-- end: page -->


<?php require('assets/credentials_footer_plugins.php'); ?>



<!--  Javascript spinner -->
<script src="assets/javascript/main.js"></script>

<script>

    $(document).ready(function(){
        $(document).on('click', '.toggle-password', function(){  
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");

            $("#password").blur(); 

            if (input.attr("type") === "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
        });
    });

    $(document).on('click', '.login',  function(){

        let email = $('#email').val().trim();
        let password = $('#password').val().trim();

        if(email == '' && password == '' ){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your email & password'
            })
        }else if(email == '' && password != ''){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your email'
            })
        }else if(email != '' && password == ''){
            Swal.fire({
                icon: 'warning', 
                title: 'Enter your password'
            })
        }else {
            
             $.ajax({  
                    url:'dashboard/client_ajax.php?action=client_login_action',
                    type:'post',
                    data:{
                       email:email,
                       password:password
                    },  
                    success:function(data, status){ 
                        console.log(data);
                        console.log(status);
                        
                       if(data == 1){
                            Swal.fire({
                                icon: 'success',
                                title: "Login Successfully!",
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.href = 'dashboard';
                            })
                        }else if(data == 2){
                            window.location.href = 'verify-your-email';
                        }else if(data == 3){
                            Swal.fire({
                                icon: 'error',
                                title: "Your account has been archived by the Admin!"
                            })
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: "Incorrect Username or Password!"
                            })
                        }
                    }  
            }); 
        }
    });
    //End

</script>



<!-- Signup -->
<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>
<?php 
include 'assets/db_connect.php';
?>

<!DOCTYPE html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <title>Be part of our journey - HMG Fitness Center</title>
        <meta name="keywords" content="" />
        <meta name="description" content="">
        <meta name="author" content="">

        <?php require('assets/credentials_head_plugins.php'); ?>

         <!-- Customized Bootstrap Stylesheet for spinner-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!--  Stylesheet for spinner-->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>

    <style type="text/css">
        .back-color{
            background-color: #171819;
        }

        label{
            font-size: 12px;
        }

        .btn{
            font-size: 15px;
        }

        p{
            font-size: 15px;
        }

         input{
            font-size: 17px!important;
        }

            label{
                font-size: 13px;
            }

               
               
    </style>

    <body class="page-body login-page login-form-fall">
        
    

<div class="back-color">


         <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
          <!--   <div class="spinner"></div>-->
            <div class="container-ring align-items-center justify-content-center">
                <div class="ring"></div>
                <div class="ring"></div>
                 <div class="ring"></div>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="index" class="logo pull-left">
                    <img src="admin/assets/images/admin-hmg-logo.png" height="54" alt="Porto Admin" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                         <a href="index"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-home mr-xs"></i> Home</h2></a>
                        <a href="signup"><h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Signup</h2></a>
                    </div>
                    <div class="panel-body">
                        <form  id="form" method="POST"  onsubmit="return Validate(this);" enctype="multipart/form-data">

                            <div class="form-group mb-lg">
                                <label class="text-uppercase text-semibold text-dark">First Name</label>
                                <div class="input-group input-group-icon">

                                     <input type="text" tabindex="1" class="form-control input-lg"  maxlength="50" id="firstname" name="firstname" value="<?php echo isset($firstname) ? $firstname:'' ?>" placeholder="Input First Name Here" required>

                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <label class="text-uppercase text-semibold text-dark">Last Name</label>
                                <div class="input-group input-group-icon">
                                     <input type="text" tabindex="2" class="form-control input-lg"  maxlength="50" id="lastname" name="lastname" value="<?php echo isset($lastname) ? $lastname:'' ?>" placeholder="Input Last Name Here" required>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>


                            <div class="form-group mb-lg">
                                <label class="text-uppercase text-semibold text-dark">Email</label>
                                <div class="input-group input-group-icon">
                                 <input type="email" tabindex="3" class="form-control input-lg"  maxlength="50" id="email" name="email" value="<?php echo isset($email) ? $email:'' ?>" placeholder="Input Email  Here" onkeyup ="validateEmail()" required>
                                <!--  <center><span id="email_message"></span></center> -->
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left text-uppercase text-semibold text-dark">Password</label>
        
                                </div>
                                <div class="input-group input-group-icon">
                                     <input type="password" tabindex="4" class="form-control input-lg"  maxlength="50" id="first_password" name="first_password" value="<?php echo isset($first_password) ? $first_password:'' ?>" placeholder="Input Password  Here" minlength="8" required>
                                    <!--  <center><span id="message"></span></center> -->

                                    <span class="input-group-btn">
                                          <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-first-password" style="font-size:25px!important; color: black;"></span></button>
                                     </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left text-uppercase text-semibold text-dark">Confirm Password</label>
            
                                </div>
                                <div class="input-group input-group-icon">
                                     <input type="password" tabindex="5" class="form-control input-lg"  maxlength="50" id="cpassword" name="cpassword" value="<?php echo isset($cpassword) ? $cpassword:'' ?>" placeholder="Input Confirm Password Here" minlength="8"  required>
                                    <!--  <center><span id="message"></span></center> -->
                                    <span class="input-group-btn">
                                          <button class="btn btn-default" type="button"><span  class="fa  fa-eye-slash field_icon toggle-password" style="font-size:25px!important; color: black;"></span></button>
                                     </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="terms_privacy" name="terms_privacy" type="checkbox" required/>
                                        <label for="RememberMe">I accept the 
                                        <a target='_blank' href="terms-and-conditions">Terms and Conditions</a>
                                        and
                                        <a target='_blank' href="privacy-policy">Privacy Policy</a> 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" name="submit" add class="btn btn-primary add">Sign up</button>
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>or</span>
                            </span>

                            <p class="text-center">Already have an account? <a href="login">Login!</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: page -->
</div>
        <!-- Vendor -->


 
  <?php require('assets/credentials_footer_plugins.php'); ?>

    <!--  Javascript for spinner -->
<script src="assets/javascript/main.js"></script>

<script >

     $(document).on('click', '.toggle-first-password', function(){  
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#first_password");
        if (input.attr("type") === "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });

    $(document).on('click', '.toggle-password', function(){  
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#cpassword");
        if (input.attr("type") === "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });

      function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function validateEmail(){
        var form = document.getElementById("form");
        var email = document.getElementById("email").value.trim();
        var email_message = document.getElementById("email_message");
        var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

        if(email.match(pattern)){
            form.classList.add("valid");
            form.classList.remove("invalid");
            document.getElementById('email_message').style.color = 'green';
            document.getElementById('email_message').innerHTML = 'Your email address is valid';
        }else{
            form.classList.remove("valid");
            form.classList.add("invalid");
            document.getElementById('email_message').style.color = 'red';
            document.getElementById('email_message').innerHTML = 'Please enter valid email address';
        }

        if(email == ""){
            form.classList.remove("valid");
            form.classList.remove("invalid");
            document.getElementById('email_message').style.color = '#00ff00';
        }
    }

    // var check = function() {

    //       if (document.getElementById('first_password').value === document.getElementById('cpassword').value) {
    //           document.getElementById('message').style.color = 'green';
    //           document.getElementById('message').innerHTML = 'Password Match';
    //       } else {
    //           document.getElementById('message').style.color = 'red';
    //           document.getElementById('message').innerHTML = 'Password dont Match';
    //       }

    //       if (document.getElementById('first_password').value == '') {
    //           document.getElementById('message').style.color = 'blue';
    //           document.getElementById('message').innerHTML = 'Input Password';
    //       }

    //       if (document.getElementById('cpassword').value == '') {
    //           document.getElementById('message').style.color = 'blue';
    //           document.getElementById('message').innerHTML = 'Input Confirm Password';
    //       }
 //    }

    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
        function Validate(oForm) {
            var arrInputs = oForm.getElementsByTagName("input");

            for (var i = 0; i < arrInputs.length; i++) {
                var oInput = arrInputs[i];
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        
                        if (!blnValid) {

                            //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                            document.getElementById('message_file').style.color = 'red';
                            // document.getElementById('message_file').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

                             alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));

                          

                            return false;
                        }
                    }
                }
            }
          
            return true;
        }

     $(document).ready(function(){  

      $(document).on('click', '.add', function(e){  
        e.preventDefault();
        
        var firstname =$('#firstname').val().trim();
        var lastname = $('#lastname').val().trim();
        var email = $('#email').val().trim();
        var password = $('#first_password').val().trim();
        var password_length = $('#first_password').val().length;
        var cpassword = $('#cpassword').val().trim();
        var terms_privacy = $('#terms_privacy:checkbox:checked').length > 0;
        var form = document.getElementById("form");
        var email = document.getElementById("email").value.trim();
        var email_message = document.getElementById("email_message");
        // var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


        if (firstname == '' || lastname == '' || email == '' || password == '' || cpassword == '') {
                Swal.fire({
                        icon: 'warning',
                        title: 'All field are required!',
                        text: 'Please check the empty field!',
                        //showConfirmButton: false,
                        //timer: 1500
                })   
        }else if(terms_privacy == ''){
            Swal.fire({
                        icon: 'info',
                        title: 'If you agree to the Terms, Conditions and Privacy Policy. Check the checkbox below',
                        text: 'Please check the checkbox!',
                        //showConfirmButton: false,
                        //timer: 1500
                })  
        }else if(!email.match(pattern)){
                Swal.fire({
                        icon: 'warning',
                        title: 'Invalid email address!',
                        text: 'Please enter valid email address!',
                        //showConfirmButton: false,
                        //timer: 1500
                }) 
        }else if(password_length < 8){
                Swal.fire({
                        icon: 'info',
                        title: 'Please enter at least 8 characters in password!'
                        //showConfirmButton: false,
                        //timer: 1500
                }) 
        }else if(password != cpassword){
                Swal.fire({
                        icon: 'warning',
                        title: 'Password dont Match!',
                        text: 'Please check the password!',
                        //showConfirmButton: false,
                        //timer: 1500
                }) 
        }else {

            // Start sweetalert
            Swal.fire({
               title: 'This is a confirmation that I am aware with the terms and conditions of the creation of this account.',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I\'m In'            
            }).then((result) => {
                if (result.value) {

                    $.ajax({  
                        url:'dashboard/client_ajax.php?action=insert_new_client_action',
                        type:'post',
                        data:{
                            firstname:firstname,
                            lastname:lastname,
                            email:email,
                            password:password
                        },  
                        success:function(data, status){ 

                            console.log(data);
                            console.log(status);
                            
                           if(data == 2){
                                Swal.fire({
                                          icon: 'error',
                                          title: 'Email is already registered!'
                                        })
                            }else if(status == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: "Email Sent!",
                                    text: 'Your confirmation code has successfully been sent to your email',
                                    allowOutsideClick: false
                                }).then((result) => {
                                        // if (result.value) {
                                    window.location.href = 'verify-your-email';
                                        // }
                                })
                            }else{
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Signup failed!',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                            }
                        }  
                   }); 

                }
            })
          // End sweetalert
        }


      }); 

 });  


</script>