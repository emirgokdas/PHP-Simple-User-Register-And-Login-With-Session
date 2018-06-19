<?php
    ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	
	
   if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userName']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<link rel="stylesheet" href="build/css/countrySelect.min.css">
		<link rel="stylesheet" href="build/css/demo.css">
<link href="assets/css/homest.css" rel="stylesheet" type="text/css">
<link href="assets/css/home.css" rel="stylesheet" type="text/css">

<script src="assets/jquery-1.11.3-jquery.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Artifex</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Get Artifex</a></li>
            <li><a href="#">Recent Post</a></li>
            <li><a href="#">Most Popular</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <li><a href="profile.php">My Profile</a></li>
                 <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

<div class="profile-side" style="float:right;">
<div class="usr-image">
<img src="img/profile-img.jpg" class="rounded-top" width="225" height="220" alt="<?php echo $userRow['userName']; ?>">
<div class="ProfileAvatarEditing-changeAvatarHelp">
        <span class="Icon Icon--camera"></span>
       <button type="button" class="btn btn-primary">Change Profil Image</button>
      </div>
<h3 class="usr-header"><?php echo $userRow['userName'] ?></h3>

<div class="usr-bio">
<h4 class="usr-header">Please complete profile settings</h4>

<input class="form-control" type="text" id="bio-name" placeholder="Your Name?">
	<form id="select-country">
			<div class="form-item" style="text-align:left; width:50px;">
				<input id="country_selector" type="text">
				<label for="country_selector" style="display:none;">Select a country here...</label>
			</div>
			<div class="form-item" style="display:none;">
				<input type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly placeholder="Selected country code will appear here" />
				<label for="country_selector_code">...and the selected country code will be updated here</label>
			</div>
			<button type="submit" style="display:none;">Submit</button>
		</form>
<textarea class="form-control" type="text" id="bio-text" placeholder="Your Bio"></textarea>
<button type="button" class="btn btn-default" id="comp-btn" style="float:right;">Complete</button>




</div>



</div>





</div>
<div class="news">
<h2 style="hover:#02CDF7;">Artifex on Today</h2>
<ul class="top-list">
<a href="#"><li>Artifex</li></a>
<a href="#"><li>Live</li></a>
<a href="#"><li>Sport</li></a>
<a href="#"><li>Champions League Today</li></a>
<a href="#"><li>Trump</li></a>
<a href="#"><li>Artifex</li></a>
<a href="#"><li>Live</li></a>
<a href="#"><li>Sport</li></a>
<a href="#"><li>Champions League Today</li></a>
<a href="#"><li>Trump</li></a>
<a href="#"><li>Champions League Today</li></a>
<a href="#"><li>Trump</li></a>
<a href="#"><li>Artifex</li></a>
<a href="#"><li>Live</li></a>
<a href="#"><li>Sport</li></a>
<a href="#"><li>Champions League Today</li></a>
<a href="#"><li>Trump</li></a>
<a href="#"><li>Champions League Today</li></a>



</ul>


</div>
<script>
function send(){
          
            var theText = $('#insert');

  $.ajax({
                    type: "POST",
                    url: "post.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theText.val(),
                    success: function(html){
                        
                        theText.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);  
	
	 
});
	
}
</script>
<div class="timeline-body">
<div class="post-cab">
<input type="text" class="insert" id="insert">
<button type="button" class="btn btn-default" onClick="submit()">Submit</button>
<div id="message"></div>
</div>





















<?php 
// Connect to the database
include('config.php'); 
$id_post = "1"; //the post or the page id
?>

<div class="cmt-container" >


    <?php 
    $sql = mysql_query("SELECT * FROM comments WHERE id_post = '$id_post'") or die(mysql_error());;
    while($affcom = mysql_fetch_assoc($sql)){ 
        $name = $affcom['name'];
        $email = $affcom['email'];
        $comment = $affcom['comment'];
        $date = $affcom['date'];

        // Get gravatar Image 
        // https://fr.gravatar.com/site/implement/images/php/
        $default = "mm";
        $size = 35;
        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($email)))."?d=".$default."&s=".$size;

    ?>
    <div class="cmt-cnt">
        <img src="<?php echo $grav_url; ?>" />
        <div class="thecom">
            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            <p>
                <?php echo $comment; ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php } ?>


    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">
        <input type="text" id="name-com" name="name-com" value="" placeholder="Your name" />
        <input type="text" id="mail-com" name="mail-com" value="" placeholder="Your e-mail adress" />
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->


<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');

            if( !theCom.val()){ 
                alert('You need to write a comment!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);  
                        })
                    }  
                });
            }
        });

    });
</script>





</div>
         
    
</body>
</html>
<?php ob_end_flush(); ?>