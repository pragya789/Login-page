<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_dob = mysqli_real_escape_string($conn, $_POST['update_dob']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email', address='$update_address', dob='$update_dob' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
      if ($update_pass != $old_pass) {
         $message[] = 'old password not matched!';
      } elseif ($new_pass != $confirm_pass) {
         $message[] = 'confirm password not matched!';
      } else {
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'image is too large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/scss/style.css">

</head>

<body>

   <div class="form-container">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form class="form" action="" method="post" enctype="multipart/form-data">
         <center>
         <?php
         if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png" class="up-img">';
         } else {
            echo '<img class="up-img" src="uploaded_img/' . $fetch['image'] . '">';
         }
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="error message">' . $message . '</div>';
            }
         }
         ?>
         </center>


         <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box pd">

         <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box pd">
         <input type="text" id="address" name="update_address" value="<?php echo $fetch['address']; ?>" placeholder="enter addresss" class="box  pd">
         <input type="text" id="dob" name="update_dob" value="<?php echo $fetch['dob']; ?>" placeholder="YYYY-MM-DD" class="box pd">

         <input type="file" class="files" name="update_image" style="color: white;" accept="image/svg, image/svg, image/svg" class="box">

         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">

         <input type="password" name="update_pass" placeholder="enter previous password" class="box pd">

         <input type="password" name="new_pass" placeholder="enter new password" class="box pd">

         <input type="password" name="confirm_pass" placeholder="confirm new password" class="box pd">

         <input type="submit" value="update profile" name="update_profile" class="btn">
         <a href="home.php" class="btn" style="text-decoration: none;color:white;text-align:center;">go back</a>
      </form>

   </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
   <script src="./assets/js/function.js"></script>
</html>