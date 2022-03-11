//Simple Example of functions and variables in JS

function add (first,second)
{
    return first + second;
}

var sum = add(1,2);
alert(sum);
//can also call alert( add(1,2) );

function go(name,age)
{
    if (age > 20)
    {
        return name+'!';
    }
    else
    {
        return name;
    }
}
alert(go("Eric",28));
 
//Note that function will report undefined if there is no return

//Arrays
var myList = ['apples', 'oranges', go("eric",28)]
myList[4] = 10;

//In the developer console, you can look at this with myList
//You can also use myList.pop() to get the last item

//How to do a advanced loop. Note that this is a newer browser thing
var myListb = ['apples', 'oranges','bananas'];
myListb.forEach(function(value,index)
{
    console.log(value,index);
});

//While Loop
var times = 0;
while (times < 10)
{
    console.log('tired it', times);
    times++;
}

//Do While Loop
var timesb = 0;
do
{
    console.log('tired it b', timesb);
    timesb++;
}while(timesb < 10)

//For Loop
for (var i = 0; i < 10; i++)
{
    console.log('I is', i);
}