<?php 
    include '../nav.php';
    include '../config.php';

    if(!isset($_SESSION["logged"]) || !$_SESSION["logged"])
    {
        if ( isset($_POST['username']) && isset($_POST['password']) ) 
        {
            if ( empty($_POST['username']) || empty($_POST['password']) ) 
            {
    
                $error = "Please enter username and password.";
    
            }
        else
        {
            //connect to database
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if($mysqli->connect_errno) 
            {
                echo $mysqli->connect_error;
                exit();
            }
            //check if passwords match
            $passwordInput = hash("sha256", $_POST["password"]);
          
            $sql = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?;");

            //$results = $mysqli->query($sql);
            $sql->bind_param("si",$_POST['username'],$passwordInput );
            $sql->execute();
            $results = $sql->get_result();
           
            if(!$results) 
            {
                echo $mysqli->error;   
                exit();
            }
            //if passwords do match
            if($results->num_rows> 0)
             {
                //set session variables
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["logged"] = true;
                //redirect user to home page
                header("Location: ../homepage.php");
            
            }
            else
            {
                $error = "Username or password is wrong.";
            }

        }
    }
}

//if user is already logged in, redirect to homepage
else
{
    header("Location: ../homepage.php");
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
    <title>Login</title>
</head>
<body>
<div class="container mt-4">
        <form class="login text-center border p-3" action="loginPage.php" method="POST">
            <div id="loginbox"><h2>Login</h2></div> 
                <input required="required" type="text" placeholder="Username" class="form-control mb-4 mt-4" id="username-id" name="username">     
                <input required="required" type="password" placeholder="Password" class="form-control mb-4" id="password-id" name="password">

                <?php if(isset($error)&&!empty($error)) :?>
                    <p class="text-danger">
                        <?php echo $error; ?>
                    </p>
                <?php endif; ?>
                
                <button type="submit" class="btn btn-primary">Login</button>
                
                <div id="noaccount" class="mt-2"><a href="signup.php">Don't have an account yet?</a></div>
                
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>