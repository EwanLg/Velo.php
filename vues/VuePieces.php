<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pièces à commander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Pièces à commander</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Quantité totale à commander</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pieces as $ref => $piece) { ?>
                    <tr>
                        <td><?= htmlspecialchars($ref) ?></td>
                        <td><?= htmlspecialchars($piece['nom']) ?></td>
                        <td><?= htmlspecialchars($piece['qte']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Retour à l'accueil</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
