

<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
 <title> Authentification officier de l'etat civil</title>
 <link href="css/accueil.css" rel="stylesheet" title="Style" />

 <style>
 
      * { box-sizing: border-box; }	
       body {  margin:0; overflow-x: hidden ; }
	  .tablegauche{ left:-18.938em;  top:4.563em;  height:24.813em;                     width:17.5em; right:12.5em; }
	  .tablecentre{ left:0;          top:-1em;    height:37.875em; width:12.5em;    padding-top: 3.438em; border-radius:10px 0 0 10px; z-index:3;}
	  .tabledroite{ left:12.5em;     top:-1em;    height:37.875em; width:23.125em;  border-radius:0 10px 10px 0;}
      .closeLowerMargin , .openLowerMargin {left:5%; width:89%;} 
 </style>
</head>

<body>
<!-- ARRIERE-PLAN -->

<table class="closeLowerMargin "  style="background-color:#1D702D;  top:-360px; z-index:2;  border-radius:20px;"><tr><td>  </td></tr></table> 
<table class="openLowerMargin "  style="background-color:#1D702D;   "><tr><td>  </td></tr></table> <!-- รงa rempli les vide de l\'interface -->


<div class="centrer"  >

	<form action ="" method="post" name="form1" >
		<!-- PANNEAU DE GAUCHE -->
		<table class="tablegauche" > <caption  style="caption-side:top;"> <font color="#FFFFFF"><h3> UNION DES COMORES  </h3><h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6><h4> MINISTERE DE L'INTERIEUR  </h4></font><img src="img/armoirie.png"  /></caption>
			 <tr>   <td>AUTHENTIFICATION</td></tr>
			 <tr>   <td> Login    <br/>  <input  type="text"   id="login_"   name="pseudo_" > </td></tr> 
			 <tr><td> Mot de passe <br/>  <input  type="text"  id="pswd_"    name="motdepasse_" > </td></tr>
			 <tr><td>
				 <textarea class="t_area" name="myTextBox" cols="18" rows="4" style="background-color:#1D702D;   color:#ffffff;"   > Veuillez saisir vos identifiants</textarea><br/>
				 <input id="valider_" type="submit" class="submit" value="Valider"   name="envoie" style=" font-weight:bold;  background-color: #ffffff; height: 20px; "  />
			 </td></tr>
		 </table>
		 
		<!-- PANNEAU CENTRAL --> 
		<table  class="tablecentre" ><caption style="caption-side:top"> <font color="#FFFFFF"><h3> OFFICE   </h3></caption>
		 <tr><td><input type=image src=img/carte.jpg align="center"/></td></tr>
		</table>

		<!-- PANNEAU DE DROITE -->
		<table  class="tabledroite" ><caption style="caption-side:top"> <font color="#FFFFFF"><h3> D'ETAT CIVIL  </h3></caption>
		 <tr><td>Apr&egrave;s 3 essais erron&eacute;es,<br> l'acc&egrave;s au systeme est restreint par mesure de s&eacute;curit&eacute;.<br>L'officier d'&eacute;tat civil doit contacter l'administrateur syst&egrave;me.</td></tr>
		</table>

	</form>

</div>

</body>
</html>
<?php include("SERVEUR/authentification.php "); ?>








