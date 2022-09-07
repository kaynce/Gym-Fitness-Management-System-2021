<?php  include('../db_connect.php'); ?>

<?php   
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM `trainor_physical_fitness` WHERE id = '$id' ";
        $result = mysqli_query($con, $query);
        $row_trainor = mysqli_fetch_assoc($result);
        // $result_2 = mysqli_fetch_array($result);
        // foreach($result_2 as $store =>$catch){
        //   $$store = $catch;
        // }
    }
?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Trainor's Physical Fitness Info</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $row_trainor['id']; ?>" />

             <?php 
                $user_id = $row_trainor['user_id'];
                $query_name = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `users` WHERE user_id = '$user_id' ";
                $result_name = mysqli_query($con, $query_name);
                $row_name = mysqli_fetch_assoc($result_name);
              ?>

            <div class="form-group">
                <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Trainor ID</label>
                <div class="col-sm-6">
                    <!--  <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="" readonly /> -->
                     <label><?php echo  $row_name['user_id']; ?></label>
              
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Firstname </label>
                <div class="col-sm-6">
                    <!--  <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="" readonly /> -->
                     <label><?php echo  ucwords($row_name['name']); ?></label>
              
                </div>
            </div>

             <div class="form-group">
                <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="gender">Physical Fitness</label>
                <div class="col-md-6">
                 <select type="text" id="edit_physical_fitness_id"  name="edit_physical_fitness_id" class="form-control dropdown"
                  required="">
                  <option></option>
                  <?php  
                    $query = "SELECT * FROM physical_fitness";

                     $result = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result)):
                      ?>
                     <option type='text' value="<?php echo $row['physical_fitness_id'] ?>" <?php echo isset($row['physical_fitness_id']) && $row['physical_fitness_id'] == $row_trainor['physical_fitness_id'] ? 'selected' : '' ?> ><?php echo $row['physical_fitness_name']; ?></option>
                     <?php
                          endwhile;
                  ?>         
                  </select>
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


 $(document).on('click', '.edit', function(){  

        var edit_id = $('#edit_id').val();
        var edit_physical_fitness_id = $('#edit_physical_fitness_id').val();

        if(trainor_id == '' || physical_fitness_id == ''){
          Swal.fire({
                icon: 'warning',
                title: 'There is an empty field!',
                text: 'Please check the missing field!'
                //showConfirmButton: false,
                //timer: 1500
            }) 
        }else{
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

                  $.ajax({  
                      url:'ajax.php?action=edit_trainor_physical_fitness',
                      type:'post',
                      data:{
                          edit_id:edit_id,
                          edit_physical_fitness_id:edit_physical_fitness_id
                      },  
                      success:function(data, status){ 

                        if (data == 1) {
                           Swal.fire({
                              icon: 'success',
                              title: 'Successfully Updated',
                              showConfirmButton: false,
                              timer: 1500
                            }).then((result) =>{
                                 window.location.href = 'trainors_physical_fitness';
                            })
                        }else if(data == 2){
                          Swal.fire({
                              icon: 'error',
                              title: 'Physical Fitness is already assigned to this trainor'
                            })
                        }else{
                          Swal.fire({
                              icon: 'error',
                              title: 'Failed to add'
                            }).then((result) =>{
                                 window.location.href = 'trainors_physical_fitness';
                            })
                        }
                      }  
                 }); 

                }
            })
        //End Swal  
         }   

      }); 
       //End




 
</script>