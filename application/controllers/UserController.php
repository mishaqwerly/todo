<?php 
require  ROOT.'/application/models/login.php';
class UserController 
{
	public function actionlogin()
	{
		$login = '';
		$password = '';
		$errors = false;

		if (isset($_POST['submit'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$authorization = Login::getAuthorization($login,$password);

			if ($authorization) {
				$_SESSION['user_name'] = $authorization;
				header('Location: /');
			} else {
				$errors = 'Неверные параметры для входа';
			}
		}

		require ROOT.'/application/views/layout/header.php';
		require ROOT.'/application/views/login/form_for_login.php';
		require ROOT.'/application/views/layout/footer.php';
		return true;
	}

	public function actionLogaut()
	{
		$_SESSION['user_name'] = '';
		header('Location: /');
		return true;
	} 
	
}