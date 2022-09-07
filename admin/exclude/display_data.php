<?php 
include('assets/db_connect.php'); 

if(isset($_POST['displayData'])){
	$table='<table id="zero_config" class="table table-striped table-bordered">
                <colgroup>
	                <col width="25%">
	                <col width="5%">
	                <col width="5%">
	                <col width="13%">
	                <col width="15%">
	                <col width="2%">
	                <col width="10%">
	                <col width="5%">          
               </colgroup>
               <thead>
                    <tr>
                        <th class="text-center">Action</th>
                        <th class="">#</th>
                        <th class="">Membership Expiry</th>
                        <th class="">Member ID</th>
                        <th class="">Name</th>
                        <th class="">Gender</th>
                        <th class="">Date of Birth</th>
                        <th class="">Date Joined</th>
                    </tr>
               </thead>';
            $i = 1;
            $member = "SELECT *,concat(lastname,', ',firstname) as name from members WHERE status ='Approved' order by concat(lastname,', ',firstname) desc ";

            $result = mysqli_query($con, $member);
                                                
            while ($row = mysqli_fetch_assoc($result)){
            	$id = $row['id'];
            	$membership_expiry = $row['membership_expiry'];
            	$member_id = $row['member_id'];
            	$name = $row['name'];
            	$gender = $row['gender'];
            	$date_of_birth = $row['date_of_birth'];
            	$date_created = $row['date_created'];

            	$table.=' <tbody>
            			<tr>
			                <td class="text-center" >

			                <button class="btn btn-sm btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="" data-id="'.$id.'" style="font-size: .8rem; ; padding: 7px;">View</button>

			                <button class="btn btn-sm btn-outline-primary" type="button"  data-bs-toggle="modal" data-bs-target="#editModal" data-id="'.$id.'"  style="font-size: .8rem;  padding: 7px;">Edit</button>

			     
			                 <button class="btn btn-sm btn-outline-danger delete_plan" type="button" data-id="'.$id.'"  style="font-size: .8rem;  padding: 7px;">Archive</button>
			                </td>

			                <td class="text-center">'.$i++.'</td>
			                <td class="">
			                   <p><b>'.$membership_expiry.'</b></p>
			                                                     
			                </td>
			                <td class="">
			                   <p><b>'.$member_id.'</b></p>
			                                                     
			                </td>
			                <td class="">
			                   <p><b>'.$name.'</b></p>
			                                                     
			                </td>
			                                                  
			                <td class="">
			                   <p><b>'.$gender.'</b></p>   
			                </td>
			                                                  
			                <td class="">
			                   <p><b>'.$date_of_birth.'</b></p>
			                </td>
			                                                  
			                                               
			                 <td class="">
			                   <p><b>'.$date_created.'</b></p>   
			               </td>
                   </tr>
                    </tbody>';
            }
            $table.='</table>';
            echo $table;

}

 ?>