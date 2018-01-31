
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
<nav class="navbar navbar-inverse navbar-fixed-top ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CEB Atelier</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Shop.html">Shop</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="shop.php" class="btn btn-inverse btn-lg">
                        <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
// Echo session variables that were set on previous page

    $var = $_SESSION["list"];
    $wantedItems = array();
    $itemWanted = true;

    if(!empty($_POST["Remove"]) and !empty($var)){
        foreach ($var as $value){
            $itemWanted = true;
            foreach ($_POST['Remove'] as $item){
                if($value[0] == $item){
                    $itemWanted = false;
                }
            }
            if($itemWanted){
                array_push($wantedItems,$value);
            }
        }
            $_SESSION["list"] = $wantedItems;

    }
    else{
        echo "<h1>You have no items to checkout</h1><br>";
    }



?>


<form method="post" action="confirmation.php">
    <div class="container-fluid" id="shopItems">
        <div class="row">
            <div class="col-sm-6 col-centered text-center">
                <h3 style="text-align: center">Shipping information</h3>
                Name: <input type="text" name="name"><br><br>
                Address: <input type="text" name="address"><br><br>
                City: <input type="text" name="city"><br><br>
                State: <input type="text" name="state"><br><br>
                Zip code: <input type="number" name="zip"><br><br>
                <input type="submit" value="Purchase">
            </div>
        </div>
    </div>
</form>

</body>
</html>
