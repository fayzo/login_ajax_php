<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use phpDocumentor\Reflection\Location;
$max = 40*1024;
session_start();
include 'db.php';
// define variables and set to empty values

// Send the message
$firstname = $lastname = $email = $message = $fileName ="";
$firstnameErr = $lastnameErr = $emailErr =  "";

if (isset($_POST['submit'])) {
    // echo print_r($_POST);
    $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);

  if (empty($firstname)) {
    $firstnameErr = " <span style='color:red;'>is required </span>";
  } else {
    $firstname = test_input($firstname);
  }

  if (empty($lastname)) {
    $lastnameErr = "<span style='color:red;'>is required </span>";
  } else {
    $lastname = test_input($lastname);

  }
  if (empty($email)) {
    $emailErr = "<span style='color:red;'>is required </span>";
  } else {
    $email = test_input($email);

  }
    $fileName = mysqli_real_escape_string($conn,$_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

   if (in_array($fileActualExt, $allowed)){
      if ($_FILES['file']['error'] == 0 ) {
         $fileTmpName = $_FILES['file']['tmp_name'];
         $fileName = $_FILES['file']['name'];
         $fileDestination = 'uploads/'. basename($fileName);

        move_uploaded_file($fileTmpName, $fileDestination);
        $message  = $_FILES['file']['name'].' <span style = "color:green";>was upload succsessful</span>';
        }

      } else {

    switch ($_FILES['file']['error']) {
         case 2:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>is too big</span>';
             break;
          case 4:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>No file selected</span>';
             break;
         default:
             $message  = $_FILES['file']['name'].' <span style = "color:red";>sorry that type of file is not allowed</span>';
             break;
           }
    }

        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($fileName)) {

            //  require 'phpmailer/PHPMailerAutoload.php';
             require 'vendor/autoload.php';

             $mail = new PHPMailer();
             $mail->isSMTP();
             $mail->SMTPDebug = 2;
             $mail->Debugoutput = 'html';
             
             $mail->Host = 'smtp.gmail.com';
             $mail->SMTPSecure = 'tls';
             $mail->Port = 587;
             $mail->SMTPAuth = true;
             $mail->Username = 'shemafaysal@gmail.com';
             $mail->Password = 'shemafayzo12';
             
             $mail->setFrom('shemafaysal@gmail.com', 'SHEMA FAYZO');
             $mail->addAddress($email);
             $mail->Subject = 'SMTP email test';
            //  $mail->Body = 'this is some body';
             $mail->Body = $fileName;

          if ($mail->send()){
            $_SESSION['message'] = "Email Sent";
            // header('Location: indexz.php');
          }else{
                $_SESSION['message'] = "Email not Sent";
          }

      // require_once '/path/to/vendor/autoload.php';
 
      // // Create the Transport
      //  $transport = (new Swift_SmtpTransport('smtp.example.org', 25))
      //    ->setUsername('your username')
      //    ->setPassword('your password');
   
     // Create the Mailer using your created Transport
      //  $mailer = new Swift_Mailer($transport);
   
     // Create a message
      //  $message = (new Swift_Message('Wonderful Subject'))
      //    ->setFrom(['john@doe.com' => 'John Doe'])
      //    ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
      //    ->setBody('Here is the message itself');

          $sql =$mysqli->query("INSERT INTO fom1( firstname , lastname , email , file_image) 
                VALUES ('{$firstname}','{$lastname}','{$email}','{$fileName}')");
          // mysqli_query($conn, $sql);
              // $_SESSION['message'] = "Address saved"; 
              //  header ("Location: welcome.php?singup=sucess" );
          
                // echo "Mail sent";
        // } else {
        //   $_SESSION['message'] = "Address required"; 
        //         //   session_unset();
        // }

      //  $mailer->send($message);

   }
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

mysqli_close($conn);

?>