<?php
session_start();
if(!isset($_SESSION['uiduser'])){
    header('location: loginpage.php');
}
?>
<!--<!DOCTYPE html>-->
<!--<head>-->
<!--    <title>User page</title>-->
<!--    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=UTF-8"/>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <link rel="stylesheet" href="userpage.css">-->
<!--    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>-->
<!--    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"> </script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!---->
<!--</head>-->
<!---->
<!--<body background="images/rio.jpg">-->
<!---->
<!--<header>-->
<!--    <nav>-->
<!--        Everywhere with $ will take it from the database -->
<!--        <a class="welcomemsg">Hello again!</a>-->
<!--        <a id="logoutuser"  href="logoutuser.php">Logout</a>-->
<!--    </nav>-->
<!--</header>-->
<!---->
<!--<main>-->
<!---->
<!--    <h2>Upload your location json file for Patras city</h2>-->
<!--    <div id="mapid"></div>-->
<!--    <script type="text/javascript" src="map.js"></script>-->
<!--    <form class="upload">-->
<!--        Choose your json file :-->
<!--        <input type="file">-->
<!--        <input type="submit">-->
<!--    </form>`-->
<!---->
<!---->
<!---->
<!--</main>-->
<!---->
<!---->
<!---->
<!--</body>-->

<!DOCTYPE html>
<html lang="en">
<title>My profile </title>


<head>
    <title>LogInPageΘσερ</title>
    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="userpage.css">
</head>
<body background="images/rio.jpg">
<header>
    <nav>
        <a class="welcomemsg">Hello again!</a>
        <a id="logoutuser" href="logoutuser.php">Logout</a>
        <a class="infouser">Username: <?php echo $_SESSION['uiduser'] ?>  Email: <?php echo $_SESSION['usermail'] ?> </a>

    </nav>
</header>

<main>
    <h2>Upload your location json file for Patras city</h2>
    <div id="mapid"></div>
    <script type="text/javascript" src="map.js"></script>
    <form id="upload" enctype="multipart/form-data">
        Choose your json file :
        <input type="file" name="file" id="file" accept=".json" required/>
        <input type="submit" name="submitupload">
        <a id="upmsg">asdasdasd</a>
    </form>

</main>




</body>

</html>
