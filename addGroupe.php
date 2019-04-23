<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'includes/header.php';
include 'application/bdd_connection.php';

//if (!assert($_SESSION["connect"])){
//header('Location: /login.php');
//exit();
//}

$groupe = null;
$userGroupe = array();

if(!empty($_GET) && !empty($_GET["idGroupe"])){
    // modification du groupe
    $query = "SELECT * FROM groupe where id = ".$_GET["idGroupe"];
    $resultSet = $pdo->query($query);
    while ($reponse = $resultSet->fetch()){
        $groupe = $reponse;
    }
}



if(!empty($_POST) && !empty($_POST["nom"]) && !empty($_POST["membres"]) ){


    if($groupe == null){
        // ajout
        $query = "INSERT INTO `groupe` (`id`, `nom`, `idUser`) VALUES (NULL, '".$_POST["nom"]."', $idUserSource) ";
        $pdo->query($query);
        $lastId = $pdo->lastInsertId();

        for($i = 0; $i < count($_POST["membres"]) ; $i++){
            $query = "INSERT INTO `groupe_users` (`idUser`, `idGroupe`) VALUES (".$_POST["membres"][$i].", ".$lastId.") ";
            $pdo->query($query);
        }
    }else{
        // modification
        $query = "UPDATE `groupe` set  `nom`=  '".$_POST["nom"]."' where id = ".$_GET["idGroupe"];
        $pdo->query($query);

        $query = "DELETE FROM `groupe_users` where idGroupe = ".$_GET["idGroupe"];
        $pdo->query($query);


        for($i = 0; $i < count($_POST["membres"]) ; $i++){
            $query = "INSERT INTO `groupe_users` (`idUser`, `idGroupe`) VALUES (".$_POST["membres"][$i].", ".$_GET["idGroupe"].") ";
            $pdo->query($query);
        }
    }

    header('Location: /groupe.php');
    exit();


}

if(!empty($_GET) && !empty($_GET["idGroupe"])){
    // modification du groupe
    $query = "SELECT * FROM groupe where id = ".$_GET["idGroupe"];
    $resultSet = $pdo->query($query);
    while ($reponse = $resultSet->fetch()){
        $groupe = $reponse;
    }

    $query = "SELECT idUser FROM groupe_users where idGroupe = ".$_GET["idGroupe"];
    $resultSet = $pdo->query($query);
    while ($res = $resultSet->fetch()) {
        $userGroupe[]  = $res{"idUser"};
    }

}



?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">
<div class="corpsforum">
<div class="container" style="padding-top:30px">
    <h1 class="text-center">Groupe</h1>
    <a href="/groupe.php">Mes groupes</a>

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <form class="form-horizontal" role="form" method="post" action="#" style="width: 100%;">
                    <div class="form-group">
                        <label class="col-lg-9 control-label">Nom du groupe:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="nom" type="text" value="<?php
                            if($groupe != null){
                                echo $groupe{'nom'};
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-9 control-label">Membres du groupe:</label>


                        <div class="row">

                            <?php

                            $query = "SELECT * FROM users where id != $idUserSource";
                            $resultSet = $pdo->query($query);
                            while ($reponse = $resultSet->fetch())
                            { ?>
                            <div class="col-sm-3">
                                <div id="tb-testimonial" class="testimonial testimonial-primary">
                                    <div class="testimonial-desc">
                                        <input type="checkbox" name="membres[]" value="<?php print($reponse{'id'}); ?>"  <?php

                                        if ($groupe != null && $userGroupe != null){
                                            for($i = 0; $i < count($userGroupe) ; $i++){
                                                if($userGroupe[$i] == $reponse{'id'}){
                                                    echo "checked";
                                                }
                                            }
                                        }

                                        ?>>
                                        <img src="<?php echo $reponse{'photo'} ?>" alt=""/>
                                        <div class="testimonial-writer">
                                            <div class="testimonial-writer-name"><?php print($reponse{'nom'}); ?></div>
                                            <div class="testimonial-writer-designation"><?php print($reponse{'prenom'}); ?></div>
                                        </div>

                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>



                        </div>


                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                                <input class="btn btn-primary" value="Sauvegarder" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
</div>

<?php require("includes/footer.php");
?>