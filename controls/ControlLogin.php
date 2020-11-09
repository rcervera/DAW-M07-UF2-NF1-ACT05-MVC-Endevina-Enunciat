<?php

class ControlLogin {

    // per emmagatzemar el model al que preguntarem si l'usuari és correcte
    private $usuaris;

    function __construct() {
        include_once 'models/Usuaris.php';
        // Carreguem el model d'usaris. Té un mètode per comprovar
        // si el password i l'username són correctes
        $this->usuaris = new Usuaris();
    }

    function index() {
        // carreguem el formulari de validació d'usuari        
        include_once 'vistes/login/login.php';        
    }


    // Mètode que comprova si el username i el password entrats en el formuali de login
    // són correctes.
    public function login() {
        
        // No s'ha enviat la informació requerida ha través del formulari
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            $_SESSION['missatge'] = "Has de passar pel formulari";
            header('Location: index.php?control=ControlLogin');
            exit;
        }

        $user = $_POST['username'];
        $pwd = $_POST['password'];

        // Algun camp en blanc
        if ($user == "" || $pwd == "") {
            $_SESSION['missatge'] = "Els camps són obligatoris!";
            header('Location: index.php?control=ControlLogin');
            exit;
        }
            
        // usuari incorrecte    
        if ($this->usuaris->valida($user, $pwd)==false) {
            $_SESSION['missatge'] = "Usuari o password incorrectes";
            header('Location: index.php?control=ControlLogin');
            exit;           
        } 
        
        // usuari validat correctament
        // enregistrem en la sessió el valor de username
        $_SESSION['username'] = $user;                                                  
        header('Location: index.php');
        exit;
            
    }


    // Mètode per tancar la sessió
    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

}

?>
