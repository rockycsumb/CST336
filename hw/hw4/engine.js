//alert('just testing');

var monkey_01;
var gameTimer;
var noHitMonkey = 0;
var speed = 5;

var numHits = 0;

function init()
{
    monkey_01 = document.getElementById('monkey_01');
    
    gameTimer = setInterval(gameLoop, 50);
    placeMonkey();
}

function placeMonkey()
{
    
    var x = Math.floor(Math.random() * 421); // 0 to 420
    monkey_01.style.left= x + 'px';
    monkey_01.style.top='350px';
}

//$("#winOrLose").hide();

function gameLoop()
{
    var y = parseInt(monkey_01.style.top) - speed;
    //output.innerHTML = y;
    
    
    
    if( y < -100) 
    {
        noHitMonkey++;
        placeMonkey();
        
        if (noHitMonkey == 5)
        {
            
            
             $("#winOrLose").show();
             $("#winOrLose").html("You Lose!");
             clearInterval(gameTimer);
            
            
         
        }
    }
    else 
    {
             monkey_01.style.top = y + 'px';
            // output.innerHTML = output.innerHTML + '* ';
    }
        
        
   
    
}

function hitMonkey()
{
    numHits++;
    speed = speed + 5;
    //output.innerHTML = numHits;
    if(numHits == 5)
    {
        $("#winOrLose").show();
        $("#winOrLose").html("You Win");
        clearInterval(gameTimer);
    }
    placeMonkey();
}