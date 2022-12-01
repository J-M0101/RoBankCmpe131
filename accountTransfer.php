<?php
session_start();
  $username = $_SESSION['username'];

  // only after receiving trasnfer amounts
  /*
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $conn = mysqli_connect("localhost", "root", "", "bank");
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  */

  // only if we already entered the transfer amounts.
  if (isset($_POST["accountfrom"]) && isset($_POST["accountinto"]) && isset($_POST["amount"])){
    $from = $_POST['accountfrom'];
    $into = $_POST['accountinto'];
    $amount = $_POST['amount'];
    if ($amount > 0){
      $conn = mysqli_connect("localhost", "root", "", "bank");
      $sql = "SELECT balance FROM accounts where account = $from";
      $results = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($results);
      if($row['balance'] >= $amount){


      // Everything looks good, start transfer.
      $from = $_POST['accountfrom'];
      $into = $_POST['accountinto'];
      $amount = $_POST['amount'];
      echo "The account to transfer from: ".$from."<BR>";
      echo "The account to transfer into: ".$into."<BR>";
      echo "amount to transfer: ".$amount."<BR>";
      // transfer SQL codes
      $conn = mysqli_connect("localhost", "root", "", "bank");
      $sql = "UPDATE `accounts` SET `balance`=`balance` - $amount WHERE `account` = $from";
      $result = $conn->query($sql);

      $sql = "UPDATE `accounts` SET `balance`=`balance` + $amount WHERE `account` = $into";
      $result = $conn->query($sql);

      }
      else{
        echo "That account does not have enough funds to transfer. Try again.<BR>";
      }
    }
    else {
      // Actually we do not need this anymore
      echo "You cannot transfer a negative amount.";
    }
  }

//}
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
<!-- First Dropdown Box for ACCOUNT  -->
    <H3> Account Transfer </H3>
    <BR>
      <form id="accountfrom" name="accountfrom" method="post" action="accountTransfer.php">
        <div id="accountfrom">
                      Please select an account to transfer funds from.
                      <BR>
                      <select name="accountfrom">

                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "bank");
                        $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                        $result = $conn->query($sql);
                        foreach($result as $row){?>
                          <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'] . ", xxxx-".substr($row["account"],-4).", balance:". $row['balance']; ?></option>
                        <?php }?>
                      </select>
                  </div>
                  <BR>
<!-- Second Dropdown Box for ACCOUNT  -->

                    <form id="accountinto" name="accountinto" method="post" action="accountTransfer.php">
                      <div id="accountinto">
                          Please select an account to transfer funds into.
                          <BR>
                            <select name="accountinto">
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "bank");
                                $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                                $result = $conn->query($sql);
                                foreach($result as $row){?>
                                  <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'] . ", xxxx-".substr($row["account"],-4).", balance:". $row['balance']; ?></option>
                                <?php }?>
                            </select>
                            <BR>
                              Enter the amount to transfer.
                            <BR>
                            <input type="number" min = "0" name = "amount" step = "any">
                                      <!--<input type="submit" min="0" id="amount" name="amount" value = "Transfer funds">-->
                            <input type="submit" name="transfer" value="Transfer funds">
                          </div>
                        </form>


                        <BR>
                        <BR>
                        <div class = "centerButtons">
                          <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account Main</a></button>
                        </div>


    </html>
