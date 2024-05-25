 <?php
 $image_linus = "images/linus.png";
 session_start();
 ?>

    <header class="header-main">
      <div class="header-main-logo">
        <img src="<?php echo $image_linus; ?>" alt="Group logo">
        <nav class="header-main-nav">
          <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="jobs.php">JOBS</a></li>
            <li><a href="apply.php">JOB APPLICATIONS</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="enhancement.php">ENHANCEMENTS</a></li>
            <li><a href="enhancements2.php">ENHANCEMENTS 2.0</a></li>
            <?php
                if (isset($_SESSION["userid"])){
                  echo"<li><a href='manage.php'>MANAGER</a></li>";
                  echo"<li><a href='INC/logout.php'>LOG OUT</a></li>";
                }
                else {
                  echo"<li><a href='signup.php'>SIGN UP</a></li>";
                  echo"<li><a href='login.php'>LOG IN</a></li>";
                }
              ?>
          </ul>
        </nav>
      </div>

      <div class="header-main-sm">
        <a href="https://www.youtube.com/watch?v=CMhWGm46zok&ab_channel=PixelMate" target="_blank"><div class="header-main-sm-yt"></div></a>
      </div>
    </header>

