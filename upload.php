<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
if (isset($_FILES['uploadingfile'])) {

    $file = $_FILES['uploadingfile']['tmp_name'];
    //print_r($file);


    $data = file_get_contents($file);

    $array = json_decode($data, true);
}

    foreach ($array["locations"] as $row ) {
        $lattemp = $row['latitudeE7']*pow(10,-7);
        $lontemp = $row['longitudeE7']*pow(10, -7);
        if((cacldist($lattemp, $lontemp) < 10.0) && ($row["activity"])) {
            if(strlen($row["timestampMs"]) == 12){
                $temptime = date('Y-m-d H:i:s', substr($row["timestampMs"], 0, -2));
            }else{
                $temptime = date('Y-m-d H:i:s', substr($row["timestampMs"], 0, -3));}
            $sql = "INSERT INTO locations(username,timestamp,accuracy,lat,lng) VALUES ('".$tempusername."','".$temptime."','".$row["accuracy"]."','".$lattemp."','".$lontemp."')";
            mysqli_query($conn, $sql);
            $tempact = $row["activity"];
            foreach ($tempact as $activities){
                $timestmp = $activities["timestampMs"];
                $tempactivities = $activities["activity"];
                foreach ($tempactivities as $actofact){
                    $type = $actofact["type"];
//                    echo ($type);
//                    echo PHP_EOL;
//                    echo ($timestmp);
//                    echo PHP_EOL;
//                    echo PHP_EOL;
                }

            }
        }

        }

    $msg = array("msg" => "times ok ");
    exit(json_encode($msg));


function cacldist($lat2,$lon2){
    $lat1=38.230462;
    $lon1=21.753150;
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $km = $miles * 1.609344;
    return $km ;
}