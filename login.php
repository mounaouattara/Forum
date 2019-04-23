<?php
require("includes/header.php");

if(isset ($_POST['submit']))//si le formulaire a été validé//
{
    $_email = $_POST['email'];
    $_mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("SELECT* FROM users WHERE
    email ='$_email' AND mdp='$_mdp'");

    if($reponse =$requete->fetch()) /*ligne qui stocke les infos*/
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:index.php");//redirection
    }
    else
    {
        echo "Identifiant incorrect";
    }
}
?>
<div class="corpsforum">
        <div align="center" style="margin-top: 100px;">
        <fieldset style="height: 350px; width: 800px;">
             <legend style="color: white;"><strong>Connexion</strong></legend>
        <form style="margin-top: 50px; margin-left: 0; margin-right: 0;" method="post" action="#" align="center" >
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"/><br/>
            <label for="mdp">Mdp :</label>
            <input type="password" name="mdp" id="mdp"/> <br/>
            <input type="submit" name="submit" value="Login"/>
            <a href="register.php">Pas encore inscrit?</a> <br>
            <a href="generer.php">Mot de passe oublié</a>
        </form>
        </fieldset>
        </div>
</div>
<?php
require("includes/footer.php");
?>
