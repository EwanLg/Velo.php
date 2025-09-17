<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Impression Pièces à commander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="print-block">
        <h1 class="mb-4">Pièces à commander</h1>
        <?php
        include_once('modeles/DAO.php');
        $dao = new DAO();
        $commandes = $dao->getCommandesJSON(__DIR__.'/../cdes.json');
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
        if (!empty($pieces)) {
            echo '<table class="table table-bordered mb-4">';
            echo '<thead class="table-dark"><tr><th>Référence</th><th>Nom</th><th>Quantité totale à commander</th></tr></thead><tbody>';
            foreach ($pieces as $ref => $piece) {
                echo '<tr>';
                echo '<td>'.htmlspecialchars($ref).'</td>';
                echo '<td>'.htmlspecialchars($piece['nom']).'</td>';
                echo '<td>'.htmlspecialchars($piece['qte']).'</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>Aucune pièce à commander.</p>';
        }
        ?>
        <button class="btn btn-primary no-print" onclick="window.print()">Imprimer en PDF</button>
        <a href="index.php" class="btn btn-secondary no-print">Retour à l'accueil</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
