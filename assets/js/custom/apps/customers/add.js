/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ../demo1/src/js/custom/apps/customers/add.js ***!
  \****************************************************/


// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
	var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'first-name': {
						validators: {
							notEmpty: {
								message: 'Имя обязательно'
							}
						}
                    },
                    'last-name': {
						validators: {
							notEmpty: {
								message: 'Фамилия обязательно'
							}
						}
                    },
                    'date':{
                        validators: {
							notEmpty: {
								message: 'Дата рождения обязательно'
							}
                           
						}
                    },
                    'phone':{
                        validators: {
							notEmpty: {
								message: 'Телефон обязательно'
							}
                           
						}
                    },
                    'telegram':{
                        validators: {
							notEmpty: {
								message: 'Телеграм обязательно'
							}
                           
						}
                    },
                    'city':{
                        validators: {
							notEmpty: {
								message: 'Город обязательно'
							}
                           
						}
                    },
                    'sphera':{
                        validators: {
							notEmpty: {
								message: 'Сфера деятельности обязательно'
							}
                           
						}
                    },
					'email': {
                        validators: {
							notEmpty: {
								message: 'Email обязательно'
							},
                            emailAddress: {
								message: 'Значение не является действительным адресом электронной почты'
							}
						}
					},
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Требуется пароль'
                            },
                            callback: {
                                message: 'Пожалуйста, введите безопасный пароль',
                                callback: function(input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'Требуется подтверждение пароля'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'Пароль и его подтверждение не совпадают.'
                            }
                        }
                    },
                    'toc': {
                        validators: {
                            notEmpty: {
                                message: 'Вы должны согласиться с Правилами и Условиями'
                            }
                        }
                    },
                    'money_this_month': {
                        validators: {
                            notEmpty: {
                                message: 'Заполните доход за текущий месяц'
                            }
                        }
                    },
                    'money_next_month': {
                        validators: {
                            notEmpty: {
                                message: 'Заполните прогноз на следующий месяц'
                            }
                        }
                    },
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Revalidate country field. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="country"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('country');
        });

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable submit button whilst loading
						submitButton.disabled = true;
						let userArr = $('#kt_modal_add_customer_form').serialize();
						$.ajax({
							type:'POST',
							url: '/wp-admin/admin-ajax.php',
							data: {
								 action: 'registration',
								 user: userArr
							}, 
							datatype:'json',
							success: function(response){
								submitButton.removeAttribute('data-kt-indicator');
							
								Swal.fire({
									text: "Форма успешно отправлена!",
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.isConfirmed) {
										// Hide modal
										modal.hide();

										// Enable submit button after loading
										submitButton.disabled = false;

										// Redirect to customers list page
										window.location = form.getAttribute("data-kt-redirect");
									}
								});
							}, 
							error:function(response){
								Swal.fire({
									text: "Возникли ошибки",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});
							}
					  });
						// setTimeout(function() {
						// 	submitButton.removeAttribute('data-kt-indicator');
							
						// 	Swal.fire({
						// 		text: "Форма успешно отправлена!",
						// 		icon: "success",
						// 		buttonsStyling: false,
						// 		confirmButtonText: "Ok, got it!",
						// 		customClass: {
						// 			confirmButton: "btn btn-primary"
						// 		}
						// 	}).then(function (result) {
						// 		if (result.isConfirmed) {
						// 			// Hide modal
						// 			modal.hide();

						// 			// Enable submit button after loading
						// 			submitButton.disabled = false;

						// 			// Redirect to customers list page
						// 			window.location = form.getAttribute("data-kt-redirect");
						// 		}
						// 	});							
						// }, 2000);   						
					} else {
						Swal.fire({
							text: "Возникли ошибки",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
			closeButton = form.querySelector('#kt_modal_add_customer_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalCustomersAdd.init();
});
/******/ })()
;
//# sourceMappingURL=add.js.map