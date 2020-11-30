<?php include '../config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	$sql = "SELECT * FROM countries WHERE country LIKE '" . $_GET["term"] . "' LIMIT 1;";


	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
    }
	$results_array = [];
	

	while( $row = $results->fetch_assoc()) {
		array_push($results_array, $row);
	}
	
	// Convert the assoc array to json string
	echo json_encode($results_array);
	

	

    $mysqli->close();
?>