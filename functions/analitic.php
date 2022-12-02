<?php
//Аналитика клуба
add_action( 'wp_ajax_get_male_users', 'get_male_users_callback' );
add_action( 'wp_ajax_nopriv_get_male_users', 'get_male_users_callback' );

function get_male_users_callback(){
	$args = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
				 'key' => 'male',
				 'value' => 'm',
				 'compare' => '='
			)
	  )
			);


	$args_w = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
				 'key' => 'male',
				 'value' => 'w',
				 'compare' => '='
			)
	  )
			);


	$mans = get_users($args);
	$womans = get_users($args_w);

	$result = array(count($mans), count($womans));
	echo json_encode($result);
	wp_die();
}

add_action( 'wp_ajax_get_spher_users', 'get_spher_users_callback' );
add_action( 'wp_ajax_nopriv_get_spher_users', 'get_spher_users_callback' );

function get_spher_users_callback(){
	$args = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
				 'key' => 'sfera_deyatelnosti',
				 'value' => 'товарка',
				 'compare' => '='
				)
	 		 )
			);
	$args2 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'универсал',
					'compare' => '='
					)
				)
			);
	$args3 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'эксперт',
					'compare' => '='
					)
				)
			);
	$args4 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'ищу себя',
					'compare' => '='
					)
				)
			);
$users1 = get_users($args);
$users2 = get_users($args2);
$users3 = get_users($args3);
$users4 = get_users($args4);

$result = array(count($users1), count($users2), count($users3), count($users4));

echo json_encode($result);
wp_die();
}

add_action( 'wp_ajax_get_city_users', 'get_city_users_callback' );
add_action( 'wp_ajax_nopriv_get_city_users', 'get_city_users_callback' );

function get_city_users_callback(){
	$args = array(
		
		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
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
		$city = trim(get_field('city', 'user_'.$user->ID));
		if (array_key_exists($city, $cities)){
			$cities[$city] = $cities[$city] + 1 ;
		}
		else {
			$cities[$city] = 1;
		}
	}
	arsort($cities);
	$slice = array_slice($cities,0,5);
	echo json_encode($slice);
	wp_die();


}




add_action( 'wp_ajax_get_users_ages', 'get_users_ages_callback' );
add_action( 'wp_ajax_nopriv_get_users_ages', 'get_users_ages_callback' );

function get_users_ages_callback(){
	$date18 = new DateTime('-18 years');
	$date27 = new DateTime('-27 years');
	$date28 = new DateTime('-28 years');
	$date35 = new DateTime('-36 years');
	$date36 = new DateTime('-37 years');
	$date45 = new DateTime('-45 years');
	$date46 = new DateTime('-46 years');
	$date60 = new DateTime('-60 years');

	$args_18 = array(
		'meta_query' => array(
		'relation' 			=> 'AND',
		array(
			'key' => 'user_type',
			'value' => 'club',
			'compare' => '='
		),
		array(
				'key' => 'data_birth',
				'value' => $date18 -> format('Ymd'),
				'compare' => '>'
		),
		)
	);
	$users18 = get_users($args_18);
	$args_years = array(
						'meta_query' => array(
						'relation' 			=> 'AND',
						array(
							'key' => 'user_type',
							'value' => 'club',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date18 -> format('Ymd'),
								'compare' => '<='
						),
						array(
							'key' => 'data_birth',
							'value' => $date27 ->format('Ymd'),
							'compare' => '>='
						))
					);
	$users1827 = get_users($args_years);

	$args_years28 = array(
					'meta_query' => array(
					'relation' 			=> 'AND',
						array(
							'key' => 'user_type',
							'value' => 'club',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date28->format('Ymd'),
								'compare' => '<='
						),
						array(
							'key' => 'data_birth',
							'value' => $date35->format('Ymd'),
							'compare' => '>='
						)
						)
					);


	$users2835 = get_users($args_years28);
	
	$args_years36 = array(
						'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'user_type',
							'value' => 'club',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date36->format('Ymd'),
								'compare' => '<='
						),
						
						array(
							'key' => 'data_birth',
							'value' => $date45->format('Ymd'),
							'compare' => '>='
						),
					));
	$users3645 = get_users($args_years36);

	$args_years46 = array(
	
			'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			array(
					'key' => 'data_birth',
					'value' => $date46->format('Ymd'),
					'compare' => '<='
			),
			
			array(
				'key' => 'data_birth',
				'value' => $date60->format('Ymd'),
				'compare' => '>='
			),
		)
	);
		
	$users4560 = get_users($args_years46);

	$args_years60 = array(
	
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'user_type',
				'value' => 'club',
				'compare' => '='
			),
			
			
			array(
				'key' => 'data_birth',
				'value' => $date60->format('Ymd'),
				'compare' => '<='
			),
		)
	);
	
$users60 = get_users($args_years60);

$users_ages = array(
	
	// '<18: '.count($users18).' чел'=> count($users18),
	'18-27: '.count($users1827).' чел'=> count($users1827),
	'27-35: '.count($users2835).' чел'=> count($users2835),
	'35-45: '.count($users3645).' чел'=> count($users3645),
	'45-60: '.count($users4560).' чел'=> count($users4560),
	// '>60: '.count($users60 ).' чел'=> count($users60 ),
);

echo json_encode($users_ages);
wp_die();
}




add_action( 'wp_ajax_get_analitic_zar', 'get_analitic_zar_callback' );
add_action( 'wp_ajax_nopriv_get_analitic_zar', 'get_analitic_zar_callback' );

function get_analitic_zar_callback(){
								$args = array(
																	
										'meta_query' => array(
										'relation' 			=> 'AND',
										array(
											'key' => 'user_type',
											'value' => 'club',
											'compare' => '='
										),
										array(
												'key' => 'zarabotok',
												'value' => '0',
												'compare' => '>'
												)
											)
										);
								$users_zar = get_users($args);
								
								$arrAllZar=array();
								$arrAllPlan=array();
								foreach($users_zar as $user){
									$id = $user->ID;
									if (have_rows('zarabotok', 'user_'.$id)){
										$arr_zar = get_field('zarabotok', 'user_'.$id);
										
										foreach ($arr_zar as $zar){
											if ($zar['mesyacz']>0){
											if (array_key_exists($zar['mesyacz'], $arrAllZar)){
												$arrAllZar[$zar['mesyacz']] = $arrAllZar[$zar['mesyacz']] + (int)$zar['money_this_month'];
											}

											else{
												$arrAllZar[$zar['mesyacz']] = (int)$zar['money_this_month'];
											}
											$date = date_create_from_format('m.Y', $zar['mesyacz']);
											$interval = new DateInterval('P1M');
											$date->add($interval);

											if (array_key_exists($date->format('m.Y'), $arrAllPlan)){
												$arrAllPlan[$date->format('m.Y')] = $arrAllPlan[$date->format('m.Y')] + (int)$zar['money_next_month'];
											}
											else{
												$arrAllPlan[$date->format('m.Y')] = (int)$zar['money_next_month'];
											}
										}
										}
									}
								}
								$i=0;
								foreach ($arrAllZar as $key=>$value){
									if ($i<1){
										$arrAllPlan = array($key=>0) + $arrAllPlan;
									} 
									$i++;
								}
								$key2 = array_key_last($arrAllPlan);
								// $arrAllZar = $arrAllZar + array($key2=>0);
								ksort($arrAllZar,SORT_NUMERIC  );
								ksort($arrAllPlan,SORT_NUMERIC);
								$result = array (
									'zar' => $arrAllZar,
									'plan' => $arrAllPlan
								);
								
								echo json_encode($result);
								wp_die();
								
							
							}
	




// PKM


add_action( 'wp_ajax_get_city_users_pkm', 'get_city_users_pkm_callback' );
add_action( 'wp_ajax_nopriv_get_city_users_pkm', 'get_city_users_pkm_callback' );

function get_city_users_pkm_callback(){
	$args = array(
		
		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
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
		$city = trim(get_field('city', 'user_'.$user->ID));
		if (array_key_exists($city, $cities)){
			$cities[$city] = $cities[$city] + 1 ;
		}
		else {
			$cities[$city] = 1;
		}
	}
	arsort($cities);
	$slice = array_slice($cities,0,5);
	echo json_encode($slice);
	wp_die();


}









add_action( 'wp_ajax_get_spher_users_pkm', 'get_spher_users_pkm_callback' );
add_action( 'wp_ajax_nopriv_get_spher_users_pkm', 'get_spher_users_pkm_callback' );

function get_spher_users_pkm_callback(){
	$args = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
				 'key' => 'sfera_deyatelnosti',
				 'value' => 'товарка',
				 'compare' => '='
				)
	 		 )
			);
	$args2 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'универсал',
					'compare' => '='
					)
				)
			);
	$args3 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'эксперт',
					'compare' => '='
					)
				)
			);
	$args4 = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
					'key' => 'sfera_deyatelnosti',
					'value' => 'ищу себя',
					'compare' => '='
					)
				)
			);
$users1 = get_users($args);
$users2 = get_users($args2);
$users3 = get_users($args3);
$users4 = get_users($args4);

$result = array(count($users1), count($users2), count($users3), count($users4));

echo json_encode($result);
wp_die();
}





add_action( 'wp_ajax_get_male_users_pkm', 'get_male_users_pkm_callback' );
add_action( 'wp_ajax_nopriv_get_male_users_pkm', 'get_male_users_pkm_callback' );

function get_male_users_pkm_callback(){
	$args = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
				 'key' => 'male',
				 'value' => 'm',
				 'compare' => '='
			)
	  )
			);


	$args_w = array(

		'meta_query' => array(
			'relation' 			=> 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
				 'key' => 'male',
				 'value' => 'w',
				 'compare' => '='
			)
	  )
			);


	$mans = get_users($args);
	$womans = get_users($args_w);

	$result = array(count($mans), count($womans));
	echo json_encode($result);
	wp_die();
}


add_action( 'wp_ajax_get_users_ages_pkm', 'get_users_ages_pkm_callback' );
add_action( 'wp_ajax_nopriv_get_users_ages_pkm', 'get_users_ages_pkm_callback' );

function get_users_ages_pkm_callback(){
	$date18 = new DateTime('-18 years');
	$date27 = new DateTime('-27 years');
	$date28 = new DateTime('-28 years');
	$date35 = new DateTime('-36 years');
	$date36 = new DateTime('-37 years');
	$date45 = new DateTime('-45 years');
	$date46 = new DateTime('-46 years');
	$date60 = new DateTime('-60 years');

	$args_18 = array(
		'meta_query' => array(
		'relation' 			=> 'AND',
		array(
			'key' => 'user_type',
			'value' => 'pkm',
			'compare' => '='
		),
		array(
				'key' => 'data_birth',
				'value' => $date18 -> format('Ymd'),
				'compare' => '>'
		),
		)
	);
	$users18 = get_users($args_18);
	$args_years = array(
						'meta_query' => array(
						'relation' 			=> 'AND',
						array(
							'key' => 'user_type',
							'value' => 'pkm',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date18 -> format('Ymd'),
								'compare' => '<='
						),
						array(
							'key' => 'data_birth',
							'value' => $date27 ->format('Ymd'),
							'compare' => '>='
						))
					);
	$users1827 = get_users($args_years);

	$args_years28 = array(
					'meta_query' => array(
					'relation' 			=> 'AND',
						array(
							'key' => 'user_type',
							'value' => 'pkm',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date28->format('Ymd'),
								'compare' => '<='
						),
						array(
							'key' => 'data_birth',
							'value' => $date35->format('Ymd'),
							'compare' => '>='
						)
						)
					);


	$users2835 = get_users($args_years28);
	
	$args_years36 = array(
						'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'user_type',
							'value' => 'pkm',
							'compare' => '='
						),
						array(
								'key' => 'data_birth',
								'value' => $date36->format('Ymd'),
								'compare' => '<='
						),
						
						array(
							'key' => 'data_birth',
							'value' => $date45->format('Ymd'),
							'compare' => '>='
						),
					));
	$users3645 = get_users($args_years36);

	$args_years46 = array(
	
			'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			array(
					'key' => 'data_birth',
					'value' => $date46->format('Ymd'),
					'compare' => '<='
			),
			
			array(
				'key' => 'data_birth',
				'value' => $date60->format('Ymd'),
				'compare' => '>='
			),
		)
	);
		
	$users4560 = get_users($args_years46);

	$args_years60 = array(
	
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'user_type',
				'value' => 'pkm',
				'compare' => '='
			),
			
			
			array(
				'key' => 'data_birth',
				'value' => $date60->format('Ymd'),
				'compare' => '<='
			),
		)
	);
	
$users60 = get_users($args_years60);

$users_ages = array(
	
	// '<18: '.count($users18).' чел'=> count($users18),
	'18-27: '.count($users1827).' чел'=> count($users1827),
	'27-35: '.count($users2835).' чел'=> count($users2835),
	'35-45: '.count($users3645).' чел'=> count($users3645),
	'45-60: '.count($users4560).' чел'=> count($users4560),
	// '>60: '.count($users60 ).' чел'=> count($users60 ),
);

echo json_encode($users_ages);
wp_die();
}


add_action( 'wp_ajax_get_analitic_zar_pkm', 'get_analitic_zar_pkm_callback' );
add_action( 'wp_ajax_nopriv_get_analitic_zar_pkm', 'get_analitic_zar_pkm_callback' );

function get_analitic_zar_pkm_callback(){
								$args = array(
																	
										'meta_query' => array(
										'relation' 			=> 'AND',
										array(
											'key' => 'user_type',
											'value' => 'pkm',
											'compare' => '='
										),
										array(
												'key' => 'zarabotok',
												'value' => '0',
												'compare' => '>'
												)
											)
										);
								$users_zar = get_users($args);
								
								$arrAllZar=array();
								$arrAllPlan=array();
								foreach($users_zar as $user){
									$id = $user->ID;
									if (have_rows('zarabotok', 'user_'.$id)){
										$arr_zar = get_field('zarabotok', 'user_'.$id);
										
										foreach ($arr_zar as $zar){
											
											if (array_key_exists($zar['mesyacz'], $arrAllZar)){
												$arrAllZar[$zar['mesyacz']] = $arrAllZar[$zar['mesyacz']] + (int)$zar['money_this_month'];
											}

											else{
												$arrAllZar[$zar['mesyacz']] = (int)$zar['money_this_month'];
											}
											$date = date_create_from_format('m.Y', $zar['mesyacz']);
											$interval = new DateInterval('P1M');
											$date->add($interval);

											if (array_key_exists($date->format('m.Y'), $arrAllPlan)){
												$arrAllPlan[$date->format('m.Y')] = $arrAllPlan[$date->format('m.Y')] + (int)$zar['money_next_month'];
											}
											else{
												$arrAllPlan[$date->format('m.Y')] = (int)$zar['money_next_month'];
											}
										}
									}
								}
								$i=0;
								foreach ($arrAllZar as $key=>$value){
									if ($i<1){
										$arrAllPlan = array($key=>0) + $arrAllPlan;
									} 
									$i++;
								}
								$key2 = array_key_last($arrAllPlan);
								$arrAllZar = $arrAllZar + array($key2=>0);
								ksort($arrAllZar,SORT_NUMERIC  );
								ksort($arrAllPlan,SORT_NUMERIC);
								$result = array (
									'zar' => $arrAllZar,
									'plan' => $arrAllPlan
								);
								
								echo json_encode($result);
								wp_die();
								
							
							}
	








?>