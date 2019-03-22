<?php 

class Db 
{
	public static function getConnect()
	{
		require ROOT.'/application/config/db_params.php';
		return $dbh = new PDO('mysql:host='.$db_params['host'].';dbname='.$db_params['dbname'].'', $db_params['user'], $db_params['pass']);
	}
}
