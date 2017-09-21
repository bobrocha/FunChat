<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <title>New Chat</title>
   <link href='css/bootstrap.css' rel='stylesheet'>
   <link href='css/global.css' rel='stylesheet'>
   <link href='css/new_chat.css' rel='stylesheet'>
</head>
<body>
<div class='container'>
	<div class='row'>
		<div class='col-sm-6 col-xs-12 col-centered'>
			<div class='panel panel-default'>
				<div class='panel-heading sticky'>
					<div class='back pull-left'><a href='chats.php'><span class='glyphicon glyphicon-chevron-left'></span></a></div>
					<h1 class='panel-title text-center'>New Chat</h1>
					<input class='form-control' id='searchUser' type='text' placeholder='Username'>
				</div>
				<div class='panel-body'>
					<ul class='users'>
						<li class='user text-center'>
							<a href='#'><span class='glyphicon glyphicon-user'></span><strong class='username'>Jappleseed</strong></a>
						</li>
					</ul>
				</div>
			</div>
		</div><!--end column-->
	</div><!--end row 1-->
</div><!--end container-->
<script src='js/jquery-3.2.1.js'></script>
<script src='js/bootstrap.js'></script>
<script src='js/sticky.js'></script>
<script>$('.sticky').Stickyfill();</script>
</body>
</html>