<?php include 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

//get user and animal id
$sql_id = "SELECT user_id, animal_id FROM favorites
JOIN users
	ON users.id = favorites.user_id
JOIN animals
	ON animals.id = favorites.animal_id
WHERE username = '" . $_GET["user"] . "' AND main_name ='" . $_GET["animal"] . "';";

$results_id = $mysqli->query($sql_id);
	if ( !$results_id ) {
		echo $mysqli->error;
		exit();
    }
    
    $row = $results_id->fetch_assoc();
    $userID = $row["user_id"];
    $animalID = $row["animal_id"];



//delete from database
$sql = "DELETE FROM favorites WHERE user_id= " . $userID . " AND animal_id = " . $animalID . ";";

$results= $mysqli->query($sql);
if ( !$results ) {
    echo $mysqli->error;
    exit();
}

//update num_fav in animals database to update discover page
$sql_update = "UPDATE animals SET num_fav = num_fav - 1 WHERE id = " . $animalID . ";";
$results_update= $mysqli->query($sql_update);

if ( !$results_update ) {
    echo $mysqli->error;
    exit();
}

echo $sql_update;
    
     
$mysqli->close();

 
?>