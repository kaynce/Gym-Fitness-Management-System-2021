<!-- If the client is not yet approved this file won't show -->
<?php 
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];

        $query = "SELECT * FROM `pending_members` WHERE email = '$email' ";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_assoc($result);
          $status = $row['status'];
        }else{
          $query = "SELECT * FROM `members` WHERE email = '$email' ";
          $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $status = $row['status'];
            }
        }
    }

    if($status == 'pending'){
      ?>
        <script>
            window.location.href = 'index';
        </script>
      <?php
    }

    
?>
<!-- End -->