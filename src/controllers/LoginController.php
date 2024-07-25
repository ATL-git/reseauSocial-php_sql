<?php
session_start();

class LoginController extends Controller
{
    public function index()
    {
        $error = "";

        try {

            if (isset($_POST["username"]) && isset($_POST["password"])) {

                $nom = $_POST["username"];
                $password = $_POST["password"];
                $usernamePattern = "/^[a-zA-Z0-9_-]+$/";
                $passwordPattern = "/^[a-zA-Z0-9]+$/";

                if (preg_match($usernamePattern, $passwordPattern)) {
                    $error = "veuillez remplir les champs avec des caracteres valides";
                } else {
                    $dataDb = User::getIdByName($nom, $password);

                    if (!User::getIdByName($_POST["username"],$_POST["password"]) ) {
                        $error = "Nom ou mot de passe introuvable";
                    } else {

                        $_SESSION["id"] = $dataDb['id'];
                        header("Location:/main");
                        exit();
                    }
                }
            }
           
        } catch (PDOException |Exception $e) {
            
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/login.php");
    }
}
