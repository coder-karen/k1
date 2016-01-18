<?php 
/*
	Template Name: Contact Page
*/
?>

<?php 

	// Function for email address validation
	function isEmail($verify_email) {
	
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$verify_email));
	
	}
	
	$error_name = false;
	$error_email = false;
	$error_message = false;

	if (isset($_POST['contact_submit'])) {

		// Initialize the variables
		$name = '';
		$email = '';
		$website = '';
		$message = '';
		$receiver_email = '';
		
		// Get the name
		if (trim($_POST['contact_name']) === '') {
			$error_name = true;
		} else {
			$name = trim($_POST['contact_name']);
		}
		
		// Get the email
		if (trim($_POST['contact_email']) === '' || !isEmail($_POST['contact_email'])) {
			$error_email = true;
		} else {
			$email = trim($_POST['contact_email']);
		}

		// Get the website
		$website = trim($_POST['contact_url']);
		
		// Get the message
		if (trim($_POST['contact_message']) === '') {
			$error_message = true;
		} else {
			$message = stripslashes(trim($_POST['contact_message']));
		}
		
		// Check if we have errors
		if (!$error_name && !$error_email && !$error_message) {
		
			// Get the receiver email from the backend
			$options = get_option('k1_custom_settings');
			$receiver_email = $options['contact_email'];
			
			// If none is specified, get the WP admin email
			if (!isset($receiver_email) || $receiver_email == '') {
				$receiver_email = get_option('admin_email');
			}

			$subject = 'You\'ve been contacted by '. $name;
			$body = "You have been contacted by $name. Their message is:" . PHP_EOL . PHP_EOL;
			$body .= $message . PHP_EOL . PHP_EOL;
			$body .= "You can contact $name via email at $email";
			if ($website != '') { $body .= " and website $website"; }
			$body .= PHP_EOL . PHP_EOL;
			
			$headers = "From: $email" . PHP_EOL;
			$headers .= "Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
			
			if (mail($receiver_email, $subject, $body, $headers)) {
				$email_sent = true;
			} else {
				$email_sent_error = true;
			}
		}
	}
	
?>

<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		

				
				<div class="articles">
				
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

						<article class="page-content clearfix">
							
							<header>
								
								<?php if (current_user_can('edit_post', $post->ID)) {
									edit_post_link(__('Edit This', 'k1-framework'), '<p class="page-admin-edit-this">', '</p>');
								} ?>
								
								<h1><?php the_title(); ?></h1>
								
								<hr />
								
							</header>
							
							<?php if (isset($email_sent) && $email_sent == true) : ?>
							
								<h3><?php _e('Success!', 'k1-framework'); ?></h3>
								<p><?php _e('You have successfully sent the message. We will get back to you as soon as possible.', 'k1-framework'); ?></p>
							
							<?php elseif (isset($email_sent_error) && $email_sent_error == true) : ?>

								<h3><?php _e('There was an error!', 'k1-framework'); ?></h3>
								<p><?php _e('Unfortunately, we couldn\'t send the email at this time. Please try again.', 'k1-framework'); ?></p>
								
							<?php else : ?>
							
							<?php the_content(); ?>
							
						
							
							<!-- The Contact Form -->
							<form action="<?php the_permalink(); ?>" method="post" id="contact-form">
							
								<p <?php if ($error_name) echo 'class="p-errors"'; ?>>
									<input type="text" id="contact_name" name="contact_name" value="<?php if (isset($_POST['contact_name'])) echo $_POST['contact_name']; ?>" />
									<label for="contact_name"><?php _e('Name', 'k1-framework'); ?> <?php _e('(required)', 'k1-framework'); ?></label>
								</p>
				
								<p <?php if ($error_email) echo 'class="p-errors"'; ?>>
									<input type="email" id="contact_email" name="contact_email" value="<?php if (isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>" />
									<label for="contact_email"><?php _e('Email', 'k1-framework'); ?> <?php _e('(required)', 'k1-framework'); ?></label>
								</p>

								<p>
									<input type="url" id="contact_url" name="contact_url" value="<?php if (isset($_POST['contact_url'])) echo $_POST['contact_url']; ?>" />
									<label for="contact_url"><?php _e('Website', 'k1-framework'); ?></label>
								</p>
								
								<p <?php if ($error_message) echo 'class="p-errors"'; ?>>
									<textarea name="contact_message" id="contact_message" cols="30" rows="10"><?php if (isset($_POST['contact_message'])) echo stripslashes($_POST['contact_message']); ?></textarea>
								</p>

								<input type="hidden" id="contact_submit" name="contact_submit" value="true" />
								
								<p><input type="submit" value="<?php _e('Send Message', 'k1-framework'); ?>" class="button green" /></p>
							</form>
							
							<?php endif; ?>
							
						</article>
												
					<?php endwhile; else : ?>
						<article class="no-posts">

							<h1><?php _e('No page was found.', 'k1-framework'); ?></h1>
							
						</article>
					<?php endif; ?>
					
				</div> <!-- end article-container -->
				

			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>