<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="style.css" type="text/css" rel="stylesheet" >
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description.">
    <title></title>

</head>

<body>

  <header>
   <nav>
   <div class="ulContainer">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Help</a></li>
      <li><a href="#">Contact</a></li>
      <li class="about"><a href="#">About</a></li>
      <li class="aboutus"><a href="#">About us</a></li>
    </ul>
       <h1>Welcome</h1>
  </div>
    <div class="wraper-main">
      <section class="section-default">
        <?php
          error_reporting(0);
          if (isset($_SESSION['userId'])) {
            echo '<form action="includes/logout.inc.php" method="post">
              <button type="submit" name="logout-submit">Logout</button>
            </form>';
          } else {
            echo '  <div>
                <form class="form-login" action="includes/login.inc.php" method="post">
                  <input type="text" name="mailuid" placeholder="Username/Email...">
                  <input type="password" name="pwd" placeholder="Password...">
                  <button type="submit" name="login-submit">Login</button>
                </form>
                <a class="signup" href="signup.php">SignUp</a>';
          }

          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET['error'] == "wrongpwd") {
              echo '<p class="signuperror">Invalid username or password!</p>';
            }
          } else if ($_GET['login'] == "success") {
            echo '<p class="loginsuccess">Login successsful!</p>';
          }
         ?>

      </section>

    </div>

          <div class="wraper-main">
            <section class="section-default">
              <?php
                if (isset($_SESSION['userId'])) {
                  echo '<p>You are logged in!</p>';
                } else {
                  echo '<p>You are logged out!</p>';
                }
               ?>

            </section>
          </div>


</nav>

  </header>

</body>
<footer>
</footer>
</html>
