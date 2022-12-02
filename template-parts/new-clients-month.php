<?php
$today = getdate();
$args = array(
	'role__not_in' => 'administrator',
	'date_query' =>array( array( 'year' => $today['year'], 'month' => $today['mon'] ))
);
$users = get_users($args);
$args_today = array(
	'role__not_in' => 'administrator',
	'date_query' =>array( array( 'year' => $today['year'], 'month' => $today['mon'], 'day' => $today['mday'] )),
);
$today_users = get_users($args_today);
?> 
	
	
	<!--begin::Card widget 7-->
	<div class="card card-flush h-md-50 mb-xl-10">
														<!--begin::Header-->
														<div class="card-header pt-5">
															<!--begin::Title-->
															<div class="card-title d-flex flex-column">
																<!--begin::Amount-->
																<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2"><?php echo (count($users)>1000) ? bcdiv(count($users), '1000', 1).'k' : count($users)   ?></span>
																<!--end::Amount-->
																<!--begin::Subtitle-->
																<span class="text-gray-400 pt-1 fw-bold fs-6">Новых зарегистрированных пользователей в этом месяце</span>
																<!--end::Subtitle-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::Header-->
														<!--begin::Card body-->
														<?php if (count($today_users)>0){ ?>
														<div class="card-body d-flex flex-column justify-content-end pe-0">
															<!--begin::Title-->
															<span class="fs-6 fw-boldest text-gray-800 d-block mb-2">Присоединились сегодня</span>
															<!--end::Title-->
															<!--begin::Users group-->
															<div class="symbol-group symbol-hover flex-nowrap">
																<?php 
																$i=0;
																foreach ($today_users as $user):
																	if ($i<=6 ){
																	$id = $user->ID;
																	$colors = array('primary','warning', 'success', 'info');
																	
																	?>
																	<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="<?php echo $user->last_name .' '.$user->first_name?>">
																	<?php if( get_field('photo', 'user_'.$id)){?>
																			<img alt="<?php echo $user->last_name .' '.$user->first_name?>" src="<?php echo get_field('photo', 'user_'.$id) ?>" alt="<?php echo $user->last_name .' '.$user->first_name?>"/>
																		<?php }
																		else{
																			$color = array_rand($colors, 1);
																		?>
																		<span class="symbol-label bg-<?php echo $colors[$color] ?> text-inverse-<?php echo  $colors[$color]?> fw-bolder"><?php $name = $user->first_name; echo mb_substr($name, 0, 1)?></span>
																		<?php } ?>
																	</div>
																<?php 
															$i++; }
															endforeach; ?>
																<?php 
																$ostatok = count($today_users);?>
																
																<div href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" >
																	<span class="symbol-label bg-light text-gray-400 fs-8 fw-bolder">+<?php echo $ostatok ?></span>
																</div>
															
															</div>
															<!--end::Users group-->
														</div>
														<?php } ?>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 7-->