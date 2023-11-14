<?php

/**
 * Classe CoreModel
 * cette classe sera héritée par tous les modèles de notre application
 * 
 * on y met donc toutes les propriétés & méthodes communes à chaque modèle
 */
class CoreModel
{
    // on est obligés de mettre ces propriétés en protected
    // pour que PDO puisse automatiquement les remplir quand il instancie nos objets !
    protected $id;
  

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

}
