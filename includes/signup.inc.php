<?php
if(isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-P]*$/", $username)) {
      header("Location: ../signup.php?error=invalidmail&uid=");
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-P]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
    exit();
  } else {

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);

  if ($resultCheck > 0) {
      header("location: ../signup.php?error=usertaken&mail=".$email);
      exit();
    } else {

         $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES ('$username', '$email', '$password')";
         header("location: ../signup.php?signup=successful");


       }

       if ($conn->query($sql) === TRUE) {
       echo "New record created successfully";
       } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
       }$conn->close();
  }
}





}
else {
  header("location: ../signup.php");
  exit();
}
