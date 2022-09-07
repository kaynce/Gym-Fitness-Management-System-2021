<?php if (session_status() === PHP_SESSION_NONE){  session_start(); } ?>
<?php 



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
 
require_once('../admin/assets/db_connect.php');


$verification_code ="";

// if(isset($_GET['email'])){
//     $email = $_GET['email'];

if(!isset($email)){
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

    $foo = True;

    while($foo){

      //Start creating id
      $letters = '';
      $numbers = '';
      foreach (range('A', 'Z') as $char) {
        $letters .= $char;
      }
              
      for($i = 0; $i < 10; $i++){
        $numbers .= $i;
      }
              
      $verification_code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 2);

      //End creating id

      $query = "SELECT * FROM `verified_email` WHERE reset_code='$verification_code' ";     

      $result = mysqli_query($con , $query); 

        if (mysqli_num_rows($result) != 1) {
              
              $query = "UPDATE `verified_email` SET verification_code = '$verification_code'  
                                                WHERE email = '$email' ";
              mysqli_query($con, $query);  

              $foo = False;           
        }
      }
    //End while

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

    $_SESSION['user_email'] = $email;
    return 1;


    // echo 'Your confirmation link has successfully been sent to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return 2;
}

?>
