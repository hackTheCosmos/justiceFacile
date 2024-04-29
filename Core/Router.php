<?php

namespace App\Core;

use App\Controllers\HomeController;
use App\Controllers\BarsController;

class Router {
    public static function route() {

        if(isset($_GET['page'])) {

            if($_GET['page'] === "home") {
                HomeController::getHome();
            }

            if($_GET['page'] === "bars") {
                BarsController::getBars();
            }

            if($_GET['page'] ==="bar-details") {
                BarsController::getBarDetails();
            }

        } else {
            HomeController::getHome();
        }
    }
}