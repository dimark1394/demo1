<?php

include_once('connection.php');
session_start();
$rows = array();
$table = array();
$hour=array();
$table['cols'] = array(
    array('label' => 'hour', 'type' => 'string'),
    array('label' => 'count', 'type' => 'number')
);

$sql = "SELECT HOUR(timestamp), count(*) AS counter FROM locations GROUP BY HOUR(timestamp) ";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $hour [] = array(
        'hour' => $row['HOUR(timestamp)'],
        'count' => $row['counter'],
    );
}


$n=sizeof($hour);


$hour_last=array();
for($i=0; $i<24; $i++)
{

        $hour_last[]= array(
            'hour'=>$i,
            'count'=>0
    );


}


for($i=0; $i<$n; $i++)
{
    for($j=0; $j<24; $j++)
    {
        if ($hour_last[$j]['hour']==$hour[$i]['hour'])
        {
            $hour_last[$j]['count'] = $hour[$i]['count'];
        }
    }

}


foreach ($hour_last as $row) {
    $temp = array();
    $temp[] = array('v' => (string)$row['hour']);
    $temp[] = array('v' => (integer)$row['count']);
    $rows[] = array('c' => $temp);

}


$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
echo $jsonTable;

