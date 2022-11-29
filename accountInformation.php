<?php
  session_start();
  $username = "$_SESSION[username]";
  /*
  have session_start(); on every page. $_SESSION[username] is saved when logged in, need for many functions
  We'll put the username back into $username, easier to use.
  */
 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Account Page</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
        </div>

        <div class = "buttonGroup">
          <div class = "rightBoxR">
            <button class="toplink"><a href="accountMain.php" id="topcolor">Home</a></button>
          </div>
        </div>
    </div>
          <H3> Account Transfer </H3>
          <div class = "centerList">


            <?php
              {
                $conn = mysqli_connect("localhost", "root", "", "bank");
                $sql = "SELECT * FROM `users` WHERE `username`='$username'  ";
                $result = $conn->query($sql);
                $_SESSION['username']=$username;
                foreach($result as $row) {
                  $firstName = $row["firstname"];
                  $lastName = $row["lastname"];
                  $phoneNumber = $row["phone"];
                  $email = $row["email"];
                  $address = $row["address"];

                  echo "<table>";
                  echo  "<tr>";
                  echo    "<th>First Name</th>";
                  echo    "<th>".$firstName."</th>";
                  echo "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Last Name</th>";
                  echo    "<th>".$lastName."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Address</th>";
                  echo    "<th>".$phoneNumber."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Email</th>";
                  echo    "<th>".$email."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Phone Number</th>";
                  echo    "<th>".$address."</th>";
                  echo  "<tr/>";
                  echo"</table>";
                }
              }
            ?>
    </html>
