<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["amountentered"])) 
    {   
        $useramount = $_POST["amountentered"];
        $accountnumber = $_POST["account_id"];
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "bank");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT balance FROM accounts WHERE account = '$accountnumber';";
        $results = mysqli_query($conn, $sql);
        if($results){
            $row = mysqli_fetch_assoc($results);
            
            while($row = mysqli_fetch_assoc($results)){
                // $balance = $row['balance'];
                if($total_amount)
                {
                    $total_amount = $accountnumber - $useramount;
                }
            }
        }
    }
    else
    {
        $error_message = "Missing input";
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
            <?= $_POST["account_id"]?>
            <div class = "topboxbalance">
                <div class = "topboxbalanceleft">Enter Withdraw Amount</div>
            </div>
            <div class = "topboxbalance">
                <form action="accountInfo.php" method="post">
                <label for="amountentered"></label>
                <input type="number" id="amountentered"  name="amountentered"><br><br>
                <div class="submitBtnone">
                <input type="submit" value="Submit">
            </div>
            </form>
        </div>
        </div>

    </div>

  </body>
</html>