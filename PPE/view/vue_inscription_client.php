
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../img/COUPOLE.jpg');">
			<div class="wrap-login100">
				<form method="post" action="" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Inscription 
					</span>
					<table>
						<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter username">
								<input class="input100" type="text" name="nom" placeholder="Nom*" value = "<?php echo (isset($unResultatWhere)? $unResultatWhere["nom"] : "")  ?>"required/>
								<span class="focus-input100" data-placeholder="&#xf207;">
								</span>
							</div>
						</td></tr>

							<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter prenom">
								<input class="input100" type="text" name="prenom" placeholder="Prenom*" value = "<?php echo (isset($unResultatWhere)? $unResultatWhere["prenom"] : "")  ?>"
								required/>
								<span class="focus-input100" data-placeholder="&#xf207;">
									
								</span>
							</div>
						</td></tr>

							<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter adressefacturation">
								<input class="input100" type="text" name="adressefacturation" placeholder="Adresse de facturation *" value = "<?php echo (isset($unResultatWhere)? $unResultatWhere["adressefacturation"] : "")  ?>"
								required/>
								<span class="focus-input100" data-placeholder="&#xf207;">
									
								</span>
							</div>
						</td></tr>

						<tr><td>
							<div class="wrap-input100 validate-input" data-validate = "Enter date de naissance ">
								<input class="input100" type="datatime" name="datenaissance" placeholder=" Date de naissance *" value = "<?php echo (isset($unResultatWhere)? $unResultatWhere["datenaissance"] : "")  ?>"
								required/>
								<span class="focus-input100" data-placeholder="&#xf207;">
									
								</span>
							</div>
						</td></tr>

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

							
						</td></tr>

					</table>
				</form>
			</div>
		</div>
	</div>
	

	

	