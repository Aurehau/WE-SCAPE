<?php

require_once "modele/lieu.class.php";
require_once "modele/photo.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctllieu {

  private $lieu;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
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
  } 



  public function adminAjoutLieu() {
    $vue = new vue("AdminAjoutLieu"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function enregAdminAjoutLieu(){
    
    extract($_POST);
    var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($titrefr)) $message.="Veuillez indiquer un titre en français<br>";
    if(empty($titreen)) $message.="Veuillez indiquer le titre en anglais<br>";
    if(empty($raisonsfr)) $message.="Veuillez ajouter les occasions aux quelles acheter le produit (en français)<br>";
    if(empty($raisonsen)) $message.="Veuillez ajouter les occasions aux quelles acheter le produit (en anglais)<br>";
    if(empty($descriptionfr)) $message.="Veuillez ajouter une description en français<br>";
    if(empty($descriptionen)) $message.="Veuillez ajouter la description en anglais<br>";

    
    if(empty($prix)) $message.="Veuillez indiquer un prix<br>";
    if(empty($delai)) $message.="Veuillez indiquer un delai de livraison<br>";
    if(empty($taille)) $message.="Veuillez choisir une taille de coli<br>";


    //ajout a la BDD
    if (empty($message)){

      //ajout des valeurs dans une liste
      $valeurs = [$valeur];
      $j="valeur1";
      for ($i=3; isset($_POST[$j])==true; $i++) {
        $valeurs[]=$_POST[$j];
        $j="valeur".$i-1; 
      }
      $valeurs=json_encode($valeurs);


      //ajout de l'images principale dans la bdd

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
      var_dump($_FILES['files']);

      if ($this->cartecadeau->insertProduit($idPhoto, $prix, $valeurs, $taille, $delai)){
        $idProduit=$this->cartecadeau->getLastProduit();
        //var_dump($idProduit);

        $this->cartecadeau->insertProduitJSON($idProduit[0]['idProduit'],$titrefr, $titreen,$descriptionfr,$descriptionen,$raisonsfr,$raisonsen);
        
        //miniature
        if(isset($_FILES['file']) && $_FILES['file']['error'][0] != 4){
          //var_dump("coucou");
          $this->photo->updateMiniatureProduit($_FILES['file']["name"][0]);
        }

        //autre photo
        $photos=$this->photo->getPhoto();
        $idPhotos=[];
        $idPhoto='';

        if(isset($_FILES['files']) && $_FILES['files']['error'][0] != 4){
            for ($i = 0; $i <= count($_FILES['files']['error'])-1; $i++) {

            //ajout a la bdd
              foreach ($photos as $value) {
                if($value['lien_photo']==$_FILES['files']["name"][$i]){              //si la photo est deja enregistré on recupère son id
                  $idPhoto=$this->photo->getPhotoIn($_FILES['files']["name"][$i]);
                  $idPhotos[]=$idPhoto[0]['idPhoto'];
                }
              }
              if($idPhoto==''){
                $this->photo->insertPhoto($_FILES['files']["name"][$i]);            //si la photo n'est pas deja enregistré on l'ajoute a la bdd et on recupère son id
                $idPhoto=$this->photo->getPhotoIn($_FILES['files']["name"][0]);
                $idPhotos[]=$idPhoto[0]['idPhoto'];
              }
              //ajout des photos dans le dossier imgBDD/
              $this->photo->updatePhotosProduit($i, $_FILES['files']["name"][$i]);
            }  
            //attribution des photos au produit
            foreach ($idPhotos as $value) {
              if($this->photo->insertPhotosProduit($idProduit[0]['idProduit'], $value)){

              }
              else
                throw new Exception("Echec de l'enregistrement des photos du produit");
            }
        }
        header('Location: index.php?produit=ajoute');
        exit;
      }
      else
        throw new Exception("Echec de l'enregistrement du nouveau produit");
    }
    else {
      $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }


}