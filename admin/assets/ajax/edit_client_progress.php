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

<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Client's Progress</h2>
        </header>
        <div class="panel-body">
          <form>
             <input type="hidden" id="edit_id" name="edit_id" class="form-control" value="<?php echo $id ?>" />
            
            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Weight</label>
                 <input type="number" id="edit_weight" name="edit_weight" class="form-control" value="<?php echo isset($weight) ? $weight: '' ?>" placeholder='Input weight' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Fats</label>
                 <input type="number" id="edit_body_fats" name="edit_body_fats" class="form-control" value="<?php echo isset($body_fats) ? $body_fats: '' ?>" placeholder='Input body fats' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Bone Density</label>
                    <input type="number" id="edit_bone_density" name="edit_bone_density" class="form-control" value="<?php echo isset($bone_density) ? $bone_density: '' ?>" placeholder='Input bone density' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Water</label>
                <input type="number" id="edit_body_water" name="edit_body_water" class="form-control" value="<?php echo isset($body_water) ? $body_water: '' ?>" placeholder='Input body water' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Muscle Mass</label>
                <input type="number" id="edit_muscle_mass" name="edit_muscle_mass" class="form-control" value="<?php echo isset($muscle_mass) ? $muscle_mass: '' ?>" placeholder='Input muscle mass' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Body Structure</label>
                <input type="number" id="edit_body_structure" name="edit_body_structure" class="form-control" value="<?php echo isset($body_structure) ? $body_structure: '' ?>" placeholder='Input body structure' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Basal Metabolic (BM)</label>
                 <input type="number" id="edit_basal_metalic" name="edit_basal_metalic" class="form-control" value="<?php echo isset($basal_metabolic) ? $basal_metabolic: '' ?>" placeholder='Input basal metabolic' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Metabolic Age</label>
                <input type="number" id="edit_metabolic_age" name="edit_metabolic_age" class="form-control" value="<?php echo isset($metabolic_age) ? $metabolic_age: '' ?>" placeholder='Input metabolic age' />
            </div>

            <div class="col-md-4">
                <label class="control-label text-uppercase text-semibold text-dark">Visceral Fats</label>
                 <input type="number" id="edit_visceral_fats" name="edit_visceral_fats" class="form-control" value="<?php echo isset($visceral_fats) ? $visceral_fats: '' ?>" placeholder='Input visceral fats' />
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
<script>


 $(document).ready(function(){  

      $(document).on('click', '.edit', function(){  
        
        Swal.fire({
           title: 'Do you want to update?',
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'            
        }).then((result) => {
            if (result.value) {

              // var member_id = $(this).attr("id");  
               let id =$('#edit_id').val();
               let weight = $('#edit_weight').val();
               let body_fats = $('#edit_body_fats').val();
               let bone_density = $('#edit_bone_density').val();
               let body_water = $('#edit_body_water').val();
               let muscle_mass = $('#edit_muscle_mass').val();
               let body_structure = $('#edit_body_structure').val();
               let basal_metabolic = $('#edit_basal_metalic').val();
               let metabolic_age = $('#edit_metabolic_age').val();
               let visceral_fats = $('#edit_visceral_fats').val();

              $.ajax({  
                  url:'ajax.php?action=edit_progress_action',
                  type:'post',
                  data:{
                      id:id,
                      weight:weight,
                      body_fats:body_fats,
                      bone_density:bone_density,
                      body_water:body_water,
                      muscle_mass:muscle_mass,
                      body_structure:body_structure,
                      basal_metabolic:basal_metabolic,
                      metabolic_age:metabolic_age,
                      visceral_fats:visceral_fats
                  },  
                  success:function(data, status){ 

                    console.log(data);

                    if (data == 1) {
                      Swal.fire({
                      icon: 'success',
                      title: 'Updated Successfully!',
                      showConfirmButton: false,
                      timer: 1500
                    }).then((result) => {
                       // if (result.value) {
                           window.location.href = 'view_health_status?member_id=<?php echo $member_id ?>';
                       // }
                        
                    })     
                    }else{
                      Swal.fire({
                        icon: 'error',
                        title: 'Update failed',
                      })
                    }

                  }  
             }); 

            }
        })     
      }); 

 });  
 //End
</script>