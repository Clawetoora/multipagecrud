<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>

<div class="container">

    <div class="car-card">
        <div class="car-card-img">

            <img src= "<?=$_OUTER_PATH . "/images/$car->image"?>">
        </img>

        </div>
        <div class="car-card-text">
        <h1><?=$car->madeBy?></h1>
        <h3><?=$car->model?></h3>
        <p>Tech. specifications: <?=$car->about?></p>
        <p>The price of the vehicle <?=$car->price?>Eur</p>
        </div>
        <div class="edit-delete">
        <form action="<?=$_OUTER_PATH . '/views/cars/edit.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$car->id?>">
            <button type="submit" name="edit" class="btn-edit">edit</button>
        </form>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$car->id?>">
            <button type="submit" name="destroy" class="btn-delete">delete</button>
        </form>
        </div>

</div>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
