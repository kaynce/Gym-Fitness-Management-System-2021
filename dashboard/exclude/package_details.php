<?php
  require('../admin/assets/db_connect.php'); 
//include('../constant/layout/head.php');
$pid=$_GET['q'];
$query="select * from packages where package_id='".$pid."'";
$res=mysqli_query($con,$query);
if($res){
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	// echo "<tr><td>".$row['amount']."</td></tr>";
	echo "
	      <div class='form-group'>
           <div class='row'>
       <label class='control-label'>AMOUNT</label>
        <div class='col-sm-4' style='width:330px;'>
          <input type='text' name='amount' id='amount' value='".$row['amount']." Php' maxlength='30' readonly class='form-control' style='width:200px;'>
          </div>
          </div>
          </div>
		 <div class='form-group'>
           <div class='row'>
       <label class='control-label'>VALIDITY</label>
        <div class='col-sm-4' style='width:330px;'>
          <input type='text' name='validity' id='validity' value='".$row['validity']." Month/s' maxlength='30' readonly class='form-control' style='width:200px;'>
          </div>
          </div>
          </div>
		
	";
	       

}

?>