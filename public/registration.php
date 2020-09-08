<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<h2>Регистрация нового пользователя.</h2>

<?php
Main\Application::getInstance()->includeComponents(
	"test.test",
	[
		'text' => "hello world"
	]
);
?>

<?php
	print_r(Main\Db\Users::getUserById(1));
?>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>

