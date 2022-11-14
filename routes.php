<?php
// include "./components/head.php";
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
include $_INNER_PATH . "/controllers/CarsController.php";

$edit = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['save'])) {
		
		CarsController::store();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/index.php");
		die;

		print_r($_POST);
	}
	if (isset($_POST['edit'])) {

		$item = CarsController::show();
		$edit = true;
	}

	if (isset($_POST['update'])) {

		CarsController::update();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/index.php");
		die;
	}

	if (isset($_POST['destroy'])) {
		CarsController::destroy();
		header("Location: http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud/index.php");
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
}

// $params = ItemController::getfilterParams();
//
// IS KART UZEJUS I PUSLAPI IMETA I KATAGORIJA ALL, IR CHEKINAM TAM, KAD PADAVUS KITA KATEGORIJA JOS NEPERMUSTU ALL
//
// if (!isset($_GET['category'])) {
// 	$_GET['category'] = "all";
// }

// //
// // TIKRINAM AR NUSETINTA PRICE, JEI NE, KAD GRAZINTU VISUS ITEM
// //
// if (!isset($_GET['price'])) {
// 	$items = ItemController::index();
// }
// // print_r($_GET);

// //
// // FILTRUOJAM PAGAL KATEGORIJA
// //
// if (isset($_GET['category'])) {
// 	$items = ItemController::showFiltered();
// 	// header('Location: ./index.php');
// 	// die;
// }
// //
// // FILTRUOJAM PAGAL PRICE
// //
// if (isset($_GET['price'])) {

// 	// print_r($items) {
// 	$items = ItemController::showSorted();
// }