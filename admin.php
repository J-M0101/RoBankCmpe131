<?php
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
      $sql = "SELECT password FROM users WHERE username LIKE 'admin%'";
      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password && $username === 'admin') {
          $logged_in = true;
          $sql = "SELECT * FROM users";
          $results  = mysqli_query($conn, $sql);
        }else {
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
 <html lang="en" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="styles.css">
     <title>Admin</title>
   </head>
   <body>
     <h1>Admin panel</h1>
     <form class="" action="/admin.php" method="post">
       <input type="text" name="username">
       <input type="password" name="password">
       <input type="submit">
     </form>

     <table>
       <thead>
         <tr>
           <th>Username</th>
           <th>Password</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone</th>
           <th>Email</th>
           <th>Address</th>
         </tr>
       </thead>
       <tbody>
         <?php
         if ($logged_in && $results) {
           while ($row = mysqli_fetch_assoc($results)) {
             echo "<tr>";
             echo "<td>" . $row["username"] . "</td>";
             echo "<td>" . $row["password"] . "</td>";
             echo "<td>" . $row["firstname"] . "</td>";
             echo "<td>" . $row["lastname"] . "</td>";
             echo "<td>" . $row["phone"] . "</td>";
             echo "<td>" . $row["email"] . "</td>";
             echo "<td>" . $row["address"] . "</td>";
             echo "</tr>";
            }
          }
         ?>
       </tbody>
     </table>
   </body>
 </html>
