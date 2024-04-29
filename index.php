<?php

use App\Autoloader;
use App\core\Router;

//on définit une constante contenant le dossier racine du projet
define("ROOT", dirname(__DIR__));

//on importe l'autoloader
require_once 'Autoloader.php';
Autoloader::register();

Router::route();

// On démarre l'application
session_start();

