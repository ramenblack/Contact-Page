 <?php
 include 'db/db.php';
 
 
 try{
	 
# MySQL with PDO_MYSQL  
  $DBH = new PDO("mysql:host=$hostname;database =$database ", $username, $password); 
  $STH = $DBH->query("select * from stream.contact order by id desc;");  
  $STH->setFetchMode(PDO::FETCH_OBJ); 
		//$therows = $STH->fetchColumn();
		//echo "$therows <hr />";
	while($row = $STH->fetch()){
		echo $row->id . " ~ \n";  
		echo $row->ip . " ~ \n";  
		echo $row->time . " ~ \n";   
	    echo $row->name . " ~ \n";   
	    echo $row->comment . " ~ \n";   
	    echo " <br />";
	   }
	
	}
    catch(Exception $e)

    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';

    }


# 

?>

