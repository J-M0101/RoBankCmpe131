<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ATMLogin.php');
  }
  
  $username = $_SESSION['username'];
  $conn = mysqli_connect("localhost", "root", "", "bank");
  
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
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
            <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
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
            <form id="accountfrom" name="accountfrom" method="post" action="accountTransferred.php">
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
              <form id="accountinto" name="accountinto" method="post" action="accountTransferred.php">
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
              </form>
            </div>
        </div>
        <div class = "topboxbalance">
            <div class = "topboxbalanceleft">Enter Transfer Amount</div>
        </div>
        <div class = "topboxbalance">
            <form action="#" method="post">
            <label for="amountentered"></label>
            <input type="text" id="amountentered"  name="amountentered"><br><br>
            <div class="submitBtnone">
            <input type="submit" value="Submit">
            </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>