<?php
  session_start();
  $username = "$_SESSION[username]";
  if (!$username){
    header("Location: accountLogin.php");
  }
/*
Change account name
*/

if (isset($_POST["accountchange"])&&(isset($_POST["namechange"]))){
  $account = $_POST["accountchange"];
  $name = $_POST["namechange"];

  $conn = mysqli_connect("localhost", "root", "", "bank");
  $sql = "UPDATE `accounts` SET `accountname`= '$name' WHERE `account` = $account";
  $result = $conn->query($sql);


  echo "Account # " . $account . " changed to ";
  echo $name . "<BR>";
}


 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Name Account</title>
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

<!-- Delete Account php code here  -->


<form id="accountchange" name="accountchange" method="post" action="accountChange.php">
  <div id="accountchange">
                Please select an account name.
                <BR>
                <select name="accountchange">

                  <?php
                  $conn = mysqli_connect("localhost", "root", "", "bank");
                  $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                  $result = $conn->query($sql);
                  foreach($result as $row){?>
                    <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'] . ", xxxx-".substr($row["account"],-4).", balance:". $row['balance']; ?></option>
                  <?php }?>
                </select>
            </div>
            <BR>
                            <BR>
                                  <input type="text" pattern="[a-zA-Z0-9\s]+" name = "namechange">
                          <input type="submit" name="change"  value="Change Account Name">
                          </div>
                          </form>


<!--DELETE FROM `accounts` WHERE `account` = $accountchange -->


      </body>
    </html>
