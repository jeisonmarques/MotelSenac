<?php
try 
{
	print( "Connecting to SQL Server." );
	$conn = new PDO ( "sqlsrv:server = tcp:v8xjjhajlw.database.windows.net,1433; Database = motelAtVQaSrngqJ", "apl", "Sjm157304@");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	print( "Connected to SQL Server." );
	
	$query = $conn->prepare("select * FROM Motel");
    $query->execute();
 
      for($i=0; $row = $query->fetch(); $i++){
        echo $i." - ".$row['Nome']."<br/>";
      }
 
      unset($conn); 
      unset($query);
	
}
catch ( PDOException $e )
{
	print( "Error connecting to SQL Server." );
	die(print_r($e));
}
?>