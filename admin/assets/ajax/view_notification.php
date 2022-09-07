<?php require('../db_connect.php'); ?>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM `notifications` WHERE id = '$id' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

 ?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Notification</h2>
        </header>
        <div class="panel-body">
            <form>
              <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
                  <div class="col-sm-6">
                    <label id="">
                    <?php 
                      if(!empty($row['date_created'])){
                        echo date("M d, Y", strtotime($row['date_created'])); 
                      }
                    ?>
                  </label>
                  </div>
                </div>

                <?php 
                  $type = $_SESSION['type'];

                  if($type == 'admin' || $type == 'sub_admin'){
                ?>
               <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Name</label>
                  <div class="col-sm-6">
                    <label id="">
                      <?php 
                        $email = $row['email'];
                        $query_name = "SELECT *, concat(lastname, ', ', firstname) AS name FROM `pending_members` WHERE email = '$email' ";
                        $result_name = mysqli_query($con, $query_name);

                        if(mysqli_num_rows($result_name) == 1){
                          $row_name = mysqli_fetch_assoc($result_name); 
                        }else{
                          //If there is no data in members table go to users table
                          $query_name = "SELECT *, concat(lastname, ', ', firstname) AS name  FROM `members` WHERE email = '$email' ";
                          $result_name = mysqli_query($con, $query_name);
                          $row_name = mysqli_fetch_assoc($result_name); 
                        }
                       ?>

                      <?php echo $row_name['name']; ?>
                    </label>             
                  </div>
                </div>
              <?php } ?>

                <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Title</label>
                  <div class="col-sm-6">
                    <label id=""><?php echo $row['alert_title']; ?></label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Message</label>
                  <div class="col-sm-6">
                    <label id=""><?php echo $row['alert_message']; ?></label>
                  </div>
                </div>


           </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
          
     <!--        <button type="button" id="add"  class="btn btn-success add" >Save</button> -->

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