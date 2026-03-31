<?php

require 'config.php';
function openConnection()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
return $link;
}

function closeConnection($link)
{
mysqli_close($link);
}

function isUser( $login, $password )
{
$isuser = False ;
$link = openConnection();

$query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
$result = mysqli_query($link, $query );

if( mysqli_num_rows( $result) )
$isuser = True;

mysqli_free_result( $result );
closeConnection($link);

return $isuser;
}

function getAllAnnonces()
{
$link = openConnection();

$result = mysqli_query($link,'SELECT id, title FROM Post');
$annonces = array();

while ($row = mysqli_fetch_assoc($result)) {
$annonces[] = $row;
}

mysqli_free_result( $result);
closeConnection($link);

return $annonces;
}

function getPost( $id )
{
$link = openConnection();

$id = intval($id);
$result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
$post = mysqli_fetch_assoc($result);

mysqli_free_result( $result);
closeConnection($link);
return $post;
}

