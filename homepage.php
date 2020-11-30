<?php include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home Page</title>
</head>
<body>
    
<?php include 'nav.php'; ?>
    

        <!-- Start of first big header-->

<div class="container-fluid" id="news">
    <div class="row">

      <div class="col-lg-4 col-sm-12"><img id="twoElephants" src="images/elephant.jpg" alt="elephant"></div>

      <div class="col-8">
        <h1 class="display-4 fluidHeader" id="newsHeader">Elephant populations are declining rapidly in Côte d'Ivoire</h1>
        <p class="lead" id="newsInfo">Recent years have witnessed a widespread and catastrophic decline in the number of forest elephants in protected areas in Côte d'Ivoire, according to a study published October 14 in the open-access journal PLOS ONE by Sery Gonedelé Bi of Université Félix Houphouët-Boigny d'Abidjan-Cocody, and colleagues.</p>
        <a href="https://www.sciencedaily.com/releases/2020/10/201014141109.htm" target="_blank" class="btn btn-primary" id="newsLink">Link</a>
        
      </div>  

   </div>
</div>



        <!-- End of first big header-->

        
        <div class="container">

              <!-- start of radio buttons -->
              <div class="row radioButtons">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" checked="checked" class="custom-control-input" id="1" name="news" onclick="changeNews(this);">
                <label class="custom-control-label" for="1"></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="2" name="news" onclick="changeNews(this);">
                <label class="custom-control-label" for="2"></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="3" name="news" onclick="changeNews(this);">
                <label class="custom-control-label" for="3"></label>
              </div>
              </div>
              <!-- end of radio buttons -->

            <!-- Start of total number of endangered species-->
            <div class="row">
                <div class="col-lg" id="numEndangered">
                    <h1>6811 total vulnerable species.</h1>
                    <h1>11732 total endangered species.</h1>
                    <h1>13898 total critically endangered species.</h1>
                </div> 
            </div>
            <!-- End of total number of endangered species-->

            <!-- Start of three boxes-->
            <div class="row mb-4" class="searchCards">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <img src="images/tiger2.jpg" class="card-img-top" alt="tiger">
                        <div class="card-body">
                        <h5 class="card-title">Search by Species Name</h5>
                        <p class="card-text">Have an animal you want to learn more about in mind already? 
                        </p>
                        <a href="/~jhu25229/final_project/search/search.php" class="btn btn-primary">Search!</a>
                        </div>
                      </div>
                </div>
                <div class = "col-lg-4">
                    <div class="card">
                        <img src="images/worldMap.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Search by Country</h5>
                          <p class="card-text">Want to find and learn more about an animal by where
                          it's located?</p>
                          <a href="/~jhu25229/final_project/search/region.php" class="btn btn-primary">Search!</a>
                        </div>
                      </div>
                </div>
                <div class = "col-lg-4">
                    <div class="card">
                        <img src="images/panda2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Discover</h5>
                          <p class="card-text">Don't have an animal/region in mind? See what
                           other users are searching for.</p>
                          <a href="/~jhu25229/final_project/discover.php" class="btn btn-primary">Discover!</a>
                        </div>
                      </div>
                </div>
            </div>
             <!-- End of three boxes-->
            

            
        </div> <!-- end of container -->
      
        
  
  <script src="homepage.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>