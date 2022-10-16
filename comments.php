<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Katen
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
<div class="section-header">
	<ul>
		<?php 
			wp_list_comments();
		?>
	</ul>
	<h3 class="section-title">Leave Comment</h3>
</div>

	<div class="comment-form rounded bordered padding-30">
		<form id="comment-form" class="comment-form" method="post">
			<div class="messages"></div>
				<div class="row">
					<?php
						$katen_comment_fields = array();
						$flowapp_textarea_field_placeholder = __('Your comment here.....','meal');
						$flowapp_email_field_placeholder = __('Email Address','meal');
						$flowapp_website_field_placeholder = __('Website','meal');
						$flowapp_name_field_placeholder = __('Your Name','meal');
						$katen_comment_field = <<<EOD
							
								<div class="column col-md-12">
								<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="comment" id="comment" class="form-control" rows="3" placeholder="{$flowapp_textarea_field_placeholder}" required="required"></textarea>
									</div>
								</div>
						EOD;
												
						$katen_comment_fields['email'] =<<<EOD
						<div class="row">
							<div class="column col-md-6">
								<!-- Email input -->
								<div class="form-group">
									<input type="email" id="email" name="email" class="form-control"  placeholder="{$flowapp_email_field_placeholder}"required="required">
								</div>
							</div>
						EOD; $katen_comment_fields['url'] = <<<EOD
							<div class="column col-md-6">
								<!-- Name input -->
								<div class="form-group">
									<input type="text" id="url" name="url" class="form-control"  placeholder="{$flowapp_website_field_placeholder}" required="required">
								</div>
							</div>
						</div>
						EOD;
						
						$katen_comment_fields['author'] = <<<EOD
							<div class="column col-md-12">
								<!-- Email input -->
								<div class="form-group">
									<input type="text" id="author" name="author" class="form-control" placeholder="{$flowapp_name_field_placeholder}" required="required">
								</div>
							</div>
						
						EOD;

						$katen_comment_submit_button = <<<EOD
							<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit</button><!-- Submit Button -->
						EOD;

						$katen_comment_form_arguments = array(
							'fields' => $katen_comment_fields,
							'comment_field'=>$katen_comment_field,
							'submit_button' => $katen_comment_submit_button,
							'class_form' => 'comment-form',
							'comment_notes_before'=>'<p></p>',
							'comment_notes_after'=>'<p></p>',
							'title_reply'=>''
						);
						comment_form($katen_comment_form_arguments);
					?>
				</div>
		</form>
	</div>



		
		
		









