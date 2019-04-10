<?php 
include 'db.php';
session_start();

if (isset($_SESSION['key'])) {
    header('login_index.php');
    exit();
}
 if (isset($_POST['key']) == 'save') {
    
    $firstname = $mysqli->real_escape_string($_POST['firstnameajax']);
    $middlename =$mysqli->real_escape_string($_POST['middlenameajax']);
    $lastname = $mysqli->real_escape_string($_POST['lastnameajax']);

    $sql= $mysqli->query("SELECT login_id FROM login WHERE firstname ='{$firstname}'and lastname='{$lastname}'");
    
    if ($sql->num_rows > 0) {
        $_SESSION['key'] = 'key';
        $_SESSION['firstnameajax'] = $firstname;
        $_SESSION['middlenameajax'] = $middlename;
        $_SESSION[' lastnameajax'] = $lastname;
        
        exit ('<p style="color:green;">success</p>');
    }else{
        exit ('<p style="color:red;">fail</p>');
    }
  } 
?>
<?php include 'header&footer/header.php';?>
<body>
<div class="container">
<h1>LOGIN E-MAIL</h1>
<div class="form-row has-error has-feedback">
    <div class="col-lg-3-md-6-sm-12-xm-12">
      <form>
            <div style='margin-top:10px;'></div>
              <div class="form-group">
              <input type="text"
                class="form-control" name="firstname" id="firstname" aria-describedby="helpId" placeholder="Firstname">
            </div>
            <div class="form-group">
              <input type="text" 
              class="form-control" name="middlename" id="middlename" aria-describedby="helpId" placeholder="Middlename">
            </div>
            <div class="form-group">
              <input type="text" 
              class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="Lastname">
            </div>
             <button type="button" onclick="manage('save');" class="btn btn-primary">submit</button>
      </form> <span id='response'></span>
  </div>
 </div>
</div>
 <script>
      function manage(key){
      var firstname = $("#firstname");
      var middlename = $("#middlename");
      var lastname = $("#lastname");
       //   use 1 or second method to validaton
     if (isEmpty(firstname) && isEmpty(middlename) && isEmpty(lastname) ) {
    //    alert("complete register");
       $.ajax({
           url: "login.php",
           method: "POST",
           dataType: "text",
           data:{ 
               key: key,
               firstnameajax: firstname.val(),
               middlenameajax: middlename.val(),
               lastnameajax: lastname.val(),
           }, 
           success: function(response){
               $("#response").html(response);
                 console.log(response);
             if (response.indexOf('success') >= 0 ) {
                window.location = 'login_index.php';
           }
          }
       });
      }
    }
      function isEmpty(caller){
       if (caller.val() =="") {
          caller.css("border","1px solid red");
          return false;
        }else{
             caller.css("border","1px solid green");
        }
          return true;
      }
    //   use 1 or second method to validaton
    
    //           firstname.css("border","1px solid red");
    //       }
    //       if (firstname.val() == "") {
    //           firstname.css("border","1px solid red");
    //       }else{
    //           firstname.css("border","1px solid green");}
    
    //       if ( lastname.val() == "") {
    //           lastname.css("border","1px solid red");
    //        }else{
    //           lastname.css("border","1px solid green");}
    
    //       if (middlename.val() == "") {
    //            middlename.css("border","1px solid red");
    //         }else{
    //           middlename.css("border","1px solid green");}
    //    }
    </script>
<?php include 'header&footer/footer.php';?>
