<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section>
<?php
	$application->includeComponents(
		"services.service",
		[
			"service_id" => (isset($_GET['ID']) ? $_GET['ID'] : null),
			"action" => "service.php"
		]
	);
?>
</section>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
