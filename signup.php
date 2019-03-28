<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description.">
    <meta name=viewport content"width=device-width, inital-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
   <nav>

   <div class="ulContainer">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Help</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">About us</a></li>
    </ul>
   </div>

    <main>
      <div class="wraper-main">
        <section class="section-default">
          <h1 class="sign">Signup</h1>
          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "emptyfields") {
                echo '<p class="signuperror">Fill in all fields!</p>';
              }
              else if ($_GET['error'] == "invaliduidmail") {
                echo '<p class="signuperror">Invalid username and e-mail!</p>';
              }
              else if ($_GET['error'] == "invalidmail") {
                echo '<p class="signuperror">Invalid e-mail!</p>';
              }
              else if ($_GET['error'] == "invaliduid") {
                echo '<p class="signuperror">Invalid username!</p>';
              }
              else if ($_GET['error'] == "passwordcheck") {
                echo '<p class="signuperror">Your password do not match!</p>';
              }
              else if ($_GET['error'] == "usertaken") {
                echo '<p class="signuperror">Username is already taken!</p>';
              }
            } else if ($_GET['signup'] == "successful") {
              echo '<p class="signupsuccessful">Signup successsful!</p>';
            }
           ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username...">
            <input type="text" name="mail" placeholder="Email...">
            <input id="pwdSign" type="text" name="pwd" placeholder="Password...">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
          </form>
        </section>
      </div>
    </main>


  </nav>
  </header>


  </body>
  <footer>
  </footer>
  </html>
