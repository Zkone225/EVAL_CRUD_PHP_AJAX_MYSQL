<?php

require_once "../connexion.php";

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
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../statics/css/app.css">
    <link rel="stylesheet" href="../statics/css/bootstrap.min.css"/>



    <title>Page index</title>
</head>
<body>

    <div class="container">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light ">
            <img src="../statics/img/logo.jpg" >

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pageLogin.php">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pageEnregistrement.php">register</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>




    <div class="container" id="corp">
        <div class="row">
            <div class="col-sm my-auto mx-auto">
                <img id="img" class="img-fluid" src="../statics/img/employe1.jpg" >
            </div>
            <div class="col-sm my-auto mx-auto">
                <form id="form" name="form" method="post" class="mx-auto shadow-lg" action="../models.php" >
                    <h2 class="text-center">CREER UN COMPTE</h2> <br>
                    <div id="thx" class="mx-auto" >

                        <div>
                        <label for="">Pseudo</label>
                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Entrez votre pseudo" name="pseudo">
                        </div>

                        <div>
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="" placeholder="Entrez votre mot de passe"name="mdp">
                        </div>

                        <div>
                        <label for="">Retapez votre password</label>
                        <input type="password" class="form-control" id="" placeholder="Entrez à nouveau votre mot de passe"name="mdp2">
                        </div>

                        <br>
                        <div>
                            <p class="mx-3"> <input type="checkbox" name="cgu" class="form-check-input" id="exampleCheck1"> J'accepte les conditions d'utilisation </p>
                        </div>

                        <button id="enregistrer" type="submit" name="submit" class="btn btn-primary ">S'enregistrer</button>

                    </div>
                    <div class="text-center"> <br>
                        <a href="">Vous etes dejà enregistré? Connectez-vous ici</a>
                    </div>
                    <br>
                    <br>
                </form>

            </div>
        </div>
    </div>
</div>




<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>


