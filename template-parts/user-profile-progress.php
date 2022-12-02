<?php
$user = get_queried_object();
$user_id = $user->ID;

														$data = 8;
														$nodata = 8;
														if (get_field('father_name', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('photo', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('data_birth', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('telefon', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('telegram', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('whatsapp', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('city', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if (get_field('sfera_deyatelnosti', 'user_'.$user_id )==''){
															$nodata = $nodata - 1 ;
														}
														if ($nodata == 0){
															$percent =  100;
														}
														else{
															$percent = $nodata/$data * 100;
															
														}

													?>
													<div class="d-flex align-items-center w-200px w-sm-250px flex-column mt-3">
														<div class="d-flex justify-content-between w-100 mt-auto mb-2">
															<span class="fw-bold fs-6 text-gray-400">Заполненность профиля</span>
															<span class="fw-bolder fs-6"><?php echo $percent ?>%</span>
														</div>
														<div class="h-5px mx-3 w-100 bg-light mb-3">
															<div class="bg-success rounded h-5px" role="progressbar" style="width: <?php echo $percent ?>%;" aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>