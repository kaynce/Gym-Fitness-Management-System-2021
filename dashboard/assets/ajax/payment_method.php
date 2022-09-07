<?php 
if (session_status() === PHP_SESSION_NONE){ 
 	session_start(); 
 }
 
require(dirname(__FILE__).'/../../../admin/assets/db_connect.php');

$value = $_GET['value'];

//Get Client Name
$email = $_SESSION['email'];
$query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `pending_members` WHERE email ='$email'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 1){
	$row_name = mysqli_fetch_assoc($result);
}else{
	$query = "SELECT *,concat(lastname,', ',firstname) AS name FROM `members` WHERE email ='$email'";
	$result = mysqli_query($con, $query);
	$row_name = mysqli_fetch_assoc($result);
}
//End Get Client Name					

//Start Generate reference id
$foo = True;

while($foo){

	//Start creating employeeid
	$letters = '';
	$numbers = '';
	foreach (range('A', 'Z') as $char) {
	    $letters .= $char;
	}
	for($i = 0; $i < 10; $i++){
		$numbers .= $i;
	}

	$date = new DateTime();
	$date_created = $date->format('Y-m-d');

	$reference_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 7);

	// $member_id = substr(str_shuffle($numbers), 0, 5);

	//End creating employeeid
	$query = "SELECT * FROM `enrolls_to` WHERE reference_id='$reference_id'";			

	$result = mysqli_query($con , $query); 

	if (mysqli_num_rows($result) != 1) {
		 $foo = False;
	}
}
//End Generate reference id

if($value == 'cash'){
 ?>

 	<!-- Start Receipt Info -->
 	<hr class='separator'>
	<h4 class='center  text-semibold text-dark text-uppercase'>Receipt Info</h3>

	<div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Reference #:</label>
        <div class='col-md-6' >
           <label  class='control-label'  name="reference_id" id="reference_id" ><?php echo $reference_id; ?></label>
            <input type='hidden' id='reference_id' name='reference_id' value="<?php echo $reference_id; ?>">
        </div>
    </div>

    <div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Name:</label>
        <div class='col-md-6' >
           <label  class='control-label'><?php echo $row_name['name']; ?></label>
           <!--  <input type='text' id='package_name' name='package_name' > -->
        </div>
    </div>


    <div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Date:</label>
        <div class='col-md-6' >
           <label  class='control-label'><?php echo date("M d, Y", strtotime($date_created)); ?></label>
           <!--  <input type='text' id='package_name' name='package_name' > -->
        </div>
    </div>
    <!-- End Receipt Info -->

    <!-- Start Fitness Info -->
    <hr class='separator'>
	<h4 class='center  text-semibold text-dark text-uppercase'>Fitness Info</h3>

	<?php if(isset($_SESSION['for_receipt_package_name'])){ ?>
	    <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Package Name:</label>
	        <div class='col-md-6' >
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_package_name'] ?></label>
	           <!--  <input type='text' id='package_name' name='package_name' > -->
	        </div>
	    </div>
	<?php } ?>


	<?php if(isset($_SESSION['for_receipt_one_day']) || isset($_SESSION['for_receipt_duration'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Duration:</label>
	        <div class='col-md-6' >
	        	<?php if(isset($_SESSION['for_receipt_one_day'])){ ?>
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_one_day'] ?></label>
	          <?php }else{ ?>
	          	<label  class='control-label'><?php echo $_SESSION['for_receipt_duration'] ?></label>
	          <?php } ?>
	        </div>
	    </div>
    <?php } ?>

    <?php if(isset($_SESSION['for_receipt_session'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Session:</label>
	        <div class='col-md-6' >
	          	<label  class='control-label'><?php echo $_SESSION['for_receipt_session'] ?></label>
	        </div>
	    </div>
    <?php } ?>


    <?php if(isset($_SESSION['for_receipt_amount'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Amount:</label>
	        <div class='col-md-6' >
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_amount'] ?></label>
	           <!--  <input type='text' id='package_name' name='package_name' > -->
	        </div>
	    </div>
	<?php } ?>
	<!-- End Fitness Info -->

	<!-- Start Trainor Info -->
	<?php if(isset($_SESSION['for_receipt_trainor_name'])){ ?>
		    <hr class='separator'>
			<h4 class='center  text-semibold text-dark text-uppercase'>Trainor Info</h3>

			<div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Name:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_trainor_name'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>

	    <?php if(isset($_SESSION['for_receipt_about_me'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>About:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_about_me'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_motto'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Motto:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_motto'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_weight'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Weight:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_weight'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_height'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Height:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_height'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>
	<?php } ?>
	<!-- End Trainor Info -->

<?php }else{ ?>

	<!-- Start Receipt Info -->
	<hr class='separator'>
	<h4 class='center  text-semibold text-dark text-uppercase'>Receipt Info</h3>

	<div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Reference #:</label>
        <div class='col-md-6' >
           <label  class='control-label' id="receipt_amount" ><?php echo $reference_id; ?></label>
            <input type='hidden' id='reference_id' name='reference_id' value="<?php echo $reference_id; ?>">
        </div>
    </div>


    <div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Name:</label>
        <div class='col-md-6' >
           <label  class='control-label'><?php echo $row_name['name']; ?></label>
           <!--  <input type='text' id='package_name' name='package_name' > -->
        </div>
    </div>

    <div class='form-group'>
        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Date:</label>
        <div class='col-md-6' >
           <label  class='control-label'><?php echo date("M d, Y", strtotime($date_created)); ?></label>
           <!--  <input type='text' id='package_name' name='package_name' > -->
        </div>
    </div>
    <!-- End Receipt Info -->

    <!-- Start Fitness Info -->
    <hr class='separator'>
	<h4 class='center  text-semibold text-dark text-uppercase'>Fitness Info</h3>

	<?php if(isset($_SESSION['for_receipt_package_name'])){ ?>
	    <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Package Name:</label>
	        <div class='col-md-6' >
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_package_name'] ?></label>
	           <!--  <input type='text' id='package_name' name='package_name' > -->
	        </div>
	    </div>
	<?php } ?>


	<?php if(isset($_SESSION['for_receipt_one_day']) || isset($_SESSION['for_receipt_duration'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Duration:</label>
	        <div class='col-md-6' >
	        	<?php if(isset($_SESSION['for_receipt_one_day'])){ ?>
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_one_day'] ?></label>
	          <?php }else{ ?>
	          	<label  class='control-label'><?php echo $_SESSION['for_receipt_duration'] ?></label>
	          <?php } ?>
	        </div>
	    </div>
    <?php } ?>

    <?php if(isset($_SESSION['for_receipt_session'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Session:</label>
	        <div class='col-md-6' >
	          	<label  class='control-label'><?php echo $_SESSION['for_receipt_session'] ?></label>
	        </div>
	    </div>
    <?php } ?>


    <?php if(isset($_SESSION['for_receipt_amount'])){ ?>
	     <div class='form-group'>
	        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Amount:</label>
	        <div class='col-md-6' >
	           <label  class='control-label'><?php echo $_SESSION['for_receipt_amount'] ?></label>
	           <!--  <input type='text' id='package_name' name='package_name' > -->
	        </div>
	    </div>
	<?php } ?>
	<!-- End Fitness Info -->

	<!-- Start Trainor Info -->
    <?php if(isset($_SESSION['for_receipt_trainor_name'])){ ?>
		    <hr class='separator'>
			<h4 class='center  text-semibold text-dark text-uppercase'>Trainor Info</h3>

			<div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Name:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_trainor_name'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>

	    <?php if(isset($_SESSION['for_receipt_about_me'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>About:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_about_me'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_motto'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Motto:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_motto'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_weight'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Weight:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_weight'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>

	    <?php if(isset($_SESSION['for_receipt_height'])){ ?>
		    <div class='form-group'>
		        <label class='col-md-3 control-label text-semibold text-dark text-uppercase'>Height:</label>
		        <div class='col-md-6' >
		           <label  class='control-label'><?php echo $_SESSION['for_receipt_height'] ?></label>
		           <!--  <input type='text' id='package_name' name='package_name' > -->
		        </div>
		    </div>
	    <?php } ?>
	<?php } ?>
	<!-- End Trainor Info -->

	<?php 
	    $query = "SELECT * FROM `settings` WHERE setting_id = '140' ";
		$result = mysqli_query($con, $query);

	    if(mysqli_num_rows($result)){
			$row = mysqli_fetch_assoc($result);
		}
	?>

	<!-- Start GCASH Info -->
    <hr class='separator'>
	<h4 class='center  text-semibold text-dark text-uppercase'>GCASH</h3>

	<div class="form-group">
		<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="w4-cc">HMG Business Gcash Number: </label>
		<div class="col-md-6">
			<label class=" control-label " for="w4-cc"><?php echo isset($row['p_one']) ? $row['p_one']: '' ?></label>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="w4-cc">Name: </label>
		<div class="col-md-6">
			<label class=" control-label " for="w4-cc"><?php echo isset($row['p_two']) ? $row['p_two']: '' ?></label>
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-3 control-label text-semibold text-dark text-uppercase" for="w4-cc">Screenshot of payment: </label>
		<div class="col-md-6">
	        <div class="fileupload fileupload-new" data-provides="fileupload">
	          <div class="input-append">
	            <div class="uneditable-input">
	              <i class="fa fa-file fileupload-exists"></i>
	              <span class="fileupload-preview"></span>
	            </div>
	            <span class="btn btn-default btn-file">
	              <span class="fileupload-exists">Change</span>
	              <span class="fileupload-new">Select file</span>
	              <input type="file" accept="image/*" id="screenshot_payment_file"  name="screenshot_payment_file" onchange="displayImgPayment(this,$(this))" required />
	            </span>
	            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
	          </div>
	        </div>
		</div>
	</div>		

	 <div class="form-group">
	    <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Image</label>
	    <div class="col-md-6">
	      <img  id="img_payment" class="img-responsive img-rounded img-thumbnail" style="min-width: 100%; min-height: 100%;">
	      <span id="message_image"></span>
		</div>
	</div>

<?php } ?>
<!-- End GCASH Info -->

<script>
	$(document).on('click', '.provide', function(e){
		e.preventDefault();
		console.log('Working');
		alert('asd');
	})

	var myOptions = {
    val1 : 'Married',
    val2 : 'Single'
	};
	var mySelect = $('#sosstat');
	$.each(myOptions, function(val, text) {
	    mySelect.append(
	        $('<option></option>').val(val).html(text)
	    );
	});
</script>