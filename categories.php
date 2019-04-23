<?php
    require "includes/header.php";
   $requete = $bdd->query("SELECT * FROM topics WHERE id_cat = ".$_GET['id_cat']);

    while($reponse = $requete->fetch())
    {
        echo "<p><a href='topic.php?id_t=".$reponse['id_t']."'>"
            .$reponse['titre']."</p>";
    }

    require "includes/footer.php";
?>


