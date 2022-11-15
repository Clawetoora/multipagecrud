<?php
include $_INNER_PATH . "./models/Car.php";

class CarsController
{

	public static function index()
	{
		$cars = Car::all();
		return $cars;
	}

	public static function store()
	{
		Car::create();
	}

	public static function show()
	{
		$car = Car::find($_GET['id']);
		return $car;
	}

	public static function update()
	{
		$car = new Car();
		$car->id = $_POST['id'];
		$car->year = $_POST['year'];
		$car->model = $_POST['model'];
		$car->about = $_POST['about'];
		$car->price = $_POST['price'];
		$car->image = $_FILES["image"]["name"];
		$car->madeBy = $_POST['made_by_id'];
		$car->update();
	}

	public static function destroy()
	{
		Car::destroy($_POST['id']);
	}

	// public static function getfilterParams()
	// {
	// 	return Car::getfilterParams();
	// }

	// public static function filter()
	// {
	// 	$cars = Car::filter();
	// 	return $cars;
	// }

	public static function filter()
	{
		$cars = Car::filter();
		return $cars;
	}
	public static function search()
	{
		$cars = Car::search();
		return $cars;
	}
	// public static function showFiltered()
	// {
	// 	$items = Item::filteredItems($_GET['category']);
	// 	return $items;
	// }

	// public static function showSorted()
	// {
	// 	$items = Item::sortedItems($_GET['price']);
	// 	return $items;
	// }
}
