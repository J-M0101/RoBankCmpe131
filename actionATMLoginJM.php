<?php
    $logged_in = false;

    if (isset($_POST["CardNumber"]) && isset($_POST["pin"])) 
    {
        if ($_POST["CardNumber"] && $_POST["pin"]) 
        { 
            $creditCardNumber = $_POST["CardNumber"];
            $pin = $_POST["pin"];

            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "bank");
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //login user
            // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
            $sql = "SELECT pin from users WHERE cardnumber = '$creditCardNumber'";
            try{
                $results = mysqli_query($conn, $sql);
            }
            catch (Exception $e) {
                header("Location: ATMLogin.php");
                echo '<script>alert("Failed query of creditCardNumber and pin")</script>';
                die();
            }

            if ($results) { 
                $row = mysqli_fetch_assoc($results);
                if ( $row["pin"] === $pin ) 
                {
                    $logged_in = true;
                    // echo "Successful login";
                    header("Location: accountInfo.php");
                }
                else
                {
                    // echo "<script>window.location.href='ATMLogin.php';alert('Incorrect Password2')</script>";
                    header("Location: ATMLogin.php");

                }
            } 
            else {
                header("Location: ATMLogin.php");
                echo '<script>alert("Failed Login")</script>';
            }

            mysqli_close($conn);
        }
        else 
        {
            echo '<script>alert("Missing input")</script>';
        }
    }
    else
    {
        echo '<script>alert("Missing input")</script>';
    }

?>