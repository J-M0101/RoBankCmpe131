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
            <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
            <div class = "rightBoxL">
                <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">HOW TO USE?</a></button>
            </div>

            <div class = "rightBoxR">
                <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
            </div>
        </div>
    </div>

    <div class = "bottomBox">
    
        <div class ="depoInfo">
            <?= $_POST['account_id'] ?>
            <div class = "topboxbalance">
                <div class = "topboxbalanceleft">Enter Withdraw Amount</div>
            </div>
            <div class = "topboxbalance">
                <form action="/ATMCashWithdraw.php" method="post">
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