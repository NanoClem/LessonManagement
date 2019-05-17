<?php
    require('../configs/session_configs.php');

    session_destroy();
    unset($_SESSION);
    header('Location: ../../../index.html');
?>