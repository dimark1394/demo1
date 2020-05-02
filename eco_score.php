<?php
include_once ('connection.php');
session_start();
$tempusername = $_SESSION['uiduser'];

date_default_timezone_set('Europe/Athens');
$currnet_moth=date('m');
$count_loc=0;

$count_eco=0;

$locations=array();

$sql="SELECT * FROM locations WHERE timestamp = MONTH(CURRENT_TIMESTAMP) AND timestamp = YEAR(CURRENT_TIMESTAMP) AND username='$tempusername' ";
$result=mysqli_query($conn, $sql);
//arithmos topothesiwn
$count_loc=mysqli_num_rows($result);

if ($count_loc == 0)
{
    echo "You don't have any location history the current month ";
}
else
{
    $query="SELECT * FROM activity WHERE timestamp = MONTH(CURRENT_TIMESTAMP) AND timestamp = YEAR(CURRENT_TIMESTAMP) AND username='$tempusername' AND (type='WALKING' OR type='ON_BICYCLE' OR type='ON_FOOT' OR type='RUNNING')";
    //arithmos oikologikwn type
    $result=mysqli_query($conn, $query);
    $count_eco=mysqli_num_rows($result);

    $eco_score=($count_eco/$count_loc)*100;

    echo "Your eco score this month is ", $eco_score , "%";
}

/*echo $count_loc;
echo "<br>";
echo  $currnet_moth;
*/

/*
$link = mysql_connect("localhost", "mysql_user", "mysql_password");
mysql_select_db("database", $link);

$result = mysql_query("SELECT * FROM table1", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows Rows\n";
 */

