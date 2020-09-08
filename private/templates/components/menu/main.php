<?php
	// array $arParameters
?>
<nav>
	<ul class="main-menu">
		<?php foreach($arParameters['items'] as $item) : ?>
			<li><a href="<?=$item['link']?>"><?=$item['name']?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>

