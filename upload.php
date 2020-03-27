<?php
include_once ('connection.php');

if (isset($_FILES['uploadingfile'])){

    $file = $_FILES['uploadingfile']['tmp_name'];
    print_r($file);


    $data = file_get_contents($file);

    $array = json_decode($data, true );

    print_r($array);

    foreach ($array["locations"] as $location ) {
            echo $location['timestampMs'];
            echo PHP_EOL;
        }

    $msg = array("msg" => "times ok ");
    exit(json_encode($msg));
}
