<html>
<head><title></title>
<?php

if(!empty($_POST["fullname"]) && !empty($_POST["email"]) && !empty($_POST["specialization"]) && !empty($_POST["experience"]) && !empty($_POST["password"]))
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
$specialization = $_POST["specialization"];
$experience = $_POST["experience"];
$password = $_POST["password"];

$hashed= password_hash($password, PASSWORD_DEFAULT);


$statement = "SELECT * FROM developer WHERE email=?";
$stmt = $conn->prepare($statement);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows>=1)
{
	$value = "duplicate";
	header("Location: dsignup.php?developer=$value");
}

else
{

$statement = "INSERT INTO developer(fullname, email, specialization, experience, password) VALUES(?, ?, ?, ? ,?)";
$stmt = $conn->prepare($statement);
$stmt->bind_param("sssss",$fullname, $email,$specialization,$experience, $hashed);
$stmt->execute();

$value= "successful";
header("Location: dsignup.php?developer=$value");

}

$conn->close();
}

else
{
	header("Location:dsignup.php");
}

?>

</body>
</html>



















