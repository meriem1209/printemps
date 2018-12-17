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
            $unC->setTable("user");
            $resultats = $unC->select_all();

            include("view/vue_connexion_prestataire.php");

            if(isset($_POST["Valider"])){
                $tab = array(
                             
                             "email" => $_POST["email"],
                             "mdp" => $_POST["mdp"],
                             );



                /*if(empty ($_POST["nom"] || $_POST["email"] || $_POST["mdp"]))
                {
                    echo "Les champs * sont obligatoires";

                }else {
                     $unC->insert($tab);
                
                header ('location: view/categorie.php');
                }*/
                    $unC->insert($tab);

                    header ('location: view/categorie.php');
                }
        
        ?>

        </center>
    </body>
</html>