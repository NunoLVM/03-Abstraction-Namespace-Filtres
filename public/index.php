<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\FormValidator;

// Initialisation des variables (évite les erreurs avant envoi du formulaire)
$nom = $_SESSION["nom"] ?? "";
$email = $_SESSION["email"] ?? "";
$age = $_SESSION["age"] ?? "";
$password = ""; // Password should not be stored in session
$website = $_SESSION["website"] ?? "";
$erreurs = [];

// TODO 1 : Vérifier que le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = FormValidator::nettoyerNom($_POST["nom"] ?? "");
    $email = FormValidator::validerEmail($_POST["email"] ?? "");
    $age = FormValidator::validerAge($_POST["age"] ?? "");
    $password = $_POST["password"] ?? ""; 
    $website = FormValidator::validerWebsite($_POST["website"] ?? "");

    if (!$nom) $erreurs["nom"] = "Nom requis.";
    if (!$email) $erreurs["email"] = "Email invalide.";
    if ($age === false) $erreurs["age"] = "Âge entre 13 et 120 requis.";
    if (empty($password)) $erreurs["password"] = "Le mot de passe est obligatoire.";
    if ($website === false || $website === null) $erreurs["website"] = "L'URL du site web est invalide.";
    if (empty($erreurs)) $_SESSION['nom'] = $nom; $_SESSION['email'] = $email; $_SESSION['age'] = $age; $_SESSION['website'] = $website;
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire filtré</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($erreurs)) : ?>
    <div class="success">
        <p><strong>Formulaire envoyé avec succès !</strong></p>
        <p>Nom : <?= htmlspecialchars($nom) ?></p>
        <p>Email : <?= htmlspecialchars($email) ?></p>
        <p>Âge : <?= htmlspecialchars($age) ?></p>
        <p>Mot de passe: <?= htmlspecialchars($password) ?></p>
        <p>Site web: <?= htmlspecialchars($website) ?></p>
    </div>
<?php endif; ?>

<?php
require_once __DIR__ . "/../templates/form.php";
?>

</body>
</html>
