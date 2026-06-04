# Andrzej Mazur EZNAWCA - strona personalna - personal branding

## Git
- Pracuj bezpośrednio na bieżącym branchu, nie twórz nowych branchy
- Nie commituj zmian samodzielnie
- Nie twórz Pull Requestów

## Framework
Czysty PHP 7.4 z mozliwością migracji do PHP 8.x,
MVC z szablonami PHP z roszerzeniem .phtml
Dostępna biblioteka polyfilli `core/upgrade_to_php8.lib.php` rozszerza PHP o:
array_is_list, array_key_first, array_key_last, fdiv, get_debug_type,
get_mangled_object_vars, hrtime, intdiv, is_countable, is_iterable,
json_validate, mb_chr, mb_ord, mb_scrub, mb_str_pad, mb_str_split,
password_algos, random_bytes, random_int, str_contains, str_decrement,
str_ends_with, str_increment, str_starts_with

## Podsystemy
- **Matematyk** — zawiera pod witrynę `/mat/` jako osobny byt i podczas refaktoringu i globalnych zmian unikamy jego zmiany, chyba że to absolutnie konieczne.

## PHP — zasady wersjonowania
Aktualnie: PHP 7.4. Planowane migracje: PHP 8.x

**Reguła:** Pisz najnowocześniejszy kod możliwy na PHP 7.4, kompatybilny z PHP 8.x

## JavaScript
- Vanilla JS ES6+ bez jQuery

## CSS
Bootstrap 5.3, customizowany przez:
`css/bootstrap_custom.css`.
Nie nadpisuj klas Bootstrap inline — zmiany globalne tylko przez ten plik.
Nowe specyficzne klasy (konwencja wzorowana na Bootstrap) w pliku:
`css/index.css`

## Preferencje kodowania
- Stosuj kodowanie UTF-8
- Używaj tabulatorów do wcięć.
- Nie wyrównuj kody za pomocą spacji przed znakami równości "=", czy też znaku zapytania "?", czy dwukropka ":".
- Dostępna jest biblioteka polyfilli `core/upgrade_to_php8.lib.php` rozszerza PHP 5.6 o funkcje:
  array_is_list, array_key_first, array_key_last, fdiv, get_debug_type, get_mangled_object_vars, hrtime, intdiv,
  is_countable, is_iterable, json_validate, mb_chr, mb_ord, mb_scrub, mb_str_pad, mb_str_split, password_algos,
  random_bytes, random_int, str_contains, str_decrement, str_ends_with, str_increment, str_starts_with.
- Jeżeli to poprawiłoby czytelność kodu, to używaj tych funkcji polyfilli.

## Zasady formatowania kodu
Nie wyrównujemy zmiennych, operatorów, przypisań, operatorów tablicowych, operatorów trójargumentowych za pomocą dodatkowych spacji.
Używamy pojedynczych spacji wokół operatorów, zgodnie z czytelnością i standardami PSR.
Nie tworzymy wizualnych kolumn spacjami.
