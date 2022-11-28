<?php
  session_start();
  $logged_in = false;

  if (isset($_POST["username"]) &&
      isset($_POST['password'])) {
    if ($_POST["username"] && $_POST["password"]) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      //create connection
      $conn = mysqli_connect("localhost", "root", "", "bank");

      //Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // select user
      $sql = "SELECT password FROM users WHERE username = '$username'";
      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password) {
          $logged_in = true;
          $_SESSION["username"]=$username;
          $_SESSION['username']=$username;
          $_SESSION['username']='$username';
          $_SESSION['username']="$username";
          /*
          $_SESSION['logged_in'] = true;
          */
          $sql = "SELECT * FROM users";
          $results = mysqli_query($conn, $sql);

        } else {
          echo "password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }
      mysqli_close($conn); //close connection
    }else {
      echo "Nothing was submitted.";
    }
  }
 ?>

 <!DOCTYPE html>
 <!-- <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="styles.css">
     <title>Admin</title>
   </head>
   <body>
     <h1>Admin panel</h1>
     <form class="" action="admin.php" method="post">
       <input type="text" name="username">
       <input type="password" name="password">
       <input type="submit">
     </form>
 -->

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Web Login</title>
  </head>
  <body>
    <!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="ATMLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
          <div class = "rightBoxL">
            <button class="toplink"><a href="#" id="topcolor">Home</a></button>
          </div>

          <div class = "rightBoxR">
            <button class="toplink"><a href="accountInfo.html" id="topcolor">Login</a></button>
          </div>
        </div>
      </div>



<!-- Login and display backend  -->
    <h1>Login Page</h1>
    <!--<form action = "/admin.php" method="post">-->
    <form action = "/accountLogin.php" method="post">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit">
      <br>
      <a class href="admin.php">‎ ‎ ‎ ‎ </a>
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
  </body>
</html>
