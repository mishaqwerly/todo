<?php 

class Task 
{

	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	public static function AddNew($name,$email,$text,$status)
	{
		$dbh = Db::getConnect();
		$stmt = $dbh->prepare("INSERT INTO `task_table` (`id`, `user`, `email`, `text`, `status`) VALUES (NULL, :name, :email, :text, :status)");
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':text', $text, PDO::PARAM_STR);
		$stmt->bindParam(':status', $status, PDO::PARAM_STR);
		return $stmt->execute();
	}

	public static function UpdateTask($id,$text,$status)
	{
		$dbh = Db::getConnect();
		$stmt = $dbh->prepare("UPDATE `task_table` SET `status` = :status,`text` = :text WHERE `task_table`.`id` = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->bindParam(':text', $text, PDO::PARAM_STR);
		$stmt->bindParam(':status', $status, PDO::PARAM_STR);
		return $stmt->execute();
	}
}