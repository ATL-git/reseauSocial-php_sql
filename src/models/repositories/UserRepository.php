<?php
abstract class UserRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getUser(){
        return self::request("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserById($id){
        return self::request("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }
    public static function getUsernameById($id){
        return self::request("SELECT username FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserByName($name){
        return self::request("SELECT * FROM user WHERE username=".$name."")->fetch(PDO::FETCH_ASSOC);
    }
    public static function getIdByName($name , $password){
        return self::request("SELECT id FROM user WHERE username='".$name."' AND password='".$password."'")->fetch(PDO::FETCH_ASSOC);
    }
}

?>