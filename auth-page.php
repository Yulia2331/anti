<?php
/*
Template Name: авторизация
*/
?>
<?php 
 if(is_user_logged_in()){
	wp_redirect( '/antinorma.com/' );
 }

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
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="/hello" action="#">
						<div class="mb-5 d-flex justify-content-center">
							<?php if( has_custom_logo() ): the_custom_logo(); ?>
								<?php else: ?>
								<a class="mb-5"  href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
							<?php endif; ?>
						</div>
							<!--begin::Heading-->
							<div class="text-center mb-5 mt-90">
								<!--begin::Title-->
								
								<h1 class="text-dark mb-3">Вход</h1>
								<!--end::Title-->
							
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">

								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" placeholder="Логин" id='login' name="email" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" id='passwd' placeholder="Пароль" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-danger w-100 mb-5">
									<span class="indicator-label">Войти</span>
									<span class="indicator-progress">Ожидайте...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
								<div class="d-flex flex-wrap flex-lg-nowrap">
									<a href="/reg" class="btn-primary btn w-lg-50 w-100 me-lg-1 mb-lg-0 mb-5">Регистрация</a>
									<a href="/remind-password" class="btn btn-light-primary w-lg-50 w-100 ms-lg-1">Забыли пароль?</a>
								</div>
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<div class="w-lg-700px w-350px mt-10 pe-5 ps-5 ps-lg-0 pe-lg-0">
						<div class="row">
							<div class="col-lg-6 col-12 new_clients mb-10 mb-lg-0 ">
							<?php 
												get_template_part('/template-parts/user_earnings');
											?>
							</div>
							<div class="col-lg-6 col-12 new_clients">
											<?php 
												get_template_part('/template-parts/new-clients-month');
											?>
							</div>
						</div>
					</div>
					<!--end::Wrapper-->
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