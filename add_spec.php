<html>
<head><title></title>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php

	echo "<img id='logo' src='js.png'/>";
	<!-- echo "<a href='supervisormenu.php' class='button'>Back to Supervisor Panel</a>"; -->
	echo "<br>";
	echo "<br>";
	echo "<form class='add_spec_form' action='check_spec.php' method='POST'>";

	if(isset($_GET["stype"]))
	{
		if($_GET["stype"] == "duplicate")
	{
		echo "<h4> Already entered this specialization </h4>";
		echo "<br>";
		echo "<h4>Please try again</h4>";
	}

	else if($_GET["stype"] == "successful")
	{
		echo"<h4>Successfully added a specialization!</h4>";
	}

	else
	{
		echo "<h4>Please add a specialization</h4>";
	}
}
	
	

	echo "<label class='label' for='specialization'>Enter a Specilization Type:</label>";
	echo "<input class='text' type='text' name='specialization'/>";
	echo "<br>";

	echo "<input class='submit' type='submit' value='Add specialization'/>";
	echo "</form>";

	














	?>


</body>











</html>
