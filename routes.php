<?php
// include "./components/head.php";
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include $_INNER_PATH . "/controllers/CarsController.php";
include $_INNER_PATH . "/controllers/CarsBrandController.php";
include $_INNER_PATH . "/controllers/UserController.php";

$edit = false;

// print_r($_SERVER['REQUEST_URI']);
if (isset($_POST['usercreate']) && isset($_POST['passcreate'])) {
	UserController::createtUser();
	header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/login.php");
}

$cars = CarsController::index();
$carBrands = CarsBrandController::index();
if (isset($_GET['search'])) {
	$cars = CarsController::search();
}

if (isset($_GET['filter']) || isset($_GET['from']) || isset($_GET['to']) || isset($_GET['sort'])) {
	$cars = CarsController::filter();
}

if (strpos($_SERVER['REQUEST_URI'], "/cars/") !== false) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['save'])) {
			print_r($_POST['save']);
			CarsController::store();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/cars/index.php");
			die;

			print_r($_POST);
		}
		if (isset($_POST['edit'])) {

			$item = CarsController::show();
			$edit = true;
		}

		if (isset($_POST['update'])) {

			CarsController::update();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/cars/index.php");
			die;
		}

		if (isset($_POST['destroy'])) {
			CarsController::destroy();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/cars/index.php");
			die;
		}

	}
	if ($_SERVER['REQUEST_METHOD'] == "GET") {

		// 	$items = CarsController::filter();
		// }

		if (isset($_GET['edit'])) {
			$car = CarsController::show($_GET['id']);
		}
		// if (isset($_GET['search'])) {
		// 	$items = CarsController::search();

		if (count($_GET) == 0) {
			$cars = CarsController::index();
		}

		if (isset($_GET['show'])) {
			$car = CarsController::show($_GET['id']);
		}
		if (isset($_GET['search'])) {
			$cars = CarsController::search();

		}

		$carBrands = CarsBrandController::index();
		// print_r($carBrands);
	}
}

if (strpos($_SERVER['REQUEST_URI'], "/carBrand/") !== false) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['save'])) {
			print_r($_POST);
			CarsBrandController::store();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/carBrand/index.php");
			die;

			print_r($_POST);
		}
		if (isset($_POST['edit'])) {

			$brand = CarsBrandController::show();
			$edit = true;
		}

		if (isset($_POST['update'])) {

			CarsBrandController::update();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/carBrand/index.php");
			die;
		}

		if (isset($_POST['destroy'])) {
			CarsBrandController::destroy();
			header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/views/carBrand/index.php");
			die;
		}

	}
	if ($_SERVER['REQUEST_METHOD'] == "GET") {

		// 	$items = CarsController::filter();
		// }

		if (isset($_GET['edit'])) {
			$carBrand = CarsBrandController::show($_GET['id']);
		}
		// if (isset($_GET['search'])) {
		// 	$items = CarsController::search();

		if (count($_GET) == 0) {
			$carBrands = CarsBrandController::index();
		}

		if (isset($_GET['show'])) {
			// print_r($_GET);
			$carBrand = CarsBrandController::show($_GET['id']);
		}
		if (isset($_GET['search'])) {
			$carBrands = CarsBrandController::search();

		}

		$carBrands = CarsBrandController::index();
		// print_r($carBrands);
	}
}
