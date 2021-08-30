<?php
$con = mysqli_connect("localhost", "custodioma2", "olivestone75", "custodioma2_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

if(isset($_GET['drinks'])){
    $id = $_GET['drinks'];
}else{
    $id = 1;
}

$this_drinks_query = "SELECT Item, Cost, Description, Calories, Stock FROM drinks WHERE DrinkID = '"  . $id  . "'";
$this_drinks_result = mysqli_query($con, $this_drinks_query);
$this_drinks_record = mysqli_fetch_assoc($this_drinks_result);

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
    <div class="topnav">
        <a class="margin2" href="index_1.php">Home</a>
        <a href="food_1.php">Food</a>
        <a href="drinks_1.php">Drinks</a>
        <a href="specials_1.5.php">Specials</a>
    </div>
</header>

<main>
    <h2> DRINKS </h2>

    <h3>Drinks Information</h3>
    <?php

    echo "<p> Item Name: " . $this_drinks_record['Item'] . "<br>";
    echo "<p> Cost: " . $this_drinks_record['Cost'] . "<br>";
    echo "<p> Description: " . $this_drinks_record['Description'] . "<br>";
    echo "<p> Calories: " . $this_drinks_record['Calories'] . "<br>";
    echo "<p> Stock: " . $this_drinks_record['Stock'] . "<br>";

    ?>

    <h3>Select Another Drink</h3>
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

        <input type='submit' name='drinks_button' value='Show me the drinks information'>
    </form>

    <h3>Search A Drink</h3>
    <!--Search Drinks Form-->
    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>

    <?php

    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM drinks WHERE Item LIKE '%$search%'";
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

    <h3>Drink Menu</h3>
    <table>
        <tr>
            <th>Item Name</th>
            <th>Cost</th>
            <th>Calories</th>
            <th>Stock</th>
        </tr>
        <tr>
            <td>Aloe Vera Water</td>
            <td>$2.50</td>
            <td>110</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Apple Juice</td>
            <td>$3.00</td>
            <td>120</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Chocolate Milk</td>
            <td>$2.00</td>
            <td>200</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Chocolate Up & GO</td>
            <td>$2.50</td>
            <td>190</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Orange Juice</td>
            <td>$3.00</td>
            <td>120</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Peach Iced Tea</td>
            <td>$3.50</td>
            <td>100</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Pump Bottled Water</td>
            <td>$4.00</td>
            <td>0</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Raspberry Iced Tea</td>
            <td>$3.50</td>
            <td>100</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Tropical Juice</td>
            <td>$3.00</td>
            <td>120</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Vanilla Up & Go</td>
            <td>$2.50</td>
            <td>190</td>
            <td>2</td>
        </tr>
    </table>

</main>
</body>


</html>