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
        <button class="toplink"><a href="/robank/accountLogin.html" id="topcolor">RoBank</a></button>
      </div>
      <div class = "buttonGroup">
        <div class = "rightBoxL">
          <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">HOW TO USE?</a></button>
        </div>

        <div class = "rightBoxR">
          <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
        </div>
      </div>
    </div>

    <div class = "bottomBox">
    
      <!-- <div class = "centerBox">
          <div class = "centerLeftBox">
            <p class="atmLogin">ATM LOGIN</p>
          </div>
      </div> -->
      <div class = "centerBox2">
        <p class="atmLogin">ATM LOGIN</p>
        <div class = "centerRightBox">
            <!-- <p class="atmLogin">ATM LOGIN</p> -->
            <form action="/action_page.php" method="get">
              <label for="CardNumber">Card Number:<br></label>
              <input type="text" id="CardNumber" name="CardNumber"><br><br>
              <label for="pin">Pin:<br></label>
              <input type="password" id="pin" name="pin"><br><br>
              <div class="submitBtn">
                <input type="submit" value="Submit">
              </div>
            </form>
        </div>
      </div>

    </div>

  </body>
</html>
