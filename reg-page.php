<?php
/*
Template Name: регистрация
*/
?>
<?php 
if(is_user_logged_in()){
	wp_redirect( '/' );
}

?>

<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="ru">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<? wp_head() ?>
		<style>
			.form-check-input:checked{
				background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23F1416C'/%3e%3c/svg%3e")!important;
}
.form-check-input:checked {
    background-color: #fff;
    border-color: #00000040!important;
}
.iti{
	width: 100%;
}
			
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background: #E5E5E5">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-2 pb-lg-20">
					
					<!--begin::Wrapper-->
					<div class="w-auto w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" data-kt-redirect-url='/' novalidate="novalidate" id="kt_sign_up_form">
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
							
								<h1 class="text-dark mb-3">Регистрация</h1>
								<!--end::Title-->
								<!--begin::Link-->
								
							</div>
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
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									
									<input class="form-control form-control-lg form-control-solid required position-relative textonly" id="first-name" type="text"placeholder="Имя" name="first-name" autocomplete="off" />
								</div>
								<!--end::Col-->
								
							</div>
							<!--end::Input group-->
								<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									
									<input class="form-control form-control-lg form-control-solid required position-relative textonly" id="last-name" type="text"placeholder="Фамилия" name="last-name" autocomplete="off" />
								</div>
								<!--end::Col-->
								
							</div>
							<!--end::Input group-->
								<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-12">
									
									<input class="form-control form-control-lg form-control-solid position-relative textonly" id="father-name" type="text"placeholder="Отчество" name="father-name" autocomplete="off" />
								</div>
								<!--end::Col-->
								
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
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
								
										<input class="form-control form-control-lg form-control-solid money_input" type="text"
											placeholder="Заработок за текущий месяц" name="money_this_month" autocomplete="off">
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-6">
								
										<input class="form-control form-control-lg form-control-solid money_input" type="text" placeholder="Цель на следующий месяц"
											name="money_next_month" autocomplete="off">
								
										<!--end::Col-->
								</div>
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
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
									Используйте 8 или более символов, сочетая буквы, цифры и символы.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="Подтвердите пароль" name="confirm-password" autocomplete="off" />
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<label class="form-check form-check-custom form-check-solid form-check-inline">
									<input class="form-check-input" type="checkbox" name="toc" value="1" />
									<span class="form-check-label fw-bold text-gray-700 fs-6">Согласен
									<a href="/politika-konfideniczialnosti/" class="ms-1 link-primary">Политика конфиденциальности</a>.</span>
								</label>
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-danger w-100">
									<span class="indicator-label">Регистрация</span>
									<span class="indicator-progress">Ожидайте...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<div class="text-center mt-2">
								<a href='/auth' type="button"  class="btn btn-lg btn-success w-100">
									Есть аккаунт?
					
								</a>
							</div>

							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		
	
		
	</body>
<?php wp_footer(); ?>

	<!--end::Body-->
</html>