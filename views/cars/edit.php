<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

$old = false;
if (isset($_SESSION['POST'])) {
	if (count($_SESSION['POST']) != 0) {
		$old = true;
	}
}
?>
<div class="form-container">

<form class=" mt-3 login-form"id="forma" action="" method="post"  name="update" enctype="multipart/form-data" >
    <div class="login-form form-group">
        <label for="f2">Year</label>
        <input type="number"name="year" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['model'] : $car->year?>" placeholder="eg. 2022">
    </div>
    <!-- <div class="form-group">
        <label for="f2">Made by</label>
        <input type="text" name="made_by" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['made_by'] : $car->madeBy?>" placeholder="Company name">
    </div> -->
    <div class="form-group">
        <label for="f2">Model</label>
        <input type="text" name="model" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['model'] : $car->model?>" placeholder="Model of a car">
    </div>
    <div class="form-group">

        <label for="f2">Price</label>
        <input type="number"name="price" id="f2" class="form-control" value="<?=($old) ? $_SESSION['POST']['price'] : $car->price?>" placeholder="The price of a car">
    </div>

    <div class="form-group">
        <label for="f4">About</label>
        <textarea name="about" cols="40" rows="3" id="f4" class="form-control inputs-design" placeholder="Short text about car" ><?=($old) ? $_SESSION['POST']['about'] : $car->about?></textarea>
    </div>
    <select class="form-select" name="carBrand">
         <?php foreach ($carBrands as $key => $bc) {?>
            <option value="<?=$bc->id?>"><?=$bc->brand?></option>
        <?php }?>
    </select>
    <div class="form-group mt-3">
        <label for="uploadfile">Upload a photo</label>
                <input class="form-control inputs-design" type="file" name="image" value="" />
        </div>


            <input type="hidden" name="id" value="<?=$car->id?>">

            <button type="submit" name="update" class="btn-save mt-3 mb-3">Išsaugoti</button>
        </form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
<?php
$_SESSION['POST'] = [];
?>