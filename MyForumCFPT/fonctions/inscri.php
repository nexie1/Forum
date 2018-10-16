<?php

session_start();
//Si il est envoyer alors
if (isset($_POST["Send"])) {
    //Teste si mon Password est = à mon PasswordConfirm    
    if ($_POST["Password"] == $_POST["PasswordConfirm"]) {
        // Hachage de password
        $Password = (isset($_POST["Password"]) ? $Password = $_POST["Password"] : $Password = "" );
        $pass_hache = hash('sha256', $Password);

        //Prend mes infos étant écrite dans le formulaire
        $user["nom"] = $_POST["nom"];
        $user["prenom"] = $_POST["prenom"];
        $user["Username"] = $_POST["Username"];
        $user["Password"] = $pass_hache;
        $user["Email"] = $_POST["Email"];
        
        


        //todo voir si lutilisateur est deja dans base
        if ($_POST["CopieCaptcha"] == $_SESSION['captcha']) {

            //Inscri la personne
            addUser($user);
            header('Location: ./loginCRUD.php');
        } else {

            echo 'Votre captcha est faux ou l utilisateur est déjà enregistrer';
        }
    } else {
        echo "<script type='text/javascript'>alert('Vos mots de passe ne corresponde pas!');</script>";
    }
}