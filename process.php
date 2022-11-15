<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Account Info</title>
  </head>

  <body>
    
    <div class = "topBox">

      <div class = "leftBoxL">
        <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxL">
          <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
        </div>

        <div class = "rightBoxR">
          <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">Login</a></button>
        </div>
      </div>
    </div>

<!-- Robobank Page Title (left)  -->
    <div class = "bottomBox">
      <div class = "centerBox">
          <div class = "centerLeftBox">
            <p class="atmLogin">Account Processing</p>
          </div>
      </div>
    </div>

    <!--processing forms-->
    <div class="section row">
      <div class="section-text col-right">
        <?php
          if (isset($_POST["username"]) && isset($_POST["password"])){
            if (($_POST["username"]) && ($_POST["password"])){
              $username = $_POST["username"];
              $password = $_POST["password"];
              $firstname = $_POST["firstname"];
              $lastname = $_POST["lastname"];
              $phone = $_POST["phone"];
              $email = $_POST["email"];
              $address = $_POST["address"];

              //echo "Username from registration: " . $_POST["username"];
              //echo "<BR>";
              //echo "Password from registration: " . $_POST["password"];

              // create connection
              $conn = mysqli_connect("localhost", "root", "", "bank");

              // check connection
              if (!$conn){
                die("Connetion failed: " . mysqli_connect_error());
              }

              // register user
              $sql = "INSERT INTO users (username, password, firstname, lastname, phone, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$phone', '$email', '$address')";

              $results = mysqli_query ($conn, $sql);

              if ($results){
                echo "The user has been added.";
              } else {
                echo mysqli_error($conn);
              }

              mysqli_close($conn); // close connection

            } else {
              echo "Username or password is empty.";
            }

          } else {
            echo "Form was not submitted.";
          }
        ?>
      </div>
    </div>
  </body>
</html>
