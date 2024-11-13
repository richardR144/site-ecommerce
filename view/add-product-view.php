<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php require_once(__DIR__ . '/../partial/_header.php'); ?>
<main>
    <h1>Erreur 404 - Page non trouvée</h1>
    <p>La page que vous cherchez n'existe pas.<br>
        Veuillez vérifier l'URL ou retourner à la page d'accueil.</p>
</main>
<?php require_once(__DIR__ . '/../partial/_footer.php'); ?>
</body>
</html>

//La vue contient le message d'erreur 404 et utilise le header et footer