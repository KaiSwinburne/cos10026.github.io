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
            <div class="ech-section">
                <div class = "ech-container"> 
                     <div class="content-section">
                        <div class="ech-title">
                            <h1>PHP Enhancements!</h1>
                        </div>
                        <div class="ech-content">
                            <h3>What we've changed and upgraded using the power of PHP!!</h3>
                            <p>
                            We are proud to introduce another noteworthy upgrade to our website! <br>
                            In order to enhance the security of user information, we have implemented a password hashing feature during the signup process.<br>
                             This ensures that your password is transformed into an irreversible hash key before being stored in our database, adding an extra layer of protection to your sensitive data. <br>
                             When you log in, your information is retrieved from the corresponding table in phpMyAdmin and the password is decrypted to validate your login credentials.<br>

                            Furthermore, we have redesigned the taskbar to provide a personalized experience.<br>
                             When you are not logged in, the taskbar prominently displays options to sign up and log in,<br> 
                             encouraging seamless access to our platform. However, once you are logged in, the taskbar dynamically updates,<br>
                              replacing the signup and login options with a focused display that features only the logout option.<br>
                               We have also introduced a new "Manage" page, where you can conveniently search for EOI tables and jobs,<br>
                                empowering you to navigate and engage with our platform effortlessly. <br>
                                These enhancements aim to optimize your browsing experience and ensure your interactions with our website are efficient and tailored to your needs.
                            </p>
                             <div class="ech-button">
                                <a href="signup.php">Try it out!</a>
                             </div>
                        </div>

                     </div>
                     <div class="ech-image-me">
                        <img src="images/Dimi.png" alt="ME the god ">
                     </div>
                </div>
            </div>
            
        </body>
    </html>