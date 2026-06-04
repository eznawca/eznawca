<?php
$p=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
if($p==='/mat'||strpos($p,'/mat/')===0){$mf=__DIR__.$p;if($p!=='/mat/'&&$p!=='/mat'&&is_file($mf))return false;chdir(__DIR__.'/mat');require __DIR__.'/mat/index.php';return true;}
$f=__DIR__.$p;if($p!=='/'&&is_file($f))return false;require __DIR__.'/index.php';
