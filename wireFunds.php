<?php
session_start();

  $username = $_SESSION['username'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $conn = mysqli_connect("localhost", "root", "", "bank");
  
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST["accountfrom"]) && isset($_POST["accountinto"]) && isset($_POST["ammount"])){
    $from = $_POST['accountfrom'];
    $into = $_POST['accountinto'];
    $ammount = $_POST['ammount'];
    // echo "The account to transfer form: ".$from."<BR>";
    // echo "The account to transfer form: ".$into."<BR>";
    // echo "Ammount to transfer: ".$ammount."<BR>";
    
    if($ammount === ""){
      $error_message = "Please enter an amount to transfer";
    }
    else{
      $conn = mysqli_connect("localhost", "root", "", "bank");
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT account from accounts where account = '$into'";
      $results = mysqli_query($conn, $sql);

      if($results){
        $row = mysqli_num_rows($results);
        if($row != 0){
          $sql = "SELECT balance from accounts where account = '$from'";
          $results = mysqli_query($conn, $sql);
      
          if($results){
            $row = mysqli_fetch_assoc($results);
            if($row['balance'] >= $ammount){
                $conn = mysqli_connect("localhost", "root", "", "bank");
                $sql = "UPDATE `accounts` SET `balance`=`balance` - '$ammount' WHERE `account` = '$from'";
                $result = $conn->query($sql);

                $sql = "UPDATE `accounts` SET `balance`=`balance` + '$ammount' WHERE `account` = '$into'";
                $result = $conn->query($sql);

                if($result){
                  echo "Your money has been transfered.";
                  header("refresh:3;url=accountMain.php");
                }
            }
            else{
                $error_message = "Amount Entered Exceeds Balance";
            }
          }
        }
        else{
          $error_message = "Account Does not exist";
        }
      }
    }
  }
}  
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
<!-- Dropdown Boxes  -->
<?php
    if (isset($error_message)) {
            ?>
            <p><?= $error_message ?></p>
            <?php
           }
            ?>
    <H3> Wire Funds To Another User </H3>
    <BR>

      <form id="accountfrom" name="accountfrom" method="post" action="wireFunds.php">
        <div id="accountfrom">
                      Please select an account to trasfer funds from.
                      <BR>
                      <select name="accountfrom">

                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "bank");
                        $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                        $result = $conn->query($sql);
                        foreach($result as $row){?>
                          <option value="<?php echo $row['account']; ?>"><?php echo $row['account'].", balance:". $row['balance']; ?></option>
                        <?php }?>
                      </select>
                  </div>
                  <BR>

                    <form id="accountinto" name="accountinto" method="post" action="wireFunds.php">
                      <div id="accountinto">
                                    Please enter an account number to transfer funds into.<br>
                                    <input type="number" min="0" name="accountinto" value="#">
                                    <BR>

                                      <BR>
                                      Please enter total amount to Transfer.<br>
                                        <input type="number" min="0" step="0.1" name = "ammount">
                                <input type="submit" name="transfer" value="Transfer funds">
                                </div>
                                </form>



    </html>
