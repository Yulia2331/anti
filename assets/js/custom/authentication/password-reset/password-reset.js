/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************************!*\
  !*** ../demo1/src/js/custom/authentication/password-reset/password-reset.js ***!
  \******************************************************************************/


// Class Definition
var KTPasswordResetGeneral = function() {
    // Elements
    var form;
    var submitButton;
	var validator;

    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					'email': {
                        validators: {
							notEmpty: {
								message: 'Введите email'
							},
                            emailAddress: {
								message: 'Введено некорректное значение'
							}
						}
					} 
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

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click 
                    submitButton.disabled = true;

                    // Simulate ajax request
                    let login = $('#user_login').val();
                    
                    $.ajax({
                        type:'POST',
                        url: '/wp-admin/admin-ajax.php',
                        data: {
                            action: 'ajaxforgotpassword',
                            user_login: login
                        },
                        datatype:'json',
                        success: (response)=>{
                            
                            let responseJs  = JSON.parse(response);
                            console.log(responseJs);
                            if (responseJs.loggedin==true){

                               
                                submitButton.removeAttribute('data-kt-indicator');
                                submitButton.disabled = false;
                                Swal.fire({
                                    text: responseJs.message,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                }).then(function (result) {
                                    if (result.isConfirmed) { 
                                        form.querySelector('[name="email"]').value= "";                          
                                        // location.href='/auth/'
                                    }
                                });
                            }
                            else{
                                submitButton.disabled = false;
                                submitButton.removeAttribute('data-kt-indicator');
                                Swal.fire({
                                    text: responseJs.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        },
                        error: (response)=>{
                          
                            Swal.fire({
                                text: "Упс ошибка, приносим свои извинения",
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
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Проверьте введенные данные",
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
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_password_reset_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTPasswordResetGeneral.init();
});

/******/ })()
;
//# sourceMappingURL=password-reset.js.map