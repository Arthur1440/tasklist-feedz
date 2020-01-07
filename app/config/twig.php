<?php
$twig = new \Slim\Views\Twig();
$app->view( $twig );
$app->view->parserOptions = array(
  'charset'          => 'utf-8',
  'cache'            => realpath('app/views/cache'),
  'auto_reload'      => true,
  'strict_variables' => false,
  'autoescape'       => true
);

/* Twig Globals */
$twig->getEnvironment()->addGlobal('baseUrl', _BASEURL);
$twig->getEnvironment()->addGlobal('public', _BASEURL . '/public');