<?php require("includes/header.php");
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'application/bdd_connection.php';

//if (!assert($_SESSION["connect"])){
//header('Location: /login.php');
//exit();
//}


if(!empty($_GET) && !empty($_GET["deleteIdGroupe"])){
    // supprimer un groupe
    $query = "DELETE FROM `groupe_users` where idGroupe = ".$_GET["deleteIdGroupe"];
    $pdo->query($query);

    $query = "DELETE FROM `groupe` where id = ".$_GET["deleteIdGroupe"];
    $pdo->query($query);
}

?>

<div class="corpsforum">
<div class="container" style="padding-top:30px">
    <h1 class="text-center">Groupes</h1>
    <a href="addGroupe.php">Ajouter un groupe</a>

    <h3>Mes Groupes</h3>
    <?php

    $query = "SELECT * FROM groupe where idUser = $idUserSource ";
    $resultSetG = $pdo->query($query);
    while ($reponseG = $resultSetG->fetch()){

        ?>
        <h5><?= $reponseG{'nom'} ?></h5> <a href="/addGroupe?update=true&idGroupe=<?= $reponseG{'id'} ?>">Modifier</a>
        <a href="/groupe.php?deleteIdGroupe=<?= $reponseG{'id'} ?>">Supprimer</a>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                    </tr>
                    <?php

                    $query = "SELECT * FROM groupe_users where idGroupe = ".$reponseG{'id'};
                    $resultSet = $pdo->query($query);
                    while ($reponse = $resultSet->fetch())
                    {
                        $user = null;
                        $query = "SELECT * FROM users where id = ".$reponse{'idUser'};
                        $resultSetU = $pdo->query($query);
                        while ($reponseU = $resultSetU->fetch()){
                            $user = $reponseU;
                        }

                        ?>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <img src="<?php echo $user{'photo'} ?>" alt="" />
                            </td>
                            <td>
                                <?php echo $user{'nom'} ?>
                            </td>
                            <td>
                                <?php echo $user{'prenom'} ?>
                            </td>
                            <td>
                                <?php echo $user{'email'} ?>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </div>

        </div>
            </div>
        <?php
    }
    ?>


    <h3>Groupes invité</h3>
    <ul>
        <?php
        $query = "SELECT * FROM groupe_users, groupe where groupe_users.idUser = $idUserSource and groupe_users.idGroupe = groupe.id ";
        $resultSet = $pdo->query($query);
        while ($reponse = $resultSet->fetch()){

            ?>
            <li><?= $reponse{'nom'} ?></li>
            <?php
        }
        ?>
    </ul>

</div>


<?php require("includes/footer.php");
?>
