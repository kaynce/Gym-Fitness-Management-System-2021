<?php 
 if (session_status() === PHP_SESSION_NONE){ 
    session_start(); 
 }
 ?>
 
  <?php include('head.php'); ?>
  

  
      <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
        
          <div class="sidebar-header">
            <div class="sidebar-title text-primary">
              Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
              <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
          </div>
        
          <div class="nano">
            <div class="nano-content">
              <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                  <li class="nav-active">
                    <a href="index.php">
                      <i class="fa fa-home" aria-hidden="true"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>
                  
  
                  <li class="nav-parent ">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Members</span>
                    </a>
                    <ul class="nav nav-children ">
                      <li >
                        <a href="add_member.php">
                          Add Member
                        </a>
                      </li>

                      <li class="">
                        <a href="members.php">List of Members</a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Plans</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>List of Plans</a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Packages</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>List of Pakcages</a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent nav-expanded nav-active">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Trainors</span>
                    </a>
                    <ul class="nav nav-children">
                      <!-- <li class="">
                        <a href="add_trainor.php">
                          Add Trainor
                        </a>
                      </li> -->
                      <li class="nav-active">
                        <a href="trainors.php">
                          List of Trainors
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Health Status</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>List of Members</a>
                      </li>
                      
                    </ul>
                  </li>

               <!--    <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Report</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>List of Members</a>
                      </li>
                      
                    </ul>
                  </li> -->

                  <li class="nav-parent">
                    <a>
                      <i class="fa fa-align-left" aria-hidden="true"></i>
                      <span>Menu Levels</span>
                    </a>
                    <ul class="nav nav-children">
                      <li>
                        <a>First Level</a>
                      </li>
                      <li class="nav-parent">
                        <a>Second Level</a>
                        <ul class="nav nav-children">
                          <li class="nav-parent">
                            <a>Third Level</a>
                            <ul class="nav nav-children">
                              <li>
                                <a>Third Level Link #1</a>
                              </li>
                              <li>
                                <a>Third Level Link #2</a>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <a>Second Level Link #1</a>
                          </li>
                          <li>
                            <a>Second Level Link #2</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                </ul>
              </nav>
        
              <hr class="separator" />
        

        
            
            </div>
        
          </div>
        
        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
          <header class="page-header">
            <h2>Trainors</h2>
          
            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li><span>Trainors</span></li>
                <li><span>List of Trainors</span></li>
              </ol>
          
              <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>

        <div class="row">

          <!-- start: page -->
          <div class="row">
          
            <!-- <div class="col-md-6 col-lg-12 col-xl-6"> -->
            <div class="">
              <div class="row">
              <!--  <div class="col-md-12 col-lg-4 col-xl-4"> -->
                
                
              

              </div>
            </div>
          </div>

           <?php 
                 $id = $_GET['id'];
                 $i = 1;
                 $query = "SELECT *,concat(lastname,', ',firstname) AS name FROM trainors WHERE status ='approved' AND id = $id ORDER BY concat(lastname,', ',firstname) desc ";
                 $result = mysqli_query($con, $query);
                 $number=1;
                 $row_trainor = mysqli_fetch_array($result);
              ?>


          <div class="row">
            

            <div class="col-xl-12">

                <section class="panel">
                  <header class="panel-heading">
                    <div class="panel-actions">
                      <a href="edit_trainor.php?id=<?php echo $_GET['id'];?>" class="fa fa-caret-down"></a>
                      <!-- <a href="#" class="fa fa-times"></a> -->
                    </div>
              
                    <h2 class="panel-title"><a href="edit_trainor.php?id=<?php echo $_GET['id'];?>" class="fa fa-chevron-left">&nbsp; &nbsp;</a>Edit Trainor's Classes</h2>
                  </header>
                  <div class="panel-body">
                    
                        <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-none" id="datatable-default">
                          <colgroup>
                                                  <col width="5%">
                                                  <col width="5%">
                                                  <!-- <col width="5%"> -->
                                                  <col width="5%">
                                                  <col width="5%">
                           
                                                </colgroup>

                                              <thead style="">
                                                  <tr>
                                                      <th scope="col" class="center">Action</th>
                                                      <th scope="col"  class="center" >#</th>
                                                     <!--  <th scope="col" class="center">Membership Expiry</th> -->
                                                      <th scope="col" class="center">Training Classes</th>
                                                      <th scope="col" class="center">Status</th>
                                                  </tr>
                                              </thead>
                                             <tbody>
                          
                                                 <?php 
                                                  $i = 1;
                                                  // $member =  "SELECT * FROM `table` ORDER BY id IN (0,1) DESC, CASE WHEN id IN (0,1) THEN id ELSE -id END";

                                                  // $id = $_GET['id'];

                                                

                                                    $member = "SELECT * FROM training_classes ";

                                                    $result = mysqli_query($con, $member);
                                                    
                                                    while ($row_tc = mysqli_fetch_array($result)):
                                                 ?>

                                              
                                              <tr>
                                                  <!-- <th scope="row"><b></b></th> -->
                                                  <td class="center">


                                                      
                                                     <a type="button" class="btn btn-sm btn-success" href="view_trainor.php?id=<?php echo $row['id'];?>">Assign</a>

   

                                                      <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $row['id'] ?>" style="">Remove</button>

                                                  </td>
                                                  <!-- <td>
                                                      <div class="tm-status-circle pending">
                                                      </div>Pending
                                                  </td> -->
                                                  <td class="center"><?php echo $i++ ?></td>
                                                    
                                                    <td class="center">
                                                       <?php echo $row_tc['training_classes_name'] ?>
                                                       
                                                    </td>

                                                    <td class="center">
                                                       <span class="label label-success" style="font-size: 12px;">Assigned</span>
                                                       
                                                    </td>

                                              </tr>
                                               <?php endwhile; ?>
                                           
                                          </tbody>

                        </table>
                      </div>
                    </div>

                  </div>
                </section>

            </div>

            
          </div>
          
          <!-- end: page -->
        </section>

      </div>
    
    <?php include('calendar.php'); ?>


    </section>



<?php include('footer.php'); ?>

<script type="text/javascript">


 $(document).ready(function(){  

  // document.getElementById('valueList');
  var valueList = document.getElementById('valuelist_trainors_classes');
  // var text  = '<span> you have selected: </span>';
  var listArray = [];

  var checkboxes = document.querySelectorAll('.checkbox');

  for(var checkbox of checkboxes){
    checkbox.addEventListener('click',function(){
      if (this.checked ==  true) {
        listArray.push(this.value);
        valueList.innerHTML = listArray.join(' / ');
      } else {
        console.log('you unchecked the checkbox');
        listArray = listArray.filter(e => e !== this.value);
        valueList.innerHTML = listArray.join(' / ');
      }
    })
  }



 });  
  
</script>