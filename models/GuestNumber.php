<?php
 
class GuestNumber {
		
	protected $estat; // estat del joc: 0-en curs, 1-guanyes, 2-perds
	protected $missatge; // missatge ha mostrar a l'usuari
	protected $maxim; // Número màxim que es pot generar
	protected $intents; // Intents d'endevinar que queden per perdre
	protected $maxintents; // Número màxim d'intents per endevinar número
	protected $aleatori; // Número secret que s'ha d'endevinar
	
	// private $showAnteriors; // True si volem mostrar el números d'intents anteriors incorrectes
	// private $anteriors; // Es guarden els números incorrectes d'intents anteriors

	// En el constructor li passarem quin és el número més gran que es pot generar i
	// quants intents tindrà el jugador com a màxim
	function __construct($maxim,$maxintents) {	 
	     
	     $this->maxim = $maxim;
	     $this->maxintents = $maxintents;
	     // Per defecte no es mostren els números anteriors a l'usuari
	     //$this->showAnteriors = true; 
	     // Posem partida en curs
	     $this->estat=0;
	     // Inicialitzem la resta d'atributs: joc nou
	     $this->inicialitzacio();   
	}
	
	// Inicialitzar un joc nou
	public function inicialitzacio() {		
		 // Posem en blanc l'array que guarda els números entrats fins ara		   
	     //$this->anteriors = array(); 
	     // Posem el comptador d'intents al màxim, cada errada descomptarà 1 intent
	     $this->intents = $this->maxintents;
	     // Generem el número que s'ha d'encertar
	     $this->aleatori = rand(1,$this->maxim);              
	}
	
	// Getter i setters del atributs
	// Alguns setter i getter no estan implementats per a protegir alguns dels atributs

	public function getMaxim() {
	     return $this->maxim;	
	}
	
	public function setMaxim($valor) {
	     $this->maxim=$valor;	
	}
	
	public function getMaxIntents() {
	     return $this->maxintents;	
	}
	
	public function setMaxIntents($valor) {
	     $this->maxintents=$valor;	
	}

	public function setMissatge($valor) {
	     $this->missatge=$valor;	
	}

	public function getMissatge() {
	     return $this->missatge;	
	}
		
	public function getIntents() {
	     return $this->intents;
	}

	
	public function getEstat() {
	     return $this->estat;
	}
	
	// Comprova el número entrat per l'usuari
	public function comprovaNumero($numero) {
		
		$this->estat = 0;
		// Comprovar que el número està dins el rang permès
		if($numero<1 || $numero > $this->maxim) {
		    $this->missatge =	"No has introduit un valor enter entre 1 i ".$this->maxim;
		    return false;
		}				 
			
       
	    // s'encerta el número
		if($numero == $this->aleatori) {
			  $this->missatge = "Has guanyat!! En número buscat era el ".$numero.". torna a jugar...";
		  	  $this->estat=1; // Es guanya
			  $this->inicialitzacio();
			  return true;
		}
		
		// Numero més petit		
		if($numero > $this->aleatori) {
			  $this->missatge = "El número cercat és més petit que ".$numero; 			  
		}
		
		// Número més gran
		if($numero < $this->aleatori) {	  
			 $this->missatge = "El número cercat és més gran que ".$numero;			 
	    }
		
		// Decrementem els intents permesos	
		$this->intents = $this->intents -1;				 
		// Si s'han acabat els intents permesos acabem el joc

		if($this->intents==0) {
				  $this->missatge = "Has perdut, el número cercat era ".$this->aleatori.". Prova de nou...";
				  $this->estat=2; // Es perd
				  $this->inicialitzacio(); 
				  return false;			   
		}
		
		return false;
	}

	
}


?>