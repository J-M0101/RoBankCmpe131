<?php
  session_start();
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
          <button class="toplink"><a href="accountMain.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
      </div>
    </div>



          <?php
          if (isset($_POST["pin"])){
            $card = $_SESSION['cardnum'];
            $pin = $_POST['pin'];
            $conn = mysqli_connect("localhost", "root", "", "bank");
            $sql = "UPDATE `accounts` SET `pin`= $pin WHERE `cardnumber` = $card";
            $result = $conn->query($sql);
            header("Location: accountMain.php");
          }
          else

            {
            $conn = mysqli_connect("localhost", "root", "", "bank");
            $username = "$_SESSION[username]";
            $rand = rand(1000000000000000,9999999999999999); // 16 digit account number
            $rand2 = rand(10000000,99999999); // random card number, 8 digits
            $rand3 = rand(1000,999999); // random pin number
            $sql = "INSERT INTO `accounts` (`accountname`, `account`, `type`, `username`, `balance`, `cardnumber`, `pin`) VALUES ('savings', '$rand', 'savings', '$username', '0', $rand2, $rand3)";
            $result = $conn->query($sql);
            $_SESSION['cardnum'] = $rand2;

            echo "<BR> A new savings account has been created:   ". $rand;
            echo "<BR> Card number: " . $rand2;

            echo "<BR> Please enter a pin number: <BR>";
          }
          ?>
          <form action="accountCreateSavings.php" method="post">
           <input type="number" min = "0" name = "pin">
                    <!--<input type="submit" min="0" id="amount" name="amount" value = "Transfer funds">-->
           <input type="submit" name="transfer" value="Enter a pin number">
          </form>
          You will be sent back to home after pin has been entered.

          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
          </div>


    </html>
