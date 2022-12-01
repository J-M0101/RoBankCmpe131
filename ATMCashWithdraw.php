<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['amountentered'])){
        if($_POST['amountentered']>0){
            if (isset($_POST["amountentered"]) && isset($_POST["account_id"])) 
            {   
                $useramount = $_POST["amountentered"];
                $accountnumber = $_POST["account_id"];
                // Create connection
                $conn = mysqli_connect("localhost", "root", "", "bank");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
        
        
                $sql = "SELECT balance FROM accounts where account = $accountnumber";
                $results = mysqli_query($conn, $sql);
        
                if($results){
                    $row = mysqli_fetch_assoc($results);
                    if($row['balance'] >= $useramount){
                        $sql1 = "UPDATE accounts SET balance = balance - '$useramount' WHERE account = '$accountnumber';";
                
                        $results = mysqli_query($conn, $sql1);
                        if($results){
                            echo "Thank you! Please take money.";
                            // header("refresh:3;url=ATMOptions.php");
                        }
                    }
                    else {
                        $error_message = "Amount Entered Exceeds Balance";
                    }
                }
            }
        }
        else{
            $error_message = "Please enter a valid number";
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

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
    <div class = "topBox">
        <div class = "leftBoxL">
            <button class="toplink"><a href="ATMOptions.php" id="topcolor">RoBank</a></button>
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
                <form action="" method="post">
                    <input type="hidden" name="account_id" value="<?= $_POST["account_id"] ?>">
                    <label for="amountentered"></label>
                    <input type="number" min="0" id="amountentered" name="amountentered"><br><br>
                    <div class="submitBtnone">
                    <input type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

  </body>
</html>