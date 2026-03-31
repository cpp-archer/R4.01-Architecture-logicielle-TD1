
<?php $title= $post['title']; ?>

<?php ob_start(); //mémoire tampon ?>
<h1><?php echo $post['title'];?></h1>
            <div class="date">
                <?php echo $post['date'];?>
            </div>

    <div class="body">
<!--        main contenu du post-->
         <?php echo $post['body'];?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>

