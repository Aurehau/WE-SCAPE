<?php
/*************************************
Classe chargée de l'affichage des vues
*************************************/
class vue {

  private $fichierVue;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...

  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct($action) {
    $this->fichierVue = "vue/vue".$action.".php";
  }

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/


  public function afficher($data) {
    global $Conf;

    $title = $Conf->TITREONGLET;

    ob_start();

    require "vue/vueMenuLieux.php";
    
    $menuLieux = ob_get_clean();

//    $titre = "";      // Le titre de la page est généré dans le fichierVue
    $menu = $Conf->MENU;
    $menu = str_replace('<!--PLACEHOLDER_MENU-->', $menuLieux, $menu);
    $menu2 = $Conf->MENU2;
    $menu2 = str_replace('<!--PLACEHOLDER_MENU-->', $menuLieux, $menu2);


    if ($_SESSION['acces']=="none"){
      //if(($_SESSION['acces']=="admin")||($_SESSION['acces']=="client")){
        $optionConnexion = "  <a class='option' href='index.php?action=connexion'>Se connecter</a>
                              <div class='ligne'></div>
                              <a class='option'  href='index.php?action=creer_compte'>Créer un compte</a>";
      //}
    }else{
      $optionConnexion = "<a class='option'  href='index.php?action=quitter'>Se déconnecter</a>"
                          /* <div class='ligne'></div>
                          <a class='option'  href='index.php?action=modif_compte'>Modifier compte</a>
                          <div class='ligne'></div>
                          <a class='option'  href='index.php?action=infoCompte'>Info compte</a> */;
    }

    $Hacceuil ="";


    extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

    ob_start();

    require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

    $contenu = ob_get_clean();

    ob_start();

    require "vue/vueHeader.php";
    
    $header = ob_get_clean();

    ob_start();

    require "vue/vueFooter.php";
    
    $footer = ob_get_clean();
  
    require "gabarit.php";
  }

  public function afficherMenuLieu($data){
    extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

    ob_start();

    require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

    $contenu = ob_get_clean();
  }

}