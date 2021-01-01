<?php
// 啥比登陆界面 不想维护了
// Designed for EdgeBB
// @copyright Copyright (c) 2019 RenderMatrix010
include 'common.php';

if ($user->hasLogin()) {
    $response->redirect($options->adminUrl);
}
$rememberName = htmlspecialchars(Edge_Cookie::get('__edge_remember_name'));
Edge_Cookie::delete('__edge_remember_name');

$bodyClass = 'body-100';

?>
<!DOCTYPE html>
<html class="no-js" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="./style/normalize.css">
<link rel="stylesheet" type="text/css" href="./style/admin.css">

<!--必要样式-->
<link rel="stylesheet" type="text/css" href="./style/component.css">
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container">
			<div class="content">
				<div id="large-header" class="large-header" style="height: 695px;">
					<canvas id="demo-canvas" width="1920" height="695"></canvas>
					<div class="logo_box">
						<h3>Log in to EdgeBB</h3>
						<form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="name" class="text" type="text" placeholder="Account">
							</div>
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="password" class="text"  type="password" placeholder="Password">
							</div>
							<div class="remember" style="text-align:center;font-size: 87.5%;">
							<label for="remember"><input type="checkbox" name="remember" class="checkbox" value="1" id="remember" /> <?php _e('Autologon'); ?></label>
							</div>
							<div class="mb2" ><button type="submit" class="act-but submit" style="color: #FFFFFF">登录</button>
							        <p class="more-link">
            <a href="<?php $options->siteUrl(); ?>"><?php _e('返回首页'); ?></a>
            <?php if($options->allowRegister): ?>
            &bull;
            <a href="<?php $options->registerUrl(); ?>"><?php _e('用户注册'); ?></a>
            <?php endif; ?>
        </p>
                          </div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- 容器 -->
		<?php
		include 'bundle.php';
		?>
</body></html>
<?php 
include 'common-js.php';
?>
<script>
$(document).ready(function () {
    $('#name').focus();
});
</script>
<?php
include 'footer.php';
?>
