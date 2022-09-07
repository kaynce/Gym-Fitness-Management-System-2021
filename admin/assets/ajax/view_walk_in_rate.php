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
          <h2 class="panel-title">View Walk in Rate</h2>
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
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Student Rate</label>
              <div class="col-sm-6">
                <label id=""><?php echo number_format($row['student_amount'],2); ?></label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Non-Student Rate</label>
              <div class="col-sm-6">
                <label id=""><?php echo number_format($row['non_student_amount'],2); ?></label>
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