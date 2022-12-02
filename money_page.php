<?php
/*
Template Name: шаблон страницы денег
*/
?>


<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<? wp_head() ?>
		<style>
			.mt-90{
				margin-top: 90px;
			}
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background: #E8E8E8">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-700px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<div class="modal-body scroll-y mx-5  pt-0">
						<!--begin::Heading-->
						<div class="text-center">
							<!--begin::Title-->
							<h1 class="" style='font-weight: 600;	font-size: 19px;line-height: 23px; margin-bottom: 25px;'>Введите
								новую
								цель</h1>
								<div class="text-center mb-5">
								В связи с правилами платформы, вам запрещен доступ к функционалу сайта, пока вы не введёте данные о доходах за прошлый месяц и не поставите цель на текущий
								</div>
							<!--end::Title-->
							<!--begin::form-->
							<form action="" class='needs-validation' id='new_user_money'>
								<div class="form w-100" >
									<div class="row fv-row mb-4 ">
										<!--begin::Col-->
										<div class="col-xl-6 ps-0">

											<input class="form-control form-control-lg form-control-solid money_input" required type="text"
												placeholder="Заработок за текущий месяц" name="this_month_money" min='0' autocomplete="off">
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-xl-6 pe-0">

											<input class="form-control form-control-lg form-control-solid money_input" required type="text"
												placeholder="Цель для следующего месяца" name="next_month_money" min='0' autocomplete="off">

											<!--end::Col-->
										</div>
										
									
									
									</div>
									<div class="row fv-row mb-7 ">
									<div class="col-12 ps-0 pe-0">
											
											<select class="form-select" id="valute" required>
												<option selected disabled value="">Выберите валюту</option>
												<option value="RUB">Рубль РФ</option>
												<option value="USD">Доллар США</option>
												<option value="EUR">Евро</option>
												
											</select>
											<div class="invalid-feedback">
												Пожалуйста выберите валюту
											</div>
										</div>
										</div>
									<div class="row fv-row mb-7 ">
										<button class="btn-primary btn" type='submit'>Сохранить и продолжить</button>
									</div>
									</div>
								</div>
							</form>
							<!--end::form-->
						</div>
						<!--end::Heading-->
					</div>
						<!--end::Form-->
					</div>
					
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
			
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
	
	</body>
	<script>var hostUrl = "/assets/";</script>
	<?php wp_footer()?>
	<!--end::Body-->
</html>