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
    <title>Robank Delete Account</title>
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

<!-- Delete Account php code here  -->

          <?php
            {
            echo "Please select an account to delete.<BR>";

          }
            ?>
            <form id="form1" name="form1" method="post" action="<?php echo $PHP_SELF; ?>">
                        Account List :
                        <select Account='NEW'>
                        <option value="">--- Select ---</option>
                        <?
                          $conn = mysqli_connect("localhost", "root", "", "bank");
                          $sql = "SELECT * FROM `accounts` WHERE `username`='$username' ";
                          $result = $conn->query($sql);
                          while ($row = mysqli_fetch_assoc($result)):{;
                            /*
                        while($row_list=mysql_fetch_assoc($sql)){
                        */
                            ?>
                            <option value="<?php echo $row["account"];
                              // The value we usually set is the primary key
                          ?>">
                            <?php echo $row["account"];
                              // To show the category name to the user
                                ?>
                                </option>
                                <?
                              endwhile;
                              ?>
                            }
                        </select>
                        <input type="submit" name="Submit" value="Select" />
                    </form>

                    <div class = "centerButtons">
                      <button class="centerButtons"><a href="accountMain.php" id="topcolor">Account</a></button>
                    </div>

      </body>
    </html>
