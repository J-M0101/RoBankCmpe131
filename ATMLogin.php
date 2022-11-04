<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Robank ATM Login</title>
  </head>

  <body>

<!-- Drop/Create Database on Loading for Development purposes only -->
<?php
  $conn = mysqli_connect("localhost", "root", "", "atmlogin");

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $drop = "DROP TABLE IF EXISTS creditcard;";
  $create = "CREATE TABLE creditcard( creditCardNumber varchar(255) NOT NULL UNIQUE,
                                      pin varchar(255) NOT NULL,
                                      balance varchar(255) NOT NULL DEFAULT(0))";
  // $insert = "INSERT INTO creditcard (creditCardNumber, pass) VALUES (12345, 1111)";
  try
  {
    // $results = mysqli_query($conn, $drop);
    // $results = mysqli_query($conn, $create);
    // $results = mysqli_query($conn, $insert);
  }
  catch(Exception $e)
  {
    header("Location: ATMLogin.php");
    echo "Failed to create database";
    die();
  }
?>
<!-- Drop/Create Database on Loading for Development purposes only -->

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
    <div class = "topBox">
      <div class = "leftBoxL">
        <button class="toplink"><a href="accountLogin.html" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxL">
          <button class="toplink"><a href="accountInfo.html" id="topcolor">HOW TO USE?</a></button>
        </div>

        <div class = "rightBoxR">
          <button class="toplink"><a href="ATMLogin.html" id="topcolor">HOME</a></button>
        </div>
      </div>
    </div>

    <div class = "bottomBox">
    
      <!-- <div class = "centerBox">
          <div class = "centerLeftBox">
            <p class="atmLogin">ATM LOGIN</p>
          </div>
      </div> -->
      <div class = "centerBox2">
        <p class="atmLogin">ATM LOGIN</p>
        <div class = "centerRightBox">
            <!-- <p class="atmLogin">ATM LOGIN</p> -->
            <form action="/github/actionATMLogin.php" method="post">
              <label for="CardNumber">Card Number:<br></label>
              <input type="text" id="creditCardNumber" name="creditCardNumber"><br><br>
              <label for="pin">Pin:<br></label>
              <input type="password" id="pin" name="pin"><br><br>
              <div class="submitBtn">
                <input type="submit" value="Submit">
              </div>
            </form>
        </div>
      </div>

    </div>

  </body>
</html>
