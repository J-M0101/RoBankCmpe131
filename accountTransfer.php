<?php
  session_start();
  $username = "$_SESSION[username]";
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
          <button class="toplink"><a href="accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">

          <div class = "buttonGroup">
            <div class = "rightBoxR">
              <button class="toplink"><a href="accountMain.php" id="topcolor">Home</a></button>
            </div>
          </div>

      </div>
    </div>
<!-- Dropdown Boxes  -->
    <H3> Account Transfer </H3>
    <BR>

      <form id="accountfrom" name="accountfrom" method="post" action="accountTransferred.php">
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

                    <form id="accountinto" name="accountinto" method="post" action="accountTransferred.php">
                      <div id="accountinto">
                                    Please select an account to transfer funds into.
                                    <BR>
                                    <select name="accountinto">

                                      <?php
                                      $conn = mysqli_connect("localhost", "root", "", "bank");
                                      $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
                                      $result = $conn->query($sql);
                                      foreach($result as $row){?>
                                        <option value="<?php echo $row['account']; ?>"><?php echo $row['account'].", balance:". $row['balance']; ?></option>
                                      <?php }?>
                                    </select>
                                    <BR>

                                      <BR>
                                        <input type="text" name = "ammount">
                                <input type="submit" name="transfer" value="Transfer funds">
                                </div>
                                </form>



    </html>
