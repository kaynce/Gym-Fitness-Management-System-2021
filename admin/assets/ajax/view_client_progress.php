<?php  include('../db_connect.php'); ?>

<?php   
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM `health_status` WHERE id=$id";
        $result = mysqli_query($con, $query);
        $result_2 = mysqli_fetch_array($result);
        foreach($result_2 as $store =>$catch){
          $$store = $catch;
        }
    }
?>

<div id="custom-content" class="modal-block modal-block-sm">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Client's Progress</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $id ?>" />
            
           <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Weight</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                   echo isset($weight) ? $weight: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Fats</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                    echo isset($body_fats) ? $body_fats: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Bone Density</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                    echo isset($bone_density) ? $bone_density: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Water</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                    echo isset($body_water) ? $body_water: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Muscle Mass</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                    echo isset($muscle_mass) ? $muscle_mass: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Body Structure</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                   echo isset($body_structure) ? $body_structure: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Basal Metabolic (BM)</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                   echo isset($basal_metabolic) ? $basal_metabolic: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Metabolic Age</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                    echo isset($metabolic_age) ? $metabolic_age: '';
                  ?>
                </label>
            </div>
           </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Visceral Fats</label>
                <div class="col-sm-6">
                  <label id="">
                  <?php 
                   echo isset($visceral_fats) ? $visceral_fats: '';
                  ?>
                </label>
            </div>
           </div>


          </form>
        </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="button" id="add"  class="btn btn-success edit" >Save</button>
            <button class="btn btn-default modal-dismiss">Cancel</button>
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
