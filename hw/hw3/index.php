<?php

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thanksgiving Lib</title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
    </head>
    
    <body>
    <div id="main">  
        <p><h1>Hello Welcome to the Thanksgiving Lib</h1></p>
        <form action="process.php" method="post">
            
            <!-- Goes to pos 1 and 2 -->
            <p>What would be a good adjective?</p>
            <select id="selectAdjective" name="selectAdjective"> 
                <option value=""></option>
                <option value="bitter">bitter</option>
                <option value="nervous">nervous</option>
                <option value="fierce">fierce</option>
                <option value="boring">boring</option>
                <option value="light">light</option>
                <option value="romantic">romantic</option>
            </select> 
            <br><br>
            
            <!-- Type of Bird pos 3 -->
            <p>What would this bird taste like??</p>
            <input type="radio" id="terodactylItem" name="birdType" value="terodactyl">
             <label for="terodactylItem">Terodactyl</label><br>
             
            <input type="radio" id="eagleItem" name="birdType" value="eagle">
             <label for="eagleItem">Eagle</label><br>
             
            <input type="radio" id="turkeyItem" name="birdType" value="turkey">
             <label for="turkeyItem">Turkey</label><br>
            <br><br>
            
            <!-- Rooms in the house pos 4-->
            <p>I like hanging out in this room</p>
            <input type="checkbox" id="bathroom" name="roomInHouse" value ="bathroom">
             <label for="bathroom">Bathroom</label><br>
             
            <input type="checkbox" id="garage" name="roomInHouse" value ="garage">
             <label for="garage">Garage</label><br>
             
            <input type="checkbox" id="kitchen" name="roomInHouse" value ="kitchen">
             <label for="kitchen">Kitchen</label><br>
            <br><br>
            
            <!-- Past tense verb pos 5-->
            <p>Pick a past tense verb</p>
            <input type="radio" id="pushed" name="pastTenseVerb" value="pushed">
             <label for="pushed">Pushed</label><br>
             
            <input type="radio" id="moved" name="pastTenseVerb" value="moved">
             <label for="moved">Moved</label><br>
             
            <input type="radio" id="danced" name="pastTenseVerb" value="danced">
             <label for="danced">Danced</label><br>
            <br><br>
            
            <!-- Verb pos 6-->
            <p>I would like to...</p>
            <select id="verb" name="verb">
                <option value=""></option> 
                <option value="sing">Sing</option>
                <option value="touch">Touch</option>
                <option value="punch">punch</option>
            </select>
            <br><br>
            
            <!-- Relatives name pos 7 -->
            <p>Type your name or a relatives name</p>
            <input type="text" name="relativeName" id="relativeName" size="25" /><br>
            <br><br>
            
            <!-- Noun pos 8 and 12 and 14 -->
            <p>lets pick some...</p>
            <input type="radio" id="cats" name="noun" value="cats">
             <label for="cats">Cats</label><br>
             
            <input type="radio" id="socks" name="noun" value="socks">
             <label for="socks">Socks</label><br>
             
            <input type="radio" id="rocks" name="noun" value="rocks">
             <label for="rocks">Rocks</label><br>
            <br><br>
            
            <!-- a liquid pos 9 -->
            <p>Check a box!</p>
            <input type="checkbox" id="milk" name="liquid" value ="milk">
             <label for="milk">Milk</label><br>
             
            <input type="checkbox" id="paint" name="liquid" value ="paint">
             <label for="paint">Paint</label><br>
             
            <input type="checkbox" id="juice" name="liquid" value ="juice">
             <label for="juice">Juice</label><br>
            <br><br>
            
            
            <!-- Verb ending ing pos 10 and 13-->
            <p>Something that ends with -ing</p>
            <select id="verbing" name="verbing"> 
            <option value=""></option> 
                <option value="running">Running</option>
                <option value="singing">Singing</option>
                <option value="punching">Punching</option>
            </select>
            <br><br>
            
            <!-- parts of body pluarl -->
            <p>I like my...</p>
            <input type="radio" id="arms" name="bodyParts" value="arms">
             <label for="arms">Arms</label><br>
             
            <input type="radio" id="hands" name="bodyParts" value="hands">
             <label for="hands">Hands</label><br>
             
            <input type="radio" id="legs" name="bodyParts" value="legs">
             <label for="legs">Legs</label><br>
            <br><br>
            
            <input type="submit" value="Process" /><br>
        </form>
    </div>   
    </body>
</html>