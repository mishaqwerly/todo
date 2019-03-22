	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-xl-2 col-12 mb-3">
				<div class="p-2 bs d-flex flex-column">
					<h3>Сортировать по:</h3>
					<a href="/sort-user/asc/">Имя от А до Я</a>
					<a href="/sort-user/desc/">Имя от Я до А</a>
					<a href="/sort-email/asc/">Emai от А до Я</a>
					<a href="/sort-email/desc/">Emai от Я до А</a>
					<a href="/sort-status/done/">Выполненные задачи</a>
					<a href="/sort-status/not_done/">Невыполненные задачи</a>
				</div>
			</div>
			<div class="col">
				<div class="row pr-3">
					<?php foreach ($all_task as $one_task) { ?>
						<?php if (!empty($_SESSION['user_name'])) { ?>
							<div class="col-12 mb-3 bs pb-2">
								<form method="POST" action="">
									<h2><?php echo $one_task['user']; ?></h3>
									<h4><?php echo $one_task['email']; ?></h4>
									<div class="form-group">
										<label for="text">Текст задачи</label>
										<textarea class="form-control" id="text" rows="3" name="text"><?php echo $one_task['text']; ?></textarea>
									</div>
									<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck<?php echo $one_task['id']; ?>" name="status" <?php if ($one_task['status'] == 'done') { echo "checked"; } ?>>
										<label class="form-check-label" for="exampleCheck<?php echo $one_task['id']; ?>">Выполнено</label>
									</div>
									<button type="submit" name="submit" value="<?php echo $one_task['id']; ?>" class="btn btn-primary">Изменить</button>
								</form>	
							</div>
						<?php } else { ?>
							<div class="col-12 mb-3 bs">
								<div class="col-12 m-3">
									<div class="diw d-flex justify-content-between">
										<div class="div">
											<h2><?php echo $one_task['user']; ?></h3>
											<h4><?php echo $one_task['email']; ?></h4>
										</div>
									</div>
									<p><?php echo $one_task['text']; ?></p>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" <?php if ($one_task['status'] == 'done') { echo "checked"; } ?> disabled>
										<label class="form-check-label" for="inlineCheckbox1">Выполнено</label>
									</div>
								</div>	
							</div>
						<?php } ?>
					<?php } ?>
					<div class="col-12 p-0">
						<nav>
							<ul class="pagination">
								<?php for ($item=1; $item <= $pagination ; $item++) { ?>
							   		<li class="page-item <?php if ($current_page == $item) {echo "active";} ?>"><a class="page-link" href="<?php echo $link.$item; ?>"><?php echo $item; ?></a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div> 
		</div>
	</div>

