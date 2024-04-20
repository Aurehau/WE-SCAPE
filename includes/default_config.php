<?php

require_once "config/config.class.php";

$Conf = new stdClass();

$Conf->DBHOST = Config::$DBHOST ?? "localhost";
$Conf->DBNAME= Config::$DBNAME ?? "wescape";  //modifiable
$Conf->DBUSER= Config::$DBUSER ??  "root";  //modifiable
$Conf->DBPWD= Config::$DBPWD ??  "";  //modifiable

$Conf->TITREONGLET= Config::TITREONGLET;
//$Conf->NOMSITE= Config::NOMSITE;

$Conf->IMG= Config::$DBIMG ??  "images/imgBDD/";  //modifiable

/* $Conf->MENU="<a class='lien' href='index.php?action=clients'>Clients</a>
<a class='lien' href='index.php?action=articles'>Articles</a>
<a class='lien' href='index.php?action=commandes'>Commandes</a>";  */

$Conf->MENU='<ul> <li class="deroulant">
                <a href=""> Nos aventures </a>
                <div class="drop-down">
                    <ul>
                        <li> <a href="templateAventures.html"> Strasbourg </a></li>
                        <li> <a href="templateAventures.html"> Colmar </a></li>
                        <li><a href="templateAventures.html"> Mulhouse </a></li>
                    </ul>
                </div>

                </li>
                <li> <a href="index.php?action=reservations" class="header-menu2">  </a> </li>
                <li> <a href="index.php?action=cartescadeaux" class="header-menu3">  </a> </li>
                <li> <a href="index.php?action=contact" class="header-menu4">  </a> </li>
                <li> <a href="index.php?action=panier">
                    <svg width="25" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.4246 31C14.3953 31 15.1821 30.2131 15.1821 29.2424C15.1821 28.2717 14.3953 27.4848 13.4246 27.4848C12.4539 27.4848 11.667 28.2717 11.667 29.2424C11.667 30.2131 12.4539 31 13.4246 31Z" stroke="#FFAE00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M25.7273 31C26.698 31 27.4849 30.2131 27.4849 29.2424C27.4849 28.2717 26.698 27.4848 25.7273 27.4848C24.7566 27.4848 23.9697 28.2717 23.9697 29.2424C23.9697 30.2131 24.7566 31 25.7273 31Z" stroke="#FFAE00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 2H6.57895L10.7 20.68C10.8427 21.3708 11.2263 21.9903 11.7841 22.4307C12.3419 22.8711 13.0385 23.1045 13.7526 23.0903H25.5053C26.2194 23.1045 26.916 22.8711 27.4738 22.4307C28.0315 21.9903 28.4152 21.3708 28.5579 20.68L31 8.0258H9.02105" stroke="#FFAE00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </a>
                </li>
                <li> 
                    <svg class="icone_profil" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFAE00" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </li>
            </ul>';