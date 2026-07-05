<?php

return array(
	'id' => 'faq',
	'type' => 'page',
	'route' => array(
		'path' => '/faq',
		'label' => 'FAQ',
		'parent' => 'home',
		'menu' => true,
	),
	'seo' => array(
		'title' => 'FAQ — Andrzej Mazur EZNAWCA',
		'description' => 'Najczęściej zadawane pytania o Andrzeju Mazurze (EZNAWCA), technologiach, e-commerce, PHP, AI, projektach i współpracy.',
		'canonical' => '/faq',
	),
	'sitemap' => array(
		'changefreq' => 'monthly',
		'priority' => '0.7',
	),
	'items' => array(
		'questions' => array(
			array(
				'q' => 'Kim jest Andrzej Mazur (EZNAWCA)?',
				'a' => '<p>Nazywam się Andrzej Mazur. Jestem Senior Full-Stack PHP Developerem i praktykiem e-commerce. Od połowy lat 90. tworzę oprogramowanie oraz serwisy internetowe, a zawodowo koncentruję się na rozwoju systemów sprzedażowych, integracjach, automatyzacji i bezpiecznej modernizacji dojrzałych aplikacji.</p>
<p>Marka <strong>EZNAWCA</strong> to moja osobista przestrzeń, w której łączę praktykę programistyczną, projekty edukacyjne i zainteresowanie technologią.</p>',
			),
			array(
				'q' => 'Jak zaczęła się Twoja przygoda z programowaniem?',
				'a' => '<p>Pierwsze strony WWW tworzyłem już w 1996 roku — w intranecie firmy ICL. Niedługo później współtworzyłem program edukacyjny <strong>Matematyk</strong>, który trafił do sprzedaży w 2000 roku. To doświadczenie nauczyło mnie pracy nad produktem od strony technicznej, użytkowej i biznesowej — na długo przed tym, zanim web development stał się tak powszechną specjalizacją jak dziś.</p>',
			),
			array(
				'q' => 'Jakie duże platformy e-commerce rozwijałeś?',
				'a' => '<p>Obecnie rozwijam międzynarodową platformę e-commerce dla Rolladen Group, obsługującą kilka domen i rynków europejskich. <a href="#nad-czym-pracujesz-obecnie">Więcej o tym projekcie</a> opisuję niżej.</p>
<p>Od 2002 roku współtworzyłem i rozwijałem <a href="https://proline.pl/" target="_blank" rel="noopener">Proline.pl</a> — rozpoznawalny polski sklep komputerowy działający od lat 90. W początkowym okresie rozwoju serwisu byłem głównym programistą i grafikiem, a przez długi czas także jedyną osobą pełniącą te role.</p>
<p>Odpowiadałem za rozwój funkcjonalny i wizualny serwisu. Było to doświadczenie, które ukształtowało moje pełnostackowe podejście do e-commerce: rozwiązanie musi nie tylko działać technicznie, lecz także dobrze prezentować ofertę, prowadzić użytkownika przez proces zakupu i niezawodnie wspierać codzienną sprzedaż.</p>',
			),
			array(
				'q' => 'Nad czym pracujesz obecnie?',
				'a' => '<p>Od 2019 roku rozwijam międzynarodową platformę e-commerce w branży rolet i bram garażowych. Jedna instancja systemu obsługuje odrębne domeny oraz rynki, między innymi niemiecki, francuski i niderlandzki.</p>
<p>Odpowiadam za pełen zakres prac technicznych: backend PHP, bazę danych, integracje płatności, lokalizację, automatyzacje back-office, rozwój frontendów oraz techniczne SEO, w tym dane strukturalne.</p>',
			),
			array(
				'q' => 'Dlaczego specjalizujesz się w systemach legacy, skoro wiele firm wybiera nowe frameworki?',
				'a' => '<p>Ponieważ w systemach legacy zwykle działa realny biznes. Sklepy generujące istotny obrót często opierają się na rozwiązaniach, które przez lata skutecznie obsługiwały sprzedaż, klientów i procesy operacyjne. Zastąpienie ich od zera bywa kosztowne oraz ryzykowne.</p>
<p>Modernizacja takiego systemu wymaga więcej dyscypliny niż praca nad projektem greenfield: każda zmiana musi być bezpieczna dla produkcji, zgodna wstecznie i uzasadniona biznesowo. Właśnie tam statyczna analiza, testy, dobre praktyki, CI oraz narzędzia AI potrafią dać największy efekt.</p>',
			),
			array(
				'q' => 'W jakich technologiach pracujesz?',
				'a' => '<p>Najbliżej mi do backendu PHP — od utrzymania aplikacji PHP 5.x po nowoczesne rozwiązania PHP 8.x zgodne z PSR. Pracuję także z MySQL, SQL, architekturą wielosklepową oraz integracjami z zewnętrznymi usługami.</p>
<p>Po stronie frontendu używam JavaScriptu ES6+, semantycznego HTML, CSS i Bootstrap 5. W pracy korzystam między innymi z Git, Linuxa, Dockera, PHPStorma, narzędzi CLI oraz narzędzi AI wspierających programowanie.</p>',
			),
			array(
				'q' => 'Czy zajmujesz się wyłącznie backendem?',
				'a' => '<p>Nie. Backend jest moją najmocniejszą stroną, ale pracuję jako Full Stack Developer. Mogę prowadzić funkcjonalność od modelu danych i logiki biznesowej, przez integracje oraz API, po interfejs użytkownika i analizę zachowania rozwiązania na produkcji.</p>',
			),
			array(
				'q' => 'Czy znasz się na płatnościach online w e-commerce?',
				'a' => '<p>Tak. To jeden z moich mocniejszych obszarów. Zajmowałem się wdrażaniem i rozwojem integracji płatniczych, między innymi PayU, Przelewy24 oraz Stripe.</p>
<p>W przypadku Stripe pracuję między innymi z obsługą webhooków, weryfikacją podpisów, idempotencją, 3D Secure oraz wymaganiami SCA/PSD2.</p>
<p>Zajmuję się również procesami związanymi z przelewami bankowymi, plikami SEPA XML, uzgadnianiem płatności oraz automatyzacją ich obsługi w systemach sprzedażowych.</p>',
			),
			array(
				'q' => 'Jak wykorzystujesz AI w pracy programisty?',
				'a' => '<p>Traktuję AI jako narzędzie inżynierskie, a nie zastępstwo dla odpowiedzialności technicznej. Wykorzystuję je między innymi do analizy istniejącego kodu, planowania refaktoryzacji, przygotowywania testów, automatyzacji powtarzalnych zadań, code review i dokumentowania decyzji.</p>
<p>Obecnie intensywnie rozwijam sposób pracy z agentami programującymi, w szczególności Claude Code, oraz z narzędziami wspierającymi testowanie i przegląd kodu, takimi jak OpenAI Codex. Wynik pracy agenta zawsze wymaga jednak weryfikacji w kontekście architektury, bezpieczeństwa i realiów produkcyjnych.</p>',
			),
			array(
				'q' => 'Czym jest GEO i czy się tym zajmujesz?',
				'a' => '<p><strong>GEO</strong> (<em>Generative Engine Optimization</em>) to obszar działań związanych z tym, aby treści były łatwe do zrozumienia, wiarygodne i możliwe do wykorzystania przez wyszukiwarki oraz systemy generatywne, takie jak ChatGPT, Claude, Perplexity czy Google AI Overviews.</p>
<p>Traktuję GEO jako uzupełnienie, a nie zamiennik klasycznego SEO. W praktyce obejmuje ono między innymi poprawną semantykę HTML, dane strukturalne Schema.org, spójność informacji o marce i produkcie oraz treści, które jasno i samodzielnie odpowiadają na konkretne pytania użytkowników.</p>',
			),
			array(
				'q' => 'Jakie usługi oferuje EZNAWCA? Czy przyjmujesz zlecenia?',
				'a' => '<p>Na co dzień pracuję na pełen etat przy rozwoju e-commerce. Nie prowadzę agencji ani nie przyjmuję standardowych, krótkich zleceń freelancowych.</p>
<p>Mogę rozważyć wyłącznie współpracę długofalową, o jasno określonym zakresie odpowiedzialności i realnej wartości dla obu stron.</p>',
			),
			array(
				'q' => 'Czy udzielasz konsultacji?',
				'a' => '<p>W ograniczonych przypadkach tak. Rozważam konsultacje i audyty dotyczące trudnych systemów PHP, modernizacji legacy, płatności, wielodomenowego e-commerce, technicznego SEO oraz automatyzacji procesów.</p>
<p>W sprawie współpracy napisz na <a href="mailto:eznawca@gmail.com">eznawca@gmail.com</a>. W wiadomości opisz problem, cel biznesowy, używany stack i aktualny etap projektu.</p>',
			),
			array(
				'q' => 'Gdzie pracujesz — zdalnie czy stacjonarnie?',
				'a' => '<p>Mieszkam w Oławie, na Dolnym Śląsku, niedaleko Wrocławia. Pracuję przede wszystkim zdalnie z zespołami i firmami z Europy. Spotkania stacjonarne są możliwe przede wszystkim w Oławie, we Wrocławiu i okolicach.</p>',
			),
			array(
				'q' => 'Czym jest LekcjePHP.pl?',
				'a' => '<p><a href="https://lekcjephp.pl/" target="_blank" rel="noopener"><strong>LekcjePHP.pl</strong></a> to mój projekt edukacyjny dla osób rozwijających się w web developmencie, ze szczególnym naciskiem na backend PHP i praktyczne narzędzia pracy.</p>
<p>Publikuję tam materiały dotyczące PHP, JavaScriptu, HTML, CSS, SQL, Gita, Linuxa/Basha, cURL, MySQL, PHPStorma oraz rozwiązywania problemów spotykanych w codziennej pracy programisty. Znajdują się tam również ściągi, zadania z CodeWars i Daily Coding Problem oraz materiały o narzędziach AI dla developerów.</p>',
			),
			array(
				'q' => 'Dla kogo są materiały na LekcjePHP.pl?',
				'a' => '<p>LekcjePHP.pl jest skierowane do programistów PHP i web developerów, osób uczących się tworzenia aplikacji internetowych oraz tych, którzy chcą rozwijać praktyczne umiejętności związane z backendem, bazami danych, JavaScriptem i narzędziami pracy programisty.</p>
<p>Największą wartość znajdą tam osoby, które szukają konkretnych przykładów, ściąg, rozwiązań problemów i materiałów opartych na doświadczeniu z rzeczywistych projektów.</p>',
			),
			array(
				'q' => 'Dla kogo jest EZNAWCA.pl?',
				'a' => '<p>EZNAWCA.pl to moja osobista strona ekspercka. Jest przeznaczona dla osób i firm zainteresowanych doświadczeniem w rozwoju e-commerce, systemach PHP, modernizacji aplikacji legacy, płatnościach online, automatyzacji oraz technicznym SEO.</p>
<p>To także miejsce, w którym opisuję swoje projekty, podejście do technologii, doświadczenie zawodowe oraz obszary, w których mogę rozważyć konsultację lub długofalową współpracę.</p>',
			),
			array(
				'q' => 'Czy oferujesz mentoring indywidualny?',
				'a' => '<p>Nie prowadzę stałego programu mentoringowego. W miarę dostępności rozważam pojedyncze konsultacje dla osób, które mają jasno zdefiniowany problem techniczny lub potrzebują przemyślanej ścieżki rozwoju. Najlepiej opisać krótko swój obecny poziom, cel i temat, z którym potrzebujesz pomocy.</p>',
			),
			array(
				'q' => 'Czym był program „Matematyk”?',
				'a' => '<p><strong>Matematyk</strong> był rozbudowanym programem edukacyjnym do nauki matematyki, wydanym w 2000 roku. Jego założeniem była nauka przez samodzielne rozwiązywanie zadań, wsparta materiałem dydaktycznym, testami i narzędziami pomocniczymi.</p>
<p>Odpowiadałem za kodowanie i grafikę, a także współtworzyłem materiały dydaktyczne oraz ich weryfikację. Program był dostępny w sprzedaży, między innymi w sieci Empik, i wykorzystywany przez szkoły.</p>
<p>Matematyk obejmował materiał szkolny, zadania i testy, a także dodatkowe moduły: wykresy funkcji <strong>GrafMat</strong>, kalkulator prosty i inżynierski, prezentację figur przestrzennych, kreator figur geometrycznych, podręcznik ze wzorami i definicjami oraz moduł <strong>Rachmistrz</strong> wspierający rozwiązywanie zadań. Program pozwalał też nauczycielom monitorować postępy poszczególnych uczniów.</p>
<p>Archiwalna prezentacja programu: <a href="https://eznawca.pl/mat/" target="_blank" rel="noopener">https://eznawca.pl/mat/</a>.</p>',
			),
			array(
				'q' => 'Dlaczego trenujesz brazylijskie jiu-jitsu?',
				'a' => '<p>Dla mnie brazylijskie jiu-jitsu jest najlepszym sportem. Łączy rywalizację, pokorę i ciągłe rozwiązywanie problemów pod presją, dlatego często porównuję je do „szachów 5D”.</p>
					</p>Ważna jest też społeczność. Regularne treningi budują relacje, zaufanie i wzajemny szacunek, a rozwój wymaga współpracy z ludźmi o różnym doświadczeniu i stylu. Dzięki temu mata jest nie tylko miejscem treningu, ale też przestrzenią, w której powstają wartościowe znajomości.</p>
					<p>Cenię BJJ także za sposób, w jaki rozwija cierpliwość, systematyczność i świadomość własnego ciała. Każdy wypracowany postęp daje dużą satysfakcję, a formuła oparta na chwytach i kontroli — w porównaniu ze sportami uderzanymi — ogranicza ekspozycję na urazy związane z ciosami w głowę, pozostawiając jednocześnie realną walkę i rywalizację.</p>',
			),
			array(
				'q' => 'Jakie masz osiągnięcia w BJJ?',
				'a' => '<p>W 2025 roku zdobyłem złoty medal Mistrzostw Polski BJJ w kategorii Masters, startując jako biały pas. Obecnie trenuję jako niebieski pas i przygotowuję się do kolejnych zawodów.</p>',
			),
			array(
				'q' => 'Co oznacza tagline „Niebieski pas BJJ, czarny pas PHP”?',
				'a' => '<p>To skrótowe, pół żartem, pół serio połączenie dwóch ważnych obszarów mojego życia. Niebieski pas BJJ oznacza aktualny etap mojej sportowej drogi i gotowość do dalszej nauki.</p>
				<p>„Czarny pas PHP” jest metaforą ponad dwóch dekad praktyki w programowaniu, pracy przy realnych systemach i konsekwentnego rozwijania warsztatu. Nie oznacza formalnego certyfikatu, lecz doświadczenie budowane przez lata rozwiązywania problemów, odpowiedzialność za produkcję i ciągłe uczenie się.</p>',
			),
			array(
				'q' => 'Czym zajmujesz się poza programowaniem?',
				'a' => '<p>Trenuję brazylijskie jiu-jitsu i sporty siłowe, nurkuję, a na siłowni często słucham audiobooków science fiction. Część tych zainteresowań dokumentuję na <a href="https://youtube.com/user/eznawca" target="_blank" rel="noopener">YouTube</a>.</p>',
			),
			array(
				'q' => 'Gdzie można śledzić Twoją aktywność?',
				'a' => '<p>Materiały techniczne publikuję również na <a href="https://lekcjephp.pl/" target="_blank" rel="noopener">LekcjePHP.pl</a>. Aktualne doświadczenie zawodowe znajdziesz na <a href="https://www.linkedin.com/in/andrzej-mazur/" target="_blank" rel="noopener">LinkedIn</a>, wybrane materiały wideo na <a href="https://youtube.com/user/eznawca" target="_blank" rel="noopener">YouTube</a>, a bardziej bieżące aktywności i kulisy projektów na <a href="https://www.instagram.com/eznawca/" target="_blank" rel="noopener">Instagramie</a>.</p>',
			),
		),
	),
);
