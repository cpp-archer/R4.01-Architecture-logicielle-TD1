<?php

require 'config.php';
function openConnection()
{
try{
    $bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
} catch(PDOException $e){
    print "Erreur de connexion ! :".$e->getMessage() . "<br/>";
    die();
}
return $bdd;

}

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

    $result = $bdd->query('SELECT id, title FROM Post');
    $annonces = array();

    while ($row = $result->fetch()) {
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

