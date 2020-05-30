<?php
include_once ('connection.php');
session_start();


$sql="SELECT * FROM locations ";
$result=mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
//echo "this is the total amount     ";
//echo $total;

//total is the variable to make the % for each user by dividing their (count/total) *100

//now i make the array user_count to make the count for each user grouped by username. Later i will make it with uid



$sql1= "SELECT username,count(*) AS counter FROM locations GROUP BY username ";
$result=mysqli_query($conn,$sql1);

while($row = mysqli_fetch_array($result) )
{
    $user_count [] = array(
        'user' => $row['username'],
        'rate %' => $row['counter']/$total*100
    ) ;
}

//echo "<br>";
//
//print_r($user_count);

$N=sizeof($user_count);

for($i=0; $i<$N; $i++)
{
      $user_count[$i]['rate %']=round($user_count[$i]['rate %'], 0.005);
}
//echo "<br>";
//
//print_r($user_count);

$table = array();
$table['cols'] = array(
    array('label' => 'user', 'type' => 'string'),
    array('label' => 'rate %', 'type'=> 'number')
);

$rows = array();
foreach ($user_count as $row)
{
    $temp=array();
    $temp[] = array('v' => (string) $row['user']);
    $temp[] = array('v'=> (integer) $row['rate %']);
    $rows[] = array('c'=> $temp);

}
$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
//echo "<br>";
echo $jsonTable;
