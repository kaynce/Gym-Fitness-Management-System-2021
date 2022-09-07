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
    $query = "SELECT * FROM `gym_equipment` WHERE id ='$id' ";
    $result = mysqli_query($con, $query);
    $result_2 = mysqli_fetch_array($result);
    foreach($result_2 as $store =>$catch){
      $$store = $catch;
    }

?>


<div id="custom-content" class="modal-block modal-block-md">

      <section class="panel">
        <header class="panel-heading">
          <h2 class="panel-title">Edit Gym Equipment</h2>
        </header>
        <div class="panel-body">
          <form>
            <input type="hidden" id="edit_id" name="edit_id" value="<?php echo isset($id) ? $id: '' ?>">
            

             <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Purchased Date</label>
              <div class="col-sm-6">
                 <input type="date" id="edit_purchased_date" name="edit_purchased_date" class="form-control" value="<?php echo isset($purchased_date) ? $purchased_date: '' ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Equipment Name</label>
              <div class="col-sm-6">
                 <input type="text" id="edit_equipment_name" name="edit_equipment_name" class="form-control" value="<?php echo isset($equipment_name) ? $equipment_name: '' ?>" placeholder='Enter Equipment Name'>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Description</label>
              <div class="col-sm-6">
                <textarea type="text" id="edit_description" name="edit_description" class="form-control" value="" 
              placeholder='Enter Description'><?php echo isset($description) ? $description: '' ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Vendor</label>
              <div class="col-sm-6">
                 <input type="text" id="edit_vendor" name="edit_vendor" class="form-control" value="<?php echo isset($vendor) ? $vendor: '' ?>" placeholder='Enter Vendor'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Address</label>
              <div class="col-sm-6">
                <textarea type="text" id="edit_address" name="edit_address" class="form-control" value="" placeholder='Enter Address'><?php echo isset($address) ? $address: '' ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Contact</label>
              <div class="col-sm-6">
                 <input type="text" id="edit_contact" name="edit_contact" class="form-control" value="<?php echo isset($contact) ? $contact: '' ?>" placeholder='Enter Contact'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Quantity</label>
              <div class="col-sm-6">
                 <input type="text" id="edit_quantity" name="edit_quantity" class="form-control" value="<?php echo isset($quantity) ? $quantity: '' ?>" placeholder='Enter Quantity'>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-6 control-label text-uppercase text-semibold text-dark">Amount</label>
              <div class="col-sm-6">
                 <input type="text" id="edit_amount" name="edit_amount" class="form-control" value="<?php echo isset($amount) ? $amount: '' ?>" placeholder='Enter Amount'>
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
        let purchased_date = $('#edit_purchased_date').val();
        let equipment_name = $('#edit_equipment_name').val();
        let description = $('#edit_description').val();
        let vendor = $('#edit_vendor').val();
        let address = $('#edit_address').val();
        let contact = $('#edit_contact').val();
        let quantity = $('#edit_quantity').val();
        let amount = $('#edit_amount').val();

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
                    url:'ajax.php?action=edit_gym_equipment_action',
                    type:'post',
                    data:{
                        id:id,
                        purchased_date:purchased_date,
                        equipment_name:equipment_name,
                        description:description,
                        vendor:vendor,
                        address:address,
                        contact:contact,
                        quantity:quantity,
                        amount:amount
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

                            window.location.href = 'gym_equipment';
                      })

              }else{

                Swal.fire({
                      icon: 'warning',
                      title: 'Failed to update!',

                    })

              }
            }

             }); 

     

            }
        })     
      }); 
        //Emd
</script>

