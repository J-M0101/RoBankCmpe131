<?php
  session_start();
  $username = "$_SESSION[username]";


if (isset($_POST["card"])&&(isset($_POST["pin"]))){
  $card = $_POST["card"];
  $pin = $_POST["pin"];


  $conn = mysqli_connect("localhost", "root", "", "bank");
  $sql = "UPDATE `accounts` SET `pin`= $pin WHERE `cardnumber` = $card";
  $result = $conn->query($sql);


  echo "Card # " . $card . " pin has been changed.";
}


 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Name Account</title>
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

<!-- Delete Account php code here  -->


<form id="card" name="card" method="post" action="activateCard.php">
  <div id="card">
    Please enter the card to activate
    <BR>
    <input type="text" name = "card">
    <BR>
    Enter the Pin number:
    <BR>
    <input type="text" name = "pin">
    <BR>
    <input type="submit" name="change" value="Change Account Name">
  </div>
</form>


<!--DELETE FROM `accounts` WHERE `account` = $accountchange -->


<!-- Return to menu  -->

      </body>
    </html>
