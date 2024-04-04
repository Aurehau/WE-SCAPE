<?php

class tableau {

/*******************************************************
Affiche dans le gabarit la vue correspondant à l'action demandée
  Entrée : 
    data [array] : tableau associatif contenant les données à afficher dans la vue

  Retour : 
    
*******************************************************/

public static function row($data, $tag='td'){
    $r= '';
    foreach($data as $case) {
        $r .= '<'.$tag.'>'.$case.'</'.$tag.'>';
    }
    return '<tr>'.$r.'</tr>';
}

public static function head($data=[]){
    if ($data){
        echo '<table><thead>';
        echo self::row($data, 'th');
        echo '</thead>';
    }
    else{
        echo '<table>';
    }
}

public static function body($data){
    if ($data){
        echo '<tbody>';
        foreach($data as $ligne) {
            echo self::row($ligne);
        }
        echo '</tbody>';
    }
}




public static function foot($data=[]){
    echo '<tfoot>';
    foreach($data as $ligne) {
        echo self::row($ligne);
    }
    echo '</tfoot></table>';
}

}