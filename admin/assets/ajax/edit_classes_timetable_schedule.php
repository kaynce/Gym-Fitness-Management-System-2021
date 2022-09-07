<?php  include('../db_connect.php'); ?>


<?php 
$id = $_GET['id'];
$query_schedule = "SELECT * FROM `classes_timetable_schedule` WHERE id = '$id'";
$result_schedule = mysqli_query($con, $query_schedule);
$row_schedule = mysqli_fetch_assoc($result_schedule);

 ?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Schedule</h2>
        </header>
        <div class="panel-body">
            <form>

               <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row_schedule['id']; ?>" class="form-control" >

               <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Time from</label>
                <input type="time" name="edit_time_from" id="edit_time_from" value="<?php echo $row_schedule['time_from']; ?>" class="form-control" required>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Time to</label>
                <input type="time" name="edit_time_to" id="edit_time_to" class="form-control" value="<?php echo $row_schedule['time_to']; ?>" required>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Monday</label>
                <select type="text" name="edit_monday" id="edit_monday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['monday']) && $row_schedule['monday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>  
             </div>


             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                 <select type="text" name="edit_monday_trainor" id="edit_monday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                          
                            echo isset($row_schedule['monday_trainor']) && $row_schedule['monday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>    
            </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Tuesday</label>
                <select type="text" name="edit_tuesday" id="edit_tuesday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['tuesday']) && $row_schedule['tuesday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_tuesday_trainor"  id="edit_tuesday_trainor" class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                          
                            echo isset($row_schedule['tuesday_trainor']) && $row_schedule['tuesday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Wednesday</label>
                <select type="text" name="edit_wednesday" id="edit_wednesday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['wednesday']) && $row_schedule['wednesday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_wednesday_trainor" id="edit_wednesday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                                                    
                            echo isset($row_schedule['wednesday_trainor']) && $row_schedule['wednesday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Thursday</label>
                <select type="text" name="edit_thursday" id="edit_thursday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['thursday']) && $row_schedule['thursday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_thursday_trainor" id="edit_thursday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                           
                            echo isset($row_schedule['thursday_trainor']) && $row_schedule['thursday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Friday</label>
                <select type="text" name="edit_friday" id="edit_friday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['friday']) && $row_schedule['friday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_friday_trainor" id="edit_friday_trainor" class="form-control dropdown "  value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                           
                            echo isset($row_schedule['friday_trainor']) && $row_schedule['friday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Saturday</label>
                <select type="text" name="edit_saturday" id="edit_saturday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['saturday']) && $row_schedule['saturday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_saturday_trainor" id="edit_saturday_trainor"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['saturday_trainor']) && $row_schedule['saturday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Sunday</label>
                <select type="text" name="edit_sunday" id="edit_sunday"  class="form-control dropdown " value=""  required="">
                      <option></option>
                      <?php 
                       $query = "SELECT * FROM physical_fitness ORDER BY id DESC ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['physical_fitness_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['sunday']) && $row_schedule['sunday'] == $row['physical_fitness_id'] ? 'selected' : '' ?>>
                            <?php echo $row['physical_fitness_name'];
                        ?>
                      </option>

                     <?php } ?>
                  </select>
             </div>

             <div class="col-md-6">
                <label class="control-label text-uppercase text-semibold text-dark">Trainor</label>
                <select type="text" name="edit_sunday_trainor" id="edit_sunday_trainor" class="form-control dropdown "  value=""  required="">
                      <option></option>
                      <?php 
                        $query= "SELECT *, concat(lastname, ', ' ,firstname) AS name FROM `users` WHERE type = 'trainor' ";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                      ?>  
                       <option value="<?php echo $row['user_id']; ?>" 
                        <?php 
                            echo isset($row_schedule['sunday_trainor']) && $row_schedule['sunday_trainor'] == $row['user_id'] ? 'selected' : '' ?>>
                            <?php echo $row['name'];
                        ?>
                      
                      </option>
                     <?php } ?>
                  </select>  
             </div>
              


           </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
            <button type="button" id="add"  class="btn btn-success edit" >Save</button>

            <button class="btn btn-default modal-dismiss">Close</button>
          </div>
        </div>
      </footer>
    </section>
 
</div>


<style type="text/css">

  .control-label{
    font-weight: 500;
  }
   label{
    font-size: 1.7rem!important;
  }

</style>

<script>
   $(document).ready(function(){  

      $(document).on('click', '.edit', function(){  
        
        let id = $("#edit_id").val();
        let time_from = $("#edit_time_from").val();
        let time_to = $("#edit_time_to").val();
        let monday = $("#edit_monday").val();
        let monday_trainor = $("#edit_monday_trainor").val();
        let tuesday = $("#edit_tuesday").val();
        let tuesday_trainor = $("#edit_tuesday_trainor").val();
        let wednesday = $("#edit_wednesday").val();
        let wednesday_trainor = $("#edit_wednesday_trainor").val();
        let thursday = $("#edit_thursday").val();
        let thursday_trainor = $("#edit_thursday_trainor").val();
        let friday = $("#edit_friday").val();
        let friday_trainor = $("#edit_friday_trainor").val();
        let saturday = $("#edit_saturday").val();
        let saturday_trainor = $("#edit_saturday_trainor").val();
        let sunday = $("#edit_sunday").val();
        let sunday_trainor = $("#edit_sunday_trainor").val();

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
                  url:'ajax.php?action=edit_classes_timetable_schedule',
                  type:'post',
                  data:{
                      id:id,
                      time_from:time_from,
                      time_to:time_to,
                      monday:monday,
                      monday_trainor:monday_trainor,
                      tuesday:tuesday,
                      tuesday_trainor:tuesday_trainor,
                      wednesday:wednesday,
                      wednesday_trainor:wednesday_trainor,
                      thursday:thursday,
                      thursday_trainor:thursday_trainor,
                      friday:friday,
                      friday_trainor:friday_trainor,
                      saturday:saturday,
                      saturday_trainor:saturday_trainor,
                      sunday:sunday,
                      sunday_trainor:sunday_trainor
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
                  }).then(result => {
                    window.location.href = 'classes_timetable_schedule';
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
 });  

</script>