<?php
			if(isset($_GET['dec']))
			{
				
				session_destroy();

				header('location:../index.php');	
					
			}
	?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width,initial-scale=1'/>
		 <link rel='stylesheet' href='../css/bootstrap.min.css'/>
		 <link rel="stylesheet" href="style.css">
		 <script src='../js/jquery.min.js'>
		 <script src='../js/bootstrap.min.js'></script>
		<title></title>
		<title>Primesoft</title>
	<div class="row">
	
		<div class="bande row">
			<div align="center"><a href="index.php" style="color:white">HOME</a>
				<p align='center'><img src="../images/logo-primesoft.png" height="100" width="300"/></p>
			</div>
		</div>
		
	<?php
			if(isset($_GET['dec']))
			{
				
				session_destroy();

				header('location:../index.php');	
					
			}
	?>

	
<body>
   <nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
     <li><a href="index.php">Home</a> </li>
	 <li><a href="person.php">Person</a> </li>
	 <li><a href="book.php">Book</a> </li>
	 </ul>
	 <p align='right'><a href="<?php echo $_SERVER['PHP_SELF'];?>?dec=1"><button class="btn btn-success">Deconnexion</button></a></p>
	 </nav>
 </div>
