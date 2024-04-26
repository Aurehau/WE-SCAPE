<?php

require_once "modele/lieu.class.php";
require_once "modele/escapegame.class.php";
require_once "modele/photo.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctllieu {

  private $lieu;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
  private $escapegame;
  private $photo;

  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->lieu = new lieu();
    $this->escapegame = new escapegame();
    $this->photo = new photo();
  } 



  public function lieu($idLieu) {

    $infolieu = $this->lieu->getInfoLieu($idLieu);
    $escapeLieu = $this->escapegame->getEscapeLieu($idLieu);
    $escapes = $this->escapegame->getEscape($idLieu);
    $vue = new vue("Lieu"); // Instancie la vue appropriée
    $vue->afficher(array("idLieu" => $idLieu, "infolieu" => $infolieu, "escapeLieu" => $escapeLieu, "escapes" => $escapes));
  }



  public function adminAjoutLieu() {
    $vue = new vue("AdminAjoutLieu"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function enregAdminAjoutLieu(){
    
    extract($_POST);
    var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($nomlieu)) $message.="Veuillez indiquer le nom du lieu<br>";
    if(empty($video)) $message.="Veuillez ajouter le lien vers une video de présentation<br>";

    //ajout a la BDD
    if (empty($message)){

      //ajout de l'image dans la bdd

      $photos=$this->photo->getPhoto();
      $idPhoto='';
      foreach ($photos as $value) {
        if($value['lien_photo']==$_FILES['file']["name"][0]){              //si la photo est deja enregistré on recupère son id
          $idPhoto=$this->photo->getPhotoIn($_FILES['file']["name"][0]);
        }
      }
      if($idPhoto==''){
        $this->photo->insertPhoto($_FILES['file']["name"][0]);            //si la photo n'est pas deja enregistré on l'ajoute a la bdd et on recupère son id
        $idPhoto=$this->photo->getPhotoIn($_FILES['file']["name"][0]);
      }

      $idPhoto=$idPhoto[0]['idPhoto'];
      var_dump($idPhoto);
      
      var_dump('lalalalallalalalaal');

      //logo
      if(isset($_FILES['logo']) && $_FILES['logo']['error'][0] != 4){
        //var_dump("coucou");
        $this->photo->updateMiniatureProduit($_FILES['logo']["name"][0]);
      }

      //image du lieu
      if(isset($_FILES['file']) && $_FILES['file']['error'][0] != 4){
        //var_dump("coucou");
        $this->photo->updateMiniatureProduit($_FILES['file']["name"][0]);
      }

      if ($this->lieu->insertLieu($nomlieu, $_FILES['logo']["name"][0], $idPhoto, $video)){

        header('Location: index.php?produit=ajoutelieu');
        exit;
      }
      else
        throw new Exception("Echec de l'enregistrement du nouveau lieu");
    }
    else {
      $vue = new vue("AdminAjoutLieu"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }

}