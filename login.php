<?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>
<?php require_once('admin/assets/db_connect.php'); ?>

<?php 
    $query_maintenance = "SELECT * FROM `settings` WHERE setting_id = '143'";
    $result_maintenance = mysqli_query($con, $query_maintenance);
    $row_maintenance = mysqli_fetch_assoc($result_maintenance);
    $maintenance = $row_maintenance['p_one'];
    if($maintenance == 1){

?>

<!DOCTYPE html>
<html class="fixed" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        title: "Login first!",
                        text: 'Login first to continue your journey :D'
                })
            </script>
        <?php
    }
  ?>




<style type="text/css">

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
        /*border: 1px solid black!important;*/
    }
        
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

    a{
        font-size: 13px;    
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

    //$(document).ready(function(){
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
   // });

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
                    cache: false,  
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

<?php }else{ ?>

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

<?php } ?>