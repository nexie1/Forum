<?php

session_start();

require './fonctions/fonctionsBDcrud.php';

include './pages/Head.php';
include './pages/Nav.php';
include './pages/aside.php';

if (isset($_GET["articles"])) {
    
    include './PagesBlog/commentaires.php';
    
} else if (isset($_GET["addComm"])) {
    include './PagesBlog/AjoutCom.php';
} 
else if (isset($_GET["AddArticles"])) {
    include './PagesBlog/ajouter.php';
} else if (isset($_GET["ModifArticles"])) {
    include './PagesBlog/modifier.php';
} else {
    include './pages/Section.php';
}
include './pages/Footer.php';
