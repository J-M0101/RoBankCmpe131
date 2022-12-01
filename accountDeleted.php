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
          <button class="toplink"><a href="accountMain.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
      </div>
    </div>
<!-- Top of bar box. Designed with CSS flexdispalays.  -->



    <?php
      $selected = $_POST['accountdelete'];
      echo "Account: ". $selected . " has been deleted.<BR>";
      $conn = mysqli_connect("localhost", "root", "", "bank");
      $sql = "DELETE FROM `accounts` WHERE `account` = '$selected'";
      $result = $conn->query($sql);
    ?>

    <BR>
    The remaining balance in this account has been mailed to your address.

    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
    </div>

    </html>
