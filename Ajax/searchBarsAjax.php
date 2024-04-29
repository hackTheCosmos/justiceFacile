<?php

namespace App;

use App\Models\BarsModel;
use App\Autoloader;

//on importe l'autoloader
require_once '../Autoloader.php';
Autoloader::register();


if(isset($_GET['city']) && !empty($_GET['city'])) {
    $city = trim($_GET['city']);

    $barsModel = new BarsModel;

    $barsByCity = $barsModel->doQuery("SELECT DISTINCT name FROM barreaux WHERE name LIKE :Ville LIMIT 10",[":Ville" => "$city%"])->fetchAll();

    if($barsByCity) {
        ?>
        <ul class ="ajax__results__list">
        <?php
            foreach($barsByCity as $barByCity): ?> 
                <li class ="city__item">
                    <?=$barByCity->name ?>
                </li>
        <?php endforeach; ?>
        </ul>
<?php
    }
}

if(isset($_POST['city']) && $_POST['city'] != "") {
    $city = trim($_POST['city']);

    $barsModel = new BarsModel;

    $barByCity = $barsModel->doQuery("SELECT *  FROM barreaux WHERE name = :Ville",[":Ville" => $city])->fetch();

    if($barByCity):
    ?>
        <div class="bar__item__wrapper">
            <i class="fa-solid fa-hotel"></i>
            <h2>Barreau de <?= $barByCity->name ?></h2>
            <p><i class="fa-solid fa-location-dot"></i> <?= $barByCity->address?></p>
            <a href="index.php?page=bar-details&id=<?= $barByCity->id ?>">Plus d'infos</a>
        </div>
    <?php endif;

}