<?php

function checkFilled()
{
 // echo " checking from fileld " . $_POST['selectAdjective'] . "<br>";
    $emptyValues = 'notEmpty';
    $index = 0;
    
  
    $nameValues = array("selectAdjective", "birdType", "roomInHouse", "pastTenseVerb", "verb", "relativeName", "noun", "liquid", "verbing", "bodyParts");
    
    
        foreach($nameValues as $names)
        {
           //echo "value " . $_POST[$names] . " is set <br>";
        
           if(!empty($_POST[$names]))
           {
               
              //echo "value " . $_POST[$names] . " is set <br>";
           }
           else
           {
               $index = array_search($names, array_values($nameValues));
               echo "choice number " . ($index + 1) . " is empty<br>";
               
               
               $emptyValues = 'empty';
           }
        }
        return $emptyValues;
 }


?>