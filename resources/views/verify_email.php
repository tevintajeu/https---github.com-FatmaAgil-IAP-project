<?php

// start a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require_once('ClassAutoLoad.php');
// require_once '../sql/dbconn.php';




    
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $verify_query = "SELECT token,verify_status FROM user WHERE token='$token' LIMIT 1";
            $verify_query_run = mysqli_query($conn, $verify_query);

            if (mysqli_num_rows($verify_query_run) > 0) {
                $rows = mysqli_fetch_array($verify_query_run);
                if ($rows['verify_status'] == "0") {
                    $clicked_token = $rows['token'];
                    $update_query = "UPDATE user SET verify_status = '1' WHERE token = '$clicked_token' LIMIT 1";
                    $update_query_run = mysqli_query($conn, $update_query);

                    if ($update_query_run) {
                        $_SESSION['status'] = "your account has been verified successfully!";
                        header("Location:../book_table.php");
                        exit(0);
                    } else {
                        $_SESSION['status'] = "verification failed!";
                        header("Location:../signup.php");
                        exit(0);
                    }


                } else {
                    $_SESSION['status'] = "Email already verified. please login";
                    header("Location:../book_table.php");
                    exit(0);
                }
            } else {
                $_SESSION['status'] = "this token does not exist";
                header("Location:../signup.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "not allowed";
            header("location:../signup.php");
        }
    
    }

   

?>