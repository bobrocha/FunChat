<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <title>Edit Username</title>
   <link href='css/bootstrap.css' rel='stylesheet'>
   <link href='css/global.css' rel='stylesheet'>
   <link href='css/edit_username.css' rel='stylesheet'>
</head>
<body>
<div class='container'>
	<div class='row'>
		<div class='col-sm-6 col-xs-12 col-centered'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<div class='back pull-left'><a href='account.php'><span class='glyphicon glyphicon-chevron-left'></span></a></div>
					<a class='save pull-right' href='#'>Save</a>
					<h1 class='panel-title text-center'>Edit Username</h1>
				</div>
				<div class='panel-body'>
					<ul class='settings'>
						<li class='property'>
							<div class='current text-center'><strong>Current Username</strong>: Jappleseed</div>
						</li>
						<li class='property'>
							<input id='pword' class='form-control' type='text' placeholder='New Username'>
						</li>
					</ul>
				</div>
			</div>
		</div><!--end column-->
	</div><!--end row-->
</div><!--end container-->
<script src='js/jquery-3.2.1.js'></script>
<script src='js/bootstrap.js'></script>
</body>
</html>