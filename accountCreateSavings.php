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

          <style>
            .dropbtn {
              display: flex;
              background-color: #014421;
              align-self: center;
              border: none;
              font-size: 25px;
            }

            .dropdown {
              position: relative;
              display: inline-block;
              display: flex;
              margin-right:5rem;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f1f1f1;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #3e8e41;}
            </style>
      </div>
    </div>



          <?php
            {
            $conn = mysqli_connect("localhost", "root", "", "bank");
            $username = "$_SESSION[username]";
            $rand = rand(1,99999999);
            $sql = "INSERT INTO `accounts` (`account`, `type`, `username`, `balance`, `cardnumber`, `pin`) VALUES ('$rand', 'savings', '$username', '0', '0', '0')";
            $result = $conn->query($sql);

            echo "<BR> A new checking account has been created:   ". $rand;

            /*
            echo "<BR>username: " . $username;
            foreach($result as $row) {
              echo "<div class ='centerBoxDisplayBalance'>";
              echo "<h1><FONT COLOR=black>Balance: $" . $row["balance"] . ", " . $row["type"] . " account xxxx-xxxx-xxxx-" .substr($row["account"],-4);
              echo "</div>";
              echo "<div class = 'centerTab'>";

              echo "</div>";
            }
            */
          }
          ?>

          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
          </div>


    </html>
