<?php
  session_start();
  $username = "$_SESSION[username]";
  if (!$username){
    header("Location: accountLogin.php");
  }
 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Delete Account</title>
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


            <form id="accountdelete" name="accountdelete" method="post" action="accountDeleted.php">
              <div id="accountdelete">
                        <!--<form method="post" action="accountDeleted.php">-->
                            <h3>Account List:</h3>
                            Please select an account to delete.
                            <BR>
                            <select name="accountdelete">

                              <?php
                              $conn = mysqli_connect("localhost", "root", "", "bank");
                              $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                              $result = $conn->query($sql);
                              foreach($result as $row){?>
                                <option value="<?php echo $row['account']; ?>"><?php echo $row['accountname'] . ", xxxx-".substr($row["account"],-4).", balance:". $row['balance']; ?></option>
                              <?php }?>
                            </select>
                        <input type="submit" name="delete" value="Delete this Account ">
                        </div>
                        </form>



<!--DELETE FROM `accounts` WHERE `account` = $accountdelete -->

      </body>
    </html>
