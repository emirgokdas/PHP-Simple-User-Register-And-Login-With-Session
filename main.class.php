<?php

  
   class main{

	   
	   public function getComments(){
		  $link = @mysql_connect("localhost", "root", "");
mysql_select_db("comments", $link);

$result = mysql_query("SELECT * FROM articles", $link);
$num_rows = mysql_num_rows($result);
		          
			while($articles = mysql_fetch_assoc($result)){
				
			$name = $articles['name'];
			$comments = $articles['content'];
			

	
		
			
				
				
			
		   }
		   
		  
	   }
	   
   }

?>