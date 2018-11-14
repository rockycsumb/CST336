<?php
include 'dbConnection.php';

$conn = getDatabaseConnection("heroku_74152a32ba521c4");


function displayCategories()
{
    global $conn;
    
    $sql = "SELECT catID, catName from om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record)
    {
        echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
    }
}

function displaySearchResults()
{
    
    
    global $conn;
    if (isset($_GET['searchForm']))
    {
        echo "<h3>Products Found: </h3>";
       
        $namedParameters = array();
        
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if (!empty($_GET['product']))
        {
            $sql .= " AND productName LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
        }
        
        
        
        if (!empty($_GET['product']))
        {
            //echo $_GET['product'] . "<br> from product text search";
            
            $sql .= " OR productDescription LIKE :productDescription";
            $namedParameters[":productDescription"] = "%" . $_GET['product'] . "%";
        }
        
        
        
        if (!empty($_GET['category']))
        {
            $sql .= " AND catId LIKE :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        
        if (!empty($_GET['priceFrom']))
        {
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        
        if (!empty($_GET['priceTo']))
        {
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if (isset($_GET['orderBy']))
        {
            if($_GET['orderBy'] == "price")
            {
                $sql .= " ORDER BY price";
            }
            else
            {
                $sql .= " ORDER BY productName";
            }
            
        }
        
        
        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach($records as $record)
        {
            echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> Histroy </a>";
            
            echo $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br/> <br />";
        }
        
    }
    else
    {
        //echo'notset';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ottermart Product Search</title>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        
    </head>
    
    <body>
        
        <div id="main">
             <h1> Ottermart Product Search </h1>
             <div id="formObjects">
             <form>
                 Product: <input type="text" name="product" />
                 
                 <br />
                 Category: 
                 <select name="Category">
                     <option value="">Select One</option>
                     <?=displayCategories()?>
                 </select>
                 
                 <br>
                 Price: From <input type="text" name="priceFrom" size="7">
                         To <input type="text" name="priceTo" size="7">
                 <br />
                 <div id="orderBy">
                 Order result by: 
                 <br />
                 <input type="radio" name="orderBy" value="price" />Price <br>
                 <input type="radio" name="orderBy" value="name" />Name <br>
                 </div>
                 <br />
                 <input type="submit" value="Search" name="searchForm" />
                 <br />
             </form>
             </div>
             
             <br>
             
        
        </div>
        
        <hr>
        <div id="showResults">
        <?= displaySearchResults() ?>
        </div>
    </body>
</html>