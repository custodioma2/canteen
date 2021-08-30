<?php
$con = mysqli_connect("localhost", "custodioma2", "olivestone75", "custodioma2_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

if(isset($_GET['food'])){
    $id = $_GET['food'];
}else{
    $id = 1;
}

$this_food_query = "SELECT Item, Cost, Description, Calories, Stock FROM food WHERE FoodID = '"  . $id  . "'";
$this_food_result = mysqli_query($con, $this_food_query);
$this_food_record = mysqli_fetch_assoc($this_food_result);

$all_food_query = "SELECT FoodID, Item FROM food";
$all_food_result = mysqli_query($con, $all_food_query);

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>WGC CANTEEN</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style_1.css'>
</head>

<body>

<header>
    <h1>WGC CANTEEN</h1>
    <div class="topnav">
        <a class="margin2" href="index_1.php">Home</a>
        <a href="food_1.php">Food</a>
        <a href="drinks_1.php">Drinks</a>
        <a href="specials_1.5.php">Specials</a>
    </div>
</header>

<main>
    <h2> FOOD </h2>

    <h3>Food Information</h3>
    <?php

        echo "<p> Item Name: " . $this_food_record['Item'] . "<br>";
        echo "<p> Cost: " . $this_food_record['Cost'] . "<br>";
        echo "<p> Description: " . $this_food_record['Description'] . "<br>";
        echo "<p> Calories: " . $this_food_record['Calories'] . "<br>";
        echo "<p> Stock: " . $this_food_record['Stock'] . "<br>";

    ?>

    <h3>Select Another Food</h3>
    <!--Food Form-->
    <form name='food_form' id='food_form' method = 'get' action ='food_1.php'>
        <select id='food' name='food'>
            <!--options-->
            <?php
            while($all_food_record = mysqli_fetch_assoc($all_food_result)){
                echo "<option value = '". $all_food_record['FoodID'] . "'>";
                echo $all_food_record['Item'];
                echo "</option>";
            }

            ?>
        </select>

        <input type='submit' name='food_button' value='Show me the food information'>
    </form>

    <h3>Search A Food</h3>
    <!--Search Food Form-->
    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>

    <?php

    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM food WHERE Item LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "There were no search results.";

        }else{

            while($row = mysqli_fetch_array($query)) {

                echo $row ['Item'];
                echo "<br>";
            }
        }
    }
    ?>

    <h3>Food Menu</h3>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Cost</th>
            <th>Calories</th>
            <th>Stock</th>
        </tr>
        <tr>
            <td>Beef Noodles</td>
            <td>$4.00</td>
            <td>300</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Blueberry Muffin</td>
            <td>$2.50</td>
            <td>550</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Brownie</td>
            <td>$2.50</td>
            <td>250</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Cinnamon Roll</td>
            <td>$3.00</td>
            <td>550</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Chicken Noodles</td>
            <td>$4.00</td>
            <td>300</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Chicken Sandwich</td>
            <td>$2.50</td>
            <td>500</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Chocolate Muffin</td>
            <td>$2.50</td>
            <td>550</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Cookie Caramel</td>
            <td>$2.50</td>
            <td>250</td>
            <td>4</td>
        </tr>
        <tr>
            <td>Garlic Bread</td>
            <td>$2.50</td>
            <td>300</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Hot Chips</td>
            <td>$4.00</td>
            <td>360</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Hot Dog</td>
            <td>$3.00</td>
            <td>150</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Mince Pie</td>
            <td>$4.00</td>
            <td>450</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Nachos</td>
            <td>$4.00</td>
            <td>350</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Pasta Salad</td>
            <td>$3.00</td>
            <td>280</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Pepperoni Pizza</td>
            <td>$4.50</td>
            <td>400</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Uncle Ben's Rice Medley</td>
            <td>$4.00</td>
            <td>360</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Veggie Pie</td>
            <td>$4.00</td>
            <td>450</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Vegetarian Pizza</td>
            <td>$4.50</td>
            <td>300</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Veggie Noodles</td>
            <td>$4.00</td>
            <td>300</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Veggie Sandwich</td>
            <td>$2.50</td>
            <td>450</td>
            <td>1</td>
        </tr>

    </table>

</main>

</body>

</html>