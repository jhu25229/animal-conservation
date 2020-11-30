<?php include 'config.php';

//if user is not logged in, redirect them to login page

  
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->connect_errno ) 
        {
            echo $mysqli->connect_error;
            exit();
        }

 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover</title>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="container">

<?php if(empty($_SESSION)) :?>
  
  <h1 class="display-4 text-center mt-4 ml-4 mr-4">Not logged in!</h1>
  <p class="lead text-center">Please log in or sign up to see your favorited animals.</p>
  <hr class="my-4">
  <p class="text-center">Click the button below to log in!</p>
  <p class="lead text-center">
    <a class="btn btn-primary btn-lg mb-4" href="/~jhu25229/final_project/login/loginPage.php" role="button">Login</a>
  </p>
  <?php else: ?>
  
   <input id="user" value="<?php echo $_SESSION['username'];?>" type="hidden">

    <div class="row">
       <div class="col-12" id="favoritePage">
         <h1 class="text-center">Your favorited animals!</h1>
       </div>
    </div>

    <div class="row" id="rowStart">
     
      
    </div>



    <?php endif; ?>
</div>
          
<script>

  function ajaxGet(endpointUrl, returnFunction){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endpointUrl, true);
    xhr.onreadystatechange = function(){
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          // When ajax call is complete, call this function, pass a string with the response
          returnFunction( xhr.responseText );
        } else {
          alert('AJAX Error.');
          console.log(xhr.status);
        }
      }
    }
    xhr.send();
  };

  window.onload = function(){
    //get user name 
    let username = document.querySelector("#user").value;
    
    ajaxGet("myFavoritesBack.php?term=" + username, function(results){
      results = JSON.parse(results);
       displayResults(results);
    });
    
  }
  
function unfavorited(button){
 
  let animal = button.firstChild.value;
  let username = document.querySelector("#user").value;

  ajaxGet("myFavoritesBack2.php?animal=" + animal + 
  "&user=" + username, function(results){
    console.log(results);
    //reload page
    location.reload();

  });
  
}


function displayResults(results)
{
  let row = document.querySelector("#rowStart");
  for(let i=0; i<results.length; i++)
  {
    let name = results[i].main_name;
    let science = results[i].scientific_name;

    let column = document.createElement("div");
    column.classList.add("col-lg-4");

    column.innerHTML = "<div class='card text-center'><div class='card-body'><h5 class='card-title'>" + name + "</h5><p class='card-text'>" + science + "</p><button class='btn btn-primary' onclick='unfavorited(this)'><input type='hidden' value='" + name + "'><i class='fas fa-paw'></i> Unfavorite</button></div></div></div>";

    row.appendChild(column);

  }



}





</script>

  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>