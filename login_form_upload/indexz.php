<?php include 'valid.php';?>
<?php include 'header.php';?>

  <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post' enctype='multipart/form-data'>
      <div class="form-row">
         <div class="col-lg-3-md-6-xm-3">
             <label for="firstname">Firstname address : <?php echo $firstnameErr; ?></label>
             <input type="text" class="form-control" name="firstname" value='<?php echo $firstname; ?>'  placeholder="firstname">
             <small class="form-text text-muted">firstname</small>
            
             <label for="lastname">Lastname address: <?php echo $lastnameErr; ?></label>
             <input type="text" class="form-control" name="lastname" value='<?php echo $lastname ; ?>' placeholder="lastname ">
             <small class="form-text text-muted">firstname</small>
           
             <label for="email">E-mail address : <?php echo $emailErr; ?></label>
             <input type="email" class="form-control" name="email" value='<?php echo $email; ?>' placeholder="email">
             <small class="form-text text-muted">email</small>

             <label for="file">File input :</label><?php echo " ".$message ; ?>
             <input type="hidden" name="MAX_FILE_SIZE" value ="<?php echo $max;?>">
             <input type="file" name="file"  value="<?php echo $file;?>" class="form-control-file">
             <small id="fileHelp" class="form-text text-muted">Max 40kb size</small>
        	<button type="submit" name="submit" class="btn btn-primary">submit</button>
           </div>
        </div>
    </form>

<?php include 'footer.php';?>
 


