<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];

date_default_timezone_set('Europe/Athens');

$eco_type=array();

$sql="SELECT * FROM activity WHERE timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW()  ";
$result=mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result) )
{
    $eco_type [] = array(
        'timestamp' => $row['timestamp'],
        'type'  => $row['type']

    ) ;

}

echo json_encode($eco_type);


