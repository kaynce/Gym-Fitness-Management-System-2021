<?php  include('../db_connect.php'); ?>

<?php   
    if(isset($_GET['physical_fitness_id'])){
        $physical_fitness_id = substr($_GET['physical_fitness_id'], 0, 5);
        $id = substr($_GET['physical_fitness_id'], 5);

        $query = "SELECT * FROM `enrolls_to` WHERE id=$id";
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
          <h2 class="panel-title">Choose Trainor</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $id ?>" />


            <div class="form-group">
              <label class="col-sm-6 control-label">Choose Trainor</label>
              <div class="col-sm-6">
                   <select type="text" name="edit_change_trainor_id" class="form-control dropdown " id="edit_change_trainor_id" value=""  required="">
                      <option></option>
                      <?php 

                        // $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND availability = '1' ";

                        // $result_trainor = mysqli_query($con, $query_trainor);
                        // $row_trainor = mysqli_fetch_assoc($result_trainor);
                        $query_tpf = "SELECT * FROM `trainor_physical_fitness` WHERE physical_fitness_id = '$physical_fitness_id' ";
                        $result_tpf = mysqli_query($con, $query_tpf);

                        while($row_tpf = mysqli_fetch_assoc($result_tpf)){
                      ?>  

                      <option value="<?php echo $row_tpf['user_id']; ?>" <?php echo isset($trainor_id) && $trainor_id == $row_tpf['user_id'] ? 'selected' : '' ?>>
                       <?php 
                            $user_id =  $row_tpf['user_id']; 

                            $query_trainor = "SELECT *,concat(lastname,', ',firstname) AS name FROM users WHERE status ='approved' AND user_id = '$user_id' AND availability = '1' ";

                            $result_trainor = mysqli_query($con, $query_trainor);
                            $row_trainor = mysqli_fetch_assoc($result_trainor);

                            echo $row_trainor['name'];
                        ?>
                        </option>

                    <?php } ?>
                  </select>
              </div>
            </div>


          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="button" id="add"  class="btn btn-success change_trainor" >Save</button>
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

$(document).on('click', '.change_trainor', function(){  
        
        var id = $('#edit_id').val();
        var change_trainor_id = $('#edit_change_trainor_id').val();

        if(change_trainor_id == ''){

          // Swal.fire({
          //           icon: 'error',
          //           title: 'Please choose Trainor!'
          //         })

          Swal.fire({
             title: 'Do you want to update?',
              text: "The trainor of this client will be removed",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes'            
          }).then((result) => {
              if (result.value) {
                
                $.ajax({                        
                    url:'ajax.php?action=save_trainor_action',
                    type:'post',
                    data:{
                        id:id,
                        change_trainor_id:change_trainor_id
                    },
                    success:function(data, resp){

                    console.log(data);

                    console.log(resp);

              if(data == 1){

                Swal.fire({
                      icon: 'success',
                      title: 'Saved Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) =>{
                       window.location.href = 'edit_member?member_id=<?php echo $member_id ?>';
                    })

              }else{

                Swal.fire({
                      icon: 'warning',
                      title: 'Assign Trainor Failed!',

                    })
              }
            }

               }); 
              }
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
                    url:'ajax.php?action=save_trainor_action',
                    type:'post',
                    data:{
                        id:id,
                        change_trainor_id:change_trainor_id
                    },
                    success:function(data, resp){

                    console.log(data);

                    console.log(resp);

              if(data == 1){

                Swal.fire({
                      icon: 'success',
                      title: 'Saved Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) =>{
                         window.location.href = 'edit_member?member_id=<?php echo $member_id ?>';
                    })

              }else{

                Swal.fire({
                      icon: 'warning',
                      title: 'Assign Trainor Failed!',

                    })
              }
            }

               }); 
              }
          })

        }//End else
          //End     
      }); 
  //End
</script> 