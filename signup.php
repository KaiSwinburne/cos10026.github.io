<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="mag-body">
<?php
      include "INC/header.inc.php";
?>
  <div class="center">
  <section class="signup">
    <h1>Sign Up</h1>
    <form action="INC/signup.inc.php" method="post">
    <div class="txt_field">
      <input type="text" name="sign-name" placeholder="Full Name">
      <span></span>
          <label>Full Name</label>
          </div>
          <div class="txt_field">
      <input type="text" name="sign-email" placeholder="Email">
      <span></span>
          <label>Email</label>
          </div>
          <div class="txt_field">
      <input type="text" name="sign-ID" placeholder="ID Number">
      <span></span>
          <label>Student ID</label>
          </div>
          <div class="txt_field">
      <input type="password" name="sign-pwd" placeholder="Password">
      <span></span>
          <label>Password</label>
          </div>
          <div class="txt_field">
      <input type="password" name="sign-pwdre" placeholder="Repeat Password">
      <span></span>
          <label>Re-enter Password</label>
          </div>
          <div class="txt_field">
          <button class="btn-2" type="submit" name="sign-submit"><span class="button-text">Sign Up</span></button>
    </form>
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p class='error-messg'>Fill in all fields!</p>";
      } else if ($_GET["error"] == "invaliduid") {
        echo "<p class='error-messg'>Choose a proper username!</p>";
      } else if ($_GET["error"] == "invalidemail") {
        echo "<p class='error-messg'>Choose a proper email!</p>";
      } else if ($_GET["error"] == "passworddontmatch") {
        echo "<p class='error-messg'>Passwords don't match!</p>";
      } else if ($_GET["error"] == "stmtfailed") {
        echo "<p class='error-messg'>Something went wrong!</p>";
      } else if ($_GET["error"] == "usernametaken") {
        echo "<p class='error-messg'>Student ID already taken!</p>";
      } else if ($_GET["error"] == "none") {
        echo "<p class='error-messg'>You have signed up!</p>";
      }
    }
    ?>
    </section>
    </div>
  
  <?php
       include "INC/footer.inc";
     ?>
</body>
</html>
