<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="shop.css">

</head>
<html>
<body>

<?php
// Echo session variables that were set on previous page

$var = $_SESSION["list"];

    echo "<h1 style='text-align: center'>Final sale</h1>";
    if (empty($_POST["name"])) {
        echo "<h3 style='color: red; text-align: center'>name is required</h3><br>";
    }
    else {
        $name = $_POST["name"];
        if (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/", $name)) {
            echo "<h3 style='color: red; text-align: center'>Only letters and white space allowed</h3><br>";
        }
        else{
            echo "<h3 style='text-align: center'>".$name."</h3><br>";
        }
    }

    if (empty($_POST["address"])) {
        echo "<h3 style='color: red; text-align: center'>address is required</h3><br>";
    }
    else {
        $address = $_POST["address"];
        if (preg_match("/^[A-Za-z0-9 ]*$/", $address)) {
            echo "<h3 style='color: red ; text-align: center'>Only letters and numbers are allowed</h3><br>";
        }
        else{
            echo "<h3 style='text-align: center'>".$address."</h3><br>";
        }
    }

    if (empty($_POST["city"])) {
        echo "<h3 style='color: red; text-align: center'>City is require</h3><br>";
    }
    else {
        $city = $_POST["city"];
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            echo "<h3 style='color: red ; text-align: center'>Only letters and white space allowed</h3><br>";
        }
        else{
            echo "<h3 style='text-align: center'>".$city."</h3><br>";
        }
    }

    if (empty($_POST["state"])) {
        echo "<h3 style='color: red; text-align: center'>City is require</h3><br>";
    }
    else {
        $state = $_POST["state"];
        if (!preg_match("/^[a-zA-Z ]*$/", $state)) {
            echo "<h3 style='color: red ; text-align: center'>Only letters and white space allowed</h3><br>";
        }
        else{
            echo "<h3 style='text-align: center'>".$state."</h3><br>";
        }
    }

    if (empty($_POST["zip"])) {
        echo "<h3 style='color: red; text-align: center'>zip is require</h3><br>";
    }
    else {
        echo "<h3 style='text-align: center'>".$zip."</h3><br>";
    }

    foreach ($var as $item){
        echo "<h3 style='text-align: center'>".$item[1]."</h3><br>";
    }


?>


<!--form method="post" action="confirmation.php">
    <div class="container-fluid" id="shopItems">
        <div class="row">
            <div class="col-sm-6 col-centered text-center">
                <h3 style="text-align: center">Shipping information</h3>
                Name: <input type="text" name="name"><br><br>
                E-mail: <input type="email" name="email"><br><br>
                Address: <input type="text" name="address"><br><br>
                City: <input type="text" name="city"><br><br>
                State: <input type="text" name="state"><br><br>
                Zip code: <input type="number" name="zip"><br><br>
                <input type="submit" value="Purchase">
            </div>
        </div>
    </div>
</form-->

</body>
</html>