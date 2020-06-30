<?php
include_once ('connection.php');
session_start();
$date = mysqli_real_escape_string($conn, $_POST['datetimefilter']);
$type = mysqli_real_escape_string($conn,$_POST['type']);

//if(isset($_POST["export"]))
//{
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'date', 'latitude', 'longitude', 'type', 'confidence', 'accuracy'));
    $data=array();
    if($date=='') {
        if ($type == 'ALL') {

            $sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location";
        }
        else {
            $sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location  AND activity.type = '$type' ";

        }
        $result=mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result) ) {
            $data [] = array(
                'username' => $row['username'],
                'timestamp' => $row['timestamp'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'type' => $row['type'],
                'confidence' => $row['confidence'],
                'accuracy' => $row['accuracy']
            );
        }
//        while($row = mysqli_fetch_assoc($result))
//        {
//            fputcsv($output, $row);
//        }
//        fclose($output);



    }
    else {
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

        if($type=='ALL') {

            $sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location AND timestamp BETWEEN '$date1_insert' AND '$date2_insert'";

        }

        else {

            $sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location  AND activity.type = '$type' AND timestamp BETWEEN '$date1_insert' AND '$date2_insert'";
        }
        $result=mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result) ) {
            $data [] = array(
                'username' => $row['username'],
                'timestamp' => $row['timestamp'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'type' => $row['type'],
                'confidence' => $row['confidence'],
                'accuracy' => $row['accuracy']
            );
        }
//        while($row = mysqli_fetch_assoc($result))
//        {
//            fputcsv($output, $row);
//        }
//        fclose($output);

    }
echo json_encode($data);


//}
//    else
//    $sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng, locations.accuracy , activity.type, activity.confidence from locations INNER JOIN activity WHERE locations.id=activity.id_location ";
//    $result=mysqli_query($conn, $sql);





//    while($row = mysqli_fetch_array($result) )
//    {
//        $data [] = array(
//          'username' => $row['username'],
//         'timestamp' => $row['timestamp'],
//         'lat' => $row['lat'],
//         'lng' => $row['lng'],
//         'type' => $row['type'],
//            'confidence' => $row['confidence'],
//            'accuracy' => $row['accuracy']
//     ) ;
//    }
//    $result = mysqli_query($conn, $sql);
//    while($row = mysqli_fetch_assoc($result))
//    {
//        fputcsv($output, $row);
//    }
//    fclose($output);
//}

//apo edw kai katw peiramata leiturgei to query poy einai idio me panw kai to json
//$data=array();
//$sql = "SELECT locations.username, locations.timestamp, locations.lat , locations.lng , locations.accuracy, activity.type , activity.confidence  from locations INNER JOIN activity WHERE locations.id=activity.id_location ";
//$result=mysqli_query($conn, $sql);
//while($row = mysqli_fetch_array($result) )
//{
//    $data [] = array(
//        'username' => $row['username'],
//        'timestamp' => $row['timestamp'],
//        'lat' => $row['lat'],
//        'lng' => $row['lng'],
//        'type' => $row['type'],
//        'confidence' => $row['confidence'],
//        'accuracy' => $row['accuracy']
//    ) ;
//}
//
////print_r($data);
//$N=sizeof($data);
//for ($i=0; $i<$N; $i++)
//{
//    echo $data[$i]['username'];
//    echo " ";
//    echo $data[$i]['timestamp'];
//    echo " ";
//    echo $data[$i]['lat'];
//    echo " ";
//    echo $data[$i]['lng'];
//    echo " ";
//    echo $data[$i]['type'];
//    echo " ";
//    echo $data[$i]['confidence'];
//    echo " ";
//    echo $data[$i]['accuracy'];
//    echo " ";
//    echo "<br>";
//}
//
//
//$export=json_encode($data, true);
//echo $export;