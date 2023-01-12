<?php

// Проверяем есть ли мой комент
function my_comments($id){

}


// Получаем комментарии для ДЗ
function get_home_work_comments($id,$id_cours){

	// Получаем id курса

	// Получаем преподов
	$teachers = get_post_meta($id_cours, 'teachers', 1);

	// Смотрим какой препод ведет этого учиника
	// ...
	// пока получаем первого препода
	$teacher = $teachers[0];
	

	$args = array(
            'author_email'        => '',
            'author__in'          => '',
            'author__not_in'      => '',
            'include_unapproved'  => '',
            'fields'              => '',
            'comment__in'         => '',
            'comment__not_in'     => '',
            'karma'               => '',
            'number'              => '',
            'offset'              => '',
            'no_found_rows'       => true,
            'orderby'             => '',
            'order'               => 'DESC',
            'parent'              => '',
            'post_author__in'     => '',
            'post_author__not_in' => '',
            'post_id'             => $id,
            'post__in'            => '',
            'post__not_in'        => '',
            'post_author'         => '',
            'post_name'           => '',
            'post_parent'         => '',
            'post_status'         => '',
            'post_type'           => '',
            'status'              => 'all',
            'type'                => '',
            'type__in'            => '',
            'type__not_in'        => '',
            'user_id'             => '',
            'search'              => '',
            'count'               => false,
            'meta_key'            => '',
            'meta_value'          => '',
            'meta_query'          => '',
            'date_query'          => null, // See WP_Date_Query
            'hierarchical'        => false,
            'update_comment_meta_cache'  => true,
            'update_comment_post_cache'  => false,
          );

	echo $id;
	//print_r(get_comments( $args ));

	if( $comments = get_comments( $args ) ){

    $setup_list = array(
          'walker'            => null,
          'max_depth'         => 10,
          'style'             => 'div',
          'callback'          => '',
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
            );
    wp_list_comments( $setup_list, $comments );
		

    //foreach( $comments as $comment ){
			//echo( $comment->comment_author . '<br />' . $comment->comment_content );
			//print_r($comment);

			?>
				<!-- <div class="comments__maint main-comment">
          <div class="main-comment__avatar"> <img src="<?php echo get_avatar_data($comment->comment_author_email)['url'];?>" alt="ava"></div>
          <div class="main-comment__body"> 
            <div class="main-comment__name"><?php echo $comment->comment_author;?></div>
            <div class="main-comment__message"><?php echo $comment->comment_content;?></div>
            <div class="main-comment__file"> -->
              <!-- <div class="module-block__file">
                <div class="module-block__link">
                  <div class="module-block__doc container__icon--18"><i class="fa-solid fa-file"></i></div>
                  <div class="module-block__name">ava-1.png</div>
                  <button>
                    <div class="container__icon--18"><i class="fa-solid fa-xmark"></i></div>
                  </button>
                </div>
              </div> -->
            <!-- </div>
            <div class="main-comment__footer"> 
              <div class="main-comment__data"><?php echo $comment->comment_date;?></div>
              <button class="main-comment__button">Ответить</button>
            </div>
          </div>
        </div> -->
			<?php

		//}
	}
}