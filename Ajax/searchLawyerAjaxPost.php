<?php

namespace App;

use App\Models\AvocatsModel;
use App\Autoloader;
use Stringable;

//on importe l'autoloader
require_once '../Autoloader.php';
Autoloader::register();

//affichage des résultats de la recherche

$avocatsModel = new AvocatsModel;

$limitPerPage = 10;

if(!isset($_POST['page_no'])) {
    $_POST['page_no'] = 1;
}
$page = $_POST['page_no'];

$offset = ($page -1 ) * $limitPerPage;

//si seulement le champs nom est rempli
if(isset($_POST['name']) && !empty($_POST['name']) && $_POST['city'] === "") {
    
    $name = trim($_POST['name']);

    $avocats = $avocatsModel->doQuery("SELECT * FROM avocats WHERE Nom = :Nom LIMIT {$offset}, {$limitPerPage}", [":Nom" => str_replace('_', ' ', $name)])->fetchAll();

    $nbOfResults = $avocatsModel->doQuery("SELECT COUNT(id) as nb FROM avocats WHERE Nom = :Nom", [":Nom" => str_replace('_', ' ', $name)])->fetch();

    
}

//si seulement le champs ville est rempli
if(isset($_POST['city']) && !empty($_POST['city'] && $_POST['name'] === "")) {
    
    $city = trim($_POST['city']);

    $avocats = $avocatsModel->doQuery("SELECT * FROM avocats WHERE Ville = :Ville LIMIT $offset, $limitPerPage", [":Ville" => str_replace('_', ' ', $city)])->fetchAll();
    $nbOfResults = $avocatsModel->doQuery("SELECT COUNT(*) as nb FROM avocats WHERE Ville = :Ville", [":Ville" => str_replace('_', ' ', $city)])->fetch();
} 

//si les champs nom et ville sont tous les deux remplis
if(isset($_POST['city']) && $_POST['city'] != "" && isset($_POST['name'])  && $_POST['name'] != "") {
    $name = trim($_POST['name']);
    $city = trim($_POST['city']);

    $avocats = $avocatsModel->doQuery("SELECT * FROM avocats WHERE Nom=:Nom AND Ville=:Ville LIMIT $offset, $limitPerPage", [ ":Nom" => str_replace('_', ' ', $name), ":Ville" => str_replace('_', ' ', $city)])->fetchAll();

    $nbOfResults = $avocatsModel->doQuery("SELECT COUNT(*) as nb FROM avocats WHERE Nom=:Nom AND Ville=:Ville", [ ":Nom" => str_replace('_', ' ', $name), ":Ville" => str_replace('_', ' ', $city)])->fetch();
}

if(isset($nbOfResults->nb)) {

    $totalOfPages = ceil($nbOfResults->nb/$limitPerPage);
}

if(isset($avocats)) :
    if($nbOfResults->nb > 0) : ?>
    <div class="nb__of__results__wrapper">
        <div class="">
            <p>Résultat : <?= $nbOfResults->nb ?> avocat(s)</p>
            <p>Page <?= $page ?> / <?= $totalOfPages ?></p>
        </div>
        <?php if($page > 1) : ?>
            <a href="#" class ="previous__link" id ="<?= $page - 1 ?>"><i class="fa-solid fa-arrow-left-long"></i> Page précédente</a>
        <?php endif; ?>
    </div>
    <?php endif; 
    foreach($avocats as $avocat): ?>
        <div class ="lawyer__item__wrapper">

            <img src="Public/medias/images/lawyerAvatar.jpg" alt="avatar par défaut">
            <h2><?= $avocat->Nom?> <?= $avocat->Prenom?></h2>
            <h3>Barreau de <?= $avocat->NomBarreau?></h3>
            <div class="address__wrapper">
                <p><i class="fa-solid fa-location-dot"></i> <?= $avocat->Adresse?></p>
                <p><?= $avocat->CodePostal?> <?=$avocat->Ville ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="pagination__wrapper" id ="pagination">
        <?php if(isset($nbOfResults->nb) && $nbOfResults->nb > $limitPerPage): ?>
            <a href="" id ="<?= $page + 1?>">plus de résultats</a>
        <?php endif; ?>
    </div>

<?php endif;
    


