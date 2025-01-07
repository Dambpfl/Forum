<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Utilisateur extends Entity{

    private $id;
    private $pseudo;
    private $motDePasse;
    private $dateInscription;
    private $role;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of nickName
     */ 
    public function getPseudo(){
        return $this->pseudo;
    }

    /**
     * Set the value of nickName
     *
     * @return  self
     */ 
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;

        return $this;
    }

    
    /**
     * Get the value of motDePasse
     */ 
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
    
    /**
     * Set the value of motDePasse
     *
     * @return  self
     */ 
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
        
        return $this;
    }
    
    /**
     * Get the value of dateInscription
     */ 
    public function getDateInscription()
    {
        return $this->dateInscription;
    }
    
    /**
     * Set the value of dateInscription
     *
     * @return  self
     */ 
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
        
        return $this;
    }
    
    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;
        
        return $this;
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function __toString() {
        return $this->pseudo;
    }
}