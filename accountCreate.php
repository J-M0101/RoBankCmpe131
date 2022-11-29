<?php
  session_start();
  $username = "$_SESSION[username]";
 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Robank Account Page</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="accountLogin.html" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">

          <div class = "buttonGroup">
            <div class = "rightBoxR">
              <button class="toplink"><a href="accountMain.php" id="topcolor">Home</a></button>
            </div>
          </div>

      </div>
    </div>
    <BR>
    <BR>
    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountCreateChecking.php" id="topcolor">Create A New Checking Account</a></button>
    </div>
    <BR>
    <BR>
    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountCreateSavings.php" id="topcolor">Create A New Savings Account</a></button>
    </div>
    <BR>
      <BR>
    </html>
