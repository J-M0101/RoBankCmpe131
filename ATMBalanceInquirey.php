<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
  header('Location: /robank/ATMLogin.php');
}


$conn = mysqli_connect("localhost", "root", "", "bank");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$b = $_POST['account_id'];

function list_balance($b) {
    global $conn;

    $sql = "SELECT balance FROM accounts where account = $b";
    
    try{
        $results = mysqli_query($conn, $sql);
        if($results){
            while($balance= mysqli_fetch_assoc($results)){
                echo $balance['balance'];
            }  
        }
    }catch (Exception $e) {
        $error_message = "Failed query of creditCardNumber and pin";
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
<<<<<<< Updated upstream
            <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
=======
            <button class="toplink"><a href="ATMOptions.php" id="topcolor">RoBank</a></button>
>>>>>>> Stashed changes
        </div>
        <div class = "buttonGroup">
            <div class = "rightBoxL">
                <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
            </div>

            <div class = "rightBoxR">
                <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
            </div>
        </div>
    </div>

    <div class = "bottomBox">
    
        <div class ="depoInfo">
        <!-- <?= $_POST['account_id'] ?> -->
            <div class = "topboxbalance">
                <div class = "topboxbalanceleft">Your Balance:</div>
                <div class = "topboxbalanceright"><?= list_balance($b) ?></div>
            </div>
            <div class = "middleboxbalance"></div>
        </div>

    </div>

  </body>
</html>