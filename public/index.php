<?php

require_once(__DIR__ . "/../src/models/Db.php");
require_once(__DIR__ . "/../src/models/repositories/UserRepository.php");
require_once(__DIR__ . "/../src/models/repositories/PostRepository.php");
require_once(__DIR__ . "/../src/models/repositories/RegisterRepository.php");
require_once(__DIR__ . "/../src/models/Post.php");
require_once(__DIR__ . "/../src/models/User.php");
require_once(__DIR__ . "/../src/models/Register.php");
require_once(__DIR__ . "/../src/controllers/Controller.php");
require_once(__DIR__ . "/../src/Controllers/LoginController.php");
require_once(__DIR__ . "/../src/controllers/MainController.php");
require_once(__DIR__ . "/../src/Controllers/LogoutController.php");
require_once(__DIR__ . "/../src/Controllers/RegisterController.php");
require_once(__DIR__ . "/../core/Router.php");




try {
    $app = new Router();
    $app->start();
} catch (PDOException $e) {
    die($e->getMessage());
}
