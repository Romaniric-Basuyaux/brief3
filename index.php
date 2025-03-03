<?php

require 'Produit.php';

$filmObj = new Produit();

// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=star_wars", "root", "");

// On crée un produit en utilisant la classe Produit
$produit = new Produit($pdo);

// On récupère les infos du formulaire et on ajoute le produit
/*$produit->ajouter($_POST['nom'], floatval($_POST['prix']), intval($_POST['stock']));*/



/*$nom = "nom";
$prix = "prix";
$stock = "stock";
if ($filmObj->ajouter($nom, $prix, $stock)) {
    echo "Produit ajouté";
} else {
    echo "Erreur lors de l'ajout";
}*/




// Liste des produits
$film = $filmObj->lister();

?>
















<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des films</title>
</head>
<body>
<?php if (!empty($film)): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($film as $f): ?>
            <tr>
                <td><?= htmlspecialchars($f['id']) ?></td>
                <td><?= htmlspecialchars($f['nom']) ?></td>
                <td><?= htmlspecialchars($f['prix']) ?>€</td>
                <td><?= htmlspecialchars($f['stock']) ?>qt</td>
                <td><a href="edit.php?id=<?= $f['id']; ?>">Editer</a> </td>
                <td><a href="delete.php?id=<?= $f['id']; ?>">Supprimer</a> </td>
                <td><a href="add.php?id=<?= $f['id']; ?>">Ajouter</a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun film disponible.</p>
<?php endif; ?>
</body>
</html>
