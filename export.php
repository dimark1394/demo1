<?php
include_once ('connection.php');
session_start();

if(isset($_POST["export"]))
{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'date', 'latitude', 'longitude', 'type', 'confidence', 'accuracy'));
    $data=array();
$sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location ";
$result=mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result) )
{
    $data [] = array(
        'username' => $row['username'],
        'timestamp' => $row['timestamp'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
        'type' => $row['type'],
        'confidence' => $row['confidence'],
        'accuracy' => $row['accuracy']
    ) ;
}
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}

//apo edw kai katw peiramata leiturgei to query poy einai idio me panw kai to json
$data=array();
$sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng , locations.accuracy, activity.type , activity.confidence  from locations INNER JOIN activity WHERE locations.id=activity.id_location ";
$result=mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result) )
{
    $data [] = array(
        'username' => $row['username'],
        'timestamp' => $row['timestamp'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
        'type' => $row['type'],
        'confidence' => $row['confidence'],
        'accuracy' => $row['accuracy']
    ) ;
}

//print_r($data);
$N=sizeof($data);
for ($i=0; $i<$N; $i++)
{
    echo $data[$i]['username'];
    echo " ";
    echo $data[$i]['timestamp'];
    echo " ";
    echo $data[$i]['lat'];
    echo " ";
    echo $data[$i]['lng'];
    echo " ";
    echo $data[$i]['type'];
    echo " ";
    echo $data[$i]['confidence'];
    echo " ";
    echo $data[$i]['accuracy'];
    echo " ";
    echo "<br>";
}


$export=json_encode($data, true);
echo $export;