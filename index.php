<?php
/**
 * Front Controller — witryna brendu osobistego "Andrzej Mazur EZNAWCA".
 *
 * @author Andrzej Mazur <eznawca@gmail.com>
 */

require __DIR__ . '/core/bootstrap.php';

$router = new Router();

// --- Trasy -------------------------------------------------------------------
$router->get('/',                 [HomeController::class,      'index']);
$router->get('/o-mnie',           [AboutController::class,     'index']);
$router->get('/portfolio',        [PortfolioController::class, 'index']);
$router->get('/portfolio/{slug}', [PortfolioController::class, 'show']);
$router->get('/faq',              [FaqController::class,       'index']);
$router->get('/kontakt',          [ContactController::class,   'index']);
$router->get('/polityka-prywatnosci', [PrivacyController::class, 'index']);

// --- Dispatch ----------------------------------------------------------------
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
