<?php

# === Para mostrar todos erros
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors','On');

# === Session
session_cache_limiter(false);
@session_start();

# === Constants
# ==================================================
// coloque o caminho certo do teu server
define("_BASEURL", 'http://127.0.0.1:8000');


# === Autoload
# ==================================================
require_once 'vendor/autoload.php';

# === Slim Initialize
# ==================================================
$app = new \Slim\Slim(array(
  'debug'                => true,
  'mode'                 => 'development',
  'templates.path'       => 'app/views',
  'database.fetch'       => PDO::FETCH_CLASS,
  'database.default'     => 'main',
  'database.connections' => array(
    'main' => array(
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'tasklist',
      'username'  => 'root',
      'password'  => '123456',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => ''
    )
  )
));

# === Slim Services
# ==================================================
require_once 'app/config/services.php';

# === Twig Template
# ==================================================
require_once 'app/config/twig.php';

# === Routes
# ==================================================
require_once 'app/routes.php';

# === Vars - Constantes Globais
# ==================================================
require_once 'app/vars.php';

# === Run Slim
$app->run();