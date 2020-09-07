<?php
if (! defined("APP_IS_PAGE_BEGIN") || APP_IS_PAGE_BEGIN !== true)
{
	exit();
}

$footer = new Main\View\Template(APP_PRIVATE_DIR."/templates/footer.php");
$footer->includeTemplate();
