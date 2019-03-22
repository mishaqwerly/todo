<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/styles/css/all_styles.css">

    <title>Hello, world!</title>
  </head>
  <body>
  	<div class="container-fluid mt-5 bs">
  		<div class="row d-flex justify-content-between">
    		<nav class="nav">
                <a class="nav-link" href="/add/">Создать задачу</a>
                <a class="nav-link" href="/">Список всех задач</a>
            </nav>
            <nav class="nav d-flex align-items-center">
                <?php if (empty($_SESSION['user_name'])) { ?>
                    <span>Гость</span>
                    <a class="nav-link" href="/user/login/">Вход</a>
                <?php } else { ?>
                    <span><?php echo $_SESSION['user_name']; ?></span>
                    <a class="nav-link" href="/user/logaut/">Выход</a>
                <?php } ?>
            </nav>
  		</div>
  	</div>