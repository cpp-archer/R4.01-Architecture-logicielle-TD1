<?php

require_once 'Model.php';
require_once 'controllers.php';

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$isAuthenticated = (isset($_SESSION['login']) && isset($_SESSION['password']));
$isLoginRequest = (isset($_POST['login']) && isset($_POST['password']));

$cleanURI = ltrim(str_replace('index.php', '', $uri), '/');


if ( ! $isAuthenticated && ! $isLoginRequest || $uri === '/'  ) {
    return loginAction();
} else if( $isLoginRequest ) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: index.php/annonces');
    exit;
}

return match($cleanURI) {
    'annonces' => annoncesAction($_SESSION['login'], $_SESSION['password']),
    'post' => postAction($_GET['id'] ?? null),
    default => header('Status: 404 Not Found') &&
        print('<html><body><h1>The cake is not here</h1></body></html>'),
};


?>