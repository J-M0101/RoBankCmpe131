<?php
  session_start();
  $username = "$_SESSION[username]";
 ?>


<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles2.css">
    <title>Robank Account Page</title>
  </head>



  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountMain.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">


            <div class = "rightBoxR">
              <button class="toplink"><a href="accountLogin.php" id="topcolor">Logout</a></button>
            </div>
          </div>
      </div>


      <!-- PHP code for bank balances  -->

      <?php
        {
          /*
        $username = "$_SESSION[username]";
        */
        $conn = mysqli_connect("localhost", "root", "", "bank");
        $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
        $result = $conn->query($sql);
        foreach($result as $row) {
          echo "<div class ='centerBoxDisplayBalance'>";
          echo "<h1><FONT COLOR=black>Balance: $" . $row["balance"] . ", " .$row["accountname"] . ", xxxx-xxxx-xxxx-" .substr($row["account"],-4);
          echo "</div>";
          echo "<div class = 'centerTab'>";
          echo "</div>";
        }
      }
      ?>

      <!-- HTML continue  -->

      <div class = "bottomBox">
        <div class = "centerBox3">

<?php
$conn = mysqli_connect("localhost", "root", "", "bank");
$sql = "SELECT * FROM `users` WHERE `username`='$username'  ";
$result = $conn->query($sql);
$_SESSION['username']=$username;
foreach($result as $row) {
  $firstName = $row["firstname"];
  $lastName = $row["lastname"];
  $phoneNumber = $row["phone"];
  $email = $row["email"];
  $address = $row["address"];
  echo "<h1><FONT COLOR=white> Hello $firstName, how can we help you today? </h1>";
}

 ?>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountTransfer.php" id="topcolor">Transfer Funds</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="wireFunds.php" id="topcolor">Wire Funds</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountCreate.php" id="topcolor">Create Checking/Saving Account</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountDelete.php" id="topcolor">Delete Checking/Saving Account</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountInformation.php" id="topcolor">User Information</a></button>
          </div>
          <br>
          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountChange.php" id="topcolor">Rename Account</a></button>
          </div>

          RoBank 2022 CMPE131

        </div>
      </div>


  </body>
</html>
