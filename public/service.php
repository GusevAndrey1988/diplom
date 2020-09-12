<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<?php
	if (isset($_GET['ID']))
	{
		$service = \Main\Db\Services::getServiceById($_GET['ID']);
	}
?>

<section>
	<h2><?=$service['name']?></h2>
	<p><?=$service['description']?></p>
</section>

<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
