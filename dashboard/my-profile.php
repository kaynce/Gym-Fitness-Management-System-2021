<?php 
   if (session_status() === PHP_SESSION_NONE){ 
      session_start(); 
   }

   // unset($_SESSION['nav-active 1']);

   // $_SESSION['nav-active 2'] = "nav-active 2";
  $nav_dashboard_expanded_account = "nav-expanded";
  $nav_active_dashboard_account = "nav-active";
  $nav_active_my_profile = "nav-active";
 ?>

<?php 
include('head.php'); 
?>

<?php 


// echo 'hello';

#check if image sent
$error = '';
$msg = '';
if (isset($_POST['submit'])) {

    $email = $_SESSION['email'];

    $lastname = "";
    if(isset($_POST['lastname'])){ $lastname = $_POST['lastname']; }
    $firstname = "";
    if(isset($_POST['firstname'])){ $firstname = $_POST['firstname']; }
    $age = "";
    if(isset($_POST['age'])){ $age = $_POST['age']; }
    $gender = "";
    if(isset($_POST['gender'])){ $gender = $_POST['gender']; }
    $date_of_birth = "";
    if(isset($_POST['date_of_birth'])){ $date_of_birth = $_POST['date_of_birth']; }
    $height = "";
    if(isset($_POST['height'])){ $height = $_POST['height']; }
    $weight = "";
    if(isset($_POST['weight'])){ $weight = $_POST['weight']; }
    $region = "";
    if(isset($_POST['region'])){ $region = $_POST['region']; }
     $house_no = "";
    if(isset($_POST['house_no'])){ $house_no = $_POST['house_no']; }
     $street_name = "";
    if(isset($_POST['street_name'])){ $street_name = $_POST['street_name']; }
     $province = "";
    if(isset($_POST['province'])){ $province = $_POST['province']; }
     $city = "";
    if(isset($_POST['city'])){ $city = $_POST['city']; }
     $barangay = "";
    if(isset($_POST['barangay'])){ $barangay = $_POST['barangay']; }
     $postal_code = "";
    if(isset($_POST['postal_code'])){ $postal_code = $_POST['postal_code']; }
    $contact = "";
    if(isset($_POST['contact'])){ $contact = $_POST['contact']; }
    $status ="";
    if(isset($_POST['status'])){ $status = $_POST['status']; }

    // $lastname = mysqli_real_escape_string($con, isset($_POST['lastname']));
    // $firstname = mysqli_real_escape_string($con, $_POST['firstname']));
    // $age = mysqli_real_escape_string($con, isset($_POST['age']));
    // $gender = mysqli_real_escape_string($con, isset($_POST['gender']));
    // $date_of_birth = mysqli_real_escape_string($con, isset($_POST['date_of_birth']));
    // $height = mysqli_real_escape_string($con, isset($_POST['height']));
    // $weight = mysqli_real_escape_string($con, isset($_POST['weight']));
    // $address = mysqli_real_escape_string($con, isset($_POST['address']));
    // $contact = mysqli_real_escape_string($con, isset($_POST['contact']));
    $date = new DateTime();
    $date_created = $date->format('Y-m-d');

  if($age >= 18 || empty($age) == true && $status == ""){

    if ($_FILES['my_image']['size'] == 0){
        
      $query = "SELECT * FROM  `pending_members` WHERE email = '$email'  ";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);

      if(mysqli_num_rows($result) == 1){
         $new_img_name = $row['image'];

         $query = "UPDATE `pending_members` 
                SET image = '$new_img_name',
                    firstname = '$firstname', 
                    lastname = '$lastname', 
                    age = '$age', 
                    gender = '$gender',
                    date_of_birth = '$date_of_birth', 
                    height = '$height',
                    weight = '$weight', 
                    region = '$region',
                    house_no = '$house_no',
                    street_name = '$street_name',
                    province = '$province',
                    city = '$city',
                    barangay = '$barangay',
                    postal_code = '$postal_code',
                    contact = '$contact'
               WHERE email = '$email'";

      }else{
        //If there is no member in pending_members go to members
        $query = "SELECT * FROM  `members` WHERE email = '$email'  ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $new_img_name = $row['image'];

        $query = "UPDATE `members` 
                SET image = '$new_img_name',
                    firstname = '$firstname', 
                    lastname = '$lastname', 
                    age = '$age', 
                    gender = '$gender',
                    date_of_birth = '$date_of_birth', 
                    height = '$height',
                    weight = '$weight', 
                    region = '$region',
                    house_no = '$house_no',
                    street_name = '$street_name',
                    province = '$province',
                    city = '$city',
                    barangay = '$barangay',
                    postal_code = '$postal_code', 
                    contact = '$contact'
               WHERE email = '$email'";

      }
      mysqli_query($con, $query);
      $_SESSION['edited'] = 'edited';
        
    }else{
         # getting image data and store them in var
            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];

            //$firstname = $_POST['firstname'];

            #if there is no error occurred while uploading
            if ($error === 0) {

              if($img_size > 10000000){ 
                #error message 
                // $msg = "Sorry, your file is too large!";

                $msg = "Sorry, your file is too large!";
               // $_SESSION['file_too_large'] = 'Sorry, your file is too large!';
                #response array
                //$msg = array('error' => 1, 'em' => $em);

              } else {
                // echo "Okay!";
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

                // echo $img_ex;

                /**
                convert the image extension into lower case and 
                store it in var 
                **/

                $img_ex_lc = strtolower($img_ex);

                /**
                creating array that stores 
                allowed to upload image extensions. 
                **/

                $allowed_exs = array("jpg", "jpeg", "png");

                /**
                check if the image extension is 
                present in $allowed_exs array
                **/
               if(in_array($img_ex_lc, $allowed_exs)){

                  /**
                      renaming the image name width
                      with random string 
                  **/
                  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

                  #creating upload path on root directory

                  $img_upload_path = "../assets/images/users/".$new_img_name;

                  #move uploaded image to 'uploads' folder
                  move_uploaded_file($tmp_name, $img_upload_path);

                  #inserting image name into database
                  // $member_id = $_POST['member_id'];
                  $email = $_SESSION['email'];
                   $query = "SELECT * FROM  `pending_members` WHERE email = '$email'  ";
                      $result = mysqli_query($con, $query);
                      $row = mysqli_fetch_assoc($result);

                      if(mysqli_num_rows($result) == 1){

                           $query = "UPDATE `pending_members` 
                              SET image = '$new_img_name', 
                                  firstname = '$firstname', 
                                  lastname = '$lastname', 
                                  age = '$age', 
                                  gender = '$gender',
                                  date_of_birth = '$date_of_birth', 
                                  height = '$height',
                                  weight = '$weight', 
                                  region = '$region',
                                  house_no = '$house_no',
                                  street_name = '$street_name',
                                  province = '$province',
                                  city = '$city',
                                  barangay = '$barangay',
                                  postal_code = '$postal_code', 
                                  contact = '$contact'
                                WHERE email = '$email'";

                        }else{
                          //If there is no member in pending_members go to members
                          $query = "SELECT * FROM  `members` WHERE email = '$email'  ";
                          $result = mysqli_query($con, $query);
                          $row = mysqli_fetch_assoc($result);

                          $query = "UPDATE `members` 
                              SET image = '$new_img_name', 
                                  firstname = '$firstname', 
                                  lastname = '$lastname', 
                                  age = '$age', 
                                  gender = '$gender',
                                  date_of_birth = '$date_of_birth', 
                                  height = '$height',
                                  weight = '$weight', 
                                  region = '$region',
                                  house_no = '$house_no',
                                  street_name = '$street_name',
                                  province = '$province',
                                  city = '$city',
                                  barangay = '$barangay',
                                  postal_code = '$postal_code', 
                                  contact = '$contact'
                                WHERE email = '$email'";

                        }
                          mysqli_query($con, $query);

                          // $msg="Added Successfully";
                          $_SESSION['edited'] = 'edited';

                  }else{
                          #error message 
                      $error = "You can't upload this type of file(image)!";
                  }

              }

             } else {
              #error message 
              //$msg = "unknown error occurred!";

              $error="Something went wrong. Please try again";

              ?>
              <script type="text/javascript">
                Swal.fire({
                      icon: 'error',
                      title: 'Something went wrong. Please try again!',
               
                  })
              </script>
              <?php

             }
    }
  }else{
    ?>
      <script type="text/javascript">  
 
        Swal.fire({
                icon: 'error',
                title: 'Required age 18 and above!'
              })
      </script>
    <?php
  }
  //End age

}
//End Submit


?>
    <!-- Pop up for successful execute -->
    <?php 
      if(isset($_SESSION['edited'])){
        unset($_SESSION['edited']);
     ?>
         <script type="text/javascript">        
                Swal.fire({
                        icon: 'success',
                        title: 'Updated Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = 'my-profile.php';
                    })

         </script>
     <?php
      }
     ?>

       <!-- <div class="preloader">
          <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
          </div>
      </div> -->

      <div class="inner-wrapper">
        <!-- start: sidebar -->
          <?php 
            require('sidebar.php');
           ?>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Client Account</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <!-- <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li> -->
                 <li><span>Client Account</span></li>
                <li><span>My Profile</span></li>
              </ol>
              
              <a class="sidebar-right-toggle" data-open=""><i class=""></i></a>

            </div>
          </header>

          <?php 

          $email =  $_SESSION['email'];

                    // $query = "SELECT * FROM `users` WHERE user_id = '$user_id'"; 
          $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `pending_members` WHERE email ='$email'";

          $result = mysqli_query($con, $query);
          if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);

          }else{
            $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `members` WHERE email ='$email'";
             $result = mysqli_query($con, $query);
             $row = mysqli_fetch_assoc($result);
          }
          
          foreach($row as $store =>$catch){
            $$store = $catch;
          }

          

        ?>

            <!-- start: page -->
          <div class="row">
            <!-- <div class="col-md-4 col-lg-3"> -->
              <div class="col-md-4 col-lg-3">

              <section class="panel">
                <div class="panel-body">
                  <div class="thumb-info mb-md">

                   <?php 
                  if(!empty($row['image'])){
                    ?>
                      <img  src="../assets/images/users/<?php echo isset($row['image']) ? $row['image'] : '' ?>" class="rounded img-responsive" alt="<?php echo isset($name) ? $name : '' ?>">
                    <?php
                  }else{
                    ?>
                      <img  src="assets/images/default-avatar.jpg" alt="<?php echo $row['name'] ?>" class="" data-lock-picture="default-avatar.jpg" style="min-height: 100%!important; height: 30vh!important;"/>
                    <?php
                  }
                 ?>
                    <div class="thumb-info-title">
                      <span class="thumb-info-inner"><?php echo  isset($name) ? $name : '' ?></span>
              
                      <span class="thumb-info-type"><?php echo ucwords(isset($type) ? $type : '') ?></span>
                    </div>
                  </div>


                  <hr class="dotted short">

                  <h6 class="text-muted">Info</h6>
                  <?php if (isset($member_id)): ?>
                      <p>Memeber ID: <?php echo  isset($member_id) ? $member_id : '' ?></p>
                  <?php endif ?>
                
                  <p>Name: <?php echo  isset($name) ? $name : '' ?></p>
                  <p>Type: Client</p>
                  <div class="clearfix">
                    <!-- <a class="text-uppercase text-muted pull-right" href="#">(View All)</a> -->
                  </div>

                  <hr class="dotted short">

                  <div class="social-icons-list">
              
                  </div>

                </div>
              </section>



            </div>

            <div class="col-md-8 col-lg-6">

              <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                  <li class="active">
                    <a href="#overview" data-toggle="tab">Overview</a>
                  </li>
                  <li>
                    <a href="#edit" data-toggle="tab">Edit</a>
                  </li>
                </ul>
                <div class="tab-content">

                  <div id="overview" class="tab-pane active">

                  <form class="form-horizontal form-bordered" method="POST">

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Name:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['name'] ?></label>
                          </div>
                      </div>
                      </fieldset>
                        <?php if($row['status'] == 'approved'){ ?>
                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Date of Birth:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo date("M d,Y",strtotime($row['date_of_birth']))  ?></label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Age:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['age'] ?></label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Gender:</strong></label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['gender'] ?></label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Height:</strong></label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['height'] ?></label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Weight:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['weight'] ?></label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Address:</strong></label>
                          <div class="col-md-8">
                            <label class="control-label">
                              <?php 

                               $region_id = $row['region'];
                               $province_id = $row['province'];
                               $id = $row['city'];

                               $query_address = "SELECT region.region_name, 
                                                  province.province_name,
                                                  city.city_name
                                            FROM region
                                            INNER JOIN province ON (province.province_id = $province_id)
                                            INNER JOIN city ON (city.id = $id)
                                            WHERE region.region_id = $region_id ";
                                $result_address = mysqli_query($con, $query_address);
                                $row_address = mysqli_fetch_assoc($result_address);

                                // echo $row_address['region_name'].' '.$row_address['province_name'].' '.$row_address['city_name'];

                                  echo $row_address['region_name'].' '.$row['house_no'].' '.$row['street_name'].' '.$row_address['province_name'].' '.$row_address['city_name'].' '.$row['barangay'].' '.$row['postal_code'];
                               ?>
                            </label>
                          </div>
                      </div>
                      </fieldset>

                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Phone Number:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['contact'] ?></label>
                          </div>
                      </div>
                      </fieldset>
                    <?php } ?>
                      <fieldset>
                      <div class="form-group">
                          <label class="col-md-3 mb-0 control-label text-uppercase text-semibold text-dark" for="profileFirstName"><strong>Email:</strong> </label>
                          <div class="col-md-8">
                            <label class="control-label"><?php echo $row['email'] ?></label>
                          </div>
                      </div>
                      </fieldset>



                          <!-- <button type="button"  class="mb-xs mt-xs mr-xs btn btn-success" onclick="display()">
                              Save
                          </button> -->

                      <br>
                      <br>
                     
                  </form>
              

                  </div>

                  <div id="edit" class="tab-pane">

                    <form class="form-horizontal"  method="POST" enctype="multipart/form-data" onsubmit="return Validate(this);">
                      <h4 class="mb-xlg">Personal Information</h4>

                      <input type="hidden" id="member_id" name="member_id" value="<?php echo isset($member_id) ? $member_id: '' ?>">
                      <input type="hidden" id="status" name="status" value="<?php echo isset($status) ? $status: '' ?>">

                      <fieldset>


                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileFirstName">First Name</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php echo isset($firstname) ? $firstname: '' ?>" id="firstname" name="firstname">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileLastName">Last Name</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control"  value="<?php echo isset($lastname) ? $lastname: '' ?>" id="lastname" name="lastname">
                          </div>
                        </div>
                        <?php if($row['status'] == 'approved'){ ?>
                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileAddress">Date of Birth</label>
                          <div class="col-md-8">
                            <input type="date" class="form-control"  value="<?php echo isset($date_of_birth) ? $date_of_birth: '' ?>" id="date_of_birth" name="date_of_birth"  onblur="getAge();">
                            <span id="message"></span>
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <label class="col-md-3 control-label" for="profileCompany">Age</label>
                          <div class="col-md-8"> -->
                            <input  type="hidden"  maxlength="2"class="form-control" value="<?php echo isset($age) ? $age: '' ?>" id="age" name="age" readonly>
                          <!-- </div>
                        </div> -->
                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileAddress">Gender</label>
                          <div class="col-md-8">
                             <select type="text" name="gender"    required="" class="form-control" id="gender">
                                      <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                      <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                    </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileCompany">Height</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php echo isset($height) ? $height: '' ?>" id="height" name="height">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileAddress">Weight</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php echo isset($weight) ? $weight: '' ?>" id="weight" name="weight">
                          </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label" for="address">Region</label>
                            <div class="col-md-8">
                              <select type="text" name="region"  id="region"  class="form-control" value=""  required="required">
                                <option></option>
                                <option value="Metro Manila" <?php echo isset($region) && $region == 'Metro Manila' ? 'selected': ''?>>Metro Manila</option>
                                <option value="Mindanao" <?php echo isset($region) && $region == 'Mindanao' ? 'selected': '' ?> >Mindanao</option>
                                <option value="North Luzon" <?php echo isset($region) && $region == 'North Luzon' ? 'selected': '' ?> >North Luzon</option>
                                <option value="Central Luzon" <?php echo isset($region) && $region == 'Central Luzon' ? 'selected': '' ?> >Central Luzon</option>
                                <option value="South Luzon" <?php echo isset($region) && $region == 'South Luzon' ? 'selected': '' ?> >South Luzon</option>
                                <option value="Visayas" <?php echo isset($region) && $region == 'Visayas' ? 'selected': '' ?> >Visayas</option>
                              </select>
                            </div>
                          </div> -->

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="region">Region</label>
                            <div class="col-md-8">
                              <select type="text" name="region"   id="region"  class="form-control"  value=""  required="required">
                              <option></option>
                               <?php 
                                  $query = "SELECT * FROM region";
                                  $result = $con->query($query);
                                  if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                      ?>
                                      echo "<option value='<?php echo $row['region_id']; ?>' <?php echo isset($region) && $region == $row['region_id'] ? 'selected' : '' ?> ><?php echo $row['region_name']; ?></option>";
                                      <?php
                                    }
                                  }else{
                                    echo "<option value=''>region not available</option>"; 
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="province">Province</label>
                            <div class="col-md-8">
                              <select type="text" name="province"   id="province"  class="form-control"   required="required">
                                <option value=""></option>
                               <?php 
                                 if(isset($province)){

                                    $query = "SELECT * FROM `province` ";
                                    $result = mysqli_query($con, $query);
                                    while($row = mysqli_fetch_assoc($result)){
                                
                                    ?>
                                      <option value="<?php echo $row['province_id']; ?>" <?php echo isset($province) && $province == $row['province_id'] ? 'selected' : '' ?> ><?php echo $row['province_name']; ?></option>
                                    <?php
                                  }
                                  //End While
                                 }
                               ?>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="city">City/Municipality</label>
                            <div class="col-md-8">
                              <select type="text" name="city"   id="city"  class="form-control"  value=""  required="required">
                                <option value=""></option>
                                <?php 
                                   if(isset($city)){
                                     $query = "SELECT * FROM `city` ";
                                      $result = mysqli_query($con, $query);
                                      while($row = mysqli_fetch_assoc($result)){

                                      ?>
                                        <option value="<?php echo $row['id'];  ?>" <?php echo isset($city) && $city == $row['id'] ? 'selected' : '' ?> ><?php echo $row['city_name']; ?></option>
                                      <?php
                                      }
                                    //End While
                                   }
                                 ?>
                                </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="house_no">House No.</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" name="house_no" id="house_no" placeholder="Enter house #"  maxlength="50"  value="<?php echo isset($house_no) ? $house_no: '' ?>" required >
                              <!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="street_name">Street Name</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Enter street name"  maxlength="40"  value="<?php echo isset($street_name) ? $street_name: '' ?>" required >
                              <!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
                            </div>
                          </div>

                          

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="barangay">Barangay</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Ex: Atlag"  maxlength="40"  value="<?php echo isset($barangay) ? $barangay: '' ?>" required >
                              <!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="postal_code">Postal Code</label>
                            <div class="col-md-8">
                              <input type="text" maxlength="4" class="form-control" name="postal_code" id="postal_code" placeholder="Ex: 3000"  maxlength="4"  value="<?php echo isset($postal_code) ? $postal_code: '' ?>" required >
                              <!-- <input type="text" class="form-control" name="address" id="address" placeholder="Input address"  maxlength="200" required> -->
                            </div>
                          </div>


                        <div class="form-group">
                          <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="profileAddress">Phone Number</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" id="contact" name="contact">
                          </div>
                        </div>
                      <?php } ?>
                      <div class="form-group">
                            <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Image File</label>
                            <div class="col-md-6">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                  <div class="uneditable-input">
                                    <i class="fa fa-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                  </div>
                                  <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Change</span>
                                    <span class="fileupload-new">Select file</span>
                                    <input type="file" accept="image/*" id="my_image"  name="my_image" onchange="displayImg(this,$(this))" />
                                  </span>
                                  <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                              <label class="col-md-3 control-label">Profile Pic</label>
                              <div class="col-md-6">

                                <img src="../assets/images/users/<?php echo isset($image) ? $image : '' ?>" alt="" id="cimg" class="img-responsive img-rounded img-thumbnail" style="height: 30vh; min-width: 100%;">
                                <span id="message_image"></span>

                              </div>
                          </div>

                      </fieldset>
                      <!-- <hr class="dotted tall">
                      <h4 class="mb-xlg">About Yourself</h4>
                      <fieldset>
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
                          <div class="col-md-8">
                            <textarea class="form-control" rows="3" id="profileBio"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-3 control-label mt-xs pt-none">Public</label>
                          <div class="col-md-8">
                            <div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
                              <input type="checkbox" checked="" id="profilePublic">
                              <label for="profilePublic"></label>
                            </div>
                          </div>
                        </div>
                      </fieldset> -->
                      <hr class="dotted tall">
                      <!-- <h4 class="mb-xlg">Change Password</h4>
                      <fieldset class="mb-xl">
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                          <div class="col-md-8">
                            <input type="password" class="form-control" id="password" name="password" onkeyup="check()" minlength="8">
                          </div>
                            <center><span id="message"></span></center>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                          <div class="col-md-8">
                            <input type="password" class="form-control" id="cpassword" onkeyup="check()" minlength="8">
                          </div> 
                            <center><span id="message"></span></center>
                        </div>
                      </fieldset>
                      <div class="panel-footer">
                        <div class="row">
                          <div class="col-md-9 col-md-offset-3">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                          </div>
                        </div>
                      </div> -->
                      <button type="submit" name="submit" class="btn btn-success  ">Save</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>

            

          </div>
          <!-- end: page -->

        </section>
      </div>



    </section>

<!-- Vendor -->
    <script src="../admin/assets/vendor/jquery/jquery.js"></script>
    <script src="../admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../admin/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../admin/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../admin/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../admin/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="../admin/assets/vendor/jquery-validation/jquery.validate.js"></script>
    <script src="../admin/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

    <script src="../admin/assets/vendor/pnotify/pnotify.custom.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="../admin/assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="../admin/assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="../admin/assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="../admin/assets/javascripts/forms/examples.wizard.js"></script>



<?php include('footer.php'); ?>

<script src="assets/js/address_function.js"></script>

<script>

function getAge(){

  console.log(age);

    var dob = document.getElementById('date_of_birth').value;
    // var dob = document.getElementsByClassName("date_of_birth")[0].value;

    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

    if(age >= 18 ){
      document.getElementById('age').value=age;
      document.getElementById('message').innerHTML = '';
    }else{
      document.getElementById('age').value = '';
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Required age 18 and above!';
    }



}


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

                        document.getElementById('message_image').innerHTML =sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", ");

                        return false;
                    }
                }
            }
        }
      
        return true;
    }


  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }



  var check = function() {

        if (document.getElementById('password').value === document.getElementById('cpassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password Match';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password dont Match';
        }

        if (document.getElementById('password').value == '') {
            document.getElementById('message').style.color = 'blue';
            document.getElementById('message').innerHTML = 'Input Password';
        }

        if (document.getElementById('cpassword').value == '') {
            document.getElementById('message').style.color = 'blue';
            document.getElementById('message').innerHTML = 'Input Confirm Password';
        }
    }
    //End



   // Restricts input for the given textbox to the given inputFilter function.
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }

  setInputFilter(document.getElementById("age"), function(value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
  });

  setInputFilter(document.getElementById("height"), function(value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
  });


  setInputFilter(document.getElementById("weight"), function(value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
  });

  setInputFilter(document.getElementById("contact"), function(value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
  });



   
</script>