<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = new mysqli("localhost","root","","cse");

   if ($conn -> connect_errno) {
     echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
     exit();
   }
	
   $table_name = "employee";
   $backup_file  = "employee.sql";
   $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
   
   
   $retval = $conn->query( $sql );
   
   if(! $retval ) {
      die('Could not take data backup: ');
   }
   
   echo "Backedup  data successfully\n";
   
   mysqli_close($conn);
?>