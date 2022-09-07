<?php  include('../db_connect.php'); ?>

<?php   
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM `users` WHERE user_id=$user_id";
        $result = mysqli_query($con, $query);
        $result_2 = mysqli_fetch_array($result);
        foreach($result_2 as $store =>$catch){
          $$store = $catch;
        }
    }
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Trainor's Info</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $id ?>" />

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Firstname</label>
              <div class="col-sm-6">

                  <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="<?php echo isset($firstname) ? $firstname: '' ?>" />

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Lastname</label>
              <div class="col-sm-6">

                  <input type="text" id="edit_lastname" name="edit_lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname: '' ?>" />

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Gender</label>
              <div class="col-sm-6">
                   <select type="text" name="edit_gender" class="form-control dropdown " id="edit_gender" value=""  required="">
                      <option></option>
                      <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                      <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                  </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date of Birth</label>
              <div class="col-sm-6">
                   <input type="date" id="edit_date_of_birth" name="edit_date_of_birth" class="form-control" value="<?php echo isset($date_of_birth) ? $date_of_birth: '' ?>" onblur="getAge();" placeholder='Input date of birth' />
             
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Age</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_age" name="edit_age" class="form-control" value="<?php echo isset($age) ? $age: '' ?>" placeholder='Age' readonly/>
             
              </div>
            </div>

              <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Height</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_height" name="edit_height" class="form-control" value="<?php echo isset($height) ? $height: '' ?>" placeholder='Input height' />
             
              </div>
            </div>
      

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Weight</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_weight" name="edit_weight" class="form-control" value="<?php echo isset($weight) ? $weight: '' ?>" placeholder='Input weight' />
             
              </div>
            </div>

             <!-- <div class="form-group">
                <label class="col-md-6 control-label">Address</label>
                <div class="col-md-6">

                      <input type="text" class="form-control"  maxlength="50" id="edit_address" name="edit_address" value="<?php echo isset($address) ? $address: '' ?>" placeholder="Input address" >

                 </div>
             </div> -->

            <!-- Start Address -->
            <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Region</label>
                <div class="col-md-6"> 

                   <select type="text" name="edit_region"   id="edit_region"  class="form-control"  value=""  required="required">
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
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Province</label>
                <div class="col-md-6"> 

                <select type="text" name="edit_province"   id="edit_province"  class="form-control"   required="required">
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
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">City/Municipality</label>
                <div class="col-md-6">

                  <select type="text" name="edit_city"   id="edit_city"  class="form-control"  value=""  required="required">
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
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">House no.</label>
                <div class="col-md-6">

                      <input type="text" class="form-control"  maxlength="50" id="edit_house_no" name="edit_house_no" value="<?php echo isset($house_no) ? $house_no: '' ?>" placeholder="Input house no." >

                 </div>
             </div>

             <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Street Name</label>
                <div class="col-md-6">

                      <input type="text" class="form-control"  maxlength="50" id="edit_street_name" name="edit_street_name" value="<?php echo isset($street_name) ? $street_name: '' ?>" placeholder="Input street name" >

                 </div>
             </div>

            

             <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Barangay</label>
                <div class="col-md-6">

                      <input type="text" class="form-control"  maxlength="50" id="edit_barangay" name="edit_barangay" value="<?php echo isset($barangay) ? $barangay: '' ?>" placeholder="Input barangay" >

                 </div>
             </div>

             <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Postal Code</label>
                <div class="col-md-6">

                      <input type="text" class="form-control"  maxlength="50" id="edit_postal_code" name="edit_postal_code" value="<?php echo isset($postal_code) ? $postal_code: '' ?>" placeholder="Input address" >

                 </div>
             </div>
            <!-- End Address -->

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Contact</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_contact" name="edit_contact" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" placeholder='Input contact' />
             
              </div>
            </div>

          <!--   <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Rate</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_rate" name="edit_rate" class="form-control" value="<?php echo isset($rate) ? $rate: '' ?>" placeholder='Input Rate' />
             
              </div>
            </div> -->

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">New Password</label>
              <div class="col-sm-6">
                   <input type="password" id="edit_new_password" name="edit_new_password" class="form-control"  placeholder='Input new password' />
              </div>
            </div>

          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="button" id="add"  class="btn btn-success edit" >Save</button>
            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </footer>
    </section>
</div>

<style type="text/css">

  .swal2-container {
    z-index: 100000;
  }

   .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

</style>
<script>
  function getAge(){

    var dob = document.getElementById('edit_date_of_birth').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('edit_age').value=age;

}

// $(document).ready(function(){  

      $(document).on('click', '.edit', function(){  
        
        Swal.fire({
           title: 'Do you want to update?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              // var member_id = $(this).attr("id");  
               let id =$('#edit_id').val();
               let lastname = $('#edit_lastname').val();
               let firstname = $('#edit_firstname').val();
               let age = $('#edit_age').val();
               let gender = $('#edit_gender').val();
               let date_of_birth = $('#edit_date_of_birth').val();
               let height = $('#edit_height').val();
               let weight = $('#edit_weight').val();
               let region = $('#edit_region').val();
               let house_no = $('#edit_house_no').val();
               let street_name = $('#edit_street_name').val();
               let province = $('#edit_province').val();
               let city = $('#edit_city').val();
               let barangay = $('#edit_barangay').val();
               let postal_code = $('#edit_postal_code').val();
               let contact = $('#edit_contact').val();
               let rate = '';
               let new_password = $('#edit_new_password').val();

              $.ajax({  
                  url:'ajax.php?action=edit_trainor_action',
                  type:'post',
                  data:{
                      id:id,
                      lastname:lastname,
                      firstname:firstname,
                      age:age,
                      gender:gender,
                      date_of_birth:date_of_birth,
                      height:height,
                      weight:weight,
                      region:region,
                      house_no:house_no,
                      street_name:street_name,
                      province:province,
                      city:city,
                      barangay:barangay,
                      postal_code:postal_code,
                      contact:contact,
                      rate:rate,
                      new_password:new_password
                  },  
                  success:function(data, status){ 

                    console.log(data);

                    if (data == 1) {
                      Swal.fire({
                      icon: 'success',
                      title: 'Updated Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                       // if (result.value) {
                           window.location.href = 'users';
                       // }
                        
                    })     
                    }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Update failed',
                      })
                    }

                  }  
             }); 

            }
        })     
      }); 

 //});  
 //End
</script>

<!-- Start Address Code -->
<script>  
  $(document).ready(function(){
    // region dependent ajax
    $("#edit_region").on("change",function(){
      var region_id = $(this).val();
      if (region_id) {
        $.ajax({
          url :"../admin/ajax.php?action=address_action",
          type:"POST",
          cache:false,
          data:{region_id:region_id},
          success:function(data){
            $("#edit_province").html(data);
            // $('#city').html('<option value="">Select city</option>');
          }
        });
      }else{
        $('#edit_province').html('<option value=""></option>');
              $('#edit_city').html('<option value=""></option>');
      }
    });

    // province dependent ajax
    $("#edit_province").on("change", function(){
      var province_id = $(this).val();
      if (province_id) {
        $.ajax({
          url :"../admin/ajax.php?action=address_action",
          type:"POST",
          cache:false,
          data:{province_id:province_id},
          success:function(data){
            $("#edit_city").html(data);
          }
        });
      }else{
              $('#edit_city').html('<option value=""></option>');
      } 
    });
  });
//End
</script>