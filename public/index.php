<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Log In</title>
    <link href='css/bootstrap.css' rel='stylesheet'>
    <link href='css/global.css' rel='stylesheet'>
    <link href='css/index.css' rel='stylesheet'>
</head>
<body>
	<div class='container'>
		<div class='row logo'>
			<div class='col-xs-12 text-center'>
				<h1>FunChat</h1>
			</div>
		</div><!--end logo-->
		<div class='row'>
			<div class='col-xs-12 text-center'>
				<p>Have fun chatting with friends</p>
			</div>
		</div><!--end headline-->
		<form class='form-horizontal'>
			<div class='form-group'>
				<div class='col-xs-10 col-sm-5 col-md-4 col-centered'>
					<input id='username' type='text' class='form-control' placeholder='Username'>
					<div class='help-block user-help username collapse'></div>
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
					<button type='submit' class='btn btn-primary btn-block'>Log In</button>
					<div class='forgot text-center'>
					<div><a href='signup.php'>Signup</a></div>
					<div><a href='forgot.php'>Forgot Password</a></div>
				</div>
			</div>
		</form><!--end form-->
	</div><!--end container-->
	<script src='js/jquery-3.2.1.js'></script>
	<script src='js/bootstrap.js'></script>
	<script src='js/functions.js'></script>
	<script src='js/login.js'></script>
</body>
</html>