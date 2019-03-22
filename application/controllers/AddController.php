<?php 

require ROOT.'/application/models/task.php';
class AddController 
{
	public function actionAddNewTask()
	{
		$name = '';
		$email = '';
		$text = '';
		$status = '';
		$errors_messages = [];
		
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];

			if (!empty($_POST['name'])) {
				$name = $_POST['name'];
			} else {
				$errors_messages[] = '- Необходимо указать своё имя';
			}

			if (!Task::checkEmail($email)) {
				$errors_messages[] = '- Некорректный e-mail';
			} 

			if (!empty($_POST['text'])) {
				$text = $_POST['text'];
			} else {
				$errors_messages[] = '- Необходимо указать вою задачу';
			}

			if (isset($_POST['status'])) {
				$status = 'done';
			} else {
				$status = 'not_done';
			}

			if (empty($errors_messages)) {
				Task::AddNew($name,$email,$text,$status);
				header('Location: /');
			}
		}

		require ROOT.'/application/views/layout/header.php';
		require ROOT.'/application/views/add_task/form_for_creating_new_task.php';
		require ROOT.'/application/views/layout/footer.php';
		return true;
	}
}