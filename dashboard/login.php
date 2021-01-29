<?php
// 啥比登陆界面 不想维护了
// Designed for EdgeBB
// @copyright Copyright (c) 2019 RenderMatrix010

// Refreshed By Rabbit0w0 in 2021
include 'common.php';

if ($user->hasLogin()) {
    $response->redirect($options->adminUrl);
}
$rememberName = htmlspecialchars(Edge_Cookie::get('__edge_remember_name'));
Edge_Cookie::delete('__edge_remember_name');

$bodyClass = 'body-100';

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Log in</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/ark.css" />
		<!--必要样式-->
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
		<script src="js/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container login">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="back-canvas"></canvas>
					<div class="logo_box">
						<form action="<?php $options->loginAction(); ?>" name="f" method="post">
							<h3>Log in</h3>
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="mb2"><button class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</button></div>
						</form>
					</div>
				</div>
			</div>
			<script src="js/TweenLite.min.js"></script>
			<script src="js/EasePack.min.js"></script>
			<script src="js/rAF.js"></script>
			<script src="js/ark.js"></script>
		</div>
	</body>
</html>
<?php
include 'footer.php';
?>
