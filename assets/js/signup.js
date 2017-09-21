$(function() {

	// register handlers to be called when ajax starts and completes
	$(document).ajaxStart(function() {
		$('.form-group .progress').fadeIn();
	});

	$(document).ajaxComplete(function() {
		setTimeout(function() {
			$('.form-group .progress').hide();
			$('.form-group .response').fadeIn();
		}, 500);
	});

	// set up required input data from form
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

	$form.on('submit', function() {
		// hide previous response
		$(this).find('.form-group .response').hide();
		
		// variable to hold value for better code reading
		var filledOut = isFormFilledOut($form, required_fields);

		if (filledOut === true) {
			// store form values as object
			form_values = getFormValues($form, required_fields);

			// store values
			var uname = form_values['username'];
			var pword = form_values['pword'];

			// set up error messages
			var short_uname_err = {'username': 'Username must be 5 or 15 characters long'};
			var invalid_uname_err = {'username': 'Invalid, only use letters, numbers and \'_\''};
			var short_pword_err = {'pword': 'Password must be at least 6 characters'};

			// no need to validate email with HTML5 email type
			// validate email on server side!
			// do some validation on data
			if (!validLength(uname, 15, 5)) {
				displayFormErrors(['username'], short_uname_err);
				return false;
			} else if (!validUsername(uname)) {
				displayFormErrors(['username'], invalid_uname_err);
				return false;
			} else if (pword.length < 6) {
				displayFormErrors(['pword'], short_pword_err);
				return false;
			}

			// after data passes validation send to server
			send_data(form_values);

		} else {
			displayFormErrors(filledOut, err_messages);
		}
		return false;
	});

	function send_data(data) {
		// store reference to form
		var $form = $('form');

		// disable input elements before sending
		$form.find(':input').prop('disabled', true);

		// make ajax request
		var request = $.ajax({
			url		: site_url + 'signup/createaccount/',
			method	:'POST',
			data	: data,
			dataType: 'json'
		});

		request.done(function(response) {
			// enable input elements
			$form.find(':input').prop('disabled', false);

			// check response and act accordingly
			if (response.status == 'error') {
				$('.response').text(response.message);
			} else if (response.status == 'success') {
				// disble input elements to prevent multiple account creations
				$form.find(':input').prop('disabled', true);

				// display success message
				$('.response')
				.text(response.message)
				.addClass('success');

				// redirect to login page
				setTimeout(function() {
					document.location.replace(site_url);
				}, 2500);
			}
		});

		request.fail(function(xhr, status, error) {
			alert('Something went wrong!');
		});
	}
});