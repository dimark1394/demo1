<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: loginpage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<title>My profile </title>


<head>
    <title>LogInPageAdmin</title>
    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="indexadmin.css">
</head>
        <body background="images/rio.jpg">
        <header>
        <nav>
        <a class="welcomemsg">Welcome back Admin</a>
            <a id="logout"  href="logout.php">Logout</a>
    </nav>
    </header>

    <main>

    <div class="container">
    </main>




    </body>

    </html>

