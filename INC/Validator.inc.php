<?php
        #This function sanatizes data, leaving no blank space or trailing spaces
        function DataSanatiser($data){ 
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function remove0($data){
            if (substr((int)$data,0,1)=="0"){
                $data = (int) substr($data, 1, 3);    
            }
            else{
                $data = (int) $data;
            }
            return $data;
        }

        function JobTypeErrors($JobType){
            $errorMsg_JobType = "";
            if (empty($JobType)){
                $errorMsg_JobType = "<p class='error-message'>You have to choose a job!</p>";
            }
            else if(!preg_match("/^[0-9]{5}$/", $JobType)){
                $errorMsg_JobType = "<p class='error-message'>Your job reference number is invalid</p>";
            }
            else {
                $errorMsg_JobType = "";
            }
            return $errorMsg_JobType;
        }

        function FirstNameErrors($firstname){
            $errorMsg_FirstName = "";
            if (empty($firstname)){
                $errorMsg_FirstName = "<p class='error-message'>You must enter your first name!</p>";
            }
            else if (!preg_match("/^[A-Za-z ]{1,20}$/", $firstname)){
                $errorMsg_FirstName = "<p class='error-message'>Your first name is invalid!</p>";
            }
            else{
                $errorMsg_FirstName = "";
            }
            return $errorMsg_FirstName;
        }

        function LastNameErrors($lastname){
            $errorMsg_LastName = "";
            if (empty($lastname)){
                $errorMsg_LastName = "<p class='error-message'>You must enter your last name!</p>";
            }
            else if (!preg_match("/^[A-Za-z ]{1,20}$/", $lastname)){
                $errorMsg_LastName = "<p class='error-message'>Your last name is invalid!</p>";
            }
            else{
                $errorMsg_LastName = "";
            }
            return $errorMsg_LastName;
        }

        function DoBErrors($dob){
            $errorMsg_dob = "";
            if (empty($dob)){
                $errorMsg_dob = "<p class='error-message'>You must enter your date of birth!</p>";
            }
            else if (!preg_match("/^\d{1,2}\/\d{1,2}\/\d{4}$/", $dob)){
                $errorMsg_dob = "<p class='error-message'>Your date of birth is invalid!</p>";
            }
            else{
                /////Validate age/////
                $dob_year = (int) substr($dob,-4); //take year from users and turn it into integer
                $current_year = (int) date("Y"); //get current year
                if(($current_year - $dob_year)>80 || ($current_year - $dob_year) < 15){ //make sure users are not below 15 or above 80
                    $errorMsg_dob = "<p class='error-message'>You must be above 15 or below 80</p>";
                }
                else{
                    $errorMsg_dob = "";
                }
            }  
            return $errorMsg_dob;
        }

        function EmailErrors($email){
            $errorMsg_Email = "";
            if (empty($email)){
                $errorMsg_Email = "<p class='error-message'>You must enter your email!</p>";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorMsg_Email = "<p class='error-message'>Your email is invalid!</p>";
            }
            else{
                $errorMsg_Email = "";
            }
            return $errorMsg_Email;
        }

        function GendersErrors($gender){
            $errorMsg_Gender = "";
            if (empty($gender)){
                $errorMsg_Gender = "<p class='error-message'>You must choose an option!</p>";
            }
            else{
                $errorMsg_Gender = "";
            }
            return $errorMsg_Gender;
        }

        function PhoneErrors($phonenumber){
            $errorMsg_phone = "";
            if (empty($phonenumber)){
                $errorMsg_phone = "<p class='error-message'>You must enter your phone number!</p>";
            }
            else if(!preg_match("/^[0-9 ]{8,12}$/", $phonenumber)){
                $errorMsg_phone = "<p class='error-message'>Your phone number is invalid!</p>";
            }
            else{
                $errorMsg_phone = "";
            }
            return $errorMsg_phone;
        }

        function CountryErrors($country){
            $errorMsg_Country = "";
            if ($country == "blank"){
                $errorMsg_Country = "<p class='error-message' style='padding-right: 40%;'>You must choose your country!</p>";
            }
            else{
                $errorMsg_Country = "";
            }
            return $errorMsg_Country;
        }

        function Address1Errors($adone){
            $errorMsg_Address_1 = "";
            if (empty($adone)){
                $errorMsg_Address_1 = "<p class='error-message'>You must enter your address!</p>";
            }
            else if(strlen($adone) > 40){
                $errorMsg_Address_1 = "<p class='error-message'>Your address must be less than 40 characters!</p>";
            }
            else{
                $errorMsg_Address_1 = "";
            }
            return $errorMsg_Address_1;
        }

        function Address2Errors($adtwo){
            $errorMsg_Address_2 = "";
            if(strlen($adtwo) > 40){
                $errorMsg_Address_2 = "<p class='error-message'>Your address must be less than 40 characters!</p>";
            }
            else{
                $errorMsg_Address_2 = "";
            }
            return $errorMsg_Address_2;
        }
        function SuburbErrors($suburb){
            $errorMsg_Suburb = "";
            if (empty($suburb)){
                $errorMsg_Suburb = "<p class='error-message' style='padding-right: 45%;'>You must enter your suburb!</p>";
            }
            else if(strlen($suburb) > 40){
                $errorMsg_Suburb = "<p class='error-message' style='padding-right: 45%;'>Your suburb must be less than 40 characters!</p>";
            }
            else{
                $errorMsg_Suburb= "";
            }
            return $errorMsg_Suburb;
        }
        function StateErrors($states){
            $errorMsg_States = "";
            if ($states == "blank"){
                $errorMsg_States = "<p class='error-message' style='padding-right: 45%;'>You must choose a state!</p>";
            }
            else{
                $errorMsg_States = "";
            }
            return $errorMsg_States;
        }

        function PostcodeErrors($postcode,$states){
            $errorMsg_Postcode = "";
            if (empty($postcode)){
                $errorMsg_Postcode = "<p class='error-message' style='padding-right: 45%;'>You must enter your postcode!</p>";
            }
            else if(!preg_match("/^[0-9]{4}$/", $postcode)){
                $errorMsg_Postcode = "<p class='error-message' style='padding-right: 45%;'>You postcode must be 4 digits numbers</p>";
            }
            else{
                $postcode = remove0($postcode);
                if (($states == "ACT" && (($postcode<200 || $postcode>299) && ($postcode<2600 || $postcode>2618) && ($postcode<2900 || $postcode>2920))) || 
                    ($states == "NSW" && (($postcode<1000 || $postcode>1999) && ($postcode<2000 || $postcode>2599) && ($postcode<2619 || $postcode>2899) && ($postcode<2921 || $postcode>2999))) || 
                    ($states == "VIC" && (($postcode<3000 || $postcode>3999) && ($postcode<8000 || $postcode>8999))) ||
                    ($states == "QLD" && (($postcode<4000 || $postcode>4999) && ($postcode<9000 || $postcode>9999))) ||
                    ($states == "SA" && (($postcode<5000 || $postcode>5799) && ($postcode<5800 || $postcode>5999))) ||
                    ($states == "WA" && (($postcode<6000 || $postcode>6797) && ($postcode<6800 || $postcode>6999))) || 
                    ($states == "TAS" && (($postcode<7000 || $postcode>7799) && ($postcode<7800 || $postcode>7999))) ||
                    ($states == "NT" && (($postcode<800 || $postcode>899) && ($postcode<900 || $postcode>999))) ){

                    $errorMsg_Postcode = "<p class='error-message' style='padding-right: 45%;'>Your postcode must match the states you choose!</p>";
                }
                else{
                    $errorMsg_Postcode = "";
                }    
            }
            return $errorMsg_Postcode;
        }

        function SkillsErrors($skills){
            $errorMsg_Skills = "";
            if (empty($skills)){
                $errorMsg_Skills = "<p class='error-message'>You have to choose at least 1 skill!</p>";
            }
            else {
                $errorMsg_Skills = "";
            }
            return $errorMsg_Skills;
        }

        function OtherSkillsErrors($skills_array, $skillbox){
            $errorMsg_OtherSkills = "";
            if ((strpos($skills_array,'Otherskills')!==false) && $skillbox ==""){
                $errorMsg_OtherSkills = "<p class='error-message'>You must specify your other skills!</p>";
            }
            else {
                $errorMsg_OtherSkills = "";
            }
            return $errorMsg_OtherSkills;
        }
?>