<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    require_once "settings.php";
    require_once "INC/Validator.inc.php";
    
    if (isset($_POST["submit"])){ #Check if the users have actually submitted the form, i.e: pressing the submit button once
            $JobType = DataSanatiser($_POST["JobType"]);
            $firstname = DataSanatiser($_POST["firstname"]);
            $lastname = DataSanatiser($_POST["lastname"]);
            $dob = DataSanatiser($_POST["dob"]);
            $email = DataSanatiser($_POST["email"]);
            $gender = DataSanatiser($_POST["gender"]);
            $phonenumber = DataSanatiser($_POST["phonenumber"]);
            $country = DataSanatiser($_POST["country"]);
            $adone = DataSanatiser($_POST["adone"]);
            $adtwo = DataSanatiser($_POST["adtwo"]);
            $suburb = DataSanatiser($_POST["suburb"]);
            $states = DataSanatiser($_POST["states"]);
            $postcode = DataSanatiser($_POST["postcode"]);
            $skills = $_POST["skills"];
            $skills_array= "";
                foreach($skills as $items){
                    $skills_array .= $items.";";
                }
            $skillbox = DataSanatiser($_POST["skillbox"]);
            $reason = DataSanatiser($_POST["reason"]);

            $_SESSION["JobTypeError"] = JobTypeErrors($JobType);
            $_SESSION["FirstNameError"] = FirstNameErrors($firstname);
            $_SESSION["LastNameError"] = LastNameErrors($lastname);
            $_SESSION["DobError"] = DoBErrors($dob);
            $_SESSION["EmailError"] = EmailErrors($email);
            $_SESSION["GenderError"] = GendersErrors($gender);
            $_SESSION["PhoneError"] = PhoneErrors($phonenumber);
            $_SESSION["CountryError"] = CountryErrors($country);
            $_SESSION["Add-1Error"] = Address1Errors($adone);
            $_SESSION["Add-2Error"] = Address2Errors($adtwo);
            $_SESSION["SuburbError"] = SuburbErrors($suburb);
            $_SESSION["StateError"] = StateErrors($states);
            $_SESSION["PostcodeError"] = PostcodeErrors($postcode,$states);
            $_SESSION["SkillsError"] = SkillsErrors($skills);
            $_SESSION["OtherSkillError"] = OtherSkillsErrors($skills_array, $skillbox);


            if ($_SESSION["JobTypeError"] !== "" || $_SESSION["FirstNameError"] !== "" || $_SESSION["LastNameError"] !== "" ||
            $_SESSION["DobError"] !== "" || $_SESSION["EmailError"] !== "" || $_SESSION["GenderError"] !== "" || $_SESSION["PhoneError"] !== "" ||
            $_SESSION["CountryError"] !== "" || $_SESSION["Add-1Error"] !== "" || $_SESSION["SuburbError"] !== "" || 
            $_SESSION["StateError"] !== "" || $_SESSION["SkillsError"] !== "" || $_SESSION["OtherSkillError"] !== ""){
                header("Location: apply.php?signup=errors");
                exit();
            }
            else{
                
                $conn = mysqli_connect($host,$user,$pwd,$sql_db);
                //make the array of skills to get multiple skills check box
                

                //Check the connection to the database
                if (!$conn){
                    echo "<p>Can't connect to the database</p>";
                }
                else{
                    //Adding the EOI into the table on the database
                    $query = "INSERT into EOI (JobRefNum,firstname, lastname,dob,gender,streetaddress,suburb,state,postcode,email,phonenumber,reason,Skills,otherskills) 
                            values('$JobType','$firstname','$lastname','$dob','$gender','$adone','$suburb','$states','$postcode','$email','$phonenumber','$reason','$skills_array','$skillbox')";          
                    $run = mysqli_query($conn,$query);

                    //Check if the query ran succesfully
                    if (!$run){
                        echo "<p>Unable to create table</p>";
                    }
                    else{
                        session_unset();  
                        session_destroy();
                        header("Location: apply.php?signup=successful");
                    }  
                    mysqli_close($conn);             
                }   
                exit(); 
            }
    }
?>
