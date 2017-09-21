<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <title>Account</title>
   <link href='css/bootstrap.css' rel='stylesheet'>
   <link href='css/global.css' rel='stylesheet'>
   <link href='css/account.css' rel='stylesheet'>
</head>
<body>
<div class='container'>
	<div class='row'>
		<div class='col-sm-6 col-xs-12 col-centered'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<div class='back pull-left'><a href='chats.php'><span class='glyphicon glyphicon-chevron-left'></span></a></div>
					<h1 class='panel-title text-center'>Account</h1>
				</div>
				<div class='panel-body'>
					<ul class='settings'>
						<li class='property'>
							<div class='name'>
								<span class='pull-left'>Name</span>
								<a class='pull-right' href='edit_name.php'><span class='glyphicon glyphicon-chevron-right'></span></a>
								<span class='pull-right'>John Appleseed</span>
							</div>
						</li>
						<li class='property'>
							<div class='username'>
								<span class='pull-left'>Username</span>
								<a class='pull-right' href='edit_username.php'><span class='glyphicon glyphicon-chevron-right'></span></a>
								<span class='pull-right'>Jappleseed</span>
							</div>
						</li>
						<li class='property'>
							<div class='password'>
								<span class='pull-left'>Password</span>
								<a class='pull-right' href='edit_password.php'><span class='glyphicon glyphicon-chevron-right'></span></a>
								<span class='pull-right'>********</span>
							</div>
						</li>
						<li class='property'>
							<div class='account'>
								<a href='#'>Delete Account</a>
							</div>
						</li>
						<li class='property'>
							<div class='chats'>
								<a href='#'>Delete All Chats</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div><!--end column-->
	</div><!--end row 1-->
</div><!--end container-->
<script src='js/jquery-3.2.1.js'></script>
<script src='js/bootstrap.js'></script>
</body>
</html>