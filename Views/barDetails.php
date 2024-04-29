<div class="bar__details__global__wrapper">
    <div class="bar__details__header__wrapper">
        <i class="fa-solid fa-hotel"></i>
        <h1>Barreau de <?= $barDetails->name ?></h1>
    </div>
    <div class="bar__details__wrapper">
        <p>Adresse :  <?= $barDetails->address ?></p>
        <p>Nombre d'avocats : <?= $barDetails->nombre_avocats ?></p>
        <p>Cour d'appel : <?= $barDetails->cour_appel ?></p>
        <p>Site internet : <a target = "_blank" href= "https://<?= $barDetails->site_internet?>"><?= $barDetails->site_internet?></a></p>
        <p>Numéro de téléphone : <a href= "tel:<?=$barDetails->numero_telephone?>"><?= $barDetails->numero_telephone?></a></p>
    </div>
    <a id = "previous__link" href="<?= $_SERVER['HTTP_REFERER']?>"><i class="fa-solid fa-arrow-left-long"></i> Page précédente</a>
</div>