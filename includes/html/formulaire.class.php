<?php

class formulaire {

   private $values;

/*******************************************************
Affiche dans le gabarit la vue correspondant à l'action demandée
  Entrée : 
    data [array] : tableau associatif contenant les données à afficher dans la vue

  Retour : 
    
*******************************************************/

public function __construct($data = array()){
  $this->values = $data;
}

private function getValue($key){                     /*le label est dans le JSON (pour la trad)*/
  return $this->values[$key] ?? "";
} 

public function makeFormElt($name, $input, $trad){
    return '<div class="form-field '.$name.'"><label class="label '.$trad.'" for="'.$name.'"></label><input '.$input.'></div>';
} 


/******************A*remplir*obligatoirement**************************************************/
public function inputTextI($name, $trad=""){

    $r = $this->makeFormElt($name, "type='text' id='{$name}' name=".$name." value='{$this->getValue($name)}' required", $trad);
    return $r;
}

public function inputMdp($name, $trad=""){

  $r = $this->makeFormElt($name, "type='password' id='{$name}' name=".$name." value='{$this->getValue($name)}' required", $trad);
  return $r;
}

public function inputEmail($name, $trad=""){

  $r = $this->makeFormElt($name, "type='email' id='{$name}' name=".$name." value='{$this->getValue($name)}' required", $trad);
  return $r;
}

public function inputTelI($name, $trad=""){

  $r = $this->makeFormElt($name, "type='tel' id='{$name}' name=".$name." value='{$this->getValue($name)}' required", $trad);
  return $r;
}


public function textAreaI($name, $trad=""){
  return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name."' value='{$this->getValue($name)}' id='message' required></textarea>   </div>";
}


public static function submit($name){
    return '<p><button class="valid" name="'.$name.'" /* type="submit" */>Valider</button></p>';

}

/* public function inputText($name, $label=""){

  $r = $this->makeFormElt($name,$label, "type='text' class='texte' name='{$name}' value='{$this->getValue($name)}'");
  return $r;
} */




/******************Pas*obligatoire**************************************************/
public function inputText($name, $trad=""){

  $r = $this->makeFormElt($name, "type='text' id='{$name}' name=".$name." value='{$this->getValue($name)}'", $trad);
  return $r;
}

public function inputTel($name, $trad=""){

$r = $this->makeFormElt($name, "type='tel' id='{$name}' name=".$name." value='{$this->getValue($name)}' ", $trad);
return $r;
}


public function textArea($name, $trad=""){
return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name."' value='{$this->getValue($name)}' id='message'></textarea>   </div>";
}

}