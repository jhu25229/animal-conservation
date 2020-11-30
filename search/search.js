function added()
{
    console.log("added");
}

function setInput(name, scienceName, pop)
{
    document.querySelector("#mainName").value = name;
    document.querySelector("#pop").value = pop;
    document.querySelector("#science").value = scienceName;
    
}


function displayResults(response, response2) 
{
    
   
    //convert in JS objects
    let JSresponse = JSON.parse(response);
    
    let JSresponse2 = JSON.parse(response2);

    
    

    //get information for table
    let scientificName = JSresponse.result[0].scientific_name;
    let commonName = JSresponse.result[0].main_common_name;
    let populationTrend = JSresponse.result[0].population_trend
    
    let population = JSresponse2.result[0].population;
    let habitat = JSresponse2.result[0].habitat;
    let threats = JSresponse2.result[0].threats;
    let conservation = JSresponse2.result[0].conservationmeasures;
 
    setInput(commonName, scientificName, populationTrend);

    //display information in table
    document.querySelector("#scientific_name").innerHTML = scientificName;
    document.querySelector("#common_name").innerHTML = commonName;
    document.querySelector("#population_trend").innerHTML = populationTrend;
    document.querySelector("#population").innerHTML = population;
    document.querySelector("#habitat").innerHTML = habitat;
    document.querySelector("#threats").innerHTML = threats;
    document.querySelector("#conservation").innerHTML = conservation;

    document.querySelector(".loading").innerHTML = "";


}

document.querySelector("#speciesSearch").onsubmit = function(event){
    event.preventDefault();

    document.querySelector(".loading").innerHTML = "Loading...";
    document.querySelector(".suggestions").innerHTML = "";

    let token = "bfabc02b7020ff87b6b0fb9c2917d881a2adafbc368f221ca4f74b23b9a7c10d"
    
    //first response
    let searchTerm = document.querySelector("#animal").value.replace(/ /g, "%20" );
    //make api request
    let url = "https://apiv3.iucnredlist.org/api/v3/species/" + searchTerm
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
				
                //displayResults(httpRequest.responseText);
                //console.log(httpRequest.responseText);
			}
            else
            {
				//error
				console.log(httpRequest.status);
			}
		}
    }




    //second response
    //make api request
   let url2 = "https://apiv3.iucnredlist.org/api/v3/species/narrative/" + searchTerm
    + "?token=" + token;

    let httpRequest2 = new XMLHttpRequest();
    httpRequest2.open("GET", url2);
    httpRequest2.send();

    httpRequest2.onreadystatechange = function() 
    {
        if(httpRequest2.readyState == 4) 
        {
            if(httpRequest2.status == 200)
             {
                if(httpRequest.responseText.length < 50)
                {
                    document.querySelector(".loading").innerHTML = "Animal not found, make sure "
                    + "you're searching the scientific name!";
                    document.querySelector(".suggestions").innerHTML ="Here are some animals you can try searching for: " +
                    "Carcharodon carcharias, Ectophylla alba, Priodontes maximus"; 

                }
                else
                {
                    displayResults(httpRequest.responseText, httpRequest2.responseText);
                }
				
			}
            else
            {
				//error
				console.log(httpRequest2.status);
			}
		}
	}

}

