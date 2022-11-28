<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles.css">
    <title>Robank ATM Login</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
          <div class = "rightBoxR">
              <button class="toplink"><a href="ATMLogin.php" id="topcolor">Logout</a></button>
          </div>
        </div>
      </div>

      <div class = "bottomBox">
        
        <div class ="depoInfo">
          <form action="/action_page.php" method="get">
            <!-- account ID for deposit function -->
          <?= $_POST['account_id'] ?>
          <!-- end -->
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