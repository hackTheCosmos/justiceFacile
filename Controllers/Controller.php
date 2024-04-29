<?php

namespace App\Controllers;

abstract class Controller 
{
    public function render(string $file, array $datas = [], string $template = "template")
    {  
        //on extrait les données et on transforme les clés en variables
        extract($datas);

        // on démare le buffer de sortie
        ob_start();//à partir de ce point toute sortie est conservé en mémoire

        // on créer le chemin vers la vue
        require_once "Views/$file.php";

        $content = ob_get_clean(); // stocke le buffer dans la variable pour l'injecter dans le contenu du template

        // template de la page
        require_once "Views/Template/$template.php";
    }
}