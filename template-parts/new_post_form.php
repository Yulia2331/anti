<div class="card mb-6">
									<!--begin::Card head-->
									<div class="card-header card-header-stretch" style='border-bottom:0'>
										<!--begin::Title-->
										<div class="card-title w-100 d-flex align-items-center justify-content-between">
												<div class="d-flex align-items-center">
													<div class="symbol symbol-40px me-4 rounded-circle">
														<span class="symbol-label bg-white">
															<!--begin::Svg Icon | path: icons/duotune/electronics/elc004.svg-->
																<?php
																get_template_part('/template-parts/auth_avatar') ?>
																
															<!--end::Svg Icon-->
														</span>
													</div>
													<span class='fw-bold fs-6 text-gray-400'>Создать пост</span>
												</div>
												<div class="smiling position-relative d-none d-lg-flex" id='smiling'>
													<div class='smiling-toogle'>
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C6.477 22 2 17.523 2 12C2 6.477 6.477 2 12 2ZM12 4C9.87827 4 7.84344 4.84285 6.34315 6.34315C4.84285 7.84344 4 9.87827 4 12C4 14.1217 4.84285 16.1566 6.34315 17.6569C7.84344 19.1571 9.87827 20 12 20C14.1217 20 16.1566 19.1571 17.6569 17.6569C19.1571 16.1566 20 14.1217 20 12C20 9.87827 19.1571 7.84344 17.6569 6.34315C16.1566 4.84285 14.1217 4 12 4ZM17 13C17 14.3261 16.4732 15.5979 15.5355 16.5355C14.5979 17.4732 13.3261 18 12 18C10.6739 18 9.40215 17.4732 8.46447 16.5355C7.52678 15.5979 7 14.3261 7 13H17Z" fill="#303030"/>
														</svg>
														
													</div>
														<div class="smiling__body flex-wrap position-absolute" style='display:none'>
															<?php
																get_template_part('/template-parts/smiles');
															?>
														</div>
												</div>
										</div>

									</div>
									<div class="card-body pt-1">
												<div class="post_form  flex-grow-1">
														<textarea name="post_text" placeholder='Текст'  rows='1' id="post_text" class='form-control' style='border:none; border-radius:0;border-bottom:1px solid #E8E8E8;resize:none'></textarea>
												</div>
									</div>
									<div class="card-footer pt-1" style='border-top:0'>
										<div class="d-flex justify-content-between align-items-center">

									
											<ul class='post-vision <?php echo is_author()?"":"d-none" ?>' id = 'post-privacy'>
												<li class='active' data-vision='publish'>Видно всем</li>
												<?php if (is_author()){ ?>
													<li data-vision='private'>Видно мне</li>
												<?php } ?>
											</ul>
										
											
											<div class="post-actions d-flex justify-content-end align-items-center">
											<div style='max-width:250px; height:40px;width:40px;background-size: cover;background-repeat:no-repeat' id="output" class='output-image me-5'></div>
													<div class="position-relative post-image">
													
														<label for="post-image-input">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M18 3H6C5.20435 3 4.44129 3.31607 3.87868 3.87868C3.31607 4.44129 3 5.20435 3 6V18C3 18.7956 3.31607 19.5587 3.87868 20.1213C4.44129 20.6839 5.20435 21 6 21H18C18.7956 21 19.5587 20.6839 20.1213 20.1213C20.6839 19.5587 21 18.7956 21 18V6C21 5.20435 20.6839 4.44129 20.1213 3.87868C19.5587 3.31607 18.7956 3 18 3ZM6 5H18C18.2652 5 18.5196 5.10536 18.7071 5.29289C18.8946 5.48043 19 5.73478 19 6V14.36L15.8 11.63C15.3042 11.222 14.6821 10.999 14.04 10.999C13.3979 10.999 12.7758 11.222 12.28 11.63L5 17.7V6C5 5.73478 5.10536 5.48043 5.29289 5.29289C5.48043 5.10536 5.73478 5 6 5V5ZM18 19H6.56L13.56 13.16C13.6945 13.0602 13.8575 13.0062 14.025 13.0062C14.1925 13.0062 14.3555 13.0602 14.49 13.16L19 17V18C19 18.2652 18.8946 18.5196 18.7071 18.7071C18.5196 18.8946 18.2652 19 18 19Z" fill="#303030"/>
																<path d="M8 10C8.82843 10 9.5 9.32843 9.5 8.5C9.5 7.67157 8.82843 7 8 7C7.17157 7 6.5 7.67157 6.5 8.5C6.5 9.32843 7.17157 10 8 10Z" fill="#303030"/>
															</svg>
														</label>
														<input type="file" accept="image/jpeg,image/png,image/gif" id="post-image-input" name="post-image" class='d-none'  />
														<input type="hidden" id="uploaded_image">
													</div>
													

												
												<button class='btn btn-danger' data-user='<?php echo  wp_get_current_user()->ID ?>' id='public-post-btn'>Опубликовать</button>
											</div>
										</div>
										
									</div>
								</div>
							
								<script>
									var textarea = document.querySelector('textarea');
										textarea.addEventListener('keyup', function(){
										if(this.scrollTop > 0){
											this.style.height = this.scrollHeight + "px";
										}
										});

									
								</script>
								