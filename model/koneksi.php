<?php

try{

	$host = 'localhost';	
	$user='root';
	$password = '';	
	@mysql_connect($host,$user,$password) or die('Error to connect to database');
	mysql_select_db('mydata');
		
	}catch(exception $e){
			echo "Error!";
		
	}


?>