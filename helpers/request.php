<?php

function netejarCamp($valor) {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);

        return $valor; 
}


// Valida si un camp post és un enter 
// podent especificar el rang i si és obligatori
function validarInteger($camp,&$errors,$min=null,$max=null,$required=false) {
    
    if(!isset($_POST[$camp])) {
    if ($required) {
            $errors[$camp] = "La informació del camp " . $camp . " no ha estat enviada!";
        }
        return ""; 
    }
    $valor = netejarCamp($_POST[$camp]); 
    if ($required && $valor == "") {
        $errors[$camp] = "Has deixat el camp en blanc.";
        return $valor;
    }
    if(filter_var($valor, FILTER_VALIDATE_INT)===FALSE) {
        $errors[$camp] = "El camp ".$camp." ha de ser un enter";
        return $valor;
    } 
    if (isset($min) && $valor < $min) {
        $errors[$camp] = "El camp ha de ser superior a " . $min;
        return $valor;
    }
    if (isset($max) && $valor > $max) {
        $errors[$camp] = "El camp ha de ser inferior a " . $max;
        return $valor;
    }

    return $valor;
}



?>
