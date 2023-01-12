<?php

if (mydebbug()){
    echo '---> comments.php';
}

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
// if ( post_password_required() )
//  return;

?>

<?php

///////////////////////////////// Тема комментария ////////////////////////////////////
function my_theme_comment($comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>

	<div class="comments__block">
		<?php

		if($comment->comment_parent == 0){
			$level_comment = 'main-comment';
		}else{
			$level_comment = 'sub-comment';
		}

		?>
		<div class="comments__maint <?php echo $level_comment;?>">
			<div class="main-comment__avatar"> 
				<img src="<?php echo get_avatar_data($comment->comment_author_email)['url'];?>" alt="ava">				
				<?php
					// print_r(get_avatar_data($comment->comment_author_email));
					// print_r($comment->comment_author_email);
				?>				
			</div>
			<div class="main-comment__body"> 
		      <div class="main-comment__name"><?php echo get_comment_author_link();?></div>
		      <div class="main-comment__message"><?php comment_text(); ?></div>
		      <div class="main-comment__footer"> 
		        <div class="main-comment__data"><?php printf(__( '%1$s в %2$s' ),get_comment_date(),get_comment_time()); ?></div>
		        <!-- <button class="main-comment__button">Ответить</button> -->
		        <?php
					comment_reply_link(
						array_merge(
							$args,
							array(								
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					); 
					?>
		      </div>
		    </div>



			<div>
				<?php 
				//echo $tag, $classes;
				//comment_ID();

				//print_r($comment);

				?>
				


				<!-- Модерация -->
				<?php if ( $comment->comment_approved == '0' ) { ?>
					<em class="comment-awaiting-moderation">
						<?php _e( 'Your comment is awaiting moderation.' ); ?>
					</em><br/>
				<?php } ?>

				<!-- Редактировать -->
				<div class="comment-meta commentmetadata">
					<?php //edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
				</div>

				<?php if ( 'div' != $args['style'] ) { ?>
					</div>
				<?php } ?>
			</div>
		</div>

<?php
}
///////////////////////////////// Тема комментария ////////////////////////////////////



?>

<div class="materials__comments comments">

	<?php 
	$course = learn_press_get_course();
	$post_id = $course->get_id();

	// смотрим если есть комментарии
	if ( have_comments() ) : ?>

		<div class="comments__wrapper">

			<div class="comments__title">
				<?php echo get_comments_number();?>
				<?php echo get_text_comment_num(get_comments_number());?>			
			</div>

			<?php 
				$defaults = [
						'fields'  => [
							'author' => 'автор',
							'email'  => 'почта',
							'url'    => 'урл',
							'cookies' => 'куки',
							],
						'comment_field'  => '<input class="comments__input input-field" name="comment" type="text" placeholder="Ваш комментарий" aria-required="true" required="required">
							',
						
						'must_log_in'          => '',						
						'logged_in_as'         => '',						
						'comment_notes_before' => '<p class="comment-notes">Авторизуйтесь пожалуста</p>',
						'comment_notes_after'  => '',
						'id_form'              => 'commentform',
						'id_submit'            => 'submit',
						'class_container'      => '',
						'class_form'           => 'comments__add ',
						'class_submit'         => 'submit',
						'name_submit'          => 'submit',
						'title_reply'          => '',
						'title_reply_to'       => '',
						'title_reply_before'   => '',
						'title_reply_after'    => '',
						'cancel_reply_before'  => '',
						'cancel_reply_after'   => '',
						'cancel_reply_link'    => '',
						'comment_notes_after'  => '<div style="display: none;">',
						'label_submit'         => 'Отправить',
						'submit_button'        => '</div><button name="%1$s" type="submit" id="%2$s" class="comments__button secondary__button %3$s"/>%4$s</button>',
						'submit_field'         => '<p class=" form-submit">%1$s %2$s</p>',
						'format'               => 'xhtml',
					];

				comment_form($defaults); ?>
			
			
			<?php
				wp_list_comments( array(
					'walker'            => null,
					'max_depth'         => 10,
					'style'             => 'div',
					'callback'          => 'my_theme_comment',
					'end-callback'      => null,
					'type'              => 'comment',
					'reply_text'        => 'Ответить',
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 32,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
					'short_ping'        => false,    // С версии 3.6,
					'echo'              => true,     // true или false
						) );

				//wp_list_comments('type=comment&callback=my_theme_comment');
			?>	
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav class="navigation comment-navigation" role="navigation">

				<h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h3>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>

			</nav><!-- .comment-navigation -->

		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
</div>
<div class="pagination">
	<?php paginate_comments_links(); ?>
</div>


<div id="comments" class="comments-area">	

	<?php 
	$course = learn_press_get_course();
	$post_id = $course->get_id();

	// смотрим если есть комментарии
	if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php
			// printf(
			// 	_nx(
			// 		'Коментарий "%2$s"',
			// 		'%1$s коментариев "%2$s"',
			// 		get_comments_number(),
			// 		'comments title',
			// 		'twentythirteen'
			// 	),
			// 	number_format_i18n( get_comments_number() ),
			// 	'<span>' . get_the_title() . '</span>'
			// );
			?>
		</h2>

		<?php 
		// $defaults = [
		// 		'fields'  => [
		// 			'author' => 'автор',
		// 			'email'  => 'почта',
		// 			'url'    => 'урл',
		// 			'cookies' => 'куки',
		// 			],
		// 		'comment_field'  => '<p class="comment-form-comment">
		// 			<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
		// 			<textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
		// 		</p>',
				
		// 		'must_log_in'          => '<p class="must-log-in">' .
		// 			 sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
		// 		 </p>',
				
		// 		'logged_in_as'         => '<p class="logged-in-as">' .
		// 			 sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
		// 		 </p>',
				
		// 		'comment_notes_before' => '<p class="comment-notes">Авторизуйтесь пожалуста</p>',
		// 		'comment_notes_after'  => '',
		// 		'id_form'              => 'commentform',
		// 		'id_submit'            => 'submit',
		// 		'class_container'      => 'comment-respond',
		// 		'class_form'           => 'comment-form',
		// 		'class_submit'         => 'submit',
		// 		'name_submit'          => 'submit',
		// 		'title_reply'          => 'Комментарий',
		// 		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		// 		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
		// 		'title_reply_after'    => '</h3>',
		// 		'cancel_reply_before'  => ' <small>',
		// 		'cancel_reply_after'   => '</small>',
		// 		'cancel_reply_link'    => __( 'Cancel reply' ),
		// 		'label_submit'         => 'Отправить',
		// 		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		// 		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		// 		'format'               => 'xhtml',
		// 	];

		// comment_form($defaults); ?>

		<ol class="comment-list">
			<?php
			// wp_list_comments( array(
			// 	'walker'            => null,
			// 	'max_depth'         => 10,
			// 	'style'             => 'ul',
			// 	'callback'          => 'my_theme_comment',
			// 	'end-callback'      => null,
			// 	'type'              => 'comment',
			// 	'reply_text'        => 'Ответить',
			// 	'page'              => '',
			// 	'per_page'          => '',
			// 	'avatar_size'       => 32,
			// 	'reverse_top_level' => null,
			// 	'reverse_children'  => '',
			// 	'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
			// 	'short_ping'        => false,    // С версии 3.6,
			// 	'echo'              => true,     // true или false
			// 		) );

			// //wp_list_comments('type=comment&callback=my_theme_comment');
			// ?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav class="navigation comment-navigation" role="navigation">

				<h3 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h3>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>

			</nav><!-- .comment-navigation -->

		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	

</div><!-- #comments -->

