<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use phpDocumentor\Reflection\Location;
$max = 400*1024;
session_start();
include 'db.php';

require 'vendor/autoload.php';

$firstname = $lastname = $email = $message = $fileName ="";
$firstnameErr = $lastnameErr = $emailErr =  "";

if (isset($_POST['submit'])) {
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

  if (!empty($fileName)) {

    $fileTmpName = $_FILES['file']['tmp_name'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg','png', 'pdf');

   if (in_array($fileActualExt, $allowed)){
      if ($_FILES['file']['error'] == 0 ) {
         $fileTmpName = $_FILES['file']['tmp_name'];
         $fileName = $_FILES['file']['name'];
         $fileDestination = 'uploads/'. basename($fileName);

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
             $mail->Body = 'this is some body';
             $mail->AddAttachment($fileTmpName,$_FILES['file']['name']);

          if ($mail->send()){
            $_SESSION['message'] = "Email Sent";
            // header('Location: indexz.php');
          }else{
                $_SESSION['message'] = "Email not Sent". $mail->ErrorInfo;
          }

            move_uploaded_file($fileTmpName,$fileDestination);

          $sql =$mysqli->query("INSERT INTO fom1( firstname , lastname , email , file_image) 
                VALUES ('{$firstname}','{$lastname}','{$email}','{$fileName}')");

          $message  = $_FILES['file']['name'].' <span style = "color:green";>was upload succsessful</span>';

    }else {

  switch ($_FILES['file']['error']) {
       case 2:
           $message  = $_FILES['file']['name'].' <span style = "color:red";> is too big</span>';
           break;
        case 4:
           $message  = $_FILES['file']['name'].' <span style = "color:red";> No file selected</span>';
           break;
       default:
           $message  = $_FILES['file']['name'].' <span style = "color:red";> Sorry that type of file is not allowed</span>';
           break;
         }
    }
 }else {
           $message  = $_FILES['file']['name'].' <span style = "color:red";> Sorry that type of file is not allowed</span>';
 }

}else{
    $message  ='<span style = "color:red";>File is empty</span>';
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