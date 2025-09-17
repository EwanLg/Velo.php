<?php
// fichier : controleurs/CtrlPieces.php
// Rôle : afficher les pièces à commander
include_once('modeles/DAO.php');
$dao = new DAO();
$commandes = $dao->getCommandesJSON(__DIR__.'/../cdes.json');
// Simulation : chaque produit nécessite une pièce avec la même référence
$pieces = [];
foreach ($commandes as $numero => $produits) {
    foreach ($produits as $prod) {
        $ref = $prod['reference'];
        if (!isset($pieces[$ref])) {
            $pieces[$ref] = [
                'nom' => $prod['nom'],
                'qte' => 0
            ];
        }
        $pieces[$ref]['qte'] += (int)$prod['qte'];
    }
}
include_once('vues/VuePieces.php');
