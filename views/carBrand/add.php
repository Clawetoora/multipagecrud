<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include "$_INNER_PATH/components/head.php";
include $_INNER_PATH . "/routes.php";

?>
<div class="form-container">

<form class=" mt-3 login-form"id="forma" action="" method="post">
    <div class="login-form form-group">
        <label for="f2">Brand name</label>
        <input type="text"name="made_by" id="f2" class="form-control"  placeholder="input new brand name">
    </div>


    <?php if ($edit) {?>
        <input type="hidden" name="id" value="<?=$brand->id?>">
        <button type="submit" name="update" class="btn-update mt-3 mb-3">Atnaujinti</button>
        <?php } else {?>
            <button type="submit" name="save" class="btn-save mt-3 mb-3">Išsaugoti</button>
            <?php }?>
        </form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
