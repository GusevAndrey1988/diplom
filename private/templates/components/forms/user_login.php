<?php
	/**
	 * user_login.php
	 */

	// array $arParameters
?>

<form id="user-login" action="<?=$arParameters['action']?>" method="POST">
	<fieldset>
		<?php if (! empty($arParameters['errorMessage'])) : ?>
			<p class="error-message"><?=$arParameters['errorMessage']?></p>
		<?php endif; ?>
		<div>
			<label class="required-field" for="user[email]">Email:</label>
			<input name="user[email]" type="text" size="30" placeholder="Email" pattern="^.+?@.+\..+?$" value="<?=@$arParameters['user']['email']?>">
		</div>
		<div>
			<label class="required-field" for="user[password]">Пароль:</label>
			<input name="user[password]" type="password" size="30" placeholder="Пароль" pattern=".{6,}">
		</div>
		<div>
			<input name="send" type="submit" value="Отправить">
		</div>
		<p>Поля, помеченные <span class="required-field"></span>, обязательны для заполнения!</p>
	</fieldset>
</form>
