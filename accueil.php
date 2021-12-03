<?php
/*
	try{$conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', ''); }
	catch(Exception $e){die('Erreur de connexion à la base de données: '.$e->getMessage());}
	
	$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
	$donnees = $reponse->fetch();
*/

session_start();
    $BD_serveur     = "localhost";
    $BD_utilisateur = "root";
    $BD_motDePasse  = "";
    $BD_base        = "etatcivil";

  
  	$db = mysqli_connect($BD_serveur,$BD_utilisateur,'',$BD_base)or die('Erreur de connection :'.mysqli_error());
	$db->set_charset("utf8");
  
 // moteur de recherche 
  if(isset($_POST['acte_']))  $numero=$_POST['acte_'];
  if(isset($_POST['nom_']))   $nomm=$_POST['nom_'];

	// moteur de recherche 
	$message ="Pour trouver un document, entrer ci-haut, son num&eacute;ro, ou son nom";
	//if(isset($_POST['acte_']) && !ctype_digit($numero) ){$message = ' le numero est mal saisi'; }
	
    if(!empty($numero) && ctype_digit($numero) )
    {	  
	  $sql="SELECT * FROM liste WHERE acte =".$numero; // PAS DE SLASH POUR UN ENTIER
	  $req=mysqli_query($db,$sql) or die('Erreur SQl !<br>'.$sql.'<br>'.mysqli_error($db));
	  $result = mysqli_fetch_row($req);
	    if ($result[0] == 0){
			$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session de l'utilisateur
			$_SESSION["acte"] = $numero;
		 // --- redirection en fonction de l'utilisateur
			header("Location: lectureBD2.php?num=".$numero );
		}
	}
	//ctype_digit($nombre) verifie si c est un nombre entier
	if(!empty($numero) && !ctype_digit($_POST['acte_'])) {$message = 'le numero est mal saisi'; }

		  
    if(!empty($nomm) )
    {
	  $sql2="SELECT * FROM `liste` WHERE `nom`='$nomm';";
	  $req2=mysqli_query($db,$sql2) or die('Erreur SQl !<br>'.$sql2.'<br>'.mysqli_error($db));
	  $result2 = mysqli_fetch_row($req2);
	    if ($result2[0] == 0){$message = ' aucun resultat trouv&eacute;'; 
		}else{
		 // --- enregistrement en session de l'utilisateur
			$_SESSION["nom"]=$nomm;
		 // --- redirection en fonction de l'utilisateur
			header("Location: lectureBD2.php?nom=".$nomm);
		}
	}
	
?>


<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge"/> <!-- Forcer IE à utiliser le derier mode de compatibilité avec les autre navigateurs -->

 <meta charset="utf-8"> 
 <title> Accueil - menu de navigation</title>
 <script src="js/jquery.js"></script>
 


<link rel="stylesheet" type="text/css" href="css/accueil.css" />
<link href="css/slide.css" rel="stylesheet" title="Style" />
	<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="assets/js/html5shiv.js"></script>
	  <script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <style>
	         .hollowTop, .closeUpperMargin , .hollowBottom , .closeLowerMargin, .openLowerMargin , .line1 , .line2, .line3 { left:0; width:98%; background-color:silver; }
			 .hollowBottom { background:silver; height:59% !important;}
	          body {background-image: none; background-color:silver; 	padding:0; }
	         

	         .tablegauche{ position:relative; margin-left:-80%;  margin-top:3%;   height:25em; width:130%; }
			 .tablecentre{ position:relative; margin-left:-80%;     margin-top:-238%;    height:37.875em; width:12.5em; border-radius:10px 0 0 10px;  }
	         .tabledroite{ position:absolute; left:7.3em;       top:1em;    height:37.875em; width:23.125em; border-radius:0 10px 10px 0;  }
			 @media screen and (max-width: 1024px){ .tabledroite{ width:220%; }}
			 @media screen and (min-width: 1280px){ .tabledroite{ width:333%; }}
			 @media screen and (min-width: 1600px){ .tabledroite{ width:479%; }}
	</style>

 

</head>

<body>
<!-- ARRIERE PLAN   -->
<?php include("inc/accueil/accueil_background.php"); ?>

<!-- Structure contenu   -->
<div class="centrer"  >
	<form action ="" method="POST" name="form1" >

		<!-- LE PANNEAU DE GAUCHE : Recher des document par numero ou nom -->
		<table class="tablegauche" > <caption  style="caption-side:top;"> <font color="#FFFFFF"><h3> UNION DES COMORES  </h3><h6> Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement  </h6><h4> MINISTERE DE L'INTERIEUR  </h4></font><img src="img/armoirie.png" style="z-index:3;"  /></caption>
			 <tr> <td>RECHERCHE DE DOCUMENT</td></tr>
			 <tr><td> <font color="#cdbe9f"><b>Search by</b></font> num&eacute;ro<br/> <input id="recherchenum" type="text" name="acte_" pattern=".{1,}"  > </td></tr> 
			 <tr><td> <font color="#cdbe9f"><b>Search by</b></font> nom    <br/> <input id="recherchenom"  type="text" name="nom_"  > </td></tr>
			 <tr><td>
				 <textarea class="t_area" name="myTextBox" cols="18" rows="4"> <?php echo $message ; ?> </textarea>
			 <br/><input type="submit" name="envoie" value="Chercher"  style="background-color: #e5eecc;"/>

			 </td></tr>

		</table>
	 
		<!-- LE PANNEAU  CENTRAL : menu vertical (il serai + simple de mettre ce morceau de code dans un include  - voir le cours de Bezençon)-->
		<table  class="tablecentre"  >
			<?php include("inc/accueil/accueil_menucentral.php"); ?>  
		</table>


		<!-- LE PANNEAU DE DROITE : Recher des document par liste déroulante -->
		<table  class="tabledroite" >
			<tr><td class="listemenu"> <?php include("inc/accueil/accueil_prefecture.php"); ?> </td></tr> 
		</table>
	</form>
</div>

</body>
</html>





