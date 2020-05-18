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
    if ($eco_type[]['timestamp'] == )



}
$eco_month_count=array();
$N = sizeof($eco_type);
//echo $eco_type[1]['timestamp'];
//echo "<br>";
//echo $eco_type[sizeof($eco_type) -1]['timestamp'];
//$N=[sizeof($eco_type) -1];
//echo $N;
for($i=0; $i<$N; $i++ )
{
    echo $eco_type[$i]['timestamp'];
    echo "<br>";
}


echo json_encode($eco_type);


