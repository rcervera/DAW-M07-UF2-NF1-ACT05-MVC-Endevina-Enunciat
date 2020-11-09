<?php

// Controlador per defecte de l'aplicació
class ControlDefault {

    function __construct() {
       // Sense control d'accès. Amb Accés lliure
       
    }
    
    // Mètode que es crida per defecte si no s'indica en la url cap mètode específic
    public function index() {
            // carrega la pàgina principal de l'aplicació
            include_once 'vistes/templates/header.php';  
            include_once 'vistes/default/principal.php';
            include_once 'vistes/templates/footer.php';                          
     
    }

}

?>
