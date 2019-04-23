<?php
require("includes/header.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'application/bdd_connection.php';

//if (!assert($_SESSION["connect"])){
//header('Location: /login.php');
//exit();
//}
{
    ?>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">

    <div class="corpsforum">

        <div class="container" style="padding-top:30px">
            <h1 class="text-center">Messagerie</h1>
            <div class="row">
                <div class="col-sm-3">

                    <?php

                    $idUserSource = 1;

                    $query = "SELECT * FROM users WHERE id != ".$idUserSource;
                    $resultSet = $pdo->query($query);
                    while ($reponse = $resultSet->fetch())
                    { ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="testimonial-desc">
                                    <a href="?idUser=<?php print($reponse{'id'}); ?>" >
                                        <img src="<?php print($reponse{'photo'}); ?>" alt="" />
                                        <div class="testimonial-writer">
                                            <div class="testimonial-writer-name"><?php print($reponse{'prenom'}." ".$reponse{'nom'}); ?></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>



                </div>

                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <?php
                                if(!empty($_GET) && !empty($_GET["idUser"]))
                                {

                                    if(!empty($_POST) && !empty($_POST["msg"])){
                                        $query = "INSERT INTO `messages` (`id`, `origin`, `desti`, `datemsg`, `message`) VALUES (NULL, '".$_GET["idUser"]."', '".$idUserSource."', NOW(), '".$_POST["msg"]."') ";
                                        $pdo->query($query);
                                    }


                                    $infosOrigin = [];
                                    $infosDesti = [];

                                    $query = "SELECT * FROM users WHERE id = ".$_GET['idUser'];
                                    $resultSet = $pdo->query($query);
                                    while ($reponse = $resultSet->fetch()){
                                        $infosDesti = $reponse;
                                    }


                                    $query = "SELECT * FROM users WHERE id = ".$idUserSource;
                                    $resultSet = $pdo->query($query);
                                    while ($reponse = $resultSet->fetch()){
                                        $infosOrigin = $reponse;
                                    }

                                    ?>
                                    <div class="panel-body">
                                        <ul class="chat">
                                            <?php
                                            $query = "SELECT * FROM messages WHERE origin = ".$idUserSource." and desti = ".$_GET['idUser']." or desti = ".$idUserSource." and origin = ".$_GET['idUser']." order by datemsg";
                                            $resultSet = $pdo->query($query);
                                            while ($reponse = $resultSet->fetch()){
                                                ?>
                                                <li class="right clearfix"><span class="chat-img pull-right">
                            <?php
                            if($reponse{'desti'} == $_GET['idUser']){
                                ?>
                                <img src="<?php print($infosDesti{'photo'}); ?>" alt="User Avatar" class="img-circle" />
                            <?php }else{ ?>
                                <img src="<?php print($infosOrigin{'photo'}); ?>" alt="User Avatar" class="img-circle" />
                            <?php } ?>
                        </span>
                                                    <div class="chat-body clearfix">
                                                        <div class="header">
                                                            <?php
                                                            if($reponse{'desti'} == $_GET['idUser']){
                                                                ?>
                                                                <small class=" text-muted"><?php echo $reponse{'datemsg'} ?></small>
                                                                <strong class="pull-right primary-font"><?php print($infosDesti{'prenom'}." ".$infosDesti{'nom'}); ?></strong>
                                                            <?php }else{ ?>
                                                                <small class=" text-muted"><?php echo $reponse{'datemsg'} ?></small>
                                                                <strong class="pull-right primary-font"><?php print($infosOrigin{'prenom'}." ".$infosOrigin{'nom'}); ?></strong>
                                                            <?php } ?>
                                                        </div>
                                                        <p>
                                                            <?php print($reponse{'message'}); ?>
                                                        </p>
                                                    </div>
                                                </li>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <form action="#?idUser=<?php echo $_GET['idUser']; ?>" method="post">
                                            <div class="input-group">

                                                <input name="msg" id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                                <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Envoyer</button>
                        </span>

                                            </div>
                                        </form>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>



                </div>


            </div>
        </div>

    </div>


    <?php
}
$requete = $bdd->query("SELECT count(*) AS nb FROM posts");
$reponse = $requete -> fetch();
echo $nb = $reponse['nb'];
$perPage = 2;

if(isset($_GET['page']))
{
    $page = $_GET['page']*$perPage;
}
else
{
    $page = 0;
}

$requete = $bdd->query("SELECT * FROM posts LIMIT ".$page.",".$perPage);

while ($reponse = $requete->fetch())
{
    echo "<p>".$reponse['contenu']."</p>";
}

for($i = 1; $i<= 2; $i++)
{
    echo "<a href='index.php?page=".($i-1)."'>".$i."</a>";
}
require("includes/footer.php");

?>
