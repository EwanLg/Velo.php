<html>
<?php
// VueCommandes.php : affiche les produits à livrer par détaillant
?>
<head>
    <title>Commandes à préparer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Produits à livrer par détaillant</h2>
    <?php if (!empty($commandes)) { ?>
        <?php foreach ($commandes as $numero => $produits) { ?>
            <h3>Détaillant n° <?= htmlspecialchars($numero) ?></h3>
            <table border="1">
                <tr><th>Référence</th><th>Nom</th><th>Quantité</th></tr>
                <?php foreach ($produits as $prod) { ?>
                    <tr>
                        <td><?= htmlspecialchars($prod['reference']) ?></td>
                        <td><?= htmlspecialchars($prod['nom']) ?></td>
                        <td><?= htmlspecialchars($prod['qte']) ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    <?php } else { ?>
        <p>Aucune commande à préparer.</p>
    <?php } ?>
    <a href="index.php">Retour à l'accueil</a>
</body>
</html>
