<?php
require_once ("config.php");
	//le formulaire d'inscription a été saisi
 	if(isset($_POST["regist"])){

 		$requete = $bd->prepare('select nom, prenom, contact from users where contact = :contact');
    	$requete->bindValue(':contact', $_POST["numero"]);
    	$requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        //mail déjà existant dans la base de données
        if($tab["contact"] === $_POST["numero"]){
        	echo "Ces coordonées sont déjà existantes, veuillez rentrer un autre mail. <a href='index.php'>Inscrivez-vous à nouveau</a>";
   		}else{

	 		$date = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
	 		$mdp = password_hash($_POST["nouveau"], PASSWORD_DEFAULT) ;

	 		$req = $bd->prepare('INSERT INTO users (nom, prenom, contact, password, date_nai, sexe) VALUES (:nom, :prenom, :numero, :password, :date_nai, :ty)');
	        
	 		$req->bindValue(':password', $mdp);
	 		$req->bindValue(':date_nai', $date);

	 		$marqueurs = ['nom', 'prenom', 'numero', 'ty'];
	        foreach ($marqueurs as $value) {
	            $req->bindValue(':' . $value, $_POST["$value"]);
	        }

	        $req->execute();
	        if((bool) $req->rowCount()){
	        	echo "Vous êtes bien inscrit, <a href='index.php'>Connectez-vous</a> ";
	    	}
	    }

	//le formulaire de connexion a été saisi
    }else if(isset($_POST["connexion"])){
    	$mail = $_POST["mail"];
    	$requete = $bd->prepare('select contact, password from users where contact = :numero ');
    	$requete->bindValue(':numero', $mail);
        $requete->execute();
        $tab = $requete->fetch(PDO::FETCH_ASSOC);
        //vérifier que le mot de passe est le même que dans la base de données
        if(password_verify($_POST["mdp"], $tab["password"])){
        	echo "<h1>Vous êtes connecté</h1> ";
   		}else{
   			//redirection vers la page principale si coordonnées incorrectes
    		header("Location: index.php");
    	}
 	}else{
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<meta name="viewport"    content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Inscription/Connexion</title>
    <link rel="stylesheet" href="css/index.css" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/index.js"></script>
  </head>

  <body>
		
		<form action="" name="login" id="login" method="POST">
		<div id="menu">
		<div class="in">
			<div class="mail">
				<p>Adresse e-mail ou mobile</p>
				<input type="text" id="mail" name="mail" placeholder="Votre login">
			</div>
			<div class="mdp">
				<p>Mot de passe</p>
				<input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe">
			</div>
			<div class="button">
			<input type="submit" name="connexion" value="Connexion" />
			</div>
		</div>
		</div>
		</form>

		<form action="" name="registration" id="registration" method="POST">
		<div id="register">
		 <h1>Inscription</h1>
		 <h2>C'est gratuit (et ça le restera toujours)</h2></br>
			 <div class="name">
			 	<input type="text" id="prenom" name="prenom" placeholder="Prénom" /><input type="text" id="nom" name="nom" placeholder="Nom de famille" />
			 </div>
			 <div class="num">
				 <input type="text" id="numero" name="numero" placeholder="Numéro de mobile ou email" />
				 <input type="text" id="confirmer" name="confirmer" placeholder="Confirmer numéro de mobile ou email" />
				 <input type="password" id="nouveau" name="nouveau" placeholder="Nouveau mot de passe" />
			</div>
			<div class="date">
				<h3>Date de naissance</h3></br>
				<input type="number" id="day" name="day" min="1" max="31" placeholder="Jour" />
				<input type="number" id="month" name="month" min="1" max="12" placeholder="Mois" />
				<input type="number" id="year" name="year" min="1900" max="2020" placeholder="Année" />
				<a href="#">Pourquoi indiquer votre date de naissance ?</a>
			</div></br>
			<div class="genre">
				<input type="radio" id="ty" name="ty" value="Femme">Femme
				<input type="radio" id="ty" name="ty" value="Homme">Homme
			</div>
			<div class="condition">
				<p>En cliquant sur Inscription, vous acceptez nos <a href="#">Conditions</a> et indiquez que vous avez lu notre <a href="#">Politique d'utilisation des données</a>, y compris notre <a href="#">Utilisation des cookies.</a> Vous pourrez revecevoir des notifications par texto de la part de Facebook et pouvez vous désabonner à tout moment.</p>
				<input type="submit" name="regist" value="Inscription">
			</div>
		</div>
		</form>
		</body>
		<?php } ?>
</html>
