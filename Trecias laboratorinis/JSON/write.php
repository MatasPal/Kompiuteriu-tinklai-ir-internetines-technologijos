<?php
$result = array();
if (isset($_POST))
{
	require_once('config.php');
	$dbc = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	if(!$dbc)
	{
		$result = array('error' => "cannot connect: ".mysqli_error($dbc));
	}
	else
	{
		$query = "INSERT INTO dovydasstumbra (vardas, epastas, kam, papildomi, zinute)
		VALUES ('".htmlspecialchars($_POST['vardas'])."',
		'".htmlspecialchars($_POST['epastas'])."',
		'".htmlspecialchars($_POST['kam'])."',
		'".htmlspecialchars($_POST['papildomi'])."',
		'".htmlspecialchars($_POST['zinute'])."')";
		
		@mysqli_query($dbc, $query);
		mysqli_close($dbc);
		$result = array('success' => 'success');
	}
}

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");  
echo json_encode($result);
?>