<?php
session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  $username = $_SESSION['username'];
  $conn = mysqli_connect("localhost", "root", "", "bank");

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST["accountfrom"]) && isset($_POST["accountinto"]) && isset($_POST["ammount"])){
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

    if($result){
      header("Location: accountInfo.php");
    }
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

    <div class = "bottomBox">
      <div class ="depoInfo">
        <div class = "topboxbalance">
          <div class = "topboxbalanceleft">From Account:</div>
          <div class = "topboxbalanceright">
            <form id="accountfrom" name="accountfrom" method="post" action="ATMTransfer.php">
              <div id="accountfrom">
                <select name="accountfrom">
                  <?php
                  $conn = mysqli_connect("localhost", "root", "", "bank");
                  $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                  $result = $conn->query($sql);
                  foreach($result as $row){?>
                    <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'].", balance:". $row['balance']; ?></option>
                  <?php }?>
                </select>
              </div>
          </div>
        </div>
        <div class = "topboxbalance">
          <div class = "topboxbalanceleft">To Account:</div>
            <div class = "topboxbalanceright">
              <form id="accountinto" name="accountinto" method="post" action="ATMTransfer.php">
                <div id="accountinto">
                  <select name="accountinto">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "bank");
                    $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                    $result = $conn->query($sql);
                    foreach($result as $row){?>
                      <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'].", balance:". $row['balance']; ?></option>
                    <?php }?>
                  </select>
                  <BR>
                </div>
            </div>
        </div>
        <div class = "topboxbalance">
            <div class = "topboxbalanceleft">Enter Transfer Amount</div>
        </div>
        <div class = "topboxbalance">
            <form action="ATM" method="post">
            <label for="amountentered"></label>
            <input type="number" min="0" name = "ammount"><br><br>
            <div class="submitBtnone">
            <input type="submit" name="transfer" value="Transfer funds">
            </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
