<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VeloConcept - Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include_once('vues/entete_inc.html'); ?>
    <div class="container mt-4">
        <h1 class="mb-4">Boutique VeloConcept</h1>
        <?php
        include_once('modeles/DAO.php');
        $dao = new DAO();
        $commandes = $dao->getCommandesJSON(__DIR__.'/../cdes.json');
        if (!empty($commandes)) {
            foreach ($commandes as $numero => $produits) {
                echo '<div class="card mb-4">';
                echo '<div class="card-header bg-primary text-white">Détaillant n° '.htmlspecialchars($numero).'</div>';
                echo '<div class="card-body">';
                echo '<div class="row">';
                foreach ($produits as $prod) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.htmlspecialchars($prod['nom']).'</h5>';
                    echo '<p class="card-text">Référence : '.htmlspecialchars($prod['reference']).'<br>Quantité disponible : '.htmlspecialchars($prod['qte']).'</p>';
                    echo '<a href="#" class="btn btn-success">Ajouter au panier</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucun produit disponible.</p>';
        }
        ?>
    </div>
    <div class="container mb-4">
        <form action="index.php" method="get" class="d-inline">
            <input type="hidden" name="action" value="Commandes">
            <button type="submit" class="btn btn-primary">Commandes à préparer</button>
        </form>
        <form action="index.php" method="get" class="d-inline ms-2">
            <input type="hidden" name="action" value="Pieces">
            <button type="submit" class="btn btn-warning">Commandes en attente (Pièces)</button>
        </form>
        <form action="index.php" method="get" class="d-inline ms-2">
            <input type="hidden" name="action" value="PDFCommandes">
            <button type="submit" class="btn btn-outline-dark">Télécharger PDF Commandes</button>
        </form>
        <form action="index.php" method="get" class="d-inline ms-2">
            <input type="hidden" name="action" value="PrintCommandes">
            <button type="submit" class="btn btn-outline-primary">Imprimer Commandes (PDF navigateur)</button>
        </form>
        <form action="index.php" method="get" class="d-inline ms-2">
            <input type="hidden" name="action" value="PDFPieces">
            <button type="submit" class="btn btn-outline-info">Télécharger PDF Pièces</button>
        </form>
        <form action="index.php" method="get" class="d-inline ms-2">
            <input type="hidden" name="action" value="PrintPieces">
            <button type="submit" class="btn btn-outline-primary">Imprimer Pièces (PDF navigateur)</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>