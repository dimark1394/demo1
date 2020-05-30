<?php
include_once('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
$date = mysqli_real_escape_string($conn, $_POST['datefilter']);

$date1 = substr("$date", 0, 19);

$date1_end = substr("$date1", 6, 4);

$date1_start = substr("$date1", 0, 2);

$date1_mid = substr("$date1", 2, 4);

$date1_time = substr("$date1", 10, 9);
$date1_insert = $date1_end . $date1_mid . $date1_start . $date1_time;



$date2 = substr("$date", 22, 40);

$date2_end = substr("$date2", 6, 4);

$date2_start = substr("$date2", 0, 2);

$date2_mid = substr("$date2", 2, 4);

$date2_time = substr("$date2", 10, 9);
$date2_insert = $date2_end . $date2_mid . $date2_start . $date2_time;
$location_data = array();



    $sql = "SELECT lat, lng FROM locations WHERE username = '$tempusername' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert' ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $location_data [] = [
            'lat' => $row["lat"],
            'lng' => $row["lng"],
            'count' => 1
        ];


        //convert the array and return the json file
    }
//print_r($location_data);
//echo json_encode($location_data);



$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'Type', 'type' => 'string'),
    array('label' => 'Count', 'type' => 'number')
);

$sql1 = "SELECT type,count(*) AS counter FROM activity WHERE username = '$tempusername' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert' GROUP BY type";
$result1 = mysqli_query($conn,$sql1);
foreach ($result1 as $r){
    $temp = array();
    if($r['type'] != '') {
        $temp[] = array('v' => (string)$r['type']);
        $temp[] = array('v' => (int)$r['counter']);
        $rows[] = array('c' => $temp);
    }
}
$result1 -> free();
$table['rows'] = $rows;

date_default_timezone_set('Europe/Athens');

$busiest_days = array();

$sql2 = "SELECT type,dayname(timestamp),count(*) AS counter FROM activity WHERE username = '$tempusername' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert'  GROUP BY type,WEEKDAY(timestamp) ORDER BY type,count(*) DESC" ;
$result2 = mysqli_query($conn, $sql2);

while ($row2 = mysqli_fetch_array($result2)) {
    if($row2['type'] != '') {
        $busiest_days [] = array(
            'type' => $row2['type'],
            'count' => $row2['counter'],
            'day' => $row2['dayname(timestamp)']
        );
    }
}
//print_r($eco_type);
$current_type_d = '';
$next_type_d = '';
foreach ($busiest_days as $day){
    $next_type_d = $day['type'];
    if($current_type_d != $next_type_d ) {
        $current_type_d = $next_type_d;
        $busiest_d [] = array(
            'type' => $current_type_d,
            'busiest_day' => $day['day'],
            'count' => $day['count']
        );
    }
}

$busiest_hours = array();

$sql = "SELECT type,HOUR(timestamp),count(*) AS counter FROM activity WHERE username = '$tempusername' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert'   GROUP BY type,HOUR(timestamp) ORDER BY type,count(*) DESC" ;
$result = mysqli_query($conn, $sql);

while ($row3 = mysqli_fetch_array($result)) {
    if($row3['type'] != '') {
        $busiest_hours [] = array(
            'type' => $row3['type'],
            'count' => $row3['counter'],
            'hour' => $row3['HOUR(timestamp)']
        );
    }
}

$current_type = '';
$next_type = '';
foreach ($busiest_hours as $hour){
    $next_type = $hour['type'];
    if($current_type != $next_type ) {
        $current_type = $next_type;
        $busiest_h [] = array(
            'type' => $current_type,
            'busiest_hour' => $hour['hour'],
            'count' => $hour['count']
        );
    }
}

$allresults = array($location_data,$table, $busiest_d, $busiest_h);
echo json_encode($allresults);




