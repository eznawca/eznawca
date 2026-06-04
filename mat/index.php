<?php
/**
* @author Andrzej Mazur <andrzej@eznawca.com>
* @version 1.0
*/
ini_set('display_errors', 1);	// 'On'
ini_set('display_startup_errors', 'On');
error_reporting(E_ALL); // E_STRICT
set_time_limit(360);
date_default_timezone_set('Europe/Warsaw');
setlocale(LC_CTYPE, 'de_DE.utf-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

//require('./lib/comm.lib.php');
//require('index.cfg.php');
//require('./lib/config.lib.php');
//require('./lib/mypdo.lib.php');

define('SCRIPTNAME', preg_replace('/[^\w\d_\.\/\\\:-]/', '', $_SERVER['SCRIPT_NAME']));
define('BASE_SELF', basename(SCRIPTNAME));
// define('BASE_DIR', (dirname(SCRIPTNAME) == DIRECTORY_SEPARATOR)?'':dirname(SCRIPTNAME));
define('BASE_DIR', rtrim(dirname(SCRIPTNAME), DIRECTORY_SEPARATOR));
define('BASE_PATH', realpath(dirname(__FILE__)));

define('DEFAULT_ID', 'main');

define('PHTML_PATH', '/phtml');

function r($a, $exit = false) {
	echo '<pre>'.str_replace(['<', '>'], ['&lt;', '&gt;'], print_r($a,1));
	if ($exit) exit;
}

function htmlHead($desc) {
	$desc = substr($desc,1);
	echo '<!doctype html>'.PHP_EOL.'<html lang="pl">'.PHP_EOL;
	echo '<head>'.PHP_EOL;
	//echo '<link rel="preconnect" href="//www.youtube.com">'.PHP_EOL;
	//echo '<link rel="preconnect" href="//youtu.be">'.PHP_EOL;
	echo '<link rel="preconnect" href="//fonts.googleapis.com">'.PHP_EOL;
	echo '<link rel="preload" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap&subset=latin-ext" rel="stylesheet" as="style">'.PHP_EOL;
	echo '<meta charset="utf-8">'.PHP_EOL;
	echo '<meta http-equiv="Content-Language" content="pl">'.PHP_EOL;
	echo '<meta name="robots" content="index, follow">'.PHP_EOL;
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
	echo '<meta content="initial-scale=1, width=device-width" name=viewport>'.PHP_EOL;
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.PHP_EOL;

	if (empty($desc)) {
		echo '<title>Edukacyjny program Matematyk - kompleksowy edukacyjny program do matematyki - geometria artmetyka matematyka równania zadania podręcznik wzory</title>'.PHP_EOL;
		echo '<meta name="Discription" content="Program Matematyk - Edukacyjny program do matematyki - geometria artmetyka matematyka równania zadania podręcznik wzory funkcja pochodna całka">'.PHP_EOL;
		echo '<meta name="keywords" content="apps matematyka mathematics math edukacja education wzór funkcja równania zadania podręcznik manual geometria całka ampartner szkoła liceum nauka kursy korepetycje uczelnie informatyka programowanie www strony witryny aplikacje php">'.PHP_EOL;
	} else {
		$arrDesc = explode(' ', mb_strtolower($desc));
		foreach($arrDesc as $k => $word) if (mb_strlen($word) < 3) unset($arrDesc[$k]);
		$arrDesc = array_unique($arrDesc);
		echo '<title>'.htmlspecialchars($desc).' - Matematyk program edukacyjny</title>'.PHP_EOL;
		echo '<meta name="Discription" content="'.htmlspecialchars($desc).' - Program Matematyk">'.PHP_EOL;
		echo '<meta NAME="keywords" content="'.implode(' ', $arrDesc).'">'.PHP_EOL;
	}

	echo '<link rel="shortcut icon" href="'.BASE_DIR.'/favicon.ico">'.PHP_EOL;
	echo '<meta name="author" content="Andrzej Mazur">'.PHP_EOL;
	echo '<meta name="copyright" content="Copyright (c) Andrzej Mazur - ENZAWCA.pl">'.PHP_EOL;
	echo '<meta name="reply-to" content="eznawca@gmail.com">'.PHP_EOL;
	//echo '<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap&subset=latin-ext" rel="stylesheet">'.PHP_EOL;
	echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap&subset=latin-ext" rel="stylesheet">'.PHP_EOL;
	//echo '<link rel="stylesheet" href="'.BASE_DIR.'/css/szablon.css" type="text/css">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.BASE_DIR.'/css/index.css" type="text/css">'.PHP_EOL;
	echo '</head>'.PHP_EOL;
}


function htmlHeader() {
	echo '<header>
<div class="logo">
		<a href="'.BASE_DIR.'/" title="Matematyk - Strona główna"><img src="'.BASE_DIR.'/img/mat.gif" width="155px" height="45px" alt="Matematyk"></a><br>
</div>

<a href="https://lekcjephp.pl" target="_blank" class="banner"><picture>
	<source srcset="'.BASE_DIR.'/banners/banner-lekcjephp-468x60.webp" type="image/webp">
	<source srcset="'.BASE_DIR.'/banners/banner-lekcjephp-468x60.png" type="image/png">
	<img role="banner" src="'.BASE_DIR.'/banners/banner-lekcjephp-468x60.png" alt="Banner" title="Darmowy kurs WebDev z jezykiem PHP server side na bankendzie">
</picture></a>

</header>';
}

function htmlNav() {
	$mainMenu = [
		['href' => '/?id=start', 'img' => 'start.gif', 'label' => 'Start', 'alt' => 'Rozpocznij pracę z programem', 'title' => 'Rozpocznij pracę z programem'],
		['href' => '/?id=elementy', 'img' => 'elementy.gif', 'label' => 'Opcje', 'alt' => 'Moduły opcje i funkcje', 'title' => 'Najciekawsze moduły, opcje i funkcje'],
		['href' => '/?id=mapa', 'img' => 'mapa.gif', 'label' => 'Mapa', 'alt' => 'Mapa programu', 'title' => 'Interaktywna mapa programu'],
		['href' => '/?id=naucz', 'img' => 'naucz.gif', 'label' => 'Nauczyciele', 'alt' => 'Dla nauczycieli', 'title' => 'Dla nauczycieli', 'style'=>' style="letter-spacing:-.6px"'],
		['href' => '/?id=autorzy', 'img' => 'autorzy.gif', 'label' => 'Autorzy', 'alt' => 'Autorzy', 'title' => 'Autorzy programu'],
		['href' => '/?id=pomoc', 'img' => 'pomoc.gif', 'label' => 'Pomoc', 'alt' => 'Pomoc', 'title' => 'Pomoc'],
		['href' => 'https://eznawca.pl/', 'target' => ' target="_blank"', 'img' => 'ampartn1.gif', 'label' => 'Eznawca.pl', 'alt' => 'Programista PHP - EZNAWCA.pl Andrzej Mazur', 'title' => 'Przedź do witryny Autor', 'style'=>' style="letter-spacing:-.6px"', 'add' => '<br>']
	];

	echo '<nav>'.PHP_EOL;
	echo '<ul>'.PHP_EOL;
	foreach ($mainMenu as $v) {
		echo '<li>';
		if (!empty($v['add'])) echo $v['add'];
		if (strpos($v['href'], 'http') === 0) {
			echo '<a href="'.$v['href'].'"';
		} else {
			echo '<a href="'.BASE_DIR.$v['href'].'"';
		}
		echo ' title="'.$v['title'].'"'.@$v['target'].''.@$v['style'].'><img src="'.BASE_DIR.'/img/nav/'.$v['img'].'" alt="'.$v['alt'].'""><br>'.$v['label'].'</a></li>'.PHP_EOL;
	}
	echo '</ul>'.PHP_EOL;
	echo '</nav>'.PHP_EOL;
}

function mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

function htmlAside($id, $links) {
	echo '<aside>'.PHP_EOL;
	echo '<ul class="submenu">'.PHP_EOL;

	if ($id != 'sitemap') {
		foreach ($links as $param => $text) if (mb_strtolower($text) != 'wstecz') {
			if (strpos($param, 'http') === 0) {
				// Linki zewnętrzne
				echo '<li><a href="'.$param.'" target="_blank" class="ext" role="button">'.mb_ucfirst($text).'<svg><use xlink:href="#external"></svg></a>'.PHP_EOL;
			} else {
				// Linki wewnętrzne
				echo '<li><a href="'.BASE_DIR.'/?id='.$param.'" role="button">'.mb_ucfirst($text).'</a>'.PHP_EOL;
			}
		}
	}

	if (!empty($_SERVER['QUERY_STRING']) AND (strpos(@$_SERVER['HTTP_REFERER'], '://eznawca') !== false)) echo '<li><a href="'.$_SERVER['HTTP_REFERER'].'" class="back">&laquo; Wstecz</a>'.PHP_EOL;

	echo '<ul>'.PHP_EOL;
	echo '</aside>'.PHP_EOL;
}

function htmlSection($html) {
	echo '<section>'.PHP_EOL;
	echo $html;
	echo '</section>'.PHP_EOL;
}


function htmlFooter() {
	echo '<footer>'.PHP_EOL;
		echo 'Copyright &copy; 2008&#8202;-&#8202;'.date('Y').' by Andrzej Mazur EZNAWCA.pl &nbsp;<strong>&middot;</strong>&nbsp; All rights reserved &nbsp;<strong>&middot;</strong>&nbsp; ';
		echo '<a href="mailto:eznawca@gmail.com" title="Kontakt E-mail"><img src="'.BASE_DIR.'/img/ipoczta.gif" width="12" height="9" alt="" style="margin-right:2px">eznawca@gmail.com</a> ';
		echo '&nbsp;<strong>&middot;</strong>&nbsp; <a href="https://lekcjephp.pl" target="_blank" title="Kurs WebDev z back-end PHP - LekcjePHP.pl">LekcjePHP.pl</a>';
	echo '</footer>'.PHP_EOL;
}

/**
 * Wyciąganie linków tekstowych i na graficze z dokumentów
 */
function getLinksFromPage($content) {
	$links = [];

	// LINKI LOKALNE: href="/?id=start"
	preg_match_all('# href="'.BASE_DIR.'/\?id=([^"=<>]*)".*>(.*)</a>#Ui', $content, $matches);

	foreach ($matches[1] as $k => $param) {
		if (strpos($matches[2][$k], '<img') === false) {
			$links[$param] = trim(strip_tags($matches[2][$k]), ' ,;.');
		} else {
			preg_match('#.*alt="([^"]*)".*#Ui', $matches[2][$k], $out);
			$links[$param] = trim($out[1], ' ,;.');
		}
	}

	// LINKI ZEWNĘTRZNE: href="http://..."
	preg_match_all('# href="(https?://[^"<>]*)".*>(.*)</a>#Ui', $content, $matches);
	//r($content);r($matches);
	foreach ($matches[1] as $k => $param) {
		if (strpos($matches[2][$k], '<img') === false) {
			$links[$param] = trim(strip_tags($matches[2][$k]), ' ,;.');
		} else {
			preg_match('#.*alt="([^"]*)".*#Ui', $matches[2][$k], $out);
			$links[$param] = trim($out[1], ' ,;.');
		}
	}

	// LINK Z AREA
	// <area shape=rect coords="4, 24, 47, 67" href="/?id=ekrstart" alt="Start" title="Start - czyli zacznij naukę">
	preg_match_all('# href="'.BASE_DIR.'/\?id=([^"=<>]*)" alt="([^"<>]*)"#Ui', $content, $matches);
	foreach ($matches[1] as $k => $param) {
		$links[$param] = trim($matches[2][$k], ' ,;.');
	}

	//r($content);
	//r($matches);

	return $links;
}

//=== Main ===
$id = trim(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '', './'));
if (empty($id)) $id = DEFAULT_ID;

$path = BASE_PATH.PHTML_PATH.'/'.$id.'.phtml';
if (!is_readable($path)) $path = BASE_PATH.PHTML_PATH.'/'.DEFAULT_ID.'.phtml';

$str = str_replace("\r", '', file_get_contents($path));
$str = str_replace(['/img/', 'href="/'], [BASE_DIR.'/img/', 'href="'.BASE_DIR.'/'], $str);
if ($str[0] == '#') {
	list($desc, $content) = explode("\n", $str, 2);
} else {
	$desc = '';
	$content = $str;
}

$links = getLinksFromPage($content);
htmlHead($desc);
echo '<body>'.PHP_EOL;
htmlHeader();

echo '<main>'.PHP_EOL;

htmlNav();

htmlAside($id, $links);

htmlSection($content);

echo '</main>'.PHP_EOL;

htmlFooter();

include('./lib/svg.lib.php');

echo '</body></html>'.PHP_EOL;