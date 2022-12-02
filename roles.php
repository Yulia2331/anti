<?php  
/*  
Template Name: roles
*/

?>


<?php get_header() ?>

	<?php 
		if( current_user_can( 'administrator' ) ){

	?>
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

		<!--begin::Post-->
		<div class="post d-flex flex-column-fluid" id="kt_post">
			<!--begin::Container-->
			<div id="kt_content_container" class="container-xxl">
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-lg-row">
					<!--begin::Sidebar-->
					<div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
						<!--begin::Card-->

						
						<?php 
						
						if (isset($_GET['role']) && $_GET['role'] == 'administrator'){
							$argc = array(
								'role__in'     => array('administrator'),
							);
							?>
									<div class="card card-flush">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2 class="mb-0">Администратор</h2>
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Permissions-->
								<div class="d-flex flex-column text-gray-600">
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>Создание/удаление пользователей</div>
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>Редактирование информации пользователей</div>
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>Создание постов от имени администатора</div>
									<div class="d-flex align-items-center py-2">
									
									
									
									</div>
								</div>
								<!--end::Permissions-->
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer pt-0 d-none">
								<button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Редактировать роль</button>
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
					
						<!--begin::Modal-->
						<!--begin::Modal - Update role-->
						<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-750px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Редактировать роль</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
									<div class="modal-body scroll-y mx-5 my-7">
										<!--begin::Form-->
										<form id="kt_modal_update_role_form" class="form" action="#">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bolder form-label mb-2">
														<span class="required">Название</span>
													</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Разработчик" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Permissions-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="fs-5 fw-bolder form-label mb-2">Разрешения роли</label>
													<!--end::Label-->
													<!--begin::Table wrapper-->
													<div class="table-responsive">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 gy-5">
															<!--begin::Table body-->
															<tbody class="text-gray-600 fw-bold">
																<!--begin::Table row-->
																<tr>
																	<td class="text-gray-800">Доступ администратора
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Открывает полный доступ к системе"></i></td>
																	<td>
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-sm form-check-custom form-check-solid me-9">
																			<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
																			<span class="form-check-label" for="kt_roles_select_all">Выбрать все</span>
																		</label>
																		<!--end::Checkbox-->
																	</td>
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление пользователями</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление контентом</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Финансовое управление</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Отчетность</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Оплата</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_create" />
																				<span class="form-check-label">Созданиe</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление спорами</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">API-контроли
																	</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Database Management</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">
																		Управление репозиторием</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
													<!--end::Table wrapper-->
												</div>
												<!--end::Permissions-->
											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Отменить</button>
												<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
													<span class="indicator-label">Применить</span>
													<span class="indicator-progress">Ожидайте...
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
						<!--end::Modal - Update role-->
						<!--end::Modal-->
						<?php }
						else{
							$argc = array(
								'role__not_in'     => array('administrator'),
							)
						?>
						<div class="card card-flush">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2 class="mb-0">Пользователь</h2>
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Permissions-->
								<div class="d-flex flex-column text-gray-600">
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>Редактирование информации о себе</div>
									<div class="d-flex align-items-center py-2">
									<span class="bullet bg-primary me-3"></span>Создание постов от своего имени</div>
									<div class="d-flex align-items-center py-2">
									
									
									
									</div>
								</div>
								<!--end::Permissions-->
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer pt-0 d-none">
								<button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Редактировать роль</button>
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
					
						<!--begin::Modal-->
						<!--begin::Modal - Update role-->
						<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-750px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Редактировать роль</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
									<div class="modal-body scroll-y mx-5 my-7">
										<!--begin::Form-->
										<form id="kt_modal_update_role_form" class="form" action="#">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bolder form-label mb-2">
														<span class="required">Название</span>
													</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid" placeholder="Enter a role name" name="role_name" value="Разработчик" />
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Permissions-->
												<div class="fv-row">
													<!--begin::Label-->
													<label class="fs-5 fw-bolder form-label mb-2">Разрешения роли</label>
													<!--end::Label-->
													<!--begin::Table wrapper-->
													<div class="table-responsive">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 gy-5">
															<!--begin::Table body-->
															<tbody class="text-gray-600 fw-bold">
																<!--begin::Table row-->
																<tr>
																	<td class="text-gray-800">Доступ администратора
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Открывает полный доступ к системе"></i></td>
																	<td>
																		<!--begin::Checkbox-->
																		<label class="form-check form-check-sm form-check-custom form-check-solid me-9">
																			<input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
																			<span class="form-check-label" for="kt_roles_select_all">Выбрать все</span>
																		</label>
																		<!--end::Checkbox-->
																	</td>
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление пользователями</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="user_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление контентом</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="content_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Финансовое управление</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Отчетность</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="reporting_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Оплата</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="payroll_create" />
																				<span class="form-check-label">Созданиe</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Управление спорами</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">API-контроли
																	</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">Database Management</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="database_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Label-->
																	<td class="text-gray-800">
																		Управление репозиторием</td>
																	<!--end::Label-->
																	<!--begin::Input group-->
																	<td>
																		<!--begin::Wrapper-->
																		<div class="d-flex">
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
																				<span class="form-check-label">Чтение</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
																				<span class="form-check-label">Запись</span>
																			</label>
																			<!--end::Checkbox-->
																			<!--begin::Checkbox-->
																			<label class="form-check form-check-custom form-check-solid">
																				<input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
																				<span class="form-check-label">Создание</span>
																			</label>
																			<!--end::Checkbox-->
																		</div>
																		<!--end::Wrapper-->
																	</td>
																	<!--end::Input group-->
																</tr>
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
													<!--end::Table wrapper-->
												</div>
												<!--end::Permissions-->
											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Отменить</button>
												<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
													<span class="indicator-label">Применить</span>
													<span class="indicator-progress">Ожидайте...
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
						<!--end::Modal - Update role-->
						<!--end::Modal-->
						<?php } ?>
					</div>
					<!--end::Sidebar-->
					<!--begin::Content-->
					<?php 
						$users = get_users($argc);
						
					?>
					<div class="flex-lg-row-fluid ms-lg-10">
						<!--begin::Card-->
						<div class="card card-flush mb-6 mb-xl-9">
							<!--begin::Card header-->
							<div class="card-header pt-5">
								<!--begin::Card title-->
								<div class="card-title">
									<h2 class="d-flex align-items-center">Назначенные пользователи
									<span class="text-gray-600 fs-6 ms-1">(<?php echo count($users) ?>)</span></h2>
								</div>
								<!--end::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Search-->
									<div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
										<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
										<span class="svg-icon svg-icon-1 position-absolute ms-6">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
												<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Поиск пользователей" />
									</div>
									<!--end::Search-->
									<!--begin::Group actions-->
									<div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
										<div class="fw-bolder me-5">
										<span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Выбрано</div>
										<button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">Удалить выбранные</button>
									</div>
									<!--end::Group actions-->
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
									<!--begin::Table head-->
									<thead>
										<!--begin::Table row-->
										<tr class="text-start fw-bold text-dark fs-7 text-uppercase gs-0">
											<th class="w-10px pe-2">
												<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
													<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_roles_view_table .form-check-input" value="1" />
												</div>
											</th>
											<th class="min-w-50px">ID</th>
											<th class="min-w-150px">Пользователь</th>
											<th class="min-w-125px">Дата вступления</th>
											<th class="text-end min-w-100px">Действия</th>
										</tr>
										<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="fw-bold text-gray-600 ">
										<?php 
											foreach ($users as $user){
												$id = $user->ID;
										?>
										<tr>
											<!--begin::Checkbox-->
											<td>
												<div class="form-check form-check-sm form-check-custom form-check-solid">
													<input class="form-check-input" type="checkbox" value="<?php echo $id?>" />
												</div>
											</td>
											<!--end::Checkbox-->
											<!--begin::ID-->
											<td class='text-gray-400 text-hover-primary fs-5'><?php echo $id?></td>
											<!--begin::ID-->
											<td>
												<div class="d-flex align-items-center">
													<!--begin::Thumbnail-->
													<a href="/author/<?php echo $user->user_nicename?>" class="symbol symbol-400px">
														<span class="symbol-label rounded-circle" style="background-image:url(<?php echo get_field('photo', 'user_'.$id)?>);"></span>
													</a>
													<!--end::Thumbnail-->
													<div class="ms-5">
														<!--begin::Title-->
														<a href="/author/<?php echo $user->user_nicename?>" class="text-gray-400 text-hover-primary fs-5 author_name" data-kt-ecommerce-product-filter="product_name" ><?php echo $user->last_name.' '.$user->first_name?></a>
														<a href="http://t.me/<?php echo str_replace('@', '' , get_field('telegram', 'user_'.$id)) ?>" class="text-gray-400 text-hover-primary fs-5 d-flex align-items-center">
															<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd" clip-rule="evenodd" d="M15.3333 7.99999C15.3333 12.0498 12.0498 15.3333 7.99999 15.3333C3.95016 15.3333 0.666656 12.0498 0.666656 7.99999C0.666656 3.95016 3.95016 0.666656 7.99999 0.666656C12.0498 0.666656 15.3333 3.95016 15.3333 7.99999ZM8.26277 6.08049C7.5496 6.37688 6.12388 6.99105 3.98621 7.92238C3.6391 8.06049 3.45699 8.19555 3.44049 8.32755C3.41238 8.55121 3.69227 8.63921 4.07238 8.75838C4.12432 8.77488 4.1781 8.79138 4.2331 8.80971C4.60771 8.93132 5.11127 9.07371 5.37282 9.07921C5.61055 9.0841 5.87577 8.98632 6.16849 8.78588C8.1656 7.43716 9.19655 6.75577 9.26132 6.7411C9.30716 6.73071 9.37071 6.71727 9.41349 6.75577C9.45627 6.79366 9.45199 6.86577 9.44771 6.88532C9.4196 7.00327 8.32327 8.02321 7.75493 8.55121C7.57771 8.7156 7.45243 8.83232 7.42677 8.85921C7.36932 8.91849 7.31066 8.97532 7.25443 9.02971C6.9061 9.3646 6.64577 9.61638 7.2691 10.027C7.56855 10.2244 7.8081 10.3876 8.04705 10.5502C8.30799 10.728 8.56832 10.9052 8.90566 11.1264C8.99121 11.1827 9.0731 11.2407 9.15316 11.2975C9.45688 11.5145 9.73005 11.7088 10.0674 11.6783C10.2629 11.6599 10.4658 11.476 10.5685 10.9266C10.8111 9.62738 11.289 6.81382 11.3996 5.65393C11.4063 5.55763 11.4022 5.46088 11.3874 5.36549C11.3785 5.28845 11.341 5.21756 11.2823 5.16688C11.1949 5.09538 11.0592 5.0801 10.9981 5.08132C10.7225 5.08621 10.2996 5.23349 8.26277 6.08049Z" fill="#BDBDBD"></path>
															</svg>
															<?php echo get_field('telegram', 'user_'.$id) ?>
														</a>
														<!--end::Title-->
													</div>
												</div>
											</td>
											<!--begin::Joined date=-->
											<td class='text-gray-400 text-hover-primary fs-5'><?php echo gmdate( 'd.m.Y H:i', strtotime( get_option( 'gmt_offset' ) . ' hours', strtotime( $user->user_registered ) ) )
												 ?></td>
											<!--end::Joined date=-->
											<!--begin::Action=-->
											<td class="text-end">
												<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Дествия
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="/author/<?php echo $user->user_nicename?>" class="menu-link px-3">Просмотр</a>
													</div>
													<?php if (isset($_GET['role']) && $_GET['role']=='administrator'){?>
														<?php if ($id!=1){?>
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3 make_user" data-id='<?php echo $id ?>'>В пользователи</a>
													</div>
													<?php }}
													else{?>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3 make_admin" data-id='<?php echo $id ?>'>В админы</a>
														</div>
												<?php }
													?>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<?php if ($id!=1){?>
													<div class="menu-item px-3">
														<a href="#"  class="menu-link px-3" data-kt-roles-table-filter="delete_row">Удалить</a>
													</div>
													<?php } ?>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
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
					</div>
					<!--end::Content-->
				</div>
				<!--end::Layout-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Post-->
	</div>
	<!--end::Content-->
<?php }
else{
	?> 
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">
		<!--begin::Layout-->
		<div class="d-flex flex-column flex-lg-row">
			<!--begin::Sidebar-->
			<div class="flex-column flex-lg-row-auto w-100  mb-1">
				<div class="flex-lg-row-fluid ms-lg-12">
					<div class="card-flush card">
					<div class="card-header pt-5 pb-5">
								<div class="card-title">
									<h2 class="d-flex align-items-center text-center">У вас недостаточно прав для просмотра
									
								</div>
					</div>
					</div>
				</div>	
		</div>
		</div>
	</div>
</div>
	<?php
}
?>

<?php get_footer() ?>