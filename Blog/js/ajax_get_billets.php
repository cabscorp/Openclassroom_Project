<?php

    if(isset($_POST['billets'])){
	    	$id = $_POST['billets'];
	    	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', 
	    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$req = $bdd->prepare('SELECT id, title, content FROM billets WHERE id = ?');
		$req->execute(array($id));
		$billets = $req->fetch();
		echo json_encode($billets);
    }
    

