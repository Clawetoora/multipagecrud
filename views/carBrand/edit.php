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

<form class=" mt-3 login-form"id="forma" action="" method="post"  name="update" >
<div class="login-form form-group">
        <label for="f2">Brand name</label>
        <p class="mt-5">Change <?=$carBrand->brand?> brand to:</p>
        <input type="text"name="made_by" id="f2" class="form-control"  placeholder="input brand name">
    </div>


            <input type="hidden" name="id" value="<?=$carBrand->id?>">

            <button type="submit" name="update" class="btn-save mt-3 mb-3">Išsaugoti</button>
    </form>
</div>

<?php include $_INNER_PATH . "/components/footer.php"?>
<?php
$_SESSION['POST'] = [];
?>