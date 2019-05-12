<?php
  include('../connection.php');

   if(isset($_POST['send']))
	{
		extract($_POST);
        $sql_insert="INSERT INTO person(name,surname,status,telephone) values('$name','$surname','$status','$telephone')";
		$res=mysql_query($sql_insert) or die(mysql_error());
		if($res)
		{
			//redirection of the page
			header("location:person.php?m=1");
		}
		else
		{
			header("location:person.php?m=0");
		}
	}

	if(isset($_POST['modify'])){
	//for the  modification	
		$modif="UPDATE person SET  name='".$_POST['name']."' , surname='".$_POST['surname']."', status='".$_POST['status']."' , telephone='".$_POST['telephone']."' where id_use ='".$_POST['id_use']."'";
	
	
	$req=mysql_query($modif) or die(mysql_error());
	
	if($req){

		header('Location:person.php?m=1');

	}else{

		header('Location:person.php?m=0');
	}
	
}
if(isset($_POST['delete']))
	{
		
		$code=$_POST['id_use'];
		
		$sql_del="update person set etat=0 WHERE id_use='$code'";
		
		if(mysql_query($sql_del))
		{
			
			header("location:person.php?m=1");
		}
		else
		{
			die(mysql_error());
		}
	}
?>
<?php include('header.php')?>
<div class='formulaire'>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  align="center"><br/>

				 <table class="table table-bordered table-striped">
				 	<tr>
				 		<td colspan='3'><b>FORMULAIRE </b></td>
				 	</tr><br/>
					<?php 
					echo"<tr><td colspan =\"3\">";
					if(isset($_GET['m']) && ($_GET['m']==1)){
						echo"Successuf save";
					}
					echo"</td></tr>";
					if(isset($_GET['code']))
					{
					$a='select * from person where id_use='.$_GET['code'];
					$s= mysql_query($a) or die(mysql_error());
					$rows1=mysql_fetch_array($s);}
					?>
					<tr>
				 		<td><label for="id_use"><b>id_use<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="hidden" name="id_use" id="id_use" <?php if(isset($_GET['code'])) echo 'value="'.$rows1['id_use'].'"'; else echo 'value=""' ?>;/></td>
				 	</tr>
					
					<tr>
				 		<td><label for="name"><b>Name<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="name" id="name" <?php if(isset($_GET['code'])) echo 'value="'.$rows1['name'].'"'; else echo 'value=""' ?>;/>*</td>
				 	</tr>
					<tr>
				 		<td><label for="surname"><b>Surname<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="surname" id="surname"  <?php if(isset($_GET['code'])) echo 'value="'.$rows1['surname'].'"'; else echo 'value=""' ?>/>*</td>
				 	</tr>
                    <tr>
				 		<td><label for="status"><b>Status<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="status" id="status"  <?php if(isset($_GET['code'])) echo 'value="'.$rows1['status'].'"'; else echo 'value=""' ?>/>*</td>
				 	</tr>
					  <tr>
				 		<td><label for="telephone"><b>Telephone<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="telephone" id="telephone"  <?php if(isset($_GET['code'])) echo 'value="'.$rows1['telephone'].'"'; else echo 'value=""' ?>/>*</td>
				 	</tr>
					  
					 <br/> <br/>
					
				 	<tr>
				 		<td colspan="3"><input type="submit" name="send" class='btn-primary' value="Add" onclick="return validerformulaire();"/>
                        <input type="submit" name="modify" class='btn-default' value="modify"/>	
                         <input type="submit" name="delete" class='btn-danger' value="delete"/>
						 <input type="reset" name="cancel" class='btn-xs' value="erase"/></td>
				 	</tr>
				 </table>
				  
				 <input type="hidden" name="dt" value="<?php echo date('d/m/Y');?>">
			 </form>
	</div>
<?php

$sql2="select * from person";

						/* executer the request on mysql */
	$reccord_sql2=mysql_query($sql2);

						/*le number of enregistrement */
	$nb=mysql_num_rows($reccord_sql2);

						/*teser the number enregistrement */
	if($nb>0)
	{
							/*save data*/
		$rows=mysql_fetch_array($reccord_sql2);
?>
<div class='liste'>
<h1 align='center'> </h1>
						<table class="table table-bordered table-striped">
						<tr>
							
							<th>name</th>
							<th>surname</th>
							<th>Status</th>
							<th>Telephone</th>
							<th>choose</th>
							
						</tr>
						<?php 
						do{ ?>
							<tr bgcolor="white">
								<td><?php echo $rows['name']; ?></td>
								<td><?php echo $rows['surname']; ?></td>
								<td><?php echo $rows['status']; ?></td>
								<td><?php echo $rows['telephone']; ?></td>
								
								
								<td align="center"><a href="person.php?code=<?php echo $rows['id_use'];?>"<button type='button' class='btn btn-success btn-xs'>choisir</button></a></td>
							</tr>
						<?php }while($rows=mysql_fetch_array($reccord_sql2)); ?>
					</table>
					<?php 
				}else{
					echo"no  table save";
				}
				?>
</div>
<div class='recherche'>
	<h1 align='center'><b></b></h1>
			<br/><br/>
		<div id="div1" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
			<form>
				
				<table class="table table-bordered">
					<tr>
						<td>
							<input type="text" class="form-control" id="rech1"/>
						</td>
						
						<td>
						<select class='form-control'>
						<option value='6' select='selected'>==All choose==</option>
						<option value='0' >Name</option>
						<option value='1'>Surname</option>
						<option value='2'>Status</option>
						
						</select>
						</td>
					</tr>
					
				</table>
				
			</form>
			
</div>
<script>
$('.recherche #rech1').keyup(function(){
	//alert('recherche2='+$('#recherche2 #rech1').val()+'&option='+$('#recherche2 select option:selected').val());
	$('.liste').load('ajax.php','recherche3='+$('.recherche #rech1').val()+'&option='+$('.recherche select option:selected').val());
	
});
</script>