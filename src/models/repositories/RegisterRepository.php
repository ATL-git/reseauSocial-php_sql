<?php
abstract class RegisterRepository extends Db{
    private static function request($request){
        $result = self::getInstance()->query($request);
        self::disconnect();
        return $result;
    }

    public static function getUserByName($username){
        return self::request("SELECT * FROM user where username='$username'")->fetch(PDO::FETCH_ASSOC);
    }
    public static function insertIntoDb($username,$password){
        return self::request("INSERT INTO user(username,password) VALUES('$username','$password')");
    }

   
}

?>