<?php
class MainController extends Controller
{
    public function index()
    {

        try {
            if (isset($_POST["dislike"])) {

                Post::dislikes($_SESSION["id"], $_POST["dislike"]);
            }
            if (isset($_POST["like"])) {

                if (Post::getlikesByIdUser($_POST["like"], $_SESSION["id"]) == 0) {

                    Post::likes($_SESSION["id"], $_POST["like"]);
                }
            }
            if (isset($_POST["changValid"])) {
                Post::updateFromDb($_POST["newTitle"], $_POST["newContent"], $_POST["changValid"]);
            }
            if (isset($_POST["delete"])) {
                Post::removeFromDb($_POST["delete"]);
            }
            if (isset($_POST["valide"])) {

                $postToUpdate = new Post($_POST["title"], $_POST["text"], $_SESSION["id"]);
                Post::insertIntoDb($postToUpdate);
            }

            $postdb = post::getPost();
            $posts = [];
            foreach ($postdb as $post) {
                $posts[] = new Post($post["title"], $post["content"], $post["id_user"], $post["likes"], $post["id"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/main.php");
    }
}
