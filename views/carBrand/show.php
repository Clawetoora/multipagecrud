<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>

<div class="container">

    <div class="car-card">

        <div class="car-card-text">
        <h1>Brand name is <?=$carBrand->brand?></h1>
        <h3>Brand id is <?=$carBrand->id?></h3>
        </div>
        <div class="edit-delete">
        <form action="<?=$_OUTER_PATH . '/views/carBrand/edit.php'?>" method="get">
            <input type="hidden" name="id" value="<?=$carBrand->id?>">
            <button type="submit" name="edit" class="btn-edit">edit</button>
        </form>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$carBrand->id?>">
            <button type="submit" name="destroy" class="btn-delete">delete</button>
        </form>
        </div>

</div>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
