<?php include "./components/head.php";
include $_INNER_PATH . "/routes.php";
?>
      <div class="container d-flex flex-column">

      <?php foreach ($cars as $car) {?>


        <a href="<?=$_OUTER_PATH . '/views/cars/show.php?show=' . "&id=$car->id"?>" class="car mb-3 text-decoration-none">
          <div class="img-container">
            <img src="./images/<?=$car->image?>" alt="" />
          </div>
          <div class="about-container">
          <h1 id="car-title"><?=$car->madeBy?></h1>
            <h3 id="model-year"><?=$car->model?> made in
	<?=$car->year?></h3>
            <p id="about-car">
              <?=$car->about?>
            </p>
            <p id="about-car">
              Price: <?=$car->price?> Eur.
            </p>
          </div>
          <input type="hidden" name="id" value=" <?=$car->id?>">
        </a>


        <?php }?>

        </div>
      </div>
    </div>


<?php include "./components/footer.php"?>

