<?php
    include 'config.php';

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$_GET['id'] );
    $post = mysqli_fetch_assoc($result);

    mysqli_close( $link );
    require 'view/post.php';

?>



