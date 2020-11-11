<?php
include_once 'helpers/request.php';
// és obligatori posar aquest include per a que l'objecte
// d'aquest tipus es recuperi correctament de la sessió on es troba emmagatzemat
include_once 'models/GuessNumber.php';

class ControlEndevinar {

    private $jocEndevinar;

    function __construct() {
        // Comprovo que existeixi username en la sessió
        // Si no existeix no permeto continuar
        if (!isset($_SESSION['username'])) {
            // Tanquem la sessió i anem a la pàgina principal
             session_unset();
             session_destroy();
             header('Location: index.php');
             exit;
        }         
        
        // Recupero l'objecte emmagatzemat en la sessió         
        $this->jocEndevinar =  $_SESSION['jocEndevinar'] ;

    }

    function __destruct() {
       
         
    }

    
    function index() {
        // Variables que són necessàries en la vista
        $maxim = $this->jocEndevinar->getMaxim();
        $maxintents = $this->jocEndevinar->getMaxintents();
        $intents = $this->jocEndevinar->getIntents();
       
        $missatge = $this->jocEndevinar->getMissatge();
        $estat = $this->jocEndevinar->getEstat();

        include_once 'vistes/templates/header.php';
        include_once 'vistes/joc/joc.php';
        include_once 'vistes/templates/footer.php';   
           
        
    }

    function validar() {
        // Comprovació del número introduit a la caixa
       if(isset($_POST['numero'])) {
           
            $errors = array();
            $numero = validarInteger('numero',$errors,null,null,true);
            
            // Si no hi ha errors de tipus en l'entrada del número
            // Es comprova el número dins l'objecte de tipus joc 
            if(count($errors)==0) {
                $this->jocEndevinar->comprovaNumero($numero);
            }
            else $this->jocEndevinar->setMissatge($errors['numero']);                               
        }
        
        $this->index();

    }
    
    

}