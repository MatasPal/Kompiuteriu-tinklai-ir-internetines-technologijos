<?php
$messages = array();
require_once('config.php');
$dbc = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if(!$dbc)
{
	$result = array('error' => "cannot connect: ".mysqli_error($dbc));
	echo json_encode($result);
	exit();
}

$query = 'SELECT * FROM dovydasstumbra order by id desc';
mysqli_set_charset($dbc,"utf8"); 
$result = @mysqli_query($dbc, $query);
while ($row = @mysqli_fetch_array($result))
{
	$messages[]=$row;
}

mysqli_close($dbc);
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
echo json_encode($messages);
?>