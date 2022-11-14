<?php include "../components/head.php";
include $_INNER_PATH . "/routes.php";

?>
<div class="form-container">

<form class=" mt-3 login-form"id="forma" action="<?=$_OUTER_PATH . "/routes.php"?>" method="post" enctype="multipart/form-data" >
    <div class="login-form form-group">
        <label for="f2">Year</label>
        <input type="number"name="year" id="f2" class="form-control"  placeholder="eg. 2022">
    </div>
    <!-- <div class="form-group">
        <label for="f2">Made by</label>
        <input type="text" name="made_by" id="f2" class="form-control"  placeholder="Company name">
    </div> -->
    <div class="form-group">
        <label for="f2">Model</label>
        <input type="text" name="model" id="f2" class="form-control"  placeholder="Model of a car">
    </div>
    <div class="form-group">

        <label for="f2">Price</label>
        <input type="number"name="price" id="f2" class="form-control"  placeholder="The price of a car">
    </div>

    <div class="form-group">
        <label for="f4">About</label>
        <textarea name="about" cols="40" rows="3" id="f4" class="form-control inputs-design" placeholder="Short text about car" ></textarea>
    </div>
    <select class="form-select" name="carBrand">
         <?php foreach ($carBrands as $key => $bc) {?>
            <option value="<?=$bc->id?>"><?=$bc->brand?></option>
        <?php }?>
    </select>


    <div class="form-group mt-3" name="carBrand">
        <label for="uploadfile">Upload a photo</label>
                <input class="form-control inputs-design" type="file" name="image" value="" />
        </div>

    <?php if ($edit) {?>
        <input type="hidden" name="id" value="<?=$cars->id?>">
        <button type="submit" name="update" class="btn-update mt-3 mb-3">Atnaujinti</button>
        <?php } else {?>
            <button type="submit" name="save" class="btn-save mt-3 mb-3">Išsaugoti</button>
            <?php }?>
        </form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
