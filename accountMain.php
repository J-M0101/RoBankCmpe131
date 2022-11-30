<?php
  session_start();
  $username = "$_SESSION[username]";


  /*
  have session_start(); on every page. $_SESSION[username] is saved when logged in, need for many functions
  */

/*
  if (isset($_POST["username"]) &&
      isset($_POST['password'])) {
    if ($_POST["username"] && $_POST["password"]) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      //create connection
      $conn = mysqli_connect("localhost", "root", "", "bank");

      //Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // select user
      $sql = "SELECT password FROM users WHERE username = '$username'";
      //$sql = "SELECT password FROM users WHERE username = '$username'";
      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password) {
          $logged_in = true;
          $_SESSION["username"]=$username;
          $_SESSION['username']=$username;
          $_SESSION['username']='$username';
          $_SESSION['username']="$username";
          /*
          $_SESSION['logged_in'] = true;

          $sql = "SELECT * FROM users";
          $results = mysqli_query($conn, $sql);

        } else {
            $_SESSION["username"] = "incorrect password";
          header("Location: accountLogin.php");
          echo "password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }
      mysqli_close($conn); //close connection
    }else {
      $_SESSION["username"] = "One of the information is empty";
      header("Location: accountLogin.php");
      echo "Nothing was submitted";
    }
  }

  $username = "$_SESSION[username]";
  */
 ?>


<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles2.css">
    <title>Robank Account Page</title>
  </head>



  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountMain.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">


            <div class = "rightBoxR">
              <button class="toplink"><a href="accountLogin.php" id="topcolor">Logout</a></button>
            </div>
          </div>
      </div>


      <!-- PHP code for bank balances  -->

      <?php
        {
          /*
        $username = "$_SESSION[username]";
        */
        $conn = mysqli_connect("localhost", "root", "", "bank");
        $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
        $result = $conn->query($sql);
        foreach($result as $row) {
          echo "<div class ='centerBoxDisplayBalance'>";
          echo "<h1><FONT COLOR=black>Balance: $" . $row["balance"] . ", " .$row["accountname"] . ", xxxx-xxxx-xxxx-" .substr($row["account"],-4);
          echo "</div>";
          echo "<div class = 'centerTab'>";
          echo "</div>";
        }
      }
      ?>

      <!-- HTML continue  -->

      <div class = "bottomBox">
        <div class = "centerBox3">
          <h1 style="color:white;">How can we help today?</h1>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountTransfer.php" id="topcolor">Transfer Funds</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountCreate.php" id="topcolor">Create Checking/Saving Account</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountDelete.php" id="topcolor">Delete Checking/Saving Account</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountInformation.php" id="topcolor">User Information</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountChange.php" id="topcolor">Rename Account</a></button>
          </div>

          RoBank 2022 CMPE131

        </div>
      </div>


  </body>
</html>
