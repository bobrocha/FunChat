$(function() {
	var $form = $('form');
	var required_fields = ['username', 'pword'];
	var err_messages = {username: 'Username missing', pword: 'Password missing'};
	var form_values;
	var ajaxData;

	$form.on('submit', function() {
		var filledOut = isFormFilledOut($form, required_fields);

		if (filledOut === true) {
			form_values = getFormValues($form, required_fields);
			console.log(form_values);
		} else {
			displayFormErrors(filledOut, err_messages);
		}

		return false;
	});
});