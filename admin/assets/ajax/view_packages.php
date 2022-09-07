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

  $duration = '';

   if(!empty($row['day'])){    
       $duration = $row['day'].' Day/s';  
   }else if(!empty($row['week'])) {  
       $duration = $row['week'].' Week/s';  
   }else if(!empty($row['month'])) {
       $duration = $row['month'].' Month/s';
   }else{}

?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Package</h2>
        </header>
        <div class="panel-body">
          <form>

            

            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Physical Fitness</label>
                <div class="col-sm-6">

                  <label id=""><?php echo $row['physical_fitness_name']; ?></label>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package Name</label>
              <div class="col-sm-6">
                <label id=""><?php echo $row['package_name']; ?></label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Trainor</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                      if($row['required_trainor'] == 'YES'){
                        echo 'Required';
                      }else{
                        echo 'Not required';
                      } 
                  ?>
                  </label>
              </div>
            </div>

            <?php if(!empty($row['session'])){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Session</label>
              <div class="col-sm-6">
                <?php if(!empty($row['session'])){ ?>

                  <label id=""><?php echo $row['session']; ?></label>

                <?php }else{  ?>

                  <label id="">UNLIMITED</label>
                  
                <?php } ?>
                
              </div>
            </div>
            <?php } ?>

             <?php if(!empty($duration)){ ?>
            <div class="form-group">
                <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Duration</label>
                <div class="col-sm-6">
                  <label id=""><?php echo $duration; ?></label>
                </div>
            </div>
            <?php } ?>

            <?php if(!empty($row['description'])){ ?>
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Package Description</label>
              <div class="col-sm-6">
                <label id=""><?php echo $row['description']; ?></label>
              </div>
            </div>
            <?php } ?>

     
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Student Rate</label>
              <div class="col-sm-6">
                <label id=""><?php echo number_format($row['package_student_amount'],2); ?></label>
              </div>
            </div>

            
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Non-Student Rate</label>
              <div class="col-sm-6">
                <label id=""><?php echo number_format($row['package_non_student_amount'],2); ?></label>
              </div>
            </div>

          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
          <!--   <button type="button" id="add"  class="btn btn-success add" >Save</button> -->

            <button class="btn btn-default modal-dismiss">Cancel</button>
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