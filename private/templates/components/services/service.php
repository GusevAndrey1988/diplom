<?php
	// array $arParameters
?>

<?php if ($arParameters['errorMessage']) : ?>
	<p class="error-message"><?=$arParameters['errorMessage']?></p>
<?php else: ?>
	<?php if (isset($arParameters['success'])) : ?>
		<h2><?=$arParameters['service']['name']?></h2>
		<p><?=$arParameters['service']['description']?></p>

		<form action="<?=$arParameters['action']?>" method="POST">
			<input type="hidden" name="id" value="<?=$arParameters['service']['id']?>">
			<input type="submit" value="Записаться" name="send">
		</form>
	<?php else : ?>
		<p>Вы успешно записались на услугу</p>
	<?php endif; ?>
<?php endif; ?>

