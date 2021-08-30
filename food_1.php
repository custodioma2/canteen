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

$food_az = "SELECT * FROM food ORDER BY Item ASC";
$result_food_az = mysqli_query($con, $food_az);

$food_za = "SELECT * FROM food ORDER BY Item DESC";
$result_food_za = mysqli_query($con, $food_za);

$food_low = "SELECT * FROM food ORDER BY Cost ASC";
$result_food_low = mysqli_query($con, $food_low);

$food_high = "SELECT * FROM food ORDER BY Cost DESC";
$result_food_high = mysqli_query($con, $food_high);
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
    <div class="container2">
        <a href="index_1.php"><img src="WGC_LOGO.png" alt="wgc logo" width="150" height="150"></a>
    </div>
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

        <input class="info_buttons" type='submit' name='food_button' value='Show me the food information'>
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
    <form name="food_menu_form" action="food_1.php" method="post" class="food_menu_form">
        <p class="sort">Sort By:</p> <br>
        <input type='submit' name='food_az' value="A - Z"> <br>
        <input type='submit' name='food_za' value="Z - A"> <br>
        <input type='submit' name='food_low' value="Cost: Low - High"> <br>
        <input type='submit' name='food_high' value="Cost: High - Low"> <br>
    </form>

    <table class="full_menu">
        <tr>
            <th>Item Name</th>
            <th>Cost</th>
            <th>Calories</th>
            <th>Stock</th>
        </tr>

        <?php
        if (isset($_POST['food_az'])) {
            if (mysqli_num_rows($result_food_az) != 0) {
                while ($test = mysqli_fetch_array($result_food_az)) {
                    $id = $test['FoodID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['food_za'])) {
            if (mysqli_num_rows($result_food_za) != 0) {
                while ($test = mysqli_fetch_array($result_food_za)) {
                    $id = $test['FoodID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['food_low'])) {
            if (mysqli_num_rows($result_food_low) != 0) {
                while ($test = mysqli_fetch_array($result_food_low)) {
                    $id = $test['FoodID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['food_high'])) {
            if (mysqli_num_rows($result_food_high) != 0) {
                while ($test = mysqli_fetch_array($result_food_high)) {
                    $id = $test['FoodID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        ?>
    </table>

</main>

</body>

</html>