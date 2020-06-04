<?php

include_once ('connection.php');
session_start();
$tempusername=$_SESSION['uiduser'];
$sql="SELECT username FROM activity  GROUP BY username  ";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result) )
{
    $users [] = array(
        'user' => $row['username'],
        'count' => 0
    ) ;
}
//echo  "THis the users array";
//echo "<br>";
//print_r($users);
//echo "<br>";
$sql1="SELECT username,count(*) AS counter FROM activity WHERE MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp ) = YEAR(CURRENT_DATE()) AND (type='WALKING' OR type='ON_BICYCLE' OR type='ON_FOOT' OR type='RUNNING') GROUP BY username";
$result1=mysqli_query($conn, $sql1);
while($row = mysqli_fetch_array($result1) )
{
    $scores [] = array(
        'user' => $row['username'],
        'count' => $row['counter']
    ) ;
}
//echo "<br>";
//echo  "THis the scores for each month";
//echo "<br>";
//print_r($scores);

$n=sizeof($users);
$m=sizeof($scores);

for($i=0; $i<$m; $i++)
{
    for($j=0; $j<$n; $j++)
    {
        if ($users[$j]['user']==$scores[$i]['user'])
        {

            $users[$j]['count']=$scores[$i]['count'];

        }
    }
}

//echo "<br>";echo "<br>";
//echo  "THis the scores for each month final";
//echo "<br>";
//print_r($users);

//menei na ta sortarw to users se ftinousa seira me to keyvalye count
function sortByOrder($a, $b) {
    return $b['count'] - $a['count'];
}

usort($users, 'sortByOrder');



//echo "<br>";echo "<br>";
//echo  "THis the scores for each month before including the the top 3  user";
//echo "<br>";
//print_r($users);


$users_final= array();

$users_final[0]['user']=$users[0]['user'];
$users_final[0]['count']=$users[0]['count'];
$users_final[0]['position']=1;
$users_final[1]['user']=$users[1]['user'];
$users_final[1]['count']=$users[1]['count'];
$users_final[1]['position']=2;
$users_final[2]['user']=$users[2]['user'];
$users_final[2]['count']=$users[2]['count'];
$users_final[2]['position']=3;


//echo "<br>";echo "<br>";
//echo  "THis the scores for each month before including only the the top 3  user";
//echo "<br>";
//print_r($users_final);
//
//$n=sizeof($users);

if($tempusername!=$users_final[0]['user'] && $tempusername!=$users_final[1]['user'] && $tempusername!=$users_final[2]['user'] )
{
    for($i=0; $i<$n; $i++)
    {
        if ($users[$i]['user']==$tempusername)
        {
            $users_final[3]['user']=$users[$i]['user'];
            $users_final[3]['position']=$i+1;
        }
    }
}

//echo "<br>";echo "<br>";
//echo  "THis if the final final top 3 (or more) users  ";
//echo " " .$tempusername;
//echo "<br>";
//print_r($users_final);


$table = array();
$table['cols'] = array(
    array('label' => 'user', 'type' => 'string'),
    array('label' => 'count', 'type'=> 'number'),
    array('label' => 'position', 'type'=> 'number')
);

$rows = array();
foreach ($users_final as $row)
{
    $temp=array();
    $temp[] = array('v' => (string) $row['user']);
    $temp[] = array('v'=> (integer) $row['count']);
    $temp[] = array('v'=> (integer) $row['position']);
    $rows[] = array('c'=> $temp);

}


$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
echo $jsonTable;