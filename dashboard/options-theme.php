<?php
error_reporting(0);
include 'common.php';
include 'header.php';
include 'menu.php';
include 'TUi.php';
?>


<div class="row edge-page-main" role="main">
	<div class="col-md-12 grid-margin stretch-card">
	<div class="card">
		  <div class="card-body">
		  <h4 class="card-title"><?php include 'page-title.php'; ?></h4>
			<div class="col-mb-12">
				<ul class="edge-option-tabs fix-tabs clearfix">
					<li><a href="<?php $options->adminUrl('themes.php'); ?>"><?php _e('可以使用的外观'); ?></a></li>
					<?php if (!defined('__EDGE_THEME_WRITEABLE__') || __EDGE_THEME_WRITEABLE__): ?>
						<li><a href="<?php $options->adminUrl('theme-editor.php'); ?>"><?php _e('编辑当前外观'); ?></a></li>
					<?php endif; ?>
					<li class="current"><a href="<?php $options->adminUrl('options-theme.php'); ?>"><?php _e('设置外观'); ?></a></li>
				</ul>
			</div>
			<div class="col-mb-12 col-tb-8 col-tb-offset-2" role="form">
				<?php Edge_Widget::widget('Widget_Themes_Config')->config()->render(); ?>
			</div>
		</div>
	</div>
	</div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
include 'form-js.php';
include 'footer.php';
?>