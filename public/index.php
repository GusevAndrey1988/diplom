<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
			<!-- Список услуг -->
			<section id="services">
				<form action="<?=__FILE__?>" method="POST">
					<div>
						<label for="searchQuery">Поиск услуги: </label>
						<input name="searchQuery" type="text" placeholder="Ваш запрос" size="60">
					</div>
				</form>

				<h1>Популярные услуги:</h1>
				<?php
					$application->includeComponents(
						"services.top_services_list",
						[
							"count" => 10
						]
					);
				?>
			</section>
			<!-- end Список услуг -->

			<!-- Список новостей -->
			<section id="news" class="cf">
				<h1>Список новостей:</h1>
				<div class="row cf">
					<article class="p48">
						<img alt="" src="images/news/news1.jpeg" width="300" height="230">
						<div class="description">
							<h1><a href="#">В Анапе устраняют последствия мощного ливня</a></h1>
							<p>Сегодня утром в течение получаса на Анапу обрушилось 39 мм осадков – больше месячной нормы.</p>
						</div>
					</article>
					<article class="p48 right">
						<img alt="" src="images/news/news1.jpeg" width="300" height="230">
						<h1><a href="#">На Кубани за сутки подтверждено 93 случая коронавирусной инфекции</a></h1>
						<p>Среди них 56 женщин, 37 мужчин в возрасте до 85 лет.</p>
					</article>
				</div>
				<div class="row cf">
					<article class="p48">
						<img alt="" src="images/news/news1.jpeg" width="300" height="230">
						<h1><a href="#">На Кубани за сутки подтверждено 93 случая коронавирусной инфекции</a></h1>
						<p>Среди них 56 женщин, 37 мужчин в возрасте до 85 лет.</p>
					</article>
					<article class="p48 right">
						<img alt="" src="images/news/news1.jpeg" width="300" height="230">
						<h1><a href="#">В Анапе устраняют последствия мощного ливня</a></h1>
						<p>Сегодня утром в течение получаса на Анапу обрушилось 39 мм осадков – больше месячной нормы.</p>
					</article>
				</div>
			</section>
			<!-- end Список новостей -->

			<!-- Список ЧАВо -->
			<section id="faq">
				<h1>Часто задаваемые вопросы:</h1>
				<dl class="faq-list">
					<dt onclick="showDescr(this)">Как записатся на услугу?</dt>
					<dd class="hide">Сходи поспи и всё пройдёт.</dd>
					<dt onclick="showDescr(this)">Сайт не работает, что делать?</dt>
					<dd class="hide">Сходи поспи и всё пройдёт.</dd>
				</dl>

				<script>
					function showDescr(el) {
						let sibl = el;
						while ((sibl = sibl.nextElementSibling) && sibl.tagName == "DD") {
							sibl.classList.toggle("hide");
						}
					}
				</script>
			</section>
			<!-- end Список ЧАВо -->
<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
