<?php
abstract class PostRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getPost(){
        return self::request("SELECT p.id, p.title, p.content, p.id_user, COUNT(l.id) as 'likes' FROM post p LEFT JOIN likes l ON p.id=l.post_id GROUP BY p.id, p.title, p.content, p.id_user")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostById($id){
        return self::request("SELECT * FROM post WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPostBytitle($title){
        return self::request("SELECT * FROM post WHERE title=$title")->fetch(PDO::FETCH_ASSOC);
    }
    public static function insertIntoDb($post){
        return self::request("INSERT INTO post(title,content,id_user) VALUES('". $post->getTitle() ."','".$post->getContent() ."','".$_SESSION["id"]."')");
    }

    public static function removeFromDb($post){
        return self::request("DELETE FROM post WHERE id='" . $post."' AND id_user='".$_SESSION["id"]."'");
    }
    public static function updateFromDb($yolo,$yulu,$id){
        return self::request("UPDATE post SET title='$yolo' , content='$yulu' where id=$id");
    }

    public static function likes($user,$post){
        return self::request("INSERT INTO likes(user_id ,post_id) VALUES('$user','$post')");
    }
    public static function dislikes($user,$post){
        return self::request("delete from likes where user_id='$user' AND post_id='$post'");
    }
    public static function getlikesByIdUser($postId,$userId){
        return self::request("SELECT post_id,user_id FROM likes WHERE post_id=$postId AND user_id=$userId")->fetch(PDO::FETCH_ASSOC);
    }
    public static function getlikesById($id){
        return self::request("SELECT * FROM likes WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }
    public static function getUsersLikes(){
        return self::request("SELECT count(id) FROM likes ")->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>