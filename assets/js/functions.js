// check if input field is filled out using element id and jQuery selection of Form
function isFieldFilledOut($form, field) {
	return $.trim($form.find('#' + field).val());
}

// return array of missing field element id's or true if filled out, using jQuery selection of Form
function isFormFilledOut($form, fields) {
	var missing = [];

	for (var i = 0, len = fields.length; i < len; i++) {
		if (!isFieldFilledOut($form, fields[i])) {
			missing.push(fields[i]);
		} else if (isFieldFilledOut($form, fields[i])) {
			$form.find('.' + fields[i]).empty().hide();
		}		
	}
		
	return missing.length ? missing : true;
}

// shows error messages using a correlation of array values and object property names
function displayFormErrors(fields, messages) {
	for (var i = 0, len = fields.length; i < len; i++ ) {
		$('.' + fields[i]).text(messages[fields[i]]).fadeIn('slow');
	}
}

// get form values using elemnt id, return as object
function getFormValues($form, fields) {
	var form_values = {}, i, len;

	for (i = 0, len = fields.length; i < len; i++) {
		form_values[fields[i]] = $form.find('#' + fields[i]).val();
	}
	return form_values;
}

// checks for valid username
function validUsername(username) {
	return /^[a-zA-Z0-9_]{5,15}$/.test(username);
}

// checks length of string agains high and low limit values
function validLength(param, high, low) {
	if (param.length < low || param.length > high) {
		return false;
	}
	return true;
}