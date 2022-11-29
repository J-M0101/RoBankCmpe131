<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]))
    {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $address = $_POST["address"];

      // Create connection
      $conn = mysqli_connect("localhost", "root", "", "bank");

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      //login user
      // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
      $sql = "INSERT INTO users (username, password, firstname, lastname, phone, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$phone', '$email', '$address');";
      $results = mysqli_query ($conn, $sql);

      if ($results){
        echo "The user has been added.";
      } else {
        echo mysqli_error($conn);
      }
    }
    else
    {
        $error_message = "Missing input";
    }
  }
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Account Info</title>
  </head>

  <body>

    <div class = "topBox">

      <div class = "leftBoxL">
        <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
<<<<<<< HEAD


        <div class = "rightBoxR">
          <button class="toplink"><a href="accountLogin.php" id="topcolor">HOME</a></button>
=======
        <div class = "rightBoxR">
          <button class="toplink"><a href="accountLogin.php" id="topcolor">Login</a></button>
>>>>>>> Josh3.0
        </div>
      </div>
    </div>

    <div class = "bottomBox">
      <div class ="useraccount">
        <div class = "box">
        CREATE AN ACCOUNT
        </div>
        <form action="#" method="post">
            <div class = "box">
            <label>Email: </label>
            <input type="email" name="email"
                    autocomplete="off"
                    required />
            </div>

            <div class = "box">
                <label>User ID: </label>
                <input type="text" name="username" />
            </div>

            <div class = "box">
                <label>Password: </label>
                <input type="password" name="password" autocomplete="off"
                        minlength ="8"
                        maxlength="15"
                        required/>
            </div>
            <div class = "box">
                <label>First Name: </label>
                <input type="firstname" name="firstname" autocomplete="off"
                        required/>
            </div>
            <div class = "box">
                <label>Last Name: </label>
                <input type="lastname" name="lastname" autocomplete="off"
                        required/>
            </div>
            <div class = "box">
                <label>Phone: </label>
                <input type="phone" name="phone" autocomplete="off"
                        minlength ="1"
                        maxlength="15"
                        required/>
            </div>
            <div class = "box">
                <label>Address: </label>
                <input type="address" name="address" autocomplete="off"
                        minlength ="1"
                        maxlength="50"
                        required/>
            </div><br>
            <div class = "boxcenter">
              <input type="submit" value="Submit"> <!-- on submit save the entered fields into variables and then send the user to personal information collection page-->
            </div>
        </form>
      </div>
    </div>
  </body>
</html>
