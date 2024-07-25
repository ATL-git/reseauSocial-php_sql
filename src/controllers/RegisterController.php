<?php
class RegisterController extends Controller
{
    public function index()
    {
        $errors = "";
        try {
            if (isset($_POST["usernameRegister"]) && isset($_POST["passwordRegister"])) {

                $usernamePattern = "/^[a-zA-Z0-9_-]+$/";
                $passwordPattern = "/^[a-zA-Z0-9]+$/";

                if (!preg_match($usernamePattern, $_POST["usernameRegister"]) && !preg_match($passwordPattern, $_POST["passwordRegister"])) {
                    $errors = "veuillez remplir les champs avec des caracteres valides";
                } else {
                    $testUsername = Register::getUserByName($_POST["usernameRegister"]);
                    
                    if ($testUsername == 0) {
                        Register::insertIntoDb($_POST["usernameRegister"], $_POST["passwordRegister"]);
                        header("Location:/login");
                        exit();
                    }else{
                        $errors = "le nom existe déja veuillez renseigner un nom valide";
                    }
                }
            }
        } catch (PDOException |Exception $e) {
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/registerView.php");
    }
}
