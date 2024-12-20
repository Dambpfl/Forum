<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategorieManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Categorie";
    protected $tableName = "categorie";

    public function __construct(){
        parent::connect();
    }

    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.id_categorie = :id";

    return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
}