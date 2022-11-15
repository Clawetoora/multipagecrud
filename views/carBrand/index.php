<?php
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include $_INNER_PATH . "/components/head.php";
include $_INNER_PATH . "/routes.php";
?>
      <div class="container d-flex flex-wrap flex-column">

      <?php foreach ($carBrands as $brand) {?>


        <a href="<?=$_OUTER_PATH . '/views/carBrand/show.php?show=' . "&id=$brand->id"?>" class="car mb-3 text-decoration-none">

          <div class="about-container">
          <h1 id="car-title">Brand name: <?=$brand->brand?></h1>
            <h3 id="model-year">Brand id: <?=$brand->id?></h3>

          </div>
          <input type="hidden" name="id" value=" <?=$brand->id?>">
        </a>


        <?php }?>

        </div>
      </div>
    </div>


<?php include $_INNER_PATH . "/components/footer.php"?>

