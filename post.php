﻿<?php
extract($_POST);
if($_POST['act'] == 'add-com'):
	$name = htmlentities($name);
   

    // Connect to the database
	include('../config.php'); 
	
	// Get gravatar Image 
	// https://fr.gravatar.com/site/implement/images/php/
	$default = "mm";
	$size = 35;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . $default . "&s=" . $size;

	if(strlen($name) <= '1'){ $name = 'Guest';}
    //insert the comment in the database
    mysql_query("INSERT INTO post-activity (post_text,post_id)VALUES( '$name','$id_post')");
    if(!mysql_errno()){
?>

    <div class="cmt-cnt">
    	<img src="<?php echo $grav_url; ?>" alt="" />
		<div class="thecom">
	        <h5><?php echo $name; ?></h5><span  class="com-dt"><?php echo date('d-m-Y H:i'); ?></span>
	        <br/>
	       	
	    </div>
	</div><!-- end "cmt-cnt" -->

	<?php } ?>
<?php endif; ?>