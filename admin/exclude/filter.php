<?php require('assets/db_connect.php'); ?>
 
<?php 
//filter  
		 //if(isset($_POST["from_date"], $_POST["to_date"]))  
		 //{  
		      $output = '';  

		      $from_date = $_POST['from_date'];
		      $to_date = $_POST['to_date'];
		      // $product = $_POST['product'];

		      // $query = "  
		      //      SELECT * FROM `enrolls_to`  
		      //      WHERE date_created BETWEEN '$from_date' AND '$to_date'  
		      // AND  order_item = '$product' "; 

		      $query = "  
		           SELECT * FROM `enrolls_to`  
		           WHERE date_created BETWEEN '$from_date' AND '$to_date' "; 

		      $result = mysqli_query($con, $query);  

		      $i = 1;

		      $output .= " 
		       <div class='panel-body'>
		       		<colgroup>
		       			<col width='5%'>
		                <col width='5%'>
		                <col width='1%'>
		                <col width='5%'>
		                <col width='5%'>
		                <col width='5%'>
		                <col width='5%'>
		                <col width='5%'>   
		                <col width='5%'>  
		           </colgroup>
		             <table class='table table-bordered table-striped mb-none' id='mytable' data-swf-path='assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf'>
		                <tr>  
		                  <th scope='col' class='center'>#</th>
		                  <th scope='col' class='center'>Member ID</th>
		                  <th scope='col' class='center'>Name</th>
		                  <th scope='col' class='center'>Walk in</th>
		                  <th scope='col' class='center'>Package</th>
		                  <th scope='col' class='center'>Start</th>
		                  <th scope='col' class='center'>End</th>
		                   <th scope='col' class='center'>Date Created</th>
		                  <th scope='col' class='center'>Amount</th>
		                 
		                </tr> 
		      ";  

		      $total = 0;


		      if(mysqli_num_rows($result) > 0)  
		      {  
		           while($row = mysqli_fetch_array($result))  
		           {  

		           	  


		                $output .= " 
		                     <tr class='center'>  
		                          <td>". '' ."</td>  
		                          <td>". $i++ ."</td>  
		                          <td>". ''
		                          		
					                 
		                          ."</td>  
		                          <td>". $row['member_id'] ."</td>  
		                          <td>". $row['member_id'] ."</td>
		                       
		                          <td>". $row['member_id'] ."</td>  
		                          <td>". $row['member_id'] ."</td>
		                          <td>". date("M d,Y",strtotime($row['date_created']))  ."</td>  
		                          <td>". number_format($row['amount'], 2) ."</td>  
		                          
		                     </tr>  
		                ";  

		                  $total = $total + floatval($row['amount']);

		               

		                //$total_error = $total_order + floatval($row["order_value"]);
		           }  

		           $output .= "<tr align= 'center'>
		               <th colspan='8' style='text-align: right;'>Total</th>
		               <td ><b>". $total.".00</b></td>
		               
		                </tr>";

		      }  
		      else  
		      {  
		           $output .= "
		                <tr class='center'>  
		                     <td colspan='9'>No data Found</td>  
		                </tr>  
		           ";  
		      }  
		      $output .= "</table>
		                  </div>";  


		      echo $output;  
		// }  
 ?>


