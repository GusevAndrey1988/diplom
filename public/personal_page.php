<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<section>
	<h1>Ваши данные</h1>

	<?php
		$application->includeComponents(
			'form.personal_page',
			[
			]
		);
	?>

	<div>
		<h2>Вы записанны на следующие услуги:</h2>	
		<ul>
			
		</ul>
	</div>
</section>
<?php
// TODO
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
