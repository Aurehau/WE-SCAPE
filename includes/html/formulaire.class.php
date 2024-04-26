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
  return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name."' id='message' required>{$this->getValue($name)}</textarea>   </div>";
}

public function inputNumberI($name){

  $r = "<input type='number'  id='{$name}' name=".$name." value='{$this->getValue($name)}' required>";
  return $r;
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
return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name."' id='message'>{$this->getValue($name)}</textarea>   </div>";
}


public function inputNumber($name){

  $r = "<input type='number'  id='{$name}' name=".$name." value='{$this->getValue($name)}'>";
  return $r;
}



/***********************************************************************************************/
/*                               formulaires prérempli                                         */
/***********************************************************************************************/

public function testPost($name, $gabarit){
  $getvalue = $this->getValue($name);
  if(isset($getvalue)){
    return $getvalue;
  }else{
    return $gabarit;
  }
}


/******************A*remplir*obligatoirement**************************************************/
public function inputTextIP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='text' id='{$name}' name=".$name." value='{$value}' required", $trad);
  return $r;
}

public function inputMdpP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='password' id='{$name}' name=".$name." value='{$value}' required", $trad);
  return $r;
}

public function inputEmailP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='email' id='{$name}' name=".$name." value='{$value}' required", $trad);
  return $r;
}

public function inputTelIP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='tel' id='{$name}' name=".$name." value='{$value}' required", $trad);
  return $r;
}


public function textAreaIP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name."' id='message' required>{$value}</textarea>   </div>";
}

public function inputNumberIP($name, $gabarit){
  $value=$this->testPost($name, $gabarit);
  $r = "<input type='number'  id='{$name}' name=".$name." value='{$value}' required>";
  return $r;
}



/******************Pas*obligatoire**************************************************/
public function inputTextP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='text' id='{$name}' name=".$name." value='{$value}'", $trad);
  return $r;
}

public function inputTelP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  $r = $this->makeFormElt($name, "type='tel' id='{$name}' name=".$name." value='{$value}' ", $trad);
  return $r;
}


public function textAreaP($name, $gabarit, $trad=""){
  $value=$this->testPost($name, $gabarit);
  return "<div class='form-field ".$name."'>   <label class='label ".$trad."'></label> <textarea name='".$name." id='message'>{$value}</textarea>   </div>";
}


public function inputNumberP($name, $gabarit){
  $value=$this->testPost($name, $gabarit);
  $r = "<input type='number'  id='{$name}' name=".$name." value='{$value}'>";
  return $r;
}

}