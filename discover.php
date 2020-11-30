<?php include 'config.php'; 
  //get list of animals by most favorited
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->connect_errno ) 
        {
            echo $mysqli->connect_error;
            exit();
        }
  
  $sql = "SELECT * from animals ORDER BY num_fav DESC;";
  $results = $mysqli->query($sql);
  if(!$results)
  {
      echo $mysqli->error;
      exit();
  }
  $animals = array();
  $science = array();
  $num = array();
  while($row = $results->fetch_assoc())
  {
    array_push($animals, $row['main_name']);
    array_push($science, $row['scientific_name']);
    array_push($num, $row['num_fav']);
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
     <div class="row">
       <div class="col-12" id="discoverPage">
         <h1 class="text-center">Most favorited animals by users!</h1>
       </div>
    </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card text-center">
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[0]?></h5>
              <p class="card-text" id="zero"><?php echo $science[0]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[0]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('zero')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
            
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[1]?></h5>
              <p class="card-text" id="one"><?php echo $science[1]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[1]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('one')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
              
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[2]?></h5>
              <p class="card-text" id="two"><?php echo $science[2]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[2]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('two')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
          <div class="card text-center">
             
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[3]?></h5>
              <p class="card-text" id="three"><?php echo $science[3]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[3]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('three')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
             
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[4]?></h5>
              <p class="card-text" id="four"><?php echo $science[4]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[4]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('four')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
             
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[5]?></h5>
              <p class="card-text" id="five"><?php echo $science[5]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[5]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('five')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      
    </div>
    <div class="row">
        <div class="col-lg-4">
          <div class="card text-center">
            
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[6]?></h5>
              <p class="card-text" id="six"><?php echo $science[6]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[6]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('six')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
             
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[7]?></h5>
              <p class="card-text" id="seven"><?php echo $science[7]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[7]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('seven')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      <div class="col-lg-4">
          <div class="card text-center">
              
              <div class="card-body">
              <h5 class="card-title"><?php echo $animals[8]?></h5>
              <p class="card-text" id="eight"><?php echo $science[8]?></p>
              <i class="fas fa-paw"></i> Favorited <?php echo $num[8]?> times by users <i class="fas fa-paw"></i>
              <p></p>
              <button onclick="linkInfo('eight')" class="btn btn-primary">Learn More!</button>
              </div>
            </div>
      </div>
      
    </div>

    

  </div> <!-- end of container -->

  <script>

    function linkInfo(number)
    {
      let temp = "#" + number;
      let name = document.querySelector(temp).innerHTML;

      let token = "bfabc02b7020ff87b6b0fb9c2917d881a2adafbc368f221ca4f74b23b9a7c10d"

      let url ="https://apiv3.iucnredlist.org/api/v3/weblink/" + name;
      let httpRequest = new XMLHttpRequest();
      httpRequest.open("GET", url);
      httpRequest.send();

      httpRequest.onreadystatechange = function() 
      {
        if(httpRequest.readyState == 4) 
        {
            if(httpRequest.status == 200)
            {
              
                let response = httpRequest.responseText;
                let JSresponse = JSON.parse(response);
                let link = JSresponse.rlurl;
                window.location.replace(link);

			      }
            else
            {
              //error
              console.log(httpRequest.status);
            }
       }
    
    }

}

  </script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>