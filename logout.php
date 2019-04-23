<?php require("includes/header.php");?>

<?php
// sublimetext >Brackets
session_start();
session_destroy ();
header("Location:index.php");
?>


<?php require("includes/footer.php"); ?>