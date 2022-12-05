<?php 
if(is_user_logged_in()){
	$current_user = wp_get_current_user();
	wp_redirect('/antinorma.com/author/'.$current_user->user_nicename);
}
else{
	wp_redirect('https://anti-norma.ru/login');
}
?>
<!DOCTYPE html>
<?php
/*
Template Name: Главная страница
*/
?>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<? wp_head() ?>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<body>
		<header>

		</header>
		<main>
			Главная страница
			<?php
			
			if(!is_user_logged_in()){
				?>
				<ul>
				<li>
					<a href="/auth">Авторизация</a>
					
				</li>
				<li>
				<a href="/reg">Регистрация</a>
				</li>
			</ul>
				<?php 
			 }
			?>
			
		</main>
	<footer>
		
		</footer>
		<?php wp_footer()  ?>
	</body>
