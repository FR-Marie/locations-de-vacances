<?php
/*
 * ob_start() démarre la temporisation de sortie.
 *  Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
 */
ob_start();
//////LES OPTIONS PASSEES DANS L'URL =>
//->Si dans url, un paramètre $_GET['url'] existe
//-> soit index.php?url="quelquechose"
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "accueil";
}
//Si $url retourne une chaîne de caractères VIDE = on retourne sur l'accueil
if($url === ""){
    $url = "accueil";
}
//////////////Si $url = "ACCUEIL"/////////////////
if($url === "accueil"){
    $title  = "-ACCUEIL- Locations de vacances";
    require_once "vues-frontend/accueil.php";

//////////////////Si $url = "404"/////////////////
// = Si $url est différent du tableau de valeurs [#:0-9A-Za-z]
}elseif ($url === "404"){
    $title  = "-ERREUR- Locations de vacances";
    require_once "vues-frontend/404.php";


//////////////////Si $url = ""/////////////////
}


elseif($url !=  '#:[\w]+)#'){
    //On redirige vers la page d'accueil
    //header("Location: accueil");
}
/*
 * ob_get_clean — Lit le contenu courant du tampon de sortie puis l'efface
 */
//ici $content se situe dans le dossier template.php
$content = ob_get_clean();
require_once "template.php";



