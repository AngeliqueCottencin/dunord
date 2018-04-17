<center>
	<div class="container">
		<form action="./index.php?e=connexion&a=login" method="post">
			<input type="hidden" name="e" value="connexion"> 
			<input type="hidden" name="a" value="authentification">
			<div class="form-group">
				<label for="login"> <font size=4 color="#337ab7">Identifiant:</font></label>
				<br>
				<font size=3><input type="text" class="input sm" id="login" placeholder="Entrez votre identifiant" name="login"></font>
			</div>
			<div class="form-group">
				<label for="pwd"><font size=4 color="#337ab7">Mot de passe:</font></label>
				<br>
				<font size=3><input type="password" class="input sm" id="pwd" placeholder="Entrez votre mot de passe" name="pwd"></font>
			</div>
			<button type="submit" class="btn btn-primary">Connexion</button>
		</form>
	</div>
</center>