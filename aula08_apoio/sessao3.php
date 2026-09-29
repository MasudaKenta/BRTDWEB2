<?php
    session_start();
    if(isset($_SESSION["y"]))
        echo "Y: " . $_SESSION["y"];

?>