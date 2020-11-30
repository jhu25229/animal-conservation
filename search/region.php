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
    <title>Search by Region</title>
</head>
<body>
    
<?php require '../nav.php'; ?>

     
<div class="container">
    <!-- Start of three boxes-->
    <div class="row" id="searchPageRegion">
        <div class="col-lg-12">
            <h1>Search by Country Name</h1>
            <p class="card-text">Enter a country name below</p>
            <form class="form-inline justify-content-center" id="regionSearch" action ="" method="">
                <div class="input-group">
                    <input id="country"  required="required" class="form-control" type="text" placeholder="ex. United States">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button></span>
                </div>
            </form>
            <p class="mt-2 loading text-danger"><p>
        </div>
    </div>     
    <div class="row">
    <div class="col-lg-4 col-md-12 mx-auto">
            <table class="animalTable" class="table table-striped">
                <tbody id="resultsList1">
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 col-md-12">
            <table class="animalTable" class="table table-striped">
                <tbody id="resultsList2">
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 col-md-12">
            <table class="animalTable" class="table table-striped">
                <tbody id="resultsList3">
                </tbody>
            </table>
        </div>
        
    </div>
        
    

</div> <!-- end of container -->
      
<div class="footer">
             Powered by: IUCN 2020. IUCN Red List of Threatened Species. Version 2020-2
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




document.querySelector("#regionSearch").onsubmit = function(event){
    event.preventDefault();

    document.querySelector(".loading").innerHTML = "Loading...";

    //first response
    let searchTerm = document.querySelector("#country").value.trim();

    ajaxGet("regionBack.php?term=" + searchTerm, function(results){
        //runs after backend results come
        //country not available
        if(results == "[]")
        {
            document.querySelector(".loading").innerHTML = "Country not found, make sure spelling is correct.";
        }
        else
        {
            //call api
            results = JSON.parse(results);
            console.log(results);
            apiCall(results[0].isocode);
        }  
        

    });
}

function apiCall(isocode)
{
    console.log(isocode);
    let token = "bfabc02b7020ff87b6b0fb9c2917d881a2adafbc368f221ca4f74b23b9a7c10d"
    let url = "https://apiv3.iucnredlist.org/api/v3/country/getspecies/" + isocode
    + "?token=" + token;
    
    let httpRequest = new XMLHttpRequest();
    httpRequest.open("GET", url);
    httpRequest.send();

    httpRequest.onreadystatechange = function() 
    {
        if(httpRequest.readyState == 4) 
        {
            if(httpRequest.status == 200)
             {
				displayResults(httpRequest.responseText);
			}
            else
            {
				//error
				console.log(httpRequest.status);
			}
		}
    }

    
}
function displayResults(response)
{
    let results = JSON.parse(response);
    console.log(results);
    

    let resultsList1 = document.querySelector("#resultsList1");
    let resultsList2 = document.querySelector("#resultsList2");
    let resultsList3 = document.querySelector("#resultsList3");
    while( resultsList1.hasChildNodes()) {
			resultsList1.removeChild(resultsList1.lastChild);
        }
        while( resultsList2.hasChildNodes()) {
			resultsList2.removeChild(resultsList2.lastChild);
        }
        while( resultsList3.hasChildNodes()) {
			resultsList3.removeChild(resultsList3.lastChild);
        }

    for(let i=0; i<50; i++)
    {
        let tr = document.createElement("tr");
        tr.classList.add("text-center");
        tr.innerHTML = results.result[i].scientific_name;
        resultsList1.appendChild(tr);
    }
    for(let i=50; i<100; i++)
    {
        let tr = document.createElement("tr");
        tr.classList.add("text-center");
        tr.innerHTML = results.result[i].scientific_name;
        resultsList2.appendChild(tr);
    }
    for(let i=100; i<150; i++)
    {
        let tr = document.createElement("tr");
        tr.classList.add("text-center");
        tr.innerHTML = results.result[i].scientific_name;
        resultsList3.appendChild(tr);
    }
    let countryName = document.querySelector("#country").value;
    let message = "Showing 150 of " + results.count + " total endangered species in " +  countryName;
    document.querySelector(".loading").innerHTML = message;
}






</script>     

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>