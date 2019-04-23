<?php require("includes/header.php");
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">

<div class="corpsforum">
<div id="liste-membre">
    <h1>Liste de membreS</h1>


    <ul>
        <?php
        $sth = $bdd->prepare("SELECT login FROM forum.users ORDER BY ID_U");
        $sth->execute();

        while($result = $sth->fetch(\PDO::FETCH_ASSOC)){
            echo "<li>";
            echo $result['login'];
            echo "</li>";
        }
        ?>
    </ul>
</div>


    <?php require("includes/footer.php");
    ?>
