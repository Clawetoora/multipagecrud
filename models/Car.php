<?php

include $_INNER_PATH . "./models/DB.php";

class Car
{
	public $id;
	public $year;
	public $madeBy;
	public $model;
	public $about;
	public $price;
	public $image;

	public function __construct($id = null, $year = null, $madeBy = null, $model = null, $about = null, $price = null, $image = null)
	{
		$this->id = $id;
		$this->year = $year;
		$this->madeBy = $madeBy;
		$this->model = $model;
		$this->about = $about;
		$this->price = $price;
		$this->image = $image;
	}

	public static function all()
	{
		$cars = [];
		$db = new DB();
		$query = "SELECT * FROM `cars`";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$cars[] = new Car($row['id'], $row['year'], $row['made_by'], $row['model'], $row['about'], $row['price'], $row['image']);
		}
		$db->conn->close();
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
		$stmt = $db->conn->prepare("INSERT INTO `cars`( `year`, `made_by`, `model`, `about`,`price`, `image`) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param("isssis", $_POST['year'], $_POST['made_by'], $_POST['model'], $_POST['about'], $_POST['price'], $filename);
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
		$query = "SELECT * FROM `cars` where `id`=" . $id;
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$car = new Car($row['id'], $row['year'], $row['made_by'], $row['model'], $row['about'], $row['price'], $row['image']);
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
		$stmt = $db->conn->prepare("UPDATE `cars` SET `year`= ? ,`made_by`= ? ,`model`= ? ,`about`= ? , `price`= ?, `image`= ? WHERE `id` = ?");
		$stmt->bind_param("isssisi", $_POST['year'], $_POST['made_by'], $_POST['model'], $_POST['about'], $_POST['price'], $filename, $_POST['id']);
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

// 	public static function getfilterParams()
// 	{
// 		$params = [];
// 		$db = new DB();
// 		$query = "SELECT DISTINCT `category` FROM `items`";
// 		$result = $db->conn->query($query);

// 		while ($row = $result->fetch_assoc()) {
// 			$params[] = $row['category'];
// 		}
// 		$db->conn->close();
// 		return $params;
// 	}

// 	public static function filter()
// 	{
// 		$items = [];
// 		$db = new DB();
// 		$query = "SELECT * FROM `items` ";
// 		$first = true;
// 		if (($_GET['filter'] != "")) {
// 			$first = false;
// 			$query .= "WHERE `category` =  \"" . $_GET['filter'] . "\"" . " ";
// 		}

// 		if ($_GET['from'] != "") {
// 			$query .= (($first) ? "WHERE" : "AND") . " `price` >= " . $_GET['from'] . " ";
// 			$first = false;
// 		}
// 		if ($_GET['to'] != "") {
// 			$query .= (($first) ? "WHERE" : "AND") . " `price` <= " . $_GET['to'] . " ";
// 			$first = false;
// 		}

// 		if (!isset($_GET['sort'])) {
// 			$query .= "";
// 		} else {

// 			switch ($_GET['sort']) {

// 				case '1':
// 					$query .= "ORDER BY `price`";
// 					break;

// 				case '2':
// 					$query .= "ORDER BY `price` DESC";
// 					break;

// 				case '3':
// 					$query .= "ORDER BY `name`";
// 					break;

// 				case '4':
// 					$query .= "ORDER BY `name` DESC";
// 					break;
// 			}
// 		}

// 		// print_r($query);die;
// 		$result = $db->conn->query($query);

// 		while ($row = $result->fetch_assoc()) {
// 			$items[] = new Item($row['id'], $row['name'], $row['category'], $row['price'], $row['about']);
// 		}
// 		$db->conn->close();
// 		return $items;
// 	}

	public static function search()
	{
		$cars = [];
		$db = new DB();
		$query = "SELECT * FROM `cars` WHERE `made_by` LIKE \"%" . $_GET['search'] . "%\"";
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$cars[] = new Car($row['id'], $row['year'], $row['made_by'], $row['model'], $row['about'], $row['price'], $row['image']);
		}
		$db->conn->close();
		return $cars;
	}

// }
}
