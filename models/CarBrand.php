<?php

include $_INNER_PATH . "./models/DB.php";

class CarBrand
{
	public $id;
	public $brand;

	public function __construct($id = null, $brand = null)
	{
		$this->id = $id;
		$this->brand = $brand;

	}

	public static function all()
	{
		$brands = [];
		$db = new DB();
		$query = "SELECT * FROM `cars_brands`";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$brands[] = new CarBrand($row['id'], $row['made_by']);
		}
		$db->conn->close();
		return $brands;
	}

	public static function create()
	{

		$db = new DB();

		$stmt = $db->conn->prepare("INSERT INTO `cars_brands` (`made_by`) VALUES (?)");
		$stmt->bind_param("s", $_POST['made_by']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();

	}

	public static function find($id)
	{
		$brand = new CarBrand();
		$db = new DB();
		$query = "SELECT * FROM `cars_brands` where `id`=" . $id;
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$brand = new CarBrand($row['id'], $row['made_by']);
		}
		$db->conn->close();
		return $brand;
	}

	public function update()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("UPDATE `cars_brands` SET `made_by`= ?  WHERE `id` = ?");
		$stmt->bind_param("si", $_POST['made_by'], $_POST['id']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();
	}

	public static function destroy()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("DELETE FROM `cars_brands` WHERE `id` = ?");
		$stmt->bind_param("i", $_POST['id']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();
	}

	public static function search()
	{
		$cars = [];
		$db = new DB();
		$query = "SELECT * FROM `cars_brands` WHERE `made_by` LIKE \"%" . $_GET['search'] . "%\"";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$brands[] = new CarBrand($row['id'], $row['made_by']);
		}
		$db->conn->close();
		return $cars;
	}

// }
}
