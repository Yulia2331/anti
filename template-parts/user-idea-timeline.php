<?php 
$id = get_the_ID(); 
$author = get_the_author();
$author_id = get_the_author_meta( 'ID' );

$current_user = wp_get_current_user();
$current_id = $current_user -> ID
?>
<div class="card card-post  user-post mb-6" id='user-post-<?php echo $id?>'>
	<div class="card-post-container">
		<?php if ($current_id == $author_id){ ?>
			<a href="" class='delete-post' data-item='#user-post-<?php echo $id?>' data-id='<?php echo $id ?>' alt='Удалить пост' title='Удалить пост'>x</a>
		<?php }?>
		<div class="card-header  w-100 d-flex align-items-center justify-content-between pe-lg-0 ps-lg-0">
			<div class="author d-flex align-items-center flex-grow-1">
				
				<div class="autor__image rounded-circle" style='
							background:url(<?=get_user_image($author_id)?>);
								background-position:center;
								background-size:cover;
								background-repeat:no-repeat;
							'>
					
				</div>
	
				<div class="author__info d-flex justify-content-between w-100">
					<div class="">Пользователь
					<a href = '/author/<?php echo  get_the_author_meta( 'nicename' ) ?>' class="author__name">
					<?php echo get_the_author_meta( 'first_name' ) ?> <?php echo get_the_author_meta( 'last_name' ) ?> 
					</a>
					<? $action = get_post_meta( $id, 'idea_action', true ); 
					if($action == 'creation'){
						echo 'создал гипотезу';
					}
					if($action == 'review'){
						echo 'оставил отзыв гипотезу';
					}
					if($action == 'subscription'){
						echo 'подписался на гипотезу';
					}
					$link = get_post_meta( $id, 'idea_id', true );
					?>
					<a href="<? echo get_permalink( $link ); ?>" style="font-weight: 600;">"<? the_title(); ?>"</a>
					</div>
					
					<div class="author__date">
					<?php echo get_the_date('j F Y'); ?>
					</div>
				</div>
			</div>
		

			<div class="dropdown card-funct">
					<div class="d-none">
						<a class="dropdown-toggle btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z" fill="#303030"/>
								<path d="M19 14C20.1046 14 21 13.1046 21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14Z" fill="#303030"/>
								<path d="M5 14C6.10457 14 7 13.1046 7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14Z" fill="#303030"/>
							</svg>

						</a>

						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<li><a class="dropdown-item disabled" href="#">Удалить запись</a></li>
							<li><a class="dropdown-item" href="#">Редактировать запись</a></li>
						</ul>
					</div>
				
			</div>


		</div>
		
		<div class="card-footer p-lg-0">
			<?php get_template_part('template-parts/comments') ?>
		</div>

		
	</div>

</div>