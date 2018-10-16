<?php
//Si il est envoyer alors
if (isset($_POST["SupprArt"])) {

    
    $info["idArticle"] =  $_GET["articles"];
    $infos["idArticle"] =  $_GET["articles"];
    SupprCommByArt($info);
    
    SupprArt($infos);
    header('Location: ./index.php');
}

