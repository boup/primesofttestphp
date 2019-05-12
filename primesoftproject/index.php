<?php
include("connection.php");
if(isset($_POST['connecter']))
{
	
	if(isset($_POST['form2']) AND ($_POST['pwd']) AND($_POST['email']))
	{
		
		$form=$_POST['form2'];
		
		$email=$_POST['email'];
	
		$pwd=$_POST['pwd'];
		if($_POST['form2']==1)
		{
			$sql="select * from compte_person where email like '$email' and password like '$pwd'";
			$exec=mysql_query($sql) or die(mysql_error);
			$nb=mysql_num_rows($exec);
			if($nb)
			{
			
				session_start();
				
				$_SESSION['email']=$email;
	
				$_SESSION['pwd']=$pwd;
				
				header('location:borrow');
			
			
			}
			
		}
	 }  
	
	else
	{
				
		header('location:index.php?m=0');
	}
		
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<meta charset='utf-8'/>
		<meta name='viewport' content='width=device-width,initial-scale=1'/>
		 <link rel='stylesheet' href='css/bootstrap.min.css'/>
		  <link rel='stylesheet' href='style.css'/>
		 <script src='js/bootstrap.min.js'></script>
	</head>
	<body background="images\startup.jpg"> 
	
		<div class='row' align='center' >
			
			
					
					<div id='d1' class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
						<P><img src="images\logo_optiware.png" align="center" width='300' height="100"/></p>
					</div>
					
					<div id='d2' class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php include('nav.php'); ?> </div>
					
					<div id='d3' class="col-xs-3 col-sm-3 col-md-3 col-lg-3" align='center' style="margin-left:65%;background-color:#FFF">  
					
					
						<div id='d4' img src="images\logo_optiware.png"  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align='right' >
								
									 <form class="form-vertical" method="POST" align='left' action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
									 <div class="form-group" ><br/><br/>
									 <p style="font-weight:bold;font-size:22px">Connected</p>
											 <br/> 
										 <label for="form2">Utilisateur</label>
										 <select name="form2" id="form2">
											
												 <option value=" ">choisir</option>
												 <option value="1">Person</option>
												 
									
										 </select>
									 </div>
									 
									 <div class="form-group" align='left'>
									   <label align='center' for="password">Email</label>
									   <input type="email" name="email" class="form-control" id="email" placeholder="email"/>
									</div>
									 
									<div class="form-group" align='left'>
									   <label  align='center' for="password">Password</label>
									   <input  type="password" name="pwd" class="form-control" id="password" placeholder="password"/>
									</div>
									
		                        </div>
									<input type="submit" name="connecter" id='connecter' class="btn-success" value="Valider"/>
									<input type="reset" class="btn-danger" value="cancel"/>
									
							   </form>
							     <br/>  <br/> <br/>
							   
								
						</div >
						
					
						
					
				
			
			</div>
			
		
	</body>
</html>