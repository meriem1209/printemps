<h2>Inscription</h2>
<div class="main">

<!-- Formulaire d'inscription -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Formulaire d'inscription</h2>
                <?php if (isset($_POST['Valider']) AND isset($return)) echo $return; ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="nom"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="nom" id="nom" placeholder="Votre Identifiant" value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["nom"] : "")  ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Votre Email" value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["email"] : "")  ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="mdp"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe" value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["mdp"] : "")  ?>"/>
                    </div>
                    <?php
                        if (isset($unResultatWhere)){
                            echo '<tr><td><input type="submit" name="modifier" value="modifier"/></td>';
                        }else{
                            echo
                            '<tr><td><input type="reset" name="Annuler" value="Annuler"/></td> 
                            <td><input type="submit" name="Valider" value="Valider"/></td></tr>';
                         }
                    ?>
                </form>

            </div>
            <div class="signup-image">
                <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>
        
