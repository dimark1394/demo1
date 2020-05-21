<?php

include_once('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];

date_default_timezone_set('Europe/Athens');

$eco_type = array();

$sql = "SELECT type,HOUR(timestamp),count(*) AS counter FROM activity  GROUP BY type,HOUR(timestamp) ORDER BY type,count(*) DESC" ;
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    if($row['type'] != '') {
        $eco_type [] = array(
            'type' => $row['type'],
            'count' => $row['counter'],
            'hour' => $row['HOUR(timestamp)']
        );
    }
}
print_r($eco_type);
$current_type = '';
$next_type = '';
foreach ($eco_type as $r){
    $next_type = $r['type'];
    if($current_type != $next_type ) {
        $current_type = $next_type;
        $busiest_d [] = array(
            'type' => $current_type,
            'busiest_hour' => $r['hour'],
            'count' => $r['count']
        );
    }
}

//print_r($busiest_d);