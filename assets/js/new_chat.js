$(function() {
	// dropdown list of suggestions
	var $searchfield = $('#search-field').keyup(ajaxAutoComplete);
});

function ajaxAutoComplete(event) {
	// remove whitespace from input element
	var username = $.trim($(this).val());

	// make ajax request
	var request = $.ajax({
		url		: site_url + 'new_chat/getusers/',
		method	: 'GET',
		data	: {'username' : username},
		dataType: 'html'
	});

	request.done(function(response) {
		console.log(response);
	});

	request.fail(function() {
		alert('Something went wrong!');
	});
}