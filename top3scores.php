<?php

include_once ('connection.php');
session_start();
$tempusername=$_SESSION['uiduser'];

$sql="SELECT * FROM activity WHERE MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp ) = YEAR(CURRENT_DATE()) AND (type='WALKING' OR type='ON_BICYCLE' OR type='ON_FOOT' OR type='RUNNING') GROUP BY username";