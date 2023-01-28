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
				<img src="<?php echo get_user_image($comment->user_id); ?>" alt="ava">				
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


<?php }?>

<?php  ?>


<div class="materials__comments comments">

	<?php 

	$course = learn_press_get_course();
	//print_r($course);
	//$post_id = $course->get_id();

	// смотрим если есть комментарии
	?>

		<div class="comments__wrapper">

			<div class="comments__title">
				<?php echo get_comments_number();?>
				<?php echo get_text_comment_num(get_comments_number());?>
				<?php 
					$frome_to = 'all';

					if (isset($_GET['replytocom'])){
						//print_r( get_comments(['comment__in'=>[$_GET['replytocom']]]));
						echo ' Отвечаем ';
						echo get_comment_author($_GET['replytocom']);
						$frome_to = get_comment($_GET['replytocom'])->comment_author_email;
					}

					//print_r($frome_to);
					
					//echo $post->ID;
					//print_r($post);
				?>			
			</div>

			<?php 
				// echo '<pre>';
				// print_r((array)LP_Global::course_item());
				// echo '</pre>';

				$course_item = (array)LP_Global::course_item();

				if ($course_item!=[]){
				
					$course_id = array_values( (array) array_values($course_item)[5])[1];
				}else{
					$course_id = $course->get_id();
				}
				

				

				$defaults = [
						'fields'  => [
							'author' => 'автор',
							'email'  => 'почта',
							'url'    => 'урл',
							'cookies' => 'куки',
							],
						'comment_field'  => '<input class="comments__input input-field" name="comment" type="text" placeholder="Ваш комментарий" aria-required="true" required="required">
						<input type="hidden" name="comment_frome_value" value="'.$frome_to.'">
						<input type="hidden" name="course_id" value="'.$course_id.'">
						<input type="hidden" name="page_comments" value="'.$_SERVER['REQUEST_URI'].'">
						
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

				comment_form($defaults);

				global $post;
				
				$args = array( 
					'post_id'             => $post->ID,
		            'meta_key'            => 'comment_frome_key',
		            'meta_value'          => 'all',            
		          	);


				//if ( have_comments() ) : 
				if( $comments = get_comments( $args ) ):
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
	// $course = learn_press_get_course();
	// $post_id = $course->get_id();

	?>

	

</div><!-- #comments -->