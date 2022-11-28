<?php
  session_start();
  /*
  have session_start(); on every page. $_SESSION[username] is saved when logged in, need for many functions
  */


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
          */
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
          <button class="toplink"><a href="accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">

          <style>
            .dropbtn {
              display: flex;
              background-color: #014421;
              align-self: center;
              border: none;
              font-size: 25px;
            }

            .dropdown {
              position: relative;
              display: inline-block;
              display: flex;
              margin-right:5rem;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f1f1f1;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #3e8e41;}
            </style>

            <div class="dropdown">
              <button class="dropbtn" id="topcolor">Checking Account: xxxx-xxxx-xxxx-7890</button>
              <div class="dropdown-content">
                <a href="#">Checking Account: xxxx-xxxx-xxxx-1246</a>
                <a href="#">Saving Account: xxxx-xxxx-xxxx-6343</a>
                <a href="#">Saving Account: xxxx-xxxx-xxxx-6844</a>
              </div>
            </div>

            <div class = "rightBoxR">
              <button class="toplink"><a href="accountLogin.php" id="topcolor">LOGOUT</a></button>
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
          echo "<h1><FONT COLOR=black>Balance: $" . $row["balance"] . ", " .$row["accountname"]." " . $row["type"] . " account xxxx-xxxx-xxxx-" .substr($row["account"],-4);
          echo "</div>";
          echo "<div class = 'centerTab'>";
          echo "</div>";
        }
      }
      ?>

      <!-- HTML continue  -->

      <div class = "bottomBox">
        <div class = "centerBox3">
          <div class = "centerTab">
            <h2>How can we help today?</h2>

          </div>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountTransfer.php" id="topcolor">Transfer Funds</a></button>
          </div>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountCreate.php" id="topcolor">Create Checking/Saving Account</a></button>
          </div>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountDelete.php" id="topcolor">Delete Checking/Saving Account</a></button>
          </div>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountInformation.php" id="topcolor">Account Information</a></button>
          </div>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountLogin.html" id="topcolor">View All Balances</a></button>
          </div>

        </div>
      </div>


  </body>
</html>
