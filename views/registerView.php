<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Register.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>ATLbook</h1>
    </header>
    <main>
        <h2>Inscrivez-vous</h2>
        <form method="post">
            <input type="text" name="usernameRegister" placeholder="entrez votre nom" />
            <input type="text" name="passwordRegister" placeholder="entrez votre password" />
            <button>S'inscrire</button>
            <a href="/login">Annuler</a>
        </form>

        <?= $errors !== "" ? $errors : null ?> <!-- ?= equivalent a php echo -->
    </main>
    <footer>
        atlCompagny tous droits reserver
    </footer>
</body>

</html>