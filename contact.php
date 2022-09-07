<?php $contact = 'active'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - HMG Fitness Center</title>
    <meta name="description" content="Feel free to contact us and message us.">
    <meta name="keywords" content="fitness gym in malolos, fitness, gym in malolos, exercise, ">

    <?php require('assets/plugins.php'); ?>

     <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3691088628068468"
     crossorigin="anonymous"></script>
</head>

<body>
    <?php require('assets/head.php'); ?>


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
          <?php require('assets/navbar.php'); ?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 px-5">
                    <h1 class="display-4 text-white animated slideInDown">Contact</h1>
                    <label class="h5 text-white">HOME / PAGES / <span class="text-primary">CONTACT</span></label>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


     <!-- Start Contact  -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
                    <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
                </div>
               <!-- Start contact - Sixth Section -->
            <div class="contact-section spad">
                <div class="container appear-animation" data-appear-animation="fadeIn">
                    <div class="row">
                        <div class="col-lg-6">
               
                            <div class="contact-widget">
                                <div class="cw-text">
                                    <i class="bi bi-geo-alt text-primary "></i>
                                    <?php 
                                             $query = "SELECT * FROM settings WHERE setting_id = '138'";
                                             $result = mysqli_query($con, $query);
                                             $result_2 = mysqli_fetch_array($result);
                                             foreach($result_2 as $store =>$catch){
                                                          $$store = $catch;
                                             }
                                       ?>
                                    <p style="color: #292A2D;"><?php echo isset($p_one) ? $p_one : '' ?></p>
                                </div>
                                <div class="cw-text">
                                    <i class="fa fa-mobile text-primary"></i>
                                         <?php 
                                                 $query = "SELECT * FROM settings WHERE setting_id = '133'";
                                                 $result = mysqli_query($con, $query);
                                                 $result_2 = mysqli_fetch_array($result);
                                                 foreach($result_2 as $store =>$catch){
                                                              $$store = $catch;
                                                 }
                                           ?>
                                        <a style="color: #292A2D;"><?php echo isset($p_one) ? $p_one:'' ?></a>

                                </div>
                                <div class="cw-text email">
                                    <i class="fa fa-envelope text-primary"></i>
                                     <?php 
                                             $query = "SELECT * FROM settings WHERE setting_id = '134'";
                                             $result = mysqli_query($con, $query);
                                             $result_2 = mysqli_fetch_array($result);
                                             foreach($result_2 as $store =>$catch){
                                                          $$store = $catch;
                                             }
                                       ?>

                                    <p style="color: #292A2D;">
                                        <?php echo isset($p_one) ? $p_one:'' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="leave-comment">
                                <form action="#">
                                    <input type="text" placeholder="Name" id="name" name="name" maxlength="50" style="color: #555; font-size: 17px;">
                                    <input type="email" placeholder="Email" id="email" name="email" maxlength="50" style="color: #555; font-size: 17px;">
                                   
                                    <textarea placeholder="Comment" id="comment" name="comment" style="color: #555; font-size: 17px;"></textarea>
                                    <button type="button" class="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.5366792274444!2d120.8163089141551!3d14.851239174868327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339653cf771c2d9f%3A0xadb82932800552c!2sHMG%20Fitness%20Center!5e0!3m2!1sen!2sph!4v1636250857613!5m2!1sen!2sph" height="550" width="1290" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                </div>
            </div>
        
        </div>
         
    </div>
<!-- End contact - Sixth Section --> 



   <?php require('assets/footer.php'); ?>

 <script type="text/javascript">

    function checkEmail() {

    var email = document.getElementById('txtEmail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}

      $(document).on('click', '.submit', function(){  
        
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();

        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(name == '' || email == '' || comment == ''){
            Swal.fire({
               icon: 'warning',
               title: "All field are required",
               text: "",
               color: "#555"
            })
        }else if(!email.match(pattern)){
            Swal.fire({
               icon: 'warning',
               title: "Please provide a valid email address",
               text: "",
               color: "#555"
            })
        }else{
            Swal.fire({
                title: "Do you want to send a comment?",
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'            
            }).then((result) => {
                if (result.value) {

                  $.ajax({                        
                      url:'dashboard/client_ajax.php?action=send_comment',
                      type:'post',
                      data:{
                          name:name,
                          email:email,
                          comment:comment
                      },
                      cache: false, 
                      success:function(data, resp){

                          document.getElementById("name").value = "";
                          document.getElementById("email").value = "";
                          document.getElementById("comment").value = "";

                            if(data == 1){
                                Swal.fire({
                                    icon: 'success',
                                    title: "Your comment has been successfully sent! Thank you!",
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }else{
                                Swal.fire({
                                    icon: 'warning',
                                    title: "Failed to send!"
                                })
                            }
                    }

                 }); 
                  
                }
                //End if
            })
            //End Swal
        } 
        //End else
      }); 
    //End
</script>