<?php

if(!isset($_GET['n'])) $_GET['n']=""; // Transmis par 'SERVEUR/colonne-afficher-naissance.php'
$id=$_GET['n'];
$id=ltrim($id);
try{$conn = new PDO('mysql:host=localhost;dbname=etatcivil;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} //// Le array active les exception PDO: pour obtenir + de détail sur d'eventuels erreurs
catch(Exception $e){die('Erreur de connexion à la base de données: '.$e->getMessage());}

$reponse = $conn->query('SELECT * FROM liste WHERE ID='.$id );
$donnees = $reponse->fetch();
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
     <title>Recupere l'identifiant transmis et l'afffiche dans un pop </title>
	 <link href="css/afficher.css" rel="stylesheet" title="Style" />     
</head>
<!-- l'impression se fait par l'attribut onLoad de body - il reste le test et le reajustement CSS3 selon le resultat du  test-->
<body onLoad="window.print()">
<div id="wrap">

<table border="1" align="center"  style="border-collapse:collapse" bordercolor="#111111" width="80%" >
  
   <tr>
      <td align="center" VALIGN="top"><h2>UNION DES COMORES</h2> <h6>Unit&eacute;-Solidarit&eacute;-D&eacute;veloppement<h6> <h3>MINISTERE DE L'INTERIEUR</h3> <img src="img/armoirie.png"  /> <h4> Pr&eacute;fecture de: </h4> <input type="text"  style="margin-left:-95px;"  value="<?php echo $donnees["prefecture"];?>"  ><hr/>  <h4>Centre d'Etat Civil de: </h4>  <input type="text"  style="margin-left:-95px;"  value="<?php echo $donnees["centretatcivil"];?>" > <hr/> <div style="margin-left:10px;"><h6 align="left"><input type="text"   style="margin-left:65px;"  value="<?php echo $donnees["registre"];?>" ><br>Registre N° ------------------------------</h6><h6 align="left"><input type="text"   style="margin-left:65px;"  value="<?php echo $donnees["acte"];?>" ><br>Acte N°-----------------------------------</h6><h6 align="left" ><input type="text"  style="margin-left:65px;" value="<?php echo $donnees["date_acte"];?>" ><br>Du-----------------------------------------</h6></div></td>
      
	  <td  align="left"  rowspan="2" >
	     <h1 align="center"  style="color: white; text-shadow: 2px 2px 4px #1D702D;">ACTE DE NAISSANCE</h1>
		 <div style="margin-left:10px;">
		 
	     <input type="text"  style="margin-left:85px; " value="<?php echo $donnees["naissance_jour_moi"];?>"  ><br><b>
		 Le-------------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:85px;" value="<?php echo $donnees["naissance_an"];?>" ><br>
		 et l'an---------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:15px;" value="<?php echo $donnees["naissance_heure"];?>"><input type="text"  style="margin-left:30px;" value="<?php echo $donnees["naissance_minuite"];?>"><br>
		 &agrave;--------------------------heure(s)--------------------------------minute(s)<br><br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_nom_prenom"];?>"><br>
		 est n&eacute;(e)------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_lieu"];?>"><br>
		 &agrave;---------------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["naissance_sexe"];?>"><br>
		 du sexe-------------------------------------------------------------------------<br><br><br>
		 
		 <input type="text"  style="margin-left:120px;"  value="<?php echo $donnees["pere_nom_prenom"];?>"><br>
		 fils(fille de)--------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_datenaisance"];?>"><br>
		 n&eacute(e) le ------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_lieunaissance"];?>" ><br>
		 &agrave;---------------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_profession"] ;?>" ><br>
		 profession ---------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["pere_villederesidence"] ;?>" ><br>
		 demeurant &agrave; -----------------------------------------------------------------<br>
		 
		 <p align="left" >
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_nom_prenom"];?>"><br>
	     et de ----------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_datenaisance"];?>" ><br>
		 n&eacute;(e) le-------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_lieunaissance"];?>" ><br>
		 &agrave;---------------------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_profession"] ;?>" ><br>
		 profession ---------------------------------------------------------------------<br>
		 <input type="text"  style="margin-left:120px;" value="<?php echo $donnees["mere_villederesidenc"] ;?>" ><br>
		 demeurant &agrave; -----------------------------------------------------------------
	     </p>
		 
		 </div>
	  </td>
   </tr>
   
   <tr>
      <td align="center" rowspan="2"  >
	        <h4> Naissance de:</h4> <br>
			<input type="text"  style="margin-left:-95px;"  value="<?php echo $donnees["nom"];?>"><hr/><br>
			<input type="text"  style="margin-left:-95px;"  value="<?php echo $donnees["prenom"];?>"><hr/><br>
			<hr/><br><br>
			

	  </td>
	  
     
   </tr>
   
   <tr height="20px">             <td  rowspan="2">
         <p align="left">
	    <div style="margin-left:10px;">
	      <h4 align="center"> D&eacute;claration faite par:</h4> 
		  <input type="text"  style="margin-left:85px;" value="<?php echo $donnees["declaration_faite_par"];?>" >
		  <br>---------------------------------------------------------------------------------<br>
		  <input type="text"  style="margin-left:85px;"  value="<?php echo $donnees["datejugement"];?>"  >
		  <br>---------------------------------------------------------------------------------<br>
		  <input type="text"  style="margin-left:85px;"  value="" maxlength="100" width="300px" >
		  <br>---------------------------------------------------------------------------------<br>
		  
		  <h4 align="center"> D&eacute;claration re&ccedil;ue le:</h4> 
		  <input type="text"  style="margin-left:85px;" value="<?php echo $donnees["declaration_recue_pa"];?>" >
		  <br>--------------------------------------------------------------------------------<br>
		  <input type="text"  style="margin-left:85px;"  value="" >
		  <br>--------------------------------------------------------------------------------<br>
		  <br>--------------------------------------------------------------------------------<br><br>
	    </div>
	  </p>
   </td></tr>
   
   <tr>
      <td align="left" >
	     <h4 align="center"> Pour acte certifi&eacute; conforme:</h4> 
		 <div style="margin-left:10px;">
		 <input type="text"  style="margin-left:95px;"  value="<?php echo $donnees["delivre_a"];?>" ><br><b>
		 D&eacute;livr&eacute; &agrave; ----------------------------------------<br>
		 <input type="text"  style="margin-left:95px;"  value="<?php echo $donnees["delivre_le"];?>" ><br>
		 Le ------------------------------------------------<br>
		 <input type="text"  style="margin-left:95px;"   value="<?php echo $donnees["delivre_an"];?>"><br>
		 L'an ----------------------------------------------<br>
		 </div>
		 <p > <h4  align="center"> L'officier de l'Etat Civil:</h4></p>
		 
	  
	  </td>
	  
	  

   </tr>
   

</table>
</div>
</body>
</html>
