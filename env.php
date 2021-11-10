<?php 

try {

	$database = new PDO('mysql:host=localhost;dbname=test','root','',
		array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

	
} catch (Exception $e) {
	die('ERROR' .$e->getMessage());
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>connexion</title>
</head>
<body>

    
   <form method="POST">
   	 <p>
    	<label>nom:</label>
	<input type="text" name=" nom" placeholder="votre nom">
    </p>
	<p>
		<label>Email:</label>
	<input type="email" name="email" placeholder="votre prenom">
	</p>
    <p>
    	<label>Sujet:</label>
	<input type="text" name="sujet" placeholder="votre langue">
    </p>
    <p>
    	<label>Message:</label>
	<input type="text" name="message" placeholder="votre langue">
    </p>
	<p>
		<input type="submit" name="envoyer" value="envoyer">

	</p>
   	
   </form>

	<?php

	if(isset($_POST['envoyer'])){
 	if(isset($_POST['nom']) AND isset($_POST['email']) AND isset($_POST['sujet']) AND isset($_POST['message'])){
 		if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['sujet']) AND !empty($_POST['message'])){

 			$nom=htmlspecialchars($_POST['nom']);
 			$email=htmlspecialchars($_POST['email']);
 			$sujet=htmlspecialchars($_POST['sujet']);
 			$message=htmlspecialchars($_POST['message']);

 			

            $sql = $database->prepare('INSERT INTO essaie( nom,email,sujet,message) VALUE(?,?,?,?)');

            $sql->execute(array($nom,$email,$sujet,$message));



 		}
 	}
 }


	  ?>



</body>
</html>