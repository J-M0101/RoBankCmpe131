<?php
  session_start();
  $username = "$_SESSION[username]";
  /*
  have session_start(); on every page. $_SESSION[username] is saved when logged in, need for many functions
  We'll put the username back into $username, easier to use.
  */
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


    <div class = "centerButtons">
      <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
    </div>


    </html>
