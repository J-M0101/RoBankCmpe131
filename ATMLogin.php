<?php
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST["CardNumber"]) && isset($_POST["pin"])) 
      {   
        $creditCardNumber = $_POST["CardNumber"];
        $pin = $_POST["pin"];

        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "bank");
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //login user
        // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
        $sql = "SELECT account, pin, username from accounts WHERE cardnumber = '$creditCardNumber'";
        try{
            $results = mysqli_query($conn, $sql);

            if ($results) { 
              $row = mysqli_fetch_assoc($results);

              if ( $row["pin"] === $pin ) 
              {
                  $_SESSION['logged_in'] = true;
                  $_SESSION['cardnumber'] = $_POST["CardNumber"];
                  // TODO: cache username so you don't have to make hella subquries
<<<<<<< Updated upstream
                  // $_SESSION['username'] = "SELECT username FROM accounts where cardnumber = '$r'"
=======
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['account_id'] = $row['account'];

>>>>>>> Stashed changes
                  // echo "Successful login";
                  header("Location: ATMOptions.php");
              }
              else
              {
                  $error_message = 'Incorrect Password';
              }
            } 
          else {
              $error_message = "Failed Login";
          }
        }
        catch (Exception $e) {
            $error_message = "Failed query of creditCardNumber and pin";
        }
      }
      else
      {
          $error_message = "Missing input";
      }
    }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Robank ATM Login</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
    <div class = "topBox">
      <div class = "leftBoxL">
        <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxL">
          <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
        </div>

        <div class = "rightBoxR">
          <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
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
          <?php
           if (isset($error_message)) {
            ?>
            <p><?= $error_message ?></p>
            <?php
           }
            ?>
            <!-- <p class="atmLogin">ATM LOGIN</p> -->
            <form action="ATMLogin.php" method="post">
              <label for="CardNumber">Card Number:<br></label>
              <input type="text" id="CardNumber" name="CardNumber"><br><br>
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
