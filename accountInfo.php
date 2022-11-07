<?php
session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Account Info</title>
  </head>

  <body>
    
    <div class = "topBox">

      <div class = "leftBoxL">
        <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxL">
          <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
        </div>

        <div class = "rightBoxR">
          <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">Login</a></button>
        </div>
      </div>
    </div>

    <div class = "parentBox">
      <div class = "lowerBackdrop">
        <div class = "checkingsaccount">
          <div class="dropdown">
            <button class="dropbtn">Checking Account</button>
            <div class="dropdown-content">
              <!-- <a href="/robank/ATMOptions.php">Account 1</a>
              <a href="/robank/ATMOptions.php">Account 2</a>
              <a href="/robank/ATMOptions.php">Account 3</a> -->
              <?php
              $conn = mysqli_connect("localhost", "root", "", "bank");
            
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              } 
                $r = $_SESSION['cardnumber'];
                $sql = "SELECT accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE cardnumber = '$r') AND type = 'checking';";
                $results = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($results);
                if($results)
                {
                  while($row = mysqli_fetch_assoc($results)){
                    echo "<a href='/robank/ATMOptions.php'>" . $row['accountname'] . "</a>";
                  }
                }
              ?>
            </div>
          </div>
        </div>
        <div class = "checkingsaccount">
          <div class="dropdown">
            <button class="dropbtn">Savings Account</button>
            <div class="dropdown-content">
              <?php
              $conn = mysqli_connect("localhost", "root", "", "bank");
            
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              // $r = $_SESSION['cardnumber'];
                $sql = "SELECT accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE cardnumber = '$r') AND type = 'savings';";
                $results = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($results);
                if($results)
                {
                  while($row = mysqli_fetch_assoc($results)){
                  echo "<a href='/robank/ATMOptions.php'>" . $row['accountname'] . "</a>";
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>
</html>
