<?php
include $_INNER_PATH . "./models/CarBrand.php";

class CarsBrandController
{

	public static function index()
	{
		$brands = CarBrand::all();
		return $brands;
	}

	public static function store()
	{
		CarBrand::create();
	}

	public static function show()
	{
		$brand = CarBrand::find($_GET['id']);
		return $brand;
	}

	public static function update()
	{
		$brand = new CarBrand();
		$brand->id = $_POST['id'];
		$brand->madeBy = $_POST['made_by'];

		$brand->update();
	}

	public static function destroy()
	{
		CarBrand::destroy($_POST['id']);
	}

	public static function search()
	{
		$brands = CarBrand::search();
		return $brands;
	}
}
