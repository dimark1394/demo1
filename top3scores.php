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
echo  "THis the users array";
echo "<br>";
print_r($users);
echo "<br>";
$sql1="SELECT username,count(*) AS counter FROM activity WHERE MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp ) = YEAR(CURRENT_DATE()) AND (type='WALKING' OR type='ON_BICYCLE' OR type='ON_FOOT' OR type='RUNNING') GROUP BY username";
$result1=mysqli_query($conn, $sql1);
while($row = mysqli_fetch_array($result1) )
{
    $scores [] = array(
        'user' => $row['username'],
        'count' => $row['counter']
    ) ;
}
echo "<br>";
echo  "THis the scores for each month";
echo "<br>";
print_r($scores);

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

echo "<br>";echo "<br>";
echo  "THis the scores for each month final";
echo "<br>";
print_r($users);

//menei na ta sortarw to users se ftinousa seira me to keyvalye count
function sortByOrder($a, $b) {
    return $b['count'] - $a['count'];
}

usort($users, 'sortByOrder');



echo "<br>";echo "<br>";
echo  "THis the scores for each month final";
echo "<br>";
print_r($users);