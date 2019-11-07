<html>
<head><title></title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

if(!empty($_POST["pname"]) && !empty($_POST["start"]) && !empty($_POST["deadline"]) && !empty($_POST["price"]) && !empty($_POST["developer_id"]))
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

$pname= $_POST["pname"];
$start= $_POST["start"];
$deadline= $_POST["deadline"];
$price = $_POST["price"];
$developer_id = $_POST["developer_id"];

$statement = "SELECT * FROM project WHERE pname=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $pname);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows>=1)
{
	$value = "duplicate";
	$conn->close();
	header("Location: project.php?project=$value");
}
 else
 {
 	$statement = "INSERT INTO project (pname, start, deadline, price, developer_id) VALUES(?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($statement);
	$stmt->bind_param("sssss",$pname, $start, $deadline, $price, $developer_id);
	$stmt->execute();

	$value= "successful";
	$conn->close();
	header("Location: project.php?project=$value");

 }
}

 else
 {
 	header("Location: project.php");


 }



?>



</body>




</html>
