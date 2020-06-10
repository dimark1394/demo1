<?php

include_once ('connection.php');
session_start();


$sql1="DELETE FROM locations";
$result1=mysqli_query($conn, $sql);
$sql2="DELETE FROM activity";
$result2=mysqli_query($conn, $sql2;
if($result2==TRUE && $result2==TRUE)
{
    echo "Data successfully deleted";
}
else
{
    echo "Deletion failed";
}