<h2>Liste des eleves du cfa</h2>

<?php
    echo "<table border = 1>
    <tr><td>id eleve</td><td>nom</td><td>prenom</td><td>adresse</td><td>id classe</td></tr>";
    foreach ($resultats as $unRes){
        echo "<tr><td>".$unRes["ideleve"]."</td>
                <td>".$unRes["nom"]."</td>
                <td>".$unRes["prenom"]."</td>
                <td>".$unRes["adresse"]."</td>
                <td>".$unRes["idclasse"]."</td></tr>";
    }
    echo "</table>"
?>