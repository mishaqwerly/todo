	<div class="container">
		<div class="row">
			<div class="col mt-5 p-3 bs">
				<?php if (empty($_SESSION['user_name'])) { ?>
					<form method="POST" action="" class="mb-3">
						<div class="form-group">
							<label for="name">Логин</label>
							<input type="text" class="form-control" id="name" name="login" value="<?php echo $login?>">
						</div>
						<div class="form-group">
							<label for="email">Пароль</label>
							<input type="password" class="form-control" id="email" aria-describedby="emailHelp" name="password" value="<?php echo $password?>">
						</div>
						<input type="submit" class="btn btn-primary" name="submit" value="Войти">
					</form>
					<?php if (isset($errors)) { ?>
						<p><?php echo $errors; ?></p>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div> 