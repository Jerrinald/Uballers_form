$(document).ready(function(){
	//gérer les conditions pour le formulaire de connexion
	$( "#login" ).submit(function( event ) {
		var n = 0;
	  	conn=document.forms['login'];
	  	var mail=conn.elements['mail'].value;
	  	var mdp=conn.elements['mdp'].value;

	  	while (n < 2){
	  		//gestion du champ du mail/mobile
	  		if(conn.elements[n].id == "mail"){
	  			//champ vide
			    if(mail == "") {
			    	alert("Saisissez le mail");
				    return false;
			    }
			    else if(mail != "") {
			    	//non conforme au mail
				    if(!mail.includes("@")){
				    	alert("Mail invalide");
				    	return false;
				    }
				    else{
				    	console.log(document.forms["login"].elements[n].id);
				    }
				}
			//gestion du champ du mot de passe	
			}else if(document.forms["login"].elements[n].id == "mdp"){
				//champ vide
				if(mdp == "") {
			    	alert("Saisissez le mot de passe");
					return false;
				//on retourne vrai car tous les champs ont été vérifiés et sont correctes
			    }else{
			    	return true;
			    }
			}
			n=n+1;
		}

	});
	//gérer les conditions pour les formulaire d'inscription
	$( "#registration" ).submit(function( event ) {
		var n = 0;
	  	regist=document.forms['registration'];
	  	var prenom=regist.elements['prenom'].value;
	  	var nom=regist.elements['nom'].value;
	  	var num=regist.elements['numero'].value;
	  	var confirm=regist.elements['confirmer'].value;
	  	var nouv=regist.elements['nouveau'].value;
	  	var day=regist.elements['day'].value;
	  	var month=regist.elements['month'].value;
	  	var year=regist.elements['year'].value;
	  	var genre=regist.elements['ty'].value;

	  	while (n < 9){
	  		if(regist.elements[n].id == "prenom"){
	  			 if(prenom == "") {
			    	alert("Saisissez le prenom");
					return false;
			    }
			    else if(prenom != ""){
			    	for (let i = 0; i < prenom.length; i++){
			    		const nb = Number.parseInt(prenom[i]);
					    if(Number.isInteger(nb)){
				    		alert("le prenom contient un ou plusieurs chiffres");
				    		return false;
						}
						else {
						    console.log(document.forms["registration"].elements[n].id);
						}
					}
				}
	  		}else if(regist.elements[n].id == "nom"){
	  			if(nom == "") {
			    	alert("Saisissez le nom");
					return false;
			    }
			    else if(nom != ""){
			    	for (let i = 0; i < nom.length; i++){
			    		const nb = Number.parseInt(nom[i]);
					    if(Number.isInteger(nb)){
				    		alert("le nom contient un ou plusieurs chiffres");
				    		return false;
						}
						else {
						    console.log(document.forms["registration"].elements[n].id);
						}
					}
				}

	  		}else if(regist.elements[n].id == "numero"){
				if(num == "") {
		    	alert("Saisissez le numéro de téléphone ou le mail");
			    return false;
			    }else if(num.includes("@")){
			    	console.log(document.forms["registration"].elements[n].id);
			    }else{
					for (let i = 0; i < num.length; i++){
						const nb = Number.parseInt(num[i]);  
						if(!Number.isInteger(nb)){
				    		alert("Le numéro saisie contient un ou des caractères non entiers");
				    		return false;
						}
						else if(num.length!=10){
					    	alert("Nombre de chiffres incorrecte pour le tel");
				    		return false;
					    }
						else {
						    console.log(document.forms["registration"].elements[n].id);
						}
					}
			    }
			}else if(regist.elements[n].id == "confirmer"){
				if(confirm == "") {
					alert("Confirmer le champ précédent");
					return false;
				}
				else if(confirm !== num){
					alert("Non-identique au champ précedent");
					return false;
				}else{
					console.log(document.forms["registration"].elements[n].id);
				}
			}else if(regist.elements[n].id == "nouveau"){
				if(nouv == "") {
					alert("Saisissez un mot de passe");
			    	return false;
				}else{
					console.log(document.forms["registration"].elements[n].id);
				}
			}else if(regist.elements[n].id == "day"){
				if(day == "") {
					alert("Saisissez un jour");
			    	return false;
				}else{
					console.log(document.forms["registration"].elements[n].id);
				}
			}else if(regist.elements[n].id == "month"){
				if(month == "") {
					alert("Saisissez un mois");
			    	return false;
				}else{
					console.log(document.forms["registration"].elements[n].id);
				}
			}else if(regist.elements[n].id == "year"){
				if(year == "") {
					alert("Saisissez une année");
			    	return false;
				}else{
					console.log(document.forms["registration"].elements[n].id);
				}
			}else if(regist.elements[n].id == "ty"){
				if(genre == "") {
					alert("Saisissez le sexe");
			    	return false;
			    //on retourne vrai car tous les champs ont été vérifiés et sont correctes
				}else{
					return true;
				}
			}

	  		n=n+1;
	  	}

	});
});

