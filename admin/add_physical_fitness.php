<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }

  $nav_dashboard_expanded_t_classes = "nav-expanded";
  $nav_active_dashboard_t_classes  = "nav-active";
  $nav_active_a_class  = "nav-active";


 ?>
 
<?php include('head.php'); ?>

<?php 


// echo 'hello';

#check if image sent
$error = '';
$msg = '';

if (isset($_POST['submit'])) {

	if (isset($_FILES['my_image'])) {

		# getting image data and store them in var
		$img_name = $_FILES['my_image']['name'];
		$img_size = $_FILES['my_image']['size'];
		$tmp_name = $_FILES['my_image']['tmp_name'];
		$error = $_FILES['my_image']['error'];

		//$firstname = $_POST['firstname'];

		#if there is no error occurred while uploading
		if ($error === 0) {
		 	if($img_size > 10000000){
		 		#error message 
			 	$msg = "Sorry, your file is too large!";

			 	#response array
			 	$msg = array('error' => 1, 'em' => $em);

			 	
			 	?>

					<script>alert('Sorry, your file is too large!!')</script>

					<?php

		 	} else {
		 		// echo "Okay!";
		 		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

		 		// echo $img_ex;

		 		/**
		 		convert the image extension into lower case and 
		 		store it in var 
		 		**/

		 		$img_ex_lc = strtolower($img_ex);

		 		/**
		 		creating array that stores 
		 		allowed to upload image extensions. 
		 		**/

		 		$allowed_exs = array("jpg", "jpeg", "png");

		 		/**
		 		check if the image extension is 
		 		present in $allowed_exs array
		 		**/
		 		if(in_array($img_ex_lc, $allowed_exs)){
		 			//Start
		 		
					$physical_fitness_name = $_POST['physical_fitness_name'];
					$description = $_POST['description'];
					$owner_percent = $_POST['owner_percent'];
					$trainor_percent = $_POST['trainor_percent'];
					// End

		 			/**
		 			renaming the image name width
		 			with random string 
		 			**/
		 			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

		 			#creating upload path on root directory

		 			$img_upload_path = "../assets/images/classes/".$new_img_name;

		 			#move uploaded image to 'uploads' folder
		 			move_uploaded_file($tmp_name, $img_upload_path);

		 			#inserting image name into database

		 			// $query = "INSERT INTO `users` (image)
						// VALUES ('$new_img_name')";

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
						
						// $value_member_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);
						$physical_fitness_id = substr(str_shuffle($numbers), 0, 5);
						//End creating employeeid

						$query = "SELECT * FROM `physical_fitness` WHERE physical_fitness_id='$physical_fitness_id'";			
						$result = mysqli_query($con, $query);

						if (mysqli_num_rows($result) != 1) {
							 $foo = False;

							//  $query = "INSERT INTO `member_and_trainor_id` (unique_id)
							// 		VALUES ('$training_class_id')";
							// $result = mysqli_query($con, $query);

						}
					}

					$query = "INSERT INTO `physical_fitness` (physical_fitness_id,
															    image,
																physical_fitness_name,
																description,
																owner_percent,
																trainor_percent)
						VALUES ('$physical_fitness_id',
								'$new_img_name',
								'$physical_fitness_name',
								'$description',
								'$owner_percent',
								'$trainor_percent')";

		 			mysqli_query($con, $query);

		 			// $msg="Added Successfully";
		 			?>
		 			<script type="text/javascript">
		 		
		 			Swal.fire({
							icon: 'success',
							title: 'Added Successfully!',
							showConfirmButton: false,
							timer: 1500
					}).then((result) => {
					// if (result.value) {
								window.location.href = 'add_physical_fitness';
					// }
									        		
					})

		 			</script>
		 			<?php



		 		}else{
		 			#error message 
		 			// $error = "You can't upload files of this type!";
		 			?>

					<script>alert('You cant upload files of this type!')</script>

					<?php

		 		}

		 	}

		 } else {
		 	
		 }
	
	}else {
		?>
			 <script type="text/javascript">
			 		
			    Swal.fire({
				    icon: 'error',
					title: 'Insert image!'
				})

			 </script>
		<?php
	}	
}

?>

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


	
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php 
          require('sidebar.php');
         ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Physical Fitness</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.php">
										<i class="fa fa-home"></i>
									</a>
								</li> -->
								<li><span>Physical Fitness</span></li>
								<li><span>Add Physical Fitness</span></li>
							</ol>
					
							<?php require('assets/birthdays_count.php'); ?>
						</div>

					</header>

					<div class="row">
						

						<div class="col-xl-12">

								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<!-- <a href="#" class="fa fa-times"></a> -->
										</div>
							
										<h2 class="panel-title"><a href="members"></a>Add Physical Fitness</h2>
									</header>
									<div class="panel-body">
										<form class="form-horizontal form-bordered" method="POST" enctype="multipart/form-data">

											<p id="errorMs"></p>



											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Physical Fitness Name</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="50" id="physical_fitness_name" name="physical_fitness_name"  placeholder="Input physical fitness name here" required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Description</label>
												<div class="col-md-6">

													 <textarea type="text" class="form-control"  maxlength="150" id="description" name="description"  placeholder="Optional" ></textarea> 

												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Owner %</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="5" id="owner_percent" name="owner_percent"  placeholder="Input owner percent here" onkeyup="half()" >

												</div>
											</div>

											<div class="form-group">
												<label class="col-md-3 control-label text-uppercase text-semibold text-dark">Trainor %</label>
												<div class="col-md-6">

													 <input type="text" class="form-control"  maxlength="5" id="trainor_percent" name="trainor_percent"  placeholder="" readonly >

												</div>
											</div>


											<div class="form-group">
                                                <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Image File</label>
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
                                                                <input type="file" id="my_image"  name="my_image" accept="image/*" onchange="displayImg(this,$(this))" required/>
                                                            </span>
                                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

											<div class="form-group">
                                                <label class="col-md-3 control-label text-uppercase text-semibold text-dark">Image</label>
                                                <div class="col-md-6">

                                                 <img src="../assets/images/classes/<?php echo isset($image) ? $image : '' ?>" alt="" id="cimg" class="img-responsive img-rounded img-thumbnail" style="height: 30vh; min-width: 100%;">

                                                </div>
                                            </div>

												<button type="submit"  id="submit" name="submit" class="mb-xs mt-xs mr-xs btn btn-success">Save</button>

												<button type="reset"  id="reset" name="reset" class="mb-xs mt-xs mr-xs btn btn-primary">Reset</button>

										</form>
									</div>
								</section>
						</div>
					</div>
					<!-- end: page -->
				</section>

			</div>
		
		<?php require('assets/calendar.php'); ?>


		</section>


<script>

  function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


     // Restricts input for the given textbox to the given inputFilter function.
	function setInputFilter(textbox, inputFilter) {
	  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
	    textbox.addEventListener(event, function() {
	      if (inputFilter(this.value)) {
	        this.oldValue = this.value;
	        this.oldSelectionStart = this.selectionStart;
	        this.oldSelectionEnd = this.selectionEnd;
	      } else if (this.hasOwnProperty("oldValue")) {
	        this.value = this.oldValue;
	        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
	      } else {
	        this.value = "";
	      }
	    });
	  });
	}

	setInputFilter(document.getElementById("owner_percent"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	setInputFilter(document.getElementById("trainor_percent"), function(value) {
	  return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
	});

	function half(){

		let owner_percent = $('#owner_percent').val();
		if(owner_percent != ''){
			document.getElementById('trainor_percent').value = 100 - owner_percent;
		}else{
			document.getElementById('trainor_percent').value = '';
		}

		
	}
 
</script>

<?php include('footer.php'); ?>