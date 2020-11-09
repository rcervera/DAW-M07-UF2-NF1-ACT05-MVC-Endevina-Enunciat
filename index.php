<?php
include_once 'models/GuestNumber.php';

// En mode implementació tindrem activats la visualització dels errors
error_reporting(E_ALL);
ini_set('display_errors', '1');

//////////////////////////////////////////////////////////
// Punt d'entrada únic a la nostra aplicació
//////////////////////////////////////////////////////////

// En aquesta part podem posar el codi d'inicialització
// global de l'aplicació: creació objectes comums, obrir sessió, ...

// Obrim sessió
session_name("ENDEVINAID");
session_start();

// Si encara no existeix un objecte per jugar desat a la sessió 
if(!isset($_SESSION['jocEndevinar']))
{     
    // creem un nou joc
    $jocEndevinar = new GuestNumber(100,10);
    // i el deso a la sessió per tenir-lo disponible en les properes crides
    // per tots els controladors
       
    $_SESSION['jocEndevinar']  = $jocEndevinar;
    
}


// url de la forma: index.php?control=nomControlador
if (isset($_GET['control'])) {
    $control = $_GET['control'];
    // comprovem que existeix el fitxer nomControlador.php
    if (file_exists('controls/' . $control . '.php')) {

        include_once 'controls/' . $control . '.php';
        // conprovem que tinguem definida la classe nomContrador
        if (class_exists($control)) {
            // Creem un objecte de la classe nomControlador
            // Al crear l'objecte es crida per defecte el seu constructor
            $objcontrol = new $control();
            // url de la forma: index.php?control=nomControlador&operacio=nomMetode
            if (isset($_GET['operacio'])) {
                $accio = $_GET['operacio'];
                // Comprovem que el mètode existeixi dins de la classe
                if (method_exists($objcontrol, $accio)) {
                    // i el cridem
                    $objcontrol->$accio();
                    exit;
                }
            }
            // url de la forma: index.php?control=nomControlador&operacio=nomMetode
            // Com no hem especificat cap mètode cridem al mètode index
            // Per a que funcioni tots els controladors l'han de tenir implementat obligatòriament!!
            $objcontrol->index();
            exit;
        }
    }
}

// url de la forma: index.php
// No s'ha especificat cap controlador en la url
// Es crida per defecte el controlador controlDefault
// Per a que funcioni el programa ha d'estar implementat!!
include_once 'controls/ControlDefault.php';
$objcontrol = new ControlDefault();
// Aquest controlador ha de tenir també obligatòriament el mètode index
$objcontrol->index();

 

?>
