<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style/style2.css">
<meta name="description" content="Creating Web Applications Lab 10" />
<meta name="keywords" content="PHP, MySql" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
<title>Retrieving records to HTML</title>
</head>
<body class="mag-body">

<?php
      include "INC/header.inc.php";
?>
<main class="mag-main">
    <div class = mian-info-text style="position: relative; top: -10%;">
    <br><br>
        <h1 class="mange-h1" style="padding: 0px; margin-top: 0px;">Result</h1>
        <?php
            require_once("settings.php");
            //Check if users actually submitted the form
            if (isset($_POST["EOI_edit"])) {
                
                //Connect to the server database
                $conn = mysqli_connect($host,$user,$pwd,$sql_db);

                //If can't connect to database
                if(!$conn) {
                    echo "<p>Database connection failure!</p>";
                } 
                else {
                    
                    ///////////////////////If users choose to list all EOI///////////////////////////////////////////////////////////// 
                    if ($_POST["EOI_edit"] == "List all EOIs"){

                        $query = "SELECT * FROM EOI";
                        $result = mysqli_query($conn, $query);

                        if(!$result) {
                            echo "<h1>Something is wrong with ", $query, "</h1>"; 
                        } 
                        else {
                            // code to handle "List all EOIs" form submission
                            //DONE
                            echo "<table class='table'>\n";
                            echo "<tr>\n "
                            ."<th scope=\"col\">EOInumber</th>\n "
                            ."<th scope=\"col\">JobRefNumr</th>\n "
                            ."<th scope=\"col\">firstname</th>\n "
                            ."<th scope=\"col\">lastname</th>\n "
                            ."<th scope=\"col\">dob</th>\n "
                            ."<th scope=\"col\">gender</th>\n "
                            ."<th scope=\"col\">streetaddress</th>\n "
                            ."<th scope=\"col\">suburb</th>\n "
                            ."<th scope=\"col\">state</th>\n "
                            ."<th scope=\"col\">postcode</th>\n "
                            ."<th scope=\"col\">email_Address</th>\n "
                            ."<th scope=\"col\">phonenumber</th>\n "
                            ."<th scope=\"col\">reason</th>\n "
                            ."<th scope=\"col\">Skills</th>\n "
                            ."<th scope=\"col\">otherskills</th>\n "
                            ."<th scope=\"col\">Status</th>\n "
                            ."</tr>\n ";
                            
                            // retrieve current record pointed by the result pointer         
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<tr>\n ";
                                echo "<td>",$row["EOInumber"],"</td>\n ";
                                echo "<td>",$row["JobRefNum"],"</td>\n ";
                                echo "<td>",$row["firstname"],"</td>\n ";
                                echo "<td>",$row["lastname"],"</td>\n ";
                                echo "<td>",$row["dob"],"</td>\n ";
                                echo "<td>",$row["gender"],"</td>\n ";
                                echo "<td>",$row["streetaddress"],"</td>\n ";
                                echo "<td>",$row["suburb"],"</td>\n ";
                                echo "<td>",$row["state"],"</td>\n ";
                                echo "<td>",$row["postcode"],"</td>\n ";
                                echo "<td>",$row["email"],"</td>\n ";
                                echo "<td>",$row["phonenumber"],"</td>\n ";
                                echo "<td>",$row["reason"],"</td>\n";
                                echo "<td>",$row["Skills"],"</td>\n";
                                echo "<td>", $row["otherskills"],"</td>\n ";
                                echo "<td>", $row["Status"],"</td>\n ";
                                echo "</tr>\n ";
                            }
                            echo "</table>\n ";
                            // Frees up the memory, after using the result pointer
                            mysqli_free_result($result);
                        }
                    }
                    
                    //////////////////////////If users want to list EOI by job position/////////////////////////////////////////////////////////////          
                    elseif($_POST["EOI_edit"] == "List EOIs by Position") {

                        // code to handle "List EOIs by Position" form submission
                        // get the input data
                        $JobRefNum = trim($_POST["JobRefNum"]);

                        if (!empty($JobRefNum)) {
                            // prepare the SQL statement
                            $sql = "SELECT * FROM EOI WHERE JobRefNum = '$JobRefNum'";  
                            // execute the SQL statement
                            $result = mysqli_query($conn, $sql);

                            // check if the SQL statement was executed successfully
                            if (!$result) {
                                // display an error message and the SQL statement
                                echo "<p>Error: " . mysqli_error($conn) . "</p>";
                                echo "<p>SQL: " . $sql . "</p>";
                            } 
                            else {
                                // display a success message
                                

                                // display the retrieved records
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<p>No results found.</p>";
                                } 
                                else {
                                    echo "<table class='table'>\n";
                                    echo "<tr>\n "
                                        ."<th scope=\"col\">EOInumber</th>\n "
                                        ."<th scope=\"col\">JobRefNumr</th>\n "
                                        ."<th scope=\"col\">firstname</th>\n "
                                        ."<th scope=\"col\">lastname</th>\n "
                                        ."<th scope=\"col\">dob</th>\n "
                                        ."<th scope=\"col\">gender</th>\n "
                                        ."<th scope=\"col\">streetaddress</th>\n "
                                        ."<th scope=\"col\">suburb</th>\n "
                                        ."<th scope=\"col\">state</th>\n "
                                        ."<th scope=\"col\">postcode</th>\n "
                                        ."<th scope=\"col\">email_Address</th>\n "
                                        ."<th scope=\"col\">phonenumber</th>\n "
                                        ."<th scope=\"col\">reason</th>\n "
                                        ."<th scope=\"col\">Skills</th>\n "
                                        ."<th scope=\"col\">otherskills</th>\n "
                                        ."<th scope=\"col\">Status</th>\n "
                                        ."</tr>\n ";
                                
                                    // retrieve current record pointed by the result pointer
                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>\n ";
                                        echo "<td>",$row["EOInumber"],"</td>\n ";
                                        echo "<td>",$row["JobRefNum"],"</td>\n ";
                                        echo "<td>",$row["firstname"],"</td>\n ";
                                        echo "<td>",$row["lastname"],"</td>\n ";
                                        echo "<td>",$row["dob"],"</td>\n ";
                                        echo "<td>",$row["gender"],"</td>\n ";
                                        echo "<td>",$row["streetaddress"],"</td>\n ";
                                        echo "<td>",$row["suburb"],"</td>\n ";
                                        echo "<td>",$row["state"],"</td>\n ";
                                        echo "<td>",$row["postcode"],"</td>\n ";
                                        echo "<td>",$row["email"],"</td>\n ";
                                        echo "<td>",$row["phonenumber"],"</td>\n ";
                                        echo"<td>",$row["reason"],"</td>\n";
                                        echo"<td>",$row["Skills"],"</td>\n";
                                        echo "<td>", $row["otherskills"],"</td>\n ";
                                        echo "<td>", $row["Status"],"</td>\n ";
                                        echo "</tr>\n ";
                                    }
                                    echo "</table>\n ";
                                    // Frees up the memory, after using the result pointer
                                    mysqli_free_result($result);
                                }
                            }
                        }
                    }
                    //////////////////////////If users want to list EOI by applicants name/////////////////////////////////////////////////////////////
                    elseif($_POST["EOI_edit"] == "List EOIs by Applicant") {
                        // get the input data
                        $firstname = trim($_POST["firstname"]);
                        $lastname = trim($_POST["lastname"]);
                        $sql = "";

                        if (!empty($firstname) && empty($lastname)) {
                            $sql .= "SELECT * FROM EOI WHERE firstname = '$firstname'";
                        }

                        if (!empty($lastname) && empty($firstname)) {
                            $sql .="SELECT * FROM EOI WHERE lastname = '$lastname'";
                        }

                        if (!empty($firstname) && !empty($lastname)){
                            $sql .= "SELECT * FROM EOI WHERE firstname = '$firstname' AND lastname = '$lastname'";
                        }

                        if (empty($firstname) && empty($lastname)){
                            echo "<p>Name fields empty. Please enter data</p>";
                        }

                        // execute the SQL statement
                        $result = mysqli_query($conn, $sql);

                        // check if the SQL statement was executed successfully
                        if (!$result) {
                            // display an error message and the SQL statement
                            echo "<p>Error: " . mysqli_error($conn) . "</p>";
                            echo "<p>SQL: " . $sql . "</p>";
                        } 
                        else {
                            // display a success message
                            

                            // display the retrieved records
                            if (mysqli_num_rows($result) == 0) {
                                echo "<p>No results found.</p>";
                            } 
                            else {
                                echo "<table class='table'>\n";
                                echo "<tr>\n "
                                    ."<th scope=\"col\">EOInumber</th>\n "
                                    ."<th scope=\"col\">JobRefNumr</th>\n "
                                    ."<th scope=\"col\">firstname</th>\n "
                                    ."<th scope=\"col\">lastname</th>\n "
                                    ."<th scope=\"col\">dob</th>\n "
                                    ."<th scope=\"col\">gender</th>\n "
                                    ."<th scope=\"col\">streetaddress</th>\n "
                                    ."<th scope=\"col\">suburb</th>\n "
                                    ."<th scope=\"col\">state</th>\n "
                                    ."<th scope=\"col\">postcode</th>\n "
                                    ."<th scope=\"col\">email_Address</th>\n "
                                    ."<th scope=\"col\">phonenumber</th>\n "
                                    ."<th scope=\"col\">reason</th>\n "
                                    ."<th scope=\"col\">Skills</th>\n "
                                    ."<th scope=\"col\">otherskills</th>\n "
                                    ."<th scope=\"col\">Status</th>\n "
                                    ."</tr>\n ";
                    
                                // retrieve current record pointed by the result pointer
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>\n ";
                                    echo "<td>",$row["EOInumber"],"</td>\n ";
                                    echo "<td>",$row["JobRefNum"],"</td>\n ";
                                    echo "<td>",$row["firstname"],"</td>\n ";
                                    echo "<td>",$row["lastname"],"</td>\n ";
                                    echo "<td>",$row["dob"],"</td>\n ";
                                    echo "<td>",$row["gender"],"</td>\n ";
                                    echo "<td>",$row["streetaddress"],"</td>\n ";
                                    echo "<td>",$row["suburb"],"</td>\n ";
                                    echo "<td>",$row["state"],"</td>\n ";
                                    echo "<td>",$row["postcode"],"</td>\n ";
                                    echo "<td>",$row["email"],"</td>\n ";
                                    echo "<td>",$row["phonenumber"],"</td>\n ";
                                    echo"<td>",$row["reason"],"</td>\n";
                                    echo"<td>",$row["Skills"],"</td>\n";
                                    echo "<td>", $row["otherskills"],"</td>\n ";
                                    echo "<td>", $row["Status"],"</td>\n ";
                                    echo "</tr>\n ";
                                }
                                echo "</table>\n ";
                                // Frees up the memory, after using the result pointer
                                mysqli_free_result($result);
                            }
                        }
                    }

                    //////////////////////////If users want to delete EOI/////////////////////////////////////////////////////////////
                    elseif($_POST["EOI_edit"] == "Delete EOIs by Position") {
                        
                        // get the input data
                        $job_ref_num_delete = trim($_POST["job_ref_num_delete"]);

                        // prepare the SQL statement
                        $sql = "DELETE FROM EOI WHERE JobRefNum='$job_ref_num_delete'";

                        // execute the SQL statement
                        $result = mysqli_query($conn, $sql);

                        // check if the SQL statement was executed successfully
                        if (!$result) {
                            // display an error message and the SQL statement
                            echo "<p>Error: " . mysqli_error($conn) . "</p>";
                            echo "<p>SQL: " . $sql . "</p>";
                        } 
                        else {
                            // display a success message
                            echo "<p>Record deleted successfully.</p>";

                            // retrieve the inserted record
                            $result = mysqli_query($conn, "SELECT * FROM EOI");

                            // check if the record was retrieved successfully
                            if (!$result) {
                                // display an error message and the SQL statement
                                echo "<p>Error: " . mysqli_error($conn) . "</p>";
                                echo "<p>SQL: " . $sql . "</p>";
                            } 
                            else {
                                // Display the retrieved records
                                echo "<table class='table'>\n";
                                echo "<tr>\n "
                                ."<th scope=\"col\">EOInumber</th>\n "
                                    ."<th scope=\"col\">JobRefNumr</th>\n "
                                    ."<th scope=\"col\">firstname</th>\n "
                                    ."<th scope=\"col\">lastname</th>\n "
                                    ."<th scope=\"col\">dob</th>\n "
                                    ."<th scope=\"col\">gender</th>\n "
                                    ."<th scope=\"col\">streetaddress</th>\n "
                                    ."<th scope=\"col\">suburb</th>\n "
                                    ."<th scope=\"col\">state</th>\n "
                                    ."<th scope=\"col\">postcode</th>\n "
                                    ."<th scope=\"col\">email_Address</th>\n "
                                    ."<th scope=\"col\">phonenumber</th>\n "
                                    ."<th scope=\"col\">reason</th>\n "
                                    ."<th scope=\"col\">Skills</th>\n "
                                    ."<th scope=\"col\">otherskills</th>\n "
                                    ."<th scope=\"col\">Status</th>\n "
                                ."</tr>\n ";

                                // retrieve current record pointed by the result pointer
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>\n ";
                                        echo "<td>",$row["EOInumber"],"</td>\n ";
                                        echo "<td>",$row["JobRefNum"],"</td>\n ";
                                        echo "<td>",$row["firstname"],"</td>\n ";
                                        echo "<td>",$row["lastname"],"</td>\n ";
                                        echo "<td>",$row["dob"],"</td>\n ";
                                        echo "<td>",$row["gender"],"</td>\n ";
                                        echo "<td>",$row["streetaddress"],"</td>\n ";
                                        echo "<td>",$row["suburb"],"</td>\n ";
                                        echo "<td>",$row["state"],"</td>\n ";
                                        echo "<td>",$row["postcode"],"</td>\n ";
                                        echo "<td>",$row["email"],"</td>\n ";
                                        echo "<td>",$row["phonenumber"],"</td>\n ";
                                        echo"<td>",$row["reason"],"</td>\n";
                                        echo"<td>",$row["Skills"],"</td>\n";
                                        echo "<td>", $row["otherskills"],"</td>\n ";
                                        echo "<td>", $row["Status"],"</td>\n ";
                                    echo "</tr>\n ";
                            
                                }
                                echo "</table>\n ";
                                // Frees up the memory, after using the result pointer
                                mysqli_free_result($result);
                            } // if successful query operation
                        }
                    }
                    //////////////////////////If users want to change status of EOI/////////////////////////////////////////////////////////////
                    elseif($_POST["EOI_edit"] == "Change EOI Status") {
                        // get the input data
                        $eoi_number = (int)trim($_POST["EOInumber"]);
                        $new_status =  trim($_POST["Status"]);

                        // prepare the SQL statement
                        $sql = "UPDATE EOI SET Status = '$new_status' WHERE `EOInumber` = '$eoi_number'";

                        // execute the SQL statement
                        $result = mysqli_query($conn, $sql);

                        // check if the SQL statement was executed successfully
                        if (!$result) {
                            // display an error message and the SQL statement
                            echo "<p>Error: " . mysqli_error($conn) . "</p>";
                            echo "<p>SQL: " . $sql . "</p>";
                        } 
                        else {
                            // display a success message
                            echo "<p>Record updated successfully.</p>";

                            // retrieve the inserted record
                            $result = mysqli_query($conn, "SELECT * FROM EOI");

                            // check if the record was retrieved successfully
                            if (!$result) {
                                // display an error message and the SQL statement
                                echo "<p>Error: " . mysqli_error($conn) . "</p>";
                                echo "<p>SQL: " . $sql . "</p>";
                            } 
                            else {
                                // Display the retrieved records
                                echo "<table class='table'>\n";
                                echo "<tr>\n "
                                ."<th scope=\"col\">EOInumber</th>\n "
                                ."<th scope=\"col\">JobRefNumr</th>\n "
                                ."<th scope=\"col\">firstname</th>\n "
                                ."<th scope=\"col\">lastname</th>\n "
                                ."<th scope=\"col\">dob</th>\n "
                                ."<th scope=\"col\">gender</th>\n "
                                ."<th scope=\"col\">streetaddress</th>\n "
                                ."<th scope=\"col\">suburb</th>\n "
                                ."<th scope=\"col\">state</th>\n "
                                ."<th scope=\"col\">postcode</th>\n "
                                ."<th scope=\"col\">email_Address</th>\n "
                                ."<th scope=\"col\">phonenumber</th>\n "
                                ."<th scope=\"col\">reason</th>\n "
                                ."<th scope=\"col\">Skills</th>\n "
                                ."<th scope=\"col\">otherskills</th>\n "
                                ."<th scope=\"col\">Status</th>\n "
                                ."</tr>\n ";

                                // retrieve current record pointed by the result pointer
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>\n ";
                                        echo "<td>",$row["EOInumber"],"</td>\n ";
                                                echo "<td>",$row["JobRefNum"],"</td>\n ";
                                                echo "<td>",$row["firstname"],"</td>\n ";
                                                echo "<td>",$row["lastname"],"</td>\n ";
                                                echo "<td>",$row["dob"],"</td>\n ";
                                                echo "<td>",$row["gender"],"</td>\n ";
                                                echo "<td>",$row["streetaddress"],"</td>\n ";
                                                echo "<td>",$row["suburb"],"</td>\n ";
                                                echo "<td>",$row["state"],"</td>\n ";
                                                echo "<td>",$row["postcode"],"</td>\n ";
                                                echo "<td>",$row["email"],"</td>\n ";
                                                echo "<td>",$row["phonenumber"],"</td>\n ";
                                                echo"<td>",$row["reason"],"</td>\n";
                                                echo"<td>",$row["Skills"],"</td>\n";
                                                echo "<td>", $row["otherskills"],"</td>\n ";
                                                echo "<td>", $row["Status"],"</td>\n ";
                                    echo "</tr>\n ";
                                    }
                                echo "</table>\n ";
                                // Frees up the memory, after using the result pointer
                                mysqli_free_result($result);
                            } // if successful query operation

                        }
                    }
                    echo "<p>Return to <a href='manage.php' class='leave-it'>Manager</a> page";
                }
            }
        ?>
    </div>
</main>
<?php
       include "INC/footer.inc";
     ?>
</body>
</html>