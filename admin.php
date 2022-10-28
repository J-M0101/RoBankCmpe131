<?php
  $logged_in = false;

  if (isset($_POST["username"]) && isset ($_POST["password"])){
    if ($_POST["username"] && $_POST["password"]){
      $username = $_POST["username"];
      $password = $_POST["password"];

      // create connection
      $conn = mysqli_connect("localhost", "root", "", "bank");

      // check connection
      if (!$conn){
        die("Connetion failed: " . mysqli_connect_error());
      }

      // select users
      $sql = "SELECT password FROM users WHERE username = '$username'";

      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password) {
          $logged_in = true;
          $sql = "SELECT * FROM users";
          $results = mysqli_query($conn, $sql);
        } else {
          echo "password incorrect";
        }

      } else {
        echo mysqli_error($conn);
      }
      mysqli_close($conn);
    } else {

    }
  }
 ?>


<html>
  <header>
    <title>Admin</title>
  </header>
  <body>
    <h1>Login Page</h1>
    <form action = "/admin.php" method="post">
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit">
    </form>
    <table>
      <thead>
        <tr>
          <th>username</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>phone</th>
          <th>email</th>
          <th>address</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if ($logged_in && $results){
            $conn = mysqli_connect("localhost", "root", "", "bank");
            $sql = "SELECT * FROM `users` WHERE `username`='$username'  ";
            $result = $conn->query($sql);
            foreach($result as $row) {
              echo "<td>" . $row["username"] . "</td>";
              echo "<td>" . $row["firstname"] . "</td>";
              echo "<td>" . $row["lastname"] . "</td>";
              echo "<td>" . $row["phone"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["address"] . "</td>";
            }
          }
        ?>
        <?php
          if ($logged_in && $results){
          $conn = mysqli_connect("localhost", "root", "", "bank");
          $sql = "SELECT * FROM `accounts` WHERE `username`='$username'  ";
          $result = $conn->query($sql);
          foreach($result as $row) {
            echo "\r\n";
            echo "<td>" . $row["account"] . "</td>";
            echo "\n";
            echo "<td>" . $row["type"] . "</td>";
            echo "\n";
            echo "<td>$" . $row["balance"] . "</td>";
            echo "\n";
          }
        }
        ?>
      </tbody>
    </table>
  </body>
</html>
