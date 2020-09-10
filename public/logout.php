<?php

/**
 * logout.php
 */

require_once "../private/begin_app.php";

$application->clearCurrentUser();
$application->redirect("/index.php");

require_once "../private/end_app.php";
