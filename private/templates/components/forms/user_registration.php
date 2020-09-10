<?php
	// array $arParameters
?>

<form id="user-registration" action="<?=$arParameters['action']?>" method="POST">
	<fieldset>
		<?php if (! empty($arParameters['errorMessage'])) : ?>
			<p class="error-message"><?=$arParameters['errorMessage']?></p>
		<?php endif; ?>
		<div>
			<label class="required-field" for="user[first_name]">Имя:</label>
			<input name="user[first_name]" type="text" size="30" placeholder="Имя" value="<?=@$arParameters['user']['first_name']?>">
		</div>
		<div>
			<label class="required-field" for="user[last_name]">Фамилия:</label>
			<input name="user[last_name]" type="text" size="30" placeholder="Фамилия" value="<?=@$arParameters['user']['last_name']?>">
		</div>
		<div>
			<label for="user[patronymic]">Отчество:</label>
			<input name="user[patronymic]" type="text" size="30" placeholder="Отчество" value="<?=@$arParameters['user']['patronymic']?>">
		</div>
		<div>
			<label class="required-field" for="user[email]">Email:</label>
			<input name="user[email]" type="text" size="30" placeholder="Email" pattern="^.+?@.+\..+?$" value="<?=@$arParameters['user']['email']?>">
		</div>
		<div>
			<label class="required-field" for="user[password1]">Пароль:</label>
			<input name="user[password1]" type="password" size="30" placeholder="Пароль" pattern=".{6,}">
		</div>
		<div>
			<label class="required-field" for="user[password2]">Повтор пароля:</label>
			<input name="user[password2]" type="password" size="30" placeholder="Пароль" pattern=".{6,}">
		</div>
		<div>
			<input name="send" type="submit" value="Отправить">
		</div>
		<p>Поля, помеченные <span class="required-field"></span>, обязательны для заполнения!</p>
	</fieldset>
</form>
