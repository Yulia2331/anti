<?php
add_action('admin_menu', function(){
	add_menu_page( 'Добавить права ролям', 'Пульт', 'manage_options', 'site-options', 'add_my_setting', '', 333 );
} );

// функция отвечает за вывод страницы настроек
// подробнее смотрите API Настроек: http://wp-kama.ru/id_3773/api-optsiy-nastroek.html
function add_my_setting(){
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>

		<?php
		// settings_errors() не срабатывает автоматом на страницах отличных от опций
		if( get_current_screen()->parent_base !== 'options-general' ){
			settings_errors('название_опции');
		}


		//$role = get_role( 'lp_teacher' );
		// echo '<pre>';
		// print_r($role);
		// echo '</pre>';

		$arr = array_values((array)wp_roles());		

		$all_rols = array_keys($arr[0]);
		$all_caps = array_keys($arr[0]['administrator']['capabilities']);
		?>

		<form action="http://localhost:8000/wp-admin/admin.php?page=site-options" method="POST">
			<select name="role">
			  
			  <?php 
			  foreach($all_rols as $item){
			  	echo '<option>'.$item.'</option>';
			  }

			  ?>
			</select>
			->
			<select name="cap">
			  
			  <?php 
			  foreach($all_caps as $item){
			  	echo '<option>'.$item.'</option>';
			  }

			  ?>
			</select>
			<button type="submit">Назначить</button>			
		</form>
	</div>
	<?php
		if( isset($_POST['role']) and isset($_POST['cap'])){
			echo '<br><br>';
			echo $_POST['role'];
			echo ' -> ';
			echo $_POST['cap'];
			echo '<br><br>';			
			add_theme_caps($_POST['role'],$_POST['cap']);
		}

		echo '<br><br>';
	//$admin = get_role( 'administrator' );
		// echo '<pre>';
		// print_r(array_keys($arr[0]));
		// echo '</pre>';

		if(isset($_POST['role'])){
			$role = $_POST['role'];
		}else{
			$role = 'lp_teacher';
		}
		

		echo '<pre>';
		print_r(array_keys($arr[0][$role]['capabilities']));
		echo '</pre>';

}

function add_theme_caps($role_str,$cap_str){
	$role = get_role( $role_str );
	$role->add_cap( $cap_str ); 
	echo 'Роль изменена';
}

