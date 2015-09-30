<?php
try 
{	
	print( "connecting to SQL Server." );
	$conn = new PDO ( "sqlsrv:server = tcp:v8xjjhajlw.database.windows.net,1433; Database = motelAtVQaSrngqJ", "apl", "Sjm157304@");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	print( "connected to SQL Server." );
}
catch ( PDOException $e )
{
	print( "Error connecting to SQL Server." );
	die(print_r($e));
}
?>