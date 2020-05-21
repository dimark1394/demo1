<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];

date_default_timezone_set('Europe/Athens');

$eco_type=array();

$sql="SELECT type,MONTH(timestamp),count(*) AS counter FROM activity  GROUP BY type,MONTH(timestamp)";
$result=mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result) )
{
    $eco_type [] = array(
        'type' => $row['type'],
        'count' => $row['counter'],
        'month' => $row['MONTH(timestamp)']
    ) ;
}
print_r($eco_type);

//$N = sizeof($eco_type);
//
//for($i=0; $i<$N; $i++ )
//{
//
//    $eco_type[$i]['timestamp']=substr($eco_type[$i]['timestamp'], 5,2);
//   // echo $eco_type[$i]['timestamp'];
//    //echo "<br>";
//}
//
//for($i=0; $i<$N; $i++ )
//{
//    if ($eco_type[$i]['timestamp']=="01")
//    {
//        $eco_type[$i]['timestamp'] = "January";
//    }
//    elseif ($eco_type[$i]['timestamp']=="02")
//    {
//        $eco_type[$i]['timestamp'] = "February";
//    }
//    elseif ($eco_type[$i]['timestamp']=="03")
//    {
//        $eco_type[$i]['timestamp'] = "March";
//    }
//    elseif ($eco_type[$i]['timestamp']=="04")
//    {
//        $eco_type[$i]['timestamp'] = "April";
//    }
//    elseif ($eco_type[$i]['timestamp']=="05")
//    {
//        $eco_type[$i]['timestamp'] = "May";
//    }
//    elseif ($eco_type[$i]['timestamp']=="06")
//    {
//        $eco_type[$i]['timestamp'] = "June";
//    }
//    elseif ($eco_type[$i]['timestamp']=="07")
//    {
//        $eco_type[$i]['timestamp'] = "July";
//    }
//    elseif ($eco_type[$i]['timestamp']=="08")
//    {
//        $eco_type[$i]['timestamp'] = "August";
//    }
//    elseif ($eco_type[$i]['timestamp']=="09")
//    {
//        $eco_type[$i]['timestamp'] = "September";
//    }
//    elseif ($eco_type[$i]['timestamp']=="10")
//    {
//        $eco_type[$i]['timestamp'] = "October";
//    }
//    elseif ($eco_type[$i]['timestamp']=="11")
//    {
//        $eco_type[$i]['timestamp'] = "November";
//    }
//    elseif ($eco_type[$i]['timestamp']=="12")
//    {
//        $eco_type[$i]['timestamp'] = "December";
//    }
//}
//
//for($i=0; $i<$N; $i++ )
//{
//    echo $eco_type[$i]['timestamp'];
//    echo "<br>";
//}
//
//echo json_encode($eco_type);
//
//
