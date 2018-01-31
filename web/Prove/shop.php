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
  <nav class="navbar navbar-inverse navbar-static-top ">
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
          <li><a href="#">CS-313</a></li>
        </ul>
      </div>
    </div>
  </nav>

<?php


$itemDesctiption = array(
        array("10","Gundam nadleeh $12.50",12.50),
        array("2","Gundam Exia $15.66",15.66),
        array("3","Transient Gundam $23.99",23.99),
        array("4","Transient Gundam Glacier $23.99",23.99),
        array("7"," Gundam Vidar 18.50",18.50),
        array("5","Kimaris vidar $23.99",23.99));



    $gundamIdNumberLocation = 0;
    $gundamDescriptionLocation = 1;
    $gundamPriceLocation = 2;
    $totalPriceVar = 0;
    $checkoutArray = array();
    $removedID = "";
    $initialArray = array();


    echo "<form action=\"checkout.php\" method='post'>";
echo "<p>Please use the checkbox to remove items from your shopping cart</p>";
    if(!empty($_SESSION["list"])){
        $structure = $_SESSION["list"];
        if(!empty($_POST['Item']))
        {
            foreach ($_POST['Item'] as $id){
                foreach ($itemDesctiption as $description){
                    if($id == $description[0]){
                        array_push($structure,$description);
                    }
                }
            }
            $_SESSION["list"] = $structure;
            foreach ($structure as $i){
                $name = $i[$gundamIdNumberLocation];
                echo "<input type='checkbox' name=\"Remove[]\" value=\"$name\">".$i[$gundamDescriptionLocation]."<br>";
            }
        }
        else{
            $count = 0;
            foreach ($structure as $item){
                $id = $item[$gundamIdNumberLocation];
                echo "<input type='checkbox' name=\"Remove[]\" value=\"$id\">".$item[$gundamDescriptionLocation]."<br>";
            }
            $_SESSION["list"] = $structure;
        }
    }
    else{
        foreach($_POST['Item'] as $value){
            for($row = 0; $row < 6; $row++){
                if($value == $itemDesctiption[$row][$gundamIdNumberLocation])
                {
                    array_push($initialArray,$itemDesctiption[$row]);
                    $id = $itemDesctiption[$row][$gundamIdNumberLocation];
                    echo "<input type='checkbox' name=\"Remove[]\" value=\"$id\">".$itemDesctiption[$row][$gundamDescriptionLocation]."<br>";
                }
            }
        }
        $_SESSION["list"] = $initialArray;
    }

    echo "<input type='submit'></form>";



?>

</body>
</html>
