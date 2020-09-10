<?php

/**
 * begin_page.php
 */

require_once "begin_app.php";

$header = new Main\View\Template(APP_TEMPLATES_DIR."/header.php");
$header->includeTemplate();
