<?php
// PHASE 1 : Préparation et Données de base
$annuaire = ["Maxime"]; // Administrateur par défaut
$annuaire[] = "Sophie"; // Ajout d'un employé
$annuaire[] = "Léa"; // Ajout d'un autre employé
$motDePasseAdmin = "Tyrolium2026"; // Mot de passe administrateur
$ageMinimum = 18; // Âge minimum requis
// PHASE 3 : Le Cœur de l'Application (Fonction)
function afficherBadge($nom, $statut) {
    echo "Badge généré : " . htmlspecialchars($nom) . " - Statut : " . htmlspecialchars($statut) . "<br>";
}
// PHASE 4 : Traitement et Sécurité (Conditions & $_POST)
if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $code = $_POST['code'];
    $statut = $_POST['statut'];
    if ($age >= $ageMinimum && $code === $motDePasseAdmin) {
        $annuaire[] = $prenom; // Ajout du nouveau prénom dans le tableau
        echo "Bienvenue, " . htmlspecialchars($prenom) . " a été ajouté !";
    } elseif ($age < $ageMinimum || $statut === "Stagiaire") {
        echo "Erreur : Accès non autorisé pour ce profil.";
    } else {
        echo "Erreur : Mot de passe administrateur incorrect.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Annuaire de l'entreprise</title>
</head>
<body>
    <h2>Ajouter un nouvel employé</h2>
    <form method="POST" action="evaluation_finale.php">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>
        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="code">Code de sécurité:</label>
        <input type="password" id="code" name="code" required><br><br>
        <label for="statut">Statut:</label>
        <select id="statut" name="statut">
            <option value="Employé">Employé</option>
            <option value="Stagiaire">Stagiaire</option>
        </select><br><br>
        <button type="submit">Ajouter au répertoire</button>
    </form>
    <h3>Annuaire de l'entreprise</h3>
    <?php
    // PHASE 5 : L'Affichage du Trombinoscope (Les Boucles)
    // Boucle foreach pour afficher les badges des employés
    foreach ($annuaire as $employe) {
        afficherBadge($employe, "Employé");
    }
    // Boucle for pour afficher les emplacements de bureau vides
    for ($i = 0; $i < 3; $i++) {
        echo "Emplacement bureau vide disponible...<br>";
    }
    // Boucle while pour simuler la synchronisation de la base de données
    $chargement = 0;
    while ($chargement < 2) {
        echo "Synchronisation de la base de données...<br>";        $chargement++;
    }
    ?>
</body>
</html>     