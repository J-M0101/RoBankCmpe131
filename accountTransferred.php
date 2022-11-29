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
          <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
      </div>
    </div>
<!-- Top of bar box. Designed with CSS flexdispalays.  -->



    <?php
      $from = $_POST['accountfrom'];
      $into = $_POST['accountinto'];
      $ammount = $_POST['ammount'];
      echo "The account to transfer from: ".$from."<BR>";
      echo "The account to transfer into: ".$into."<BR>";
      echo "Ammount to transfer: ".$ammount."<BR>";
      $conn = mysqli_connect("localhost", "root", "", "bank");
      $sql = "UPDATE `accounts` SET `balance`=`balance` - $ammount WHERE `account` = $from";
      $result = $conn->query($sql);

      $sql = "UPDATE `accounts` SET `balance`=`balance` + $ammount WHERE `account` = $into";
      $result = $conn->query($sql);
    ?>

    Your funds have been transferred!

    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
    </div>

    </html>
