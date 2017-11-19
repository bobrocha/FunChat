$(function() {
	var $username = $('#search-field').keyup(searchByUsername);
});

function searchByUsername(e) {
	var username = $.trim($(this).val());

	var request = $.ajax({
		url		: site_url + 'search/searchByUsername/',
		method	: 'GET',
		data	: {'username' : username},
		dataType: 'json'
	});

	request.done(function(jsonRepsonse) {
		console.log(jsonRepsonse);
		// must be one line or will throw syntax error
		var $userElement = $("<li class='user text-center'><a href='#'><span class='glyphicon glyphicon-user'></span><strong class='username'></strong></a></li>");
		var $users = $('.users');
		var responseData = JSON.parse(jsonRepsonse);

		$(responseData.usernames).each(function(index) {
			$users.append($userElement)
			.find('.username')
			.text(this);
			//console.log(this);
		});
		// console.log(responseData);
	});

	request.fail(function(xhr, status, error) {
		//alert('Something went wrong!');
		console.log(error);
	});
}