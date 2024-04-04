<?php

require_once "config/config.class.php";

$Conf = new stdClass();

$Conf->DBHOST = Config::$DBHOST ?? "localhost";
$Conf->DBNAME= Config::$DBNAME ?? "magasin";  //modifiable
$Conf->DBUSER= Config::$DBUSER ??  "root";  //modifiable
$Conf->DBPWD= Config::$DBPWD ??  "";  //modifiable

$Conf->TITREONGLET= Config::TITREONGLET;
$Conf->NOMSITE= Config::NOMSITE;

$Conf->MENU="<a class='lien' href='index.php?action=clients'>Clients</a>
<a class='lien' href='index.php?action=articles'>Articles</a>
<a class='lien' href='index.php?action=commandes'>Commandes</a>"; 