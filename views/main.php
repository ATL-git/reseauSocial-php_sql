<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
</head>

<body>
    <header>

        <h1>ATLbook</h1>
    </header>
    <main>
        <form action="" method="post">
            <a href="/logout">deconexion</a>
            <div class="commentEnter">


                <input type="text" name="title" id="titletitle" placeholder="votre titre">


                <textarea name="text" id="texttext" placeholder="votre commentaire"></textarea>


                <button type="submit" name="valide" id="validButton" value="">valider</button>

            </div>

            <div class="commentsContainer">

                <?php foreach ($posts as $post) : ?>
                    <div class="commentContainer">
                        <?php if (isset($_POST["modif"]) && $_POST["modif"] == $post->getId()) { ?>

                            <input name="newTitle" id="titlemodif" value="<?= $post->getTitle() ?>"></input>
                            <input name="newContent" id="contentmodif" value="<?= $post->getContent() ?>"></input>

                            <button type="submit" name="changValid" id="validmodif" value="<?= $post->getId() ?>">valider</button>
                            <hr>

                        <?php } else { 
                            if (Post::getlikesByIdUser($post->getId(),$_SESSION["id"]) == 0) { ?>
                           <button type="submit" name="like" id="like" value="<?=$post->getId()?>"><img src="assets/image/likevide.png" alt="like"><?= $post->getLikes() ?></button> 
                           <?php } else  if (Post::getlikesByIdUser($post->getId(),$_SESSION["id"]) != 0) { ?>
                            <button type="submit" name="dislike" id="like" value="<?=$post->getId()?>"><img src="assets/image/heartplein.png" alt="dislike"><?= $post->getLikes() ?></button>
                           <?php } ?>
                            <h2><?= $post->getTitle() ?></h2>
                            <p><?= $post->getContent() ?></p>
                            <?php if ($_SESSION["id"] == $post->getIdUser()) { ?>
                                <button type="submit" name="modif" id="modifbutton" value="<?= $post->getId() ?>">modifier</button>
                                <button type="submit" name="delete" id="deletebutton" value="<?= $post->getId() ?>">supprimer</button>
                            <?php } ?>



                        <?php } ?>
                    </div>
                <?php endforeach ?>
            </div>

        </form>
    </main>
    <footer>
        atlCompagny tous droits reserver
    </footer>
</body>

</html>