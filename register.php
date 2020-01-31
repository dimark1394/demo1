<?php

if (isset($_POST['submitregister'])) {
    require 'connection.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['usernamereg'];
    $password = $_POST['passswordreg'];
    $email = $_POST['email'];
    $everythingok = false;
//    if(!$everythingok) {
//        if (empty($firstname)) {
//            echo  "<span class='errormsg'>Missing Firstname</span>";
//        }
//        if (empty($lastname)){
//            echo  "<span class='errormsg'>Missing Lastname</span>";
//        }
//        if (empty($username)){
//            echo  "<span class='errormsg'>Missing Username</span>";
//        }
//        if (empty($password)){
//            echo "<span class='errormsg'>Fill a password</span>";
//        }
//        if(empty($email)){
//            echo "<span class='errormsg'>Fill an email</span>";
//        }
//    }else {
//        $everythingok = true;
//    }

//    $errorEmpty = false;
//    $errorUsername = false;
//    $errorPassword = false;

    if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($email)) {
        echo "<span class='errormsg'>Fill in all fields</span>";
    }
}
//    } else if {
//        $sql = "SELECT * FROM users WHERE username=? ";
//        $stmt = mysqli_stmt_init($conn);
//        if (!mysqli_stmt_prepare($stmt, $sql)) {
//            echo "Sql error";
//        } else {
//            mysqli_stmt_bind_param($stmt, "s", $username);
//            mysqli_stmt_execute($stmt);
//            $result = mysqli_stmt_get_result($stmt);
//            if ($row = mysqli_fetch_assoc($result)) {
//                $hashedpwd = md5($password);
//                $pwdcheck = strcmp($hashedpwd, $row['password']);
//                if ($pwdcheck !== 0) {
//                    echo "<span class='errormsg'>Password is wrong</span>";
////                    $errorpassword = true;
//                } else if ($pwdcheck == 0) {
//                    session_start();
//                    $_SESSION['uid'] = $row['username'];
//                    echo "success as admin";
//                } else {
//                    echo "Something Happened";
//                }
//            } else {
//                echo "<span class='errormsg'>Username is wrong</span>";
////                $errorUsername = true;
//            }
//        }
//    }
//} else {
//    header("Location:../demo1/loginpage.php");
//}
//
//?>
