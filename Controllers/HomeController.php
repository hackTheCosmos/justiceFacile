<?php

namespace App\Controllers;


class HomeController extends Controller {

    public static function getHome() {
        $controller = new HomeController;

        $controller->render("home", ["pageTitle" => "Accueil - justice facile"]);
    }
}