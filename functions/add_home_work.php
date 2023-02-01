<?php

add_action('add_meta_boxes', 'add_home_work_fields', 1);

function add_home_work_fields() {
	add_meta_box( 'extra_fields', 'Добавить домашнее задание', 'add_home_work_box_func', 'lp_lesson', 'normal', 'default'  );
}

function add_home_work_box_func( $post ){
	//print_r(get_current_screen());
	//$course_item = LP_Global::course();
	//$course_id = array_values( (array) array_values($course_item)[5])[1];
	//echo $course_id;
	//global $post;
	$courses = learn_press_get_item_courses( $post->ID );
	$course_id = 0;
	foreach ( $courses as $course ){
		$course_id = $course->ID;
	}

		
	?>
	<?php 
		
	?>

	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
	
	<style type="text/css">

		.module-block__send-file {
		  position: absolute;
		  top: 5px;
		  right: 46px;
		  padding: 9px;
		  border-radius: 6px;
		  background-color: #303030;
		  color: #223137;
		}

		.module-block__file-remove div {
		  pointer-events: none;
		}

		input[type=file] {
		  display: none;
		}

		.module-block__file {
		  padding: 6px 8px;
		  border-radius: 6px;
		  background-color: #e6e3e3;
		  margin-right: 5px;
		}

		.module-block__file-remove div {
		  pointer-events: none;
		}

		.module-block__file {
		    margin-right: 0;
		}

		.module-block__file:not(:last-child) {
		    margin-bottom: 5px;
		}

		.module-block__link {
		  display: -webkit-box;
		  display: -ms-flexbox;
		  display: flex;
		  -webkit-box-align: center;
		      -ms-flex-align: center;
		          align-items: center;
		  color: #223137;
		}
		
		.module-block__link button {
			color: #223137;
		}

		.module-block__name {
			max-width: 233px;
			overflow: hidden;
			max-height: 18px;
		}

		.module-block__file-remove{
			margin-top: -20px;
			float: right;
		}

		.module-block__all-files{
			margin-bottom: 10px;
		}

		.module-block__btn{
			margin-bottom: 20px;
		}


	</style>

	<section>

		<div style="color: #fff;background-color: #d63638; border: 1px solid #d63638; padding: 10px; border-radius: 7px; margin: 10px 0px;  display: <?php echo get_post_meta($post->ID, 'home_work_error', 1)==''? 'none':'block';?>;">
			<?php echo get_post_meta($post->ID, 'home_work_error', 1);?>
		</div>

		<div style="display: block; min-height: 100px; overflow: hidden;">
			<div style="display:block; float: left; margin-right: 20px;">
				<label style="display:block;">Комментарий:</label>
				<textarea name="home_work_comments" cols="30" rows="4"><?php echo get_post_meta($post->ID, 'comments_home_work', 1);?></textarea>
			</div>

			<div style="display:block;float: left; margin-right: 20px; min-width: 290px;">
				<label style="display:block;">Файлы:</label>
				<div class="module-block__add-file">
                	<div class="module-block__all-files"> 
	                  	<?php 
	                  		// echo "<pre>";
	                  		// var_dump(get_post_meta($post->ID, 'files_home_work', 1));
							// echo "</pre>";
	                  		$files = explode('/*/',get_post_meta($post->ID, 'files_home_work', 1));
	                  		//print_r($files);
	                  		foreach($files as $key => $value){
	                  			if ($value != ''){
	                  			?>
	                  				<div class="module-block__file">
								        <div class="module-block__link">
								        	<div class="module-block__name">
								        		<?php echo explode(',',$value)[0];?>
								        	</div>
								        </div>
								        <button class="module-block__file-remove" data-name="<?php echo explode(',',$value)[0];?>">
								            x
								        </button>
								     </div>
	                  			<?php
	                  			}
	                  		}
	              		?> 
              		</div>
	                <input type="hidden" class="files_home_work" name="files_home_work" value="<?php echo get_post_meta($post->ID, 'files_home_work', 1)?>">
	                <button class="module-block__btn secondary__button">Загрузить файлы</button>
                </div>
			</div>

			<?php 
			//echo get_post_meta($post->ID, 'files_home_work', 1);

			//echo get_post_meta($post->ID, 'date_home_work', 1);
			if (empty(get_post_meta($post->ID, 'date_home_work', 1))){
				$date = ['01','1','2023','14','00'];
			}else{
				$date = explode('/',get_post_meta($post->ID, 'date_home_work', 1));
			}
			
			//print_r(get_post_meta($post->ID, 'mypost', 1));
			
			
			$checked = '';
			
			if (get_post_meta($post->ID, 'time_home_work', 1) == 'on'){
				$checked = 'checked';
			}
			

			$month_arr = ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'];

			?>			
			
			<div style="display:block; float: left;">
				<input id="html" type="checkbox" name="time_home_work" <?php echo $checked; ?>>
  				<label for="html">Назначить окончание проверки ДЗ</label>
  				</br>
				<label>Дата и время здачи : </label>
				<div class="timestamp-wrap">
					<label>
						<span class="screen-reader-text">День</span>
						<input type="text" id="jj" name="day_home_work" value="<?php echo $date[0]?>" size="2" maxlength="2" autocomplete="off" class="form-required">
					</label>
					<label>
						<span class="screen-reader-text">Месяц</span>
						<select class="form-required" id="mm" name="month_home_work">
							<?php 
								foreach($month_arr as $key => $value){
									$key = sprintf('%02d',$key + 1);

									if ($key==$date[1]){
										echo "<option value='{$key}' data-text='{$value}' selected='selected'>{$key}-{$value}</option>";
									}else{
										echo "<option value='{$key}' data-text='{$value}'>{$key}-{$value}</option>";
									}
									

								}
							?>							
						</select>
					</label> 
					 
					<label>
						<span class="screen-reader-text">Год</span>
						<input type="text" id="aa" name="year_home_work" value="<?php echo $date[2]?>" size="4" maxlength="4" autocomplete="off" class="form-required">
					</label> 
						в 
					<label>
						<span class="screen-reader-text">Час</span>
						<input type="text" id="hh" name="hour_home_work" value="<?php echo $date[3]?>" size="2" maxlength="2" autocomplete="off" class="form-required">
					</label>
						:
					<label>
						<span class="screen-reader-text">Минута</span>
						<input type="text" id="mn" name="min_home_work" value="<?php echo $date[4]?>" size="2" maxlength="2" autocomplete="off" class="form-required">
					</label>
				</div>
			</div>
	    </div>

    </section>
    

    <script type="text/javascript">
    	function show_me(){
		  
			let open = document.querySelector('.module-block__btn');
			let input = document.querySelector('#open-file');
			let filesBlock = document.querySelector('.module-block__all-files ');
			let input_arr = document.querySelector('.files_home_work');
					  

			function triggerInput(){
				event.preventDefault();

				const customUploader = wp.media({
					title: 'Загрузите домашнее задание',					
					button: {
								text: 'Загрузить' // текст кнопки, по умолчанию "Вставить в запись"
							},
					multiple: true
				});

				// добавляем событие выбора изображения
				customUploader.on('select', function() {		 
					const files = customUploader.state().get('selection').toJSON();				
					addFileWP(files);
				});

				// и открываем модальное окно с выбором изображения
				customUploader.open();
			}

			function addFileWP(arr){
				
				let arr_files = '';
			    filesBlock.innerHTML = '';

			    arr.forEach(item =>{

			    	console.log(item.name);

			    	arr_files += `${item.filename},${item.url}/*/`;

			    	filesBlock.insertAdjacentHTML('afterbegin', `

					      <div class="module-block__file">
					        <div class="module-block__link">
					          <div class="module-block__name">${item.filename}</div>
					          
					        </div>
					        <button class="module-block__file-remove" data-name="${item.filename}">
					            x
					        </button>
					      </div>

					    `);
			    });

			    console.log(arr_files);
			    console.log(input_arr);
			    input_arr.value = arr_files;
			}

			// Удаляем блоки и ссылки на файлы из инпута
			const removeHeandler = event => { 

				if (!event.target.dataset.name) {
			    	return
			    }

			    const {name} = event.target.dataset;

				//let arr_files = [];
				event.preventDefault();
				
				const block = filesBlock.querySelector(`[data-name="${name}"]`).closest('.module-block__file');
				block.remove();

				let arr_files = input_arr.value.split('/*/');
				let out = '';

				arr_files.forEach(item =>{
						if(item.split(',')[0] != name){
							out += item + '/*/';
						}
					});


				console.log(out.replace('/*//*/','/*/'));
				input_arr.value = out.replace('/*//*/','/*/');

				
			}

		   
		   filesBlock.addEventListener('click', removeHeandler)
		   open.addEventListener('click', triggerInput)


		}

		show_me();
    </script>   


	<?php
	// echo '<pre>';
	// //print_r(array_keys($GLOBALS));
	// print_r();
	// echo '</pre>';

	$url_data = strip_tags($GLOBALS['sample_permalink_html']);
	$url_arr = explode(' ',$url_data);
	$url_tutorial = explode('Edit',$url_arr[1])[0];
	//print_r(explode('Edit',$url_arr[1])[0] );
	//echo $url_tutorial;
	?>
	<input type="hidden" name="link_tutorial" value="<?php echo $url_tutorial;?>">

	<?php
	
	
}


// включаем обновление полей при сохранении
add_action( 'save_post', 'home_work_box_update', 0 );

## Сохраняем данные, при сохранении поста
function home_work_box_update( $post_id ){

	update_post_meta( $post_id, 'home_work_error', '' );

	if (empty($_POST['link_tutorial'])){
		update_post_meta( $post_id, 'home_work_error', 'Нет ссылки на урок' );
		return $post_id;
	}	

	if ( empty( $_POST['home_work_comments'] )){

		update_post_meta( $post_id, 'home_work_error', 'Не заполненно поле комментария' );
		return $post_id;
	}

	if(isset( $_POST['time_home_work'])){		
		$time_home_work = $_POST['time_home_work'];	
	}else{
		$time_home_work = '';	
	}
	update_post_meta( $post_id, 'time_home_work', $time_home_work );
	
	
	// Коментарий
	$comments = $_POST['home_work_comments'];
	update_post_meta( $post_id, 'comments_home_work', $comments );

	// Время
	$day = $_POST['day_home_work'];
	$month = $_POST['month_home_work'];
	$year = $_POST['year_home_work'];
	$hour = $_POST['hour_home_work'];
	$min = $_POST['min_home_work'];

	$date = $day.'/'.$month.'/'.$year.'/'.$hour.'/'.$min;
	update_post_meta( $post_id, 'date_home_work', $date );

	//$upload = wp_upload_bits( $_FILES["field1"]["name"], null, file_get_contents( $_FILES["field1"]["tmp_name"]) );

	$file = $_POST["files_home_work"];

	if (empty($_POST['link_tutorial'])){
		update_post_meta( $post_id, 'home_work_error', 'Нет ссылки на урок обратитесь к разрабочику' );
	}else{
		$users = get_field('dostup',$_POST['course_id']);
		//print_r(get_post($_POST['comment_post_ID']));
		//print_r($users);
		foreach($users as $user){
			add_user_meta( $user, 'notifications', ['Вам доступно домашнее задание','add_home_work/'.$_POST['link_tutorial']] );
		}
	}

	update_post_meta( $post_id, 'files_home_work', $file );

	return $post_id;
}