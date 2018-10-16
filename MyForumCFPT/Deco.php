<?php
//On start la session sinon on ne peux pas la détruire
session_start();
//On detruit la session
session_destroy();
//Et on revient sur la page de login
header('Location: index.php');

