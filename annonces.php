<?php
    include 'config.php';
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $query= 'SELECT login FROM Users WHERE login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
    $resultlogin = mysqli_query($link, $query );
    
    if( mysqli_num_rows( $resultlogin) ){
        $login = $_POST['login'];
        mysqli_free_result( $resultlogin );
        $resultall = mysqli_query($link, 'SELECT id, title FROM Post');
        $annonces = array();
        while ($row = mysqli_fetch_assoc($resultall)) {
            $annonces[] = $row;
        }

    }
//    else{
//        header( "refresh:5;url=index.php" );
//        echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
//        exit;
//    }
    mysqli_close($link);
    require 'view/annonces.php';
?>

