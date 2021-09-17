let form = 'form',
	form_validate = $(form).fusionFormValidator('.form-group');

form_validate.validation_config = {
	validateEmail: true,
	validatePassword: true
};

form_validate.validateForm();

/*$(form).on('submit', function (e) {
	e.preventDefault()
	
	if (!$(this).hasErrors())
		$(this).off('submit').trigger('submit');
	else
		alert(`${errorCount[this.id]} error(s) found!`);
})*/
