<?php if (session_status() === PHP_SESSION_NONE){  session_start(); } ?>
<?php 
error_reporting(0);


?>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
    .btn {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
</style>

<?php
 
require('assets/db_connect.php');

$verification_code ="";

if(isset($_GET['email'])){
    $email = $_GET['email'];

    $query = "SELECT * FROM `verified_email` WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_assoc($result);
         $verification_code = $row['verification_code'];
    }
}else{
  ?>
    <script type="text/javascript">
      window.location.href = 'index';
    </script>
  <?php
}


// error_reporting(E_ALL);
// ini_set('display_errors','1');

// $email = $_SESSION['email_name'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('assets/phpmailer/Exception.php');
require_once('assets/phpmailer/PHPMailer.php');
require_once('assets/phpmailer/SMTP.php');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    !extension_loaded('openssl')?"Not Available":"Available";
    
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';                                             //Send using SMTP
                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hmgfitnesscenter@gmail.com';                     //SMTP username
    $mail->Password   = isset($pass) ? $pass: '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // 465
    //Recipients
    $mail->setFrom('hmgfitnesscenter@gmail.com', 'HMG FITNESS CENTER');
    // $mail->addAddress('kleobracia@gmail.com');     //Add a recipient
    $mail->addAddress($email);   //Add a recipient
    $email2 = $email;
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirm the e-mail address of your HMG Fitness account';
    $mail->Body    = 'Thanks for signing up! <?php echo $email2 ?>, 
    Thank you for your interest in our HMG Fitness Center. 
    <br>
    You need to confirm your email address first by copying this code:
    <br>
    ';

    $mail->Body.= '<br>
                    <p class="btn" style="
                      background-color: #4CAF50; /* Green */
                      border: none;
                      color: white;
                      padding: 15px 32px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                    ">'.$verification_code.'</p>
                    <br>

                    ';

    // $mail->AltBody = 'adasd';

    $mail->send();

    $_SESSION['email_sent'] = 'email_sent';

    ?>
        <script type="text/javascript">
             window.location.href = 'index';
       </script>
    <?php

    // echo 'Your confirmation link has successfully been sent to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
