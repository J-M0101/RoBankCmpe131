<?php    
    $conn = mysqli_connect("localhost", "root", "", "bank");
    unset($error_message);
    $test = true;

            //  CASH DEPOSIT CODE //
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST["depositAmount"])) 
      {   
        if (!empty($_POST['depositAmount'])){
          if ($_POST["depositAmount"]>0)
          {
            $depositAmount = $_POST["depositAmount"];
            $account_id = $_POST['account_id'];
    
            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "bank");
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //login user
            
            $sql = "UPDATE accounts SET balance = balance + $depositAmount WHERE account = $account_id; ";
            // $sql = "SELECT pin, username from accounts WHERE cardnumber = '$creditCardNumber'";
    
            // Attempt SQL Query to add to deposit
            // Need error checking
            try{
                $results = mysqli_query($conn, $sql);
                $error_message = "$$depositAmount has been deposited.";
            }
            catch (Exception $e) {
                $error_message = "Failed to add deposit";
            }
          }
          else
          {
            $error_message = "Please enter a positive number";
          }
        }
        else
        {
          $error_message = "Insert your cash into the ATM";
        }
      }
      else
      {
          $error_message = "Insert your cash into the ATM";
      }
    }
                //  CASH DEPOSIT CODE //


                //  CHECK DEPOSIT CODE //
    if (isset($_POST['upload'])) {

        // FRONT and BACK Check  //
      if (!empty($_FILES["uploadfile2"]["name"]) && !empty($_FILES["uploadfile"]["name"])){

        $filename2 = $_FILES["uploadfile2"]["name"];
        $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        
        $folder2 = "./image/" . $filename;
        $folder = "./image/" . $filename2;
        $account_id = $_POST['account_id'];
     
        $conn = mysqli_connect("localhost", "root", "", "bank");
     
        // Get all the submitted data from the form

        $sql = "INSERT INTO checks(account, filename) VALUES ($account_id, '$filename2')";

        // Execute query
        mysqli_query($conn, $sql);
    
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname2, $folder2)) {
            echo "<h3>  Back check has uploaded successfully! Please wait for an agent to review </h3>";
          } else {
            echo "<h3>  Failed to upload image! Please try again.</h3>";
        }

                // Front Check
        $sql = "INSERT INTO checks(account, filename) VALUES ($account_id, '$filename')";
  
        // Execute query
        mysqli_query($conn, $sql);
     
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Front check has uploaded successfully! Please wait for an agent to review </h3>";
          } else {
            echo "<h3>  Failed to upload image! Please try again.</h3>";
        }
      }
      else if((empty($_FILES["uploadfile2"]["name"]) xor empty($_FILES["uploadfile"]["name"]))){
        $check_error_message = "Please input both check images";
      }
  }


?>



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
          <button class="toplink"><a href="accountInfo.php" id="topcolor">RoBank</a></button>
        </div>
        <div class = "buttonGroup">
          <div class = "rightBoxR">
              <button class="toplink"><a href="ATMLogin.php" id="topcolor">Logout</a></button>
          </div>
        </div>
      </div>

      <div class = "bottomBox">
        
        <div class ="depoInfo">
          <form action="/ATMDeposit.php" class ="depoInfotwo" method="post" enctype="multipart/form-data">
          <input  type="hidden" name="account_id" value="<?= $_POST['account_id']?>">
            <!-- account ID for deposit function -->
          <!-- <?= $_POST['account_id']  ?> -->
          <!-- <?= empty($_FILES["uploadfile"]["name"]);  ?> 
          <?= empty($_FILES["uploadfile2"]["name"])  ?>  -->

            <div class = "depoCenter">
              <label for="depositAmount">Cash Deposit Amount:<br></label>
              <input type="text" id="depositAmount" name="depositAmount">
            </div>
            <?php
              if (isset($error_message)) {
                ?>
                <p><?= $error_message ?></p>
                <?php
              }
            ?>

            <div>
              Or<br><br>
              (Upload photo of front and back of check)
            </div>
            <div class="submitBtn">
              <input type="file" id="uploadfile2" name="uploadfile2"><br><br>
              <input type="submit" name="upload">
            </div>
            <div class="submitBtn">
              <input type="file" id="uploadfile" name="uploadfile"><br><br>
              <input type="submit" name="upload">
            </div>
            <?php
              if (isset($check_error_message)) {
                ?>
                <p><?= $check_error_message ?></p>
                <?php
              }
            ?>
          </form>

          <!-- Query check images -->
          <!-- <?php
              $query = " select * from checks ";
              $result = mysqli_query($conn, $query);
      
              while ($data = mysqli_fetch_assoc($result)) {
          ?>
              <img src="./image/<?php echo $data['filename']; ?>">
      
          <?php
              }
          ?> -->

        </div>
      </div>

  </body>
</html>