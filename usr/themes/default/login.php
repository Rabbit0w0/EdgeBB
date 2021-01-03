<? if(!defined("__EDGE_ROOT_DIR__"))exit; ?>
<!-- <label for="ModalLg" class="button">显示模态框</label> -->

<div class="lgbox">
  <input type="checkbox" name="" id="ModalLg">
  <label for="ModalLg" class="overlay"></label>
  <div class="lgmain">
    <form class="lgform" action="<?php Edge_Widget::widget('Widget_Options')->to($options);$options->loginAction(); ?>" method="post" name="login" role="form">
			<div class="input_outer">
					<input name="name" class="text" type="text" placeholder="Account">
				</div>
				<div class="input_outer">
					<input name="password" class="text"  type="password" placeholder="Password">
				</div>
				<div class="mb2" ><button type="submit" class="act-but submit" style="color: #FFFFFF">登录</button>
      </div>
		</form>
  </div>
</div>