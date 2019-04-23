    <?php
        require("includes/header.php");

        if(isset($_GET['id_p']))
        {
            $requete = $bdd->query("DELETE FROM posts WHERE id_p = ".
                $_GET ['id_p']);


        if(isset($_GET['id_u'])){
        $requete= $bdd->query("SELECT * FROM posts WHERE id_u= ".
                $_GET ['id_u']);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        while($reponse = $requete->fetch())
        {
            if($reponse['id_u'] == $_SESSION['id_u'])
            {
                echo "<a href='index.php?id_p=".$reponse['id_p']."'>X
                </a>";
            }
            echo "<p>".$reponse['contenu']."</p>";
        }
        }
        }
        if(isset($_SESSION['connecte']))
        {
        $requete = $bdd->query("SELECT * FROM topics WHERE id_cat = ".
            $_GET['id_cat']);



        while($reponse = $requete->fetch())
        {
            echo "<p><a href='topic.php?id_t=".$reponse['id_t']."'>"
                .$reponse['titre']."</p>";
        }
 }

        ?>



    <div class="PA">
        PA
    </div>

        <div class="corpsforum">

            <div class="categorie">
                <li><a id="plouc" href="categories.php?id_cat=1">Administration</a></li>
            <li><a href="categories.php?id_cat=2">Tendances</a></li>
            <li><a href="categories.php?id_cat=3">Fashion Week</a></li>
            </div>

        </div>


    <?php require("includes/footer.php");
    ?>
















	