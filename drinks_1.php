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

$drink_az = "SELECT * FROM drinks ORDER BY Item ASC";
$result_drink_az = mysqli_query($con, $drink_az);

$drink_za = "SELECT * FROM drinks ORDER BY Item DESC";
$result_drink_za = mysqli_query($con, $drink_za);

$drink_low = "SELECT * FROM drinks ORDER BY Cost ASC";
$result_drink_low = mysqli_query($con, $drink_low);

$drink_high = "SELECT * FROM drinks ORDER BY Cost DESC";
$result_drink_high = mysqli_query($con, $drink_high);
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

        <input class="info_buttons" type='submit' name='drinks_button' value='Show me the drinks information'>
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
    <form name="drinks_menu_form" action="drinks_1.php" method="post" class="drinks_menu_form">
        <p class="sort">Sort By:</p> <br>
        <input type='submit' name='drink_az' value="A - Z"> <br>
        <input type='submit' name='drink_za' value="Z - A"> <br>
        <input type='submit' name='drink_low' value="Cost: Low - High"> <br>
        <input type='submit' name='drink_high' value="Cost: High - Low"> <br>
    </form>
    <table class="full_menu">
        <tr>
            <th>Item Name</th>
            <th>Cost</th>
            <th>Calories</th>
            <th>Stock</th>
        </tr>

        <?php
        if (isset($_POST['drink_az'])) {
            if (mysqli_num_rows($result_drink_az) != 0) {
                while ($test = mysqli_fetch_array($result_drink_az)) {
                    $id = $test['DrinkID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['drink_za'])) {
            if (mysqli_num_rows($result_drink_za) !=0) {
                while ($test = mysqli_fetch_array($result_drink_za)) {
                    $id = $test['DrinkID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['drink_low'])) {
            if (mysqli_num_rows($result_drink_low) !=0) {
                while ($test = mysqli_fetch_array($result_drink_low)) {
                    $id = $test['DrinkID'];
                    echo "<tr>";
                    echo "<td>" . $test['Item'] . "</td>";
                    echo "<td>" . $test['Cost'] . "</td>";
                    echo "<td>" . $test['Calories'] . "</td>";
                    echo "<td>" . $test['Stock'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['drink_high'])) {
            if (mysqli_num_rows($result_drink_high) !=0) {
                while ($test = mysqli_fetch_array($result_drink_high)) {
                    $id = $test['DrinkID'];
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