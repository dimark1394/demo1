<?php
include_once('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
$date = mysqli_real_escape_string($conn, $_POST["datefilter"] );
//echo $date;
//echo "<br>";
//echo strlen("$date");
//echo "<br>";
$date1 =  substr("$date",0, 19);
//echo "<br>";
//echo "this is date 1:  ", $date1;
$date1_end = substr("$date1",6, 4 );
//echo "<br>";
//echo "this is date1 end :", $date1_end;
//echo "<br>";
$date1_start = substr("$date1", 0,2);
//echo "This is date start :", $date1_start;
//echo "<br>";
$date1_mid = substr("$date1", 2,4);
//echo "This is date mid :", $date1_mid;
//echo "<br>";
$date1_time = substr("$date1", 10,9);
$date1_insert = $date1_end.$date1_mid.$date1_start.$date1_time;
echo "This is date1  insert :", $date1_insert;
echo "<br>";

//date2

$date2 = substr("$date",22, 40);
//echo "<br>";
//echo "This is date 2:", $date2;
//echo "<br>";
$date2_end = substr("$date2",6, 4 );
//echo "<br>";
//echo "this is date 2 end :", $date2_end;
//echo "<br>";
$date2_start = substr("$date2", 0,2);
//echo "This is date 2 start :", $date2_start;
//echo "<br>";
$date2_mid = substr("$date2", 2,4);
//echo "This is date 2 mid :", $date2_mid;
//echo "<br>";
$date2_time = substr("$date2", 10, 9);
$date2_insert = $date2_end.$date2_mid.$date2_start.$date2_time;
echo "This is date2  insert :", $date2_insert;
echo "<br>";
$location_data = array();
//echo "<br>";
print_r($location_data);


$sql = "SELECT lat, lng FROM locations WHERE username = '$tempusername' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert' ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $location_data [] = array(
            'lat' => $row["lat"],
            'lng' => $row["lng"]
        ) ;


    //convert the array and return the json file
}
//print_r($location_data);
echo json_encode($location_data);


