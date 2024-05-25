<!DOCTYPE html>
<html lang="en">
<head>
    <title>log in</title>
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
  <br>
    <div class="center">
      <h1>Login</h1>
      <form action="INC/login.inc.php" method="post">
        <div class="txt_field">
          <input type="text" name="id">
          <span></span>
          <label>Student ID</label>
        </div>
        <div class="txt_field">
          <input type="password" name="spwd">
          <span></span>
          <label>Password</label>
          
          <button class="btn-2" type="submit" name="submit"><span class="button-text">Log In</span></button>

        </div>
        <div class="signup_link">
          <a href="signup.php">Signup</a>
        </div>
      </form>
      <p class="Login-info">Student ID: 104090322</p>
      <p class="Login-info">Password: hello</p>
      <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p class='error-messg'>Fill in all fields!</p>";
            } else if ($_GET["error"] == "wronglogin") {
                echo "<p class='error-messg'>Wrong Log In!</p>";
            }
        }
        ?>  
    </div>
    <?php
       include "INC/footer.inc";
     ?>
    </body>
</html>