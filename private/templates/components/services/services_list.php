<?php
	// array $arParameters
?>

<dl class="services-list">
	<?php foreach ($arParameters['servicesGroups'] as $group) : ?>
		<dt onclick="showDescr(this)"><?=$group['name']?></dt>
		<?php foreach($group['services'] as $service) : ?>
			<dd class="hide"><a href="/service.php?ID=<?=$service['id']?>"><?=$service['name']?></a></dd>
		<?php endforeach; ?>
	<?php endforeach; ?>
</dl>
<script>
	function showDescr(el) {
		let sibl = el;
		while ((sibl = sibl.nextElementSibling) && sibl.tagName == "DD") {
			sibl.classList.toggle("hide");
		}
	}
</script>

