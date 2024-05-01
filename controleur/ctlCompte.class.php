<?php

require_once "modele/compte.class.php";
require_once "modele/panier.class.php";

require_once "vue/vue.class.php";
/*************************************
Classe chargée d'exécuter les actions demandées par l'utilisateur
*************************************/
class ctlcompte {

  private $compte;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueArticles.php", "vue/vueErreur.php", ...
  private $panier;
  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct() {
    $this->compte = new compte();
    $this->panier = new panier();
  } 

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function infoCompte() {
    if ($_SESSION['acces']=='admin') {
      //info de l'admin
      $infosCompte=$this->compte->getCompte('admin@wescape.com');
    }else{
      $infosCompte = $this->compte->getCompteID($_SESSION['acces']);
    }
    $vue = new vue("InfoCompte"); // Instancie la vue appropriée
    $vue->afficher(array("infoCompte" => $infosCompte));

  }



  /** partie pas encore modifier pour wescape **/ 

  public function ajoutCompte() {
    $vue = new vue("CreerCompte"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function enregCompte(){
    
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";
    if(empty($nom)) $message.="Veuillez indiquer un nom<br>";
    if(empty($prenom)) $message.="Veuillez indiquer un prenom<br>";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $message.="Veuillez indiquer une adresse mail valide";

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
  
  
  
  
  public function connexion() {
    $vue = new vue("Connexion"); // Instancie la vue appropriée
    $vue->afficher(array());

  }



  public function login(){
    
    extract($_POST);
    //var_dump($_POST);     /************pour test*******************/
    $message="";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $message.="Veuillez indiquer une adresse mail valide";

    // vérification mdp
    if(empty($mdp)){
      $message.="Veuillez saisir votre mot de passe<br>";
    }else{

      $infoCompte=$this->compte->getCompte($email);

      if($infoCompte){

        $hashedPasswordFromDB = $infoCompte['mdp'];
        
        if (password_verify($mdp, $hashedPasswordFromDB)) {

        }else{
          $message.="Le mot de passe n'est pas bon<br>";
        }
      }
      else{
        $message.="Aucun compte n'a pour email : ".$email ."<br>";
      }
    }
    //ajout a la BDD
    if (empty($message)){
      if($email=="admin@wescape.com"){
        $_SESSION['acces']="admin";
      }else{
        $infoCompte=$this->compte->getCompte($email);
        $_SESSION['acces']=$infoCompte['idUtilisateur'];
      }


      if($_SESSION['acces']=="admin"){

      }else{
        //regarde si un panier avec l'id utilisateur existe
        $panierid=$this->panier->getPanieridUser($_SESSION['acces']);
        if(!empty($paniersid)){
          //si panier lié au compte existe on met en session[panier] l'id du panier
          $_SESSION['panier']=$paniersid[0]['idPanier'];
          $_SESSION['panier']='chiala';
        }else{
          if($_SESSION['panier']!="none"){
            //sinon si session[panier] != "none" on modifie le panier de cette id en ajoutant l'id utilisateur
            $panieridP = $this->panier->getPanieridPanier($_SESSION['panier']);
            if($panieridP[0]['idUtilisateur']==10){
              if($this->panier->modifiUserPanier($_SESSION['panier'],$_SESSION['acces'])){
                var_dump('test1');
              }else
                throw new Exception("Echec de l'ajout du panier au compte utilisateur"); 
            }
          }else{
            //sinon on créé un panier avec l'idutilisateur et on met en session[panier]l'id du panier
            if($this->panier->créerPanier($_SESSION['acces'])){
              $idPanier=$this->panier->getLastPanier();
              $_SESSION['panier']=$idPanier[0]['idPanier'];
              var_dump('test2');
            }else
              throw new Exception("Echec de la création d'un nouveau panier"); 
          }
        }
        
        
      }
      header('Location: index.php?compte=connecter');
      exit;
    }
    else {
      $vue = new vue("Connexion"); // Instancie la vue appropriée
      $vue->afficher(array("message"=> $message));
    }
  }



  public function deconnexion() {
    if ($_SESSION['acces']!='admin') {
      $_SESSION['panier']="none";
    }
    $_SESSION['acces']="none";
    header('Location: index.php?compte=deconnecter');
    exit;

  }
}