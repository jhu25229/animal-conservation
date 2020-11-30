<?php 
    require '../config.php';
    require '../nav.php';

    if ( !isset($_POST['first_name']) || empty($_POST['first_name'])
	|| !isset($_POST['last_name']) || empty($_POST['last_name'])
    || !isset($_POST['password']) || empty($_POST['password'])
    ||!isset($_POST['username']) || empty($_POST['username'])
    ||!isset($_POST['email']) || empty($_POST['email'])
    ||!isset($_POST['confirm']) || empty($_POST['confirm'])) 
    {
            $error = "Please fill out all required fields.";
    }
    if($_POST['confirm']!=$_POST['password'])
    {
        $error = "Passwords don't match.";
    }
    else
    {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($mysqli->connect_errno)
        {
            echo $mysqli->connect_error;
            exit();
        }
        //check if username or email is already taken
        $sql_registered = "SELECT * FROM users WHERE username = '" . $_POST["username"]
        . "' OR email = '" . $_POST["email"] . "';";
        
        $results_reg = $mysqli->query($sql_registered);
        
        if(!$results_reg)
        {
            echo $mysqli->error;
            exit();
        }
        if($results_reg->num_rows >0)
        {
            $error = "Username or email has been already taken.";
            
        }
        //store the user in the database
        else
        {
            $password = hash("sha256", $_POST["password"]);

            //add the new user

            $sql = $mysqli->prepare("INSERT INTO users(username, email, password, fname, lname) 
            VALUES(?,?,?,?,?);");
             $sql->bind_param("ssiss",$_POST['username'],$_POST["email"] , $password,$_POST["first_name"] , $_POST["last_name"]);

            $results = $sql->execute();
            echo $sql->affected_rows;

            if(!$results)
            {
                echo $mysqli->error;
                exit();
            }

            $mysqli->close();
        }

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
    <title>Signup Confirmation</title>
</head>
<body id="signconfirm">  
    
    <div id="inside">
        <?php if(!isset($error)&&empty($error)) :?>
            <h1 class="display-4 text-center mt-4 ml-4 mr-4">Sign up success!</h1>
            <p class="lead text-center">Thank you for signing up <?php echo $_POST['username']; ?>.</p>
            <hr class="my-4">
            <p class="text-center">Click the button below to log in!</p>
            <p class="lead text-center">
                <a class="btn btn-primary btn-lg mb-4" href="loginPage.php" role="button">Login</a>
            </p>
        <?php else: ?>
            <h1 class="display-4 text-center mt-4 ml-4 mr-4">Sign up failed :(</h1>
            <p class="lead text-center text-danger"><?php echo $error; ?></p>
            <hr class="my-4">
            <p class="text-center">Click the button below to go back to sign up page.</p>
            <p class="lead text-center">
                <a class="btn btn-primary btn-lg mb-4" href="signup.php" role="button">Sign Up</a>
            </p>
        <?php endif; ?>

    </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>