<?php

class controlProva {
    
    function __construct() {
        echo "<br>S'ha creat un objecte de tipus ControlProva";
    }

    function __destruct() {
        echo "<br>s'ha destruit l'objecte de tipus ControlProva";
    }

    // Mètode obligatori dins un controlador!
    function index() {
       echo "<br>S'ha cridat el mètode index d'un ControlProva";
    }

    function salutacio() {
       echo "<br>Hola!";
    }

    function temps() {
       echo "<br>Fa sol!";
    }

}
       