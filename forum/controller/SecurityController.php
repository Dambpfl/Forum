<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {

        if(isset($_POST["submit"])) {
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($pseudo && $email && $pass1 && $pass2) {
                $utilisateurManager = new UtilisateurManager();

                $mail = $utilisateurManager->foundEmail($email);
                if($mail) {
                    var_dump("email existe"); die;
                } else {
                    $name = $utilisateurManager->foundPseudo($pseudo);
                    if($name) {
                        var_dump("pseudo existe"); die;
                    } else {
                        if($pass1 === $pass2) {
                            
                            $utilisateurManager->add([
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'motDePasse' => password_hash($pass1, PASSWORD_DEFAULT)]);

                        } else {
                            var_dump("mdp incorrect"); die;
                        }
                        
                    }
                }
            }
        }
         // le controller communique avec la vue "inscription" (view)
         return [
             "view" => VIEW_DIR."forum/inscription.php",
             "meta_description" => "S'inscrire",
             ];
    }

    public function login () {

        if(isset($_POST["submit"])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if($email && $password) {
                $utilisateurManager = new UtilisateurManager();

                $mail = $utilisateurManager->foundEmail($email);
               
                if($mail) {
                    var_dump("mail existe");

                    $hash = $mail->getMotDePasse();
                    
                    if(password_verify($password, $hash)) {
                        $_SESSION['user'] = $mail;
                        //var_dump($_SESSION["pseudo"]); die;
                        header("Location:index.php"); exit;
                    }        
                } 
            }
        }
        // le controller communique avec la vue "connexion" (view)
        return [
            "view" => VIEW_DIR."forum/connexion.php",
            "meta_description" => "Se connecter",
            ];
    }
    public function logout () {
        unset($_SESSION["user"]);
        header("Location:index.php");
    }
}