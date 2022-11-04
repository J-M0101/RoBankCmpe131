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

      <div class = "bottomBox">
        
        <div class ="depoInfo">
          <form action="actionATMDeposit.php" method="post">

            <label for="CardNumber">Deposit Amount:<br></label>
            <input type="text" id="deposit" name="deposit"><br><br><br><br><br>
            
            <label for="#">Account:<br></label>
            <input type="password" id="account" name="account"><br><br>
            
            <div class="submitBtn">
              <input type="file" id="myFile" name="filename"><br><br>
                <input type="submit">
            </div>
          </form>
        </div>

      </div>

  </body>
</html>