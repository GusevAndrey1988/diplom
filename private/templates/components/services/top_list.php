<?php
	// array $arParameters
?>

<ul class="services-list">
	<?php foreach ($arParameters['services'] as $service) :?>
		<li><a href="/service.php?ID=<?=$service['id']?>"><?=$service['name']?></a></li>
	<?php endforeach; ?>
</ul>
