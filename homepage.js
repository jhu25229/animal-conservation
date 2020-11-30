function changeNews(news){
    //console.log(news);
    var image = document.querySelector('#twoElephants');
    var header = document.querySelector('#newsHeader');
    var info = document.querySelector('#newsInfo');
    var link = document.querySelector('#newsLink');
    if(news.id=="1")
    {
        image.src = "images/elephant.jpg";
        header.innerHTML ="Elephant populations are declining rapidly in Côte d'Ivoire";
        info.innerHTML="Recent years have witnessed a widespread and catastrophic decline in the number of forest elephants in protected areas in Côte d'Ivoire, according to a study published October 14 in the open-access journal PLOS ONE by Sery Gonedelé Bi of Université Félix Houphouët-Boigny d'Abidjan-Cocody, and colleagues.";
        link.href="https://www.sciencedaily.com/releases/2020/10/201014141109.htm";

    }
    else if(news.id=="2")
    {
        image.src = "images/penguin.jpg";
        header.innerHTML = "The Galapagos sees record increase in its endemic penguins and cormorants";
        info.innerHTML = "A report from the Charles Darwin Foundation summarizes the study conducted last month. Census conducted on the two bird species saw Galapagos penguins increase from 1,451 in 2019 to 1,940 in 2020. On the other hand, flightless cormorant numbers rose from 1,914 to 2,220.";
        link.href="https://www.sciencetimes.com/articles/27869/20201025/galapagos-sees-record-increase-endemic-penguins-cormorants.htm"
    }
    else if(news.id=="3")
    {
        image.src = "images/lemur.jpg";
        header.innerHTML="World Lemur Day celebrates Madagascar's incredible and endangered animal";
        info.innerHTML="World Lemur Day takes place on 30 October and the World Lemur Festival is celebrated in the weeks surrounding it, and aims to raise awareness about lemur diversity and their critical conservation needs. Sadly, 98% of lemur species are threatened with extinction, and 31% are categorized as critically endangered, which is the highest threat level.";
        link.href="https://www.lonelyplanet.com/articles/world-lemur-day-2020"
    }
}

function speciesNumber()
{
    
}
