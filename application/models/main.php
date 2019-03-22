<?php 

class Main 
{

	public static function sortTask($field_name,$order_type,$page,$amount_value)
	{
		$dbh = Db::getConnect();
		$offset = ($page - 1) * $amount_value;
        if ($field_name == 'status') {
			$stmt = $dbh->prepare("SELECT * FROM `task_table` WHERE `task_table`.$field_name = '".$order_type."' ORDER BY `task_table`.`id` ASC LIMIT $amount_value OFFSET $offset");
		} else {
			$stmt = $dbh->prepare("SELECT * FROM `task_table` ORDER BY `task_table`.$field_name $order_type LIMIT $amount_value OFFSET $offset");
		}
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public static function paginationByTask($field_name,$order_type,$amount_value)
	{
		$dbh = Db::getConnect();
        if ($field_name == 'status') {
			$stmt = $dbh->prepare("SELECT count($field_name) FROM task_table WHERE `status` = '".$order_type."'");
		} else {
			$stmt = $dbh->prepare("SELECT count($field_name) FROM task_table");
		}
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ceil($result[0]["count($field_name)"]/$amount_value);
	}

}
