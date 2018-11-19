
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    </head>
    
    <body>
        <div id="main">
            <h1 id="title">OtterMart Admin Login</h1>
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username" id="loginCred" /> <br />
            Password: <input type="password" name="password" id="loginCred" /> <br />
            
            <!--<input class="btn btn-primary" type="submit" name="submitForm" value="Login" />-->
            <button type="submit" class="btn btn-outline-secondary" name="submitForm" value="Login">Submit</button>
            
            <?php
            if ($_SESSION['incorrect'])
            {
                echo "<p  class='lead' id = 'error' style='color:red'>";
                echo "<strong>Incorrect Username or Password!</strong></p>";
            }
            ?>
        </form>
        </div>
    </body>
</html>