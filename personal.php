<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal</title>
  </head>
  <body>
    <h1>Personal</h1>
    <?php
      if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])) {
        if  ($_POST["username"] && $_POST["password"] && $_POST["email"]){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

        //create connection
        $conn = mysqli_connect("localhost", "root", "", "robank");

        //check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        //register user
        $sql = "INSERT INTO client (username, password, email) VALUES ('$username', '$password', '$email')";

        $results = mysqli_query($conn, $sql);

        if ($results) {
          echo "The user has been added.";
        } else {
          echo mysqli_error($conn);
        }

        mysqli_close($conn); //close connection

        } else {
          echo "Username or password is empty.";
        }

      } else {
        echo "Form was not submitted.";
      }
    ?>
  </body>
</html>
