<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impression Commandes à livrer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Produits à livrer par détaillant</h1>
        <?php
        include_once('modeles/DAO.php');
        $dao = new DAO();
        $commandes = $dao->getCommandesJSON(__DIR__.'/../cdes.json');
        if (!empty($commandes)) {
            foreach ($commandes as $numero => $produits) {
                echo '<h3>Détaillant n° '.htmlspecialchars($numero).'</h3>';
                echo '<table class="table table-bordered mb-4">';
                echo '<thead class="table-dark"><tr><th>Référence</th><th>Nom</th><th>Quantité</th></tr></thead><tbody>';
                foreach ($produits as $prod) {
                    echo '<tr>';
                    echo '<td>'.htmlspecialchars($prod['reference']).'</td>';
                    echo '<td>'.htmlspecialchars($prod['nom']).'</td>';
                    echo '<td>'.htmlspecialchars($prod['qte']).'</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
        } else {
            echo '<p>Aucune commande à préparer.</p>';
        }
        ?>
        <button class="btn btn-primary no-print" onclick="window.print()">Imprimer en PDF</button>
        <a href="index.php" class="btn btn-secondary no-print">Retour à l'accueil</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
