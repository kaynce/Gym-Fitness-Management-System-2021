<?php  require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');  ?>

<?php 
// $member_id = $_GET['member_user_id'];
// $query = "SELECT * FROM `members` WHERE member_id = '$member_id'";
// // $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `members` WHERE member_id ='member_id' ";

// $result = mysqli_query($con, $query);
// $row = mysqli_fetch_assoc($result);

//if there is no member id go to users
?>

<?php 
    $id = $_GET['id'];
    $query = "SELECT * FROM `fitness_goals` WHERE id ='$id' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result); 
?>


<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Fitness Goal</h2>
        </header>
        <div class="panel-body">
          <form>


            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                    echo date("M d,Y",strtotime($row['date_created']));
                  ?> 
                  </label>
              </div>
            </div>  

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Goal</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['goal']; 
                  ?> 
                  </label>
              </div>
            </div>

            <hr class="separator">

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Goal</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo date("M d,Y",strtotime($row['date_goal']));
                  ?> 
                  </label>
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
  font-weight: bold;
}
 label{
    font-size: 1.7rem;
  }
</script>