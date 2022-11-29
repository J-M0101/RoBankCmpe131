
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
<<<<<<< HEAD
            <button class="toplink"><a href="accountLogin.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
            <div class = "rightBoxR">
                <button class="toplink"><a href="ATMLogin.php" id="topcolor">Logout</a></button>
=======
            <button class="toplink"><a href="/accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
            <div class = "rightBoxL">
                <button class="toplink"><a href="/accountInfo.php" id="topcolor">How To Use</a></button>
            </div>

            <div class = "rightBoxR">
                <button class="toplink"><a href="/ATMLogin.php" id="topcolor">HOME</a></button>
>>>>>>> ATM_Vincent_Backend2.0
            </div>
        </div>
    </div>

    <div class = "bottomBox">
        <div class ="optionsPB">
            <!-- <?= $_POST['account_id'] ?> -->
            <div>
<<<<<<< HEAD
                <form action="ATMCashWithdaw.php" method="post">
=======
                <form action="/ATMCashWithdraw.php" method="post">
>>>>>>> ATM_Vincent_Backend2.0
                <input  type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Cash Withdraw</button>
                </form>
            </div>
            <div>
<<<<<<< HEAD
                <form action="ATMDeposit.php" method="post">
=======
                <form action="/ATMDeposit.php" method="post">
>>>>>>> ATM_Vincent_Backend2.0
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Deposit</button>
                </form>
            </div>
            <div>
<<<<<<< HEAD
                <form action="ATMBalanceInquirey.php" method="post">
=======
                <form action="/ATMBalanceInquirey.php" method="post">
>>>>>>> ATM_Vincent_Backend2.0
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Balance Inquirey</button>
                </form>
            </div>
<<<<<<< HEAD
            <div><form action="ATMTransfer.php" method="post">
=======
            <div><form action="/ATMTransfer.php" method="post">
>>>>>>> ATM_Vincent_Backend2.0
                <input type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
                <button style = 'color: white' class="toplink" type="submit">Transfer</button>
                </form>
            </div>
        </div>

    </div>

  </body>
</html>