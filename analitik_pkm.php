<?php  
/*  
Template Name: analitic-pkm
*/

?>

<?php get_header() ?>
<?php ?>


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				
					
				<div class="post d-flex flex-column-fluid" id="kt_post">
					<!--begin::Container-->
					<div id="kt_content_container" class="container-xxl">
						<!--begin::Row-->
						<div class="row fv-row mb-7" >
							
							<div class="btn-group" role="group" aria-label="" id="analitic-checker">
								<input type="radio" data-href='/analitika/' class="btn-check" name="analitic-checker" id="btnradio1" value='club' autocomplete="off" >
								<label class="btn btn-secondary" for="btnradio1">Аналитика клуба</label>
							 
								<input type="radio" data-href='/analitika-pkm/' class="btn-check"  id="btnradio2" name="analitic-checker" value='pkm' autocomplete="off" checked>
								<label class="btn btn-primary"  for="btnradio2">Аналитика ПКМ</label>
							 
							 </div>
						</div>
						<div class="row g-5 g-xl-10">
							<!--begin::Col-->
							<div class="col-xxl-8 mb-md-5 mb-xl-10">
								



								<div class="row g-5 g-xl-10">
									<!--begin::Col-->
									<div class="col-md-6 col-xl-6 mb-xxl-10">
										<!--begin::Chart widget 5-->
										<div class="card card-flush h-md-100 mb-10">
											<!--begin::Header-->
											<div class="card-header flex-nowrap pt-5">
												<!--begin::Title-->
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label fw-bolder text-dark">Аналитика по городам</span>
													
												</h3>
												<!--end::Title-->
												<!--begin::Toolbar-->
												<div class="card-toolbar">
													<!--begin::Menu-->
													<button class="btn d-none btn-icon btn-color-primary btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
															Подробнее
														</button>
														<button type="button" class="btn btn-icon btn-color-primary btn-active-color-primary justify-content-end" data-bs-toggle="tooltip" data-bs-html="true" title="Для поиска людей по городу, щелкните по назвнанию города">
															<i class="fa fa-question" aria-hidden="true"></i>
														</button>
											
													<!--end::Menu-->
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-5 ps-6">
												<div id="kt_charts_widget_5_pkm" class="min-h-auto"></div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Chart widget 5-->
									</div>
									<!--end::Col-->
												<!--begin::Col-->
												<div class="col-md-6 col-xl-6 mb-xxl-10">
													<!--begin::Chart widget 5-->
													<div class="card card-flush h-md-100 mb-10">
														<!--begin::Header-->
														<div class="card-header flex-nowrap pt-5">
															<!--begin::Title-->
															<h3 class="card-title align-items-start flex-column">
																<span class="card-label fw-bolder text-dark">По сфере деятельности</span>
																
															</h3>
															<!--end::Title-->
															<!--begin::Toolbar-->
															<div class="card-toolbar">
																<!--begin::Menu-->
															<button class="btn d-none btn-icon btn-color-primary btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
															Подробнее
														</button>
															
																<!--end::Menu-->
															</div>
															<!--end::Toolbar-->
														</div>
														<!--end::Header-->
														<!--begin::Body-->
														<div class="card-body pt-5 ps-6">
															<div id="kt_charts_widget_6_pkm" class="min-h-auto"></div>
														</div>
														<!--end::Body-->
													</div>
													<!--end::Chart widget 5-->
												</div>
												<!--end::Col-->
												<div class="col-md-6 col-xl-6 mb-xxl-10 mt-0">
													<div class="card card-flush h-md-100  mb-10">
														<!--begin::Header-->
														<div class="card-header pt-5">
															<!--begin::Title-->
															<div class="card-title d-flex flex-column">
																<!--begin::Info-->
																<div class="d-flex align-items-center">
																	<!--begin::Amount-->
																	<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">0</span>
																	<!--end::Amount-->
																	<!--begin::Badge-->
																	<span class="badge badge-danger fs-base">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																	<span class="svg-icon svg-icon-5 svg-icon-white ms-n1">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"></rect>
																			<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black"></path>
																		</svg>
																	</span>
																	<!--end::Svg Icon-->0%</span>
																	<!--end::Badge-->
																</div>
																<!--end::Info-->
																<!--begin::Subtitle-->
																<span class="text-gray-400 pt-1 fw-bold fs-6">Заказов в этом месяце</span>
																<!--end::Subtitle-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::Header-->
														<!--begin::Card body-->
														<div class="card-body d-flex align-items-end pt-0">
															<!--begin::Progress-->
															<div class="d-flex align-items-center flex-column mt-3 w-100">
																<div class="d-flex justify-content-between w-100 mt-auto mb-2">
																	<span class="fw-boldest fs-6 text-dark">Цель не выполнена</span>
																	<span class="fw-bolder fs-6 text-gray-400">0%</span>
																</div>
																<div class="h-8px mx-3 w-100 bg-light-success rounded">
																	<div class="bg-success rounded h-8px" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
																</div>
															</div>
															<!--end::Progress-->
														</div>
														<!--end::Card body-->
													</div>
												</div>
												<div class="col-md-6 col-xl-6 mb-xxl-10 mt-0">
													<!--begin::Card widget 4-->
													<div class="card card-flush h-md-100 mb-5 mb-10">
														<!--begin::Header-->
														<div class="card-header pt-5">
															<!--begin::Title-->
															<div class="card-title d-flex flex-column">
																<!--begin::Info-->
																<div class="d-flex align-items-center">
																	<?php 
																	
																	$args = array(
																	
																			'meta_query' => array(
																			'relation' 			=> 'AND',
																			array(
																				'key' => 'user_type',
																				'value' => 'pkm',
																				'compare' => '='
																			),
																			array(
																				'key' => 'data_birth',
																				'value' => '',
																				'compare' => '!='
																			),
																			array(
																					'key' => 'city',
																					'value' => '',
																					'compare' => '!='
																					)
																				)
																			);
																	$all_users = get_users($args);
																	// echo "<pre>";
																	// // print_r($all_users);
																	
																	// foreach ($all_users as $user):
																		
																	// 	echo get_field('data_birth','user_'.$user->ID);
																	// 	echo $user->user_nicename."<br>";
																	// endforeach;
																	// echo "</pre>";
																	?>
																	<!--begin::Amount-->
																	<span class="fs-2hx fw-bolder text-dark me-2 lh-1 ls-n2">
																		<?php echo count($all_users)?> 
																		человек</span>
																	<!--end::Amount-->
																	
																	
																</div>
																<!--end::Info-->
																<!--begin::Subtitle-->
																<span class="text-gray-400 pt-1 fw-bold fs-6">Аналитика по возрасту</span>
																<!--end::Subtitle-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::Header-->
														<!--begin::Card body-->
														
														
														<div class="card-body pt-2 pb-4 d-flex align-items-center">
															<!--begin::Chart-->
															<div class="d-flex flex-center me-5 pt-2 w-100">
																<canvas id="kt_card_widget_4_chart_pkm_custom" style="" data-kt-size="109" data-kt-line="11"></canvas>
															</div>
															<!--end::Chart-->

														</div>
														<!--end::Card body-->
													</div>
													<!--end::Card widget 4-->
												
												</div>

								</div>
								
									<div class="col-xl-12">
										<!--begin::Charts Widget 3-->
										<div class="card card-xl-stretch mb-10">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-row justify-content-between w-100">
													<span class="card-label fw-bolder fs-3 mb-1">Аналитика доходов и планов</span>
													<div class="d-flex align-center">
														<div class="d-flex align-items-center">
															<div class="bullet w-8px h-8px rounded-1 me-3" style='background-color:#43CB92'>
															</div>
															<div class="text-gray-700 flex-grow-1 me-4">Запланировано</div>
														</div>
														<div class="d-flex align-items-center">
															<div class="bullet w-8px h-8px rounded-1 me-3" style='background-color:#7239EA'>
															</div>
															<div class="text-gray-700 flex-grow-1 me-4">Результат</div>
														</div>
													</div>
												</h3>
												<!--begin::Toolbar-->
												<div class="card-toolbar" data-kt-buttons="true">
													
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Chart-->
												<div id="kt_charts_widget_3_chart_pkm" style="height: 350px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Charts Widget 3-->
									</div>
				
							</div>

								<div class="col-xxl-4 mb-md-5 mb-xl-10">
									<div class="row g-5 g-xl-10">
										<div class="col-md-12 col-xl-12">
											<!--begin::Chart widget 5-->
											<div class="card card-flush h-md-100 mb-10">
												<!--begin::Header-->
												<div class="card-header flex-nowrap pt-5">
													<!--begin::Title-->
													<h3 class="card-title align-items-start flex-column">
														<span class="card-label fw-bolder text-dark">По полу</span>
													</h3>
													<!--end::Title-->
													<!--begin::Toolbar-->
													<div class="card-toolbar">
														<!--begin::Menu-->
														<button class="btn d-none btn-icon btn-color-primary btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
															Подробнее
														</button>
													
														<!--end::Menu-->
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="card-body pt-5 ps-6">
													<div id="kt_charts_widget_4_pkm" class="min-h-auto"></div>
												</div>
												<!--end::Body-->
											</div>
											<!--end::Chart widget 5-->
										</div>
										<div class="col-md-12 col-xl-12 mb-xxl-10">
											<!--begin::Card widget 5-->
											<?php 
												get_template_part('/template-parts/user_earnings_pkm');
											?>
											<!--end::Card widget 5-->
											<?php 
												get_template_part('/template-parts/new-clients-month-pkm');
											?>
										</div>
									</div>
								</div>
							
									<!--end::Col-->
					
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row g-5 g-xl-10 g-xl-10">
							
					
						</div>
						
					</div>
					<!--end::Container-->
				</div>
				<!--end::Post-->
			</div>



<? get_footer() ?>