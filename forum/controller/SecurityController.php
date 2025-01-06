<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
         // le controller communique avec la vue "inscription" (view)
         return [
             "view" => VIEW_DIR."forum/inscription.php",
             "meta_description" => "S'inscrire",
             ];
    }

    public function login () {
        // le controller communique avec la vue "connexion" (view)
        return [
            "view" => VIEW_DIR."forum/connexion.php",
            "meta_description" => "Se connecter",
            ];
    }
    public function logout () {}
}