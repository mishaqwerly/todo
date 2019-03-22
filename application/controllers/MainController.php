<?php 

require ROOT.'/application/models/main.php';
require ROOT.'/application/models/task.php';
class MainController 
{
    const AMOUNT_TASKS_IN_ONE_PAGE = 3;
	public function actionTodoList($field_name = 'id',$order_type = 'desc',$current_page = 1,$amount_value = self::AMOUNT_TASKS_IN_ONE_PAGE)
	{

		if (isset($_POST['submit']) && !empty($_SESSION['user_name'])) {
			$status = 'not_done';

			if (isset($_POST['status'])) {
				$status = 'done';
			}

			$id = $_POST['submit'];
			$text = $_POST['text'];
			Task::UpdateTask($id,$text,$status);
		}

		$_SESSION['sort-link'] = "/sort-$field_name/$order_type/";
		$link = $_SESSION['sort-link'];

        $all_task = Main::sortTask($field_name,$order_type,$current_page,$amount_value);
		$pagination = Main::paginationByTask($field_name,$order_type,$amount_value);

		require ROOT.'/application/views/layout/header.php';
		require ROOT.'/application/views/main/todo_list.php';
		require ROOT.'/application/views/layout/footer.php';
		return true;
	}

}