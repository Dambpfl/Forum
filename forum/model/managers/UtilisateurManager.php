<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UtilisateurManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Utilisateur";
    protected $tableName = "utilisateur";

    public function __construct(){
        parent::connect();
    }

    public function addUser() {

        $sql = "INSERT INTO utilisateur
                VALUES ";

        try {
            return DAO::insert($sql);
        }
        catch(\PDOException $e){
            echo $e->getMessage();
            die();
        }
    }

    public function foundEmail($email) {

        $sql = "SELECT * from utilisateur
        WHERE utilisateur.email = :email";

        return  $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false), 
            $this->className
        );
    }

    public function foundPseudo($pseudo) {

        $sql = "SELECT pseudo from utilisateur
        WHERE utilisateur.pseudo = :pseudo";

        return  $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $pseudo]), 
            $this->className
        );
    }
}