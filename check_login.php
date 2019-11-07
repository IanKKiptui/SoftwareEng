<html>
<head><title></title>
</head>

<body>

<?php

if(!empty($_POST["email"]) && !empty($_POST["password"]))
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

$email = $_POST["email"];

$statement = "SELECT * FROM customer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$hash = $row["password"];

if(password_verify($_POST["password"], $hash))
{
	echo "Successful login";
	session_start();
	$_SESSION["email"] = $_POST["email"];
	$conn->close();
	header("Location: customermenu.php");
}

else
{
	$conn->close();
	echo "Login failed";
	echo "<br>";
	header("Location: crelogin.php");
}//verifies user entered correct password
}

else
{
	header("Location: clogin.php");
}//prevents user from accessing the page

?>

</body>
</html>



















