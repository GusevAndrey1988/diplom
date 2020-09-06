<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Сайт муниципальных услуг</title>

		<link rel="stylesheet" type="text/css" href="styles/normalize.css">
		<link rel="stylesheet" type="text/css" href="styles/main.css?v=0">
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
						<div><a href="#">Регистрация</a></div>
					</div>
				</div>
				<!-- end Аутентификация -->
			<div>

			<!-- Навигация (осн.) -->
			<nav>
				<ul class="main-menu">
					<li><a href="#services">Услуги</a></li>
					<li><a href="#news">Новости</a></li>
					<li><a href="#faq">Часто задаваемые вопросы</a></li>
				</ul>
			</nav>
			<!-- end Навигация (осн.) -->
		</header>

		<main>

			<!-- Список услуг -->
			<section id="services">
				<form action="<?=__FILE__?>" method="POST">
					<div>
						<label for="searchQuery">Поиск услуги: </label>
						<input name="searchQuery" type="text" placeholder="Ваш запрос" size="60">
					</div>
				</form>

				<h1>Популярные услуги:</h1>
				<ul class="services-list">
					<li><a href="#">Услуга 1</a></li>
					<li><a href="#">Услуга 2</a></li>
					<li><a href="#">Услуга 3</a></li>
				</ul>
			</section>
			<!-- end Список услуг -->

			<!-- Список новостей -->
			<section id="news">
				<h1>Список новостей:</h1>
				<article>
					<image alt="" src="images/news/news1.jpeg" width="300" height="230">
					<h1>В Анапе устраняют последствия мощного ливня</h1>
					<p>Сегодня утром в течение получаса на Анапу обрушилось 39 мм осадков – больше месячной нормы.</p>
				</article>
				<article>
					<image alt="" src="images/news/news1.jpeg" width="300" height="230">
					<h1>На Кубани за сутки подтверждено 93 случая коронавирусной инфекции</h1>
					<p>Среди них 56 женщин, 37 мужчин в возрасте до 85 лет.</p>
				</article>
			</section>
			<!-- end Список новостей -->

			<!-- Список ЧАВо -->
			<section id="faq">
				<h1>Часто задаваемые вопросы:</h1>
				<ul>
					<li>Как записатся на услугу?</li>
					<li>Сайт не работает, что делать?</li>
				</ul>
			</section>
			<!-- end Список ЧАВо -->
		</main>

		<footer class="cf">
			<div>Сайт разработан компанией ООО "Лучшая компания в мире"&reg;</div>	
			<div>Администратор сайта <a href="mailto:vasiapupkinne@gmail.com">vasiapupkinne@gmail.com</a><div>
			<div class="copy"><small>&copy;Copyright 2020</small></div>
		</footer>
	</body>
</html>
