<?php
include_once('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
$password = mysqli_real_escape_string($conn, $_POST["password"] );

//with get_data i make an array with locations
function get_data() {

    $sql = "SELECT lat, lng FROM locations WHERE username='$tempuserame'";
    $result = mysqli_query($conn, $sql);
    $location_data = array();
    while($row = mysqli_fetch_array($result))
    {
        $location_data [] = array(
            'lat' => $row["lat"],
            'lng' => $row["lng'"]
        ) ;

    }

    //convert the array and return the json file
    return json_decode($location_data) ;
}

