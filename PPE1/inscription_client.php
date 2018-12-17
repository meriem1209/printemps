<?php
    include("controller/controlleur.php")
?>
<html>
    <head>
        <title> Inscription </title>
    </head>
    <body>
        <center>
        <?php
            $unC = new Controlleur("localhost:8889", "ppe_event", "root", "root");

            $unC->setTable("client");
            $resultats = $unC->select_all();

            include("view/vue_inscription.php");

            if(isset($_POST["Valider"])){
                $tab = array("nom" => $_POST["nom"],
                             "prenom" => $_POST["prenom"],
                             "email" => $_POST["email"],
                             "mdp" => $_POST["mdp"],
                             "datenaissance" => $_POST["datenaissance"],
                             "adressefacturation" => $_POST["adressefacturation"],);



                /*if(empty ($_POST["nom"] || $_POST["email"] || $_POST["mdp"]))
                {
                    echo "Les champs * sont obligatoires";

                }else {
                     $unC->insert($tab);
                
                header ('location: view/categorie.php');
                }*/
                    $unC->insert($tab);

                    header ('location: view/vue_connexion.php'); 
                }
        
        ?>

        </center>
    </body>
</html>