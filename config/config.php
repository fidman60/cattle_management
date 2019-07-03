<?php

define('DEFAULT_CONTROLLER','Home');
define('DEBUG',true);
define('DEFAULT_LAYOUT','default');
define('SITE_TITLE','Gestion des bovins');
define('SROOT','/gestion_bovins/');

define('DB_NAME','gestion_bovins');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');

// information sur le client
define('NOM_CLIENT',"Fethi");
define('PRENOM_CLIENT',"Mohammed");
define('PAYS',"Maroc");
define('ADRESSE',"Ferme Doukala, 43Km loin de Marrakech");
define('IMAGE_PROFILE', ROOT .DS."public".DS."images".DS."image_profile.png");

//types bovins
define("VEAU",1);
define("VACHE",2);
define("TOUREAU",3);

//états
define("BON",1);
define("MALADE",2);
define("MORT",3);
define("VENDUE",4);

//sexe
define("BOVIN_FEMELLE",1);
define("BOVIN_MALE",2);

//types événement
define("EVENT_SAILLIE",1);
define("EVENT_AVANCE",2);
define("EVENT_VELAGE",3);
define("EVENT_SEVRER",4);
define("EVENT_ACHETE",5);
define("EVENT_VENDUE",6);
define("EVENT_MALADE",7);
define("EVENT_MORT",8);
define("EVENT_NAISSANCE",9);
define("EVENT_TRAITEMENT",10);

//types traitement
define("ORDONNANCE",1);
define("TRAITEMENT",2);

//type nourriture
define("NOURRITURE_HERBE",1);
define("NOURRITURE_LAIT",2);

//type personne
define("PERSONNE_VETERINAIRE",1);
define("PERSONNE_VENDEUR",2);
define("PERSONNE_CLIENT",3);
define("PERSONNE_TRANSPORTEUR",4);

//etats grossesses
define("ETAT_GROSSESSE_SAILLIE",1);
define("ETAT_GROSSESSE_AVANCEE",2);

define("PRIX_PAR_KG",10);

define("PER_PAGE",10);