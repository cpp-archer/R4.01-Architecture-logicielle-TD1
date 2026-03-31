<?php

require 'config.php'; //fichier de config
function openConnection()
{
try{
    //on crée l'objet de PDO pour se connecter
    $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
} catch(PDOException $e){ //cas d'erreur
    print "Erreur de connexion ! :".$e->getMessage() . "<br/>";
    die();
}
return $bdd;

}

//liberer la connexion
function closeConnection($link)
{
    $bdd = null;
}

//on verifie si l'utilisateur existe deja dans la bdd
function isUser( $login, $password )
{
    $isuser = False ;

    $bdd = openConnection();

    $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
    $result = $bdd->query($query);

    if($result->rowCount())
        $isuser = True;

    $result->closeCursor();
   closeConnection($bdd);

    return $isuser;
}

//on récupère toutes les annonces dans la bdd
function getAllAnnonces()
{
    $bdd = openConnection();

    //verif login et MDP
    $result = $bdd->query('SELECT id, title FROM Post');
    $annonces = array();

    while ($row = $result->fetch()) { //si on trouve une ligne correspondante
        $annonces[] = $row;
    }

    $result->closeCursor();
    closeConnection($bdd);

    return $annonces;
}

//on récupère tout les posts de la bdd
function getPost( $id )
{
    $bdd = openConnection();
    $id = intval($id);

    $result = $bdd->query('SELECT * FROM Post WHERE id=' . $id);
    $post = $result->fetch();

    $result->closeCursor();
    closeConnection($bdd);

    return $post;
}

