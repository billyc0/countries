<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>World Countries</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link href="../open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
</head>
<body>
<h1 class="text-center">World Countries</h1>
<h3 class="text-center">A list of all the sovereign nations of the world</h3>
<?php
	/**
	
		World Countries
		countries.php
		Author: Billy Chandler
		Date: 2017-06-12
		
		Developer Websites:
		www.billychandler.org
		www.github.com/billyc0
	
	**/

	// Database credentials (withheld for Github)
	$host = "";
	$user = "";
	$pass = "";
	$db = "";

	// Database connection
	$conn = mysqli_connect($host, $user, $pass, $db);
	// Query for data retrieval
	$q = "SELECT * FROM World_Countries ORDER BY Name asc";
	$countries = mysqli_query($conn, $q);
	
	// Creates a table of countries
	echo "<table class='table'>";
	echo "<tr>";
	echo "<th>Flag</th>";
	echo "<th>Name</th>";
	echo "<th>Full Name</th>";
	echo "<th>Capital(s)</th>";
	echo "<th>Map</th>";
	echo "</tr>";
	while ($country = mysqli_fetch_array($countries)) {
		echo "<tr>";
		echo "<td>";
		echo "<img src='" . $country['Flag'] . "' alt='" .
			$country['Name'] . "' height='48px' />";
		echo "</td>";
		echo "<td>" . $country['Name'] . "</td>";
		echo "<td>" . $country['FullName'] . "</td>";
		echo "<td>" . $country['Capital'] . "</td>";
		echo "<td>";
		echo "<a href='" . $country['Map'] . "' target='_blank'>";
		echo "<span class='oi oi-map' tile='map' " .
			"aria-hidden='true'></span>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	// Closes the database connection
	mysqli_close($conn);
?>
</body>
</html>