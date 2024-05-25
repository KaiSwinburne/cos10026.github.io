<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Apply for a Web Developmment Job!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Developer Application</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
  <body class="apply">
    <!----------------------------------Code for navigation bar-------------------------->
<section class="form-whole">
    <form action="processEOI.php" method="post" novalidate="novalidate">
      <?php
        include "INC/header.inc.php";
      ?>
            <!-----------------------------------Code for Identity-------------------------------------->
            <br><br>
          <?php 
            if (isset($_GET["signup"])){
              if (($_GET["signup"] == "successful")){
                echo "<p class='success-message'>Your application has been successfully sent!</p><br>";
              }
            }
          ?>
          <div class="Input">
            <input type="radio" id="NetAdmin" name="JobType" value="52348">
            <label for="NetAdmin">Network System Administrator (#52348)</label>
            <input type="radio" id="WebDev" name="JobType" value="53549">
            <label for="WebDev"> Web developer (#53549)</label>
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["JobTypeError"])){
                if (($_GET["signup"] == "errors") && !empty($_SESSION["JobTypeError"])){
                  echo $_SESSION["JobTypeError"];
                }
                else {
                  echo "<p class='error-message'></p>";
                }
              }
            ?>
          </div> 
          <br><br>
          <div class="Input">
            <input id="firstname" type="text" placeholder="Enter your first name"name="firstname" >
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["FirstNameError"])){
                if (($_GET["signup"] == "errors") && !empty($_SESSION["FirstNameError"])){
                  echo $_SESSION["FirstNameError"];
                }
                else {
                  echo "<p class='error-message'>&nbsp;</p>";
                }
              }
            ?>
          </div> 

          <div class="Input">
            <input id="lastname" type="text" placeholder="Enter your last name" name="lastname">
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["LastNameError"])){
                if (($_GET["signup"] == "errors")  && !empty($_SESSION["LastNameError"])){
                  echo $_SESSION["LastNameError"];
                }
                else {
                  echo "<p class='error-message'>&nbsp;</p>";
                }
              }
            ?>
          </div>

          <br><br>
          <div class="Input">
            <input id="dob" type="text" placeholder="dd/mm/yyyy" maxlength="10" name="dob">
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["DobError"])){
                if (($_GET["signup"] == "errors")  && !empty($_SESSION["DobError"])){
                  echo $_SESSION["DobError"];
                }
                else {
                  echo "<p class='error-message'>&nbsp;</p>";
                }
              }
            ?>
          </div> 
          <div class="Input">
            <input id="middlename" type="text" placeholder="Enter middlename here">
            <!--------Whenever dob gets an error, middle name has a line for asthetic reasons----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["DobError"])){
                if (($_GET["signup"] == "errors") || !empty($_SESSION["DobError"])){
                  echo "<p class='error-message'>&nbsp;</p>";
                }
              }
            ?>
          </div> 
          <p></p>
          <div class="Input">
            <input id="email" type="text" placeholder="Enter email here" name="email" >
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["EmailError"])){
                if (($_GET["signup"] == "errors")  && !empty($_SESSION["EmailError"])){
                  echo $_SESSION["EmailError"];
                }
                else {
                  echo "<p class='error-message'>&nbsp;</p>";
                }
              }
            ?>
          </div>
          <p></p>
          <div class="gender">
            <fieldset>
              <legend>Choose Your Gender</legend>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label><br>
                <input type="radio" id="notsay" name="gender" value="notsay">
                <label for="notsay">Prefer not to say</label><br>
                <!--------Errors check----------->
                <?php
                  if (isset($_GET["signup"]) && isset($_SESSION["GenderError"])){
                    if (($_GET["signup"] == "errors")  && !empty($_SESSION["GenderError"])){
                      echo $_SESSION["GenderError"];
                    }
                    else {
                      echo "<p class='error-message'></p>";
                    }
                  }
                ?>
            </fieldset>
          </div>
          <p></p> 
          <div class="Input">
            <input class="phonenumber" type="text" name="phonenumber" placeholder="Enter Phone number here" maxlength="12">
            <!--------Errors check----------->
            <?php
                if (isset($_GET["signup"]) && isset($_SESSION["PhoneError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["PhoneError"])){
                    echo $_SESSION["PhoneError"];
                  }
                  else {
                    echo "<p class='error-message'></p>";
                  }
                }
            ?>
          </div> 
          <!---------------------------Code for Adress information--------------------->
          <h2 class="address">Address</h2>
          <div class="countries">
              <select id="country" name="country" class="country">
                  <option value="blank">Select country</option>
                  <option value="AUS">Australia</option>
              </select>
              <!--------Errors check----------->
              <?php
                if (isset($_GET["signup"]) && isset($_SESSION["CountryError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["CountryError"])){
                    echo $_SESSION["CountryError"];
                  }
                  else {
                    echo "<p class='error-message'></p>";
                  }
                }
              ?>
          </div>
          <p></p>
          <div class="Input">
            <input class="adone" type="text" placeholder="Address line 1" name="adone" maxlength="40"> 
            <!--------Errors check----------->
            <?php
                if (isset($_GET["signup"]) && isset($_SESSION["Add-1Error"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["Add-1Error"])){
                    echo $_SESSION["Add-1Error"];
                  }
                  else {
                    echo "";
                  }
                }
            ?>
          </div>
          <p></p>
          <div class="Input">
            <input class="adtwo" type="text" placeholder="Address line 2" name="adtwo" maxlength="40">
            <!--------Errors check----------->
            <?php
              if (isset($_GET["signup"]) && isset($_SESSION["Add-2Error"])){
                if (($_GET["signup"] == "errors")  && !empty($_SESSION["Add-2Error"])){
                  echo $_SESSION["Add-2Error"];
                }
                else {
                  echo "";
                }
              }
            ?>
          </div>
          <p></p>
        <div class="state">
            <input class="suburb" type="text" placeholder="Enter Suburb" name="suburb">
          <select id="states" name="states" class="states">
              <option value="blank">Select a state</option>
              <option value="ACT">Australian Capital Territory</option>
              <option value="NSW">New South Wales</option>
              <option value="NT">Northern Territory</option>
              <option value="QLD">Queensland</option>
              <option value="SA">South Australia</option>
              <option value="TAS">Tasmania</option>
              <option value="VIC">Victoria</option>   
              <option value="WA">Western Australia</option>
          </select>
          <p></p>
          <input class="postcode" type="text" placeholder="Postcode" maxlength="4" name="postcode">
          <p></p>
          <!--------Errors check----------->
          <?php
                if (isset($_GET["signup"]) && isset($_SESSION["SuburbError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["SuburbError"])){
                    echo $_SESSION["SuburbError"];
                  }
                  else {
                    echo "";
                  }
                }

                if (isset($_GET["signup"]) && isset($_SESSION["StateError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["StateError"])){
                    echo $_SESSION["StateError"];
                  }
                  else {
                    echo "";
                  }
                }

                if (isset($_GET["signup"]) && isset($_SESSION["PostcodeError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["PostcodeError"])){
                    echo $_SESSION["PostcodeError"];
                  }
                  else {
                    echo "";
                  }
                }
            ?>
        </div>
          <!---------------------------------Code for skills---------------------------------->
          <h2 class="otherskill">Skills</h2>
          <div class="Input">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="check1" type="checkbox" name="skills[]" value="C++, CSS, HTML">
              <label for="check1">C++, CSS, HTML</label>
              &nbsp;<input id="check2" type="checkbox" name="skills[]" value="Microsoft Office">
              <label for="check2">Microsoft Office</label>
            
            <br><br>
              &nbsp;<input id="check3" type="checkbox" name="skills[]" value="MySQL">
              <label for="check3">MySQL</label>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="check4" type="checkbox" name="skills[]" value="PHP">
              <label for="check4">PHP</label>
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="check5" type="checkbox" name="skills[]" value="Java, JavaScript">
              <label for="check5">Java, JavaScript</label>&nbsp;
              <input id="otherCheck" type="checkbox" name="skills[]" value="Otherskills">
              <label for="otherCheck" id="checkbox">Other Skills</label>
            <br>
            <!--------Errors check----------->
            <?php
                if (isset($_GET["signup"]) && isset($_SESSION["SkillsError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["SkillsError"])){
                    echo $_SESSION["SkillsError"];
                  }
                  else {
                    echo "";
                  }
                }
            ?>
          </div>
          <h3 id="otherbox">Other Skills</h3>
          <div class="Input">
            <textarea id="skillbox" placeholder="Enter Other skills" maxlength="200" rows="8" cols="30" name="skillbox"></textarea>
            <!--------Errors check----------->
            <?php
                if (isset($_GET["signup"]) && isset($_SESSION["OtherSkillError"])){
                  if (($_GET["signup"] == "errors")  && !empty($_SESSION["OtherSkillError"])){
                    echo $_SESSION["OtherSkillError"];
                  }
                  else {
                    echo "";
                  }
                }
            ?>   
          </div>
          <h3>Why do you want to work with LESTER TOUCHES TECH?</h3>
          <textarea class="reason" placeholder=" Explain why you would like to work here in 200 words or less"
          maxlength="200" rows="8" cols="30" name="reason"></textarea>
          <br><br><br>
          <input type="file" id="upload-btn" name="upload" hidden>
          <label for="upload-btn" class="upload-label">Upload Resume</label>
          <br>
          <input type="submit" value="Submit Application" class="submit" name="submit">
          <br><br>
  </form>
 </section>
  
<!-----------------------------------The footer------------------------------->
  <?php
    include "INC/footer.inc";
  ?>
  
</body>
</html>