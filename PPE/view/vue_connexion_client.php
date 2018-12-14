
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../img/COUPOLE.jpg');">
			<div class="wrap-login100">
				<form method="post" action="../controller/connexion_client.php" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						 Connexion 
					</span>
					<table>
					
						

					

						<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter email">
								<input class="input100" type="text" name="email" placeholder="Email*" value = "<?php echo (isset($unResultatWhere)? $unResultatWhere["email"] : "")  ?>"
								required/>
								<span class="focus-input100" data-placeholder="&#xf207;">
									
								</span>
							</div>
						</td></tr>


						<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter password ">
								<input class="input100" type="password" name="mdp" placeholder="Mot de passe*" value = "<?php echo (isset($unResultatWhere) ? $unResultatWhere["mdp"] : "")  ?>" required/>
								<span class="focus-input100" data-placeholder="&#xf191;">
									
								</span>
							</div>
						</td></tr>


						<tr><td>
							<div class="container-login100-form-btn">
								<input class="login100-form-btn" type="submit" name="Valider" value="Valider"/>
							</div>
							<p>&nbsp;</p>
							<?php
								if (isset($_GET["erreur"]) && $_GET["erreur"] == 1){
									echo "<div class='erreurhulya'>L'email ou le mot de passe n'est pas valide</div>";
								}
							?>
							<div class="text-center p-t-50">
								<a class="txt1" href="../controller/inscription_client.php">
								Créer un compte
								</a>
							</div>
						</td></tr>

					</table>
				</form>
			</div>
		</div>
	</div>
	

