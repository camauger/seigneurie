// JavaScript Document

    /*
	 * Datatables
	 *
	 */
	
	/*
	 * Form validation : formulaire d'inscription
	 *
	 */
	 
	// Gestion de l'asterisque
	$('#contactForm').on('init.field.fv', function(e, data) 
	{
		// data.fv      --> The FormValidation instance
		// data.field   --> The field name
		// data.element --> The field element
		
		var $icon = data.element.data('fv.icon'),
		options = data.fv.getOptions(),                      // Entire options
		validators = data.fv.getOptions(data.field).validators; // The field validators
		
		if (validators.notEmpty && options.icon && options.icon.required) 
		{
			// The field uses notEmpty validator
			// Add required icon
			$icon.addClass(options.icon.required).show();
		}
	}).formValidation(
	 {
        framework: 'bootstrap',
        // Utilisation des polices de fontawesome
		icon: 
		{
            required: '',
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'			
        },
		// Spécifier la langue de la validation
        locale: 'fr_FR',
		// Utilisation de l'addon de Google reCaptcha (nécessite le fichier dans répertoire addons et une inscription chez Google rCaptcha pour obtenir le sitekey)
		addOns: 
		{
			reCaptcha2: 
			{
				element: 'captchaContainer',
				language: 'fr',
				theme: 'light',
				siteKey: '6LfLoxYTAAAAACrADcFxz15a8GM3gGz30LpuBzZU',
				timeout: 120,
				message: 'Le CAPTCHA n\047est pas valide'
			}
		},
		fields: 
		{
			p_prenom: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_nom: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			fk_groupe: 
			{
				validators: 
				{
					notEmpty: 
					{
						message: 'Veuillez effectuer une sélection'
					}
				}
			},
			p_adresse1: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 6,
						max: 55
					}
				}
			},
			p_adresse2: 
			{
				validators: 
				{
					stringLength: 
					{
						min: 3,
						max: 55
					}
				}
			},
			p_ville: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_province: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_pays: 
			{
				validators: 
				{
					notEmpty: 
					{
						message: 'Veuillez effectuer une sélection'
					}
				}
			},
			p_code_postal: 
			{
				validators: 
				{	
					notEmpty: 
					{
						message: 'Ne peut être vide'
					},
					zipCode: 
					{
						country: 'p_pays',
						message: 'Ce n\047est pas un code postal valide pour : %s '
					}
				}
			},
			p_telephone: 
			{
				validators: 
				{
					notEmpty: {},
					phone: 
					{
						country: 'p_pays',
						message: 'Ce n\047est pas un numéro de téléphone valide pour : %s'
					}
				}
			},
			p_courriel: 
			{
				validators: 
				{
					notEmpty: {},
					emailAddress: {}
				}
			},
			t_quantite: 
			{
				validators: 
				{
					notEmpty: 
					{
						message: 'Ne peut être vide ou 0'	
					},
					integer: 
					{
                        message: 'Chiffre uniquement'
                    },
					regexp: 
					{ 
						regexp: /^[1-9]\d*$/,
						message: 'Ne peut être 0'
					}
				}
			}
		} // fields
	}) // formValidation
	// Revalider le code postal basé sur le choix du pays
	.on('change', '[name="p_pays"]', function(e) 
	{
		$('#contactForm').formValidation('revalidateField', 'p_code_postal');
		$('#contactForm').formValidation('revalidateField', 'p_telephone');
	})
	
	// Rendre la sélection obligatoire ( voir bootstrap-select)
	.find('[name="fk_groupe"]')
		.selectpicker()
		.change(function(e) 
		{
			// revalidate the language when it is changed
			$('#contactForm').formValidation('revalidateField', 'fk_groupe');
		})
		.end()
	
	// Rendre la sélection obligatoire ( voir bootstrap-select)
	.find('[name="p_pays"]')
		.selectpicker()
		.change(function(e) 
		{
			// revalidate the language when it is changed
			$('#contactForm').formValidation('revalidateField', 'p_pays');
		})
		.end()
	
	// Gestion de l'asterisque
	.on('status.field.fv', function(e, data) 
	{
		// Remove the required icon when the field updates its status
		var $icon  = data.element.data('fv.icon'),
		options = data.fv.getOptions(),                      // Entire options
		validators = data.fv.getOptions(data.field).validators; // The field validators
		
		if (validators.notEmpty && options.icon && options.icon.required) 
		{
			$icon.removeClass(options.icon.required).addClass('fa');
		}
	})
	;	
	
	$('#resetButton').on('click', function() 
	{
		// Reset the recaptcha
		FormValidation.AddOn.reCaptcha2.reset('captchaContainer');
		
		// Reset form
		$('#contactForm').formValidation('resetForm', true);
	});
	
	
	/*
	 * Form validation : formulaire d'édition du participant
	 *
	 */
	 
	$('#formEditParticpant')
	// Gestion de l'asterisque
	.on('init.field.fv', function(e, data) 
	{
		// data.fv      --> The FormValidation instance
		// data.field   --> The field name
		// data.element --> The field element
		
		var $icon = data.element.data('fv.icon'),
		options = data.fv.getOptions(),                      // Entire options
		validators = data.fv.getOptions(data.field).validators; // The field validators
		
		if (validators.notEmpty && options.icon && options.icon.required) 
		{
			// The field uses notEmpty validator
			// Add required icon
			$icon.addClass(options.icon.required).show();
		}
	})
	 
	 .formValidation(
	 {
        framework: 'bootstrap',
        // Utilisation des polices de fontawesome
		icon: 
		{
            required: '',
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'			
        },
		// Spécifier la langue de la validation
        locale: 'fr_FR',
		// Utilisation de l'addon de Google reCaptcha (nécessite le fichier dans répertoire addons et une inscription chez Google rCaptcha pour obtenir le sitekey)
		
		fields: 
		{
			p_prenom: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_nom: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			fk_groupe: 
			{
				validators: 
				{
					notEmpty: 
					{
						message: 'Veuillez effectuer une sélection'
					}
				}
			},
			p_adresse1: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 6,
						max: 55
					}
				}
			},
			p_adresse2: 
			{
				validators: 
				{
					stringLength: 
					{
						min: 3,
						max: 55
					}
				}
			},
			p_ville: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_province: 
			{
				validators: 
				{
					notEmpty: {},
					stringLength: 
					{
						min: 2,
						max: 55
					}
				}
			},
			p_pays: 
			{
				validators: 
				{
					notEmpty: 
					{
						message: 'Veuillez effectuer une sélection'
					}
				}
			},
			p_code_postal: 
			{
				validators: 
				{	
					notEmpty: 
					{
						message: 'Ne peut être vide'
					},
					zipCode: 
					{
						country: 'p_pays',
						message: 'Ce n\047est pas un code postal valide pour : %s '
					}
				}
			},
			p_telephone: 
			{
				validators: 
				{
					notEmpty: {},
					phone: 
					{
						country: 'p_pays',
						message: 'Ce n\047est pas un numéro de téléphone valide pour : %s'
					}
				}
			},
			p_courriel: 
			{
				validators: 
				{
					notEmpty: {},
					emailAddress: {}
				}
			}
		} // fields
	}) // formValidation
	// Revalider le code postal basé sur le choix du pays
	.on('change', '[name="p_pays"]', function(e) 
	{
		$('#formEditParticpant').formValidation('revalidateField', 'p_code_postal');
		$('#formEditParticpant').formValidation('revalidateField', 'p_telephone');
	})
	
	
	// Rendre la sélection obligatoire ( voir bootstrap-select)
	.find('[name="p_pays"]')
		.selectpicker()
		.change(function(e) 
		{
			// revalidate the language when it is changed
			$('#formEditParticpant').formValidation('revalidateField', 'p_pays');
		})
		.end()
	
	// Gestion de l'asterisque
	.on('status.field.fv', function(e, data) 
	{
		// Remove the required icon when the field updates its status
		var $icon  = data.element.data('fv.icon'),
		options = data.fv.getOptions(),                      // Entire options
		validators = data.fv.getOptions(data.field).validators; // The field validators
		
		if (validators.notEmpty && options.icon && options.icon.required) 
		{
			$icon.removeClass(options.icon.required).addClass('fa');
		}
	})
	; // #formEditParticpant
	
	

