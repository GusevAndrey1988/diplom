<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<h2>Регистрация нового пользователя.</h2>

<?php
Main\Application::getInstance()->includeComponents(
	"form.registration",
	[
		'template' => APP_TEMPLATES_DIR."/components/forms/user_registration.php",
		'action' => "/registration.php"
	]
);
?>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>

