<html>
<head><title></title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php

	echo "<img id='logo' src='js.png'/>";
	// echo "<a href='supervisormenu.php' class='button'>Back to Supervisor Panel</a>";
	echo "<br>";
	echo "<br>";
	echo "<form class='add_exp_form' action='check_exp.php' method='POST'>";

	if(isset($_GET["elevel"]))
	{
		if($_GET["elevel"] == "duplicate")
	{
		echo "<h4> Already entered this experience level </h4>";
		echo "<br>";
		echo "<h4>Please try again</h4>";
	}

	else if($_GET["elevel"] == "successful")
	{
		echo"<h4>Successfully added an experience level!</h4>";
	}

	else
	{
		echo "<h4>Please add an experience level</h4>";
	}
}
	
	

	echo "<label class='label' for='experience'>Enter a experience level:</label>";
	echo "<input class='text' type='text' name='experience'/>";
	echo "<br>";

	echo "<input class='submit' type='submit' value='Add experience'/>";
	echo "</form>";

	














	?>


</body>











</html>
