<?php
	// array $arParameters
?>

<form id="user-registration" action="<?=$arParameters['action']?>" method="POST">
	<fieldset>
		<div>
			<label for="">Имя:</label>
			<input name="user[first_name]" type="text" size="30" placeholder="Имя">
		</div>
		<div>
			<label for="">Фамилия:</label>
			<input name="user[last_name]" type="text" size="30" placeholder="Фамилия">
		</div>
		<div>
			<label for="">Отчество:</label>
			<input name="user[patronymic]" type="text" size="30" placeholder="Отчество">
		</div>
		<div>
			<label for="">Email:</label>
			<input name="user[email]" type="text" size="30" placeholder="Email" pattern="^.+?@.+\..+?$">
		</div>
		<div>
			<label for="">Пароль:</label>
			<input name="user[password1]" type="password" size="30" placeholder="Пароль" pattern=".{6,}">
		</div>
		<div>
			<label for="">Повтор пароля:</label>
			<input name="user[password2]" type="password" size="30" placeholder="Пароль" pattern=".{6,}">
		</div>
		<div>
			<input name="send" type="submit" value="Отправить">
		</div>
	</fieldset>
</form>
