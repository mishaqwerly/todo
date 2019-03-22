	<div class="container">
		<div class="row">
			<div class="col mt-5 p-3 bs">
				<form method="POST" action="">
					<div class="form-group">
						<label for="name">Имя</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $email?>">
					</div>
					<div class="form-group">
						<label for="text">Текст задачи</label>
						<textarea class="form-control" id="text" rows="3" name="text"><?php echo $text?></textarea>
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="task_status" name="status" <?php $status = ($status == 'done') ? 'checked' : false ; echo "$status"; ?>>
						<label class="form-check-label" for="task_status">Выполнено</label>
					</div>
					<input type="submit" class="btn btn-primary" name="submit" value="Создать">
				</form>
				<?php if (!empty($errors_messages)) { ?>
					<div class="div mt-5">
						<?php foreach ($errors_messages as $message) { ?>
							<p><?php echo $message; ?></p>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	