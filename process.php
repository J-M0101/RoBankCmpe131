<html>
<!--Header and Title-->
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title>Robobank Processing</title>
</head>
<body>
<!-- Robobank Top of bar box. Designed with CSS flexdispalays.  -->
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

<!-- Robobank Page Title (left)  -->
                  <div class = "bottomBox">
                    <div class = "centerBox">
                        <div class = "centerLeftBox">
                          <p class="atmLogin">Account Processing</p>
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
                          //echo "Username from registration: " . $_POST["username"];
                          //echo "<BR>";
                          //echo "Password from registration: " . $_POST["password"];

                          // create connection
                          $conn = mysqli_connect("localhost", "root", "", "users");

                          // check connection
                          if (!$conn){
                            die("Connetion failed: " . mysqli_connect_error());
                          }

                          // register user
                          $sql = "INSERT INTO students (username, password) VALUES ('$username', '$password')";

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
          </div>
    </body>
</html>
