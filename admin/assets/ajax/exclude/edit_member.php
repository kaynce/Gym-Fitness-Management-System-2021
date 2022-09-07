<?php  include('../db_connect.php'); ?>

<?php   
    if(isset($_GET['member_id'])){
        $member_id = $_GET['member_id'];
        $query = "SELECT * FROM `members` WHERE member_id=$member_id";
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
          <h2 class="panel-title">Edit Member's Info</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $id ?>" />

            <div class="form-group">
                <label class="col-sm-6 control-label">Firstname </label>
                <div class="col-sm-6">
                     <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="<?php echo isset($firstname) ? $firstname: '' ?>" />
              
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label">Lastname</label>
              <div class="col-sm-6">

                  <input type="text" id="edit_lastname" name="edit_lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname: '' ?>" />

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label">Gender</label>
              <div class="col-sm-6">
                   <select type="text" name="edit_gender" class="form-control dropdown " id="edit_gender" value=""  required="">
                      <option></option>
                      <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                      <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                  </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label">Date of Birth</label>
              <div class="col-sm-6">
                   <input type="date" id="edit_date_of_birth" name="edit_date_of_birth" class="form-control" value="<?php echo isset($date_of_birth) ? $date_of_birth: '' ?>" onblur="getAge();" placeholder='Input date of birth' />
             
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label">Age</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_age" name="edit_age" class="form-control" value="<?php echo isset($age) ? $age: '' ?>" placeholder='Age' readonly/>
             
              </div>
            </div>

              <div class="form-group">
              <label class="col-sm-6 control-label">Height</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_height" name="edit_height" class="form-control" value="<?php echo isset($height) ? $height: '' ?>" placeholder='Input height' />
             
              </div>
            </div>
      

             <div class="form-group">
              <label class="col-sm-6 control-label">Weight</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_weight" name="edit_weight" class="form-control" value="<?php echo isset($weight) ? $weight: '' ?>" placeholder='Input weight' />
             
              </div>
            </div>

             <div class="form-group">
               <label class="col-md-6 control-label" for="address">Region</label>
                  <div class="col-md-6">
                  <select type="text" name="region"  id="edit_region"  class="form-control" value=""  required="required">
                    <option></option>
                    <option value="Metro Manila" <?php echo isset($region) && $region == 'Metro Manila' ? 'selected': ''?>>Metro Manila</option>
                    <option value="Mindanao" <?php echo isset($region) && $region == 'Mindanao' ? 'selected': '' ?> >Mindanao</option>
                    <option value="North Luzon" <?php echo isset($region) && $region == 'North Luzon' ? 'selected': '' ?> >North Luzon</option>
                    <option value="Central Luzon" <?php echo isset($region) && $region == 'Central Luzon' ? 'selected': '' ?> >Central Luzon</option>
                    <option value="South Luzon" <?php echo isset($region) && $region == 'South Luzon' ? 'selected': '' ?> >South Luzon</option>
                    <option value="Visayas" <?php echo isset($region) && $region == 'Visayas' ? 'selected': '' ?> >Visayas</option>
                  </select>
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-6 control-label" for="house_no">House No.</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="edit_house_no" id="edit_house_no" placeholder="Enter house #"  maxlength="6"  value="<?php echo isset($house_no) ? $house_no: '' ?>" required >
                </div>
            </div>

            <div class="form-group">
              <label class="col-md-6 control-label" for="street_name">Street Name</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="edit_street_name" id="edit_street_name" placeholder="Enter street name"  maxlength="6"  value="<?php echo isset($street_name) ? $street_name: '' ?>" required >
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-6 control-label" for="province">Province</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="edit_province" id="edit_province" placeholder="Ex: Bulacan"  maxlength="6"  value="<?php echo isset($province) ? $province: '' ?>" required >
                   </div>
            </div>

            <div class="form-group">
              <label class="col-md-6 control-label" for="city">City</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="edit_city" id="edit_city" placeholder="Ex: Malolos"  maxlength="6"  value="<?php echo isset($city) ? $city: '' ?>" required >
                </div>
           </div>

           <div class="form-group">
            <label class="col-md-6 control-label" for="barangay">Barangay</label>
              <div class="col-md-6">
                 <input type="text" class="form-control" name="edit_barangay" id="edit_barangay" placeholder="Ex: Atlag"  maxlength="6"  value="<?php echo isset($barangay) ? $barangay: '' ?>" required >
               </div>
           </div>

           <div class="form-group">
              <label class="col-md-6 control-label" for="postal_code">Postal Code</label>
                 <div class="col-md-6">
                    <input type="text" maxlength="4" class="form-control" name="edit_postal_code" id="edit_postal_code" placeholder="Ex: 3000"  maxlength="6"  value="<?php echo isset($postal_code) ? $postal_code: '' ?>" required >
                 </div>
          </div>

            <div class="form-group">
              <label class="col-sm-6 control-label">Contact</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_contact" name="edit_contact" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" placeholder='Input contact' />
             
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-6 control-label">New Password</label>
              <div class="col-sm-6">
                   <input type="text" id="edit_new_password" name="edit_new_password" class="form-control"  placeholder='Input new password' />
             
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

 $(document).ready(function(){  

      $(document).on('click', '.edit', function(){  
        
        Swal.fire({
           title: 'Are you sure?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              // var member_id = $(this).attr("id");  
               var id =$('#edit_id').val();
               var lastname = $('#edit_lastname').val();
               var firstname = $('#edit_firstname').val();
               var age = $('#edit_age').val();
               var gender = $('#edit_gender').val();
               var date_of_birth = $('#edit_date_of_birth').val();
               var height = $('#edit_height').val();
               var weight = $('#edit_weight').val();
               var region = $('#edit_region').val();
               var house_no = $('#edit_house_no').val();
               var street_name = $('#edit_street_name').val();
               var province = $('#edit_province').val();
               var city = $('#edit_city').val();
               var barangay = $('#edit_barangay').val();
               var postal_code = $('#edit_postal_code').val();
               var contact = $('#edit_contact').val();
               var new_password = $('#edit_new_password').val();

              $.ajax({  
                  url:'ajax.php?action=edit_member_action',
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
                      new_password:new_password
                  },  
                  success:function(data, status){ 

                    console.log(data);
                    if (data == 1) {
                      Swal.fire({
                    icon: 'success',
                    title: 'The information was updated successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                     // if (result.value) {
                         window.location.href = 'members';
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

 });  





 
</script>