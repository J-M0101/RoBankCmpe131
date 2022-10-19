<!-- Note: use localhost/register.php,   don't use file:///C:/xampp/htdocs/register.php-->


<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Robank ATM Login</title>
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
<!-- Page Title (left)  -->

      <div class = "bottomBox">
        <div class = "centerBox">
            <div class = "centerLeftBox">
              <p class="atmLogin">Online Bank Registration</p>
            </div>
        </div>


<!-- Registration forms and PHP  -->
        <div class = "centerBox2">
          <div>Register Here!</div>
            <div class = "centerRightBox">

              <div>Username Password</div>
              <form action = "/process.php" method = "post">
                <input type = "text" name = "username">
                <input type = "password" name = "password">
                <input type = "submit">
              </form>
            </div>
          </div>


      </div>
  </body>
</html>
