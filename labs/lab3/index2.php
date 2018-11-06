<?php
    if (empty($_GET['keyword']) && empty($_GET['options']))
    {
        echo "<h1>You didnt enter anything</h1> <br>";
   
        
        $backgroundImage = "img/sea.jpg";

    }
    else if(!empty($_GET['keyword']) && empty($_GET['options']))
    {
        //echo " keyword is not empty but options is <br>";
        
        if (isset($_GET['keyword']))
        {
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
        
    }
    else if(empty($_GET['keyword']) && !empty($_GET['options']))
    {
        //echo " keyword is empty , options is not <br>";
        
        if (isset($_GET['options']))
        {
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['options'], $_GET['layout']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
    }
    else
    {
        //echo " both are not empty <br>";
        
        if (isset($_GET['keyword']))
        {
            include 'api/pixabayAPI.php';
            $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
    }
    
    ?>
    

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    
    <body>
        
        <br /> <br />
        
        <?php
            if(!isset($imageURLs))
            {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            }
            else 
            {
                //Display Carousel Here
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                for($i = 0; $i < 7; $i++)
                {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active'": "";
                    echo "></li>";
                }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 7; $i++)
                    {
                        do 
                        {
                            $randomIndex = rand(0,count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="carousel-item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] .'" >';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <!-- Controls Here -->
            
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
             </a>
        </div>
            
        <?php
            }
        ?>
        <br>
        
        <!-- HTML form goes here! -->
        <form action="index2.php" method="GET">
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/><br>
            <input type="radio" id="horizontal" name="layout" value="horizontal">
                <label for="horizontal">Horizontal</label><br>
            <input type="radio" id="vertical" name="layout" value="vertical">
                <label for="vertical">Vertical</label><br>
            
            
            <br />
            <select name="options">
                <option value=""> Select One </option>
                <option value="ocean"> Ocean </option>
                <option value="mountains">Mountains</option>
                <option value="forest">Forest</option>
                <option value="sky">Sky</option>
            </select>
            <br />
            
            
            
            <input type="submit" value="Submit" />
        </form>
        
        
        
        
        
        <br /> <br />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <br> 
    
    </body>
</html>