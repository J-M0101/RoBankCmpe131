<?php
    $logged_in = false;

    if (isset($_POST["deposit"]) && isset($_POST["account"])) 
    {
        if ($_POST["deposit"] && $_POST["account"]) 
        { 
            $deposit = $_POST["deposit"];
            $account = $_POST["account"];

            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "atmlogin");
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //login user
            // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
            // $sql = "SELECT pin from creditCard WHERE creditCardNumber = '$creditCardNumber'";
            if ($deposit<=0) {
                header("Location: ATMDeposit.php");
                echo '<script>alert("Please insert a valid sum!")</script>';
                die();
            }
            else {
                $sql = "UPDATE creditcard SET balance=balance+'$deposit' WHERE creditCardNumber='$account';";
                try{
                    $results = mysqli_query($conn, $sql);
                }
                catch (Exception $e) {
                    header("Location: ATMDeposit.php");
                    echo '<script>alert("Failed query of creditCardNumber and pin")</script>';
                    die();
                }
            }


            // if ($results) { 
            //     $row = mysqli_fetch_assoc($results);
            //     if ( $row["pin"] === $pin ) 
            //     {
            //         $logged_in = true;
            //         // echo "Successful login";
            //         header("Location: /github/accountInfo.html");
            //     }
            //     else
            //     {
            //         // echo "<script>window.location.href='ATMLogin.php';alert('Incorrect Password2')</script>";
            //         header("Location: ATMLogin.php");

            //     }
            // } 
            // else {
            //     header("Location: ATMLogin.php");
            //     echo '<script>alert("Failed Login")</script>';
            // }

            mysqli_close($conn);
            header("Location: ATMDeposit.php");
            // echo '<script>alert("Funds have been deposited")</script>';
        }
        else 
        {
            header("Location: ATMDeposit.php");
            echo '<script>alert("Missing input")</script>';
        }
    }
    else
    {
        header("Location: ATMDeposit.php");
        echo '<script>alert("Missing input")</script>';
    }

?>