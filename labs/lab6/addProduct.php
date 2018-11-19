<?php
function getCategories()
{
    global $conn;
    include 'dbConnection.php';

    $conn = getDatabaseConnection("heroku_74152a32ba521c4");
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record)
    {
        echo "<option value='".$record["catId"] . "'>" . $record['catName'] . " </option>";
    }
}

if (isset($_GET['submitProduct']))
{
    global $conn;
    
    include 'dbConnection.php';

    $conn = getDatabaseConnection("heroku_74152a32ba521c4");
    
    $productName = $_GET['productName'];
    $productDescription = $_GET['description'];
    $productImage = $_GET['productImage'];
    $productPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    $sql = "INSERT INTO om_product
            ( productName, productDescription, productImage, price, catId)
            VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    $namedParameters = array();
    $namedParameters[':productName'] = $productName;
    $namedParameters[':productDescription'] = $productDescription;
    $namedParameters[':productImage'] = $productImage;
    $namedParameters[':price'] = $productPrice;
    $namedParameters[':catId'] = $catId;
    $statement = $conn->prepare($sql);
    $statement -> execute($namedParameters);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    </head>
    
    <body>
        <div id="main">
            <h1 id="title">OtterMart Admin - Add product</h1>
        <form>
            <strong>Product Name</strong> <input type="text" class="form-control" name="productName"><br>
            <strong>Description</strong><textarea class="form-control" name="description" cols= 50 row=4></textarea><br>
            <strong>Price</strong><input type="text" class="form-control" name="price"><br>
            <strong>Category</strong><select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php getCategories();?>
            </select><br />
            <strong> Set Image Url</strong> <input type="text" name = "productImage" class="form-control"><br>
            <input type="submit" name="submitProduct" class='btn btn-primary' value="Add Product">
        </form>
        </div>
    </body>
</html>