<?php
include_once ('connection.php');
session_status();
$tempusername = $_SESSION['iduser'];
$date_data= array();

$sql = "SELECT timestamp FROM locations WHERE username='$tempusername' ORDER BY timestamp ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result) )
{
    $date_data [] = array(
        'timestamp'  => $row['timestamp']
    ) ;

}

return json_decode($date_data);