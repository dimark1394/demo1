<?php
include_once('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
$date = mysqli_real_escape_string($conn, $_POST["datefilter"] );
echo $date;
echo "<br>";
echo strlen("$date");
echo "<br>";
$date1 =  substr("$date",0, 10);
echo "<br>";
echo "this is date 1:  ", $date1;
$date1_end
echo "this is date1 end :", $date1_end;
echo "<br>";
$date2 = substr("$date",12, 23);
echo "<br>";
echo "This is date 2: ", $date2;
echo "<br>";
str
$date2 = substr("$date",12, 23);



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

