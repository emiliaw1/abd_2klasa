    <?php
        session_start();
        $_SESSION=array();
        $protocol = 'http'.(!empty($_SERVER['HTTPS']) ? 's' : '');
        $url = $protocol.'://'.$_SERVER['SERVER_NAME'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));
        header('Location: '.$url.'/logowanie.php');
    ?>
