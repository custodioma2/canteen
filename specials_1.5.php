<?php
$con = mysqli_connect("localhost", "custodioma2", "olivestone75", "custodioma2_canteen");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
}

if(isset($_GET['specials'])) {
    $id = $_GET['specials'];

} else {
    $id = 1;
}

$monday_query = "SELECT specials.Day, FItem, FCost, DItem, DCost, food.FoodID, drinks.DrinkID
         FROM specials, food, drinks WHERE specials.Day = 'Monday' 
         AND food.FoodID = specials.FoodID 
         AND drinks.DrinkID = specials.DrinkID";
$result_monday = mysqli_query($con, $monday_query);

$tuesday_query = "SELECT specials.Day, FItem, FCost, DItem, DCost, food.FoodID, drinks.DrinkID
         FROM specials, food, drinks WHERE specials.Day = 'Tuesday' 
         AND food.FoodID = specials.FoodID
         AND drinks.DrinkID = specials.DrinkID";
$result_tuesday = mysqli_query($con, $tuesday_query);

$wednesday_query = "SELECT specials.Day, FItem, FCost, DItem, DCost, food.FoodID, drinks.DrinkID
         FROM specials, food, drinks WHERE specials.Day = 'Wednesday' 
         AND food.FoodID = specials.FoodID 
         AND drinks.DrinkID = specials.DrinkID";
$result_wednesday = mysqli_query($con, $wednesday_query);

$thursday_query = "SELECT specials.Day, FItem, FCost, DItem, DCost, food.FoodID, drinks.DrinkID
         FROM specials, food, drinks WHERE specials.Day = 'Thursday' 
         AND food.FoodID = specials.FoodID 
         AND drinks.DrinkID = specials.DrinkID";
$result_thursday = mysqli_query($con, $thursday_query);

$friday_query = "SELECT specials.Day, FItem, FCost, DItem, DCost, food.FoodID, drinks.DrinkID
         FROM specials, food, drinks WHERE specials.Day = 'Friday' 
         AND food.FoodID = specials.FoodID 
         AND drinks.DrinkID = specials.DrinkID";
$result_friday = mysqli_query($con, $friday_query);
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
    <h2>SPECIALS</h2>

    <h3>Select a Day</h3>
    <form name="specials_form" action="specials_1.5.php" method="post">
        <input type='submit' name='Monday' value="Monday"> <br>
        <input type='submit' name='Tuesday' value="Tuesday"> <br>
        <input type='submit' name='Wednesday' value="Wednesday"> <br>
        <input type='submit' name='Thursday' value="Thursday"> <br>
        <input type='submit' name='Friday' value="Friday"> <br>

    </form>

    <table>
        <tr>
            <th>Day</th>
            <th>Food</th>
            <th>Cost</th>
            <th>Drink</th>
            <th>Cost</th>
        </tr>

        <?php
        if (isset($_POST['Monday'])) {
            if (mysqli_num_rows($result_monday) != 0) {
                while ($test = mysqli_fetch_array($result_monday)) {
                    $id = $test['Day'];
                    echo "<tr>";
                    echo "<td>" . $test['Day'] . "</td>";
                    echo "<td>" . $test['FItem'] . "</td>";
                    echo "<td>" . $test['FCost'] . "</td>";
                    echo "<td>" . $test['DItem'] . "</td>";
                    echo "<td>" . $test['DCost'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['Tuesday'])) {
            if (mysqli_num_rows($result_tuesday) != 0) {
                while ($test = mysqli_fetch_array($result_tuesday)) {
                    $id = $test['Day'];
                    echo "<tr>";
                    echo "<td>" . $test['Day'] . "</td>";
                    echo "<td>" . $test['FItem'] . "</td>";
                    echo "<td>" . $test['FCost'] . "</td>";
                    echo "<td>" . $test['DItem'] . "</td>";
                    echo "<td>" . $test['DCost'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['Wednesday'])) {
            if (mysqli_num_rows($result_wednesday) != 0) {
                while ($test = mysqli_fetch_array($result_wednesday)) {
                    $id = $test['Day'];
                    echo "<tr>";
                    echo "<td>" . $test['Day'] . "</td>";
                    echo "<td>" . $test['FItem'] . "</td>";
                    echo "<td>" . $test['FCost'] . "</td>";
                    echo "<td>" . $test['DItem'] . "</td>";
                    echo "<td>" . $test['DCost'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['Thursday'])) {
            if (mysqli_num_rows($result_thursday) != 0) {
                while ($test = mysqli_fetch_array($result_thursday)) {
                    $id = $test['Day'];
                    echo "<tr>";
                    echo "<td>" . $test['Day'] . "</td>";
                    echo "<td>" . $test['FItem'] . "</td>";
                    echo "<td>" . $test['FCost'] . "</td>";
                    echo "<td>" . $test['DItem'] . "</td>";
                    echo "<td>" . $test['DCost'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        if (isset($_POST['Friday'])) {
            if (mysqli_num_rows($result_friday) != 0) {
                while ($test = mysqli_fetch_array($result_friday)) {
                    $id = $test['Day'];
                    echo "<tr>";
                    echo "<td>" . $test['Day'] . "</td>";
                    echo "<td>" . $test['FItem'] . "</td>";
                    echo "<td>" . $test['FCost'] . "</td>";
                    echo "<td>" . $test['DItem'] . "</td>";
                    echo "<td>" . $test['DCost'] . "</td>";
                    echo "</tr>";
                }
            }
        }

        ?>


    </table>

</main>
</body>


</html>