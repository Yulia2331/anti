<?php
/*
Template Name: шаблон страницы пользователя
*/

$current_user = wp_get_current_user();
$user = get_queried_object();
$user_id = $user->ID;
$currrent_userID =  get_current_user_id();


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
}
?>
<?php get_header();

?>

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid padding-left" id="kt_content">
						
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Navbar-->
								<div class="card mb-6">
									<div class="card-body pt-9 pb-0">
										<!--begin::Details-->
										<div class="d-flex flex-wrap flex-sm-nowrap">
											<!--begin: Pic-->
											<div class="me-7 mb-4">
												
												<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative profile-photo">
													<img src="<?php 
													if (get_field('photo', 'user_'.$user_id)){
														echo get_field('photo', 'user_'.$user_id);
													}
													else{
														echo "https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y";
													}
													?> " alt="image" id="profilePhotoImg" />
													<?php //$online = get_user_meta($user_id, 'login_state', true);
													
													?>
	
													<div class="position-absolute translate-middle bottom-0 start-100 mb-6 <?php echo (is_user_online($user_id))? 'bg-success' : 'bg-danger' ?> rounded-circle border border-4 border-white h-20px w-20px"></div>
													
												</div>
											</div>
											<!--end::Pic-->
											<!--begin::Info-->
											<div class="flex-grow-1">
												<!--begin::Title-->
												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<!--begin::User-->
													<div class="d-flex flex-column">
														<!--begin::Name-->
														<div class="d-flex align-items-center mb-2">
														<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?php echo $user->first_name ?> <?php echo $user->last_name ?> </a>
															<?php
																if(get_field('podtverzhdennyj_profil', 'user_'.$user_id)){?>
															
															<a href="#">
																<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
																<span class="svg-icon svg-icon-1 svg-icon-primary">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</a>
															<?php }?>
														</div>
														<!--end::Name-->
														<!--begin::Info-->
														<div class="d-flex flex-wrap fw-bold fs-6 mb-lg-4 mb-2 pe-2">
															<a href="/users/?city=<?php echo get_field('city', 'user_'.$user_id) ?>" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																<span class="svg-icon svg-icon-4 me-1">
																	<svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path
																			d="M5 14C5 14 10 9.02475 10 5.25C10 3.85761 9.47322 2.52226 8.53553 1.53769C7.59785 0.553123 6.32608 0 5 0C3.67392 0 2.40215 0.553123 1.46447 1.53769C0.526784 2.52226 1.97602e-08 3.85761 0 5.25C0 9.02475 5 14 5 14ZM5 7.875C4.33696 7.875 3.70107 7.59844 3.23223 7.10616C2.76339 6.61387 2.5 5.94619 2.5 5.25C2.5 4.55381 2.76339 3.88613 3.23223 3.39384C3.70107 2.90156 4.33696 2.625 5 2.625C5.66304 2.625 6.29893 2.90156 6.76777 3.39384C7.23661 3.88613 7.5 4.55381 7.5 5.25C7.5 5.94619 7.23661 6.61387 6.76777 7.10616C6.29893 7.59844 5.66304 7.875 5 7.875Z"
																			fill="#BDBDBD" />
																	</svg>
																	
																	</span>
																	<?php echo get_field('city', 'user_'.$user_id) ?> </a>
																	<a href="/users/?sphera=<?=mb_ucfirst(get_field('sfera_deyatelnosti', 'user_'.$user_id)) ?>" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2 ">
																					<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
																		<span class="svg-icon svg-icon-4 me-1">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
																				<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
																			</svg>
																		</span>
																		<!--end::Svg Icon--><?=mb_ucfirst(get_field('sfera_deyatelnosti', 'user_'.$user_id)) ?>
																	</a>
														
															<a href="http://t.me/<?php echo str_replace('@', '' , get_field('telegram', 'user_'.$user_id)) ?>" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
																<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
																<span class="svg-icon svg-icon-4 me-1">
																	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M15.3333 7.99999C15.3333 12.0498 12.0498 15.3333 7.99999 15.3333C3.95016 15.3333 0.666656 12.0498 0.666656 7.99999C0.666656 3.95016 3.95016 0.666656 7.99999 0.666656C12.0498 0.666656 15.3333 3.95016 15.3333 7.99999ZM8.26277 6.08049C7.5496 6.37688 6.12388 6.99105 3.98621 7.92238C3.6391 8.06049 3.45699 8.19555 3.44049 8.32755C3.41238 8.55121 3.69227 8.63921 4.07238 8.75838C4.12432 8.77488 4.1781 8.79138 4.2331 8.80971C4.60771 8.93132 5.11127 9.07371 5.37282 9.07921C5.61055 9.0841 5.87577 8.98632 6.16849 8.78588C8.1656 7.43716 9.19655 6.75577 9.26132 6.7411C9.30716 6.73071 9.37071 6.71727 9.41349 6.75577C9.45627 6.79366 9.45199 6.86577 9.44771 6.88532C9.4196 7.00327 8.32327 8.02321 7.75493 8.55121C7.57771 8.7156 7.45243 8.83232 7.42677 8.85921C7.36932 8.91849 7.31066 8.97532 7.25443 9.02971C6.9061 9.3646 6.64577 9.61638 7.2691 10.027C7.56855 10.2244 7.8081 10.3876 8.04705 10.5502C8.30799 10.728 8.56832 10.9052 8.90566 11.1264C8.99121 11.1827 9.0731 11.2407 9.15316 11.2975C9.45688 11.5145 9.73005 11.7088 10.0674 11.6783C10.2629 11.6599 10.4658 11.476 10.5685 10.9266C10.8111 9.62738 11.289 6.81382 11.3996 5.65393C11.4063 5.55763 11.4022 5.46088 11.3874 5.36549C11.3785 5.28845 11.341 5.21756 11.2823 5.16688C11.1949 5.09538 11.0592 5.0801 10.9981 5.08132C10.7225 5.08621 10.2996 5.23349 8.26277 6.08049Z" fill="#BDBDBD"/>
																		</svg>
																</span>
																<!--end::Svg Icon-->
																<?php echo get_field('telegram', 'user_'.$user_id) ?>
															</a>
															<?php if (get_field('whatsapp', 'user_'.$user_id)){ ?>
															<a href="https://wa.me/<?php echo get_field('whatsapp', 'user_'.$user_id) ?>" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
															<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
														
															<span class="svg-icon svg-icon-4 me-1">
																<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path
																		d="M0.66963 15.3333L1.6611 11.6901C1.0078 10.5702 0.664567 9.29651 0.666697 7.99998C0.666697 3.94979 3.94983 0.666656 8.00002 0.666656C12.0502 0.666656 15.3334 3.94979 15.3334 7.99998C15.3334 12.0502 12.0502 15.3333 8.00002 15.3333C6.70406 15.3354 5.43091 14.9924 4.31136 14.3396L0.66963 15.3333ZM5.35343 4.55919C5.25873 4.56507 5.16619 4.59001 5.08136 4.63252C5.00181 4.67757 4.92919 4.73388 4.86576 4.79972C4.77776 4.88259 4.72789 4.95445 4.67436 5.02412C4.40333 5.37685 4.25754 5.80983 4.26003 6.25465C4.26149 6.61399 4.35536 6.96379 4.50203 7.29085C4.80196 7.95232 5.29549 8.65265 5.94743 9.30165C6.10436 9.45785 6.25763 9.61478 6.42263 9.76072C7.23178 10.4731 8.19601 10.9869 9.23862 11.2611L9.65589 11.3249C9.79156 11.3322 9.92722 11.322 10.0636 11.3154C10.2772 11.3044 10.4857 11.2465 10.6745 11.146C10.7705 11.0965 10.8642 11.0427 10.9554 10.9846C10.9554 10.9846 10.9869 10.9641 11.047 10.9186C11.146 10.8453 11.2069 10.7932 11.289 10.7074C11.3499 10.6444 11.4027 10.5703 11.443 10.486C11.5002 10.3665 11.5574 10.1384 11.5809 9.94845C11.5985 9.80325 11.5934 9.72405 11.5912 9.67492C11.5882 9.59645 11.523 9.51505 11.4518 9.48058L11.025 9.28918C11.025 9.28918 10.387 9.01125 9.99762 8.83378C9.95657 8.81589 9.91257 8.8057 9.86782 8.80372C9.81765 8.79856 9.76695 8.80421 9.71914 8.82027C9.67133 8.83634 9.62751 8.86245 9.59062 8.89685V8.89538C9.58696 8.89538 9.53782 8.93718 9.00762 9.57958C8.97719 9.62047 8.93528 9.65138 8.88721 9.66836C8.83915 9.68534 8.78712 9.68762 8.73776 9.67492C8.68998 9.66214 8.64317 9.64597 8.59769 9.62652C8.50676 9.58838 8.47522 9.57372 8.41289 9.54658L8.40922 9.54512C7.98969 9.36195 7.60126 9.11454 7.25789 8.81178C7.16549 8.73112 7.07969 8.64312 6.99169 8.55805C6.70318 8.28176 6.45175 7.96919 6.24369 7.62818L6.20043 7.55852C6.16935 7.51171 6.14422 7.46121 6.12563 7.40819C6.09776 7.30038 6.17036 7.21385 6.17036 7.21385C6.17036 7.21385 6.34856 7.01878 6.43143 6.91319C6.50042 6.82542 6.5648 6.73412 6.62429 6.63965C6.71083 6.50032 6.73796 6.35732 6.69249 6.24659C6.48716 5.74499 6.27449 5.24559 6.05596 4.74985C6.01269 4.65159 5.88436 4.58119 5.76776 4.56725C5.72816 4.56285 5.68856 4.55845 5.64896 4.55552C5.55048 4.55063 5.45179 4.55161 5.35343 4.55845V4.55919Z"
																		fill="#BDBDBD" />
																	</svg>
																	
															</span>
															<!--end::Svg Icon--><?php echo get_field('whatsapp', 'user_'.$user_id) ?></a>
														<?php } ?>
														</div>
														<!--end::Info-->
													</div>
													<!--end::User-->
													<!--begin::Actions-->
												<?php
												
												
												?>
													<div class="d-flex my-4">
													<?php
													
													if( is_author() && is_user_logged_in() ){
														if(  $current_user->ID == $user_id ){
															$today = getdate();
															$this_month = $today['mon'];
														
															if ($month+1!= $this_month){
															?>
															
																<a href="#" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_new_money">Заполнить доход</a>
															
															<?php
															}
														}
														else{
														?>				

															<?php 
															$pod = FALSE;
															if (have_rows('subscribes', 'user_'.$current_user->ID)){
																$subs = get_field('subscribes', 'user_'.$current_user->ID);

																
																foreach($subs as $sub){
																	if (in_array($user_id,$sub)){
																		
																		$pod = TRUE;
																		break;
																	}
																	
																}
															}
															?>
																	<a href="#" class="btn <?php echo ($pod)?'btn-success ':' btn-danger' ?> me-2" id="kt_user_follow_button" data-queried='<?php echo $user_id?>' >
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
																	<span class="svg-icon svg-icon-3 d-none">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black" />
																			<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	<!--begin::Indicator-->

																	<span class="indicator-label "><?php echo ($pod)?'Подписан':'Подписаться' ?></span>
																	
																	<span class="indicator-progress">Ожидайте...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
																	</span>
																	<!--end::Indicator-->
																</a>
													<?php
														}}
													
													?>
													
											
														
													
													</div>
													<!--end::Actions-->
												</div>
																								<!--begin::Progress-->
													
													<?php 
													if( is_author() && is_user_logged_in() ){
														if(  $current_user->ID == $user_id ){
													
																get_template_part('template-parts/user-profile-progress') ;
														}
													}
													?>
													<!--end::Progress-->
												<!--end::Title-->
												<!--begin::Stats-->
												<div class="d-flex flex-wrap flex-stack mt-4">
													<!--begin::Wrapper-->
													<div class="d-flex flex-column flex-grow-1 pe-8">
														<!--begin::Stats-->
														<div class="d-flex flex-wrap">
															
															
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																	<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
																			<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
																		</svg>
																	</span>
																	<!--end::Svg Icon-->
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?=(int)$money_this_month?> " data-kt-countup-suffix="₽">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
															<div class="fw-bold fs-6 text-gray-400">За <?=$month_name[0] ?></div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3">
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
															
																	<!--end::Svg Icon-->
																<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?=(int)$money_next_month ?>" data-kt-countup-suffix="₽">0
																	</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Цель на <?=$next_month_name[0]?></div>
																<!--end::Label-->
															</div>
															<!--end::Stat-->
															<!--begin::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3 position-relative"
																id='subscribers' data-user='<?php echo get_queried_object()->ID ?>'>
																<!--begin::Number-->
																<div class="d-flex align-items-center">

																<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?php 
																if (have_rows('subscribers', 'user_'.$user_id)){
																	$count=0;
																	foreach(get_field('subscribers', 'user_'.$user_id) as $key=>$value){
																		if($value['id']){
																			$count++;
																		}
																	}
																	echo $count;
																}
																else{
																	echo 0;
																} 
															?>" data-kt-countup-prefix="">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Подписчиков</div>
																<!--end::Label-->
																<div class="position-absolute top-100 bg-white z-index-3 shadow rounded flex-column subs"
																	style='width:288px; height:307px; display: none;'>
																	<div class="subs__search">
																		<!--begin::Input-->
																		<input type="text" class="search-input form-control form-control-flush fw-500 " name="search" id='subscribers_search' value=""
																			placeholder="Поиск..." data-kt-search-element="input" />
																		<!--end::Input-->
																	</div>
																	<div class="mb-5" data-kt-search-element="main">
																		<!--begin::Heading-->
																		<div class="d-flex flex-stack fw-bold mb-4">
																			<!--begin::Label-->
																			<span class="text-muted fs-6 me-2">Подписчики:</span>
																			<!--end::Label-->
																		</div>
																		<!--end::Heading-->
																	<!--begin::Items-->
																	<div class="scroll-y mh-200px mh-lg-200px search_results" id='subscribers_list'>
																			
																			<?php if (get_field('subscribers', 'user_'.$user_id)){
																				$users = array();
																				$i=0;
																				foreach(get_field('subscribers', 'user_'.$user_id) as $key=>$value):
																					if($value['id']){
																					$id = $value['id'];
																					
																					$image = get_field('photo', 'user_'.$id);
																				
																					$user_info = get_userdata($id);
																				?>

																			<!--begin::Item-->
																			<div class="d-flex align-items-center mb-5">
																				<!--begin::Symbol-->
																				<div class="symbol symbol-40px me-4">
																					<span class="symbol-label bg-light ">
																						<!--begin::Svg Icon | path: icons/duotune/electronics/elc004.svg-->
																						<img src="<?php echo $image ?>" alt="">
																						<!--end::Svg Icon-->
																					</span>
																				</div>
																				<!--end::Symbol-->
																				<!--begin::Title-->
																				<div class="d-flex flex-column">
																					<a href="<?=get_author_posts_url($id)?>" class="fs-6 text-gray-800 text-hover-primary fw-bold"><?php echo $user_info->last_name ?> <?php echo $user_info->first_name ?> <?php echo get_field('father_name', 'user_'.$id) ?></a>
																					<div class="d-flex align-items-center">
																						<span class="comment "><?php echo get_field('city', 'user_'.$id)?></span>
																						<span class="comment "><?php echo get_field('sfera_deyatelnosti', 'user_'.$id)?></span>
																					</div>
															
																				</div>
																				<!--end::Title-->
																			</div>
																			<!--end::Item-->
																			<?php
																				$users[$i]['image'] =$image;
																				$users[$i]['url'] = get_author_posts_url($id);
																				$users[$i]['name'] = $user_info->last_name .' '. $user_info->first_name .' '.   get_field('father_name', 'user_'.$id);
																				$users[$i]['city'] = get_field('city', 'user_'.$id);
																				$users[$i]['sphera'] = get_field('sfera_deyatelnosti', 'user_'.$id);
																				$i++;
																					}
																			 endforeach;
																			 ?>
																			 <div id="subscribers_json" class='d-none'>
																				 <?php echo json_encode($users) ;?>
																			 </div>
																			 <?php
																			}
																			else{
																			?>
																			<div class="d-flex align-items-center mb-5">
																				Подписчиков нет
																			</div>
																			<?php
																			}
																			?>
																		
															
																			<!--end::Item-->
																		</div>
																		<!--end::Items-->
																	</div>
																	<div id="subscribers_json" class='d-none'>
																				 <?php echo json_encode($users) ;?>
																			 </div>
															
															
																</div>
															</div>
															<!--end::Stat-->
															<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3 position-relative"
																id='subscriptions' data-user='<?php echo get_queried_object()->ID ?>'>
																<!--begin::Number-->
																<div class="d-flex align-items-center">
															
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?php 
																	if (have_rows('subscribes', 'user_'.$user_id)){
																		$count=0;
																		foreach(get_field('subscribes', 'user_'.$user_id) as $key=>$value){
																			if($value['id']){
																				$count++;
																			}
																		}
																		echo $count;
																		
																	}
																	else{
																		echo 0;
																	}
																	
																	?>" data-kt-countup-prefix="">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Подписок</div>
																<!--end::Label-->
																<div class="position-absolute top-100 bg-white z-index-3 shadow rounded flex-column subs"
																	style='width:288px; height:307px; display: none;'>
																	<div class="subs__search">
																		<!--begin::Input-->
																		<input type="text" class="search-input form-control form-control-flush fw-500 " name="search" id='subscribes_search' value=""
																			placeholder="Поиск..." data-kt-search-element="input" />
																		<!--end::Input-->
																	</div>
																	<div class="mb-5" data-kt-search-element="main">
																		<!--begin::Heading-->
																		<div class="d-flex flex-stack fw-bold mb-4">
																			<!--begin::Label-->
																			<span class="text-muted fs-6 me-2">Вы подписаны:</span>
																			<!--end::Label-->
																		</div>
																		<!--end::Heading-->
																		<!--begin::Items-->
																		<div class="scroll-y mh-200px mh-lg-200px search_results" id='subscribes_list'>
																			
																			<?php if (get_field('subscribes', 'user_'.$user_id)){
																					$users = array();
																					$i=0;
																				foreach(get_field('subscribes', 'user_'.$user_id) as $key=>$value):
																					if($value['id']){
																					$id = $value['id'];
																				
																					$image = get_field('photo', 'user_'.$id);
																			
																					$user_info = get_userdata($id);
																					
																				?>

																			<!--begin::Item-->
																			<div class="d-flex align-items-center mb-5">
																				<!--begin::Symbol-->
																				<div class="symbol symbol-40px me-4">
																					<span class="symbol-label bg-light ">
																						<!--begin::Svg Icon | path: icons/duotune/electronics/elc004.svg-->
																						<img src="<?php echo $image ?>" alt="">
																						<!--end::Svg Icon-->
																					</span>
																				</div>
																				<!--end::Symbol-->
																				<!--begin::Title-->
																				<div class="d-flex flex-column">
																					<a href="<?=get_author_posts_url($id)?>" class="fs-6 text-gray-800 text-hover-primary fw-bold"><?php echo $user_info->last_name ?> <?php echo $user_info->first_name ?> <?php echo get_field('father_name', 'user_'.$id) ?></a>
																					<div class="d-flex align-items-center">
																						<span class="comment "><?php echo get_field('city', 'user_'.$id)?></span>
																						<span class="comment "><?php echo get_field('sfera_deyatelnosti', 'user_'.$id)?></span>
																					</div>
															
																				</div>
																				<!--end::Title-->
																			</div>
																			<!--end::Item-->
																			<?php
																			
																				$users[$i]['image'] =$image;
																				$users[$i]['url'] = get_author_posts_url($id);
																				$users[$i]['name'] = $user_info->last_name .' '. $user_info->first_name .' '.   get_field('father_name', 'user_'.$id);
																				$users[$i]['city'] = get_field('city', 'user_'.$id);
																				$users[$i]['sphera'] = get_field('sfera_deyatelnosti', 'user_'.$id);
																				$i++;
																					}
																			 endforeach;
																			 ?>
																			 
																			 <?php
																			}
																			else{
																			?>
																			<div class="d-flex align-items-center mb-5">
																				Подписок нет
																			</div>
																			<?php
																			}
																			?>
																		
															
																			<!--end::Item-->
																		</div>
																		<!--end::Items-->
																	</div>
																	<div id="subscribes_json" class="d-none">
																			 	<?php echo json_encode($users) ;?>
																			 </div>
															
															
																</div>
																
															</div>
															<!--end::Stat-->
														<!-- вот тут -->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3 position-relative"
																id='my-ideas' data-user='<?php echo get_queried_object()->ID ?>'>
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?php 
																	$idea_query = new WP_Query(  [
																		'author' => $user_id, 
																		'post_type' => 'ideas',
																		] );
																		$count = 0;
																		while ( $idea_query->have_posts() ) {
																			$idea_query->the_post();
																			$count++; // выведем заголовок поста
																			}
																			echo $count;
																	?>" data-kt-countup-prefix="">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Идеи</div>
																<!--end::Label-->
																<!-- тут будет всплывашка окно	 -->
																<div class="position-absolute top-100 bg-white z-index-3 shadow rounded flex-column subs" style="width: 300px; height: 307px; right: 0; display: none;">
																	<div class="subs__search">
																		<!--begin::Input-->
																		<input type="text" class="search-input form-control form-control-flush fw-500 " name="search" id="my-ideas_search" value="" placeholder="Поиск..." data-kt-search-element="input">
																		<!--end::Input-->
																	</div>
																	<div class="mb-5" data-kt-search-element="main">
																		<!--begin::Heading-->
																		<div class="d-flex flex-stack fw-bold mb-4">
																			<!--begin::Label-->
																			<!-- <span class="text-muted fs-6 me-2">Идеи:</span> -->
																			<!--end::Label-->
																		</div>
																		<!--end::Heading-->
																		<!--begin::Items-->
																		<div class="scroll-y mh-200px mh-lg-200px search_results" id="my-ideas_list">
																			
																			
																			<!--begin::Item-->
																			<div class="d-block mb-5">
																				<!--begin::Symbol-->
																				
																			<?	while ( $idea_query->have_posts() ) {
																			$idea_query->the_post(); 
																			$post_id = get_the_id();
																			?>
																			<div class="my-idea__block">
																			<a href="<? the_permalink(); ?>" class="my-idea__title"><? the_title(); ?></a>
																			<span class="text-muted"><?php echo get_the_date(); ?></span>
																			<?  $spc = 0;
																			if( have_rows('subscribers_idea_post') ):
																				while ( have_rows('subscribers_idea_post') ) : the_row();
																					$spc++;
																				endwhile;
																				endif; 
																				?>
																				<span class="text-muted" style="display: block; margin-top: 3px;"><?php echo $spc; ?> подписчик(ов)</span>
																			</div>
																			<?	} 
																			?>
																				
																				<!--end::Title-->
																			</div>
																			<!--end::Item-->

																			<!--end::Item-->
																		</div>
																		<!--end::Items-->
																	</div>
																	
															
																</div>
																<!-- конец подписок на идеи -->
														</div>
														<!--end::Stats-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-lg-6 me-2 mb-3 position-relative"
																id='my-sabscr-ideas' data-user='<?php echo get_queried_object()->ID ?>'>
																<!--begin::Number-->
																<div class="d-flex align-items-center">
																	<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?php 
																	if (have_rows('subscribes_idea', 'user_'.$user_id)){
																		$count=0;
																		foreach(get_field('subscribes_idea', 'user_'.$user_id) as $key=>$value){
																			if($value['id_subscribes_idea']){
																				$count++;
																			}
																		}
																		echo $count;
																		
																	}
																	else{
																		echo 0;
																	}
																	?>" data-kt-countup-prefix="">0</div>
																</div>
																<!--end::Number-->
																<!--begin::Label-->
																<div class="fw-bold fs-6 text-gray-400">Подп. на идеи</div>
																<!--end::Label-->
																<div class="position-absolute top-100 bg-white z-index-3 shadow rounded flex-column subs" style="width: 300px; height: 307px; right: 0; display: none;">
																	<div class="subs__search">
																		<!--begin::Input-->
																		<input type="text" class="search-input form-control form-control-flush fw-500 " name="search" id="my-sabscr-ideas_search" value="" placeholder="Поиск..." data-kt-search-element="input">
																		<!--end::Input-->
																	</div>
																	<div class="mb-5" data-kt-search-element="main">
																		<!--begin::Heading-->
																		<div class="d-flex flex-stack fw-bold mb-4">
																			<!--begin::Label-->
																			<!-- <span class="text-muted fs-6 me-2">Идеи:</span> -->
																			<!--end::Label-->
																		</div>
																		<!--end::Heading-->
																		<!--begin::Items-->
																		<div class="scroll-y mh-200px mh-lg-200px search_results" id="my-sabscr-ideas_list">
																			
																			
																			<!--begin::Item-->
																			<div class="d-block mb-5">
																				<!--begin::Symbol-->
																				
																		<?		
																		
																		if( have_rows('subscribes_idea', 'user_'.$user_id) ):
																			while ( have_rows('subscribes_idea', 'user_'.$user_id) ) : the_row();
																			$idea_id = get_sub_field('id_subscribes_idea', 'user_'.$user_id);
																			$tr = $idea_id[0];
																			$post = get_post($tr);
																			$pd = $post->post_date;
																			$ff = date('d.m.Y', strtotime($pd));
																			?>

																		<div class="my-idea__block">
																		   <a href="<? echo $post->guid; ?>" class="my-idea__title"><? echo $post->post_title; ?></a>
																		   <span class="text-muted"><?php echo $ff; ?></span>
																		   
																		   <?  $spc = 0;
																			if( have_rows('subscribers_idea_post', $tr) ):
																				while ( have_rows('subscribers_idea_post', $tr) ) : the_row();
																					$spc++;
																				endwhile;
																				endif; 
																				?>
																				<span class="text-muted" style="display: block; margin-top: 3px;"><?php echo $spc; ?> подписчик(ов)</span>
																		</div>
																	<?	   endwhile;
																		 endif; 
																		
																			?>
																				
																				<!--end::Title-->
																			</div>
																			<!--end::Item-->

																			<!--end::Item-->
																		</div>
																		<!--end::Items-->
																	</div>
																	
															
																</div>
																<!-- конец подписок на идеи -->
														</div>
													</div>
													<!--end::Wrapper-->

												</div>
												<!--end::Stats-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Details-->
							
									</div>
								</div>
								<!--end::Navbar-->
								<!--begin::Timeline-->
								<div class="card mb-6">
									<!--begin::Card head-->
									<div class="card-header card-header-stretch">
										<!--begin::Title-->
										<div class="card-title w-100 d-flex align-items-center justify-content-between">
										
											<h3 class="fw-bolder m-0 text-gray-800">Подробности профиля</h3>
											<?php	
											if( is_author() && is_user_logged_in() ){
												if(  wp_get_current_user()->ID == get_queried_object()->ID ){?>
											<a href="#" class="btn btn-sm btn-danger me-2">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
												<span class="svg-icon svg-icon-3 d-none">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
														<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
												<!--begin::Indicator-->
														
												<span class="indicator-label " id='change_prod_info'>Изменить профиль</span>
									
												<span class="indicator-progress">Ожидайте...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												<!--end::Indicator-->
											</a>
											<?php 
												}}
											?>
										</div>
										<!--end::Title-->
										
									</div>
									<!--end::Card head-->
									<!--begin::Card body-->
									<?php get_template_part('template-parts/user_info_form') ?>
									<!--end::Card body-->
								</div>
								<!--end::Timeline-->
												
								<?php 
								if( is_author() && is_user_logged_in() ){
												if(  wp_get_current_user()->ID == get_queried_object()->ID ){
													get_template_part('template-parts/new_post_form');
												}
											}
								?>
								<?php get_template_part('template-parts/filter-links') ?>
									<div id="posts-lists">
											<?php
											
												$arr = array(
													'author'        =>  get_queried_object()->ID,
													'posts_per_page' => -1,
													'paged' => $paged,
													'post_status' => 'publish',
													'post_type' => 'user_post',
													'orderby'   => array(
														'date' =>'DESC',
													)
												);
												$query = new wp_query($arr);
								
												if ($query->have_posts()){

											
												while ( $query->have_posts() ) {
													$query->the_post();

													get_template_part('template-parts/user-post');
													// выведем заголовок поста
												}
											}
											else{
												get_template_part('template-parts/no-posts');

											}
										?>
									</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
				
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->


		<!--end::Drawers-->
		<!--end::Main-->

		
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Modals-->


		<!--begin::Modal - New money-->
	
		<div class="modal fade <?=$show?>" id="kt_modal_new_money" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header pb-0 border-0 justify-content-end">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
										transform="rotate(-45 6 17.3137)" fill="black" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
										fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--begin::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body scroll-y mx-5  pt-0 pb-15">
						<!--begin::Heading-->
						<div class="text-center">
							<!--begin::Title-->
							<h1 class="" style='font-weight: 600;	font-size: 19px;line-height: 23px; margin-bottom: 50px;'>Ведите
								новую
								цель</h1>
							<!--end::Title-->
							<!--begin::form-->
							<form action="" id='new_user_money'>
								<div class="form w-100">
									<div class="row fv-row mb-7 ">
										<!--begin::Col-->
										<div class="col-xl-6 ps-0">

											<input class="form-control form-control-lg form-control-solid" type="number"
												placeholder="Заработок за текущий месяц" name="this_month_money" min='0' autocomplete="off">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-6 pe-0">

											<input class="form-control form-control-lg form-control-solid" type="number"
												placeholder="Цель для следующего месяца" name="next_month_money" min='0' autocomplete="off">

											<!--end::Col-->
										</div>
									</div>
									<div class="row fv-row mb-7 ">
										<button class="btn-primary btn" type='submit'>Сохранить и продолжить</button>

									</div>
								</div>
							</form>
							<!--end::form-->
						</div>
						<!--end::Heading-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - new money-->

		<!--end::Modals-->
		<script>
			var textarea = document.querySelector('textarea');
					if(textarea!=null){
						textarea.addEventListener('keyup', function(){
						if(this.scrollTop > 0){
							this.style.height = this.scrollHeight + "px";
						}
						});
				
				}
		
		</script>
<?php get_footer(); ?>