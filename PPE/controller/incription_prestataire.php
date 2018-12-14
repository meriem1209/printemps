<?php
    include("controlleur.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Inscription </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
        <center>
        <?php
            $unC = new Controlleur("localhost:8889", "ppe_event", "root", "root");
            $unC->setTable("prestataire");
            $resultats = $unC->select_all();

            include("view/vue_inscription_prestataire.php");

            if(isset($_POST["Valider"])){
                $tab = array("nom" => $_POST["nom"],
                             "prenom" => $_POST["prenom"],
                             "email" => $_POST["email"],
                             "mdp" => $_POST["mdp"],
                             "adresse" => $_POST["adresse"],
                             "ville" => $_POST["ville"],
                             "codepostal" => $_POST["codepostal"],
                             "telephone" => $_POST["telephone"],

                             "service" => $_POST["service"],);



                /*if(empty ($_POST["nom"] || $_POST["email"] || $_POST["mdp"]))
                {
                    echo "Les champs * sont obligatoires";

                }else {
                     $unC->insert($tab);
                
                header ('location: view/categorie.php');
                }*/
                    $unC->insert($tab);

                    header ('location: view/vue_connexion_prestataire.php');
                }
        
        ?>

        </center>
    <div id="dropDownSelect1"></div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

</body>
</html>