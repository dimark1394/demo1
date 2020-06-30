<?php

include_once('connection.php');
session_start();
$rows = array();
$table = array();
$month = array();
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

$month_last=array();
for($i=0; $i<12; $i++)
{
    if ($i==0)
    {
        $month_last[] = array(
            'month'=>'January',
            'count'=> 0
        );
    }
    if ($i==1)
    {
        $month_last[] = array(
            'month'=>'February',
            'count'=> 0
        );
    }
    if ($i==2)
    {
        $month_last[] = array(
            'month'=>'March',
            'count'=> 0
        );
    }
    if ($i==3)
    {
        $month_last[] = array(
            'month'=>'April',
            'count'=> 0
        );
    }
    if ($i==4)
    {
        $month_last[] = array(
            'month'=>'May',
            'count'=> 0
        );
    }
    if ($i==5)
    {
        $month_last[] = array(
            'month'=>'June',
            'count'=> 0
        );
    }
    if ($i==6)
    {
        $month_last[] = array(
            'month'=>'July',
            'count'=> 0
        );
    }
    if ($i==7)
    {
        $month_last[] = array(
            'month'=>'August',
            'count'=> 0
        );
    }
    if ($i==8)
    {
        $month_last[] = array(
            'month'=>'September',
            'count'=> 0
        );
    }
    if ($i==9)
    {
        $month_last[] = array(
            'month'=>'October',
            'count'=> 0
        );
    }
    if ($i==10)
    {
        $month_last[] = array(
            'month'=>'November',
            'count'=> 0
        );
    }
    if ($i==11)
    {
        $month_last[] = array(
            'month'=>'December',
            'count'=> 0
        );
    }
}

$n=sizeof($month);
for($i=0; $i<$n; $i++)
{
    for($j=0; $j<12; $j++)
    {
        if ($month_last[$j]['month']==$month[$i]['month'])
        {
            $month_last[$j]['count'] = $month[$i]['count'];
        }
    }

}




foreach ($month_last as $row) {
    $temp = array();
    $temp[] = array('v' => (string)$row['month']);
    $temp[] = array('v' => (integer)$row['count']);
    $rows[] = array('c' => $temp);

}

$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
echo $jsonTable;