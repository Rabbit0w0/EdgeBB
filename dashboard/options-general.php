<?php
error_reporting(0);
include 'common.php';
include 'header.php';
include 'menu.php';
include 'TUi.php';
?>


<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<h4 class="card-title"><?php include 'page-title.php'; ?></h4>
			<div class="dropdown-divider"></div>
			  <div class="col-md-6">
			  <?php Edge_Widget::widget('Widget_Options_General')->form()->render(); ?>
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
