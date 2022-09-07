<?php  include('../db_connect.php'); ?>


<?php 
$id = $_GET['id'];
$query = "SELECT * FROM `classes_timetable_schedule` WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

 ?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Schedule</h2>
        </header>
        <div class="panel-body">
            <form>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Time from</label>
                  <br>
                  <label id=""><?php echo date("h:i A", strtotime($row['time_from']));  ?></label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Time to</label>
                  <br>
                  <label id=""><?php echo date("h:i A", strtotime($row['time_to']));  ?></label>  
              </div>
              
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Monday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['monday'])){
                        echo $row['monday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                    <?php 
                      $trainor_id = $row['monday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                    ?>
                    </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Tuesday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['tuesday'])){
                        echo $row['tuesday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                  <?php 
                      $trainor_id = $row['tuesday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>  
                  </label>  
              </div>
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Wednesday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['wednesday'])){
                        echo $row['wednesday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                  <?php 
                      $trainor_id = $row['wednesday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>
                  </label>  
              </div>
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Thursday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['thursday'])){
                        echo $row['thursday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                  <?php 
                      $trainor_id = $row['thursday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>
                  </label>  
              </div>
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Friday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['friday'])){
                        echo $row['friday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                  <?php 
                      $trainor_id = $row['friday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>
                  </label>  
              </div>
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Saturday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['saturday'])){
                        echo $row['saturday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                    <?php 
                      $trainor_id = $row['saturday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>
                  </label>  
              </div>
              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Sunday </label>
                  <br>
                  <label id="">
                    <?php 
                      if(!empty($row['sunday'])){
                        echo $row['sunday'];  
                      }else{
                        echo '-------';
                      }
                    ?>
                  </label>  
              </div>

              <div class="col-md-6">
                  <label class="control-label text-uppercase text-semibold text-dark">Trainor </label>
                  <br>
                  <label id="">
                    <?php 
                      $trainor_id = $row['sunday_trainor'];
                      $query_trainor = "SELECT *, concat(lastname, ', ' , firstname ) AS name FROM `users` WHERE user_id = '$trainor_id' ";
                      $result_trainor = mysqli_query($con, $query_trainor);
                      if(mysqli_num_rows($result_trainor) > 0){
                        $row_trainor = mysqli_fetch_assoc($result_trainor);
                        echo $row_trainor['name'];
                      }else{
                        echo '-------';
                      }
                  ?>
                  </label>  
              </div>


           </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
           <!--  <button type="button" id="add"  class="btn btn-success add" >Save</button>
 -->
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