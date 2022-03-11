//JAVASCRIPT EVENTS

var numOne = document.getElementById("num-one");
var numTwo = document.getElementById("num-two");
var addSum = document.getElementById("add-sum");

//Events
numOne.addEventListener("input", add);
numTwo.addEventListener("input", add);

function add()
{
    var one = parseFloat(numOne.value) || 0;
    var two = parseFloat(numTwo.value) || 0;
    var sum = one + two;
    //console.log(one,two);
    addSum.innerHTML = "Your Sum is: " +sum;
}

//List of Events
// Click, mouseenter, mouseleave, mousedown, mouseup, mousemove, keydown, keyup, blur, focus
// There are tons just like in c#/.net things

/*
numOne.addEventListener("click", function()
{
    console.log("HI");
});
*/