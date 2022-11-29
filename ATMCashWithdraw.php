<<<<<<< HEAD:ATMCashWithdaw.php
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["amountentered"]) && isset($_POST["account_id"])) 
    {   
        $useramount = $_POST["amountentered"];
        $accountnumber = $_POST["account_id"];
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "bank");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "UPDATE accounts SET balance = balance - '$useramount' WHERE account = '$accountnumber';";
        
        $results = mysqli_query($conn, $sql);
        if($results){
            header("Location: accountInfo.php");
        }

    }
}
?>


=======
<?php    
    unset($error_message);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST["depositAmount"])) 
      {   
        if ($_POST["depositAmount"]>0)
        {
          $depositAmount = $_POST["depositAmount"];
          $account_id = $_POST['account_id'];
  
          // Create connection
          $conn = mysqli_connect("localhost", "root", "", "bank");
          
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
  
          //login user
          
          $sql = "UPDATE accounts SET balance = balance - $depositAmount WHERE account = $account_id; ";
          // $sql = "SELECT pin, username from accounts WHERE cardnumber = '$creditCardNumber'";
  
          // Attempt SQL Query to add to deposit
          // Need error checking
          try{
              $results = mysqli_query($conn, $sql);
              $error_message = "$$depositAmount has been deposited.";
          }
          catch (Exception $e) {
              $error_message = "Failed to add deposit";
          }
        }
        else
        {
          $error_message = "Please enter a positive number";
        }
      }
      else
      {
          // $error_message = "Missing input";
      }
    }
?>

>>>>>>> ATM_Vincent_Backend2.0:ATMCashWithdraw.php
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Robank ATM Login</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
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
                <div class = "topboxbalanceleft">Enter Withdraw Amount
                <?php
                if (isset($error_message)) {
                ?>
                <p><?= $error_message ?></p>
                <?php
                }
                ?>
            </div>
            </div>
            <div class = "topboxbalance">
<<<<<<< HEAD:ATMCashWithdaw.php
                <form action="" method="post">
                    <input type="hidden" name="account_id" value="<?= $_POST["account_id"] ?>">
                    <label for="amountentered"></label>
                    <input type="number" id="amountentered" name="amountentered"><br><br>
                    <div class="submitBtnone">
                    <input type="submit" value="Submit">
                    </div>
                </form>
=======
                <form action="/ATMCashWithdraw.php" method="post">
                <label for="amountentered"></label>
                <input type="text" id="amountentered"  name="amountentered"><br><br>
                <div class="submitBtnone">
                <input type="submit" value="Submit">
>>>>>>> ATM_Vincent_Backend2.0:ATMCashWithdraw.php
            </div>
        </div>
    </div>

  </body>
</html>