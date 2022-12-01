<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: ATMLogin.php');
}


$conn = mysqli_connect("localhost", "root", "", "bank");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function list_accounts($account_type) {
  global $conn;

  $r = $_SESSION['cardnumber'];
  $sql = "SELECT account, accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE cardnumber = '$r') AND type = '$account_type';";
  $results = mysqli_query($conn, $sql);
  if($results)
  {
    while($row = mysqli_fetch_assoc($results)){
      // echo "<a href='/robank/ATMOptions.php?id=" . $row['account'] ."'>" . $row['accountname'] . "</a>";
      ?>
        <div class = "one">
          <form action="ATMOptions.php" method="post">
            <input type="hidden" name="account_id" value="<?= $row['account'] ?>">
            <button class = "toplinkone"type="submit"><?= $row['accountname'] ?></button>
          </form>
        </div>
      <?php
    }
  }
}

function list_account_name(){
  global $conn;

  $r = $_SESSION['cardnumber'];
  $sql = "SELECT username FROM accounts WHERE cardnumber = $r;";
  $results = mysqli_query($conn, $sql);
  if($results){
    while($row = mysqli_fetch_assoc($results)){
      $an = $row['username'];
      echo $an;
    }
  }
}


?>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Account Info</title>
  </head>

  <body>
    
    <div class = "topBox">

      <div class = "leftBoxL">
        <button class="toplink"><a href="accountInfo.php" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxR">
          <button class="toplink"><a href="ATMLogin.php" id="topcolor">Logout</a></button>
        </div>
      </div>
    </div>

    <div class = "parentBox">
      <div class = "lowerBackdrop">
        <div class = "checkingsaccount">
          Hello, <?= list_account_name() ?>
        </div>
        <div class = "checkingsaccount">
          <div class="dropdown">
            <button class="dropbtn">Checking Account</button>
            <div class="dropdown-content">
              <?php
                list_accounts("checking");
              ?>
            </div>
          </div>
        </div>
        <div class = "checkingsaccount">
          <div class="dropdown">
            <button class="dropbtn">Savings Account</button>
            <div class="dropdown-content">
              <?php
                list_accounts("savings");
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>
</html>
