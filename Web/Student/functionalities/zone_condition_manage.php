<?php 
	

	$user = 'root';
	$pass = ''; 
	$dbnm = 'upds_v1';

	try 
	{
	    $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
	} 
	catch (PDOException $e) 
	{
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}


	$stmt = $dbh->prepare("INSERT INTO r_zoning_conditions(zc_type, zc_municipality, zc_desc, zc_timestamp) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
	
	$stmt->bindParam(1, $cond_type);
	$stmt->bindParam(2, $cond_munic);
	$stmt->bindParam(3, $cond_desc);


	$arr = $_POST; 
	for($i = 0; $i <= count($arr['cond_type'])-1;$i++)
	{   
		
	    $cond_type = $arr['cond_type'][$i];
	    $cond_munic = $arr['cond_munic'][$i];
	    $cond_desc = $arr['cond_desc'][$i];

	    $stmt->execute();

	}

	     

	     echo "<script type=\"text/javascript\">".
	              "alert
	              ('You have successfully added tasks!');".
	             "</script>";
	     echo "<script>setTimeout(\"location.href = '../views/zone_con_manage.php';\",0);</script>";

?>