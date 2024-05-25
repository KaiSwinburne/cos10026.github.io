<!DOCTYPE html>
<html>
  <head>
    <title>EOI Management</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  </head>

  <!-- Taskbar -->
  <body class = "mag-body">
  <?php
      include "INC/header.inc.php";
  ?>
    <main class="mag-main">
      <div class = mian-info-text>
        <br><br>
      <?php
        require_once("settings.php");
        $conn = mysqli_connect($host,$user,$pwd,$sql_db);
        if(!$conn) {
          echo "<p>Database connection failure!</p>";
        } 
        else {
          ///////////////////////List all EOI for users to see///////////////////////////////////////////////////////////// 
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
      ?>

        <form action="manage_queries.php" method="post" id="listeois">
          <h3 class="mang-h3">List EOIs</h3>
            <input type="submit" name="EOI_edit" value="List all EOIs" class="mag-sub"/>


          <h3 class="mang-h3">EOIs for a particular position</h3>
          <label for="JobRefNum" class="mang">Job Reference Number:</label>
            <select name="JobRefNum" id="JobRefNum" class="input-box2">
              <option value="52348">#52348</option>
              <option value="53549">#53549</option>
            </select>
          <input type="submit" name="EOI_edit" value="List EOIs by Position" class="mag-sub"/>



          <h3 class="mang-h3">EOIs for a particular applicant</h3>
          <div class="input-box">
            <label for="firstname" class="label">First Name:</label>
              <input type="text" name="firstname" id="firstname" autocomplete="off" placeholder="Enter firstname" class="text-input" />
            <label for="lastname" class="label">Last Name:</label>
              <input type="text" name="lastname" id="lastname" autocomplete="off" placeholder="Enter lastname" class="text-input" />
          </div>
          <input
            type="submit"
            name="EOI_edit"
            value="List EOIs by Applicant"
            class="mag-sub"
          />



          <h3 class="mang-h3">Delete EOIs with a specified job reference number</h3>
          <label for="job_ref_num_delete" class="mang">Job Reference Number:</label>
            <select name="job_ref_num_delete" id="job_ref_num_delete" class="input-box2">
              <option value="52348">#52348</option>
              <option value="53549">#53549</option>
            </select>
          <input
            type="submit"
            name="EOI_edit"
            value="Delete EOIs by Position"
            class="mag-sub"
          />



          <h3 class="mang-h3">Change the Status of an EOI</h3>
          <label for="EOInumber " class="mang">EOI Number:</label>
            <input type="number" name="EOInumber" id="EOInumber" class="input-box2"/>
          <div class="select">
            <label for="Status" class="mang">New Status:</label>
            <select name="Status" id="Status" class="input-box2">
              <option value="New">New</option>
              <option value="Current">Current</option>
              <option value="Final">Final</option>
            </select>
          </div>
          <input type="submit" name="EOI_edit" value="Change EOI Status" class="mag-sub"/>
        </form>
      </div>
    </main>
    <?php
       include "INC/footer.inc";
     ?>
  </body>
</html>