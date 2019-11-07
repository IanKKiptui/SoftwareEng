<html>
<head><title></title>
<?php

if(!empty($_POST["fullname"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
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

$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];

$hashed= password_hash($password, PASSWORD_DEFAULT);


$statement = "SELECT * FROM customer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows>=1)
{
	$value = "duplicate";
	header("Location: csignup.php?customer=$value");
}

else
{

$statement = "INSERT INTO customer(fullname, email, password) VALUES(?, ?, ?)";
$stmt = $conn->prepare($statement);
$stmt->bind_param("sss",$fullname, $email, $hashed);
$stmt->execute();

$value= "successful";
header("Location: csignup.php?customer=$value");

}

$conn->close();
}

else
{
	header("Location:csignup.php");
}

?>

</body>
</html>



















