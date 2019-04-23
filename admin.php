    <?php
    require("includes/header.php");

        if (isset($_GET['ban']))
        {
            $requete = $bdd->query("UPDATE users SET ban = 1 
                                              WHERE id_u = ".$_GET['ban']);
        }

        if (isset($_GET['deban']))
        {
            $requete = $bdd->query("UPDATE users SET ban = 1 
                                                  WHERE id_u = ".$_GET['deban']);
        }


    $requete = $bdd->query("SELECT * FROM users");

        while($reponse = $requete->fetch())
        {
            echo $reponse['login'];
            if($reponse['ban'] == 0)
            {
                echo "<a href='admin.php?ban=".
                    $reponse['id_u']."'>Bannir</a> ";
            }
            else
            {
            echo $reponse['login']." <a href='admin.php?ban=".
                $reponse['id_u']."'>Debannir</a>";
            }
        }

        require("includes/footer.php");
?>
