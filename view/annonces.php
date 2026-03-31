<?php
//verifie si login existe
if( !isset( $login) or $login=='' ){

    //redirection à l'accueil apres 5s
    header( "refresh:5;url=/annonces/index.php" );
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
}
?>


<?php
//titre utilisé dans layout.php
$title= 'Exemple Annonces Basic PHP: Annonces'; ?>

<?php ob_start();//output buffering ?>
    <p> Hello <?php echo $login; ?> </p>
    <h1>List of Posts</h1>
    <ul>
<!--        on fait une boucle sur toutes les annonces de la bdd-->
        <?php foreach( $annonces as $post ) : ?>
            <li>
<!--                lien des details du post selon son id-->
                <a href="index.php/post?id=<?php echo $post['id']; ?>">
                    <?php echo $post['title']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; //on inclu le template?>