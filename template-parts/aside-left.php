<?php 

$user_info = get_userdata(get_current_user_id());

?>
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<div class="h-25px logo">
							<?php if( has_custom_logo() ): the_custom_logo(); ?>
								<?php else: ?>
								<a class="mb-5"  href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
							<?php endif; ?>
						</div>
				
						<!--end::Logo-->
						<!--begin::Aside toggler-->
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>
					<!--end::Brand-->
						<!--begin::Aside menu-->
						<div class="aside-menu flex-column-fluid">
							<!--begin::Aside Menu-->
							<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
								<!--begin::Menu-->
								<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
								
									<div class="menu-item <?php echo (is_author())?'here':'' ?>">
										<a class="menu-link" href="<?php echo home_url(); ?>/author/<?php echo $user_info->user_nicename ?>">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M9 8.25C9.59334 8.25 10.1734 8.07405 10.6667 7.74441C11.1601 7.41477 11.5446 6.94623 11.7716 6.39805C11.9987 5.84987 12.0581 5.24667 11.9424 4.66473C11.8266 4.08279 11.5409 3.54824 11.1213 3.12868C10.7018 2.70912 10.1672 2.4234 9.58527 2.30765C9.00333 2.19189 8.40013 2.2513 7.85195 2.47836C7.30377 2.70543 6.83524 3.08994 6.50559 3.58329C6.17595 4.07664 6 4.65666 6 5.25C6 6.04565 6.31607 6.80871 6.87868 7.37132C7.44129 7.93393 8.20435 8.25 9 8.25Z" fill="white"/>
														<path d="M13.5 15.75C13.6989 15.75 13.8897 15.671 14.0303 15.5303C14.171 15.3897 14.25 15.1989 14.25 15C14.25 13.6076 13.6969 12.2723 12.7123 11.2877C11.7277 10.3031 10.3924 9.75 9 9.75C7.60761 9.75 6.27226 10.3031 5.28769 11.2877C4.30312 12.2723 3.75 13.6076 3.75 15C3.75 15.1989 3.82902 15.3897 3.96967 15.5303C4.11032 15.671 4.30109 15.75 4.5 15.75H13.5Z" fill="white"/>
														</svg>
														
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Учетная запись</span>
										</a>
									</div>
									
									<div class="menu-item <?php echo (is_page(244))?'here':'' ?>">
										<a class="menu-link" href="<?php echo home_url(); ?>/lenta/">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M9 8.25C9.59334 8.25 10.1734 8.07405 10.6667 7.74441C11.1601 7.41477 11.5446 6.94623 11.7716 6.39805C11.9987 5.84987 12.0581 5.24667 11.9424 4.66473C11.8266 4.08279 11.5409 3.54824 11.1213 3.12868C10.7018 2.70912 10.1672 2.4234 9.58527 2.30765C9.00333 2.19189 8.40013 2.2513 7.85195 2.47836C7.30377 2.70543 6.83524 3.08994 6.50559 3.58329C6.17595 4.07664 6 4.65666 6 5.25C6 6.04565 6.31607 6.80871 6.87868 7.37132C7.44129 7.93393 8.20435 8.25 9 8.25Z" fill="white"/>
														<path d="M13.5 15.75C13.6989 15.75 13.8897 15.671 14.0303 15.5303C14.171 15.3897 14.25 15.1989 14.25 15C14.25 13.6076 13.6969 12.2723 12.7123 11.2877C11.7277 10.3031 10.3924 9.75 9 9.75C7.60761 9.75 6.27226 10.3031 5.28769 11.2877C4.30312 12.2723 3.75 13.6076 3.75 15C3.75 15.1989 3.82902 15.3897 3.96967 15.5303C4.11032 15.671 4.30109 15.75 4.5 15.75H13.5Z" fill="white"/>
														</svg>
														
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Лента</span>
										</a>
									</div>
									
										<div data-kt-menu-trigger="click" class="menu-item  menu-accordion <?php echo (is_page(266) || is_page(241))?'hover show':'' ?>">
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
														<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
														<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Календарь</span>
											<span class="menu-arrow"></span>
										</span>
										<div class="menu-sub menu-sub-accordion menu-active-bg">
											<div class="menu-item <?php echo (is_page(241))?'here':''?>">
												<a class="menu-link" href="<?php echo home_url(); ?>/kalendar-kluba/">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Календарь клуба</span>
												</a>
											</div>
											<div class="menu-item <?php echo (is_page(266))?'here':''?>">
												<a class="menu-link " href="<?php echo home_url(); ?>/kalendar-pkm/">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Календарь ПКМ</span>
												</a>
											</div>
										</div>
										<div class="menu-item <?php echo is_page(252) ? 'here':'' ?>">
											<a class="menu-link" href="<?php echo home_url(); ?>/analitika/">
												<span class="menu-icon">
													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-2">
														<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M10.8749 7.7475H15.8774C16.0425 7.7475 16.2009 7.68191 16.3176 7.56517C16.4344 7.44843 16.4999 7.2901 16.4999 7.125C16.4999 5.63316 15.9073 4.20242 14.8524 3.14752C13.7975 2.09263 12.3668 1.5 10.8749 1.5C10.7098 1.5 10.5515 1.56558 10.4348 1.68233C10.318 1.79907 10.2524 1.9574 10.2524 2.1225V7.125C10.2524 7.2901 10.318 7.44843 10.4348 7.56517C10.5515 7.68191 10.7098 7.7475 10.8749 7.7475Z" fill="#696969"/>
															<path d="M15.8099 9H9.69744C9.60782 9 9.51907 8.98235 9.43626 8.94805C9.35346 8.91375 9.27822 8.86348 9.21484 8.8001C9.15147 8.73672 9.10119 8.66149 9.0669 8.57868C9.0326 8.49588 9.01494 8.40713 9.01494 8.3175V2.19C9.01552 2.09272 8.99552 1.99641 8.95625 1.9074C8.91698 1.81839 8.85934 1.7387 8.7871 1.67354C8.71486 1.60838 8.62965 1.55923 8.53708 1.52933C8.4445 1.49942 8.34665 1.48942 8.24994 1.5C6.84201 1.6495 5.50514 2.19448 4.39395 3.07192C3.28276 3.94935 2.44263 5.1234 1.97072 6.4583C1.49882 7.79319 1.4144 9.2344 1.72725 10.6153C2.04009 11.9961 2.73741 13.2602 3.73857 14.2614C4.73973 15.2625 6.00383 15.9599 7.38469 16.2727C8.76555 16.5855 10.2068 16.5011 11.5416 16.0292C12.8765 15.5573 14.0506 14.7172 14.928 13.606C15.8055 12.4948 16.3504 11.1579 16.4999 9.75C16.5083 9.65447 16.4966 9.55826 16.4657 9.46749C16.4348 9.37672 16.3853 9.2934 16.3204 9.22283C16.2554 9.15226 16.1765 9.096 16.0886 9.05763C16.0007 9.01926 15.9058 8.99964 15.8099 9Z" fill="#4A4A4A"/>
															</svg>
															
															
													</span>
													<!--end::Svg Icon-->
												</span>
												<span class="menu-title">Аналитика</span>
											</a>
										</div>
										<div class="menu-item <?php echo (is_page(223)?'here':'')?>" >
											<a class="menu-link" href="./users/">
												<span class="menu-icon">
													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-2">
														<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M3 6C3.41421 6 3.75 5.66421 3.75 5.25C3.75 4.83579 3.41421 4.5 3 4.5C2.58579 4.5 2.25 4.83579 2.25 5.25C2.25 5.66421 2.58579 6 3 6Z" fill="#4A4A4A"/>
															<path d="M3 9.75C3.41421 9.75 3.75 9.41421 3.75 9C3.75 8.58579 3.41421 8.25 3 8.25C2.58579 8.25 2.25 8.58579 2.25 9C2.25 9.41421 2.58579 9.75 3 9.75Z" fill="#4A4A4A"/>
															<path d="M3 13.5C3.41421 13.5 3.75 13.1642 3.75 12.75C3.75 12.3358 3.41421 12 3 12C2.58579 12 2.25 12.3358 2.25 12.75C2.25 13.1642 2.58579 13.5 3 13.5Z" fill="#4A4A4A"/>
															<path d="M15.045 8.25H5.955C5.56564 8.25 5.25 8.56564 5.25 8.955V9.045C5.25 9.43436 5.56564 9.75 5.955 9.75H15.045C15.4344 9.75 15.75 9.43436 15.75 9.045V8.955C15.75 8.56564 15.4344 8.25 15.045 8.25Z" fill="#696969"/>
															<path d="M15.045 12H5.955C5.56564 12 5.25 12.3156 5.25 12.705V12.795C5.25 13.1844 5.56564 13.5 5.955 13.5H15.045C15.4344 13.5 15.75 13.1844 15.75 12.795V12.705C15.75 12.3156 15.4344 12 15.045 12Z" fill="#696969"/>
															<path d="M15.045 4.5H5.955C5.56564 4.5 5.25 4.81564 5.25 5.205V5.295C5.25 5.68436 5.56564 6 5.955 6H15.045C15.4344 6 15.75 5.68436 15.75 5.295V5.205C15.75 4.81564 15.4344 4.5 15.045 4.5Z" fill="#696969"/>
															</svg>
													</span>
													<!--end::Svg Icon-->
												</span>
												<span class="menu-title">Список пользователей</span>
											</a>
										</div>
                                        										<div class="menu-item <? echo (is_author())?'here':'' ?>">
												<a class="menu-link" href="<?php echo home_url(); ?>/spisok-kursov/">
													<span class="menu-icon">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.5 2.75V2C11.5 1.60218 11.342 1.22064 11.0607 0.93934C10.7794 0.658035 10.3978 0.5 10 0.5H4C3.60218 0.5 3.22064 0.658035 2.93934 0.93934C2.65804 1.22064 2.5 1.60218 2.5 2V2.75C1.90326 2.75 1.33097 2.98705 0.90901 3.40901C0.487053 3.83097 0.25 4.40326 0.25 5V13.25C0.25 13.8467 0.487053 14.419 0.90901 14.841C1.33097 15.2629 1.90326 15.5 2.5 15.5H11.5C12.0967 15.5 12.669 15.2629 13.091 14.841C13.5129 14.419 13.75 13.8467 13.75 13.25V5C13.75 4.40326 13.5129 3.83097 13.091 3.40901C12.669 2.98705 12.0967 2.75 11.5 2.75ZM4 2H10V5H4V2ZM12.25 13.25C12.25 13.4489 12.171 13.6397 12.0303 13.7803C11.8897 13.921 11.6989 14 11.5 14H2.5C2.30109 14 2.11032 13.921 1.96967 13.7803C1.82902 13.6397 1.75 13.4489 1.75 13.25V5C1.75 4.80109 1.82902 4.61032 1.96967 4.46967C2.11032 4.32902 2.30109 4.25 2.5 4.25V5C2.5 5.39782 2.65804 5.77936 2.93934 6.06066C3.22064 6.34196 3.60218 6.5 4 6.5H10C10.3978 6.5 10.7794 6.34196 11.0607 6.06066C11.342 5.77936 11.5 5.39782 11.5 5V4.25C11.6989 4.25 11.8897 4.32902 12.0303 4.46967C12.171 4.61032 12.25 4.80109 12.25 5V13.25Z" fill="#696969"/>
																</svg>
																
														</span>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-title">Список курсов</span>
												</a>
											</div>
											<div class="menu-item <? echo (is_author())?'here':'' ?>">
												<a class="menu-link" href="<?php echo home_url(); ?>/bank-idej/">
													<span class="menu-icon">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.5 2.75V2C11.5 1.60218 11.342 1.22064 11.0607 0.93934C10.7794 0.658035 10.3978 0.5 10 0.5H4C3.60218 0.5 3.22064 0.658035 2.93934 0.93934C2.65804 1.22064 2.5 1.60218 2.5 2V2.75C1.90326 2.75 1.33097 2.98705 0.90901 3.40901C0.487053 3.83097 0.25 4.40326 0.25 5V13.25C0.25 13.8467 0.487053 14.419 0.90901 14.841C1.33097 15.2629 1.90326 15.5 2.5 15.5H11.5C12.0967 15.5 12.669 15.2629 13.091 14.841C13.5129 14.419 13.75 13.8467 13.75 13.25V5C13.75 4.40326 13.5129 3.83097 13.091 3.40901C12.669 2.98705 12.0967 2.75 11.5 2.75ZM4 2H10V5H4V2ZM12.25 13.25C12.25 13.4489 12.171 13.6397 12.0303 13.7803C11.8897 13.921 11.6989 14 11.5 14H2.5C2.30109 14 2.11032 13.921 1.96967 13.7803C1.82902 13.6397 1.75 13.4489 1.75 13.25V5C1.75 4.80109 1.82902 4.61032 1.96967 4.46967C2.11032 4.32902 2.30109 4.25 2.5 4.25V5C2.5 5.39782 2.65804 5.77936 2.93934 6.06066C3.22064 6.34196 3.60218 6.5 4 6.5H10C10.3978 6.5 10.7794 6.34196 11.0607 6.06066C11.342 5.77936 11.5 5.39782 11.5 5V4.25C11.6989 4.25 11.8897 4.32902 12.0303 4.46967C12.171 4.61032 12.25 4.80109 12.25 5V13.25Z" fill="#696969"/>
																</svg>
																
														</span>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-title">Банк идей</span>
												</a>
											</div>
										<?php
										if( is_user_role_in( [ 'administrator','contributor' ] ) ){
										//if( current_user_can( 'administrator', 'contributor' ) ){
										?>

										<div class="menu-item <?php echo (is_page(255)?'here':'')?>">
											<a class="menu-link" href="<?php echo home_url(); ?>/spisok-razreshenij/">
												<span class="menu-icon">
													<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
													<span class="svg-icon svg-icon-2">
														<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M11.5 2.75V2C11.5 1.60218 11.342 1.22064 11.0607 0.93934C10.7794 0.658035 10.3978 0.5 10 0.5H4C3.60218 0.5 3.22064 0.658035 2.93934 0.93934C2.65804 1.22064 2.5 1.60218 2.5 2V2.75C1.90326 2.75 1.33097 2.98705 0.90901 3.40901C0.487053 3.83097 0.25 4.40326 0.25 5V13.25C0.25 13.8467 0.487053 14.419 0.90901 14.841C1.33097 15.2629 1.90326 15.5 2.5 15.5H11.5C12.0967 15.5 12.669 15.2629 13.091 14.841C13.5129 14.419 13.75 13.8467 13.75 13.25V5C13.75 4.40326 13.5129 3.83097 13.091 3.40901C12.669 2.98705 12.0967 2.75 11.5 2.75ZM4 2H10V5H4V2ZM12.25 13.25C12.25 13.4489 12.171 13.6397 12.0303 13.7803C11.8897 13.921 11.6989 14 11.5 14H2.5C2.30109 14 2.11032 13.921 1.96967 13.7803C1.82902 13.6397 1.75 13.4489 1.75 13.25V5C1.75 4.80109 1.82902 4.61032 1.96967 4.46967C2.11032 4.32902 2.30109 4.25 2.5 4.25V5C2.5 5.39782 2.65804 5.77936 2.93934 6.06066C3.22064 6.34196 3.60218 6.5 4 6.5H10C10.3978 6.5 10.7794 6.34196 11.0607 6.06066C11.342 5.77936 11.5 5.39782 11.5 5V4.25C11.6989 4.25 11.8897 4.32902 12.0303 4.46967C12.171 4.61032 12.25 4.80109 12.25 5V13.25Z" fill="#696969"/>
															</svg>
															
													</span>
													<!--end::Svg Icon-->
												</span>
												<span class="menu-title">Список разрешений</span>
											</a>
										</div>
									
											<div class="menu-item <?php echo (is_page(255)?'here':'')?>">
												<a class="menu-link" href="<?php echo home_url(); ?>/lp-become-a-teacher/">
													<span class="menu-icon">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.5 2.75V2C11.5 1.60218 11.342 1.22064 11.0607 0.93934C10.7794 0.658035 10.3978 0.5 10 0.5H4C3.60218 0.5 3.22064 0.658035 2.93934 0.93934C2.65804 1.22064 2.5 1.60218 2.5 2V2.75C1.90326 2.75 1.33097 2.98705 0.90901 3.40901C0.487053 3.83097 0.25 4.40326 0.25 5V13.25C0.25 13.8467 0.487053 14.419 0.90901 14.841C1.33097 15.2629 1.90326 15.5 2.5 15.5H11.5C12.0967 15.5 12.669 15.2629 13.091 14.841C13.5129 14.419 13.75 13.8467 13.75 13.25V5C13.75 4.40326 13.5129 3.83097 13.091 3.40901C12.669 2.98705 12.0967 2.75 11.5 2.75ZM4 2H10V5H4V2ZM12.25 13.25C12.25 13.4489 12.171 13.6397 12.0303 13.7803C11.8897 13.921 11.6989 14 11.5 14H2.5C2.30109 14 2.11032 13.921 1.96967 13.7803C1.82902 13.6397 1.75 13.4489 1.75 13.25V5C1.75 4.80109 1.82902 4.61032 1.96967 4.46967C2.11032 4.32902 2.30109 4.25 2.5 4.25V5C2.5 5.39782 2.65804 5.77936 2.93934 6.06066C3.22064 6.34196 3.60218 6.5 4 6.5H10C10.3978 6.5 10.7794 6.34196 11.0607 6.06066C11.342 5.77936 11.5 5.39782 11.5 5V4.25C11.6989 4.25 11.8897 4.32902 12.0303 4.46967C12.171 4.61032 12.25 4.80109 12.25 5V13.25Z" fill="#696969"/>
																</svg>
																
														</span>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-title">Стать учителем</span>
												</a>
											</div>

											<div class="menu-item <?php echo (is_page(255)?'here':'')?>">
												<a class="menu-link" href="<?php echo home_url(); ?>/lp-profile/">
													<span class="menu-icon">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon svg-icon-2">
															<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.5 2.75V2C11.5 1.60218 11.342 1.22064 11.0607 0.93934C10.7794 0.658035 10.3978 0.5 10 0.5H4C3.60218 0.5 3.22064 0.658035 2.93934 0.93934C2.65804 1.22064 2.5 1.60218 2.5 2V2.75C1.90326 2.75 1.33097 2.98705 0.90901 3.40901C0.487053 3.83097 0.25 4.40326 0.25 5V13.25C0.25 13.8467 0.487053 14.419 0.90901 14.841C1.33097 15.2629 1.90326 15.5 2.5 15.5H11.5C12.0967 15.5 12.669 15.2629 13.091 14.841C13.5129 14.419 13.75 13.8467 13.75 13.25V5C13.75 4.40326 13.5129 3.83097 13.091 3.40901C12.669 2.98705 12.0967 2.75 11.5 2.75ZM4 2H10V5H4V2ZM12.25 13.25C12.25 13.4489 12.171 13.6397 12.0303 13.7803C11.8897 13.921 11.6989 14 11.5 14H2.5C2.30109 14 2.11032 13.921 1.96967 13.7803C1.82902 13.6397 1.75 13.4489 1.75 13.25V5C1.75 4.80109 1.82902 4.61032 1.96967 4.46967C2.11032 4.32902 2.30109 4.25 2.5 4.25V5C2.5 5.39782 2.65804 5.77936 2.93934 6.06066C3.22064 6.34196 3.60218 6.5 4 6.5H10C10.3978 6.5 10.7794 6.34196 11.0607 6.06066C11.342 5.77936 11.5 5.39782 11.5 5V4.25C11.6989 4.25 11.8897 4.32902 12.0303 4.46967C12.171 4.61032 12.25 4.80109 12.25 5V13.25Z" fill="#696969"/>
																</svg>
																
														</span>
														<!--end::Svg Icon-->
													</span>
													<span class="menu-title">Профиль</span>
												</a>
											</div>

											<?php	}?>


									</div>
								
								</div>
							
								
								</div>
								<!--end::Menu-->
							</div>
							<!--end::Aside Menu-->
						</div>
						<!--end::Aside menu-->
				</div>