<?php

namespace App;

use App\Models\AvocatsModel;
use App\Autoloader;

//on importe l'autoloader
require_once '../Autoloader.php';
Autoloader::register();


//nom de l'avocat-----------------------------------------------------------------------
if(isset($_GET['name']) && !empty($_GET['name'])) {
    $name = trim($_GET['name']);

    $avocatsModel = new AvocatsModel;

    $avocatsByName = $avocatsModel->doQuery("SELECT DISTINCT Nom FROM avocats WHERE Nom LIKE :Nom LIMIT 10",[":Nom" => "$name%"])->fetchAll();

    if($avocatsByName) {
        ?>
        <ul class ="ajax__results__list">
        <?php
            foreach($avocatsByName as $avocatByName): ?> 
                <li class ="name__item">
                    <?=$avocatByName->Nom ?>
                </li>
        <?php endforeach; ?>
        </ul>
<?php
    }
}

//ville de l'avocat--------------------------------------------------------------------
if(isset($_GET['city']) && !empty($_GET['city'])) {
    $city = trim($_GET['city']);

    $avocatsModel = new AvocatsModel;

    $avocatsByCity = $avocatsModel->doQuery("SELECT DISTINCT Ville FROM avocats WHERE Ville LIKE :Ville LIMIT 10",[":Ville" => "$city%"])->fetchAll();

    if($avocatsByCity) {
        ?>
        <ul class ="ajax__results__list">
        <?php
            foreach($avocatsByCity as $avocatByCity): ?> 
                <li class ="city__item">
                    <?=$avocatByCity->Ville ?>
                </li>
        <?php endforeach; ?>
        </ul>
<?php
    }
}




    

    

