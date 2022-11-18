<?php
// include "./DB.php";

class User
{

	public $id;
	public $username;
	public $password;

	public function __construct($id = null, $username = null, $password = null)
	{
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
	}

	public static function createtUser()
	{
		$db = new DB();
		$query = "SELECT * FROM `users` where `username` = " . '"' . $_POST['usercreate'] . '"';
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$username = new User($row['username']);
		}
		$db->conn->close();

		if (!isset($username['username'])) {
			$db = new DB();
			$new_password = md5($_POST['passcreate'] . $_POST['usercreate']);
			$stmt = $db->conn->prepare("INSERT INTO `users`( `username`, `password`) VALUES (?,?)");
			$stmt->bind_param("ss", $_POST['usercreate'], $new_password);
			$stmt->execute();
			$stmt->close();
			$db->conn->close();
		} else {
			echo "USERNAME IS TAKE";
		}

	}

	public static function getUser()
	{
		$db = new DB();
		$query = "SELECT * FROM `users` where `username` =" . $_POST['username'] . " AND `password` = " . $_POST['password'];
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$user = new User($row['username'], $row['password']);
		}
		$db->conn->close();
		return $user;
	}

	public function getUserByUsername()
	{
		$db = new DB();
		$query = "SELECT FROM `users` where `username` =" . $_POST['username'];
		$result = $db->conn->query($query);

		while ($row = $result->fetch_assoc()) {
			$username = new User($row['username']);
		}
		$db->conn->close();
		return $username;
	}

}
