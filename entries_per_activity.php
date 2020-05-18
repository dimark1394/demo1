<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'Type', 'type' => 'string'),
    array('label' => 'Count', 'type' => 'number')
);

$sql = "SELECT type,count(*) AS counter FROM activity GROUP BY type";
$result = mysqli_query($conn,$sql);
foreach ($result as $r){
    $temp = array();
    if($r['type'] != '') {
        $temp[] = array('v' => (string)$r['type']);
        $temp[] = array('v' => (int)$r['counter']);
        $rows[] = array('c' => $temp);
    }
}
$result -> free();
$table['rows'] = $rows;
$jsonTable = json_encode($table,true);
echo $jsonTable;
//$count_array = [[
//   "type" => 'count'
//]];
//while($row = mysqli_fetch_array($result)){
//    if($row['type'] != ""){
//        $count_array [] = [
//            $row['type'] => $row['counter'],
//        ];
//    }
//}
//echo json_encode($count_array);
