# Andrzej Mazur EZNAWCA - strona personalna - personal branding

## Opis systemu
- Prosty model MVC
  - Pliki widoków PHP z rozszerzeniem .phtml
- Stylizacja Bootstrap 5.3
- Projekt zawiera pod witrynę "Matematyk" `/mat/` jako osobny byt i podczas refaktoringu i globalnych zmian unikamy jego
zmiany, chyba że to absolutnie konieczne.

## Czego oczekuję
- Dobre SEO
   - Nie OSP. Tylko osobne strony z osobnym Meta i Schema.org
- Dobre AEO
   - Systemy Pytań i odpowiedzi
   - Inne (do przyszłej analizy)


## Nawigacja i wygląd
- Szeroka strona zgodna z najszerszym układem Bootstrap 5.3
- Nawigacja - górne menu typu sticky (może byc z inteligentnym ukrywaniem gdy scroll w dół i pokazywane gdy scroll w górę)
- Menu półprzezroczyste blure.
- Za obrazy wykorzystaj jak nawięcej grafike wektorową SVG
   - Na ikony, obrazy symboliczne wykorzystaj ikony z zasobów: https://icons.getbootstrap.com/
   - Tam gdzie wymagana bitmapowa grafika bezstratna wykorzystaj PNG.
   - Dla zdjęć wykorzystaj JPG lub lepiej WEBP
   - Na logo skorzystaj: eznawca-old/img/eznawca-logo.svg

## DataBase
- Na początek plik PHP, z rozbudowaną tabelą array(). Priorytetem ma być szybkość działania!

## PHP
Aktualnie PHP 7.4, planowane migracje do PHP 8.x

Dostępna biblioteka polyfilli `upgrade_to_php8.lib.php` rozszerza PHP o:
array_is_list, array_key_first, array_key_last, fdiv, get_debug_type,
get_mangled_object_vars, hrtime, intdiv, is_countable, is_iterable,
json_validate, mb_chr, mb_ord, mb_scrub, mb_str_pad, mb_str_split,
password_algos, random_bytes, random_int, str_contains, str_decrement,
str_ends_with, str_increment, str_starts_with

## Zasady formatowania kodu
Nie wyrównujemy zmiennych, operatorów, przypisań, operatorów tablicowych, operatorów trójargumentowych za pomocą dodatkowych spacji.
Używamy pojedynczych spacji wokół operatorów, zgodnie z czytelnością i standardami PSR.
Nie tworzymy wizualnych kolumn spacjami.

## Ciekawe strony WWW jako inspiracje
- https://kacperkreft.pl/ - ładna i ciekawa nawigacja
- https://devstyle.pl/ - obfitość treści
- https://marciniwuc.com/
- https://malawielkafirma.pl/ - dobra nawigacja
- https://kurasinski.com/ - estetyczna, minus OSP
- https://paweltkaczyk.com/ - ciekawa, mocno rozbudowana, prawdopodobnie dobre SEO
- https://arturjablonski.com/ - rozbudowana
- https://www.adhamdannaway.com/ - ładna strona i obfitość treści merytorycznych
   - https://www.adhamdannaway.com/blog/ui-design/ui-design-tips - można rozbudować blok pytań i odpowiedzi
   - https://www.adhamdannaway.com/blog/icons/free-icon-sets - to tez można zamienić na sugestie do pytań i odpowiedzi
   - https://www.adhamdannaway.com/blog/web-design/landing-page-design-inspiration - strony z inspiracjami
- https://maxibestof.one/ - ciekawa galeria stron z inspiracjami
- https://www.joshwcomeau.com/
- 