<?php

namespace App;

class Autoloader 
{   
    /**
     * Permet d'enregistrer l'autoloader
     *
     * @return void
     */
    public static function register () 
    {
        //fonction qui détecte l'instanciation d'une nouvelle classe
        spl_autoload_register([
            //va chercher la classe qu'on souhaite instancier
            __CLASS__, 
            //callback
            'autoload'
        ]);

    }

    public static function autoload($class)
    {
        //on récupère dans $class la totalité du namespace du fichier concerné

        // on retire "App\" du namespace (__NAMESPACE__ : namespace dans lequel on se trouve)
        $class = str_replace(__NAMESPACE__ . "\\", "", $class);
        //on remplace les antislash par des slash
        $class = str_replace("\\", "/", $class);

        //on vérifie que le fichier existe (__DIR__ : chemin du fichier dans lequel se trouve la classe Autoloader(chemin du fichier dans lequel on se trouve))
        $fichier = __DIR__ . "/" . $class . ".php";
        if(file_exists($fichier)) {
            //on charge le fichier voulu
            require_once $fichier;
        }
  
    }
}