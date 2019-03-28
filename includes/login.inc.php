<?php

if(isset($_POST['login-submit'])){

  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];


  if (empty($mailuid) || empty($password)) {
    header("location: ../index.php?error=emptyfields");
    exit();
  } else {
    $query = "SELECT * FROM users WHERE emailUsers='$mailuid' AND pwdUsers='$password' OR uidUsers='$mailuid' AND pwdUsers='$password'";
    $result = mysqli_query($conn, $query);
  }
    if ($row = mysqli_fetch_assoc($result)) {
         session_start();
         $_SESSION['userId'] = $row['idUsers'];
         $_SESSION['userUid'] = $row['uidUsers'];
         header("location: ../index.php?login=success");
          echo "good";
      }

       else {
        header("location: ../index.php?error=wrongpwd");
        exit();
      }
}
