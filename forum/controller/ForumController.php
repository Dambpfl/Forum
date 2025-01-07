<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\SujetManager;
use Model\Managers\MessageManager;
use Model\Managers\UtilisateurManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categorieManager = new CategorieManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categorieManager->findAll(["nomCategorie", "ASC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listSujetsByCategorie($id) {

        $sujetManager = new SujetManager();
        $categorieManager = new CategorieManager();
        $categorie = $categorieManager->findOneById($id);
        $sujet = $sujetManager->findSujetsByCategorie($id);

        return [
            "view" => VIEW_DIR."forum/listSujets.php",
            "meta_description" => "Liste des topics par catégorie : ".$categorie,
            "data" => [
                "categorie" => $categorie,
                "sujet" => $sujet
            ]
        ];
    }

    public function listMessagesBySujet($id) { 

        $messageManager = new MessageManager();
        $sujetManager = new SujetManager();
        $sujet = $sujetManager->findOneById($id);
        $messages = $messageManager->findMessagesBySujet($id);

        return [
            "view" => VIEW_DIR."forum/listMessages.php",
            "meta_description" => "Liste des messages par sujets : ".$sujet,
            "data" => [
                "sujet" => $sujet,
                "messages" => $messages
            ]
        ];
        
    }

    public function addMessage($id) {

       $messageManager = new MessageManager();
       $sujetManager = new SujetManager();
       $utilisateurManager = new UtilisateurManager();
       $utilisateur = 1;
       $sujet = $sujetManager->findOneById($id);

            if (isset($_POST["submit"])) {

                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($texte) {
                    $messageManager->add(["sujet_id" => $id,
                                          "utilisateur_id" => $utilisateur,
                                          "texte" => $texte]);
                    }
            }
        $this->redirectTo("forum", "listMessagesBySujet", $id);
    }

    public function addSujet($id) {
        
        $categorieManager = new CategorieManager();
        $sujetManager = new SujetManager();
        $utilisateurManager = new UtilisateurManager();
        $utilisateur = 1;
        $categorie = $categorieManager->findOneById($id);

            if (isset($_POST["submit"])) {

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($titre && $texte) {
                        $idSujet = $sujetManager->add(["categorie_id" => $id,
                                                       "utilisateur_id" => $utilisateur,
                                                       "titre" => $titre]);

                    if ($texte) {
                        $messageManager = new MessageManager();
                        $messageManager->add(["sujet_id" => $idSujet,
                                              "utilisateur_id" => $utilisateur,
                                              "texte" => $texte]);
                                            }
                    }
            }
        $this->redirectTo("forum", "listSujetsByCategorie", $id);
    }

    public function verrouillerSujet($id) {

        $sujetManager = new SujetManager();
        $categorieManager = new CategorieManager();
        
        $sujet = $sujetManager->findOneById($id); 
        $idCategorie = $sujet->getCategorie()->getId();

        if ($sujet) {
            $sujetManager->updateSujet($id);
        }

        $this->redirectTo("forum", "listSujetsByCategorie", $idCategorie);
    }
}