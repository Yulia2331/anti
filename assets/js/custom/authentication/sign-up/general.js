/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ../demo1/src/js/custom/authentication/sign-up/general.js ***!
  \****************************************************************/


// Class definition
var KTSignupGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Handle form
    var handleForm  = function(e) {
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
					trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }  
                    }),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
				}
			}
		);

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validator.revalidateField('password');

            validator.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                  
                    submitButton.disabled = true;

                    // Simulate ajax request
                    // setTimeout(function() {
                    //     // Hide loading indication
                    //     submitButton.removeAttribute('data-kt-indicator');

                    //     // Enable button
                    //     submitButton.disabled = false;

                    //     // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        // Swal.fire({
                        //     text: "Вы успешно зарегистрировались!",
                        //     icon: "success",
                        //     buttonsStyling: false,
                        //     confirmButtonText: "Ok!",
                        //     customClass: {
                        //         confirmButton: "btn btn-primary"
                        //     }
                        // }).then(function (result) {
                        //     if (result.isConfirmed) { 
                        //         form.reset();  // reset form                    
                        //         passwordMeter.reset();  // reset password meter
                        //         //form.submit();
                        //     }
                        // });
                    // }, 1500); 
                    let userArr = $('#kt_sign_up_form').serialize();	
                    if (document.querySelector('.iti__selected-dial-code')){
                        let code = window.intlTelInputGlobals.getInstance(document.querySelector("#input_phone")).s.iso2;
                        console.log(code);
                        userArr += '&code='+code
                    }
                    
             
                    
                    $.ajax({
                        type:'POST',
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: 'registration',
                            user: userArr
                        }, 
                        datatype:'json',
                        success: function(response){
                            console.log(typeof(response));
                            let responseJs = JSON.parse(response);
                            if (responseJs.status==true){
                                    submitButton.removeAttribute('data-kt-indicator');
                                    submitButton.disabled = false;
                                    Swal.fire({
                                        text: "Вы успешно зарегистрировались!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) { 
                                            form.reset();  // reset form                    
                                            passwordMeter.reset();  // reset password meter
                                            form.submit();
                                            location.href = '/';
                                        }
                                    });
                                    setTimeout(
                                        ()=>{
                                            Swal.close();
                                            form.reset();  // reset form                    
                                            passwordMeter.reset();  // reset password meter
                                            form.submit();
                                            location.href = '/';
                                        }, 2000
                                    );
                                }
                                else{
                                   
                                        Swal.fire({
                                            text: responseJs.content,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then(function(){
                                            submitButton.removeAttribute('data-kt-indicator');
                                            submitButton.disabled = false;
                                        });
                                        
                                    
                                }
                        }, 
                        error:function(response){
                            Swal.fire({
                                text: "Извините, похоже, обнаружены некоторые ошибки, попробуйте еще раз.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                    			
                } else {
                   
                    Swal.fire({
                        text: "Извините, похоже, обнаружены некоторые ошибки, попробуйте еще раз.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
		    });
        });

        // Handle password input
        form.querySelector('input[name="password"]').addEventListener('input', function() {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    // Password input validation
    var validatePassword = function() {
        return  (passwordMeter.getScore() >= 50);
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            // Elements
            form = document.querySelector('#kt_sign_up_form');
            submitButton = document.querySelector('#kt_sign_up_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm ();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSignupGeneral.init();
});

/******/ })()
;
//# sourceMappingURL=general.js.map