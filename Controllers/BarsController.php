<?php

namespace App\Controllers;

use App\Models\BarsModel;

class BarsController extends Controller {

    public static function getBars () {
        $controller = new BarsController;

        $controller->render("bars", ["pageTitle" => "Barreaux - justice facile"]);
    }

    public static function getBarDetails() {
        $controller = new BarsController;

        if(isset($_GET['id']) && $_GET['id'] != "") {
            $barsModel = new BarsModel;
            $barDetails = $barsModel->findById($_GET['id']);
        }

        $controller->render("barDetails", ["barDetails" => $barDetails, "pageTitle" => "Barreau en détails - justice facile"], "emptyTemplate");
    }
}

