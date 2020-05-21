<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];

date_default_timezone_set('Europe/Athens');

$eco_type=array();

$sql="SELECT type,month(timestamp),count(*) AS counter FROM activity WHERE timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW()  GROUP BY type,month(timestamp) ORDER BY month(timestamp)";
$result=mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result) )
{
    $eco_type [] = array(
        'Month' => $row['month(timestamp)'],
        'type'  => $row['type'],
        'count' => $row['counter']
    ) ;
}

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
$N=sizeof($eco_type);
for ($i=0 ; $i<$N; $i++)
{
    print_r($eco_type[$i]);
    echo "<br>";
}

echo "<br>";
echo "<br>";
$current_month = 0;
$next_month = 1;
$count_total = 0;
$count_eco = 0;
$same_month = 0;

foreach ($eco_type as $value) {
        $current_month = $value['Month'];
        while ($current_month != $next_month) {
            $same_month += 1;
        }else{
            $same_month = 0;
        }

 echo   $same_month;
    }

//$M = sizeof($eco_y);
//for ($i=0 ; $i<$M; $i++)
//{
print_r($eco_y);
//    echo "<br>";
//}
//$eco_per_moth=array();
//for($i=1; $i<13; $i++)
//{
//    $count = 0;
//    for($j=1; $j<$N; $j++)
//    {
//        if($eco_type[$j]['month'] == $eco_type[$j-1]['month'] )
//        {
//            $count = $count ++;
//        }
//
//    }
//            $eco_per_moth [] = array(
//                'month' => $i,
//                'score' => $count
//
//            );
//
//
//}
//
//$M=sizeof($eco_per_moth);
//for($i=0; $i<13; $i++)
//{
//    print_r($eco_per_moth[$i]);
//    echo "<br>";
//}
//
