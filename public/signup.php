<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Sign Up</title>
    <link href='css/bootstrap.css' rel='stylesheet'>
    <link href='css/global.css' rel='stylesheet'>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='text-center'>
				<h3>Sign Up</h3>
			</div>
		</div>
		<form class='form-horizontal'>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='fname' type='text' class='form-control' placeholder='First Name'>
					<div class='help-block user-help fname collapse'></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='lname' type='text' class='form-control' placeholder='Last Name'>
					<div class='help-block user-help lname collapse'></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='username' type='text' class='form-control' placeholder='Username'>
					<div class='help-block user-help username collapse'></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='email' type='email' class='form-control' placeholder='Email'>
					<div class='help-block user-help email collapse'></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='pword' type='password' class='form-control' placeholder='Password'>
					<div class='help-block user-help pword collapse'></div>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<button type='submit' class='btn btn-primary btn-block'>Sign Up</button>
				</div>
			</div>
		</form><!--end form-->
	</div><!--end container-->
	<script src='js/jquery-3.2.1.js'></script>
	<script src='js/bootstrap.js'></script>
	<script src='js/functions.js'></script>
	<script src='js/signup.js'></script>
</body>
</html>