$(function(){

	// MASKED INPUT
	// =================================================================
	// Require Masked Input
	// http://digitalbush.com/projects/masked-input-plugin/
	// =================================================================


	// Initialize Masked Inputs
	// * - Represents an alphanumeric character (A-Z,a-z,0-9)
	$('[name=txt_ruc]').mask('9999999999999');

	// FORM VALIDATION FEEDBACK ICONS
	// =================================================================
	var faIcon = {
		valid: 'fa fa-check-circle fa-lg text-success',
		invalid: 'fa fa-times-circle fa-lg',
		validating: 'fa fa-refresh'
	}

	// FORM VARIOUS VALIDATION
	// =================================================================
	$('#form-data').bootstrapValidator({
		message: 'Este valor no es valido',
		feedbackIcons: faIcon,
		fields: {
			txt_1: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					}
				}
			},
			txt_correo: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					},
					emailAddress: {
						message: 'Direccion de correo no valida'
					},
					remote: {
	                    url: 'app.php',
	                    type:'POST',
	                    data: function(validator) {
	                       return {
	                           verific_user_mail: 'hqk34',
	                       };
	                    },
	                   message: 'Este correo electrónico ya existe'
	                }
				}
			},
			txt_ruc: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					},
					remote: {
	                    url: 'app.php',
	                    type:'POST',
	                    data: function(validator) {
	                       return {
	                           registro_existencia_empresa: 'ofm56',
	                       };
	                    },
	                   message: 'Este numero de ruc ya existe'
	                }
				}
			},
			txt_4: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					},
					identical: {
						field: 'confirmPassword',
						message: 'The password and its confirm are not the same'
					}
				}
			},
						
			txt_5: {
				validators: {
					notEmpty: {
						message: 'You have to accept the terms and policies'
					}
				}
			},
		}
	}).on('success.form.bv', function(e) {
		// Prevent form submission
            e.preventDefault();
            var $form = $(e.target), fv = $form.data('form-data');
            // Use Ajax to submit form data
            $.ajax({
                url: 'app.php',
                type: 'POST',
                dataType:'json',
                data: $("#form-data").serialize(),
                beforeSend: function() {
	                $.blockUI({ 
	                  css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
	                  message: '<h3>Procesando su información...'
	                                      +'<span class="loader animated fadeIn handle ui-sortable-handle">'
	                                      +'<span class="spinner">'
	                                          +'<i class="fa fa-spinner fa-spin"></i>'
	                                      +'</span>'
	                                      +'</span>'
	                                +'</h3>'
	                });
                },
                success: function(data) {
                	$.unblockUI();
	                if (data[0]==1) {
	                  swal("Buen Trabajo!", "Hemos enviado un correo electrónico con la información de su cuenta, por favor revise su correo para iniciar sesión.", "success");
	                };
                }
            });
	});

});

// methodos procesos config

function limpiardata(){
	$('#form-data').each(function(){
	  this.reset();
	});	
}
