<?php
$mysql_host = "localhost";
$mysql_database = "comment_sys"; //create the database called "comment_sys"
$mysql_user = "root";
$mysql_password = "";

@mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database); 
?>


<script>

	   $(function(){ 
        //alert(event.timeStamp);
        $('.post').click(function(event){    
            $(this).hide();
            $('.post-area').show();
            $('#post-text').focus();
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
        $('#send').click(function(){
            var theCom = $('#post-text');
         

            if( !theCom.val()){ 
                alert('I know you have something to share us :)'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "ajax/add-post.php",
                    data:  'act=add-com&id_post='+<?php echo $id_post; ?>+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                      
                            $('.post-area').hide('fast', function(){
                            $('.post').show('fast');
                            $('.post').after(html);  
                        })
                    }  
                });
            }
        });

    });

</script>