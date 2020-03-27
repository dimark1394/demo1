<?php
include_once ('connection.php');

if (isset($_FILES['uploadingfile'])){

    $file = $_FILES['uploadingfile']['tmp_name'];
    //print_r($file);


    $data = file_get_contents($file);

    $array = json_decode($data, true );


    foreach ($array["locations"] as $row ) {
        $sql = "INSERT INTO locations(timestamp) VALUES ('".$row["timestampMs"]."')";
        mysqli_query($conn, $sql);
        print_r($row);
//        echo $temptime;
        //$temploc =  $location['timestampMs'];
        }

    $msg = array("msg" => "times ok ");
    exit(json_encode($msg));
}
