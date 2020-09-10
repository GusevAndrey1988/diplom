<?php

/**
 * end_page.php
 */

require_once "end_app.php";

$footer = new Main\View\Template(APP_PRIVATE_DIR."/templates/footer.php");
$footer->includeTemplate();
