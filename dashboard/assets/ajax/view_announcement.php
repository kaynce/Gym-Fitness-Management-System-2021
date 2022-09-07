<?php require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');  ?>

<?php 
$id = $_GET['id'];
$query = "SELECT * FROM `notifications` WHERE id = '$id' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

 ?>



<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Announcement</h2>
        </header>
        <div class="panel-body">
            <form  method="post" novalidate="novalidate">

                   <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $row['id']; ?>" />

                    <div class="form-group">
                      <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date</label>
                      <div class="col-sm-6">
                        <label id="">
                           <span/>
                                <?php 
                                  if(!empty($row['date_created'])){
                                    echo date("M d,Y", strtotime($row['date_created'])); 
                                  }
                                ?>
                            </span>
                        </label>
                      </div>
                    </div>

                   <div class="form-group">
                    <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Message</label>
                    <div class="col-sm-6">
                      <label id="">
                        <span  ><?php echo $row['alert_message']; ?></span>
                      </label>
                    </div>
                  </div>


             <footer class="panel-footer">
              <div class="row">
                <div class="col-md-12 text-right">
                
                  <!-- <button type="submit" id="edit_submit" name="edit_submit" class="btn btn-success" >Save</button> -->

                  <button class="btn btn-default modal-dismiss">Close</button>
                </div>
              </div>
            </footer>

           </form>
        </div>
     
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
