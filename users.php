
<?php  
/*  
Template Name: Users Page  
*/

?>

<?php get_header() ?>
<?php 


?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<?php 
				// $users = get_users();
				// foreach($users as $user){
					
				// 	while( have_rows('zarabotok','user_'.$user->ID ) ) {
				// 		the_row();
						
				// 		if( get_sub_field('mesyacz') == '10.2022' ) {
				// 			$row = get_row_index();
				// 			// var_dump($row);
							
				// 			delete_row('zarabotok', $row, 'user_'.$user->ID);
				// 		}
					
				// 	}
				// }				
				
				?>
					<div class="post d-flex flex-column-fluid" id="kt_post">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card header-->
								<div class="card-header border-0 ps-1 pe-1 pt-6 ps-lg-3 pe-lg-3">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Поиск пользователей" />
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
											<!--begin::Filter-->
											
											<!--end::Menu 1-->
											<!--end::Filter-->
											
											<!--begin::Add customer-->
										<button type="button" class="btn btn-flex btn-danger <?php if( !current_user_can('administrator')) { echo 'd-none'; } ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
													</svg>
												</span>
											Добавить пользователя
										</button>
											
											<!--end::Add customer-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										
										<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
											<div class="fw-bolder me-5">
											<span class="me-2 " data-kt-customer-table-select="selected_count"></span>Выбрано</div>
											
											<button type="button" class="btn btn-danger <?php if( !current_user_can('administrator')) { echo 'd-none'; } ?>" data-kt-customer-table-select="delete_selected" <?php if( !current_user_can('administrator')) { echo 'disabled'; } ?>>Удалить выбранное</button>
											<?php ?>
										</div>
									
										<!--end::Group actions-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0 " style='    overflow-x: auto;'>
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
												<th class="w-10px pe-2">
													<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
														<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
													</div>
												</th>
												<th class="min-w-200px">Пользователь</th>
												<th class="text-start min-w-100px">Город</th>
												<th class="text-start min-w-100px">Сфера деятельности</th>
												<th class="text-start min-w-70px">Последний вход</th>
												<th class="text-start min-w-100px">Подтверждены</th>
												<th class="text-end min-w-100px">Дата вступления</th>

												<th class=""></th>
												
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="fw-bold text-gray-600">
											<?php 
											$qv = array();
												if (isset($_GET['search'])){
													$searchword = $_GET['search'];

													if( ! empty( $searchword ) ){

														$parts = explode( ' ', $searchword );

														$qv['orderby']  = 'display_name';
														$qv['order']    = 'ASC';
										
														if( ! empty( $parts ) ){

															$qv['meta_query'] = [];
															$qv['meta_query']['relation'] = 'OR';

															foreach( $parts as $part ){
																$qv['meta_query'][] = array(
																		'key'     => 'first_name',
																		'value'   => $part,
																		'compare' => 'LIKE'
																);
																$qv['meta_query'][] = array(
																		'key'     => 'last_name',
																		'value'   => $part,
																		'compare' => 'LIKE'
																);
																$qv['meta_query'][] = array(
																	'key'     => 'sfera_deyatelnosti',
																	'value'   => $part,
																	'compare' => 'LIKE'
															);
																	$qv['meta_query'][] = array(
																		'key'     => 'city',
																		'value'   => $part,
																		'compare' => 'LIKE'
																);
															}

														}

													};
													$users = get_users($qv);
												}
												if(isset($_GET['sphera']) || isset($_GET['city']) || isset($_GET['age_start']) || isset($_GET['age_end']) || isset($_GET['age_end'])){
													$qv['orderby']  = 'display_name';
													$qv['order']    = 'ASC';
													
													$qv['meta_query'] = [];
													$qv['meta_query']['relation'] = 'AND';
													if (isset($_GET['sphera']) && $_GET['sphera']!='all'){
														$qv['meta_query'][] = array(
															'key'     => 'sfera_deyatelnosti',
															'value'   => $_GET['sphera'],
															'compare' => 'LIKE'
														);
													}
													if (isset($_GET['city'])){
														$qv['meta_query'][] = array(
															'key'     => 'city',
															'value'   => $_GET['city'],
															'compare' => 'LIKE'
														);
													}
													if (isset($_GET['age_start']) && !isset($_GET['age_end'])  ){
														$date = strtotime('-'.$_GET['age_start'].' years');
														$date_start = new DateTime('-'.$_GET['age_start'].' years');
						
														$qv['meta_query'][] = array(
															'key'     => 'data_birth',
															'value'   => $date_start->format('Ymd'),
															'compare' => '<='
														);
													}
													if (isset($_GET['age_end']) && !isset($_GET['age_start'])  ){
														$date = strtotime('-'.$_GET['age_end'].' years');
														$date_end = new DateTime('-'.$_GET['age_end'].' years');
						
														$qv['meta_query'][] = array(
															'key'     => 'data_birth',
															'value'   => $date_end->format('Ymd'),
															'compare' => '>='
														);
													}
													if (isset($_GET['age_end']) && isset($_GET['age_start'])){
														$date_end = new DateTime('-'.$_GET['age_end'].' years');
														$date_start = new DateTime('-'.$_GET['age_start'].' years');
														$qv['meta_query'][] = array(
															'key'     => 'data_birth',
															'value'   => $date_start->format('Ymd'),
															'compare' => '<='
														);
														$qv['meta_query'][] = array(
															'key'     => 'data_birth',
															'value'   => $date_end->format('Ymd'),
															'compare' => '>='
														);
														
													}

													
													$users = get_users($qv);


												}
												else{
													$users = get_users( [
														
													]);}
													
												foreach( $users as $user ){
												$id=$user->ID;
												
											?>
											<tr>
												<!--begin::Checkbox-->
												<td>
													<div class="form-check form-check-sm form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="<?php echo $id?>" />
													</div>
												</td>
												<!--end::Checkbox-->
												<td>
													<div class="d-flex align-items-center">
														<!--begin::Thumbnail-->
														<a href="/author/<?php echo $user->user_nicename ?>" class="symbol symbol-400px">
															<span class="symbol-label rounded-circle" style="background-image:url(<?php echo get_field('photo', 'user_'.$id)==""?"https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y":get_field('photo', 'user_'.$id) ?>);"></span>
														</a>
														<!--end::Thumbnail-->
														<div class="ms-5">
															<!--begin::Title-->
															<a href="/author/<?php echo $user->user_nicename ?>" class="text-gray-400 text-hover-primary fs-5" data-kt-ecommerce-product-filter="product_name"><?php echo $user->last_name .' '. $user->first_name ?></a>
															<a href="https://t.me/<?php echo str_replace('@', '' , get_field('telegram', 'user_'.$id)) ?> " class="text-gray-400 text-hover-primary fs-5 d-flex align-items-center">
																<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M15.3333 7.99999C15.3333 12.0498 12.0498 15.3333 7.99999 15.3333C3.95016 15.3333 0.666656 12.0498 0.666656 7.99999C0.666656 3.95016 3.95016 0.666656 7.99999 0.666656C12.0498 0.666656 15.3333 3.95016 15.3333 7.99999ZM8.26277 6.08049C7.5496 6.37688 6.12388 6.99105 3.98621 7.92238C3.6391 8.06049 3.45699 8.19555 3.44049 8.32755C3.41238 8.55121 3.69227 8.63921 4.07238 8.75838C4.12432 8.77488 4.1781 8.79138 4.2331 8.80971C4.60771 8.93132 5.11127 9.07371 5.37282 9.07921C5.61055 9.0841 5.87577 8.98632 6.16849 8.78588C8.1656 7.43716 9.19655 6.75577 9.26132 6.7411C9.30716 6.73071 9.37071 6.71727 9.41349 6.75577C9.45627 6.79366 9.45199 6.86577 9.44771 6.88532C9.4196 7.00327 8.32327 8.02321 7.75493 8.55121C7.57771 8.7156 7.45243 8.83232 7.42677 8.85921C7.36932 8.91849 7.31066 8.97532 7.25443 9.02971C6.9061 9.3646 6.64577 9.61638 7.2691 10.027C7.56855 10.2244 7.8081 10.3876 8.04705 10.5502C8.30799 10.728 8.56832 10.9052 8.90566 11.1264C8.99121 11.1827 9.0731 11.2407 9.15316 11.2975C9.45688 11.5145 9.73005 11.7088 10.0674 11.6783C10.2629 11.6599 10.4658 11.476 10.5685 10.9266C10.8111 9.62738 11.289 6.81382 11.3996 5.65393C11.4063 5.55763 11.4022 5.46088 11.3874 5.36549C11.3785 5.28845 11.341 5.21756 11.2823 5.16688C11.1949 5.09538 11.0592 5.0801 10.9981 5.08132C10.7225 5.08621 10.2996 5.23349 8.26277 6.08049Z" fill="#BDBDBD"></path>
																</svg>
															<?php get_field('telegram', 'user_'.$id) ?>
															</a>
															<?php echo get_field('data_birth','user_'.$id)?>
															<!--end::Title-->
														</div>
													</div>
												</td>
												<td class="text-start pe-0">
												<span class="text-gray-400 "><?php echo get_field('city', 'user_'.$id) ?> </span>
												</td>
												<td class="text-start pe-0">
												<span class="text-gray-400 "><?php echo mb_ucfirst(get_field('sfera_deyatelnosti', 'user_'.$id)) ?> </span>
												</td>
												
												<td class="text-start pe-0" data-order="45">
												<span class="text-dark ms-3 btn-active-light-primary btn-light btn px-2 py-1  rounded-pill"><?php echo (wpb_lastlogin($id) == 'Никогда')?'Никогда':wpb_lastlogin($id).' назад'  ?> </span>
												</td>
											
												<td class="text-start pe-0">
													<span class=" text-white bg-success py-1 px-2 rounded-pill">Включено</span>
												</td>
												
											
												<!--begin::Status=-->
												<td class="text-end pe-0">
													<!--begin::Badges-->
											<div class="text-gray-400 ">
												<?php echo gmdate( 'd.m.Y H:i', strtotime( get_option( 'gmt_offset' ) . ' hours', strtotime( $user->user_registered ) ) )
												 ?>
										</div>
													<!--end::Badges-->
												</td>
												<td></td>
											</tr>
												<?php } ?>
										
											
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
							<!--begin::Modals-->
							<!--begin::Modal - Customers - Add-->
							<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Form-->
										<form class="form" action="registration" id="kt_modal_add_customer_form" data-kt-redirect="/users">
											<!--begin::Modal header-->
											<div class="modal-header" id="kt_modal_add_customer_header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder">Добавить пользователя</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body py-10 px-lg-17">
												<!--begin::Scroll-->
												<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
												

												<div class="row fv-row mb-7">
							
														<div class="btn-group" role="group" aria-label="" id="reg-user-type">
															<input type="radio" class="btn-check" name="reg-user-type" id="btnradio1" value='club' autocomplete="off" checked>
															<label class="btn btn-primary" for="btnradio1">Участник клуба</label>
														
															<input type="radio" class="btn-check" name="reg-user-type" id="btnradio2" value='pkm' autocomplete="off">
															<label class="btn btn-secondary" for="btnradio2">Участник ПКМ</label>
														
														</div>
												</div>
												<div class="row fv-row mb-7">
													<div class="col-12">
														<span class="text-danger me-2">*</span><span class="text-muted">Обязательные поля для заполнения</span>
													</div>
												</div>
												<div class="row fv-row mb-7">
													<!--begin::Col-->
													<div class="col-xl-12">
														
														<input class="form-control form-control-lg form-control-solid required position-relative" id="first-name" type="text"placeholder="Имя" name="first-name" autocomplete="off" />
													</div>
													<!--end::Col-->
													
												</div>
												<div class="row fv-row mb-7">
													<!--begin::Col-->
													<div class="col-xl-12">
														
														<input class="form-control form-control-lg form-control-solid required position-relative" id="last-name" type="text"placeholder="Фимилия" name="last-name" autocomplete="off" />
													</div>
													<!--end::Col-->
													
												</div>
												<div class="row fv-row mb-7">
													<!--begin::Col-->
													<div class="col-xl-12">
														
														<input class="form-control form-control-lg form-control-solid position-relative" id="father-name" type="text"placeholder="Отчество" name="father-name" autocomplete="off" />
													</div>
													<!--end::Col-->
													
												</div>
												<div class="fv-row mb-7">
													<input class="form-control form-control-lg form-control-solid required" type="email" placeholder="Email" name="email" autocomplete="off" />
												</div>
												<div class="row fv-row mb-7">
												<div class="col-xl-6">
													<input class="form-control form-control-lg form-control-solid required datepicker" type="text" placeholder="Дата рождения" name="date" autocomplete="off" />
													</div>
													<div class="col-xl-6">
														<div class="d-flex align-items-center h-100">
														<div class="form-check me-2">
															<input class="form-check-input" type="radio" value='m' name="gendre" id="flexRadioDefault1"  checked>
															<label class="form-check-label text-muted" for="flexRadioDefault1">
																Мужчина
															</label>
														</div>
														<div class="form-check me-2">
															<input class="form-check-input danger" value='w' type="radio" name="gendre" id="flexRadioDefault2">
															<label class="form-check-label text-muted" for="flexRadioDefault2">
																Женщина
															</label>
														</div>
														</div>
													</div>
												</div>
												<div class="fv-row mb-7">
													<input class="form-control form-control-lg form-control-solid required" id="input_phone" type="phone"
														placeholder="... ... .. .." name="phone" autocomplete="off" />
												</div>
												<div class="row fv-row mb-7">
													<!--begin::Col-->
													<div class="col-xl-6">
														
														<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Телеграм: @" id="iput_telegram"
															name="telegram" autocomplete="off">
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-6">
														
															<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Инстаграм" name="instagram"
																autocomplete="off">
															
															<!--end::Col-->
															</div>
												</div>
												<div class="fv-row mb-7">
													<div class="col-xl-12">
														<input class="form-control form-control-lg form-control-solid required" id="input_city" type="text" placeholder="Город"
															name="city" autocomplete="off" />
													</div>
												</div>
												<div class="fv-row mb-7">
													<div class="col-xl-12 position-relative">
														<select required class="form-control form-control-lg form-control-solid required" placeholder="Сфера деятельности"
															id="sphera" name="sphera" autocomplete="off">
															<option selected disabled hidden value=""></option>
															<option value="товарка">Товарка</option>
															<option value="универсал">Универсал</option>
															<option value="эксперт">Эксперт</option>
															<option value="ищу себя">Ищу себя</option>
														</select>
														<label for="sphera">Сфера деятельности</label>
													</div>
													</div>
													<div class="row fv-row mb-7">
														<!--begin::Col-->
														<div class="col-xl-6">
													
															<input class="form-control form-control-lg form-control-solid" type="text"
																placeholder="Заработок за текущий месяц" name="money_this_month" autocomplete="off">
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-xl-6">
													
															<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Цель на следующий месяц"
																name="money_next_month" autocomplete="off">
													
															<!--end::Col-->
													</div>
												</div>
												<div class="mb-10 fv-row" data-kt-password-meter="true">
													<!--begin::Wrapper-->
													<div class="mb-1">
														<!--begin::Label-->
														
														<!--end::Label-->
														<!--begin::Input wrapper-->
														<div class="position-relative mb-3">
															<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Пароль" name="password" autocomplete="off" />
															<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																<i class="bi bi-eye-slash fs-2"></i>
																<i class="bi bi-eye fs-2 d-none"></i>
															</span>
														</div>
														<!--end::Input wrapper-->
														<!--begin::Meter-->
														<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
															<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
														</div>
														<!--end::Meter-->
													</div>
													<!--end::Wrapper-->
													<!--begin::Hint-->
													<div class="text-muted">
														Используйте 8 или более символов, сочетая буквы, цифры и символы. символы.</div>
													<!--end::Hint-->
												</div>
												<div class="fv-row mb-5">
								
													<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Подтвердите пароль" name="confirm-password" autocomplete="off" />
												</div>









												</div>
												<!--end::Scroll-->
											</div>
											<!--end::Modal body-->
											<!--begin::Modal footer-->
											<div class="modal-footer flex-center">
												<!--begin::Button-->
												<button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Отменить</button>
												<!--end::Button-->
												<!--begin::Button-->
												<button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
													<span class="indicator-label">Отправить</span>
													<span class="indicator-progress">Ожидайте...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>
											<!--end::Modal footer-->
										</form>
										<!--end::Form-->
									</div>
								</div>
							</div>
							<!--end::Modal - Customers - Add-->
							<!--begin::Modal - Adjust Balance-->
							<div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
								<!--begin::Modal dialog-->
								<div class="modal-dialog modal-dialog-centered mw-650px">
									<!--begin::Modal content-->
									<div class="modal-content">
										<!--begin::Modal header-->
										<div class="modal-header">
											<!--begin::Modal title-->
											<h2 class="fw-bolder">Export Customers</h2>
											<!--end::Modal title-->
											<!--begin::Close-->
											<div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
														<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</div>
											<!--end::Close-->
										</div>
										<!--end::Modal header-->
										<!--begin::Modal body-->
										<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
											<!--begin::Form-->
											<form id="kt_customers_export_form" class="form" action="#">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
														<option value="excell">Excel</option>
														<option value="pdf">PDF</option>
														<option value="cvs">CVS</option>
														<option value="zip">ZIP</option>
													</select>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
									
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Отменить</button>
													<button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
														<span class="indicator-label">Отправить</span>
														<span class="indicator-progress">Ожидайтеt...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Modal body-->
									</div>
									<!--end::Modal content-->
								</div>
								<!--end::Modal dialog-->
							</div>
							<!--end::Modal - New Card-->
							<!--end::Modals-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Post-->
				</div>
<? get_footer() ?>