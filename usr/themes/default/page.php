<?php if (!defined('__EDGE_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


		<div id="page">
			<div id="page-content">
				<div id="page-content-article">
					<?php
					$db = Edge_Db::get();
					$sql = $db->select()->from('table.comments')
					    ->where('cid = ?',$this->cid)
					    ->where('mail = ?', $this->remember('mail',true))
					    ->where('status = ?', 'approved')
					//只有通过审核的评论才能看回复可见内容
					    ->limit(1);
					$result = $db->fetchAll($sql);
					if($this->user->hasLogin() || $result) {
					    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2see">$1</div>',$this->content);
					}
					else{
					    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2see">此处内容需要评论回复后方可阅读。</div>',$this->content);
					}

					emotionContent($content,$this->options->themeUrl);
					 ?>
				</div>
			</div>
		</div>

		<?php
			$enableComment = $this->fields->enableComment;
			if ($enableComment == 1):
		?>
		<?php $this->need('comments.php'); ?>
	<?php endif; ?>
	<?php $this->need('footer.php'); ?>
