<html>
<head><title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

if(!empty($_POST["specialization"]))
{
$DBHOST = "localhost";
$DBUSER = "root";
$DBPWD = "";
$DBNAME ="js";

$conn = new mysqli($DBHOST, $DBUSER, $DBPWD, $DBNAME);

if($conn->connect_error)
{
	die("connection failed!".$conn->connect_error);
}

$specialization= $_POST["specialization"];


$statement = "SELECT * FROM stype WHERE specialization=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $specialization);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows>=1)
{
	$value = "duplicate";
	$conn->close();
	header("Location: add_spec.php?stype=$value");
}
 else
 {
 	$statement = "INSERT INTO stype (specialization) VALUES(?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s",$specialization);
	$stmt->execute();

	$value= "successful";
	$conn->close();
	header("Location: add_spec.php?stype=$value");

 }
}

 else
 {
 	header("Location: add_spec.php");


 }



?>



</body>




</html>
