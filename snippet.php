<?php

//If you're using any php snippet plugin then use this action to add the script in footer
add_action( 'wp_footer', function () {
	
      //Checking logged-in user
			if ( is_user_logged_in() ){
            
            //Get logged-in user information
					   global $current_user;
					   $user =  wp_get_current_user();
					   $username = $user->user_login;
					   $useremail = $user->user_email;

?>
<script>
	
jQuery(document).ready(function(){
  
  //On Tawkto chat load open the widget automatically
	window.Tawk_API.onLoad = function(){
		window.Tawk_API.maximize();
	};	
	
  //Before load the chat, populate name & email
  //for "hash", you will add your own API Key
  // Get this API key from your tawk.to dashboard
	Tawk_API.onBeforeLoad = function(){
		Tawk_API.setAttributes({
			  name : '<?php echo $username; ?>',
			  email : '<?php echo $useremail; ?>',
			  hash : '<?php echo hash_hmac("sha256", $useremail, "API-KEY"); ?>'
		 }, function(error){
		});

    }; 	
});	
	

</script>
<?php } });
