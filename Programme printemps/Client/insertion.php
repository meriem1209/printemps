<?php
	
	
    $objetPdo = new PDO('mysql:host=localhost:8889;dbname=ppe_event','root','root');
	
	$pdoStat = $objetPdo->prepare('INSERT INTO client VALUES ( NULL, :nom, :email, :mdp');

	$pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
	$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	$pdoStat->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
	
	$insertIsOk = $pdoStat->execute();
	
	if($insertIsOk){
		$message = 'Le cron a bien été ajouté';
	}
	else{
		$message = 'Echec de l\insertion';
	}
	
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire d'inscription</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Insertion du cron<h1>
  
  <p><?php echo $message; ?></p>
  
  </body>
	
