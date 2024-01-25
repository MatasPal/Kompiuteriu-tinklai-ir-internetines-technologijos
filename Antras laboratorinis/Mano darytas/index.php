



<!DOCTYPE html>
<html>
<head>
<title>Lab2</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
	#zinutes {
   font-family: Arial;
   border-collapse: collapse;
   width: 70%;
   margin: 0 auto; 
}
#zinutes td {
   border: 1px solid #ddd;
   padding: 8px;
}
#zinutes th { 
   border: 1px solid #ddd;
   padding: 12px; 
   background-color: yellow; 
   font-weight: bold; 
}
#zinutes tr:nth-child(even) {
   background-color: #f2f2f2;
	 /*color:yellow;*/

}
#zinutes tr:hover {
   background-color: #ddd;
}
	/*#zinutes {
 	   font-family: Arial; border-collapse: collapse; width: 70%;
	}
	#zinutes td {
 	   border: 1px solid #ddd; padding: 8px;
	}
	#zinutes tr:nth-child(even){background-color: #f2f2f2;}
	#zinutes tr:hover {background-color: #ddd;}*/

</style>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
 </script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>

</head>
<body>
<center><h3>Žinučių sistema</h3></center>
	
<!---padarykite lentelės karkasą <table>...</table> ir antraštę-->
<!--- o turinys bus formuojamas php nuskaičius lentelę-->
</html>
	
<?php
$server = "localhost";
$db = "stud";
$user = "stud";
$password = "stud";
$lentele = "vardaspavarde";
// prisijungimas prie DB
$dbc=mysqli_connect($server,$user,$password, $db);
if(!$dbc){ die ("Negaliu prisijungti prie MySQL:"	
				.mysqli_error($dbc)); }
//if (isset($_POST["ok"]))
if($_POST !=null){
// įrašyti reikšmes iš formos
	$vardas = $_POST['vardas'];
// var_dump($vardas);
	$epastas =$_POST['epastas'];
	$kam =$_POST['kam'];
	$data = date('Y-m-d H:i:s');
	$zinute =$_POST['zinute'];
//nuskaityti likusias užklausos reikšmes
	$sql = "INSERT INTO $lentele (vardas, epastas, kam, data, zinute ) VALUES ('$vardas', '$epastas', '$kam', '$data','$zinute' )";
	if (!mysqli_query($dbc, $sql))  die ("Klaida įrašant:" .mysqli_error($dbc));
    echo "Įrašyta";	
    header('Location: index.php');
    exit();
}
$sql = "SELECT * FROM $lentele";
$result = mysqli_query($dbc, $sql);

echo '<table id="zinutes">';
echo '<tr><th>Nr</th><th>Kas siuntė</th><th>Siuntėjo e-paštas</th><th>Gavėjas</th><th>Data</th><th>Žinutė</th></tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['vardas'] . "</td>";
    echo "<td>" . $row['epastas'] . "</td>";
    echo "<td>" . $row['kam'] . "</td>";
    echo "<td>" . $row['data'] . "</td>";
    echo "<td>" . $row['zinute'] . "</td>";
    echo "</tr>";
}
echo '<tr><th colspan="6">Darbą atliko: Matas Palujanskas</th></tr>';

echo '</table>';
 
?>
<html>
<center><h3>Įveskite naują žinutę</h3></center>
<div class="container">
  <form method='post'>
     <div class="form-group col-lg-4">
          <label for="vardas" class="control-label">Siuntėjo vardas:</label>
          <input name='vardas' type='text' class="form-control input-sm">
      </div>
      <div class="form-group col-lg-4">
          <label for="epastas" class="control-label">Siuntėjo e-paštas:</label>
          <input name='epastas' id="epastas" type='email' class="form-control input-sm">
      </div>
      <div class="form-group col-lg-4">
          <label for="kam" class="control-label">Kam skirta:</label>
          <input name='kam' type='text' class="form-control input-sm">
      </div>
      <div class="form-group col-lg-12">
          <label for="zinute" class="control-label">Žinutė:</label>
          <textarea name='zinute' class="form-control input-sm"></textarea>
      </div>
      <div class="form-group col-lg-2">
         <input type='submit' name='ok' value='Siųsti' class="btnbtn-default">
      </div>
	  <div class="form-group col-lg-2">
			<button type="submit" formaction="http://localhost/automobilis.htm">Toliau</button>      
	  </div>
	  <div class="form-group col-lg-2">
			<a href="http://localhost/bootstrap_automobilis.htm">Toliau į bootstrap_automobilis.htm</a>
	  </div>
  </form>
</div>

</body>
</html>



