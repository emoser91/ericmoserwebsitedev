var simon = document.getElementById("simon");
var simonPic = document.getElementById("simon-pic");

var bruce = document.getElementById("bruce");
var ben = document.getElementById("ben");


//Just using the "hide" class didnt work for me and i had to use style instead
simon.addEventListener("click", function()
{
    if(simonPic.className == "hide")
    {
        simonPic.className = "";
        simonPic.style = "none;";
    }
    else
    {
        simonPic.className = "hide";
        simonPic.style = "display: none;";
    }
});

// simon.addEventListener("click", picLink);
// bruce.addEventListener("click", picLink);
// ben.addEventListener("click", picLink);

// function picLink() 
// {
//   var allImages = document.querySelectorAll("img");

//   for (var i = 0; i < allImages.length; i++) 
//   {
//     allImages[i].className = "hide";
//   }

//   var picId = this.attributes["data-img"].value;
//   var pic = document.getElementById(picId);
//   if (pic.className === "hide") 
//   {
//     pic.className = "";
//   } 
//   else 
//   {
//     pic.className = "hide";
//   }

// }