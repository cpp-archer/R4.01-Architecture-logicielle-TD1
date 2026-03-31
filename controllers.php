<?php

//fonction pour afficher la page de login
function loginAction()
{
    require 'view/login.php';
}

//affiche la liste des annonces
function annoncesAction( $login, $password)
{
    if( isUser( $login, $password ) )
        $annonces = getAllAnnonces();
    else
        $login='';

    require 'view/annonces.php';
}

//affiche le post
function postAction($id)
{
    $post = getPost($id);
    require 'view/post.php';
    //chargement des vues (post; annonces etc)
}

?>