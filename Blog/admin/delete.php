<?php
include('../database_connect.php');

$req = $bdd->prepare('DELETE FROM billets where title = ?');
$req->execute(array($_POST['billettodelete']));
header('Location: index.php');
?>