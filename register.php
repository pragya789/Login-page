<?php

include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email,address,dob, password, image) VALUES('$name', '$email','$address','$dob', '$pass', '$image')") or die('query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'registeration failed!';
         }
      }
   }



   $myfile = fopen("newfile.json", "w") or die("Unable to open file!");
   $statement = mysqli_query($conn, "select * from user_form ");
   $json_array = array();
   while ($row = mysqli_fetch_assoc($statement)) {
      $json_array[] = $row;
   }
   $txt = json_encode($json_array);
   fwrite($myfile, $txt);
   fclose($myfile);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/scss/style.css">

</head>

<body>

   <div class="form-container">

      <form id="frm" class="form" action="" method="post" enctype="multipart/form-data">
         <h3>register now</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="error message">' . $message . '</div>';
            }
         }
         ?>
         <input type="text" id="name" name="name" placeholder="Enter name" class="box pd">
         <input type="email" id="email" name="email" placeholder="Enter email" class="box pd">
         <input type="text" id="address" name="address" placeholder="Enter addresss" class="box  pd">
         <input type="text" id="dob" name="dob" placeholder="YYYY-MM-DD" class="box pd">
         <input type="password" id="password" name="password" placeholder="Enter password" class="box pd">
         <input type="password" name="confirm_password" placeholder="Confirm password" class="box pd">
         <input type="file" class="files"  name="image" class="box" accept="image/svg">
         <input type="submit" name="submit" value="register now" class="btn">
         <p>Already have an account? <a href="login.php">Login now</a></p>
      </form>
   </div>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
   <script src="./assets/js/function.js"></script>
</body>

</html>