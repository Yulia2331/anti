<?php
/**
 * Template name: Отзовы на идеи
 */
        get_header();
    ?>
    <section class="reviews padding-left"> 
      <div class="reviews__wrapper">
      <? get_template_part('template-parts/ideas/nav-ideas'); ?>
        <div class="reviews__board"> 
    <?    
    $current_user_id = get_current_user_id(); 
    $args = array(
	'no_found_rows'       => true,
	'orderby'             => '',
	'order'               => 'DESC',
	'post_type'           => 'ideas',
	'status'              => 'all',
  'author__in'          => $current_user_id,
	'count'               => false,
	'date_query'          => null, // See WP_Date_Query
	'hierarchical'        => false,
	'update_comment_meta_cache'  => true,
	'update_comment_post_cache'  => false,
);
if( $comments = get_comments( $args ) ){
	foreach( $comments as $comment ){ ?>
 <?
  $post_id = $comment->comment_post_ID;
  $post = get_post($post_id);
 ?>
          <div class="reviews__item">
            <div class="reviews__content">
              <div class="reviews__title"><? echo $post->post_title; ?></div>
              <div class="reviews__body">
              <?php echo $comment->comment_content; ?></div>
              <div class="reviews__link"> <a href="<? echo $post->guid; ?>">Перейти к идее</a></div>
            </div>
          </div>
  <?php }} ?>
        </div>
      </div>
    </section>
<?php
        get_footer();