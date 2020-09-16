<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<section>
	<h1>Ваши данные</h1>

<?php $user = $application->getCurrentUser(); ?>
<?php if ($user->isLogged()) : ?>
	<form id="user-data" action="" method="POST">
		<fieldset>
			<h2>Основные:</h2>
			<div>
				<label class="required-field" for="user[first_name]">Имя:</label>
				<input name="user[first_name]" type="text" size="30" placeholder="Имя" value="<?=$user->getFirstName()?>">
			</div>
			<div>
				<label class="required-field" for="user[last_name]">Фамилия:</label>
				<input name="user[last_name]" type="text" size="30" placeholder="Фамилия" value="<?=$user->getLastName()?>">
			</div>
			</div>
			<div>
				<label class="required-field" for="user[email]">Email:</label>
				<input name="user[email]" type="text" size="30" placeholder="Email" pattern="^.+?@.+\..+?$" value="<?=$user->getEmail()?>">
			</div>
			<div>
				<p>Дата регистрации: <?=$user->getRegDate()?></p>
			</div>
			<div>
				<?php if ($user->getChecked()) : ?>
					<p>Профиль подтверждён</p>
				<?php else : ?>
					<p>Профиль не подтверждён</p>
				<?php endif; ?>
			</div>	
		</fieldset>

		<fieldset>
			<h2>Паспорт:</h2>
			<div>
				<label for="passport[number]">Номер:</label>
				<input name="passport[number]" type="text" size="30" placeholder="Номер" value="">
			</div>
			<div>
				<label for="passport[series]">Серия:</label>
				<input name="passport[series]" type="text" size="30" placeholder="Серия" value="">
			</div>
			<div>
				<label for="passport[date]">Дата выдачи:</label>
				<input name="passport[date]" type="date" size="30" value="">
			</div>
			<div>
				<label for="passport[departament_code]">Код подразделения:</label>
				<input name="passport[departament_code]" type="text" size="30" value="">
			</div>
			<div>
				<label for="passport[issued_by]">Выдан:</label>
				<textarea name="passport[issued_by]"></textarea>
			</div>
		</fieldset>
		<div>
			<input name="send" type="submit" value="Отправить">
		</div>
	</form>
<?php else : ?>
	<p class="error-message">Войдите в систему</p>
<?php endif; ?>
</section>
<?php
// TODO
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
