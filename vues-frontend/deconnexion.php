<?php
if (isset($_POST["btn-deconnexion"])){
    //echo "btn ok";
    session_unset();
    session_destroy();
    header("location: accueil");
}
?>


