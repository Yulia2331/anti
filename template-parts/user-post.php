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
	
				<div class="author__info d-flex flex-column">
					<a href = '/author/<?php echo  get_the_author_meta( 'nicename' ) ?>' class="author__name">
					<?php echo get_the_author_meta( 'first_name' ) ?> <?php echo get_the_author_meta( 'last_name' ) ?> 
					</a>
					<div class="author__date">
					<?php echo get_the_date('j F Y'); ?> в <?php echo get_the_time(); ?>
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
		<div class="card-body pt-0 pe-lg-0 ps-lg-0">
			<div class="d-flex flex-column">
				<div class="post-text">
				<? the_content() ?>
				</div>
				<?php if (get_field('post_image', $id)): ?>
					<div class="post-image ">
						
								<img src="<?=get_field('post_image', $id) ?>" class='img-fluid' alt="">
					</div>
				<?php endif; ?>
			</div>
			<div class="d-flex jusctify-content-start align-items-center post-meta">
			
			<?php echo get_like_button( get_the_ID(), get_current_user_id() ); ?>
				<div class="comments-btn meta-btn" data-post='<?php  echo $id ?>'>
					<span class='icon'>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 12C12.5523 12 13 11.5523 13 11C13 10.4477 12.5523 10 12 10C11.4477 10 11 10.4477 11 11C11 11.5523 11.4477 12 12 12Z" fill="#303030"/>
							<path d="M16 12C16.5523 12 17 11.5523 17 11C17 10.4477 16.5523 10 16 10C15.4477 10 15 10.4477 15 11C15 11.5523 15.4477 12 16 12Z" fill="#303030"/>
							<path d="M8 12C8.55228 12 9 11.5523 9 11C9 10.4477 8.55228 10 8 10C7.44772 10 7 10.4477 7 11C7 11.5523 7.44772 12 8 12Z" fill="#303030"/>
							<path d="M19 3H5C4.20435 3 3.44129 3.31607 2.87868 3.87868C2.31607 4.44129 2 5.20435 2 6V21C2.00031 21.1772 2.04769 21.3511 2.1373 21.504C2.22691 21.6569 2.35553 21.7832 2.51 21.87C2.65946 21.9547 2.82821 21.9995 3 22C3.17948 21.9999 3.35564 21.9516 3.51 21.86L8 19.14C8.16597 19.0412 8.35699 18.9926 8.55 19H19C19.7956 19 20.5587 18.6839 21.1213 18.1213C21.6839 17.5587 22 16.7956 22 16V6C22 5.20435 21.6839 4.44129 21.1213 3.87868C20.5587 3.31607 19.7956 3 19 3ZM20 16C20 16.2652 19.8946 16.5196 19.7071 16.7071C19.5196 16.8946 19.2652 17 19 17H8.55C8.00382 16.9996 7.46789 17.1482 7 17.43L4 19.23V6C4 5.73478 4.10536 5.48043 4.29289 5.29289C4.48043 5.10536 4.73478 5 5 5H19C19.2652 5 19.5196 5.10536 19.7071 5.29289C19.8946 5.48043 20 5.73478 20 6V16Z" fill="#303030"/>
						</svg>

					</span>
					<div class="count"><?php echo get_comments_number() ?> </div>
				</div>
			</div>
		</div>
		
		<div class="card-footer p-lg-0">
			<?php get_template_part('template-parts/comments') ?>
		</div>

		
	</div>

</div>