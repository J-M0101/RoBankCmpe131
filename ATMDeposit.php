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
            <button class="toplink"><a href="accountInfo.html" id="topcolor">HOW TO USE?</a></button>
          </div>

          <div class = "rightBoxR">
            <button class="toplink"><a href="accountInfo.html" id="topcolor">Login</a></button>
          </div>
        </div>
      </div>

      <div class = "bottomBox">
        
        <div class ="depoInfo">
          <form action="/action_page.php" method="get">

            <div class = "depoCenter">
              <label for="CardNumber">Deposit Amount:<br></label>
              <input type="text" id="CardNumber" name="CardNumber">
            </div>
            <div>
              (Upload photo of front and back of check)
            </div>
            <div class="submitBtn">
              <input type="file" id="myFile" name="filename"><br><br>
              <input type="submit">
            </div>
            <div class="submitBtn">
              <input type="file" id="myFile" name="filename"><br><br>
              <input type="submit">
            </div>
          </form>
        </div>
      </div>

  </body>
</html>