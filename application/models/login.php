<?php 

class Login 
{

	public static function getAuthorization($login,$password)
	{
		$dbh = Db::getConnect();
		$stmt = $dbh->prepare("SELECT * FROM `users` WHERE `login` = :login and `password` = :password");
		$stmt->bindParam(':login', $login, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($result) {
			return $result[0]['login'];
		} else {
			return false;
		}
	}
}
