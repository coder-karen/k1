<?php

/***********************************************************************************************/
/* Prevent the direct loading of this file */
/***********************************************************************************************/
if (!empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php') {
	die(__('You cannot access this page directly.', 'k1-framework'));
}

/***********************************************************************************************/
/* If the post is password protected then display text and return */
/***********************************************************************************************/
if (post_password_required()) : ?>
	<p>
		<?php 
			_e( 'This post is password protected. Enter the password to view the comments.', 'k1-framework');
			return;
		?>
	</p>

<?php endif;

/***********************************************************************************************/
/* If we have comments to display, we display them */
/***********************************************************************************************/
if (have_comments()) : ?>
		<a href="#respond" class="article-add-comments"></a>
		<h3><?php comments_number(__('No Comments', 'k1-framework'), __('One Comment', 'k1-framework'), __('% Comments', 'k1-framework')); ?></h3>

		<ol class="commentslist">
			<?php wp_list_comments('callback=k1_comments'); ?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		
			<div class="comment-nav-section clearfix">
			
				<p class="fl"><?php previous_comments_link(__( '&larr; Older Comments', 'k1-framework')); ?></p>
				<p class="fr"><?php next_comments_link(__( 'Newer Comments &rarr;', 'k1-framework')); ?></p>
				
			</div> <!-- end comment-nav-section -->
		
		<?php endif; ?>

<?php
/***********************************************************************************************/
/* If we don't have comments and the comments are closed, display a text */
/***********************************************************************************************/

	elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	
<?php endif; 

/***********************************************************************************************/
/* Display the comment form */
/***********************************************************************************************/
comment_form();

?>