<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Personal</title>
  </head>
  <body>
    <h1>Personal</h1>
    <?php
      if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        if  ($_POST["email"] && $_POST["username"] && $_POST["password"]){
            $username = $_POST["email"];
            $password = $_POST["username"];
            $email = $_POST["password"];

        //create connection
        $conn = mysqli_connect("localhost", "root", "", "robank");

        //check connection
        if (!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        //register user
        $sql = "INSERT INTO client (email, username, passwrod) VALUES ('$email', '$username', '$password')";

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
