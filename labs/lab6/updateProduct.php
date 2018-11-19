<?php




if (isset($_GET['productId']))
{
    $product = getProductInfo();
}

function getProductInfo()
{
    global $connection;
    include 'dbConnection.php';
    
    $connection = getDatabaseConnection();
    
    $sql = "SELECT * FROM om_product WHERE productId = ". $_GET['productId'];
    $statement = $connection->prepare($sql);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $record;
}

function getCategories($catId)
{
    ///global $connection;
    //include 'dbConnection.php';

    $connection = getDatabaseConnection();
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record)
    {
        echo "<option ";
        echo ($record["catId"] == $catId)? "selected": "";
        echo " value='".$record["catId"] . "'>" . $record['catName'] . " </option>";
    }
}

iF(isset($_GET['updateProduct']))
{
    //global $connection;
    //include 'dbConnection.php';
    //$connection = getDatabaseConnection();
     
    $sql = "UPDATE om_product
            SET productName = :productName,
                productDescription = :productDescription,
                productImage = :productImage,
                price = :price,
                catId = :catId
            WHERE productId = :productId";
    $np = array();
    $np[":productName"] = $_GET['productName'];
    $np[":productDescription"] = $_GET['description'];
    $np[":productImage"] = $_GET['productImage'];
    $np[":price"] = $_GET['price'];
    $np[":catId"] = $_GET['catId'];
    $np[":productId"] = $_GET['productId'];
    
    $statement = $connection->prepare($sql);
    $statement->execute($np);
    echo "<h3 id='productUpdate'>Product as been updated</h3><br>";
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
            <h1 id="title">OtterMart Admin - Update Product</h1>
        <form>
            <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
            <strong>Product Name</strong> <input type="text" class="form-control" value = "<?=$product['productName']?>" name="productName"><br>
            <strong>Description</strong><textarea class="form-control" name="description" cols= 50 row=4><?=$product['productDescription']?></textarea><br>
            <strong>Price</strong><input type="text" class="form-control" name="price" value = "<?=$product['price']?>"><br>
            
            <strong>Category</strong><select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php getCategories($product['catId']);?>
            </select><br />
            <strong> Set Image Url</strong> <input type="text" name = "productImage" class="form-control" value = "<?=$product['productImage']?>"><br>
            <!--<input type="submit" name="updateProduct" class='btn btn-primary' value="Update Product">-->
            <button type="submit" name="updateProduct" class='btn btn-outline-secondary' value="Update Product">Update Product</button>
            
        </form>
        </div>
    </body>
</html>