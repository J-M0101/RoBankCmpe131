<?php
session_start();
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
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
                <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
            </div>

            <div class = "rightBoxR">
                <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
            </div>
        </div>
    </div>

    <div class = "bottomBox">
    
        <div class ="depoInfo">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "bank");
        
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } 
            $r = $_SESSION['cardnumber'];
            $sql = "SELECT accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE cardnumber = '$r') AND type = 'checking';";
            $results = mysqli_query($conn, $sql);
            if($results)
            {
                while($row = mysqli_fetch_assoc($results)){
                echo "<a href='/robank/ATMOptions.php'>" . $row['accountname'] . "</a>";
                }
            }
        ?>
        </div>

    </div>

  </body>
</html>