<?php 
include 'db.php';
session_start();

if (isset($_SESSION['button']) && $_SESSION['emailphp'] = $email) {
    header('location: loginn.php');
    exit();
}

 if (isset($_POST['button']) == 1) {
    
    $name =  mysqli_real_escape_string($conn,$_POST['namephp']);
    $password =  mysqli_real_escape_string($conn,$_POST['passwordphp']);
    $email =  mysqli_real_escape_string($conn,$_POST['emailphp']);
    $sql =$mysqli->query("SELECT id FROM loginn WHERE name ='$name' and password = '$password'");
    
    if ($sql->num_rows > 0) {
        $_SESSION['button'] = '1';
        $_SESSION['namephp'] = $name;
        $_SESSION['emailphp'] = $email;
        exit ('<p style="color:green;">success</p>');
    }else{
        exit ('<p style="color:red;">fail</p>');
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery.min.js"></script>
    <link   href="dist/bootstrap.min.css" rel="stylesheet">

      <!-- <script>
       function ajax_request() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function (){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var result = document.getElementById('button'); 
                result.innerHTML = xmlhttp.responseText;
            }
        }
         xmlhttp.open('GET','indez.php',true);
         xmlhttp.send();
    }
    </script> -->

</head>
<body>

<div class="container">
  <div class="form-row has-error has-feedback">
    <div class="col-lg-3-md-6-sm-12-xm-12">

     <form>
       <label for="name">name</label>
       <input type="text"  id="name" class="form-control" placeholder="name" aria-describedby="helpId">
       <label for="password">password</label>
       <input type="password" class="form-control" id="password" placeholder="password">
       <label for="email">email</label>
       <input type="email"  id="email" class="form-control" placeholder="email" aria-describedby="helpId">
       <br>
       </div>
     </div>
       <button  type ='button' id='button' class="btn btn-primary">button</button>
     </form>
<span id='response'></span>
<!-- <h1 id="doc" >makurus</h1> -->
<!-- <button onclick="fayzo()">Try it</button> -->

    <script>
      //  this is javascripts......
        // function fayzo() {
        // //     document.getElementById('doc').innerHTML="turaho";
        // // }
    
    //    this is jquery......
       $(document).ready(function() {
           $("#button").on('click',function () {
              var name = $('#name').val();
              var password = $('#password').val();
              var email = $('#email').val();

              if (name == ''|| password == ''|| email == '') {
                  alert('empty needed to fill');
              }
              else{
              $.ajax({
                  url: 'indez.php',
                  method: 'POST',
                  dataType: 'text',
                  data:{
                      button:1,
                      namephp: name,
                      passwordphp: password,
                      emailphp: email
                  },
                  success: function(response){
                      $("#response").html(response);
                         console.log(response);
                     if (response.indexOf('success') >= 0 ) {
                        window.location = 'loginn.php';
                     }
                  },
                 });  // end  ajax request data
              } // end  else stament
           });// end click button 
           
       }); // end jquery function
    </script>

    <script src="jquery.min.js"></script>
    <script src="dist/popper.min.js"></script>
    <script src="dist/bootstrap.min.js"></script>
</body>
</html>
