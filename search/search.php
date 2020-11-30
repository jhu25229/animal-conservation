<?php include '../config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Search Page</title>
</head>
<body>
    
<?php require '../nav.php'; ?>

     
<div class="container">
    <!-- Start of three boxes-->
    <div class="row" id="searchPageSpecies">
        <div class="col-lg-12">
            <h1>Search by Species Name</h1>
            <p class="card-text">Enter the scientific name of the animal below</p>
            <form class="form-inline justify-content-center" id="speciesSearch" action ="">
                <div class="input-group">
                    <input id="animal"  required="required" class="form-control" type="text" placeholder="ex. Panthera Tigris">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button></span>
                </div>
            </form>
            <p class="mt-2 loading text-danger"><p>
            <p class="suggestions"></p>
        </div>
    </div>     
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <table id="infoTable" class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Scientific Name:</th>
                        <td id="scientific_name">Panthera Tigris</td>
                    </tr>
                    <tr>
                        <th scope="row">Common Name:</th>
                        <td id="common_name">Tiger</td>
                    </tr>
                    <tr>
                        <th scope="row">Population Trend:</th>
                        <td id="population_trend">Decreasing</td>
                    </tr>
                    
                </tbody>
                
            </table>
        </div>
        <div class="col-lg-6 col-md-6 text-center" id="favorite">
            <p class="pt-4">Enjoyed learning about this animal? Add it to your favorites!</p>
            <form action="added.php" method="POST">
                <input id="mainName" type="hidden" value="Tiger" name="mainName">
                <input id="pop" type="hidden" value="Decreasing" name="pop">
                <input id="science" type="hidden" value="Panthera Tigris" name="scienceName">
                <button class="btn btn-primary" type="submit"><i class="fas fa-paw"></i></button>
            </form>
        </div>
</div>
    <div class="row">
        <table id="infoTable2" class="table table-striped">
            <tbody>
            <tbody>
                <tr>
                    <th scope="row">Population:</th>
                    <td id="population">The thirteen Tiger Range Countries came together in an unprecedented pledge to double the world’s Tiger population by 2022, the next Year of the Tiger on the Asian lunar calendar, with a goal of achieving at least 6,000 Tigers. This figure was based on a baseline global population of 3,200, agreed upon at a preparatory workshop held in Kathmandu, Nepal in October 2009; 3,200 Tigers was the IUCN Red List population estimate at that time. Since then, Tiger Range Countries have adjusted their baseline national Tiger estimates, finalized in the Global Tiger Recovery Program adopted at the International Tiger Forum in St Petersburg, Russia in November 2010 (GTRP 2010).</td>
                </tr>
                
                <tr>
                    <th scope="row">Habitat:</th>
                    <td id="habitat">Tigers are found mainly in the forests of tropical Asia, although they historically occurred more widely in drier and colder climes. One subspecies, the Amur Tiger P. t. altaica, persists in the Russian Far East. Photos of Tigers up to 4,500 m have been obtained in Bhutan (Wang 2008).</td>
                </tr>
                <tr>
                    <th scope="row">Threats:</th>
                    <td id="threats">Poaching for illegal trade in high-value Tiger products including skins, bones, meat and tonics is a primary threat to Tigers, which has led to their recent disappearance from broad areas of otherwise suitable habitat, and continues at unsustainable rates. That there are roughly one million square kilometres of unoccupied Tiger habitat is a clear indication that poaching is the greatest threat to Tigers range-wide.</td>
                </tr>
                <tr>
                    <th scope="row">Conservation Measures:</th>
                    <td id="conservation">At a “Tiger Summit” held in St Petersburg, Russia in November 2010, the 13 Tiger Range Countries adopted a Global Tiger Recovery Program (GTRP 2010). The goal is to effectively double the number of wild Tigers by 2022 through actions to: 
                    i) effectively preserve, manage, enhance and protect Tiger habitats; 
                    ii) eradicate poaching, smuggling and illegal trade of Tigers, their parts and derivatives; 
                    iii) cooperate in transboundary landscape management and in combating illegal trade; 
                    iv) engage with indigenous and local communities; 
                    v) increase the effectiveness of Tiger and habitat management; and 
                    vi) restore Tigers to their former range. 
                    </td>
                </tr>
            </tbody>
            </tbody>
        </table>
    </div>
        
    

</div> <!-- end of container -->
      
<div class="footer">
             Powered by: IUCN 2020. IUCN Red List of Threatened Species. Version 2020-2
    </div>      
        

        



  <script src="search.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>