<?php


function play()
        {
        
            for ($index = 1; $index < 4; $index++)
            {
                ${"randomValue" . $index } = rand(0,3);
                displaySymbol(${"randomValue" . $index}, $index);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
        



function displaySymbol($randomValue, $pos)
        {
            /*
              if($randomValue == 0)
            {
                echo '<img src="img/seven.png" alt="seven" title="Seven" width="70" />';
            }
            else if ($randomValue == 1)
            {
                echo '<img src="img/cherry.png" alt="cherry" title="Cherry" width="70" />';
            }
            else
            {
                echo '<img src="img/lemon.png" alt="lemon" title="Lemon" width="70" />';
            }
            */
            
            
            switch ($randomValue)
            {
                case 0:
                    $symbol ="seven";
                    break;
                case 1:
                    $symbol ="cherry";
                    break;
                case 2:
                    $symbol ="lemon";
                    break;
                case 3:
                    $symbol = "grapes";
                    break;
                    
            }
            
            echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) ."' width='70' />";
        }
        
        
        
function displayPoints($randomValue1, $randomValue2, $randomValue3)
        {
            
            
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
            {
                switch ($randomValue1)
                {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            $myAudioFile = "sounds/jackpot_sound.mp3";
                            echo '<EMBED SRC="' . $myAudioFile .'" HIDDEN="TRUE" AUTOSTART="TRUE" />';
                            break;
                    case 1: $totalPoints = 750;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                    case 3: $totalPoints = 900;
                            break;
                }
                
                echo "<h2>You won $totalPoints points! </h2>";
            }
            else
            {
                echo 'Try Again';
            }
            
            echo "</div>";
            
        }

?>