jQuery(function(){

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
			txt_usuario: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					},
					emailAddress: {
						message: 'Dirección de correo no valida'
					}
				}
			},
			txt_pass: {
				validators: {
					notEmpty: {
						message: '(*) Este campo es requerido'
					}
				}
			}			
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
                success: function(data) {
                	$.unblockUI();
	                if (data['valid']=='true') {
	                  window.location = "../";
	                };
	                if (data['valid']!='true') {
	                  swal("Lo sentimos!", "Su usuario o password son incorrectos, verifique e intente otra vez", "warning");
	                };
                }
            });
	});
});