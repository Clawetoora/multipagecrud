<?php
include $_INNER_PATH . "./models/User.php";
class UserController
{

	public static function createtUser()
	{
		$user = User::createtUser();
		return $user;

	}

	public static function getUser()
	{
		$user = User::getUser();
		return $user;
	}
}
