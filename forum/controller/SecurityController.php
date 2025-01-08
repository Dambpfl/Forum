<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {

        // si formulaire submit
        if(isset($_POST["submit"])) {
                // check filtre
                $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // condition regex
                $passRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/";

                // si filtre ok
                if($pseudo && $email && $pass1 && $pass2) {
                    $utilisateurManager = new UtilisateurManager();
                 
                // filtre regex
                $passValid = filter_var($pass1, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => $passRegex],]);

                // si pass valide
                if($passValid) {
                    var_dump("mdp valide");
                    // continue
                } else {
                    echo "Mot de passe invalide"; die;
                }

                //  verif si mail existe dans la bdd
                $mail = $utilisateurManager->foundEmail($email);

                if($mail) {
                   // si mail deja utilisé
                } else {
                    // verif si le pseudo existe dans la bdd
                    $name = $utilisateurManager->foundPseudo($pseudo);

                    
                    if($name) {
                       // si pseudo deja utilisé
                    } else {
                        // verif si les deux mdp correspondent
                        if($pass1 === $pass2) {
                            
                            // add l'utilisateur dans la bdd avec mdp hashé
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