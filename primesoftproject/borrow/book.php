<?php
   include('../connection.php');
   $req1="select id_use,name,surname from person";
   $sql1= mysql_query($req1) or die(mysql_error);
   $row1=mysql_fetch_array($sql1);

   if(isset($_POST['send']))
	{
		extract($_POST);
		$sql_insert="INSERT INTO book(date,name_book,utilisateur,nature) values('$date','$lib','$utilisateur','$nature')";
		$res=mysql_query($sql_insert) or die(mysql_error());
		if($res)
		{
			//redirection on book
			header("location:book.php?m=1");
		}
		else
		{
			header("location:book.php?m=0");
		}
	}
   if(isset($_POST['modify'])){
	//for the modification
    if($_POST['utilisateur']=="")	
		$modif="UPDATE book SET  name_book='".$_POST['lib']."' , nature='".$_POST['nature']."'  where id_book ='".$_POST['id_book']."'";
	else
	$modif="UPDATE book SET  name_book='".$_POST['lib']."' ,  utilisateur='".$_POST['utilisateur']."', nature='".$_POST['nature']."' where id_book ='".$_POST['id_book']."'";
	
	$req=mysql_query($modif) or die(mysql_error());
	
	if($req){

		header('Location:book.php?m=1');

	}else{

		header('Location:book.php?m=0');
	}
	
}
if(isset($_POST['delete']))
	{
		
		$code=$_POST['id_book'];
		
		$sql_del="update book set etat=0 WHERE id_book='$code' ";
		
		if(mysql_query($sql_del))
		{
			
			header("location:book.php?m=1");
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
				 		<td colspan='3'><b> Book </b></td>
				 	</tr><br/>
					<?php 
					echo"<tr><td colspan =\"3\">";
					if(isset($_GET['m']) && ($_GET['m']==1)){
						echo"Save with success";
					}
					echo"</td></tr>";
					if(isset($_GET['code']))
					{
					$a='select * from book where id_book='.$_GET['code'];
					$s= mysql_query($a) or die();
					$rows1=mysql_fetch_array($s);}
					?>
					<tr>
				 		<td><label for="id_book"><b>Id book<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="hidden" name="id_book" id="id_book" <?php if(isset($_GET['code'])) echo 'value="'.$rows1['id_book'].'"'; else echo 'value=""' ?>;/>*</td>
				 	</tr>
					<tr>
				 		<td><label for="lib"><b>Name Book<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="lib" id="lib" <?php if(isset($_GET['code'])) echo 'value="'.$rows1['name_book'].'"'; else echo 'value=""' ?>;/>*</td>
				 	</tr>
					<tr>
				 		<td><label for="date"><b>date<b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="date" name="date" id="date"  <?php if(isset($_GET['code'])) echo 'value="'.$rows1['date'].'"'; else echo 'value=""' ?>/>*</td>
				 	</tr>
					<tr>
					<td><b>person<b/></td> 
					<td>&nbsp;</td>
					<td> <select name='utilisateur'>
						<option value='' selected='selected'>==choisir==</option>
						<?php 
							do{
						?>
						<option value="<?php echo $row1['id_use']; ?>">  <?php echo $row1['name']." ".$row1['surname']; ?> </option>
						<?php
							}while($row1=mysql_fetch_array($sql1));
						?>
						</select>
					</td> 
					</tr>

					 <br/> <br/>
					<tr>
				 		<td><label for="nature"><b>Nature <b/></label></td> 
				 		<td>&nbsp;</td>
				 		<td><input type="text" name="nature" id="nature"  <?php if(isset($_GET['code'])) echo 'value="'.$rows1['nature'].'"'; else echo 'value=""' ?>/>*</td>
				 	</tr>
				     
					
				 	<tr>
				 		<td colspan="3"><input type="submit" name="send" class='btn-primary' value="add" onclick="return validerformulaire();"/>
                        <input type="submit" name="modify" class='btn-default' value="modify"/>	
                         <input type="submit" name="delete" class='btn-danger' value="delete"/>
						 <input type="reset" name="cancel" class='btn-xs' value="erase"/></td>
				 	</tr>
				 </table>
				  
				 <input type="hidden" name="dt" value="<?php echo date('d/m/Y');?>">
			 </form>
		</div>

		<?php
	include("../connection.php");

	$sql2="select * from book,person where book.utilisateur=id_use and book.etat=1";

						/* executer of the request on mysql */
	$reccord_sql2=@mysql_query($sql2);

						/*number of rows */
	$nb=@mysql_num_rows($reccord_sql2);

						/*test the number of rows */
	if($nb>0)
	{
							/*save of data*/
		$rows=mysql_fetch_array($reccord_sql2);
?>
<div class='liste'>
<h1 align='center'></h1>
						<table class="table table-bordered table-striped">
						<tr>
							<th>Name Book</th>
							<th>Nature</th>
							<th>person</th>
							<th>choose</th>
						</tr>
						<?php 
						do{ ?>
							<tr bgcolor="white">
								<td><?php echo $rows['name_book']; ?></td>
								<td><?php echo $rows['nature']; ?></td>
								<td><?php echo $rows['name']; ?></td>
								<td align="center"><a href="book.php?code=<?php echo $rows['id_book'];?>"<button type='button' class='btn btn-success btn-xs'>choose</button></a></td>
							</tr>
						<?php }while($rows=mysql_fetch_array($reccord_sql2)); ?>
					</table>
					<?php 
				}else{
					echo"Not table save
					";
				}
				?>
    </div>
	 <div class='recherche'>
	<h1 align='center'><b></b></h1>
			<br/><br/>
			<form>
				
				<table class="table table-bordered">
					<tr>
						<td>
							<input type="text" class="form-control" id="rech1"/>
						</td>
						
						<td>
						<select class='form-control'>
						<option value='6' select='selected'>==All choice==</option>
						<option value='0' >Name Book</option>
						<option value='1'>Nature</option>
						<option value='2'>date</option>
						
						</select>
						</td>
					</tr>
					
				</table>
				
			</form>
</div>
<script>
$('.recherche #rech1').keyup(function(){
	$('.liste').load('ajax.php','recherche='+$('.recherche #rech1').val()+'&option='+$('.recherche select option:selected').val());
	
});
</script>>