<?php

include 'inc/functions.php';

?>

<html>
    <head>
        <title>Happy Thanksgiving!</title>
        <meta charset="utf-8" />
        <style>
           @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
    </head>
    
    
    <body>
        
        <div id="main">
        <?php
        
        
        if (checkFilled() =='empty')
        {
            //checkFilled();
            
            
        }
        else 
        {
           echo "<h1>Here is your Thanksgiving lib!</h1><br><br>";
            echo " It was a " . $_POST['selectAdjective'] . ",  cold November day. I woke up to the " . $_POST['selectAdjective'] .  " of " . $_POST['birdType'] . " <br> ";
            echo " roasting in the " . $_POST['roomInHouse'] . " downstairs. I ". $_POST['pastTenseVerb'] . " down the stairs to see if I could help " . $_POST['verb'] . " <br>";
            echo " the dinner. My mom said, “See if " . $_POST['relativeName'] . " needs a fresh " . $_POST['noun'] . ".” So I carried a tray of 
            glasses full of " . $_POST['liquid'] . " into the " . $_POST['verbing'] . " room. When I got there, 
            I couldn’t believe my " . $_POST['bodyParts'] . "! There were " . $_POST['noun'] . " " . $_POST['verbing'] .  " on the "
            . $_POST['noun'] . "! <br>";
        }
        
     
    
        ?>
        
        <div id="selected">
        <p><h3>This is what you selected</h3></p>
        <form action="process.php" method="post">
            
            <!-- Goes to pos 1 and 2 -->
            <p>1) What would be a good adjective?</p>
            <select id="selectAdjective" name="selectAdjective"> 
                <option value=""></option>
                <option value="bitter" <?= (($_POST['selectAdjective']=="bitter")?"selected":"") ?> /> bitter </option>
                <option value="nervous" <?= (($_POST['selectAdjective']=="nervous")?"selected":"") ?> >nervous</option>
                <option value="fierce" <?= (($_POST['selectAdjective']=="fierce")?"selected":"") ?> >fierce</option>
                <option value="boring" <?= (($_POST['selectAdjective']=="boring")?"selected":"") ?> >boring</option>
                <option value="light" <?= (($_POST['selectAdjective']=="light")?"selected":"") ?> >light</option>
                <option value="romantic" <?= (($_POST['selectAdjective']=="romantic")?"selected":"") ?> >romantic</option>
            </select> 
            <br><br>
            
            <!-- Type of Bird pos 3 -->
            <p>2) What would this bird taste like??</p>
            
            <input type="radio" id="terodactylItem" name="birdType" value="terodactyl" <?= (($_POST['birdType']=="terodactyl")?"checked":"") ?> />
             <label for="terodactylItem">Terodactyl</label><br>
             
            <input type="radio" id="eagleItem" name="birdType" value="eagle" <?= (($_POST['birdType']=="eagle")?"checked":"") ?> >
             <label for="eagleItem">Eagle</label><br>
             
            <input type="radio" id="turkeyItem" name="birdType" value="turkey" <?= (($_POST['birdType']=="turkey")?"checked":"") ?> >
             <label for="turkeyItem">Turkey</label><br>
            <br><br>
            
            <!-- Rooms in the house pos 4-->
            <p>3) I like hanging out in this room</p>
            <input type="checkbox" id="bathroom" name="roomInHouse" value ="bathroom" <?= (($_POST['roomInHouse']=="bathroom")?"checked":"") ?> >
             <label for="bathroom">Bathroom</label><br>
             
            <input type="checkbox" id="garage" name="roomInHouse" value ="garage" <?= (($_POST['roomInHouse']=="garage")?"checked":"") ?> >
             <label for="garage">Garage</label><br>
             
            <input type="checkbox" id="kitchen" name="roomInHouse" value ="kitchen" <?= (($_POST['roomInHouse']=="kitchen")?"checked":"") ?> >
             <label for="kitchen">Kitchen</label><br>
            <br><br>
            
            <!-- Past tense verb pos 5-->
            <p>4) Pick a past tense verb</p>
            <input type="radio" id="pushed" name="pastTenseVerb" value="pushed" <?= (($_POST['pastTenseVerb']=="pushed")?"checked":"") ?> >
             <label for="pushed">Pushed</label><br>
             
            <input type="radio" id="moved" name="pastTenseVerb" value="moved" <?= (($_POST['pastTenseVerb']=="moved")?"checked":"") ?> >
             <label for="moved">Moved</label><br>
             
            <input type="radio" id="danced" name="pastTenseVerb" value="danced" <?= (($_POST['pastTenseVerb']=="danced")?"checked":"") ?> >
             <label for="danced">Danced</label><br>
            <br><br>
            
            <!-- Verb pos 6-->
            <p>5) I would like to...</p>
            <select id="verb" name="verb"> 
            <option value=""></option>
                <option value="sing" <?= (($_POST['verb']=="sing")?"selected":"") ?> >Sing</option>
                <option value="touch" <?= (($_POST['verb']=="touch")?"selected":"") ?>  >Touch</option>
                <option value="punch" <?= (($_POST['verb']=="punch")?"selected":"") ?> >punch</option>
            </select>
            <br><br>
            
            <!-- Relatives name pos 7 -->
            
            <p>6) Type your name or a relatives name</p>
            <input type="text" name="relativeName" id="relativeName" size="25" value="<?= $_POST['relativeName'] ?>"/><br>
            <br><br>
            
            <!-- Noun pos 8 and 12 and 14 -->
            <p>7) lets pick some...</p>
            <input type="radio" id="cats" name="noun" value="cats"  <?= (($_POST['noun']=="cats")?"checked":"") ?> >
             <label for="cats">Cats</label><br>
             
            <input type="radio" id="socks" name="noun" value="socks"  <?= (($_POST['noun']=="socks")?"checked":"") ?> >
             <label for="socks">Socks</label><br>
             
            <input type="radio" id="rocks" name="noun" value="rocks"  <?= (($_POST['noun']=="rocks")?"checked":"") ?> >
             <label for="rocks">Rocks</label><br>
            <br><br>
            
            <!-- a liquid pos 9 -->
            <p>8) Check a box!</p>
            <input type="checkbox" id="milk" name="liquid" value ="milk"  <?= (($_POST['liquid']=="milk")?"checked":"") ?> >
             <label for="milk">Milk</label><br>
             
            <input type="checkbox" id="paint" name="liquid" value ="paint" <?= (($_POST['liquid']=="paint")?"checked":"") ?> >
             <label for="paint">Paint</label><br>
             
            <input type="checkbox" id="juice" name="liquid" value ="juice" <?= (($_POST['liquid']=="juice")?"checked":"") ?> >
             <label for="juice">Juice</label><br>
            <br><br>
            
            
            <!-- Verb ending ing pos 10 and 13-->
            <p>9) Something that ends with -ing</p>
            <select id="verbing" name="verbing"> 
            <option value=""></option>
                <option value="running" <?= (($_POST['verbing']=="running")?"selected":"") ?> >Running</option>
                <option value="singing" <?= (($_POST['verbing']=="singing")?"selected":"") ?> >Singing</option>
                <option value="punching" <?= (($_POST['verbing']=="punching")?"selected":"") ?> >Punching</option>
            </select>
            <br><br>
            
            <!-- parts of body pluarl -->
            <p>10) I like my...</p>
            <input type="radio" id="arms" name="bodyParts" value="arms"  <?= (($_POST['bodyParts']=="arms")?"checked":"") ?> >
             <label for="arms">Arms</label><br>
             
            <input type="radio" id="hands" name="bodyParts" value="hands" <?= (($_POST['bodyParts']=="hands")?"checked":"") ?> >
             <label for="hands">Hands</label><br>
             
            <input type="radio" id="legs" name="bodyParts" value="legs" <?= (($_POST['bodyParts']=="legs")?"checked":"") ?> >
             <label for="legs">Legs</label><br>
            <br><br>
            
            <input type="submit" value="Process" /><br>
        </form>
        
        <form action="index.php">
         <input type="submit" value="Restart" /><br>
        </form>
        </div>
    </div>    
    </body>
</html>