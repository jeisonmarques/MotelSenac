<?php
try 
{
	print( "Connecting to SQL Server.<br/>" );
	$conn = new PDO ( "sqlsrv:server = tcp:v8xjjhajlw.database.windows.net,1433; Database = motelAtVQaSrngqJ", "apl", "Sjm157304@");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	print( "Connected to SQL Server.<br/>" );
	
	$data = $conn->query('SELECT * FROM dbo.Motel' . $conn->quote($name));
 
    foreach($data as $row) {
        print_r($row); 
    }
	
}
catch ( PDOException $e )
{
	print( "Error connecting to SQL Server.<br/>" );
	die(print_r($e));
}
?>