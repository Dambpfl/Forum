<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class MessageManager extends Manager{

    protected $className = "Model\Entities\Message";
    protected $tableName = "message";

    public function __construct(){
        parent::connect();
    }

    public function findMessagesBySujet($id) {

        $sql = "SELECT id_message, texte, dateCreation,
                sujet_id, utilisateur_id 
                FROM ".$this->tableName." t             
                WHERE t.sujet_id = :id
                ORDER BY dateCreation";

    return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
}
