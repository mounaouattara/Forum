<?php require("includes/header.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'application/bdd_connection.php';

//if (!assert($_SESSION["connect"])){
//header('Location: /login.php');
//exit();
//}


if(!empty($_POST) && !empty($_POST["nom"])){
    $query = "UPDATE  `users` set `nom`= \"".$_POST["nom"]."\",  `prenom`= \"".$_POST["prenom"]."\", `email`= \"".$_POST["email"]."\", `activ1` = \"".$_POST["activ1"]."\", `activ2` = \"".$_POST["activ2"]."\" where id = ".$_GET["idUser"];
    $pdo->query($query);
}

?>

    <div class="corpsforum">

        <div class="container" style="padding-top: 60px;">

            <?php

            $query = "SELECT * FROM users WHERE id = ".$_GET["idUser"];
            $resultSet = $pdo->query($query);

            $reponseUser = null;
            $isUpdateProfil = $idUserSource == $_GET["idUser"] ;
            if(!empty($_GET) && !empty($_GET["update"]) && $_GET["update"] == "true"){
                $isUpdateProfil = true;
            }

            while ($reponse = $resultSet->fetch()) {
                $reponseUser = $reponse;
            }


            ?>

            <h1 class="page-header">Profil</h1>
            <div class="row">
                <!-- left column -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        <img src="<?= $reponseUser{'photo'} ?>" class="avatar img-circle img-thumbnail" alt="avatar"><br><br>
                        <h6>Inscrit le  <?= $reponseUser{'dateInsc'} ?></h6>
                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                    <h3>Informations personnel</h3>
                    <form class="form-horizontal" role="form" method="post" action="#">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nom :</label>
                            <div class="col-lg-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="form-control" name="nom" value="<?= $reponseUser{'nom'} ?>" type="text">
                                <?php }else{?>
                                    <?= $reponseUser{'nom'} ?>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Prénom :</label>
                            <div class="col-lg-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="form-control" name="prenom" value="<?= $reponseUser{'prenom'} ?>" type="text">
                                <?php }else{?>
                                    <?= $reponseUser{'prenom'} ?>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Quelle marque vous préférer :</label>
                            <div class="col-lg-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="form-control" name="activ1" value="<?= $reponseUser{'activ1'} ?>" type="text">
                                <?php }else{?>
                                    <?= $reponseUser{'activ1'} ?>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Quelle est votre style vestimentaire :</label>
                            <div class="col-lg-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="form-control" name="activ2" value="<?= $reponseUser{'activ2'} ?>" type="text">
                                <?php }else{?>
                                    <?= $reponseUser{'activ2'} ?>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="form-control" name="email" value="<?= $reponseUser{'email'} ?>" type="text">
                                <?php }else{?>
                                    <?= $reponseUser{'email'} ?>
                                <?php }?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <?php if($isUpdateProfil){ ?>
                                    <input class="btn btn-primary" value="Save Changes" type="submit">
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require("includes/footer.php");
?>