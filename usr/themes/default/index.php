<?php
Edge_Widget::widget('Widget_Options')->to($options);
Edge_Widget::widget('Widget_User')->to($user); 
/**
 * 默认主题 For EdgeBB
 *
 *
 * @package EdgeBB
 * @author Rabbit0w0
 * @version 0.1
 * @link https://mcegde.ink/
 */

 $this->need('header.php');
 ?>

<div id="article" class="clear">
  <div id="article-content">

    <?php  $this->need('IndexSwitcher.php'); ?>

    <div id="pages" class="clear changePage">
      <?php $this->pageLink('更多 >','next'); ?>
      <?php $this->pageLink('< 返回','prev'); ?>
    </div>

  </div>
</div>
<?php $this->need('login.php') ?>


  <?php $this->need('footer.php'); ?>
