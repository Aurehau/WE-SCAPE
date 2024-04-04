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

private function getValue($key){
  return $this->values[$key] ?? "";
} 

public function makeFormElt($label, $input){
    $r = '<span>'.$label.'</span><input '.$input.'>';
    return '<div class="form_elt"><label>'.$r.'</label></div>';
} 


public function inputText($name, $label=""){

    $r = $this->makeFormElt($label, "type='text' class='texte' name='{$name}' value='{$this->getValue($name)}'");
    return $r;
}

public static function submit($name){
    return '<p><button class="valid" name="'.$name.'" /* type="submit" */>Valider</button></p>';

}

}