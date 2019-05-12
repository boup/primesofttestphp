
<?php
if((isset($_GET['recherche']))&&(isset($_GET['option'])))
 {
 //to connect  database and select student who name $_GET['recherche']
 //get result to the tableau
 //connexion to the database
 $bdd= new PDO('mysql:host=localhost;dbname=primesoftdb','root','');
 if(!$bdd)
    echo "connexion failed";
	if($_GET['recherche']=='')
	 $sql="select * from book,person where book.utilisateur=id_use and book.etat=1 ";

if(($_GET['option']==0)&&($_GET['recherche']!=''))
$sql="select * from book,person where name_book like '".$_GET['recherche']."%' and  book.utilisateur=id_use and book.etat=1";

else if(($_GET['option']==1)&&($_GET['recherche']!=''))
$sql="select * from book,person where nature like'".$_GET['recherche']."%' and  book.utilisateur=id_use and book.etat=1";

else if(($_GET['option']==2)&&($_GET['recherche']!=''))
$sql="select * from person,book where date = '".$_GET['recherche']."%' and  book.utilisateur=id_use and book.etat=1";
	
else
     $sql="select * from book,person where book.etat=1 and   book.utilisateur=id_use";
$resultat=$bdd->query($sql);
echo '<table width="105%" align="center" id="table1" class="table table-bordered table-striped table-condensed table-hover table-overflow">
     <tr id="add">
		<th>Name book</th>
		<th>nature</th>
		<th>date</th>
		<th>utilisateur</th>
		<th>choose</th>
    </tr>';
	$i=1;
while(($ligne=$resultat->fetch())&&($i<=50))
{
echo "<tr>
      <td>".$ligne['name_book']."</td>
      <td>".$ligne['nature']."</td>
      <td>".$ligne['date']."</td>
	  <td>".$ligne['utilisateur']."</td>
      <td align='center'><a href='book.php?code=".$ligne['id_book']."'<button type='button' class='btn btn-success btn-xs'>choose</button></a></td>
    </tr>";
 }
 echo "</table>";
 }
 
 
 

 if((isset($_GET['recherche3']))&&(isset($_GET['option'])))
 {
 //se connect a la base et selectionner les etudiants qui ont comme nom $_GET['recherche']
 //recuperation du resultat dans un tableau
 //connexion a la base
 $bdd= new PDO('mysql:host=localhost;dbname=primesoftdb','root','');
 if(!$bdd)
    echo "connexion failed";
	if($_GET['recherche3']=='')
	 $sql="select * from person where person.etat=1 ";
if(($_GET['option']==0)&&($_GET['recherche3']!=''))
$sql="select * from person where name like '".$_GET['recherche3']."%' and  person.etat=1";
else if(($_GET['option']==1)&&($_GET['recherche3']!=''))
$sql="select * from person where surname like '".$_GET['recherche3']."%' and  person.etat=1";
else if(($_GET['option']==2)&&($_GET['recherche3']!=''))
$sql="select * from person where status like '".$_GET['recherche3']."%' and  person.etat=1";

	
else
     $sql="select * from person where person.etat=1";
$resultat=$bdd->query($sql);
echo '<table width="105%" align="center" id="table1" class="table table-bordered table-striped table-condensed table-hover table-overflow">
     <tr id="add">
		<th>name</th>
		<th>surname</th>
		<th>status</th>
		
    </tr>';
	$i=1;
while(($ligne=$resultat->fetch())&&($i<=50))
{
echo "<tr>
      <td>".$ligne['name']."</td>
      <td>".$ligne['surname']."</td>
	  <td>".$ligne['status']."</td>
      <td align='center'><a href='person.php?code=".$ligne['id_use']."'<button type='button' class='btn btn-success btn-xs'>choisir</button></a></td>
    </tr>";
 }
 echo "</table>";
 }
 ?>