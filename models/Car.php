<?php

// include $_INNER_PATH . "./models/DB.php";

class Car
{
	public $id;
	public $year;
	public $model;
	public $about;
	public $price;
	public $image;
	public $madeById;
	public $madeBy;

	public function __construct($id = null, $year = null, $model = null, $about = null, $price = null, $image = null, $madeById = null, $madeBy = null)
	{
		$this->id = $id;
		$this->year = $year;
		$this->model = $model;
		$this->about = $about;
		$this->price = $price;
		$this->image = $image;
		$this->madeById = $madeById;
		$this->madeBy = $madeBy;
	}

	public static function all()
	{
		$cars = [];
		$db = new DB();
		$query = "SELECT `c`.`id` , `c`.`year`, `c`.`model`, `c`.`about`, `c`.`price`, `c`.`image`, `c`.`made_by_id`, `cb`.`made_by`   FROM `cars` `c` join `cars_brands` `cb` ON `cb` . `id` = `c` . `made_by_id`;";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$cars[] = new Car($row['id'], $row['year'], $row['model'], $row['about'], $row['price'], $row['image'], $row['made_by_id'], $row['made_by']);
		}
		$db->conn->close();
		// print_r($cars);
		return $cars;
	}

	public static function create()
	{

		// if (($_POST['category'] == "Virtuvė") || ($_POST['category'] == 'Miegamasis') || ($_POST['category'] == "Tualetas") || ($_POST['category'] == "Svetainė")) {
		// print_r($_FILES);die;
		$db = new DB();
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = "./images/" . $filename;
		$stmt = $db->conn->prepare("INSERT INTO `cars`( `year`, `model`, `about`,`price`, `image`, `made_by_id`) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param("issisi", $_POST['year'], $_POST['model'], $_POST['about'], $_POST['price'], $filename, $_POST['carBrand']);
		$stmt->execute();

		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->close();
		$db->conn->close();
		// }
	}

	public static function find($id)
	{
		$car = new Car();
		$db = new DB();
		$query = "SELECT `c`.`id` , `c`.`year`, `c`.`model`, `c`.`about`, `c`.`price`, `c`.`image`, `c`.`made_by_id`, `cb`.`made_by` FROM `cars` `c` join `cars_brands` `cb` ON `cb` . `id` = `c` . `made_by_id` where `c`.`id`=" . $id;
		$result = $db->conn->query($query);
		// print_r($_GET);
		while ($row = $result->fetch_assoc()) {
			$car = new Car($row['id'], $row['year'], $row['model'], $row['about'], $row['price'], $row['image'], $row['made_by_id'], $row['made_by']);
		}
		$db->conn->close();
		return $car;
	}

	public function update()
	{
		$filename = $_FILES["image"]["name"];
		$tempname = $_FILES["image"]["tmp_name"];
		$folder = "./images/" . $filename;
		$db = new DB();
		$stmt = $db->conn->prepare("UPDATE `cars` SET `year`= ? ,`model`= ? ,`about`= ? , `price`= ?, `image`= ? , `made_by_id` = ? WHERE `id` = ?");
		$stmt->bind_param("issisii", $_POST['year'], $_POST['model'], $_POST['about'], $_POST['price'], $filename, $_POST['carBrand'], $_POST['id']);
		$stmt->execute();
		if (move_uploaded_file($tempname, $folder)) {
			echo "<h3>  Image uploaded successfully!</h3>";
		} else {
			echo "<h3>  Failed to upload image!</h3>";
		}
		$stmt->close();
		$db->conn->close();
	}

	public static function destroy()
	{
		$db = new DB();
		$stmt = $db->conn->prepare("DELETE FROM `cars` WHERE `id` = ?");
		$stmt->bind_param("i", $_POST['id']);
		$stmt->execute();

		$stmt->close();
		$db->conn->close();
	}

	public static function search()
	{
		$cars = [];
		$db = new DB();
		$query = "SELECT `c`.`id` , `c`.`year`, `c`.`model`, `c`.`about`, `c`.`price`, `c`.`image`, `c`.`made_by_id`, `cb`.`made_by` FROM `cars` `c` join `cars_brands` `cb` ON `cb` . `id` = `c` . `made_by_id` where `made_by` LIKE \"%" . $_GET['search'] . "%\"";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$cars[] = new Car($row['id'], $row['year'], $row['model'], $row['about'], $row['price'], $row['image'], $row['made_by_id'], $row['made_by']);
		}
		$db->conn->close();
		return $cars;
	}

// }
}
