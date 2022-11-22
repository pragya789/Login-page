<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/scss/style.css">

</head>

<body>

   <div class="dash-container">

      <div class="profile">
         <div class="profile-img">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
               $fetch = mysqli_fetch_assoc($select);
            }
            if ($fetch['image'] == '') {
               echo '<img src="images/default-avatar.svg">';
            } else {
               echo '<img src="uploaded_img/' . $fetch['image'] . '">';
            }
            ?>
            <h3><?php echo $fetch['name']; ?></h3>
         </div>

         <div class="profile-details">
            <a href="update_profile.php" class="btn">update profile</a>
            <a href="home.php?logout=<?php echo $user_id; ?>">logout</a>
         </div>
      </div>



   </div>
   <div class="form-container">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form class="form" action="" method="post" enctype="multipart/form-data">

         <span class="hh">Name:</span>
         <input type="text" onkeydown="return false" name="update_name" value="<?php echo $fetch['name']; ?>" class="box pd">
         <span class="hh">Email:</span>
         <input type="email" onkeydown="return false" name="update_email" value="<?php echo $fetch['email']; ?>" class="box pd">
         <span class="hh">Address:</span>
         <input type="text" onkeydown="return false" name="update_name" value="<?php echo $fetch['address']; ?>" class="box pd">
         <span class="hh">DOB:</span>
         <input type="text" onkeydown="return false" name="update_name" value="<?php echo $fetch['dob']; ?>" class="box pd">
         <span class="hh">Password:</span>
         <input type="password" onkeydown="return false" name="update_pass" placeholder="enter previous password" value="<?php echo $fetch['password']; ?>" class="box pd">
      </form>

   </div>

   <script src="assets/js/key.js"></script>
</body>

</html>