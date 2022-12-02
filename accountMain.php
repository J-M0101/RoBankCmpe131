<?php
  session_start();
  $username = "$_SESSION[username]";
  if (!$username){
    header("Location: accountLogin.php");
  }
 ?>

<style>
*{
  box-sizing: border-box;
}

body, html {
  font-family: Arial;
  color: white;
  background-color: black;
  background-image: url('TestBackgroundColor.jpeg');
  background-repeat: no-repeat;
  background-size:cover;
  background-position-y: center;
}

body{
  margin: 0px;
}

.topBox{
  display: flex;
  align-self: center;
  justify-content: space-between;
  width: 100%;
  padding: 1rem 2rem;
  background-color: #014421;
}

.leftBoxL{
  display: flex;
  align-items: center;
  font-style: normal;
}

.buttonGroup{
    display: flex;
    flex-direction: row;
}

.rightBoxL{
  display: flex;
  margin-right:5rem;
}

.rightBoxR{
  display: flex;
}

/* Top bar with 3 buttons */
.toplink {
  background-color: #014421;
  float: left;
  border: none;
  font-size: 25px;
}

.otherOptionButton {
  background-color: #014421;
  float: left;
  border: none;
  font-size: 10px;
}

.blackText{
  text-decoration-color: black;
}

#topcolor{
  text-decoration: none;
  color: white;
}

.bottomBox{
  flex-grow: 1;
  display: flex;
  width: inherit;
  /* height: none; */
  align-self: center;
  justify-content: space-between;
}

.centerBox{
  display: flex;
  width: 200rem;
  align-self:center;
  justify-content: center;
}

.centerLeftBox{
  display: flex;
  align-items: center;
  margin-top: 75px;
}

.atmLogin{
  background-color: #014421;
  border: none;
  font-size: 5rem;
  margin-top: 5rem;
}


/* Right green box */
.centerBox2{
  display: flex;
  /* align-self:center; */
  align-items: center;
  flex-grow: 1;
  height: 30rem;
  /* justify-content: center; */
  background-color: #014421;
  border-radius: 10px;
  margin-top: 5rem;
  margin-right: 5rem;
}

/* Middle empty box no background*/
.centerBox3{
  display: flex;

  align-items: center;
  flex-grow: 1;
  flex-direction: column;
  margin-bottom: 5px;
  height: 30rem;
  justify-content: space-between
  /* justify-content: center; */
}

/* Middle box of middle empty box*/
.centerTab{
  display: flex;
  /* align-self:center; */
  align-items: center;
  height: 2rem;
  background-color: #014421;
  color: white;
  /* justify-content: center; */

  float: center;
  border: none;
  /* font-size: 25px; */
}

/* Middle buttons of middle empty box*/
.centerButtons{
  display: flex;
  /* align-self:center; */
  align-items: center;
  align-self: center;
  height: 5rem;
  width: 80rem;
  border-radius: 10px;
  background-color: #014421;
  color: white;
  /* justify-content: center; */
  text-align: center;
  float: center;
  border: none;
  font-size: 25px;
}

/* Box inside the right of green box */
.centerRightBox{
  display: flex;
  width: 250px;
  height: auto;
  margin-left: 30px;
  font-size: 1.25rem;
  border-radius: 10px;
  color: white;
}

/* Page 2 */

.parentBox{
  display: flex;
  width: inherit;
  height: inherit;
  align-self: center;
  justify-content: center;
}

.lowerBackdrop{
  display: flex;
  align-self: center;
  width: 800px;
  height: 700px;
  flex-direction: column;
  justify-content: space-around;

}

.checkingsaccount{
  display: flex;
  justify-content: center;
  height: 150px;
  align-items: center;
  border-width: thick;
  background-color: #014421;
}

/* main account page */

.centerBoxDisplayBalance{
  display: flex;
  flex-grow: 1;
  /* align-self:center; */
  align-items: center;
  height: 5rem;
  /* justify-content: center; */
  background-color: white;
  border-radius: 10px;
}

/* ------------------------- */

.custom {
  color: #FFFFFF;
}

#imagesize {
  margin-top: 10px;
  width: 12.5%;
  height: 25%;
}

</style>

<html>
  <head>
    <meta charset="UTF-8">
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
