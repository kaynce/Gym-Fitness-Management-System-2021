<?php  include('../db_connect.php'); ?>


<?php 
  $physical_fitness_id = substr($_GET['physical_fitness_id'], 0 ,5);
  $package_id = substr($_GET['physical_fitness_id'], 5);

  $query = "SELECT pf.id, 
                   pf.physical_fitness_id, 
                   pf.physical_fitness_name, 
                   pfpr.package_id,
                   pfpr.description,
                   pfpr.day,
                   pfpr.week,
                   pfpr.month,
                   pfpr.required_trainor,
                   pfpr.session,
                   pfpr.package_name,
                   pfpr.package_student_amount,
                   pfpr.package_non_student_amount
          FROM 
          physical_fitness pf
          INNER JOIN physical_fitness_packages_rates pfpr
          ON pf.physical_fitness_id = pfpr.physical_fitness_id 
          WHERE pf.physical_fitness_id = '$physical_fitness_id' AND pfpr.package_id = '$package_id'";

  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

  $number = '-------';
  $day_week_month = '';

   if(!empty($row['day'])){    
       $number = $row['day']; 
        $day_week_month = 'Day/s';
   }else if(!empty($row['week'])) {  
       $number = $row['week'];  
        $day_week_month = 'Week/s';
   }else if(!empty($row['month'])) {
       $number = $row['month'];
         $day_week_month = 'Month/s';
   }else{}



?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Package</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_physical_fitness_id" name="edit_physical_fitness_id" class="form-control" value="<?php echo $row['physical_fitness_id']; ?>" />

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness </label>
                <div class="col-sm-6">
                     <!-- <input type="text" id="edit_physical_fitness_name" name="edit_physical_fitness_name" class="form-control" value="<?php echo $row['physical_fitness_name']; ?>" /> -->
                     <label><?php echo $row['physical_fitness_name']; ?></label>
              
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package Name</label>
              <div class="col-sm-6">
                   <input type="text" id="edit_package_name" name="edit_package_name" class="form-control" value="<?php echo $row['package_name']; ?>" />

                  <input type="hidden" id="edit_package_id" name="edit_package_id" class="form-control" value="<?php echo $row['package_id']; ?>" />

              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Description</label>
              <div class="col-sm-6">
                 <textarea rows="5" id="edit_description" name="edit_description" class="form-control" placeholder="Type description..."  required><?php echo $row['description']; ?></textarea>
         
              </div>
            </div>

        


            <!-- <div class="form-group">
                <label class="col-sm-6 control-label">Duration</label>
                <div class="col-sm-6">



                     <input type="number" id="edit_duration" name="edit_duration" class="form-control" value="<?php echo $duration ?>" />
                     <input type="text" id="edit_duration_2" name="edit_duration_2" class="form-control" value="<?php echo $duration_2 ?>" />

                </div>
            </div> -->

             <div class="form-group">
                <label class="col-md-6 control-label text-uppercase text-semibold text-dark">Number of</label>
                <div class="col-md-6">

                      <input type="number" class="form-control"  maxlength="50" id="edit_number" name="edit_number" value="<?php echo isset($number) ? $number:'' ?>" placeholder="Input here" >

                 </div>
             </div>

            <div class="form-group">
               <label class="col-md-6 control-label text-uppercase text-semibold text-dark" for="gender">Day/Week/Month</label>
               <div class="col-md-6">
                   <select type="text" name="edit_day_week_month" required="" class="form-control dropdown " id="edit_day_week_month">
                          <option value=""></option>
                          <option value="Day/s"<?php echo isset($day_week_month) && $day_week_month == 'Day/s' ? 'selected' : '' ?>>Day/s</option>
                          <option value="Week/s"<?php echo isset($day_week_month) && $day_week_month == 'Week/s' ? 'selected' : '' ?>>Week/s</option>
                          <option value="Month/s"<?php echo isset($day_week_month) && $day_week_month == 'Month/s' ? 'selected' : '' ?>>Month/s</option>
                   </select>
              </div>
           </div>

            <div class="form-group">
              <label class="col-md-6 control-label text-uppercase text-semibold text-dark" for="gender">Trainor</label>
                <div class="col-md-6">
                <select type="text" id="edit_required_trainor" name="edit_required_trainor" required="" class="form-control dropdown " >
                  <option></option>
                  <option value="YES" <?php echo isset($row['required_trainor']) && $row['required_trainor'] == 'YES' ? 'selected' : '' ?>>Required</option>
                  <option value="NO" <?php echo isset($row['required_trainor']) && $row['required_trainor'] == 'NO' ? 'selected' : '' ?>>Not Required</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Session</label>
              <div class="col-sm-6">
                   <input type="number" id="edit_session" name="edit_session" class="form-control" value="<?php echo $row['session']; ?>" placeholder='Input 0 for unlimited session' />
             
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Student Rate</label>
              <div class="col-sm-6">
                <input type="number" id="edit_package_student_amount" name="edit_package_student_amount" class="form-control" value="<?php echo $row['package_student_amount']; ?>" />
        
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Non-Student Rate</label>
              <div class="col-sm-6">
                <input type="number" id="edit_package_non_student_amount" name="edit_package_non_student_amount" class="form-control" value="<?php echo $row['package_non_student_amount']; ?>" />
         
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
<script type="text/javascript">
  
    $(document).on('click', '.edit', function(){  

        let edit_physical_fitness_id = $('#edit_physical_fitness_id').val();
        // let edit_physical_fitness_name = $('#edit_physical_fitness_name').val();
        let edit_package_id = $('#edit_package_id').val();
        let edit_package_name = $('#edit_package_name').val();
        let edit_session = $('#edit_session').val();
        let edit_number = $('#edit_number').val();
        let edit_day_week_month = $('#edit_day_week_month').val();
        var edit_required_trainor = $('#edit_required_trainor').val();
        let edit_description = $('#edit_description').val();
        let edit_package_student_amount = $('#edit_package_student_amount').val();
        let edit_package_non_student_amount = $('#edit_package_non_student_amount').val();

         if (edit_physical_fitness_id === '' || edit_package_student_amount === '' || edit_package_non_student_amount === '') {
            
            Swal.fire({
                    icon: 'warning',
                    title: 'Only the Number, Session & Day/Week/Month are allowed to be empty',
                    text: 'Please check the missing field!',
                    //showConfirmButton: false,
                    //timer: 1500
            })  

        }else if(edit_number === '' && edit_day_week_month !== ''){
          Swal.fire({
              icon: 'warning',
              title: 'Input data in Number of'
            })
        }else if(edit_number !== '' && edit_day_week_month === ''){
          Swal.fire({
              icon: 'warning',
              title: 'Select between Day/Week/Month'
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
                    url:'ajax.php?action=edit_package_action',
                    type:'post',
                    data:{
                        edit_physical_fitness_id:edit_physical_fitness_id,
                        edit_package_id:edit_package_id,
                        edit_package_name:edit_package_name,
                        edit_session:edit_session,
                        edit_number:edit_number,
                        edit_day_week_month:edit_day_week_month,
                        edit_required_trainor:edit_required_trainor,
                        edit_description:edit_description,
                        edit_package_student_amount:edit_package_student_amount,
                        edit_package_non_student_amount:edit_package_non_student_amount
                    },  
                    success:function(data, status){ 

                      console.log(data);
                      console.log(status);

                      if (data == 1) {
                          Swal.fire({
                            icon: 'success',
                            title: 'Updated Successfully!',
                            showConfirmButton: false,
                            timer: 1500
                          }).then((result) => {
                               // if (result.value) {
                                   window.location.href = 'packages';
                               // }
                                
                            })
                      }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Update!'
                          })
                      }
                    }  
               }); 

              }
          })
      }
      //End else     
      }); 

    //End
</script>
