<?php
    include("controlleur.php")
?>
<html>
    <head>
        <title>Inscription</title>
    </head>
    <body>
        <center>
        <?php
            $unC = new Controlleur("localhost:8889", "ppe_event", "root", "root");
            $unC->setTable("client");
            $resultats = $unC->select_all();

        	include("vue.php");

            if(isset($_POST["Valider"])){
                $tab = array("nom" => $_POST["nom"],
                             "email" => $_POST["email"],
                             "mdp" => $_POST["mdp"] );
                $unC->insert($tab);
                echo"<br/>Insertion reussie !<br/>";
            }
		?>
        </center>
    </body>
</html>