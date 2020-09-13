<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section>
	<h1>Список услуг</h1>

<?php
	$application->includeComponents(
		"services.services_list",
		[
			'offset' => 0,
			'count'  => 0
		]
	);
?>
</section>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
