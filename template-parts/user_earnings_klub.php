<?
$args = array(
	'role__not_in' => 'administrator',
	'relation' 			=> 'AND',
	'meta_query' => array(
		array(
			 'key' => 'zarabotok',
			 'value' => 0,
			 'compare' => '>'
		),
		array(
			'key' => 'user_type',
			'value' => 'club',
			'compare' => '='
		)
  )
);
$today = getdate();
$users = get_users($args);
$earning = 0;
$earning_last = 0;
$goal = 0;
$last_month = date('m.Y', strtotime("-1 month"));
foreach ($users as $user):
	if (have_rows('zarabotok', 'user_'.$user->ID)){
			$arrZarabotok = get_field('zarabotok', 'user_'.$user->ID);
			// var_dump($arrZarabotok);
			foreach ($arrZarabotok as $monthZarab){
				if ($monthZarab["mesyacz"] == $last_month){
					if (is_int((int)$monthZarab['money_this_month'])){
						$earning += (int)$monthZarab['money_this_month'];
					}	
				}
				if ($monthZarab["mesyacz"] == $last_month){
					if (is_int((int)$monthZarab['money_this_month'])){
					$earning_last += (int)$monthZarab['money_this_month'];
					$goal += (int)$monthZarab['money_next_month'];
					}
				}
				
			}
	}
endforeach;


?> 
	
	<!--begin::Card widget 5-->
	<div class="card card-flush h-md-50 mb-xl-10">
												<!--begin::Header-->
												<div class="card-header pt-5">
													<!--begin::Title-->
													<div class="card-title d-flex flex-column">
														<!--begin::Info-->
														<div class="d-flex align-items-center">
															<!--begin::Amount-->
															<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2"><?php echo number_format($earning)?></span>
															<!--end::Amount-->
															<!--begin::Badge-->
															<span class="badge badge-<?php echo ($earning>$last_month)? 'success':'danger'  ?> fs-base">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
															<span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
																<?php if($earning>=$last_month){ ?>
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black"></rect>
																	<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black"></path>
																</svg>
																<?php } 
																else {
																?>
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
																			<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black"></path>
																</svg>
																<?php }?>
															</span>
															<!--end::Svg Icon--><?php echo round(($earning/$last_month) * 100,1) ?>%</span>
															<!--end::Badge-->
														</div>
														<!--end::Info-->
														<!--begin::Subtitle-->
														<span class="text-gray-400 pt-1 fw-bold fs-6">Рублей заработано всеми участниками в этом
															месяце</span>
														<!--end::Subtitle-->
													</div>
													<!--end::Title-->
												</div>
												<!--end::Header-->
												<!--begin::Card body-->
												<!-- <div class="card-body d-flex align-items-end pt-0">
													
													<div class="d-flex align-items-center flex-column mt-3 w-100">
														
													<?php if ($goal>$earning||$goal==0){?>
														<div class="d-flex justify-content-between w-100 mt-auto mb-2">
														<span class="fw-boldest fs-6 text-dark">Цель не выполнена</span>
														<?php 
														if($goal!=0){
														$pecent = round(($earning/$goal) * 100,1)  ;
														}
														?>
															<span class="fw-bolder fs-6 text-gray-400"><?php echo $pecent?>%</span>
														</div>
														<div class="h-8px mx-3 w-100 bg-light-danger rounded">
															<div class="bg-danger rounded h-8px" role="progressbar" style="width: <?php echo (int)$pecent ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													<?php }
														else{
															?>
															
															
															
														<div class="d-flex justify-content-between w-100 mt-auto mb-2">
															<?php if ($goal>0){?>
															<span class="fw-boldest fs-6 text-dark">На <?php echo number_format($earning - $goal) ?> перевыполнена цель</span>
															<?php $pecent = round(($earning/$goal) * 100,1)  ?>
															<span class="fw-bolder fs-6 text-gray-400"><?php echo $pecent?>%</span>
															<?php }?>
														</div>
														<div class="h-8px mx-3 w-100 bg-light-success rounded">
															<div class="bg-success rounded h-8px" role="progressbar" style="width: <?php echo $pecent>=100?"100":(int)$pecent ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
															
															
															
															<?php
														}
													?>
													</div>
												
												</div> -->
												<!--end::Card body-->
											</div>
											<!--end::Card widget 5-->