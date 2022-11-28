
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
                <button class="toplink"><a href="/robank/accountInfo.php" id="topcolor">How To Use</a></button>
            </div>

            <div class = "rightBoxR">
                <button class="toplink"><a href="/robank/ATMLogin.php" id="topcolor">HOME</a></button>
            </div>
        </div>
    </div>

    <div class = "bottomBox">
        <div class ="optionsPB">
            <!-- <?= $_POST['account_id'] ?> -->
            <div>
                <form action="/robank/ATMCashWithdaw.php" method="post">
                <input  type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Cash Withdraw</button>
                </form>
            </div>
            <div>
                <form action="/robank/ATMDeposit.php" method="post">
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Deposit</button>
                </form>
            </div>
            <div>
                <form action="/robank/ATMBalanceInquirey.php" method="post">
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Balance Inquirey</button>
                </form>
            </div>
            <div><form action="/robank/ATMTransfer.php" method="post">
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Transfer</button>
                </form>
            </div>
        </div>

    </div>

  </body>
</html>