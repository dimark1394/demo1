<?php

include_once ('connection.php');
session_start();


$sql1="TRUNCATE TABLE locations";
$result1=mysqli_query($conn, $sql);
$sql2="TRUNCATE TABLE activity";
$result2=mysqli_query($conn, $sql2);
if($result1 && $result2)
{
    echo "Data successfully deleted";
}
else
{
    echo "Deletion failed";
}