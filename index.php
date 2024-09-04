<?php
        if(isset($_POST["submit"])) {

        if(empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["quantityStock"]) || empty($_POST["addition"]) || empty($_POST["remove"])) {

            echo"Please, fill the camps";
        
        } else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
            $quantityStock = filter_input(INPUT_POST, 'quantityStock', FILTER_VALIDATE_INT);
            $addition = filter_input(INPUT_POST, 'addition', FILTER_VALIDATE_INT);
            $remove = filter_input(INPUT_POST, 'remove', FILTER_VALIDATE_INT);

        class Product {
            public $name = null;
            public $price = null;
            public $quantityStock = null;
            public $addition = null;
            public $remove = null;

            function findProduct () {
                if($this->name !== null && $this->price !== null && $this->quantityStock !== null && $this->addition !== null) {
                    echo "Product Data: {$this->name}, $" . number_format($this->price, 2) . ", " . "{$this->quantityStock} unit(s), " . " Total: $" . ($this->price) * ($this->quantityStock) . "<br>";
                    echo "The number of products to be added in the stock: " . $this->addition . "<br>";
                    $quantityAddition = ($this->quantityStock) + ($this->addition);
                    echo "Updated data: {$this->name}, $" . number_format($this->price, 2) . ", " . $quantityAddition . " unit(s)," . " Total: $" .  ($this->price) * ($quantityAddition) .  "<br>";
                    echo "The number of products to be removed in the stock: " . $this->remove . "<br>";
                    echo "Updated data: {$this->name}, $" . number_format($this->price, 2) . ", " . $quantityAddition - ($this->remove) . " unit(s)," . " Total: $" . ($this->price) * ((($quantityAddition) - ($this->remove))) .  "<br>";
                } 

            }

        }

        $product = new Product();
        $product->name = $name; 
        $product->price = $price;
        $product->quantityStock = $quantityStock;
        $product->addition = $addition;
        $product->remove = $remove;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Store</title>
</head>
<body>
    <form action="index.php" method="post">
        <label>Product Name</label><br>
        <input type="text" name="name"><br>
        <label>Product Price</label><br>
        <input type="text" name="price"><br>
        <label>Product Quantity in Stock</label><br>
        <input type="text" name="quantityStock"><br>
        <label>Enter The Number to be added in the stock</label><br>
        <input type="text" name="addition"><br>
        <label>Enter The Number to be removed in the stock</label><br>
        <input type="text" name="remove"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
     echo $product->findProduct();
?>