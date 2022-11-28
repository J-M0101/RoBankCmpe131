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

  </body>
</html>
