<?php

require_once "modele/cartecadeau.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlcartecadeau {

  private $cartecadeau;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...

  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->cartecadeau = new cartecadeau();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function cartescadeaux() {

    $cartescadeaux = $this->cartecadeau->getCartescadeaux();
    $vue = new vue("Cartescadeaux"); // Instancie la vue appropriée
    $vue->afficher(array("cartescadeaux" => $cartescadeaux));

  }





  public function adminAjoutCarte() {
    $vue = new vue("AdminAjoutCarte"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function enregAdminAjoutCarte(){
    
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($titre)) $message.="Veuillez indiquer un titre<br>";
    if(empty($file)) $message.="Veuillez ajouter une photo principale<br>";
    if(empty($prix)) $message.="Veuillez indiquer un prix<br>";
    
    if(empty($description)) $message.="Veuillez ajouter une description<br>";
    if(empty($raisons)) $message.="Veuillez ajouter les occasions aux quelles acheter le produit<br>";
    if(empty($delai)) $message.="Veuillez indiquer un delai de livraison<br>";
    if(empty($taille)) $message.="Veuillez choisir une taille de coli<br>";
    
    $nbmail=$this->compte->getNbMail($email);

    if($nbmail["nombre_de_comptes"]>0) $message.="Ce mail est déjà utilisé par un autre compte<br>";
    // vérification mdp
    if(empty($mdp) || empty($mdpConfirmation)){
      $message.="Veuillez indiquer votre mot de passe et le confirmer<br>";
    }else{
      if($mdp!=$mdpConfirmation){
        $message.="Votre mot de passe et la confirmation de celui-ci ne correspondent pas<br>";
      }
      else{
        $hashedMdp = password_hash($mdp, PASSWORD_BCRYPT);
      }
    }

    //ajout a la BDD
    if (empty($message)){
      if ($this->compte->insertCompte($nom, $prenom, $hashedMdp, $email, $tel, $adresse, $ville, $code_postal, $pays)){
        $infoCompte=$this->compte->getCompte($email);
        $_SESSION['acces']=$infoCompte['idUtilisateur'];
        header('Location: index.php?compte=creer');
        exit;
      }
      else
        throw new Exception("Echec de l'enregistrement du nouveau compte");
    }
    else {
      $vue = new vue("CreerCompte"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }


  /** partie pas encore modifier pour wescape **/ 

  public function ajoutClient() {
    $vue = new vue("Formulaire"); // Instancie la vue appropriée
    $vue->afficher(array());

  }


  public function enregClient(){
    
    extract($_POST);
    $message="";
    if(empty($nom)) $message.="Veuillez indiquer un nom<br>";
    if(empty($prenom)) $message.="Veuillez indiquer un prenom<br>";
    if(empty($age)) $message.="Veuillez indiquer votre age<br>";
    if(empty($adresse)) $message.="Veuillez indiquer une adresse<br>";
    if(empty($ville)) $message.="Veuillez indiquer une ville<br>";
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) $message.="Veuillez indiquer une adresse mail valide";

    if (empty($message)){
      if ($this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail))
        $this->clients();
      else
        throw new Exception("Echec de l'enregistrement du nouveau client");
    }
    else {
      $vue = new vue("Formulaire"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }


    // $this->client->insertClient($nom, $prenom, $age, $adresse, $ville, $mail);
    // $clients = $this->client->getClients();
    // $vue = new vue("Clients"); // Instancie la vue appropriée
    // $vue->afficher(array("clients" => $clients));
  }
}