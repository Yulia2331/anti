<?php
/**
 * Intentionally Blank Theme functions
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */


if ( ! function_exists( 'blank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	function blank_setup() {
		load_theme_textdomain( 'intentionally-blank' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		// This theme allows users to set a custom background.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f5f5f5',
			)
		);

		add_theme_support( 'custom-logo' );
		add_theme_support(
			'custom-logo',
			array(
				
			
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);
	}
endif; // end function_exists blank_setup.
add_action( 'after_setup_theme', 'blank_setup' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * this theme supports.
 * @param class $wp_customize Customizer object.
 */
function blank_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->add_section(
		'blank_footer',
		array(
			'title'      => __( 'Footer', 'intentionally-blank' ),
			'priority'   => 120,
			'capability' => 'edit_theme_options',
			'panel'      => '',
		)
	);
	$wp_customize->add_setting(
		'blank_copyright',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Intentionally Blank - Proudly powered by WordPress', 'intentionally-blank' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	/**
	 * Checkbox sanitization function
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function blank_sanitize_checkbox( $checked ) {
		// Returns true if checkbox is checked.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
	$wp_customize->add_setting(
		'blank_show_copyright',
		array(
			'default'           => true,
			'sanitize_callback' => 'blank_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'blank_copyright',
		array(
			'type'     => 'textarea',
			'label'    => __( 'Copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_copyright',
			'priority' => '10',
		)
	);
	$wp_customize->add_control(
		'blank_footer_copyright_hide',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Show Copyright Text', 'intentionally-blank' ),
			'section'  => 'blank_footer',
			'settings' => 'blank_show_copyright',
			'priority' => '20',
		)
	);
}
add_action( 'customize_register', 'blank_customize_register', 100 );
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function plugins_addition($plugins) {
    global $current_user;
    
    // ВП написал что это устаревшая функция
    //get_currentuserinfo();
    wp_get_current_user();

    if( $current_user->ID != 0 ) {
        if( is_plugin_active('learnpress-students-list/learnpress-students-list.php') ) {
            unset( $plugins['learnpress-students-list/learnpress-students-list.php'] );
            unset( $plugins['visibility-control-for-learnpress/functions.php'] );
        }
    }
    return $plugins;
}
add_filter('all_plugins', 'plugins_addition');

function theme_name_scripts() {
	wp_enqueue_style( 'course', get_template_directory_uri() . '/assets/css/course.min.css' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
	wp_enqueue_style( 'plugins-bundle', get_template_directory_uri() . '/assets/plugins/global/plugins.bundle.css' );
	wp_enqueue_style( 'datatables', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.css' );
	wp_enqueue_style( 'plugins-bundle', get_template_directory_uri() . '/assets/plugins/global/plugins.bundle.css' );
	
	wp_enqueue_style( 'style-bundle', get_template_directory_uri() . '/assets/css/style.bundle.css' );
	
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
	
	wp_enqueue_style( 'curs-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'curses', get_template_directory_uri() . '/assets/css/curses.css?1' );
	wp_enqueue_style( 'ideas-style', get_template_directory_uri() . '/assets/css/ideas/style.min.css' );
	wp_enqueue_style( 'assignments', get_template_directory_uri() . '/assets/css/assignments/my-assignments.min.css' );	
	wp_enqueue_style( 'new-style', get_template_directory_uri() . '/assets/css/style.min.css' );
	
	wp_enqueue_style( 'all-ideas', get_template_directory_uri() . '/assets/css/ideas/all-ideas.min.css' );
	wp_enqueue_style( 'general', get_template_directory_uri() . '/assets/css/general.css' );
	wp_enqueue_style( 'my-reviews', get_template_directory_uri() . '/assets/css/ideas/my-reviews.min.css' );
	wp_enqueue_style( 'tracked-ideas', get_template_directory_uri() . '/assets/css/ideas/tracked-ideas.min.css' );
	//wp_enqueue_script( 'font-js', 'https://kit.fontawesome.com/72a41cb45f.js?_v=20221228185850', array(), '1.0.0', true );
	//<script src="https://kit.fontawesome.com/72a41cb45f.js?_v=20221228185850" crossorigin="anonymous"></script>

	wp_enqueue_script( 'script-global-plugins-bundle', get_template_directory_uri() . '/assets/plugins/global/plugins.bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'script-bundle', get_template_directory_uri() . '/assets/js/scripts.bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'user-search', get_template_directory_uri() . '/assets/js/custom/utilities/modals/users-search.js', array(), '1.0.0', true );
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_enqueue_script( 'swiper-minlib-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, 'all' );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/js/custom/swiper.js', array(), null, 'all' );
	wp_enqueue_script( 'popup-js', get_template_directory_uri() . '/assets/js/custom/popup.js', array(), '1.0.0', true );
	wp_enqueue_script( 'video-js', get_template_directory_uri() . '/assets/js/custom/video.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ideas-app', get_template_directory_uri() . '/assets/js/ideas/app.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ideas-nav', get_template_directory_uri() . '/assets/js/ideas/navigation.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ideas-counts', get_template_directory_uri() . '/assets/js/ideas/counts.js', array(), '1.0.0', true );
	// wp_enqueue_script( 'ideas-rating', get_template_directory_uri() . '/assets/js/ideas/rating.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ideas-select', get_template_directory_uri() . '/assets/js/ideas/select.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ideas-ajax', get_template_directory_uri() . '/assets/js/ideas/ajax-idea.js', array(), '1.0.0', true );
	if (is_page(array(252,311))){
	wp_enqueue_style( 'fullcalendar.bundle.css', get_template_directory_uri() . '/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css' );
	wp_enqueue_style( 'datatables.bundle.css', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.css' );
	
	wp_enqueue_script( 'charts-js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'charts-js-datatables', 'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2', array(), '1.0.0', true );
	wp_enqueue_script( 'datatables-bundle-js', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'widgets-bundle-js', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'widgets-js', get_template_directory_uri() . '/assets/js/custom/widgets.js', array(), '1.0.0', true );


	}
	if (is_page(9)){
		wp_enqueue_script( 'script-auth', get_template_directory_uri() . '/assets/js/custom/authentication/sign-in/general.js', array(), '1.0.0', true );
	}
	if (is_page(13)){
		
		wp_enqueue_script( 'script-reg', get_template_directory_uri() . '/assets/js/custom/authentication/sign-up/general.js', array(), '1.0.0', true );
		wp_enqueue_style( 'datepicker-style', '//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css' );
	}
	if (is_page(29)){
		wp_enqueue_script( 'script-password-reset', get_template_directory_uri() . '/assets/js/custom/authentication/password-reset/password-reset.js', array(), '1.0.0', true );

	}
	if (is_author() or is_page(array(49, 244)) ) {
		
		wp_enqueue_script( 'script-widjet', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'script-widjet-custom', get_template_directory_uri() . '/assets/js/custom/widgets.js', array(), '1.0.0', true );
	
		wp_enqueue_style( 'datepicker-style', '//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css' );
	}
	if (is_page(223)){
		
		wp_enqueue_script( 'datatables', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'customers-export', get_template_directory_uri() . '/assets/js/custom/apps/customers/list/export.js', array(), '1.0.0', true );
		wp_enqueue_script( 'customers-list', get_template_directory_uri() . '/assets/js/custom/apps/customers/list/list.js', array(), '1.0.0', true );
		wp_enqueue_script( 'customers-add', get_template_directory_uri() . '/assets/js/custom/apps/customers/add.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widjets', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widjets-custom', get_template_directory_uri() . '/assets/js/custom/widgets.js', array(), '1.0.0', true );
		
		wp_enqueue_style( 'datepicker-style', '//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css' );

	}
	if (is_page(241)){
		wp_enqueue_style( 'fullcalendar.bundle.css',get_template_directory_uri() . '/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css' );
		wp_enqueue_style( 'datatables.bundle.css',get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.css' );


		wp_enqueue_script( 'fullcalendar.bundle', get_template_directory_uri() . '/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'datatables.bundle.js', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
	
		wp_enqueue_script( 'calendar.js', get_template_directory_uri() . '/assets/js/custom/apps/calendar/calendar.js', array(), '1.0.0', true );
		wp_enqueue_script( 'fullcalendar.bundle', get_template_directory_uri() . '/assets/js/gcal.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widgets.bundle.js', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
	
	}
	if (is_page(266)){
		wp_enqueue_style( 'fullcalendar.bundle.css',get_template_directory_uri() . '/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css' );
		wp_enqueue_style( 'datatables.bundle.css',get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.css' );


		wp_enqueue_script( 'fullcalendar.bundle', get_template_directory_uri() . '/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'datatables.bundle.js', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
	
		wp_enqueue_script( 'calendar.js', get_template_directory_uri() . '/assets/js/custom/apps/calendar/calendar_pkm.js', array(), '1.0.0', true );
		wp_enqueue_script( 'fullcalendar.bundle', get_template_directory_uri() . '/assets/js/gcal.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widgets.bundle.js', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
	
	}
	if(is_page(255)){
		wp_enqueue_script( 'datatables.bundle.js', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'permissions-list-js', get_template_directory_uri() . '/assets/js/custom/apps/user-management/permissions/list.js', array(), '1.0.0', true );
		wp_enqueue_script( 'add-permission-js', get_template_directory_uri() . '/assets/js/custom/apps/user-management/permissions/add-permission.js', array(), '1.0.0', true );
		wp_enqueue_script( 'update-permission-js', get_template_directory_uri() . '/assets/js/custom/apps/user-management/permissions/update-permission.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widgets.bundle.js', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widjets-custom', get_template_directory_uri() . '/assets/js/custom/widgets.js', array(), '1.0.0', true );

	}
	if(is_page(258)){
		wp_enqueue_script( 'datatables-bundle-js', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'roles-view-view-js', get_template_directory_uri() . '/assets/js/custom/apps/user-management/roles/view/view.js', array(), '1.0.0', true );
		wp_enqueue_script( 'update-role-js', get_template_directory_uri() . '/assets/js/custom/apps/user-management/roles/view/update-role.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widgets-bundle-js', get_template_directory_uri() . '/assets/js/widgets.bundle.js', array(), '1.0.0', true );
		wp_enqueue_script( 'widjets-custom', get_template_directory_uri() . '/assets/js/custom/widgets.js', array(), '1.0.0', true );

	}
// 	wp_enqueue_style( 'datatables', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.css' );
// 	wp_enqueue_style( 'plugins-bundle', get_template_directory_uri() . '/assets/plugins/global/plugins.bundle.css' );
// 	wp_enqueue_style( 'style-bundle', get_template_directory_uri() . '/assets/css/style.bundle.css' );
// 	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
// 	wp_enqueue_script( 'script-global-plugins-bundle', get_template_directory_uri() . '/assets/plugins/global/plugins.bundle.js', array(), '1.0.0', true );
// 	wp_enqueue_script( 'script-bundle', get_template_directory_uri() . '/assets/js/scripts.bundle.js', array(), '1.0.0', true );
// 	wp_enqueue_script( 'script-datatables', get_template_directory_uri() . '/assets/plugins/custom/datatables/datatables.bundle.js', array(), '1.0.0', true );
		
		wp_enqueue_style( 'style-city-phone', get_template_directory_uri() . '/assets/js/cityphone/css/intlTelInput.css' );
		wp_enqueue_style( 'swiper-bundle-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css' );
		wp_enqueue_script( 'script-city-phone', get_template_directory_uri() . '/assets/js/cityphone/js/intlTelInput.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'script-jquery-ui', 'https://code.jquery.com/ui/1.13.1/jquery-ui.js', array(), '1.0.0', true );
		wp_enqueue_script( 'datepickir-ru', get_template_directory_uri() . '/assets/js/datepicker-ru.js', array(), '1.0.0', true );	
		wp_enqueue_script( 'input-mask', "https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js", array(), '1.0.0', true );	
		wp_enqueue_script( 'script-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );

}

function custom_login_page() {
	$new_login_page_url = home_url( '/auth/' ); // new login page
	global $pagenow;
	if( $pagenow == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == "GET") {
		wp_redirect($new_login_page_url);
	exit;
	}
	}
	if(!is_user_logged_in()){
	add_action("init","custom_login_page");
	}

	function get_age( $birthday ){
		
		$birthday_timestamp = strtotime($birthday);

		$age = date('Y') - date('Y', $birthday_timestamp);

		if ((int)date('md', $birthday_timestamp) > (int)date('md')) {
			$age--;
			}

		return $age;
}
	

// Название месяца по метке UNIX
function getMonthName($month) { 
	
	$monthAr = array(
	  1 => array('Январь', 'Января'),
	  2 => array('Февраль', 'Февраля'),
	  3 => array('Март', 'Марта'),
	  4 => array('Апрель', 'Апреля'),
	  5 => array('Май', 'Мая'),
	  6 => array('Июнь', 'Июня'),
	  7 => array('Июль', 'Июля'),
	  8 => array('Август', 'Августа'),
	  9 => array('Сентябрь', 'Сентября'),
	  10=> array('Октябрь', 'Октября'),
	  11=> array('Ноябрь', 'Ноября'),
	  12=> array('Декабрь', 'Декабря')
	);
	
	// проверяем ввод данных на правельность
	if ($month <= 1 and $month >= 12 ){
		return $monthAr[(int)$month];
	}else{
		return 'error';
	}
	
 }


function after_login() {

}

add_action('wp_login', 'after_login');
add_filter( 'theme_file_path', 'wp_normalize_path' );

require_once ('functions/authorithation.php');
require_once ('functions/registration.php');
require_once ('functions/reset-password.php');
require_once ('functions/user_money.php');
require_once ('functions/custom-types.php');
require_once ('functions/user-posts.php');
require_once ('functions/likes.php');
require_once ('functions/post-comments.php');
require_once ('functions/authors.php');
require_once ('functions/analitic.php');
//require_once ('functions/curses.php');
require_once ('functions/idea-ajax.php');


add_action( 'wp_ajax_questiondatahtml', 'questiondatahtml_update' );
add_action( 'wp_ajax_nopriv_questiondatahtml', 'questiondatahtml_update' );
function questiondatahtml_update() {
	$result =  array();
	if ( $_FILES ) {
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/media.php');
		$file_handler = 'updoc';
		$attach_id = media_handle_upload($file_handler,$pid );
	}
	else{
		$result['url'] = '';
		$result['id'] = 0;	
	}
	$result['url'] = wp_get_attachment_image_url($attach_id);
	$result['id'] = $attach_id;
	echo json_encode($result);
	wp_die();
}


add_action( 'wp_ajax_upload_profileimage', 'upload_profile_foto' );
add_action( 'wp_ajax_nopriv_upload_profileimage', 'upload_profile_foto' );

function upload_profile_foto(){
	$id = $_POST['id'];
	$image_id = $_POST['image'];
	update_field('photo', $image_id, 'user_'.$id);
	$result =  array();
	$result['status'] ='ok';
	echo json_encode($result);
	
	wp_die();
}

//меню
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}



//скрыть админбар
add_action( 'after_setup_theme', function(){
	show_admin_bar( false );
	});



function get_user_image($user_id){
	$image = get_field('photo', 'user_'.$user_id);
	if ($image!=''){
		return $image;
	}
	return 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y';
}


add_action('template_redirect', 'check_zar');

function check_zar(){
	if(!is_page(49)){
		if (is_user_logged_in()){
	$currrent_userID =  get_current_user_id();

	$user_id = $currrent_userID;
	if (have_rows('zarabotok', 'user_'.$user_id )){
				$money = get_field('zarabotok', 'user_'.$user_id );
				$end_money = end($money);
				$money_this_month=$end_money['money_this_month'];
				$money_next_month=$end_money['money_next_month'];
				$month_number = $end_money['mesyacz'];
				$month = (int)explode(".", $month_number)[0];
				$next_month = $month + 1;

				$month_name = getMonthName($month);
				$next_month_name = getMonthName($next_month);

				$today = getdate();
				$this_month = $today['mon'];
				$this_day = $today['mday'];
				if (((int)$this_month - (int)$month-1) > 1 ){
					wp_redirect( '/get_money', 301 );
				}
				if ((int)$this_month-1>(int)$month && (int)$this_day>3){
					wp_redirect( '/get_money', 301 );
					
				}
	}

	elseif(!have_rows('zarabotok', 'user_'.$user_id )){
		wp_redirect( '/get_money', 301 );
		
	}
}
}
}



function get_cities(){
	$args = array(
		
		'meta_query' => array(
			'relation' 			=> 'AND',
			
			array(
					'key' => 'city',
					'value' => '',
					'compare' => '!='
			),
			
				)
			);
	$users = get_users($args);
	$cities = array();
	foreach ($users as $user){
		$city = get_field('city', 'user_'.$user->ID);
		if (!in_array($city, $cities)){
			array_push($cities,$city);
		}	
	}
	return $cities;
	wp_die();
}

add_action( 'template_redirect', function() {
	if( ( !is_page(array('auth','remind-password', 'reg') )) ) {
		 if (!is_user_logged_in() ) {
			  wp_redirect( site_url( 'auth' ) );        // redirect all...
			  exit();
		 }
	}
});

function my_upload_size_limit() {
	add_filter( 'upload_size_limit', 'my_upload_size_limit' );
	return wp_convert_hr_to_bytes( '2400M' );
}
my_upload_size_limit();



function is_user_role_in( $roles, $user = false ) {
	$user || $user = wp_get_current_user();
	if( is_numeric( $user ) ){
		$user = get_userdata( $user );
	}
	if( empty( $user->ID ) ){
		return false;
	}
	foreach( (array) $roles as $role ){
		if( isset( $user->caps[ $role ] ) || in_array( $role, $user->roles, true ) ){
			return true;
		}
	}
	return false;
}
add_filter( 'learn-press/override-templates', function(){ return true; } );


// Переводим время в число минуты
function clear_time($string){
  $arr = explode(' ', $string);

  if ($arr[1] == 'minute'){
  	$int = (int)$arr[0];
  }
  if ($arr[1] == 'hour'){
  	$int = (int)$arr[0]*60;
  }
  if ($arr[1] == 'day'){
  	$int = (int)$arr[0]*1440;
  }
  if ($arr[1] == 'week'){
  	$int = (int)$arr[0]*10080;
  }  

  return $int*60;
}


// Расчет оставшегося времени
function get_remaining_time($end_time){

    $seconds = $end_time - time();

    $days = date('d',$seconds);
    $hours = date('h',$seconds);
    $minutes = date('m',$seconds);
    
    return $days.' д - '.$hours.' ч - '.$minutes.' мин ';

}

// Функция для коментария и комментариев
function get_text_comment_num($value){

	if ($value == 1){
		return 'комментарий';
	}
	if ($value > 1 and $value <= 4){
		return 'комментария';
	}
	if ($value > 4){
		return 'комментариев';
	}

}

// добовление поля учителя в админке
require_once ('functions/add_teacher.php');

// добовление поля дедлайна ДЗ
require_once ('functions/add_home_work.php');

// шаблон коментариев для домашнего задания
require_once ('template-parts/comments/home_work_comments.php');

// подключаем ответ на коменты
// function enqueue_comment_reply() {
// 	if( is_singular() )
// 		wp_enqueue_script('comment-reply');
// }
// add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );

// Content
add_action(	'custom_content_single_meta',LearnPress::instance()->template( 'course' )->callback( 'single-course/meta-secondary' ),10);
add_action(	'custom_content_single_tab',LearnPress::instance()->template( 'course' )->callback( 'single-course/tabs/tabs' ),60);
add_action( 'custom_content_single',LearnPress::instance()->template( 'course' )->func( 'course_comment_template' ), 75 );

// добовляем мета поле комментариев для напровления комметария
add_action( 'comment_post', 'add_comment_frome_field' );
function add_comment_frome_field( $comment_id ) {
	$meta_val = sanitize_text_field( $_POST['comment_frome_value'] );
	add_comment_meta( $comment_id, 'comment_frome_key', $meta_val );
}

// // добовляем мета поле комментариев для напровления комметария
// add_action( 'comment_post', 'add_comment_status_field' );
// function add_comment_status_field( $comment_id ) {
// 	$meta_val = sanitize_text_field( $_POST['comment_status_value'] );
// 	add_comment_meta( $comment_id, 'comment_status_key', $meta_val );
// }


//перенаправление на /thank-you-post/ после комментирования start
function wph_redirect_after_comment(){
    //print_r( $_POST );

	// Добовление уведомлений пользователей
	if ($_POST['comment_frome_value'] != 'all' ){
		if ($_POST['comment_frome_value'] != wp_get_current_user()->user_email){
			add_user_meta( get_user_by('email',$_POST['comment_frome_value'])->ID, 'notifications', [$_POST['comment'],'id-curs/id-page'] );
		}    	
	}else{

		

		$users = get_field('dostup',$_POST['course_id']);
		//print_r(get_post($_POST['comment_post_ID']));
		//print_r($users);
		foreach($users as $user){
			add_user_meta( $user, 'notifications', [$_POST['comment'],'id-curs/id-page'] );
		}

	}

    wp_redirect($_POST['page_comments']);
    exit();
}
add_filter('comment_post_redirect', 'wph_redirect_after_comment');

// Удаление уведомлений пользователя
add_action( 'wp_ajax_del_notifications', 'del_notifications' );
function del_notifications(){
		$notification_id = $_POST['notification_id'];
		$notification_content = $_POST['notification_content'];
		//echo 'good'.$notification_id.' '.$notification_content;
		//print_r([$notification_content,$notification_id]);
		
		delete_metadata( 'user', wp_get_current_user()->ID, 'notifications', [$notification_content,$notification_id] );
		wp_die();
	}


function my_notifications(){
	$num_comm = wp_count_comments()->moderated;

	return $num_comm;
}

//debug
function mydebbug(){
	$mydebug=false;
	if ($mydebug) {
		return true;
	}
}