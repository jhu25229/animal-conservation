<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Sign Up</title>
</head>
<body>

<?php include '../config.php'; include '../nav.php'; ?>

<div class="container mt-4">
        <form class="login text-center border p-3" action="signupConfirm.php" method="POST">
            <div id="loginbox"><h2>Sign Up</h2></div> 
            <p>Create your account to start favoriting your favorite animals!</p>

            <div class="form-group">
			    <div class="row">
				    <div class="col-6">
                        <input type="text" class="form-control mt-2" name="first_name" placeholder="First Name" required="required">
                    </div>
				    <div class="col-6">
                        <input type="text" class="form-control mt-2" name="last_name" placeholder="Last Name" required="required">
                    </div>
			    </div>        	
            </div>

            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            <input type="text" class="form-control mt-4" name="username" placeholder="Username" required="required">

            <div class="form-group">
			    <div class="row">
				    <div class="col-6">
                        <input type="password" class="form-control mt-4" id="password_id" name="password" placeholder="Password" required="required">
                    </div>
				    <div class="col-6">
                        <input type="password" class="form-control mt-4" id="confirm_password" name="confirm" placeholder="Confirm Password" required="required">
                        <div class="invalid-feedback">Passwords don't match.</div>
                    </div>
			    </div>        	
            </div>
                
            <button type="submit" class="btn btn-primary">Register</button>  
            <div id="yesaccount" class="mt-2"><a href="loginPage.php">Already have an account?</a></div>   
        </form>
    </div>

    <script>
    //check if passwords match
   document.querySelector('form').onsubmit = function(){

        if(document.querySelector('#password_id').value != document.querySelector('#confirm_password').value)
        {
            document.querySelector('#confirm_password').classList.add('is-invalid');
            return false;
        }

   };
    

    </script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>