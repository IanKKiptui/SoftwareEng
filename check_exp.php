<html>
<head><title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

if(!empty($_POST["experience"]))
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

$experience= $_POST["experience"];


$statement = "SELECT * FROM elevel WHERE experience=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $experience);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows>=1)
{
	$value = "duplicate";
	$conn->close();
	header("Location: add_exp.php?elevel=$value");
}
 else
 {
 	$statement = "INSERT INTO elevel (experience) VALUES(?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("s",$experience);
	$stmt->execute();

	$value= "successful";
	$conn->close();
	header("Location: add_exp.php?elevel=$value");

 }
}

 else
 {
 	header("Location: add_exp.php");


 }



?>



</body>




</html>
