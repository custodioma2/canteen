<?php
$con = mysqli_connect("localhost", "custodioma2", "olivestone75", "custodioma2_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

$all_food_query = "SELECT FoodID, Item FROM food";
$all_food_result = mysqli_query($con, $all_food_query);

$all_drinks_query = "SELECT DrinkID, Item FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);


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
    <h2> HOME </h2>

    <h3> Food Items </h3>
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

    <h3> Drink Items </h3>
    <!--Drinks Form-->
    <form name='drinks_form' id='drinks_form' method = 'get' action ='drinks_1.php'>
        <select id='drinks' name='drinks'>
            <!--options-->
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                echo $all_drinks_record['Item'];
                echo "</option>";
            }

            ?>
        </select>

        <input class="info_buttons" type='submit' name='drinks_button' value='Show me the drinks information'>
    </form>

    <h3> Weekly Specials</h3>
    <!--Specials Link-->
    <text>To view our weekly specials <a href="specials_1.5.php">CLICK HERE</a></text>

</main>

</body>


</html>