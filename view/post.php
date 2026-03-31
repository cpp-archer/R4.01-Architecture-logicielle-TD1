<?php
if( !isset( $login) or $login=='' ){
    header( "refresh:5;url=index.php" );
    echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
    exit;
}
?>

<?php $title= $post['title']; ?>

<?php ob_start(); ?>
<h1><?php echo $post['title'];?></h1>
            <div class="date">
                <?php echo $post['date'];?>
            </div>

        <div class="body">
    <?php echo $post['body'];?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

