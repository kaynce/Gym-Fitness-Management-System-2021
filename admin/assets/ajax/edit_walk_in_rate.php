<?php  include('../db_connect.php'); ?>


<?php 
  $physical_fitness_id = $_GET['physical_fitness_id'];
  

  $query = "SELECT pf.physical_fitness_id,
                   pf.physical_fitness_name,
                   pfwr.student_amount, 
                   pfwr.non_student_amount      
            FROM 
                   physical_fitness pf
            INNER JOIN 
                   physical_fitness_walk_in_rates pfwr  
            ON pfwr.physical_fitness_id = pf.physical_fitness_id WHERE pf.physical_fitness_id = '$physical_fitness_id'";

  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Walk in Rate</h2>
        </header>
        <div class="panel-body">
          <form>

              <input type="hidden" id="edit_physical_fitness_id" name="edit_training_class_id" class="form-control" value="<?php echo $row['physical_fitness_id']; ?>" />
              

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">
                    <label id=""><?php echo $row['physical_fitness_name']; ?></label>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Student Rate</label>
              <div class="col-sm-6">
                 <input type="number" id="edit_student_amount" name="edit_student_amount" class="form-control" value="<?php echo $row['student_amount']; ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Non-Student Rate</label>
              <div class="col-sm-6">
                 <input type="number" id="edit_non_student_amount" name="edit_non_student_amount" class="form-control" value="<?php echo $row['non_student_amount']; ?>" />
               
              </div>
            </div>
          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="edit"  class="btn btn-success edit" >Save</button>

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

                var edit_physical_fitness_id = $('#edit_physical_fitness_id').val();
                var edit_student_amount = $('#edit_student_amount').val();
                var edit_non_student_amount = $('#edit_non_student_amount').val();

              $.ajax({  
                  url:'ajax.php?action=edit_walk_in_rate',
                  type:'post',
                  data:{
                      edit_physical_fitness_id:edit_physical_fitness_id,
                      edit_student_amount:edit_student_amount,
                      edit_non_student_amount:edit_non_student_amount
                  },  
                  success:function(data, status){ 

                    console.log(data);
                    console.log(status);

                    if (status == 'success') {
                        Swal.fire({
                          icon: 'success',
                          title: 'Updated Successfully!',
                          showConfirmButton: false,
                          timer: 1500
                        }).then((result) => {
                             // if (result.value) {
                                 window.location.href = 'walk_in';
                             // }
                              
                          })
                    }else{
                      Swal.fire({
                          icon: 'error',
                          title: 'Failed to update!'
                        })
                    }
                  }  
             }); 

            }
        })     
      }); 
       //End
</script>
