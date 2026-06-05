# Andrzej Mazur EZNAWCA - strona personalna - personal branding

## Reguły dotyczące tokenów/kontekstu
- Nie skanuj całego repozytorium, chyba że zostaniesz o to wyraźnie poproszony.
- Ignoruj: vendor/ i katalogi wykluczone przez .gitignore.
- Gdy kontekst rozmowy robi się duży lub kończy się większy etap pracy, zasugeruj użycie /compact.

## Git
- Pracuj bezpośrednio na bieżącym branchu, nie twórz nowych branchy.
- Nie commituj zmian samodzielnie.
- Nie twórz Pull Requestów.
- Przed zmianami sprawdzaj `git status --short` i nie cofaj cudzych zmian.

## Cel projektu
- Strona personalna i personal branding Andrzeja Mazura / EZNAWCA.
- Priorytet: dobre SEO i AEO.
- Nie budujemy OSP/SPA. Każda istotna treść ma mieć osobną stronę, osobne meta, canonical, breadcrumb i dane strukturalne, gdy ma to sens.
- Treści mają być użyteczne dla ludzi oraz czytelne dla wyszukiwarek i modeli językowych.

## Architektura
- Czysty PHP 7.4 z możliwością migracji do PHP 8.x.
- Prosty MVC:
	- `index.php` rejestruje trasy.
	- `core/Router.php` obsługuje routing, także parametry typu `/portfolio/{slug}`.
	- `core/Controller.php` renderuje layout i widoki.
	- `views/_header.phtml` i `views/_footer.phtml` składają layout (płaski `views/`, partiale z prefiksem `_`).
	- Widoki mają rozszerzenie `.phtml`.
	- Treść strony piszemy wprost w jej szablonie. Kolekcje (np. wideo, karty) jako lokalna tablica + partial `views/_*_grid.phtml` włączany przez `require VIEW_PATH . '/_*.phtml'`.
- Wartości konfiguracyjne marki i domeny (nazwa, URL, social, SEO) trzymaj w `data/site.php`; `config/site.php` jedynie definiuje z nich stałą `SITE`.
- SEO/AEO jest scentralizowane w `core/Seo.php`.
- Dane statyczne projektu trzymaj w `data/*.php`. To jest szybka, wersjonowana analogia bazy danych.
- `data/*.php` ma być chude. Standard rekordu strony: `id`, `type`, `route`, `seo` (opcjonalnie `sitemap`). Trzymaj w danych tylko to, co czytane POZA szablonem: meta, menu, breadcrumb, sitemap, wejście JSON-LD.
- Wyjątki będące danymi, bo zasilają JSON-LD/sitemap: `faq` → `items.questions` (`q`/`a`), portfolio → cienki `items.projects` (`slug`, `title`, `subtitle`, `lead`). Pozostałą treść pisz w szablonie.
- Breadcrumb generuj z `route.parent` przez `SiteData::breadcrumb()`, a ręczny breadcrumb traktuj jako wyjątek.
- Modele mają być cienką warstwą nad `SiteData`, a nie miejscem przechowywania dużych tablic danych.

## Podsystemy
- **Matematyk** zawiera podwitrynę `/mat/` jako osobny byt.
- Podczas refaktoringu i globalnych zmian unikaj zmian w `/mat/`, chyba że zadanie wyraźnie tego dotyczy albo jest to absolutnie konieczne.
- Nie mieszaj stylów, routingu ani szablonów głównej strony z podsystemem `/mat/`.

## PHP - zasady wersjonowania
- Aktualnie: PHP 7.4. Planowane migracje: PHP 8.x.
- Pisz najnowocześniejszy kod możliwy na PHP 7.4, kompatybilny z PHP 8.x.
- Nie używaj składni dostępnej dopiero od PHP 8, np. union types, named arguments, match, nullsafe operator, attributes.
- Typy właściwości, typy argumentów i typy zwracane zgodne z PHP 7.4 są mile widziane tam, gdzie poprawiają czytelność.
- Dostępna jest biblioteka polyfilli `core/upgrade_to_php8.lib.php`, która rozszerza środowisko o:
	array_is_list, array_key_first, array_key_last, fdiv, get_debug_type,
	get_mangled_object_vars, hrtime, intdiv, is_countable, is_iterable,
	json_validate, mb_chr, mb_ord, mb_scrub, mb_str_pad, mb_str_split,
	password_algos, random_bytes, random_int, str_contains, str_decrement,
	str_ends_with, str_increment, str_starts_with.
- Jeżeli poprawia to czytelność kodu, używaj funkcji dostępnych przez polyfille, ale pamiętaj, że polyfill nie dodaje składni PHP 8.

## Routing i nowe strony
- Nową publiczną stronę dodawaj przez:
	- trasę w `index.php`,
	- kontroler w `controllers/`,
	- widok `.phtml` w `views/`,
	- wpis w `data/*.php` tylko dla tego, co czytane poza szablonem (meta, sitemap, JSON-LD); treść strony pisz w szablonie,
	- stronę w dynamicznym `sitemap.xml`, jeżeli ma być indeksowana.
- Każda indeksowana strona powinna mieć:
	- `title`,
	- `description`,
	- `canonical`,
	- breadcrumb, z wyjątkiem strony głównej,
	- JSON-LD, gdy pasuje do typu treści.
- Dla pytań i odpowiedzi używaj `FAQPage` JSON-LD (`FaqController`, z `faq.items.questions`).
- Każdy projekt portfolio ma własny szablon `views/portfolio-{slug}.phtml`; `PortfolioController::show` mapuje slug na plik i zwraca 404, gdy pliku brak.
- Cienki rekord w `items.projects` (title, lead) i pełna treść w szablonie projektu MUSZĄ być spójne — przy zmianie tytułu/leadu aktualizuj oba miejsca.
- JSON-LD trzymaj minimalny: Person + BreadcrumbList na każdej stronie, `FAQPage` na `/faq`, chudy `CreativeWork` na projekcie (`name`, `url`, `author` → Person). Bez `WebSite`.

## JavaScript
- Vanilla JS ES6+ bez jQuery.
- Skrypty trzymaj w `js/`.
- Nie dodawaj ciężkich bibliotek front-endowych bez wyraźnej potrzeby.

## CSS
- Bootstrap 5.3 jest ładowany z CDN.
- Bootstrap customizowany jest przez `css/bootstrap_custom.css`.
- Nie nadpisuj klas Bootstrap inline.
- Globalne zmiany tokenów, kolorów i wariantów Bootstrap rób w `css/bootstrap_custom.css`.
- Nowe specyficzne klasy, utility i style komponentów dodawaj w `css/index.css`.
- Konwencja nazw klas ma być zbliżona do Bootstrap.
- Nie dodawaj stylów inline w widokach, chyba że chodzi o wyjątkowo małą wartość dynamiczną, której nie da się sensownie przenieść do CSS.

## Preferencje kodowania
- Stosuj kodowanie UTF-8.
- Używaj tabulatorów do wcięć w PHP, PHTML, CSS i JS.
- Nie wyrównuj kodu spacjami przed znakami `=`, `?`, `:` ani operatorami tablicowymi.
- Używaj pojedynczych spacji wokół operatorów zgodnie z czytelnością i standardami PSR.
- Nie twórz wizualnych kolumn spacjami.
- Komentarze dodawaj tylko wtedy, gdy wyjaśniają decyzję lub złożony fragment.
- W szablonach używaj globalnego helpera `h()` (= `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`): escapuj w atrybutach, a między tagami wypisuj zaufaną treść wprost (`<?= $var ?>`); liczby rzutuj `(int)`.
- Nie pre-escapuj danych w `data/` — te same dane trafiają też do JSON-LD i XML sitemap, więc kodowanie pod HTML rozbiłoby tamte konteksty.
- Kolekcyjne partiale opisuj kontraktem `/** @var array $x */`, tak jak w `views/_video_grid.phtml`.

## Vendor, narzędzia i pliki poboczne
- Nie edytuj `vendor/` ręcznie.
- Nie edytuj `.idea/`, `.old/`, `.claude/` ani archiwów, chyba że zadanie wyraźnie tego dotyczy.
- `CLAUDE.md` może pozostać osobnym plikiem dla Claude. Dla Codex źródłem instrukcji projektu jest `AGENTS.md`.

## Weryfikacja
- Po zmianach w PHP uruchom lint dla zmienionych plików, np. `php -l path/to/file.php`, jeżeli PHP CLI jest dostępne.
- Lokalny serwer można uruchomić komendą `php -S localhost:8000 serve.php`, jeżeli PHP CLI jest dostępne.
- Przy zmianach front-endowych sprawdź stronę w przeglądarce na desktopie i mobile, jeżeli środowisko na to pozwala.
- Jeżeli narzędzie weryfikacyjne nie jest dostępne w bieżącej powłoce, napisz to w podsumowaniu zamiast udawać wykonanie testu.
