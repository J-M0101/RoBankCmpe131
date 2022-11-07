<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: /robank/ATMLogin.php');
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
        <form action="/robank/ATMOptions.php" method="post">
          <input type="hidden" name="account_id" value="<?= $row['account'] ?>">
          <button type="submit"><?= $row['accountname'] ?></button>
        </form>
      <?php
    }
  }
}

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
