<?php
#we can use  PDO to connect to the database also instead of this connexion
	if(!$id=mysql_connect('localhost','root',''))
	{
		die("connexion impossible");
	}
	if(!mysql_select_db('primesoftdb',$id))
	{
		die("selection  database impossible");
	}
?>