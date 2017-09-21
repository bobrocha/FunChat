$(function() {
	var $form = $('form');
	var required_fields = ['fname', 'lname', 'username', 'email', 'pword'];
	var err_messages = {
		fname	: 'First name missing',
		lname	: 'Last name missing',
		username: 'Username missing',
		email	: 'Email missing',
		pword 	: 'Password missing'
	};
	var form_values;
	var ajaxData;

	$form.on('submit', function() {
		var filledOut = isFormFilledOut($form, required_fields);

		if (filledOut === true) {
			form_values = getFormValues($form, required_fields);
			console.log('send data to server');
		} else {
			displayFormErrors(filledOut, err_messages);
		}

		return false;
	});
});