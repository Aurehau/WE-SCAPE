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

    $header = $Conf->NOMSITE;
//    $titre = "";      // Le titre de la page est généré dans le fichierVue
    $menu = $Conf->MENU;

    extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

    ob_start();

    require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

    $contenu = ob_get_clean();
    
    $footer = '<footer id="footer">

    <div class="sectionsFooter">

        <div class="section1Footer">
            <div id="logoFooter">
                <a href="index.html"> <img src="images/Kaiserstuhl-Escape-v1.png" alt="logo wescape"> </img> </a>
            </div>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum nihil rem magnam quam delectus libero impedit minima ea facere odit, est possimus fugiat fugit! Numquam veniam soluta accusantium facere repudiandae. </p>
        </div>

        <div class="section2Footer">
            <h3>Prêt ? Partez !</h3>
                <li> <a href="#reservations"> Réservations </a> </li>
                <li> <a href="#vosretours"> Vos retours </a> </li>
                <li> <a href="#cartescadeaux"> Cartes cadeaux </a> </li>
                <li> <a href="#contact"> Contact </a> </li>
        </div>

        <div class="section2Footer">
            <h3>Informations</h3>
                <li> <a href="#mentionslegales"> Mentions légales </a> </li>
                <li> <a href="#CGV"> Conditions générales de ventes </a> </li>
                <li> <a href="#Confidentialite"> Politique de confidentialité </a> </li>
        </div>

    </div>

    <div class="mentionsFooter">
        <p> MMI 2023 | Escape Alsace </p>
    </div>

</footer>';
  
    require "gabarit.php";
  }
}