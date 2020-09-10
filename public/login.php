<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<h2>Вход в систему.</h2>

<?php
	$application->includeComponents(
		"form.login",
		[
			'template' => APP_TEMPLATES_DIR."/components/forms/user_login.php",
			'action' => "/login.php"
		]
	);
?>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>

