<?php

class Usuaris {

    private $claus = array ('enric'=>"z67yeeui", 'carles'=>"sdfe3sdf",'Manel'=>"axeeeldds23",'prova'=>'prova');
	
    public function valida($user,$pwd){
        if(isset($this->claus[$user]) && $this->claus[$user]==$pwd) return true;
  		else return false;  		
    }  
  
}

?>

