<?php
  session_start();
  $username = "$_SESSION[username]";
  if (!$username){
    header("Location: accountLogin.php");
  }
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

          <div class = "buttonGroup">
            <div class = "rightBoxR">
              <button class="toplink"><a href="accountLogin.php" id="topcolor">Logout</a></button>
            </div>
          </div>

      </div>
    </div>
<!-- Top of bar box. Designed with CSS flexdispalays.  -->



    <?php
    $selected = $_POST['accountdelete'];
    $conn = mysqli_connect("localhost", "root", "", "bank");
    $sql = "SELECT balance FROM accounts where account = $selected";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);
    if($row['balance'] == 0){
      echo "The balance in this account was $0. Account has been successfully deleted.<BR>";
    }
    else{
      echo "The remaining balance of $". $row['balance'] . " in this account has been mailed to your address.<BR>";
    }


      //$selected = $_POST['accountdelete'];
      echo "Account: xxxx-xxxx-xxxx-". substr($selected,-4) . " has been deleted.<BR>";
      $conn = mysqli_connect("localhost", "root", "", "bank");
      $sql = "DELETE FROM `accounts` WHERE `account` = '$selected'";
      $result = $conn->query($sql);
    ?>

    <BR>
    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
    </div>

    </html>
