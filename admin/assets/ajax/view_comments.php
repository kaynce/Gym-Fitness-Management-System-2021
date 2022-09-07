<?php  include('../db_connect.php'); ?>


<?php 
$id = $_GET['id'];
$query = "SELECT * FROM `comments` WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

 ?>

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Comment</h2>
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

               <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Name</label>
                  <div class="col-sm-6">
                    <label id=""><?php echo ucwords($row['name']); ?></label>             
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Email</label>
                  <div class="col-sm-6">
                    <label id=""><?php echo $row['email']; ?></label> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Comment</label>
                  <div class="col-sm-6">
                    <label id=""><?php echo $row['comment']; ?></label>
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