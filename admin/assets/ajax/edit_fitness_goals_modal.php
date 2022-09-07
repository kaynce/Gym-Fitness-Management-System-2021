<?php  include('../db_connect.php'); ?>

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
    $result_2 = mysqli_fetch_array($result);
    foreach($result_2 as $store =>$catch){
      $$store = $catch;
    }

?>


<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">View Fitness Goal</h2>
        </header>
        <div class="panel-body">
          <form>
            <input type="hidden" id="edit_id" name="edit_id" value="<?php echo isset($id) ? $id: '' ?>">
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Created</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                    echo date("M d,Y",strtotime(isset($date_created) ? $date_created: ''));

                  ?> 
                  </label>
              </div>
            </div>  

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Goal</label>
              <div class="col-sm-6">
                <textarea type="text" id="edit_goal" name="edit_goal" class="form-control" value="" placeholder='Enter goal'><?php echo isset($goal) ? $goal: '' ?></textarea>
                 
              </div>
            </div>

            <hr class="separator">

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Date Goal</label>
              <div class="col-sm-6">
                <label id="">
                  <?php 
                    if(!empty($date_goal)){
                      echo date("M d,Y",strtotime(isset($date_goal) ? $date_goal: ''));
                    }
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
.control-label{
  font-weight: bold;
}
 label{
    font-size: 1.7rem;
  }
</style>

<script type="text/javascript">
  
     //Edit
      $(document).on('click', '.edit', function(){  
          
        // var id = $(this).attr("id");  
        let id = $('#edit_id').val();
        let goal = $('#edit_goal').val();

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

              // var id = $(this).attr("id");  

              $.ajax({  
                  url:'ajax.php?action=edit_fitness_goals_action',
                  type:'post',
                  data:{
                      id:id,
                      goal:goal
                  },
                  success:function(data, resp){

                  console.log(data);

                  console.log(resp);

            if(data == 1){

              Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully!',
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) =>{

                        window.location.href = 'view_fitness_goals?member_id=<?php echo $member_id; ?>';
                  })

            }else{

              Swal.fire({
                    icon: 'warning',
                    title: 'Failed to delete!',

                  })

            }
          }

             }); 

     

            }
        })     
      }); 
        //Emd
</script>

