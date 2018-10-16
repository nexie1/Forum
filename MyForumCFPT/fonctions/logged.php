<?php

session_start();
//Si il est envoyer alors
if (isset($_POST["Sent"])) {

    //Teste si mon Password est = vide    
    if ($_POST["Password"] != "" && $_POST["Username"] != "") {
        // Hachage de password
        $Username = (isset($_POST["Username"]) ? $Username = $_POST["Username"] : $Username = "" );
        $Password = (isset($_POST["Password"]) ? $Password = $_POST["Password"] : $Password = "" );
        $pass_hache = hash('sha256', $Password);

        if ($pass_hache == Login($Username)["Password"]) {

            //Login($users);
            if ($_POST["CopieCaptcha"] == $_SESSION['captcha']) { 
            $_SESSION['isAdmin'] = Login($Username)["statutPrive"];   
            
            echo $_SESSION['isAdmin'];
            $_SESSION['SonUsername'] = Login("$Username")["Username"];
            
                
                $_SESSION["logged"] = true;
               // header('Location: ./index.php');
            } else {

                echo 'Votre captcha est faux ou l utilisateur est déjà enregistrer';
            }
        } else {
            echo " VOTRE MOT DE PASSE OU UTILISATEUR EST faux";
        }
    }
}

