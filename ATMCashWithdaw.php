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
    
        <div class ="depoInfo">
            <?= $_POST['account_id'] ?>
            <div class = "topboxbalance">
                <div class = "topboxbalanceleft">Enter Withdraw Amount</div>
            </div>
            <div class = "topboxbalance">
                <form action="#" method="post">
                <label for="amountentered"></label>
                <input type="text" id="amountentered"  name="amountentered"><br><br>
                <div class="submitBtnone">
                <input type="submit" value="Submit">
            </div>
            </form>
        </div>
        </div>

    </div>

  </body>
</html>