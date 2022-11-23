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

          <style>
            .dropbtn {
              display: flex;
              background-color: #014421;
              align-self: center;
              border: none;
              font-size: 25px;
            }

            .dropdown {
              position: relative;
              display: inline-block;
              display: flex;
              margin-right:5rem;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f1f1f1;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #3e8e41;}
            </style>
      </div>
    </div>




          <?php
            {
              $conn = mysqli_connect("localhost", "root", "", "bank");
              $sql = "SELECT * FROM `users` WHERE `username`='$username'  ";
              $result = $conn->query($sql);
              $_SESSION['username']=$username;
              foreach($result as $row) {
                echo "<BR> First Name: " . $row["firstname"];
                echo "<BR> Last Name: " . $row["lastname"] ;
                echo "<BR> Phone Number: " . $row["phone"] ;
                echo "<BR> E-mail: " . $row["email"] ;
                echo "<BR> Address: " . $row["address"] ;
              }
            }
          ?>


          <div class = "centerTab">
            <h2>ACCOUNT INFORMATION</h2>
          </div>
          <div class = "centerList">
            <table>
              <tr>
                <th>First Name</th>
                <th><?echo "$row[firstname]";?></th>
              <tr/>
              <tr>
                <th>Last Name</th>
                <th>Mcree</th>
              <tr/>
              <tr>
                <th>Address</th>
                <th>1918 Junkyard Town</th>
              <tr/>
              <tr>
                <th>Email</th>
                <th>ItsHighNoon@ultimate.com</th>
              <tr/>
              <tr>
                <th>Phone Number</th>
                <th>+1 (408) 583 2381</th>
              <tr/>
              <tr>
                <th>????</th>
                <th>????</th>
              <tr/>
              <tr>
                <th>????</th>
                <th>????</th>
              <tr/>
            </table>



          <div class = "centerButtons">
            <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
          </div>
    </html>
