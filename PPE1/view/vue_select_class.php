<h2>Liste des classes du cfa</h2>
<form method="post" action="">
    <table>
        <tr><td>Nom classe</td><td><input type="text" name="nom" 
        value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["nom"] : "")  ?>"/></td></tr>
        <tr><td>Salle cours</td><td><input type="text" name="salle"
        value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["salle"] : "")  ?>"/></td></tr>
        <tr><td>Diplome</td><td><input type="text" name="diplome"
        value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["diplome"] : "")  ?>"/></td></tr>
        <?php
            if (isset($unResultatWhere)){
                echo '<tr><td><input type="submit" name="modifier" value="modifier"/></td>';
            }else{
                echo
                '<tr><td><input type="reset" name="Annuler" value="Annuler"/></td> 
                <td><input type="submit" name="Valider" value="Valider"/></td></tr>';
            }
        ?>
       
    </table>
</form>
<?php
    echo "<table border = 1>
    <tr><td>id classe</td><td>nom</td><td>salle</td><td>diplome</td><td>Action</td></tr>";
    foreach ($resultats as $unRes){
        echo "<tr><td>".$unRes["idclasse"]."</td>
                <td>".$unRes["nom"]."</td>
                <td>".$unRes["salle"]."</td>
                <td>".$unRes["diplome"]."</td>
                <td>
                    <a href='index.php?action=x&idclasse=".$unRes["idclasse"]."'>x</a>
                    <a href='index.php?action=e&idclasse=".$unRes["idclasse"]."'>e</a>   
                </td>
            </tr>";
    }
    echo "</table>"
?>