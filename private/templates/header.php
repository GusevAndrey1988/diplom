<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Сайт муниципальных услуг</title>

		<link rel="stylesheet" type="text/css" href="styles/normalize.css">
		<link rel="stylesheet" type="text/css" href="styles/main.css?v=3">
	</head>
	<body>
		<header>
			<div class="cf">
				<!-- Логотип -->
				<div class="logo p30">
					<img alt="Логотип" src="images/logo.png">
				</div>
				<!-- end Логотип -->

				<h1 class="p40">Протал услуг города N</h1>

				<!-- Аутентификация -->
				<div class="p30 right">
					<div class="authentication-box">
						<div><a href="#">Вход</a></div>
						<div><a href="/registration.php">Регистрация</a></div>
					</div>
				</div>
				<!-- end Аутентификация -->
			<div>

			<!-- Навигация (осн.) -->
			<?php
				Main\Application::getInstance()->includeComponents(
					"menu",
					[
						"template" => APP_TEMPLATES_DIR."/components/menu/main.php",
						"menu_data" => APP_PUBLIC_DIR."/main_menu_data.php"
					]
				);
			?>
			<!-- end Навигация (осн.) -->
		</header>

		<main>

