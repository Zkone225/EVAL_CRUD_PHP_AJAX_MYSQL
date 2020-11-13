<?php

require_once "connexion.php";

$connexion = db_connexion();

// On traite la requete INSERT

if(isset($_POST['submit'])){


    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);
    $mdp2 = trim($_POST['mdp2']);
    $cgu = ($_POST['cgu']);


    if (empty($pseudo)){
        echo "veuillez rentrer un pseudo";
    }elseif (empty($mdp)){
        echo "veuillez renter un mot de passe";
    }elseif ($mdp != $mdp2){
        echo "veuillez rentrer deux mots de passe identiques";
    }elseif ($cgu){
        echo "veuillez accepter les conditions generales d'utilisation";
    }
    else{
        header("location:pages/pageEnregistrement.php");
    }


    if(!empty($pseudo) && ($mdp ===$mdp2) && (!empty($cgu) ) ){
        $requete = "insert into users(pseudo, mdp) values (?, ?)";


        try{
            $requeteFaite = $connexion->prepare($requete);
            $requeteFaite->execute([$pseudo, $mdp]);
            header("location:pages/pageEnregistrement.php");
        }catch (Exeption $exception){
            $exception->getMessage();
        }

    }

}