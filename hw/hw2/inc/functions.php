<?php

function play()
{
    $userChoice = userChoices();
    $compChoice = computerChoice();
    displayChoices($userChoice, $compChoice);
    $whoWon = determineWinner($userChoice, $compChoice);
    message($whoWon);
    
}

function defaultPage()
{
    userChoices();
    //echo "<h3 id='compChoice'>Computer</h3><br>";
    echo "<h3 id='showUserChoice'>You Chose:</h3>";
    echo "<h3 id='showCompChoice'>Kanondorf Chose:</h3>";
    echo "<img id='smallganondorfface' src='img/smallganondorfface.png' />";
    
}

function userChoices()
{
    $objectChoice = array("rock", "map", "sword");
    $imageFiles = array("smallrock.png", "smallmap.png", "smallsword.png");
    
    
    
    echo "<h3 id='userSelect'>Select An Attack</h3> <br>";
    echo "<h3 id='enemyTitle'>Enemy</h3> <br>";
    echo "<img id='smallganondorfface' src='img/smallganondorfface.png' />";
    //echo "<h3 id='compChoice'>Computer</h3><br>";
    echo '<form action="index2.php" method="POST">';


    for ($index = 0; $index < count($objectChoice); $index++)
    {
        echo "<button id='userButtons$index' type='submit' name='choice' value ='$objectChoice[$index]'><img src='img/$imageFiles[$index]' ></button><br>";
    }
    
    echo '</form>';
    
    $userChoice = $_POST['choice'];
    
    //FOR TESTING
    //echo 'from userChoices '.$userChoice.' <br>';

    return $userChoice;
}


function computerChoice()
{
    $compChoice = rand(0,2);
    
    switch($compChoice)
    {
        case 0:
            $compChoice = "rock";
            break;
        case 1:
            $compChoice = "map";
            break;
        case 2:
            $compChoice = "sword";
            break;
    }
    return $compChoice;
}

function determineWinner($userChoice, $compChoice)
{
    $userWins = true;
    $tie = false;
    $compWins = false;

    //echo '<h2>user choose '. $userChoice .'  from determine</h2> <br>';
    //echo '<h2>Kanondorf chose ' .$compChoice .' from determine </h2> <br>';
    
    if($userChoice == $compChoice)
    {
        echo "<h2 id='result'>Its a Tie!</h2>";
        $tie = true;
        return 'tie';
    }
    else if($userChoice == "rock" && $compChoice == "sword")
    {
        echo"<h2 id='result'>You Win!</h2>";
    }
    else if($userChoice == "map" && $compChoice == "rock")
    {
        echo"<h2 id='result'>You Win!</h2>";
    }
    else if($userChoice == "sword" && $compChoice == "map")
    {
        echo"<h2 id='result'>You Win!</h2>";
    }
    else
    {
        echo"<h2 id='result'>You Lose!</h2>";
        $compWins = true;
        $userWins = false;
    }
    
    if ($userWins && !$tie)
    {
        //echo 'the user won';
        return 'userWins';
        
    }
    else if (!$tie)
    {
        //echo 'the user lost';
        return 'compWins';
    }
}

function message($whoWon)
{
    $userWonBlurp = array("Good Attack!", "Hit Successful!", "Enemy Defeated!");
    $userLostBlurp = array("Ouchh! That Hurt", "Losing Strength", "Help Me!");
    
    sort($userWonBlurp);
    rsort($userLostBlurp);
    
    //Testing Array Sort functions
    /**
    for ($index = 0; $index < count($userWonBlurp);$index++)
    {
        echo "<h3 id='test'>$userWonBlurp[$index]</h3><br>";
    }
    **/
    
    if($whoWon == "userWins" && $whoWon != "tie")
    {
        $randChoice = rand(0,2);
        echo "<h2 id='blurp'>$userWonBlurp[$randChoice]</h2>";
    }
    else if ($whoWon != "tie")
    {
        $randChoice = rand(0,2);
        echo "<h2 id='blurp'>$userLostBlurp[$randChoice]</h2>";
    }
    
}

function displayChoices($userChoice, $compChoice)
{
    $imageFileAssoc = array("rock"=>"bigrock.png", "map"=>"bigmap.png", "sword"=>"bigsword.png");
    
    
    
    echo "<h3 id='showUserChoice'>You Chose:</h3><br> <img id='imageShowUserChoice' src=img/$imageFileAssoc[$userChoice] /><br>";
    echo "<h3 id='showCompChoice'>Kanondorf Chose:</h3><br><img id='imageShowCompChoice' src=img/$imageFileAssoc[$compChoice] /><br>";
}



?>
