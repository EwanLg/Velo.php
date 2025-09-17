<?php
// fichier : controleurs/CtrlCommandes.php
// Rôle : afficher les commandes à préparer
include_once('modeles/DAO.php');
$dao = new DAO();
$commandes = $dao->getCommandesJSON(__DIR__.'/../cdes.json');
include_once('vues/VueCommandes.php');
