<?php
include('../database_connect.php');

$req = $bdd->prepare('UPDATE billets SET title = ?, content = ? WHERE title = ?');
$req->execute(array($_POST['new_title'], $_POST['new_content'], $_POST['selected_title']));
header('Location: index.php');