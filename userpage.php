<?php
session_start();
if(!isset($_SESSION['uiduser'])){
    header('location: loginpage.php');
}
?>

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
    <script src="js/vendor/jquery.ui.widget.js"></script>
    <script src="js/jquery.iframe-transport.js"></script>
    <script src="js/jquery.fileupload.js"></script>
    <script src="upload.js"></script>
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
    <div id="mapcontainer">
    <a id="maptitle">Upload your location json file for Patras city</a>
    <div id="mapid"></div>
    <script type="text/javascript" src="map.js"></script>
    <div id="upload" >
        Choose your json file :
        <input type="file" name="uploadingfile" id="uploadedfile" accept=".json" required/>
        <button name="submitupload" id="submitupload">Sumbit your JSON file!</button>
        <a id="progress"></a><br>
        <div id="error"></div><br>
        <div id="files"></div>
    </div>
    </div>

    <div id="highscores">
        <a id="highscoresmsg">These are the top three ecologists of the month</a>
        <table id="t01">
            <tr>
                <th>Place</th>
                <th>Last name</th>
                <th>First name</th>
            </tr>
            <tr>
                <td>1st</td>
                <td>lastname1</td>
                <td>firstname1</td>
            </tr>
            <tr>
                <td>2nd</td>
                <td>lastname1</td>
                <td>firstname1</td>
            </tr>
            <tr>
                <td>3rd</td>
                <td>lastname3</td>
                <td>firstname3</td>
            </tr>

        </table>


    </div>

</main>




</body>

</html>
