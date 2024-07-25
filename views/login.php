<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>ATLbook</h1>
    </header>
    <main>
        <form method="post">
            <input type="text" name="username" placeholder="entrez votre nom" />
            <input type="text" name="password" placeholder="entrez votre password" />
            <button>Se connecter</button>
            <a href="/Register">s'inscire</a>
        </form>

        <?= $error !== "" ? $error : null ?> <!-- ?= equivalent a php echo -->
    </main>
    <footer>
        atlCompagny tous droits reserver
    </footer>
</body>

</html>