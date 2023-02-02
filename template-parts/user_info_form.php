<?php
$user = get_queried_object();
$user_id = $user->ID;
?>

<div class="card-body" id='user_info'>
		<!--begin::Tab Content-->
		<div class="" id='user_info_values'>
			<div class="d-flex mb-5">
				<span class="fw-bold fs-6 text-gray-400 w-25">Полное имя</span>
				<span class="fw-bold fs-6 text-black-400 w-75"><?=$user->last_name?> <?=$user->first_name?>
				<?php
					if (get_field('father_name', 'user_'.$user_id) != ''):?>
					
						<?=get_field('father_name', 'user_'.$user_id)?> 
					<?php endif ?>
			</span>
			</div>
		<?php 
		$data_b = get_user_meta($user_id,'data_birth')[0];
		$age = get_age($data_b, 'user_'.$user_id);
		//print_r(get_user_meta($user_id));

		// print_r(get_user_meta($user_id,'_data_birth')[0]);
		// echo '<br>';
		//print_r(get_user_meta($user_id,'data_birth')[0]);
		//echo '<br>';
		//echo the_field('data_birth');
		//echo '<br>';
		

		//echo date('d.m.Y',$data_b);
		if ($age>0){


		?>
			<div class="d-flex mb-5">
				<span class="fw-bold fs-6 text-gray-400 w-25">Возраст</span>
				<span class="fw-bold fs-6 text-black-400 w-75"><?=$age?> <?php  echo YearTextArg($age); ?></span>
			</div>
		<?php }?>
			<div class="d-flex mb-5">
				<span class="fw-bold fs-6 text-gray-400 w-25">Пол</span>
				<span class="fw-bold fs-6 text-black-400 w-75"><?=get_field('male', 'user_'.$user_id)?></span>
			</div>
		
			<div class="d-flex mb-5">
				<span class="fw-bold fs-6 text-gray-400 w-25">Телефон</span>
				<span class="fw-bold fs-6 text-black-400 w-75">+<?=get_phone_code_by_iso2(get_field('kod_strany', 'user_'.$user_id))?><?=get_field('telefon', 'user_'.$user_id)?></span>
			</div>
		</div>
			<?php if( is_author() && is_user_logged_in() ){ ?>

				<div id='user_form' style='display:none'>
					<form action="change_user_info" id="user_prof_form">

						

						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="last-name">Аватар</label>
							</div>
							<div class="col-9 col-lg-6">
								<!-- <img src="<?php echo get_field('photo', 'user_'.get_current_user_id() );?>" style="max-height: 100px;">
								<button class="btn btn-sm btn-danger me-2">Загрузить</button>
								<input type="hidden" value='<?php echo get_field('photo', 'user_'.get_current_user_id() );?>' name="photo"> -->

								<?php ek_form_upload_images();?> 
							</div>
						</div>

						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="last-name">Имя</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required position-relative textonly" value='<?=$user->first_name?>' id="last-name" type="text" placeholder="Имя" name="last-name" autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="fathers_name">Отчество</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required position-relative textonly" id="first-name" type="text" placeholder="Отчество" value='<?=get_field('father_name', 'user_'.$user_id)?>' name="fathers-name" autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="fathers_name">Фамилия</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required position-relative textonly" id="first-name" value='<?=$user->last_name?>' type="text" placeholder="Фамилия" name="first-name" autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="date_birth">Дата рождения</label>
							</div>
							<div class="col-9 col-lg-6">
							<input class="form-control form-control-lg form-control-solid required datepicker" value='<?=get_field('data_birth', 'user_'.$user_id)?>' type="text" placeholder="Дата рождения" name="date" id='date_birth' autocomplete="off" />
							</div>
						</div>
						<input type="hidden" name='code' value = "<?=get_field('kod_strany', 'user_'.$user_id)?>" id='kod_strani'>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="telefon">Телефон</label>
							</div>
							<div class="col-9 col-lg-6">

								<input class="form-control form-control-lg form-control-solid required" value='<?=get_field('telefon', 'user_'.$user_id)?>' id="user_phone" type="phone" placeholder="Телефон" name="telefon" autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400'  for="iput_telegram">Telegram</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required" id="iput_telegram" type="text" placeholder="telegram" name="telegram" value='<?=get_field('telegram', 'user_'.$user_id)?>' autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400 '  for="whatsapp">Whatsapp</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required" id="whatsapp" type="text" value='<?=get_field('whatsapp', 'user_'.$user_id)?>' placeholder="whatsapp" name="whatsapp" autocomplete="off">
							</div>
						</div>
						<div class="row fv-row mb-7 fv-plugins-icon-container">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400 '  for="city">Город</label>
							</div>
							<div class="col-9 col-lg-6">
								<input class="form-control form-control-lg form-control-solid required textonly" id="city" type="text" placeholder="город"  name="city" value='<?=get_field('city', 'user_'.$user_id)?>' autocomplete="off">
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<label class='fw-bold fs-6 text-gray-400' for='sphera'>Сфера деятельности</label>
							</div>
							<div class="col-9 col-lg-6 position-relative">
								<?php $sfera = get_field('sfera_deyatelnosti', 'user_'.$user_id)?>
								<select required class="form-control form-control-lg form-control-solid required" placeholder="Сфера деятельности"
									id="sphera" name="sphera" autocomplete="off">
									
									<option <?php echo ($sfera=='товарка')? 'selected':'' ?> value="товарка">Товарка</option>
									<option <?php echo  ($sfera=='универсал')? 'selected': '' ?> value="универсал">Универсал</option>
									<option <?php echo  ($sfera=='эксперт')?'selected':'' ?> value="эксперт">Эксперт</option>
									<option <?php echo  ($sfera=='ищу себя')?'selected':'' ?> value="ищу себя">Ищу себя</option>
								</select>
								<label for="sphera">Сфера деятельности</label>
							</div>
						</div>
							
						<button type='submit' class="btn btn-sm btn-danger mt-2 me-2">
							Изменить
						</button>
						</form>
					</div>
			<?php } ?>

		<!--end::Tab Content-->
	</div>
	<script>
						jQuery(document).ready(function(){
							
					var input = document.querySelector("#user_phone");
 				 		if (input){
							let intTel = window.intlTelInput(input, {
								autoHideDialCode: false,
								separateDialCode: true,
								utilsScript:"<?php echo get_template_directory_uri() ?>/assets/js/cityphone/js/utils.js",
								autoPlaceholder:"aggressive",
								placeholderNumberType:"MOBILE",
								preferredCountries: ['ru', 'ua', 'by'],
								initialCountry: "<?php echo get_field('kod_strany', 'user_'.$user_id) ?>"
							},
							);
							
							$("#user_phone").on("close:countrydropdown focus",function(e,countryData){
								$(this).val('');
								
								$(this).mask($(this).attr('placeholder').replace(/[0-9]/g,'9'));
								let code = window.intlTelInputGlobals.getInstance(document.querySelector("#user_phone")).s.iso2;
								$('#kod_strani').val(code);
							});
						
					}
				

					
				});
	</script>