<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: /robank/ATMLogin.php');
  }
  
  
  $conn = mysqli_connect("localhost", "root", "", "bank");
  
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  
  function list_from_accounts() {
  global $conn;

  $id = $_POST['account_id'];
  $sql = "SELECT accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE account = '$id');";
  $results = mysqli_query($conn, $sql);
  if($results)
  {
    while($row = mysqli_fetch_assoc($results)){
      // echo "<a href='/robank/ATMOptions.php?id=" . $row['account'] ."'>" . $row['accountname'] . "</a>";
      ?>
        <div class = "one">
          <form action="#" method="post">
            <input type="hidden" name="account_id" value="<?= $_POST['account_id']  ?>">
            <button class = "#"type="submit"><?= $row['accountname'] ?></button>
          </form>
        </div>
      <?php
        
        }
    }
}

    function list_to_accounts() {
        global $conn;
      
        $id = $_POST['account_id'];
        $sql = "SELECT accountname FROM accounts where username LIKE (SELECT username FROM accounts WHERE account = '$id');";
        $results = mysqli_query($conn, $sql);
        if($results)
        {
          while($row = mysqli_fetch_assoc($results)){
            // echo "<a href='/robank/ATMOptions.php?id=" . $row['account'] ."'>" . $row['accountname'] . "</a>";
            ?>
              <div class = "one">
                <form action="#" method="post">
                  <input type="hidden" name="account_id" value="<?= $_POST['account_id']  ?>">
                  <button class = "#"type="submit"><?= $row['accountname'] ?></button>
                </form>
              </div>
            <?php
              
              }
          }
}

<<<<<<< Updated upstream
=======
    if($result){
      header("Location: ATMOptions.php");
    }
  }
}  
>>>>>>> Stashed changes
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
            <div class = "topboxbalanceleft">From Account:</div>
            <div class = "topboxbalanceright"> <?= list_from_accounts() ?> </div>
        </div>

        <div class = "topboxbalance">
            <div class = "topboxbalanceleft">To Account:</div>
            <div class = "topboxbalanceright"> <?= list_to_accounts() ?> </div>
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