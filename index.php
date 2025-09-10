<?php
// fichier : index.php
// Rôle : analyser toutes les demandes (appels de page) et activer le contrôleur chargé de traiter l'action demandée
// Dernière mise à jour : 21/03/2022 par Phl

// Ce fichier est appelé par tous les liens internes
// il est appelé avec un paramètre action qui peut prendre les valeurs suivantes :

//    index.php?action=Accueil            : pour afficher la page d'accueil
//    index.php?action=Calendrier         : pour afficher la page du calendrier des courses
//    index.php?action=Resultat           : pour afficher la page des résultats

// inclusion des paramètres de l'application
// include_once ('modele/parametres.php');

session_start();		// permet d'utiliser des variables de session (inutilisé pour l'instant)
// si le parametre action n'existe pas dans l'url => affichage de l'accueil
if (!isset($_GET['action']))
{
    $action = 'Accueil';
}
else
{
    $action = $_GET['action'];
}
switch($action){
	case 'Accueil': {
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
	case 'JSON': {
		include_once ('controleurs/CtrlJSON.php'); break;
	}
	default : {
		// toute autre tentative est automatiquement redirigée vers l'accueil de l'application
		include_once ('controleurs/CtrlAccueil.php'); break;
	}
}