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

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.sujet_id = :id";

    return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function addMessage() {

        if(isset($_POST["submit"])) {

            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "INSERT INTO  message(texte)
                    VALUES (:texte)";

            DAO::insert($sql, ['texte' => $texte]);
        }
    }
}
