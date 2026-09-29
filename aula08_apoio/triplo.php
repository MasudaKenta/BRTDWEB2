<?php
    session_start();

    if(isset($_SESSION["y"]))
        echo "Triplo de Y: " . $_SESSION['y']*3;

?>