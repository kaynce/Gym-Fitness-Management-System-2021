<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
<?php include('head.php'); ?>
  
   <!--  Start main-wrapper -->
    <div id="main-wrapper">

        <?php include('header.php'); ?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="card">
                         <form class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Add Plan</h4>

                                    <div class="form-group row" >
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label" >Plan Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="Plan Name Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Plan Details</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="plan_details" name="plan_details" placeholder="Plan Details Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Months</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="plan_months" name="plan_months" placeholder="Months Here">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="plan_amount" name="plan_amount" placeholder="Amount Here">
                                        </div>
                                    </div>

                                 
                                </div>
                                <div class="border-top mb-5">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" onclick="addPlan()" style="float: left">Submit</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
            <!-- End Container fluid  -->
        </div>   
        <!-- End Page wrapper  -->

    </div>

    <!-- End main wrapper -->

<script >
    //add data function
        function addPlan(){
            var plan_name = $('#plan_name').val();
            var plan_details=$('#plan_details').val();
            var plan_months=$('#plan_months').val();
            var plan_amount=$('#plan_amount').val();

            $.ajax({
                url:'insert_new_plan_action.php',
                type:'POST',
                data:{
                    plan_name:plan_name,
                    plan_details:plan_details,
                    plan_months:plan_months,
                    plan_amount:plan_amount
                },
                success:function(data, status){
                    //function to display data
                 console.log(status);
                  // console.log(data);
                
                if (status == 'success') {

                    if (plan_name != '' && plan_details != '' && 
                        plan_months != ''      && plan_amount != '') {

                   
                    Swal.fire(
                      'Successfully saved!',
                      '',
                      'success'
                    )

                    document.getElementById('plan_name').value='';
                    document.getElementById('plan_details').value='';
                    document.getElementById('plan_months').value='';
                    document.getElementById('plan_amount').value='';
                }

                // $j('#submit').click(function(event){
                //     $j('#package').val('');
                //     event.preventDefault();
                // });

                 }
                }
            }); 
        }
</script>
<?php include('footer.php'); ?>