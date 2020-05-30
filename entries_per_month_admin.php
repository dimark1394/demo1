<?php

include_once('connection.php');
session_start();
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'month', 'type' => 'string'),
    array('label' => 'count', 'type' => 'number')
);

$sql = "SELECT MONTHNAME(timestamp), count(*) AS counter FROM locations GROUP BY MONTH(timestamp) ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $month [] = array(
        'month' => $row['MONTHNAME(timestamp)'],
        'count' => $row['counter'],
    );
}


foreach ($month as $row) {
    $temp = array();
    $temp[] = array('v' => (string)$row['month']);
    $temp[] = array('v' => (integer)$row['count']);
    $rows[] = array('c' => $temp);

}

$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
echo $jsonTable;