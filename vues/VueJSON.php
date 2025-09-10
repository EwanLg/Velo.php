<?php
include_once ('vues/entete_inc.html');
echo "<h2>Données JSON</h2>";
$jsonData = file_get_contents("./cdes.json");

$data = json_decode($jsonData, true);

$detaillants = $data['cde']['detaillant'];
?>

<form method="get">
    <label for="numero">Choisir un numéro de détaillant :</label>
    <select name="numero" id="numero" onchange="this.form.submit()">
        <?php
        foreach ($detaillants as $numero) {
            echo "<option>".$numero['-numero']."</option>";
        }
        ?>
    </select>
</form>