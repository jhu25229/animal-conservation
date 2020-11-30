<?php
    include '../config.php';
    //check if user is logged in
    if(empty($_SESSION)) 
    {
        //do nothing
    }
    else //add to database since user is logged in
    { 
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->connect_errno ) 
        {
            echo $mysqli->connect_error;
            exit();
        }

        //check if animal is already in database
        $sql_check = "SELECT id FROM animals WHERE main_name = '" . $_POST['mainName'] . "';";
        
        $results_check = $mysqli->query($sql_check);
        if(!$results_check)
        {
            echo $mysqli->error;
            exit();
        }
        //animal is not in database, insert it
        if($results_check->num_rows == 0)
        {
            $sql_insertAnimal = "INSERT INTO animals (main_name, scientific_name, pop_trend)VALUES ('" . $_POST['mainName'] . "', '" . $_POST['scienceName'] . "', '" . $_POST['pop']. "');";
          
            $results_insertAnimal = $mysqli->query($sql_insertAnimal);
        }
        //check if user favorited this animal already
        //get id of animal and user id
        $sql_animalID = "SELECT id FROM animals WHERE main_name = '" . $_POST['mainName'] . "';";
        $animalID = $mysqli->query($sql_animalID);
        $id = $animalID->fetch_assoc();

        $animalID = $id["id"];
        

        $sql_userID = "SELECT id FROM users WHERE username = '" . $_SESSION['username'] . "';";
        $userID = $mysqli->query($sql_userID);
        $id = $userID->fetch_assoc();
        $userID = $id["id"];
        

        //if not favorited, insert into database, if already favorited, do nothing
        $sql_main = "SELECT * from favorites JOIN users ON favorites.user_id = users.id WHERE favorites.animal_id =" . 
        $animalID . " AND users.username = '" . $_SESSION['username'] . "';";
        $results_main = $mysqli->query($sql_main);
        
        if($results_main->num_rows == 0)
        {
            $sql_insertFav = "INSERT INTO favorites (animal_id, user_id) VALUES(" . $animalID . ", " . $userID . ");";
            $mysqli->query($sql_insertFav);
            //update animal favorite count by 1
            $sql_updateFav = "UPDATE animals SET num_fav = num_fav + 1 WHERE animals.id = " . $animalID . ";";
            $mysqli->query($sql_updateFav);
            
        }
        $mysqli->close();
    }

       
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Search Results</title>
</head>
<body>

<?php include '../nav.php'; ?>

    <div id="insideAdded">
        <?php if(empty($_SESSION)) :?>
            <h1 class="display-4 text-center mt-4 ml-4 mr-4">Not logged in!</h1>
            <p class="lead text-center">Please log in or sign up to start favoriting animals.</p>
            <hr class="my-4">
            <p class="text-center">Click the button below to log in!</p>
            <p class="lead text-center">
                <a class="btn btn-primary btn-lg mb-4" href="/~jhu25229/final_project/login/loginPage.php" role="button">Login</a>
            </p>
        <?php else: ?>
            <h1 class="display-4 text-center mt-4 ml-4 mr-4"><?php echo $_POST["mainName"]; ?>
             has been added to your favorites</h1>
            <hr class="my-4">
            <p class="text-center">Click the button below to see your favorited animals.</p>
            <p class="lead text-center">
                <a class="btn btn-primary btn-lg mb-4" href="/~jhu25229/final_project/myFavorites.php" role="button">My Favorites</a>
            </p>
        <?php endif; ?>

    </div>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>