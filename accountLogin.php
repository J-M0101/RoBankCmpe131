<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Account Login</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
          <div class = "rightBoxL">
            <button class="toplink"><a href="aboutUsPage.html" id="topcolor">ABOUT US</a></button>
          </div>

          <div class = "rightBoxR">
            <button class="toplink"><a href="ATMLogin.html" id="topcolor">ACCESS ATM</a></button>
          </div>
        </div>
      </div>

      <div class = "bottomBox">
        <div class = "centerBox">
            <div class = "centerLeftBox">
                <video width="500rem" height="280rem" controls>
                    <source src="Kereru.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class = "centerBox2">
            <div class = "centerRightBox">
              <form action="accountMain.php" method="post">
                <h2 class="custom">Welcome Back!</h2><br>
                  <label for="username">Username:</label><br>
                    <input type="text" name="username"><BR><BR>
                      <input type="password" name="password"><BR><BR>
                        <input type="submit">
                        <br><br>
                        <button class="otherOptionButton"><a href="createUser.html" id="topcolor">Don't have an account? Click here!</a></button>
                        <br><BR>
                        <button class="otherOptionButton"><a href="recoverPassword.html" id="topcolor">Forgot Password? Click here!</a></button>
              </form>

            </div>
          </div>
      </div>

<<<<<<< HEAD
<!-- Login and display backend  -->
    <h1>Login Page</h1>
    <!--<form action = "/admin.php" method="post">-->
    <form action = "accountLogin.php" method="post">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit">
    </form>
    <table>

      <tbody>
        <?php
          if ($logged_in && $results){
            $conn = mysqli_connect("localhost", "root", "", "bank");
            $sql = "SELECT * FROM `users` WHERE `username`='$username'";
            $result = $conn->query($sql);
            $_SESSION["username"]=$username;
            /*
            foreach($result as $row) {
              echo "<td>" . $row["username"] . "</td>";
              echo "<td>" . $row["firstname"] . "</td>";
              echo "<td>" . $row["lastname"] . "</td>";
              echo "<td>" . $row["phone"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["address"] . "</td>";
            }*/
            echo "<button class='toplink'><a href='accountMain.php' id='topcolor'>Click Here to go to accounts</a></button><BR><BR>";
          }
        ?>
      </tbody>
    </table>

        <?php
          if ($logged_in && $results){
          $conn = mysqli_connect("localhost", "root", "", "bank");
          $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
          $result = $conn->query($sql);
          echo "This login page is not working right now, but username is stored in session. go to /localhost/accountMain.php manually<BR>";
          echo "Or click above button<BR>";
          foreach($result as $row) {
            echo "<BR>";
            echo "<td>xxxx" . $row["account"] . "   </td>";
            echo "<td>\t       " . $row["type"] . "   </td>";
            echo "<td>\t       $" . $row["balance"] . "   </td>";
          }
        }
        ?>
=======
>>>>>>> 73b4fa627e89d8cbaef015eba7a9c94db44e6947
  </body>
</html>
