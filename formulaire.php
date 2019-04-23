<?php
if(isset($_POST['submit']))
{
    $commentaire = $_POST['commentaire'];

    $requete = $bdd->query("INSERT INTO posts(commentaire, id_u)
    VALUES('$commentaire',$_SESSION['id_u'])");
}

if(isset($_SESSION['connecte'])) {
    ?>

    if(isset($_SESSION['connecte']))
    {
    ?>
    <form action="#" method="post">
        <textarea name="commentaire" id="" cols="30" rows="10"></textarea>
        <input type="submit" name="submit">
    </form>

    <?php
}
?>