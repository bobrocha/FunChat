$(function() {
	// set up required input data from form
	var $form = $('form');
	var required_fields = ['email', 'pword'];
	var err_messages = {email: 'Email missing', pword: 'Password missing'};
	var form_values;

	$form.on('submit', function() {
		// variable to hold value for better code reading
		var filledOut = isFormFilledOut($form, required_fields);

		if (filledOut === true) {
			// store form values as object
			form_values = getFormValues($form, required_fields);

			// store values
			var email = form_values['email'];
			var pword = form_values['pword'];

			// set up error messages
			var short_pword_err = {'pword': 'Password must be at least 6 characters'};

			// no need to validate email with HTML5 email type
			// validate email on server side!
			// do some validation
			if (pword.length < 6) {
				displayFormErrors(['pword'], short_pword_err);
				return false;
			}

			// send data after validation
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
			url		: site_url + 'login/login/',
			method	: 'POST',
			data	: data,
			dataType: 'json'
		});

		request.done(function(response) {

			if (response.status == 'error') {
				// enable input elements
				$form.find(':input').prop('disabled', false);

				// show response
				$('.feedback').fadeIn()
				.find('.response').text(response.message);

			} else if (response.status == 'success') {
				// disable input elements to prevent multiple requests
				$form.find(':input').prop('disabled', true);

				// display success message
				$('.feedback').fadeIn()
				.find('.response').text(response.message).addClass('success');

				// redirect to members area
				setTimeout(function() {
					document.location.replace(site_url + 'chats');
				}, 1000);
			}
		});

		request.fail(function(xhr, status, error) {
			alert('Something went wrong!');
		});
	}
});