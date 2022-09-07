<?php  require(dirname(__FILE__).'/../../../admin/assets/db_connect.php'); ?>

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
    $query = "SELECT * FROM `health_status` WHERE id ='$id' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result); 
?>


<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Info</h2>
        </header>
        <div class="panel-body">
          <form>


            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['date_created']; 
                  ?> 
                  </label>
              </div>
            </div>  

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Weight</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['weight']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Fats</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['body_fats']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Bone Density</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['bone_density']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Water</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['body_water']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Muscle Mass</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['muscle_mass']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Structure</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['body_structure']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Basal Metabolic (BM)</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['basal_metabolic']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Metabolic Age</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['metabolic_age']; 
                  ?> 
                  </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Visceral Fats</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                  echo $row['metabolic_age']; 
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