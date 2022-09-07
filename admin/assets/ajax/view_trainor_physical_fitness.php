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
          <h2 class="panel-title">View Trainor's Info</h2>
        </header>
        <div class="panel-body">
          <form>
             <div class="form-group">
                <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Trainor ID </label>
                <div class="col-sm-6">
                    <!--  <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="" readonly /> -->
                     <label><?php echo $row_trainor['user_id']; ?></label>
              
                </div>
            </div>

             <?php 
                $user_id = $row_trainor['user_id'];
                $query_name = "SELECT *, CONCAT(lastname, ', ', firstname) AS name FROM `users` WHERE user_id = '$user_id' ";
                $result_name = mysqli_query($con, $query_name);
                $row_name = mysqli_fetch_assoc($result_name);
              ?>
             <div class="form-group">
                <label class="col-sm-3 control-label text-uppercase text-semibold text-dark">Name </label>
                <div class="col-sm-6">
                    <!--  <input type="text" id="edit_firstname" name="edit_firstname" class="form-control" value="" readonly /> -->
                     <label><?php echo  ucwords($row_name['name']); ?></label>
              
                </div>
            </div>

           <div class="form-group">
              <label class="col-md-3 control-label text-uppercase text-semibold text-dark" for="gender">Physical Fitness</label>
              <div class="col-md-6">
            
                <label>
                  <?php  
                    $physical_fitness_id = $row_trainor['physical_fitness_id'];
                    $query = "SELECT * FROM physical_fitness WHERE physical_fitness_id = '$physical_fitness_id' ";
                    $result = mysqli_query($con, $query);

                    $row = mysqli_fetch_array($result);
                    echo $row['physical_fitness_name']; 
                  ?>     
                </label>         
              
              </div>
            </div>

          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
            <button class="btn btn-default modal-dismiss">Close</button>
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


 
</script>