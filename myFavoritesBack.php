<?php include 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

//get list of user favorites
$sql = "SELECT main_name, scientific_name FROM favorites
JOIN users
	ON users.id = favorites.user_id
JOIN animals
	ON animals.id = favorites.animal_id
WHERE username = '" . $_GET["term"] . "';";

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